<?php
namespace GroupMePHP;

class leaderboard extends client {

    /**
     * A list of the liked messages in the group for a given period of time. Messages are ranked in order of number of likes.
     *
     * @param string $group_id
     * @param string $period <day|week|month|>
     *
     * @return string $return
     *
     */
    public function index($group_id, $period){
        $params = array(
            'url' => "/groups/$group_id/likes?period=$period",
            'method' => 'GET',
            'query' => array(),
        );

        return $this->request($params);
    }

    /**
     * A list of messages you have liked. Messages are returned in reverse chrono-order. Note that the payload includes a liked_at timestamp in ISO-8601 format.
     *
     * @param string $group_id
     *
     * @return string $return
     *
     */
    public function myLikes($group_id){
        $params = array(
            'url' => "/groups/$group_id/likes/mine",
            'method' => 'GET',
            'query' => array(),
        );

        return $this->request($params);
    }

    /**
     * A list of messages you have liked. Messages are returned in reverse chrono-order. Note that the payload includes a liked_at timestamp in ISO-8601 format.
     *
     * @param string $group_id
     *
     * @return string $return
     *
     */
    public function myHits($group_id){
        $params = array(
            'url' => "/groups/$group_id/likes/for_me",
            'method' => 'GET',
            'query' => array(),
        );

        return $this->request($params);
    }
}
?>
