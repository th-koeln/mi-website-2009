<?php

// sparql-query
$query ="%22Select%20?nachricht%20?autor%20?datum%20?bezug%20where%20%7B?x%20%3Chttp://www.w3.org/1999/02/22-rdf-syntax-ns%23type%3E%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ANachricht%3E.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3ANachricht%3E%20?nachricht.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatDatum%3E%20?datum.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatAutor%3E%20?autor.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatBezug%3E%20?bezug%20%7DORDER%20BY%20DESC(?datum)";


$template = array(
	"nachricht" => "<p class=\"nachricht\">[nachricht]</p>",
	"autor" => "<p class=\"autor\">[autor]</p>",
	"datum" => "<p class=\"datum\">[datum]</p>"
	#"bezug" => "<p class=\"bezug\">[bezug]</p>"
);


$vergleichsSpalten = array("nachricht");

$mehrfachEintraegeSpalten = array("bezug");

// Query ausf�hren und Ergebnisse formatiert ausgeben
include 'executeQuery_php4.inc';

?>