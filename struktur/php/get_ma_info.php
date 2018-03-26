<?php

$file;
$inhalt;

$curl = curl_init ();
curl_setopt ($curl, CURLOPT_URL, $url);
curl_setopt ($curl, CURLOPT_HEADER, 0);
curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
$inhalt = curl_exec ($curl);
curl_close($curl);

# Das Suchmuster fischt den eigentlichen Content aus der Datei
$suchmuster = ':<table class="person">(.*?)</table>:is';

preg_match($suchmuster, $inhalt, $treffer);
$html = $treffer[1];

$html = preg_replace("/<a href=\"jav.*?\/a>/", "", $html);
#$html = "<table class=\"person\">$html</table>";
echo $html;


?>
