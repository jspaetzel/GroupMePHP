## Unofficial PHP Client Library for the GroupMe v3 API

Install with [Composer](https://getcomposer.org/)
~~~~~bash
composer require jspaetzel/groupme
~~~~~

Then use the autoloader to load this library in your code
~~~~~php
require './vendor/autoload.php';
~~~~~

### Examples
These are some basic examples for how to interact with the api via the library.
The APIKEY in these examples is the API key of a user, not a groupme bot key or application key.

#### For all requests you'll need create a Client
~~~~~php
$client = new \GroupMePHP\Client('APIKEY');
~~~~~

#### Send a message to a group
~~~~~php
$message_to_send = "Hello Group!"
$messages_service = new \GroupMePHP\Services\MessagesService($client);
$messages_service->create(12345678, ["THISISAGUID123", $message_to_send]);
~~~~~

#### Send a direct message to a user
~~~~~php
$direct_message_service = new \GroupMePHP\Services\DirectMessagesService($client);
$direct_message_service->create([
    "source_guid" => "THISISAGUID123",
    "recipient_id" => 12345678,
    "text" => 'Hello User'
]);
~~~~~

#### Get index of groups for authenticated user
~~~~~php
$group_service = new \GroupMePHP\Services\GroupsService($client);
$response = $group_service->index();
~~~~~

#### Get only the members of a group as json
~~~~~php
$group_service = new \GroupMePHP\Services\GroupsService($client);
$response = $group_service->show(1234567);
$members = json_decode($response)['response']['members'];
~~~~~

### Want to contribute?
See the [contribution guide](./CONTRIBUTING.md)
