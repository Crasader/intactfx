<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests;
use App\Payment;
use App\PaymentMain;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Exception\NotFoundException;
use Faker\Factory as Faker;
use Illuminate\Http\Request;




class PaymentBitcoinController extends Controller
{

    protected $apiKey;

    protected $apiSecret;

    protected $coinbase_env;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
       return view('bitcoin');
    }

    private function coinbase($orderId)
    {
        $this->apiKey  = env('COINBASE_KEY');
        $this->apiSecret  = env('COINBASE_SECRET');
        $this->coinbase_env  = env('COINBASE_ENV');

        $configuration = Configuration::apiKey($this->apiKey, $this->apiSecret);
                
        $this->coinbase_env=='sandbox' ? $configuration->setApiUrl(Configuration::SANDBOX_API_URL) : '';
        
        $client = Client::create($configuration);
        $exchange = $client->getExchangeRates();
        echo '<pre>' . print_r($exchange, 1 ) . '</pre>';
        // $order = $client->getOrders();
        try {
            $order = $client->getOrder($orderId);

            $array =  (array) $order;
            
            echo '<pre>' . print_r($array, 1 ) . '</pre>';

            foreach ($array as $key => $value) {
                $key = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $key);    
                echo $key;

                // if ($key=='*rawData') {
                //     $res['id'] =  $value['id'];
                //     $res['amount'] =  $value['amount']['amount'];
                //     $res['currency'] = $value['amount']['currency'];
                //     $res['status'] = 'success';
                //     break; 
                // }

                if ($key=='Coinbase\Wallet\Resource\ResourcerawData') {
                    $res['id'] =  $value['id'];
                    $res['amount'] =  $value['amount']['amount'];
                    $res['currency'] = $value['amount']['currency'];
                    $res['status'] = 'success';
                    break; 
                }

                
            }

            return $res;

        } catch (NotFoundException $e) {

            $res['status'] = 'error';
            return $res;

        }
    
    }


    public function success(Request $request)
    {
        
        $orderId =  $request->order['uuid'];
        
        $payor_account = $request->order['button']['name'];
        
        $res = $this->coinbase($orderId);
        
        // if ($res['status']=='success') {
            
        //     $payment = Payment::create([
        //         'id' => Faker::create()->randomNumber($nbDigits = 9),
        //         'payment_id' =>  $orderId,
        //         'funding_service'  => 'bitcoin',
        //         'payee_account'  => '',
        //         'payment_amount'  => $res['amount'],
        //         'payment_units'  => $res['currency'],
        //         'payor_account'  =>  $payor_account,
        //         'confirm' => true,
        //     ]);
            
        //     PaymentMain::create([
        //         'payment_id' => $payment->id
        //     ]);

        // }

        return view('home');
        
    }

    public function notificationEndpoints(Request $request)
    {
        
        $orderId =  $request->order['uuid'];
        
        $payor_account = $request->order['button']['name'];
        $email = $request->customer['email'];

        $res = $this->coinbase($orderId);
        // echo round($res['amount'] / 100, 2);
        // echo '<pre>' . print_r($res, 1) . '</pre>';

        if ($res['status']=='success') {
            
            $payment = Payment::create([
                'id' => Faker::create()->randomNumber($nbDigits = 9),
                'payment_id' =>  $orderId,
                'funding_service'  => 'bitcoin',
                'type'  => 'deposit',
                'payee_account'  => '',
                'payment_amount'  => $res['amount'],
                'payment_units'  => $res['currency'],
                'payor_account'  =>  $payor_account,
                'email'  =>  $email,
                'confirm' => true,
            ]);
            
            PaymentMain::create([
                'payment_id' => $payment->id
            ]);

            // $account = new Account();
            // $account->main_wallet + $res['amount'];
            // $account->save();

        }

        return 'success';
    }




}
