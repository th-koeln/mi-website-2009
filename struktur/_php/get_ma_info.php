<?php

$file;
$inhalt;

$handle = fopen ($url, "r");
while (!feof($handle)) {
	$buffer = fgets($handle, 4096);
	$inhalt .= "$buffer\n";	
}
fclose ($handle);
	

#$inhalt =  file_get_contents("../..".$file);

# Das Suchmuster fischt den eigentlichen Content aus der Datei
$suchmuster = ':<table class="person">(.*?)</table>:is';

preg_match($suchmuster, $inhalt, $treffer);
$html = $treffer[1];

$html = preg_replace("/<a href=\"jav.*?\/a>/", "", $html);
#$html = "<table class=\"person\">$html</table>";
echo $html;


?>
