<?php

$username = "micologne";  // Your Twitter username
$password = "miwebsite";  // Your Twitter password
$maxitems = "800";  // How many items to show on the page
$scripturl = "http://www.medieninformatik.fh-koeln.de/struktur/php/twitter2html/"; // Full URL to this script, including trailing slash


// THAT'S IT -- DON'T EDIT ANYTHING BELOW THIS LINE

$feedurl = $scripturl . "twitterxml.php?u=" . $username . "&p=" . $password;

error_reporting(E_ALL&(~E_NOTICE));
$configs=array();
$configs[feed]=$feedurl;
$configs[template]="template.html";
$configs[maxitems]=$maxitems;
require_once("feedparse.php");
?>


<p><?=easyfeeder($configs)?></p>
