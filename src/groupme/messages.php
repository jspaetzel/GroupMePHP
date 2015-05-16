<?php
namespace GroupMePHP;

class messages extends client {
	
	/**
	 * index: Retrieve messages for a group.
	 * 
	 * @param string $id
	 * @param array $args
	 * 		before_id string — Returns 20 messages created before the given message ID
	 * 		since_id string — Returns 20 messages created after the given message ID
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

	/**
	 * create: Create messages in a group.
	 * 
	 * @param string $id
	 * @param array $args
	 * 		source_guid required string — This is used for client-side deduplication.
	 * 		text required string — This can be omitted if at least one attachment is present.
	 *      attachments optional array - include array of attachments to attach images, etc.
	 * @return string $return
	 * 
	 */
	public function create($id, $args){

        // Construct the payload, optionally with attachments
        $payload = array(
            "source_guid" => $args[0],
            "text" => $args[1]
        );

        if ( !empty($args[2]) ) {
            $payload = array_merge($payload, array("attachments" => array($args[2])));
        }

		$params = array(
			'url' => '/groups/' . $id . '/messages',
			'method' => 'POST',
			'query' => array(),
			'payload' => 
				array( "message" => $payload )
		);
		
		return $this->request($params);
	}
}
?>
