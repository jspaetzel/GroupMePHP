<?php

class groups extends client {
	
	/**
	 * index: List the authenticated user's active groups.
	 * 
	 * @param array $args
	 * 		page integer — Fetch a particular page of results. Defaults to 1
	 * 		per_page integer — Define page size. Defaults to 10
	 * 
	 * @return string $return
	 * 
	 */
	public function index($args){
		$params = array(
			'url' => '/groups',
			'method' => 'GET',
			'query' => $args
		);
		
		return $this->request($params);
	}
	
	/**
	 * former: List the authenticated user's former groups.
	 * 
	 * @return string $return
	 * 
	 */
	public function former(){
		$params = array(
			'url' => '/groups/former',
			'method' => 'GET',
			'query' => array()
		);
		
		return $this->request($params);
	}
	
	/**
	 * show: Load a specific group.
	 * 
	 * @param string required $id
	 * 
	 * @return string $return
	 * 
	 */
	public function show($id){
		$params = array(
			'url' => '/groups/' . $id,
			'method' => 'GET',
			'query' => array()
		);
		
		return $this->request($params);
	}
	
	/**
	 * create: Create a new group
	 * 
	 * @param array $args
	 * 		name string
	 * 		description string
	 * 		image_url string
	 * 		share boolean — If you pass a true value for share, we'll generate a share URL. Anybody with this URL can join the group.
	 * 
	 * @return string $return
	 * 
	 */
	public function create($args){
		$params = array(
			'url' => '/groups',
			'method' => 'POST',
			'query' => array(),
			'payload' => $args
		);
		
		return $this->request($params);
	}
	
	/**
	 * update: Update a group after creation
	 * 
	 * @param string required $id ID of group to be modified
	 * @param array $args
	 * 		name string
	 * 		description string
	 * 		image_url string
	 * 		share boolean — If you pass a true value for share, we'll generate a share URL. Anybody with this URL can join the group.
	 * 
	 * @return string $return
	 * 
	 */
	public function update($id, $args){
		$params = array(
			'url' => '/groups/' . $id . '/update',
			'method' => 'POST',
			'query' => array(),
			'payload' => $args
		);
		
		return $this->request($params);
	}
	
	/**
	 * destroy: Disband a group
	 * 
	 * @param string required $id
	 * 
	 * @return string $return
	 * 
	 */
	public function destroy($id, $args){
		$params = array(
			'url' => '/groups/' . $id . '/destroy',
			'method' => 'POST',
			'query' => array(),
		);
		
		return $this->request($params);
	}
}
?>
