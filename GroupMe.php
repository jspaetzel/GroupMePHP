<?php

require("GroupMe/groups.php");
require("GroupMe/directmessages.php");


class GroupMe {
    public $groups;
    public $directmessages;
    
    public function __construct($token){
        $this->groups = new groups($token);
        $this->directmessages = new directmessages($token);
	}
}

class client {
	
	private $token = '';
	private $url = 'https://api.groupme.com/v3';


/**
 * When creating a new groupmeClient object
 * send array with 'access_token'
 * 
 */
	public function __construct($token){
		if(isset($token)){
			$this->token = $token;			
		}
		else{
			die('You must include a token');
		}
	}

/*
 * Build query string from $args
 */
    private function buildQueryString($args){
        // append key
        $args = $args + array("token" => $this->token);
        
        $query = "";
        if (isset($args)) {
            while (list($key, $val) = each($args)) {
                if ( strlen($query) > 0 ) {
                    $query .= "&";
                } else {
                    $query .= "?";
                }
                $query .= $key . '=' . $val;
            }
        }
		return $query;
    }

/*
 * Overhead function that all requests utilize
 */	
	public function request($args){
		$c = curl_init();
		
        curl_setopt($c, CURLOPT_TIMEOUT, 4);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($c, CURLOPT_USERAGENT, 'groupmeClient/0.1');
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_CUSTOMREQUEST, $args['method']);
        
        $curlurl = $this->url . $args['url'] . $this->buildQueryString($args['query']);
        curl_setopt($c, CURLOPT_URL, $curlurl );
        
        if($args['method'] == "POST"){
            if ( isset($args['payload']) ) {
                $payload = json_encode($args['payload']);
                curl_setopt($c, CURLOPT_POSTFIELDS, $payload );
            }
			
            curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
        }

		$response = curl_exec($c);
		
		return $response;
	}

}
?>