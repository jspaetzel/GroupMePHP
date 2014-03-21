<?php

class likes extends client {
    
/*
 * create: Like a message.
 * 
 * @param string required $conversation_id
 * @param string required $message_id
 * 
 * @return string $return
 * 
 */
	public function create($group_id, $user_id){
		$params = array(
			'url' => '/messages/' . $conversation_id . '/' . $message_id . '/like',
			'method' => 'POST',
            'query' => array(),
		);
		
		return $this->request($params);
	}
    
/*
 * destroy: Unlike a message.
 * 
 * @param string required $conversation_id
 * @param string required $message_id
 * 
 * @return string $return
 * 
 */
	public function destroy($group_id, $user_id){
		$params = array(
			'url' => '/messages/' . $conversation_id . '/' . $message_id . '/unlike',
			'method' => 'POST',
            'query' => array(),
		);
		
		return $this->request($params);
	}
}
?>