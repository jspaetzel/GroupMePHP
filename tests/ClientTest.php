<?php

namespace GroupMePHP\Tests;

use Dotenv\Dotenv;
use GroupMePHP\Client;
use GroupMePHP\Services\DirectMessagesService;
use GroupMePHP\Services\GroupsService;
use GroupMePHP\Services\MessagesService;
use GroupMePHP\Services\UsersService;
use PHPUnit_Framework_TestCase;

class ClientTest extends PHPUnit_Framework_TestCase
{
    /** @var Client */
    private $client;

    public function __construct()
    {
        parent::__construct();
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        $token = $_ENV['GROUPME_TOKEN'];
        $this->client = new Client($token);
    }

    public function testSimpleQueryString()
    {
        $args = array();
        $queryString = $this->client->buildQueryString($args);
        self::assertEquals("?token=token", $queryString);
    }

    public function testComplexQueryString()
    {
        $args = array('a' => 1, 'b' => 2);
        $queryString = $this->client->buildQueryString($args);
        self::assertEquals("?a=1&b=2&token=token", $queryString);
    }

    public function testGetMe()
    {
        $user_service = new UsersService($this->client);
        $response = $user_service->get();
        self::assertNotNull($response);
    }

    public function testSendMessageToGroup()
    {
        $messages_service = new MessagesService($this->client);
        $response = $messages_service->create(12345678, ["THISISAGUID123", "Hello Group"]);
        self::assertNotNull($response);
    }

    public function testSendDirectMessage()
    {
        $direct_message_service = new DirectMessagesService($this->client);
        $response = $direct_message_service->create([
            "source_guid" => "THISISAGUID123",
            "recipient_id" => '12345678',
            "text" => 'Hello User'
        ]);
        self::assertNotNull($response);
    }

    public function testGetUserGroupIndex()
    {
        $group_service = new GroupsService($this->client);
        $response = $group_service->index();
        self::assertNotNull($response);
    }

    public function testGetGroupMembers()
    {
        $group_service = new GroupsService($this->client);
        $response = $group_service->show(1234567);
        $members = json_decode($response, true)['response']['members'];
        self::assertNotNull($members);
    }
}
