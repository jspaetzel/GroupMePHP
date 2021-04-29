<?php
namespace GroupMePHP\Services;

class UsersService extends Service
{

    /**
     * me: Get details about the authenticated user.
     *
     * @return string $return
     *
     */
    public function get()
    {
        $params = array(
            'url' => '/users/me',
            'method' => 'GET',
            'query' => array()
        );

        return $this->request($params);
    }
}
