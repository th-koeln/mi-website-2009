<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 <head>
  <title>Abschlussarbeiten</title>

		
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
$query = "%22Select%20distinct%20%3Ftitel%20%3Fautor%20%3Fbetreuer%20%3Fjahr%20%3Fzusammenfassung%20%3Fpdf%20where%7B%20%3Fx%20a%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FKategorie-3AAbschlussarbeit%3E%20.%20%3Fx%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FAttribut-3AIstSichtbar%3E%20true.%20%3Fx%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FAttribut-3AHatTitel%3E%20%3Ftitel.%20%3Fx%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FAttribut-3AHatMitglied%3E%20%3FautorX.%20%3FautorX%20%3Chttp%3A%2F%2Fwww.w3.org%2F2000%2F01%2Frdf-schema%23label%3E%20%3Fautor.%20%3Fx%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FAttribut-3AWirdBetreutVon%3E%20%3FbetreuerX.%20%3FbetreuerX%20%3Chttp%3A%2F%2Fwww.w3.org%2F2000%2F01%2Frdf-schema%23label%3E%20%3Fbetreuer.%20OPTIONAL%20%7B%3Fx%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FAttribut-3AHatJahr%3E%20%3Fjahr%7D%20OPTIONAL%20%7B%3Fx%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FAttribut-3AHatUri%3E%20%3Fpdf%7D%20OPTIONAL%20%7B%3Fx%20%3Chttp%3A%2F%2Fwww.medieninformatik.fh-koeln.de%2Fmiwiki%2FSpezial%3AURIResolver%2FAttribut-3AHatZusammenfassung%3E%20%3Fzusammenfassung%7D%20%7D%22";

$template = array(
	"titel" => "<p class=\"titel\">Titel: [titel]</p>"
	//,"start" => "<p class=\"start\">Start: [start]</p>" 
	//,"ende" => "<p class=\"ende\">Ende: [ende]</p>"
	,"autor" => "<p class=\"autor\">Autor: [autor]</p>"
	,"betreuer" => "<p class=\"betreuer\">Betreuer: [betreuer]</p>"
	,"jahr" => "<p class=\"jahr\">Jahr: [jahr]</p>"
	,"zusammenfassung" => "<p class=\"zusammenfassung\">Zusammenfassung: [zusammenfassung]</p>"
	,"pdf" => "<p class=\"pdf\">Pdf: [pdf]</p>"
	//,"thema" => "<p class=\"thema\">Thema: [thema]</p>"
);



$vergleichsSpalten = array("titel");
$mehrfachEintraegeSpalten = array("betreuer","autor");

// Query ausführen und Ergebnisse formatiert ausgeben
include 'executeQuery_php4_new.inc';


?>

</body>
</html>