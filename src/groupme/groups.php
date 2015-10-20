<?php
namespace GroupMePHP;

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
	public function index($args = array()){
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
	 * @param string $id
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
     * @param $id
     * @param array $args
     *        name string
     *        description string
     *        image_url string
     *        share boolean — If you pass a true value for share, we'll generate a share URL. Anybody with this URL can join the group.
     * @return string $return
     *
     * @internal param required $string $id ID of group to be modified
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
	 * @param string $id
	 * 
	 * @return string $return
	 * 
	 */
	public function destroy($id){
		$params = array(
			'url' => '/groups/' . $id . '/destroy',
			'method' => 'POST',
			'query' => array(),
		);
		
		return $this->request($params);
	}

    /**
     * join: Join a shared group
     *
     * @param $group_id
     * @param $share_token
     * @return string $return
     *
     * @internal param string $id
     *
     */
    public function join($group_id, $share_token){
        $params = array(
            'url' => "/groups/$group_id/join/$share_token",
            'method' => 'POST',
            'query' => array(),
        );

        return $this->request($params);
    }

    /**
     * rejoin: Rejoin a group. Only works if you previously removed yourself.
     *
     * @param $group_id
     * @return string $return
     *
     * @internal param string $id
     *
     */
    public function rejoin($group_id){
        $params = array(
            'url' => "/groups/join",
            'method' => 'POST',
            'query' => array(),
            'payload' => array("group_id" => $group_id)
        );

        return $this->request($params);
    }
}
?>
