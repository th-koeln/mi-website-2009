<?php

// sparql-query
$query = "%2522Select%20distinct%20?bezeichnung%20?beschreibung%20?ansprechpartner%20?art%20?studiengang%20where%7b?x%20a%20%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3AVorschlag%253E.%20?x%20?y%20?z.%20?x%20%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatAnsprechpartner%253E%20?ansprechpartner.%20?x%20%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatArt%253E%20?art.%20?x%20%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatStudiengang%253E%20?studiengang.%20?x%20%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatBeschreibung%253E%20?beschreibung%20.%20?x%20%253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatBezeichnung%253E%20?bezeichnung%20%7d";
#https://mims04.gm.fh-koeln.de/mirdf/model?query=%2522Select distinct ?titel ?typ ?start ?betreuer ?mitglied ?ende where{{?x a %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3AForschungsprojekt%253E}UNION{?x a %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ALehrprojekt%253E}UNION{?x a %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3AAbschlussarbeit%253E}UNION{?x a %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ASeminararbeit%253E} ?x a ?typ. ?x %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AGestartetAm%253E ?start. ?x %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AWirdBetreutVon%253E ?betreuer. ?x %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatMitglied%253E ?mitglied. ?x %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatTitel%253E ?titel  OPTIONAL {?x %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3ABeendetAm%253E ?ende}}%2522
#https://mims04.gm.fh-koeln.de/mirdf/model?query=%2522Select distinct ?x ?typ ?start ?betreuer ?mitglied ?ende where%7b%7b?x a %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3AForschungsprojekt%253E%7dUNION%7b?x a %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ALehrprojekt%253E%7dUNION%7b?x a %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3AAbschlussarbeit%253E%7dUNION%7b?x a %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ASeminararbeit%253E%7d ?x a ?typ. ?x %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AGestartetAm%253E ?start. ?x %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AWirdBetreutVon%253E ?betreuer. ?x %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatMitglied%253E ?mitglied. OPTIONAL %7b?x %253Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3ABeendetAm%253E ?ende%7d%7d%2522
#https://mims04.gm.fh-koeln.de/mirdf/model?query= Select distinct ?typ ?start ?betreuer ?mitglied ?ende where{{?x a  http://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3AForschungsprojekt }UNION{?x a  http://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ALehrprojekt }UNION{?x a  http://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3AAbschlussarbeit }UNION{?x a  http://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ASeminararbeit } ?x a ?typ. ?x  http://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AGestartetAm  ?start. ?x  http://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AWirdBetreutVon  ?betreuer. ?x  http://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatMitglied  ?mitglied. ?x  http://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatTitel  ?titel  OPTIONAL {?x  http://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3ABeendetAm  ?ende}} 

$template = array(
	"bezeichnung" => "<p class=\"titel\">[bezeichnung]</p>",
	"beschreibung" => "<p class=\"vorschlag\">[beschreibung]</p>",
	"ansprechpartner" => "<p class=\"ansprechpartner\">[ansprechpartner] </p>",
	"art" => "<p class=\"art\">[art] f&uuml;r</p>",
	"studiengang" => "<p class=\"studiengang\">[studiengang]</p>"
	
);


$vergleichsSpalten = array("bezeichnung");
$mehrfachEintraegeSpalten = array("studiengang");
$stripResolver = array("art","studiengang", "ansprechpartner");

// Query ausführen und Ergebnisse formatiert ausgeben
include 'executeQuery_php4.inc';

?>