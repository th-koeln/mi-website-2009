<?php
$url = $_GET["url"];

header("LOCATION: https://mims04.gm.fh-koeln.de/miwiki-grabber/grab.php?url=".$url);
//header("LOCATION: http://mims02.gm.fh-koeln.de/struktur/php/sparql/testDownloadGet.php?url=data.xml");

?>