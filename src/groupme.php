<?php

namespace GroupMePHP;

require("groupme/directmessages.php");
require("groupme/groups.php");
require("groupme/likes.php");
require("groupme/members.php");
require("groupme/messages.php");
require("groupme/users.php");
require("groupme/bots.php");
require("groupme/sms.php");
require("groupme/leaderboard.php");
require("groupme/images.php");

class groupme {
	public $directmessages;
	public $groups;
	public $likes;
	public $members;
	public $messages;
	public $users;
	public $bots;
	public $sms;
	public $leaderboard;
	
	public function __construct($token = "") {
		if(isset($token)) {
			$this->directmessages = new directmessages($token);
			$this->groups = new groups($token);
			$this->likes = new likes($token);
			$this->members = new members($token);
			$this->messages = new messages($token);
			$this->users = new users($token);
			$this->bots = new bots($token);
			$this->sms = new sms($token);
			$this->images = new images($token);
			$this->leaderboard = new leaderboard($token);
		} else {
			die('You must include a user or application token');
		}
	}
}

class client {
	private $token = '';
	protected $url = 'https://api.groupme.com/v3';


	/*
	 * When creating a new groupmeClient object
	 * send array with 'access_token'
	 * 
	 */
	public function __construct($token) {
		$this->token = $token;
	}

	/*
	 * Build query string from $args
	 */
	public function buildQueryString($args = array()) {
		$args = array_merge($args, array("token" => $this->token));
		
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
	public function request($args) {
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
				$payload = "";
				if ( isset($args['payload']['file']) ) {
					$payload = $args['payload'];
				}
				else {
					$payload = json_encode($args['payload']);
					curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				}
								
				curl_setopt($c, CURLOPT_POSTFIELDS, $payload );
			}
		}
		$info = curl_getinfo($c);
		$response = curl_exec($c);
		curl_close($c);
		return $response;
	}
}

class image_client extends client {
	protected $url = 'https://image.groupme.com';
}
