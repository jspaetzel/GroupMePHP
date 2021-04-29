<?php
namespace GroupMePHP\Services;

class GroupsService extends Service
{

    /**
     * List the authenticated user's active groups.
     *
     * @param array $args
     * 		page integer — Fetch a particular page of results. Defaults to 1
     * 		per_page integer — Define page size. Defaults to 10
     *
     * @return string
     */
    public function index($args = array())
    {
        $params = array(
            'url' => '/groups',
            'method' => 'GET',
            'query' => $args
        );

        return $this->request($params);
    }

    /**
     * List the authenticated user's former groups.
     *
     * @return string
     */
    public function former()
    {
        $params = array(
            'url' => '/groups/former',
            'method' => 'GET',
            'query' => array()
        );

        return $this->request($params);
    }

    /**
     * Load a specific group.
     *
     * @param string|int $id
     *
     * @return string
     */
    public function show($id)
    {
        $params = array(
            'url' => '/groups/' . $id,
            'method' => 'GET',
            'query' => array()
        );

        return $this->request($params);
    }

    /**
     * Create a new group
     *
     * @param array $args
     * 		name string
     * 		description string
     * 		image_url string
     * 		share boolean — If you pass a true value for share, we'll generate a share URL. Anybody with this URL can join the group.
     *
     * @return string
     */
    public function create($args)
    {
        $params = array(
            'url' => '/groups',
            'method' => 'POST',
            'query' => array(),
            'payload' => $args
        );

        return $this->request($params);
    }

    /**
     * Update a group after creation
     *
     * @param string|int $id
     * @param array $args
     *        name string
     *        description string
     *        image_url string
     *        share boolean — If you pass a true value for share, we'll generate a share URL. Anybody with this URL can join the group.
     * @return string
     */
    public function update($id, $args)
    {
        $params = array(
            'url' => '/groups/' . $id . '/update',
            'method' => 'POST',
            'query' => array(),
            'payload' => $args
        );

        return $this->request($params);
    }

    /**
     * Disband a group
     *
     * @param string|int $id
     *
     * @return string
     */
    public function destroy($id)
    {
        $params = array(
            'url' => '/groups/' . $id . '/destroy',
            'method' => 'POST',
            'query' => array(),
        );

        return $this->request($params);
    }

    /**
     * Join a shared group
     *
     * @param string|int $group_id
     * @param string $share_token
     * @return string
     */
    public function join($group_id, $share_token)
    {
        $params = array(
            'url' => "/groups/$group_id/join/$share_token",
            'method' => 'POST',
            'query' => array(),
        );

        return $this->request($params);
    }

    /**
     * Rejoin a group. Only works if you previously removed yourself.
     *
     * @param string|int $group_id
     * @return string
     */
    public function rejoin($group_id)
    {
        $params = array(
            'url' => "/groups/join",
            'method' => 'POST',
            'query' => array(),
            'payload' => array("group_id" => $group_id)
        );

        return $this->request($params);
    }

    /**
     * Change owners of requested groups. This action is only available to the current group owner.
     *
     * @param array $args
     * 		    group_id string — The ID of the group
     * 		    owner_id string — The ID of the new owner
     *
     * @return string
     */
    public function changeOwners($args = array())
    {
        $params = array(
            'url' => '/groups/change_owners',
            'method' => 'POST',
            'query' => array(),
            'payload' => array("requests" => $args)
        );

        return $this->request($params);
    }
}
