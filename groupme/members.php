<?php

class members extends client {
    
/*
 * add: Add members to a group
 * 
 * @param string required $id
 * @param array $args
 * 
 * members array — nickname is required. You must use one of the following identifiers: user_id, phone_number, or email.
 *      object
 *          nickname (string) required
 *          user_id (string)
 *          phone_number (string)
 *          email (string)
 *          guid (string)
 * 
 * @return string $return
 * 
 */
	public function add($id, $args){
		$params = array(
			'url' => '/groups/' . $id . '/members/add',
			'method' => 'POST',
            		'query' => array(),
            		'payload' => $args
		);
		
		return $this->request($params);
	}
/*
 * results: Add members to a group
 * 
 * @param string required $group_id
 * @param string required $results_id, This is the guid that's returned from an add request. 
 * 
 * Expects 503 or 404 or 200 response
 */
	public function results($group_id, $results_id) {
		$params = array (
			'url' => '/groups/' . $group_id . '/members/results/' . $results_id,
			'method' => 'GET',
			'query' = array()
			);
		
		return $this->request($params);
	}
    
/*
 * remove: Remove member from a group
 * 
 * @param string required $group_id
 * @param string required $user_id
 * 
 * @return string $return
 * 
 */
	public function remove($group_id, $user_id){
		$params = array(
			'url' => '/groups/' . $group_id . '/members/' . $user_id . '/remove',
			'method' => 'POST',
            		'query' => array(),
		);
		
		return $this->request($params);
	}
}
?>
