<?php
namespace GroupMePHP\Services;

class UsersService extends Service
{
    /**
     * Get details about the authenticated user.
     *
     * @return string
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
