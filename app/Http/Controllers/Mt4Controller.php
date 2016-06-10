<?php

namespace App\Http\Controllers;

use App\Http\Requests;
// use App\Http\Requests\Request;
use App\Repositories\Mt4Repository;
use Illuminate\Http\Request;

class Mt4Controller extends Controller
{

	protected $mt4;

	public function __construct(Mt4Repository $mt4)
    {
        $this->middleware('auth');
        $this->mt4 = $mt4;
    }

   
   public function createaccount(Request $request){

   	echo 'test';
   	$params['group'] = 'demoIntact-usd';
	$params['agent'] = isset($_REQUEST['agent'])?$_REQUEST['agent']:'0';
	$params['login'] = 0;
	$params['country'] = rawurlencode('Russia');
	$params['state'] = rawurlencode('Lenoblast');
	$params['city'] = rawurlencode('Saint-Petersburg');
	$params['address'] = rawurlencode('18 linia VO');
	$params['name'] = rawurlencode(isset($_REQUEST['name'])?$_REQUEST['name']:'John Smith');
	$params['email'] = rawurlencode(isset($_REQUEST['email'])?$_REQUEST['email']:'test@tools4brokers.com');
	$params['password'] = 'tools4brokers';
	$params['password_investor'] = 'tools4brokers';
	$params['password_phone'] = '';
	$params['leverage'] = 100;
	$params['zipcode'] = '02217';
	$params['phone'] = '12345678';
	$params['id'] = '';
	$params['comment'] = rawurlencode('NO COMMENT');
		
	$answer = $this->mt4->MakeRequest("createaccount", $params);
	
	if($answer['result']!=1)
	{
		print "<p style='background-color:#FFEEEE'>An error occured: <b>".$answer['reason']."</b>.</p>";
	}
	else
	{	
		print "<p style='background-color:#EEFFEE'>Account No. <b>".$answer["login"]."</b> has just been created.</p>";
	}

   }


}
