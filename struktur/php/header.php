<?php
$header = array("rechner.jpg","myp4.jpg","myp5.jpg","myp6.jpg","myp7.jpg");
$zufall = rand(0,sizeof($header)-1);
?>

<div id="flash" style="width: 714px; margin-left: 50px">
	<img src="/struktur/images/mi-header-temp.svg" width="100%" alt="Medieninformatik an der TH Köln">
</div>

<script type="text/javascript" src="//use.typekit.net/rue2vtn.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<div id="nav_wrap">
<?php
$url = "../../../../../website/general/navigation/hauptnaviga_4/de/de_hauptnaviga_articl_1.php";
$inhalt =  file_get_contents($url);

# Das Suchmuster fischt die Links aus der HTML-Seite raus
$suchmuster = '/<div id="navigation">(.*?)<\/div>/is';
preg_match($suchmuster, $inhalt, $treffer);

# Bitte brs entfernen
$suchmuster = '/<br \/>/';
echo preg_replace($suchmuster, "" , $treffer[1]);

?>
<br style="clear: both" />
</div>