PHP Client Library for the Groupme v3 API

Warning: most of this code is untested although it is under development


Example, list index of groups for authenticated user: 

<?php
require('GroupMe.php');

$gm = new GroupMe('APIKEY');

$gm->groups->index(array()); 
?>