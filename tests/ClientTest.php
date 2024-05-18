<?php

namespace GroupMePHP\Tests;

use GroupMePHP\Client;
use GroupMePHP\GroupmeException;
use GroupMePHP\Services\GroupsService;
use GroupMePHP\Services\MembersService;
use GroupMePHP\Services\MessagesService;
use GroupMePHP\Services\UsersService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Dotenv\Dotenv;

class ClientTest extends TestCase
{
    /** @var Client */
    private $client;

    public function setUp(): void
    {
        parent::__construct();
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/.env');
        $token = $_ENV['GROUPME_TOKEN'];
        $this->client = new Client($token);
    }

    public function testSimpleQueryString()
    {
        $client = new Client('token');
        $queryString = $client->buildQueryString();
        self::assertEquals('?token=token', $queryString);
    }

    public function testComplexQueryString()
    {
        $client = new Client('token');
        $args = ['a' => 1, 'b' => 2];
        $queryString = $client->buildQueryString($args);
        self::assertEquals('?a=1&b=2&token=token', $queryString);
    }

    public function testGetMe()
    {
        $user_service = new UsersService($this->client);
        $response = $user_service->get();
        self::assertNotNull($response);
        self::assertEquals($_ENV['TEST_USER_ID'], $response['id']);
    }

    public function testGetGroup()
    {
        $group_service = new GroupsService($this->client);
        $response = $group_service->show($_ENV['TEST_GROUP_ID']);
        self::assertNotNull($response);
        self::assertEquals($_ENV['TEST_GROUP_ID'], $response['id']);
    }

    public function testSendMessageToGroup()
    {
        $messages_service = new MessagesService($this->client);
        $response = $messages_service->create($_ENV['TEST_GROUP_ID'], [uniqid('test'), 'Hello Group']);
        self::assertNotNull($response);
        self::assertEquals($response['message']['text'], 'Hello Group');
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
        $response = $group_service->show($_ENV['TEST_GROUP_ID']);
        $members = $response['members'];
        self::assertNotNull($members);
    }

    public function testAddGroupMembers()
    {
        $members_service = new MembersService($this->client);
        try {
            $response = $members_service->add(1234567, [
                'members' => [
                    ['nickname' => 'Test User', 'user_id' => '12345678'],
                ],
            ]);
        } catch (GroupmeException $ex) {
            self::assertEquals(401, $ex->getCode());
        }
    }
}
