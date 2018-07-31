## Unofficial PHP Client Library for the Groupme v3 API

Install with composer
~~~~~
"jspaetzel/groupme": "dev-master"
~~~~~

### Examples
These are some basic examples for how to interact with the api via the library.
The APIKEY in these examples is the API key of a user, not a groupme bot key or application key.

#### Send a message to a group
~~~~~ php
require('groupme.php');
function send($group_id, $message) {
    $gm = new GroupMePHP\groupme('APIKEY');
    $gm->messages->create(
        $group_id,
        array("THISISAGUID123", $message)
    );
}
send(12345678, "Hello Group");
~~~~~

#### Send a direct message to a user
~~~~~ php
require('groupme.php');
function dm($user_id, $message) {
    $gm = new GroupMePHP\groupme('APIKEY');
    $gm->directmessages->create(
        array(
            "source_guid" => "THISISAGUID123",
            "recipient_id" => $user_id,
            "text" => $message
        )
    );
}
dm(12345678, "Hello User");
~~~~~


#### Get index of groups for authenticated user:
~~~~~ php
require('groupme.php');
$gm = new GroupMePHP\groupme('APIKEY');

$index = $gm->groups->index(array());
~~~~~

#### Get only the members of a group as json
~~~~~ php
$group_id = 1234567;
require('groupme.php');
$gm = new GroupMePHP\groupme('APIKEY');
echo json_decode($gm->groups->show($group_id), true)['response']['members'];
~~~~~

#### Todo:
- Image service uploads
- Emojis
- Tests
- Abstract away some of the complex arrays that are currently used with parameters
