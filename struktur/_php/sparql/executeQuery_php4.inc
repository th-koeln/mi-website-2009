<?php


################################################################
# Config
################################################################


$root = "mims04.gm.fh-koeln.de";
$server = "$root/mirdf/model";
$user = "mirapuser";
$pass = "knin7as2dok2ub2geut7dirv1ip5bev9nan6jo";

//https://mirapuser:knin7as2dok2ub2geut7dirv1ip5bev9nan6jo@mims04.gm.fh-koeln.de/mirdf/model?query=%22Select%20distinct%20?nachricht%20?autor%20?datum%20?bezug%20?bezug2%20where%20{{?x%20a%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ANachricht%3E.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3ANachricht%3E%20?nachricht.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatDatum%3E%20?datum.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatAutor%3E%20?autor.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatBezug%3E%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Bachelor%3E.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatBezug%3E%20?bezug2}%20UNION%20{?x%20a%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Kategorie-3ANachricht%3E.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3ANachricht%3E%20?nachricht.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatDatum%3E%20?datum.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatAutor%3E%20?autor.%20?x%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AHatBezug%3E%20?bezug.%20?bezug%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AVeranstaltungDesModuls%3E%20?q.%20?q%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Attribut-3AIstVeranstaltungImStudiengang%3E%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/Spezial:URIResolver/Bachelor%3E}}%20ORDER%20BY%20DESC(?datum)

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


function STRIP_RESOLVER( $text ) {
	
	$text = preg_replace("=<a.*?>(.*)</a>=", "$1", $text);
	return $text;
}

function URL( $text ) {
	
	$text = preg_replace("=http://(.*?)$=", "<a href=\"$1\">$1</a>", $text);
	return $text;
}

function isMehrfachSpalte($actualNodeName)
{
   global $mehrfachEintraegeSpalten;
   
   return in_array($actualNodeName,$mehrfachEintraegeSpalten);
}



function printResults($i)
{
    global $template;
	global $mehrfachEintraegeSpalten;
	global $content;
	
	
    $j = 0;
    
    print "<div>";
    
    foreach ($template as $indexName=>$key)
	{
	
	  // Wenn Mehrfachspalte
	  if( isMehrfachSpalte($indexName) )
	  {
	    // Alle Einträge kommaseperiert in String schreiben
		$maxEintraege = sizeof($content[$i][$j]);
		
        $alleEintraege = "";
		for($k=0;$k<$maxEintraege;$k++)
		{
		  $alleEintraege.= $content[$i][$j][$k];
		  
          // bei allen außer dem letzen Eintrag komma setzen
          if($k < $maxEintraege-1)
		    $alleEintraege.= ", ";
		  
		}
		
		$temp = preg_replace("=\[$indexName]=", $alleEintraege, $template[$indexName] );
	    print URL($temp)."\n";
	  
	  }
	  // Keine Mehrfachspalte
	  else
	  {
	    $temp = preg_replace("=\[$indexName]=", $content[$i][$j][0], $template[$indexName] );
	    print URL($temp)."\n"; 
	  }	
	
		
		
	  $j++;
	} // ende zeile
	print "</div>";
}


  // Vergleichsfunktion
  function vergleich($wert_a, $wert_b) 
  { 
    // Sortierung nach Datum
    $a = new DateTime($wert_a[2][0]);
    $b = new DateTime($wert_b[2][0]);

	
    // Daten vergleichen
    if ($a == $b)
      return 0;
 
    return ($a < $b) ? 1 : -1;
  }

################################################################
# Main
################################################################


# XML holen
$xml = DOMDocument::loadXML(file_get_contents($url));


# Variablen holen
$node_array = $xml->getElementsByTagName("variable");
$vars = array();
foreach ($node_array as $node){
	array_push( $vars, $node->getAttribute("name") );
	# print $node->getAttribute("name") ."<hr>";
}




$zeile = -1; // -1, anstatt 0, wegen 1.Zeile
$spalte = 0;

$vergleichsSpaltenInhalte = array();
for($i=0;$i<sizeof($vergleichsSpalten);$i++) // Felder mit Leerzeichen füllen, ansonsten wird Notice ausgegeben
  $vergleichsSpaltenInhalte[$i] = " ";
  
$vergleichsSpaltenInhalteCounter = 0;
$vergleichsSpaltenCounter = 0;



