<?php


################################################################
# Config
################################################################


$server = "mims04.gm.fh-koeln.de/mirdf/model";
$user = "mirapuser";
$pass = "knin7as2dok2ub2geut7dirv1ip5bev9nan6jo";
if(!isset($query)){ $query = "Select%20Distinct%20?projekt%20?Titel%20?Zusammenfassung%20?Thema%20?Mitglied%20?Bezug%20?Betreuer%20Where{%20?projekt%20?p%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Kategorie-3AForschungsprojekt%3E.%20?projekt%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Attribut-3AIstSichtbar%3E%20true%20.%20?projekt%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Attribut-3AHatTitel%3E%20?Titel.%20?projekt%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Attribut-3AHatZusammenfassung%3E%20?Zusammenfassung.%20OPTIONAL%20{%20?projekt%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Attribut-3AHatThema%3E%20?Thema}.%20?projekt%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Attribut-3AHatMitglied%3E%20?Mitglied.%20?projekt%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Attribut-3ABeziehtSichAuf%3E%20?Bezug.%20?projekt%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Attribut-3AWirdBetreutVon%3E%20?Betreuer.}"; }
$query ="%22Select%20?nachricht%20?datum%20?bezug%20?autor%20where%20%7B?x%20%3Chttp://www.w3.org/1999/02/22-rdf-syntax-ns%23type%3E%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ANachricht%3E.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3ANachricht%3E%20?nachricht.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatDatum%3E%20?datum.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatAutor%3E%20?autor.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatBezug%3E%20?bezug%20%7D%2";

$template = array(
	"nachricht" => "<p class=\"nachricht\">[nachricht]</p>",
	"autor" => "<p class=\"autor\">[autor]</p>",
	"datum" => "<p class=\"datum\">[datum]</p>",
	"bezug" => "<p class=\"bezug\">[bezug]</p>"
);

$monate = array(
	"01" => "Januar",
	"02" => "Februar",
	"03" => "M&auml;rz",
	"04" => "April",
	"05" => "Mai",
	"06" => "Juni",
	"07" => "Juli",
	"08" => "August",
	"09" => "September",
	"10" => "Oktober",
	"11" => "November",
	"12" => "Dezember"
);

$url_replacement = "Spezial:URIResolver";

// SPARQL-Anfrage
$url="https://$user:$pass@$server?query=$query";


################################################################
# Subs
################################################################


function ENTITIES( $text ) {
	
	$text = htmlentities($text,ENT_QUOTES,"UTF-8");
	
	# schoenes Datum machen
	$text = preg_replace("=(....)-(..)-(..)T..\:..\:..=", "$3.$2.$1", $text);
	
	# Resolver aufhuebschen
	while( preg_match("=(.*?)URIResolver\/(.*)=", $text, $temp)){
		$link = $temp[1] . "URIRESOLVER/" . $temp[2];
		$name = preg_replace("=_=", " ", $temp[2]);
		$text = preg_replace("=(.*?)URIResolver\/(.*)=", "<a href=\"$link\">$name</a>", $text);
	}
	$text = str_replace("URIRESOLVER", "URIResolver", $text);
	
	return $text;
}


################################################################
# Main
################################################################


# XML holen
$xml = domxml_open_mem(file_get_contents($url));
#print $xml->dump_mem(true); exit;

# Variablen holen
$node_array = $xml->get_elements_by_tagname("variable");
$vars = array();
foreach ($node_array as $node){
	array_push( $vars, $node->get_attribute("name") );
}

# Daten holen
$node_array = $xml->get_elements_by_tagname("result");
$content = array();
foreach ($node_array as $node){
	foreach($node->get_elements_by_tagname("binding") as $child){
		$content[$child->get_attribute('name')] = ENTITIES($child->get_content());
	}
	
	foreach ($template as $key=>$value){
		$temp = $value;
		$temp = preg_replace("=\[$key]=", $content[$key], $temp);
		print "$temp\n";
	}
	print "<hr />";
}


?>