<?php

/*

Dieses kleine Script wird angesto§en um die aktualisierten Wiki News zu holen und zwischenzuspeichern.
Aufruf: http://mims02.gm.fh-koeln.de/struktur/php/sparql/trigger_wiki.php
cn, 12.2009

*/

$server = $_SERVER["SERVER_NAME"];
$skript = $_SERVER["PHP_SELF"];
preg_match("/(.*)\//", $skript, $temp);
$pfad = $temp[1];

# Verzeichnis auslesen und get* Skript laufen lassen, die in diesem Fall die XML Daten aus dem Wiki ziehen und abspeichern. 
$odir = opendir("./");
$files = array();
while ($entry = readdir($odir)) {
    if(preg_match("=^get*=", $entry)){
    	array_push($files, $entry);
    }
}
closedir($odir);

foreach($files as $file){ $data = file_get_contents("http://$server/$pfad/$file?modus=update_xml"); }

?>