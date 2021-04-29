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
        $params = [
            'url' => '/users/me',
            'method' => 'GET',
            'query' => [],
        ];

        return $this->request($params);
    }
}
