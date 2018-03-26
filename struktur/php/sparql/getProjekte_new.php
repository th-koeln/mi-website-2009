<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 <head>
  <title>Projekte neu</title>

		
<style type="text/css">
	div {
		margin-bottom: 30px;
		background-color: #999999;
	}
</style>

<body>

<?php
// sparql-query
// https://mirapuser:knin7as2dok2ub2geut7dirv1ip5bev9nan6jo@mims04.gm.fh-koeln.de/mirdf/model?query
$query = "%22Select%20distinct%20%3Ftitel%20%3Fmitglied%20%3Fzusammenfassung%20%3Fbezug%20where%7B%0A%7B%3Fx%20a%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FKategorie-3AForschungsprojekt%3E%7D%0AUNION%7B%3Fx%20a%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FKategorie-3ALehrprojekt%3E%7D%0AUNION%7B%3Fx%20a%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FKategorie-3ASeminararbeit%3E%7D%20%3Fx%20a%20%3Ftyp.%0A%3Fx%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FAttribut-3AHatTitel%3E%20%3Ftitel.%0A%3Fx%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FAttribut-3AHatMitglied%3E%0A%3FmitgliedX.%20%3FautorX%20%3Chttp%3A%2F%2Fwww.w3.org%2F2000%2F01%2Frdf-schema%23label%3E%20%3Fmitglied.%20%0AOPTIONAL%20%7B%3Fx%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FAttribut-3AHatZusammenfassung%3E%20%3Fzusammenfassung%7D%0AOPTIONAL%20%7B%3Fx%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FAttribut-3ABeziehtSichAuf%3E%20%3FbezugX.%20%0A%3FbezugX%20%3Chttp%3A%2F%2Fwww.w3.org%2F2000%2F01%2Frdf-schema%23label%3E%20%3Fbezug%7D%0A%7D%22";

$template = array(
	"titel" => "<p class=\"titel\">Titel: [titel]</p>"
	,"mitglied" => "<p class=\"mitglied\">Mitglieder: [mitglied]</p>"
	//,"betreuer" => "<p class=\"betreuer\">Betreuer: [betreuer]</p>"
	,"zusammenfassung" => "<p class=\"zusammenfassung\">Zusammenfassung: [zusammenfassung]</p>"
	,"bezug" => "<p class=\"bezug\">Bezug: [bezug]</p>"
);



$vergleichsSpalten = array("titel");
//$mehrfachEintraegeSpalten = array("betreuer","mitglied");
$mehrfachEintraegeSpalten = array("mitglied");

// Query ausführen und Ergebnisse formatiert ausgeben
include 'executeQuery_php4_new.inc';


?>

</body>
</html>