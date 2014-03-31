PHP Client Library for the Groupme v3 API
Warning: This code is untested, under development, and very liable to be modified


Example, list index of groups for authenticated user: 
~~~~~ php
<?php
require('groupme.php');

$gm = new groupme('APIKEY');

$gm->groups->index(array()); 
?>
~~~~~

Todo:
- Image service uploads
- Image attachment
- Location Attachment
- Emoji Attachment
- Tests
- decide how to format parameters to be more usable