# Daten holen
$node_array = $xml->getElementsByTagName("result");
$content = array(); // 3D-Array(3.Dimension für MehrfachEinträge)
foreach ($node_array as $node)
{
	foreach($node->getElementsByTagName("binding") as $child)
	{
		$actualNodeValue = ENTITIES($child->nodeValue);
		$actualNodeName = $child->getAttribute('name');
		
		if($stripResolver){
			foreach($stripResolver as $check_strip){
				if($actualNodeName == $check_strip){ $actualNodeValue = STRIP_RESOLVER($actualNodeValue); }
			}
		}
		
		// Vergleichsspalten
		$textGleich = true;
		if( $actualNodeName == $vergleichsSpalten[$vergleichsSpaltenCounter] )
		{
		   //echo "Vergleichsspalte: ". $actualNodeName."<br></br>";
		   
		   
		   // Wenn Text gleich ist
		   if( $actualNodeValue == $vergleichsSpaltenInhalte[$vergleichsSpaltenInhalteCounter] )
		   {
		     $vergleichsSpaltenInhalte[$vergleichsSpaltenInhalteCounter] = $actualNodeValue;
		     //echo "Text ist gleich<br></br>";
			 
			 $textGleich = true;//$textGleich & true;
		   }
		   // Text nicht gleich
		   else
           {  
		     $vergleichsSpaltenInhalte[$vergleichsSpaltenInhalteCounter] = $actualNodeValue;
		     //echo "Text ist nicht gleich. Neue Zeile<br></br>";
			 
			 // Kompletten Datensatz in nächste Zeile schreiben
			 $zeile++;
			 
			 $textGleich = false;//$textGleich & false;
		   }
		   
		   
		   
		   $vergleichsSpaltenCounter++;
		   $vergleichsSpaltenInhalteCounter++;
		   
		   // wenn counter über die Grenzen hinausgehen auf 0 setzen
		   if( $vergleichsSpaltenCounter == sizeof($vergleichsSpalten) )
		   {
		      $vergleichsSpaltenCounter = 0;
			  $vergleichsSpaltenInhalteCounter = 0;
		   }
		   
		   
		}
		
		
		// Wenn Text gleich
		if($textGleich == true)
		{
		  //echo "Zeile:".$zeile."<br></br>";
		  //echo "Actual:" .$content[$zeile][$spalte][0]."<br></br>";
		
		
		  // Überprüfen ob mehrfachSpalte
		  if( isMehrfachSpalte($actualNodeName) )
		  {
		     //echo $actualNodeValue."</br>";
		     //echo "Mehrfachspalte: ". $actualNodeName. "<br></br>";
		  
			 
			 // Wenn noch kein Eintrag
			 if( empty($content[$zeile][$spalte][0]) )
             {
               //echo $zeile.",".$spalte." noch kein Eintrag".$actualNodeValue."<br></br>";
			   $content[$zeile][$spalte][0] = $actualNodeValue;
             }			 
			 
			 
			 // Überprüfen ob noch nicht vorhanden
			 $eintragVorhanden = false;
			 $max = sizeof($content[$zeile][$spalte]);
			 
			 for($i=0;$i<$max;$i++)
			 {
			   if( $content[$zeile][$spalte][$i] == $actualNodeValue)
			   {
			      $eintragVorhanden = true;
				  break;
			   } 
			 }
			 
			 
			 // Wenn Eintrag noch nicht vorhanden
			 if(!$eintragVorhanden)
			 { 
			    //echo "eintrag noch nicht vorhanden";
			    $z = sizeof($content[$zeile][$spalte]);
			    $content[$zeile][$spalte][$z] = $actualNodeValue;
			 }
			 
			 
			 
		  }
		  // keine Mehrfachspalte
		  else  // nicht umbedingt notwendig
		  {
		    $content[$zeile][$spalte][0] = $actualNodeValue;
		  }
		  
		}
		// textGleich == false
		else
		{
				
		  // Überprüfen ob mehrfachSpalte
		  if( isMehrfachSpalte($actualNodeName) )
		  { 
			 $z = sizeof($content[$zeile][$spalte]);
			 $content[$zeile][$spalte][$z] = $actualNodeValue;
		  }
		
		  $content[$zeile][$spalte][0] = $actualNodeValue;
		  
		  
		  
		} // end else
		
		
		
		$spalte++;
	} // ende zeile
	
	
	$spalte = 0;
	$vergleichsSpaltenCounter = 0;
	$vergleichsSpaltenInhalteCounter = 0;
}




// Array absteigend nach Datum sortieren (vergleichsfunktion siehe 'function vergleich')
if( $template["datum"] ){
	usort($content, 'vergleich');
}


//--------------Ausgabe------------------
for( $i=0; $i<=$zeile ; $i++ )
    printResults($i);

if($suffix){ echo "$suffix\n"; }  
if($link){ echo "<p><a href=\"http://$root/$link\">mehr Infos im Wiki</a></p>"; }


exit;

?>