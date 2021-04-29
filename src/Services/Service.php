<?php
namespace GroupMePHP\Services;

use GroupMePHP\Client;

class Service
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function request($args)
    {
        return $this->client->request($args);
    }
}
