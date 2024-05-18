<?php

namespace GroupMePHP\Services;

class MembersService extends Service
{
    /**
     * Add members to a group.
     *
     * @param int|string $id
     * @param array      $args
     *                         members array — nickname is required. You must use one of the following identifiers: user_id,
     *                         phone_number, or email.
     *                         nickname (string) required
     *                         user_id (string)
     *                         phone_number (string)
     *                         email (string)
     *                         guid (string)
     */
    public function add($id, $args)
    {
        $params = [
            'url' => '/groups/' . $id . '/members/add',
            'method' => 'POST',
            'query' => [],
            'payload' => $args,
        ];

        return $this->request($params);
    }

    public function update($group_id, $nickname)
    {
        $params = [
            'url' => "/groups/{$group_id}/memberships/update",
            'method' => 'POST',
            'query' => [],
            'payload' => ['membership' => ['nickname' => $nickname]],
        ];

        return $this->request($params);
    }

    /**
     * Get result of adding a member to a group.
     *
     * @param int|string $group_id
     */
    public function results($group_id, $results_id)
    {
        $params = [
            'url' => '/groups/' . $group_id . '/members/results/' . $results_id,
            'method' => 'GET',
            'query' => [],
        ];

        return $this->request($params);
    }

    /**
     * Remove member from a group.
     *
     * @param int|string $group_id
     * @param string     $user_id
     */
    public function remove($group_id, $user_id)
    {
        $params = [
            'url' => '/groups/' . $group_id . '/members/' . $user_id . '/remove',
            'method' => 'POST',
            'query' => [],
        ];

        return $this->request($params);
    }
}
