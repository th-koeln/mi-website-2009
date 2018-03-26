<?php

$url = "../../../../../website/general/navigation/sitemap_103/de/de_sitemap_articl_1.php";
$inhalt =  file_get_contents($url);

# Das Suchmuster fischt die Links aus der HTML-Seite raus
$suchmuster = '/<div id="footer">(.*?)<\/div>/is';
preg_match($suchmuster, $inhalt, $treffer);

# Bitte brs entfernen
$suchmuster = '/<br \/>/';
preg_replace($suchmuster, "" , $treffer[1]);

$suchmuster = '/<p class="einfach float"><\/p><ul>/';
echo preg_replace($suchmuster, "<ul class=\"einfach float\">" , $treffer[1]);



?>
<br style="clear: both" />
