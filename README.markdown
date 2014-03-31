PHP Client Library for the Groupme v3 API
Warning: This code is untested, under development, and very liable to be modified


Example, list index of groups for authenticated user: 
~~~~~ php
<?php
require('GroupMe.php');

$gm = new GroupMe('APIKEY');

$gm->groups->index(array()); 
?>
~~~~~

Todo:
- Image service uploads
- Image attachment
- Location Attachment
- Emoji Attachment
- Tests
- sms-mode
- decide how to format parameters to be more usable
