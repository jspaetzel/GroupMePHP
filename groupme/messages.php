<?php

class messages extends client {
    
/*
 * index: Retrieve messages for a group.
 * 
 * @param string required $id
 * @param array $args
 * 
 * before_id string — Returns 20 messages created before the given message ID
 * since_id string — Returns 20 messages created after the given message ID
 * 
 * @return string $return
 * 
 */
	public function index($id, $args){
		$params = array(
			'url' => '/groups/' . $id . '/messages',
			'method' => 'GET',
            'query' => $args
		);
		
		return $this->request($params);
	}

/*
 * create: Create messages in a group.
 * 
 * @param string required $id
 * @param array $args
 * 
 * source_guid required string — This is used for client-side deduplication.
 * text required string — This can be omitted if at least one attachment is present.
 * 
 * @return string $return
 * 
 */
    public function create($id, $args){
		$params = array(
			'url' => '/groups/' . $id . '/messages',
			'method' => 'POST',
            'query' => array(),
            'payload' => $args
		);
		
		return $this->request($params);
	}
}
?>
