<?php

namespace GroupMePHP\Services;

class GroupsService extends Service
{
    /**
     * List the authenticated user's active groups.
     *
     * @param array $args
     *                    page integer — Fetch a particular page of results. Defaults to 1
     *                    per_page integer — Define page size. Defaults to 10
     */
    public function index($args = [])
    {
        $params = [
            'url' => '/groups',
            'method' => 'GET',
            'query' => $args,
        ];

        return $this->request($params);
    }

    /**
     * List the authenticated user's former groups.
     */
    public function former()
    {
        $params = [
            'url' => '/groups/former',
            'method' => 'GET',
            'query' => [],
        ];

        return $this->request($params);
    }

    /**
     * Load a specific group.
     *
     * @param int|string $id
     */
    public function show($id)
    {
        $params = [
            'url' => '/groups/' . $id,
            'method' => 'GET',
            'query' => [],
        ];

        return $this->request($params);
    }

    /**
     * Create a new group.
     *
     * @param array $args
     *                    name string
     *                    description string
     *                    image_url string
     *                    share boolean — If you pass a true value for share, we'll generate a share URL. Anybody with this URL can join the group.
     */
    public function create($args)
    {
        $params = [
            'url' => '/groups',
            'method' => 'POST',
            'query' => [],
            'payload' => $args,
        ];

        return $this->request($params);
    }

    /**
     * Update a group after creation.
     *
     * @param int|string $id
     * @param array      $args
     *                         name string
     *                         description string
     *                         image_url string
     *                         share boolean — If you pass a true value for share, we'll generate a share URL. Anybody with this URL can join the group.
     */
    public function update($id, $args)
    {
        $params = [
            'url' => '/groups/' . $id . '/update',
            'method' => 'POST',
            'query' => [],
            'payload' => $args,
        ];

        return $this->request($params);
    }

    /**
     * Disband a group.
     *
     * @param int|string $id
     */
    public function destroy($id)
    {
        $params = [
            'url' => '/groups/' . $id . '/destroy',
            'method' => 'POST',
            'query' => [],
        ];

        return $this->request($params);
    }

    /**
     * Join a shared group.
     *
     * @param int|string $group_id
     * @param string     $share_token
     */
    public function join($group_id, $share_token)
    {
        $params = [
            'url' => "/groups/{$group_id}/join/{$share_token}",
            'method' => 'POST',
            'query' => [],
        ];

        return $this->request($params);
    }

    /**
     * Rejoin a group. Only works if you previously removed yourself.
     *
     * @param int|string $group_id
     */
    public function rejoin($group_id)
    {
        $params = [
            'url' => '/groups/join',
            'method' => 'POST',
            'query' => [],
            'payload' => ['group_id' => $group_id],
        ];

        return $this->request($params);
    }

    /**
     * Change owners of requested groups. This action is only available to the current group owner.
     *
     * @param array $args
     *                    group_id string — The ID of the group
     *                    owner_id string — The ID of the new owner
     */
    public function changeOwners($args = [])
    {
        $params = [
            'url' => '/groups/change_owners',
            'method' => 'POST',
            'query' => [],
            'payload' => ['requests' => $args],
        ];

        return $this->request($params);
    }
}
