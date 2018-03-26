<?php

// sparql-query
$query = "%22Select%20distinct%20?unternehmen%20?bezeichnung%20?datum%20where%20{{?x%20a%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3AStellenausschreibung%3E.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AEingestelltVonUnternehmen%3E%20?unternehmen.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatBezeichnung%3E%20?bezeichnung.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatEinstellungsdatum%3E%20?datum.}";


$template = array(
	"unternehmen" => "<p class=\"unternehmen\">[unternehmen]</p>",
	"bezeichnung" => "<p class=\"bezeichnung\">[bezeichnung]</p>",
	"datum" => "<p class=\"datum\">Eingestellt am: [datum]</p>"
);


$vergleichsSpalten = array("unternehmen");
$mehrfachEintraegeSpalten = array();
$stripResolver = array("autor", "bezug2");

// Query ausführen und Ergebnisse formatiert ausgeben
include 'dev_executeQuery_php4.inc';

?>