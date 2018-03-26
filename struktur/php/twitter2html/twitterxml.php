<?php

$username = $_REQUEST['u'];
$password = $_REQUEST['p'];

$url = 'http://twitter.com/statuses/user_timeline.xml';


$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_URL, "$url");
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERPWD, "$username:$password");
$buffer = curl_exec($curl_handle);
curl_close($curl_handle);

header ("Content-type: text/xml"); // Output file as XML
echo($buffer);
?>