<?php 

$url = "website/general/navigation/index_datei_2/de/de_index_datei_articl_1.php";
$inhalt =  file_get_contents($url);

#Das $Suchmuster fischt die Tabelle aus der HTML-Seite raus
$suchmuster = '/<div id="navigation">.*?href=".*?website(.*?)"/is';
preg_match($suchmuster, $inhalt, $treffer);

header("location:website" . $treffer[1]);
?> 