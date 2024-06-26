<?php

namespace GroupMePHP\Services;

class LeaderboardService extends Service
{
    /**
     * A list of the liked messages in the group for a given period of time. Messages are ranked in order of number of likes.
     *
     * @param string $group_id
     * @param string $period   <day|week|month|>
     */
    public function index($group_id, $period)
    {
        $params = [
            'url' => "/groups/{$group_id}/likes?period={$period}",
            'method' => 'GET',
            'query' => [],
        ];

        return $this->request($params);
    }

    /**
     * A list of messages you have liked. Messages are returned in reverse chrono-order. Note that the payload includes a liked_at timestamp in ISO-8601 format.
     *
     * @param string $group_id
     */
    public function myLikes($group_id)
    {
        $params = [
            'url' => "/groups/{$group_id}/likes/mine",
            'method' => 'GET',
            'query' => [],
        ];

        return $this->request($params);
    }

    /**
     * A list of messages you have liked. Messages are returned in reverse chrono-order. Note that the payload includes a liked_at timestamp in ISO-8601 format.
     *
     * @param string $group_id
     */
    public function myHits($group_id)
    {
        $params = [
            'url' => "/groups/{$group_id}/likes/for_me",
            'method' => 'GET',
            'query' => [],
        ];

        return $this->request($params);
    }
}
