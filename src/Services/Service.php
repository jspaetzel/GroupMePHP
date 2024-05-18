<?php

namespace GroupMePHP\Services;

use GroupMePHP\Client;
use GroupMePHP\GroupmeException;

class Service
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function request($args): array
    {
        $body = $this->client->request($args);
        $container = json_decode($body, true);
        if (in_array($container['meta']['code'], [200, 201])) {
            return $container['response'];
        }
        throw new GroupmeException($container['meta']['errors'][0], $container['meta']['code']);
    }
}
