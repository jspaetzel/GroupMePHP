<?php
namespace GroupMePHP;

class directmessages extends client {
	
	/**
	 * index: Fetch direct messages between two users.
	 * 
	 * @param array $args
	 * 		other_user_id required string — The other participant in the conversation.
	 * 		before_id string — Returns 20 messages created before the given message ID
	 * 		since_id string — Returns 20 messages created after the given message ID
	 * 
	 * @return string $return
	 * 
	 */
	public function index($args){
		$params = array(
			'url' => '/direct_messages',
			'method' => 'GET',
			'query' => $args
		);
		
		return $this->request($params);
	}

	/**
	 * create: Create direct messages between two users.
	 * 
	 * @param array $args
	 * 		source_guid required string — This is used for client-side deduplication.
	 * 		recipient_id required string — The GroupMe user ID of the recipient of this message.
	 * 		text required string — This can be omitted if at least one attachment is present.
	 * 
	 * @return string $return
	 * 
	 */
	public function create($args){
		$params = array(
			'url' => '/direct_messages',
			'method' => 'POST',
			'query' => array(),
			'payload' => array("direct_message"=>$args)
		);
		
		return $this->request($params);
	}
}
?>
