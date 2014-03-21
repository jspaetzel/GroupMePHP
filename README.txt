PHP Client Library for the Groupme v3 API
Warning: This code is untested, under development, and very liable to be modified


Example, list index of groups for authenticated user: 
<code>
<?php
require('GroupMe.php');

$gm = new GroupMe('APIKEY');

$gm->groups->index(array()); 
?>
<code>