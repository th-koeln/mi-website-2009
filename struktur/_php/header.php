<?php
$header = array("rechner.jpg","myp4.jpg","myp5.jpg","myp6.jpg","myp7.jpg");
$zufall = rand(0,sizeof($header)-1);
?>

<div id="flash"></div>
<script type="text/javascript">$("flash").setStyle({ "height": "98px" });$("flash").setOpacity(0);flash_zeigen("flash","/struktur/images/header.swf","bild=/struktur/images/<?php echo $header[$zufall]?>&amp;kat=&amp;titel=Medieninformatik&amp;subtitel=an der FH Köln", "8.0.0.0", "1024", "187","#ffffff","struktur/images/header.jpg");</script>

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