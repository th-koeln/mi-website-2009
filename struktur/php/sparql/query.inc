<?php

// SPARQL-Anfrage
$url='https://mirapuser:knin7as2dok2ub2geut7dirv1ip5bev9nan6jo@mims04.gm.fh-koeln.de/mirdf/model?query=Select%20Distinct%20?projekt%20?Titel%20?Zusammenfassung%20?Thema%20?Mitglied%20?Bezug%20?Betreuer%20Where{%20?projekt%20?p%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Kategorie-3AForschungsprojekt%3E.%20?projekt%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Attribut-3AIstSichtbar%3E%20true%20.%20?projekt%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Attribut-3AHatTitel%3E%20?Titel.%20?projekt%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Attribut-3AHatZusammenfassung%3E%20?Zusammenfassung.%20OPTIONAL%20{%20?projekt%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Attribut-3AHatThema%3E%20?Thema}.%20?projekt%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Attribut-3AHatMitglied%3E%20?Mitglied.%20?projekt%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Attribut-3ABeziehtSichAuf%3E%20?Bezug.%20?projekt%20%3Chttp://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/Attribut-3AWirdBetreutVon%3E%20?Betreuer.}';

// Xml-Text von Anfrage einlesen
$xmltxt=file_get_contents($url);

// Namespace-Definition löschen, ansonsten tritt Fehler auf
$xmltxt=str_replace("xmlns=","a=",$xmltxt);
$xml=simplexml_load_string($xmltxt);

// XPath-Anfrage
$xpathQuery  = '/sparql/results/result/descendant::*/*/text()';


// Xpath-Anfrage ausführen
$result = $xml->xpath($xpathQuery);
   

// <Result>-Tags in Array speichern 
$i=0;
$j=0;
while(list( , $node) = each($result))
{

   // Wenn $node nicht vom typ <binding name="Thema">, dann nicht in Array schreiben
   if($j==3)
   {
      
      $xpathQuery  = '/sparql/results/result['.($i+1).']/binding[@name="Thema"]/*/text()';
      $result2 = $xml->xpath($xpathQuery);
      
      // <result> enthält kein Thema, dann ist 5.Element=Mitglied
      if( empty($result2) )
      {
       // Mitglied in [4] eintragen
       $j++;
       $array[$i][$j] = $node;
      }
      else
       $array[$i][$j] = $node;
       
      $j++;

   } // end if
   else
   {
     $array[$i][$j] = $node;
     $j++;
     if($j==7) 
     {
      $j=0;
      $i++;
     }
   }

   
} // end while



$mitglieder[0] = $array[0][4];
$betreuer[0] = $array[0][6];


for ($a=1;$a<=$i;$a++)
{
 //echo $array[$a][0]."  =  ".$array[($a-1)][0];

 if( strcmp($array[$a][0],$array[($a-1)][0]) == 0 )
 {
  //echo "match<br>";

  // Mitglied
  array_push($mitglieder, $array[$a][4]);


  // Betreuer
  array_push($betreuer, $array[$a][6]);

 }
 else
  {
   
   // Mitglied zum Mitglieder-Array hinzufuegen
   array_push($mitglieder, $array[($a-1)][4]);

   // Betreuer zum Mitglieder-Array hinzufuegen
   array_push($betreuer, $array[($a-1)][6]);   


   // Doppelte Einträge entfernen
   $mitglieder = array_unique($mitglieder);
   $betreuer = array_unique($betreuer);

   
   // Projekt ausgeben
   printProjekt($array,$a-1,$mitglieder,$betreuer);
   
   
   // letztes <result>
   /*if($a==$i-1)
   {
    // Mitglied
    array_push($mitglieder, $array[($a)][4]);
    // Betreuer
    array_push($betreuer, $array[($a)][6]);
    
    printProjekt($array,$a,$mitglieder,$betreuer);  
   }*/

   // Mitglieder- und Betreuer-Arrays leeren
   $mitglieder = array();
   $betreuer = array();
   

  } // end else


  

} // end for
 
 

 /**
  * printProjekt - Gibt die Informationen zu einem Projekt aus
  *
  * $array = Enthält Projekt-Url,Titel,Zusammenfassung,Thema,Bezug,Art
  * $a = 
  * $mitglieder = Mitglieder-Array
  * $betreuer = Betreuer-Array
  *
 **/
 function printProjekt($array,$a,$mitglieder,$betreuer)
 {
   ?>

   <div class="projekt">

   <ul>
    <li>Projekt: <a href="<?php echo $array[$a][0];?>" > <?php $projekt = relativePath( $array[$a][0] ); echo substr( $projekt , strpos( $projekt , "3A" ) );  ?> </a> </li>

    <li>Titel: <span> <?php echo replace($array[$a][1]);?> </span> </li>

    <li>Zusammenfassung: <span> <?php echo replace($array[$a][2]);?> </span> </li>


    <?php
     // Thema nur anzeigen, wenn angegeben
     if( $array[$a][3] != "" )
     {
    ?>

    <li>Thema: <a href="<?php echo replace($array[$a][3]);?>" > <?php echo relativePath($array[$a][3]);?> </a> </li>

    <?php
     }
    ?>

    <li>Mitglied(er): <?php printArray($mitglieder);?> </li>

    <li>Bezug: <a href="<?php echo $array[$a][5];?>" > <?php $bezug = relativePath( $array[$a][5] ); 
if( strpos($bezug,"Master-3A")!==false ) 
 echo substr( $bezug , strpos( $bezug , "3A" )+2 );
else 
  echo $bezug;
?> </a> </li>

    <li>Betreuer: <?php printArray($betreuer);?> </li>
   </ul>
   
   </div> 

   <?php
 } // end function
   
  
  

 /**
  * relativePath - entfernt den teil "http://mims03.gm.fh-koeln.de/wiki/index.php/Spezial:URIResolver/"
  *                aus der übergebenen url und gibt den restlichen url-String zurueck
  *
 **/
 function relativePath($url)
 {
   return str_replace("http://www.medieninformatik.fh-koeln.de/miwiki/index.php/Spezial:URIResolver/" , "" , $url);
 }



/**
 * printArray - gibt den Inhalt des übergebenen Arrays aus
 *              die einzelnen Arrayelemente werden durch Kommatas getrennt
 *
 **/
 function printArray($array)
 {
 
   for($b=0;$b<count($array);$b++)
   {
   ?>

     <a href="<?php echo $array[$b];?>" > <?php echo relativePath($array[$b]);?></a>

   <?php
     // damit nach dem letzten Element kein Komma ausgegeben wird
     if( $b < count($array)-1 )
       echo " , ";
   } // end for

 }



 /**
  * replace - ersetzt die Umlaute im übergebenen Text durch den ensprechenden Html-Code
 **/
 function replace($text)
 {
  return htmlentities($text,ENT_QUOTES,"UTF-8");
 }


?>