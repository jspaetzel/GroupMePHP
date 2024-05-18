<?php

namespace GroupMePHP\Services;

class UsersService extends Service
{
    /**
     * Get details about the authenticated user.
     */
    public function get(): array
    {
        $params = [
            'url' => '/users/me',
            'method' => 'GET',
            'query' => [],
        ];

        return $this->request($params);
    }
}
