<?php

// sparql-query
$query = "%22Select%20distinct%20?nachricht%20?autor%20?datum%20?bezug%20?bezug2%20where%20{{?x%20a%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ANachricht%3E.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3ANachricht%3E%20?nachricht.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatDatum%3E%20?datum.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatAutor%3E%20?autor.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatBezug%3E%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Bachelor%3E.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatBezug%3E%20?bezug2}%20UNION%20{?x%20a%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ANachricht%3E.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3ANachricht%3E%20?nachricht.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatDatum%3E%20?datum.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatAutor%3E%20?autor.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatBezug%3E%20?bezug.%20?bezug%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AVeranstaltungDesModuls%3E%20?q.%20?q%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AIstVeranstaltungImStudiengang%3E%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Bachelor%3E}}%20ORDER%20BY%20DESC(?datum)";


$template = array(
	"nachricht" => "<p class=\"nachricht\">[nachricht]</p>",
	"autor" => "<p class=\"autor\">[autor], </p>",
	"datum" => "<p class=\"datum\">[datum]</p>"
	#,	"bezug2" => "<p class=\"bezug\">[bezug2]</p>"
);


$vergleichsSpalten = array("nachricht");
$mehrfachEintraegeSpalten = array("bezug2","bezug");
$stripResolver = array("autor", "bezug2");

// Query ausführen und Ergebnisse formatiert ausgeben
include 'executeQuery_php4.inc';

?>