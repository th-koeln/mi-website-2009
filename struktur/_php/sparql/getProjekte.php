<?php

// sparql-query
$query = "Select%2520distinct%2520%3ftitel%2520%3ftyp%2520%3fstart%2520%3fbetreuer%2520%3fmitglied%2520%3fende%2520where%7b%7b%3fx%2520a%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3AForschungsprojekt%253E%7dUNION%7b%3fx%2520a%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ALehrprojekt%253E%7dUNION%7b%3fx%2520a%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3AAbschlussarbeit%253E%7dUNION%7b%3fx%2520a%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ASeminararbeit%253E%7d%2520%3fx%2520a%2520%3ftyp.%2520%3fx%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatTitel%253E%2520%3ftitel.%2520%3fx%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AGestartetAm%253E%2520%3fstart.%2520%3fx%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AWirdBetreutVon%253E%2520%3fbetreuerX.%2520%3fbetreuerX%2520%253Chttp://www.w3.org/2000/01/rdf-schema%2523label%253E%2520%3fbetreuer.%2520%3fx%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatMitglied%253E%2520%3fmitgliedX.%2520%3fmitgliedX%2520%253Chttp://www.w3.org/2000/01/rdf-schema%2523label%253E%2520%3fmitglied%2520OPTIONAL%2520%7b%3fx%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3ABeendetAm%253E%2520%3fende%7d%7d%2522";
#https://mims04.gm.fh-koeln.de/mirdf/model?query=%2522Select%2520distinct%2520?titel%2520?typ%2520?start%2520?betreuer%2520?mitglied%2520?ende%2520where{{?x%2520a%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3AForschungsprojekt%253E}UNION{?x%2520a%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ALehrprojekt%253E}UNION{?x%2520a%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3AAbschlussarbeit%253E}UNION{?x%2520a%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ASeminararbeit%253E}%2520?x%2520a%2520?typ.%2520?x%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AGestartetAm%253E%2520?start.%2520?x%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AWirdBetreutVon%253E%2520?betreuer.%2520?x%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatMitglied%253E%2520?mitglied.%2520?x%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatTitel%253E%2520?titel%2520%2520OPTIONAL%2520{?x%2520%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3ABeendetAm%253E%2520?ende}}%2522

$template = array(
	"titel" => "<p class=\"projekt\">[titel]</p>"
	#"ansprechpartner" => "<p class=\"titel\">[ansprechpartner]</p>"
	#"beschreibung" => "<p class=\"zusammenfassung\"><span>Zusammenfassung:</span> [beschreibung]</p>"
	#"art" => "<p class=\"thema\"><span>Thema:</span> [art]</p>",
	#"studiengang" => "<p class=\"mitglied\"><span>Mitglieder:</span> [studiengang]</p>"
);

$template = array(
	"titel" => "<p class=\"projekt\">[titel]</p>",
	"beschreibung" => "<p class=\"vorschlag\">[beschreibung]</p>",
	"ansprechpartner" => "<p class=\"ansprechpartner\">[ansprechpartner] </p>",
	"art" => "<p class=\"art\">[art] f&uuml;r</p>",
	"studiengang" => "<p class=\"studiengang\">[studiengang]</p>"
	
);


$vergleichsSpalten = array("titel");
$mehrfachEintraegeSpalten = array();

// Query ausführen und Ergebnisse formatiert ausgeben
include 'executeQuery_php4.inc';

?>