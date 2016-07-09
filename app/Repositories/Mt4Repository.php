<?php
namespace App\Repositories;

use App\Account;
use App\Affiliate;
use App\Mt4Account;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class Mt4Repository
{

    protected $socketPtr;
 
    protected $secretHashValue = "none";
 
    protected $encryptionKey = "none";
 
    protected $server_address;
 
    protected $server_port;
    
    public function __construct()
    {

       $this->server_address = env('MT4_IP_ADDRESS');

       $this->server_port = env('MT4_PORT');

    }

    function OpenConnection() {

        $this->socketPtr = fsockopen($this->get_server_address(), $this->get_server_port(), $errno, $errstr, 0.4);   

        if(!$this->socketPtr) {      

            return -1;

        } else {    

            return 0;

        }

    }

    protected function get_server_address(){

        return $this->server_address;

    }

    protected function get_server_port(){

        return $this->server_port;   

    }
    
    function SetSafetyData($secretHashValue, $encryptionKey) {

        $this->secretHashValue = $secretHashValue;

        $this->encryptionKey = $encryptionKey;

    }
    
    function _parse_answer($answerData){

        $result = array();

        $lines = explode("\n", $answerData);

        $data = explode("&", $lines[0]);

        foreach($data as $piece)
        {

            $keyval = explode("=", $piece, 2);

            $result[$keyval[0]] = $keyval[1];

        }

        for($i=1;$i<count($lines);$i++)
        {

            $result["csv"][]=$lines[$i];

        }

        return $result;

    }
    
    function MakeRequest($action, $params = array()) {
        
        $this->OpenConnection();

        if(!$this->socketPtr) return "error"; 
        
        // echo '<pre>' . print_r($params,1) . '</pre>';
        // die();
        
        $request_id = 6099;//rand();
        // $request = "action=$action";
        $request = "action=$action&request_id=$request_id";

        foreach($params as $key => $value) {

            $request .= "&$key=$value";

        }       

        if($this->secretHashValue != "none") {

            $hash = $this->makeHash($action, $request_id);

            $request .= "&hash=$hash";

        }

        $request .= "\0"; // leading zero. It must be added to the end of each request      

        if($this->encryptionKey != "none") {

            $request = $this->cryptography($request);    

        }
        
        if($request == "") return "error";

        $this->sendRequest($request);

        // echo '<pre>' . print_r($return['csv'],1) . '</pre>';
       

        return $this->_parse_answer($this->readAnswer());
        // return $this->readAnswer();
        
    }

    function CloseConnection() {

        fclose($this->socketPtr);

    }

    function sendRequest($request) {

        fputs($this->socketPtr, $request);

    }

    function readAnswer() {
        
        $size = fgets($this->socketPtr, 64);
            
        $answer = "";           

        $readed = 0;

        while($readed < $size) {

            $part = fread($this->socketPtr, $size - $readed);   

            $readed += strlen($part);

            $answer .= $part;

        }

        if($this->encryptionKey != "none") {

            $answer = $this->cryptography($answer, $encryptionKey);

        }

        return $answer;

    }
        
    function makeHash($action, $request_id) {

        return md5( $request_id . $action . $this->secretHashValue);    

    }

    function cryptography($data) {

        $keyLen = strlen($this->encryptionKey);

        $keyIndex = 0;

        for($i = 0; $i < strlen($data); $i++) {

            $data[$i] = $data[$i] ^ $this->encryptionKey[$keyIndex];

            $keyIndex++;

            if($keyIndex == $keyLen) $keyIndex = 0;

        }

        return $data;

    }

}