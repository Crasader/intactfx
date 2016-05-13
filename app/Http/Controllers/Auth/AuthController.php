<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Mailers\AppMailer;
use App\Services\ActivationService;
use App\Social;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Socialite;
use Validator;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    protected $activationService;

    public function __construct(ActivationService $activationService)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->activationService = $activationService;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:intact_users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());

        $this->activationService->sendActivationMail($user);

        return redirect('/login')->with('status', 'We sent you an activation code. Check your email.');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return  User::create([
            // 'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->activated) {
            $this->activationService->sendActivationMail($user);
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
            // return back()->flash('status', 'We sent you an activation code. Check your email.');
        }
        return redirect()->intended($this->redirectPath());
    }

    public function activateUser($token)
    {
        if ($user = $this->activationService->activateUser($token)) {
            auth()->login($user);
            return redirect($this->redirectPath());
        }
        abort(404);
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver( $provider )->redirect();
    }
 
    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {

        $user = Socialite::driver( $provider )->user();
        // dd($user);
        $user->email = $provider=='twitter' ? $user->nickname : $user->email;
        $socialUser = null;

        //Check is this email present
        $userCheck = User::where('email', '=', $user->email)->first();
        if(!empty($userCheck))
        {
            $socialUser = $userCheck;
        }
        else
        {
            $sameSocialId = Social::where('social_id', '=', $user->id)->where('provider', '=', $provider )->first();

            if(empty($sameSocialId))
            {
                //There is no combination of this social id and provider, so create new one
                $newSocialUser = new User;
                $newSocialUser->email        = $user->email;
                $newSocialUser->name         = $user->name;
                $newSocialUser->save();

                $socialData = new Social;
                $socialData->social_id = $user->id;
                $socialData->provider= $provider;
                $socialData->avatar= $user->avatar;
                $newSocialUser->social()->save($socialData);

                $socialUser = $newSocialUser;
            }
            else
            {
                //Load this existing social user
                $socialUser = $sameSocialId->user;
            }
        }
        // $this->auth->login($socialUser, true);
        Auth::login($socialUser, true);

        return redirect('home');
       
    }
 
}
