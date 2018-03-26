<?php

// sparql-query
$query = "%22Select%20?bezeichnung%20?aktuelleVeranstaltung%20?zusammenfassung%20Where{%20?training%20?p%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3AASS%3E.%20?training%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AIstAktiv%3E%20true.%20?training%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatBezeichnung%3E%20?bezeichnung.%20?training%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatZusammenfassung%3E%20?zusammenfassung.%20?training%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AAktuelleVeranstaltung%3E%20?aktuelleVeranstaltung.}";

$template = array(
	"bezeichnung" => "<p class=\"bezeichnung\">[bezeichnung]</p>",
	"aktuelleVeranstaltung" => "<p class=\"aktuelleVeranstaltung\">[aktuelleVeranstaltung] </p>",
	"zusammenfassung" => "<p class=\"zusammenfassung\">[zusammenfassung] </p>"
);


$vergleichsSpalten = array("bezeichnung"); // durch welche(s) Attribut(e) kann man einen Eintrag eindeutig identifizieren
$mehrfachEintraegeSpalten = array(); // welche Attribute können Mehrfachnennungen haben
$stripResolver = array("aktuelleVeranstaltung"); // welche Attribute sind Links und sollen NICHT als Link angezeigt werden?


// Query ausführen und Ergebnisse formatiert ausgeben
include 'executeQuery_php4.inc';

?>