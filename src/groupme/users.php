<?php

class users extends client {
	
	/**
	 * me: Get details about the authenticated user.
	 * 
	 * @return string $return
	 * 
	 */
	public function index($args){
		$params = array(
			'url' => '/users/me',
			'method' => 'GET',
			'query' => array()
		);
		
		return $this->request($params);
	}
}
?>
