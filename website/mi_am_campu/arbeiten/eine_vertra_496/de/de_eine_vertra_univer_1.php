<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Medieninformatik an der FH K&ouml;ln // Abschlussarbeiten // Eine vertrauensw&uuml;rdige Architektur zum Teilen nutzergenerierter Inhalte im Web </title>
<meta name="Content-Language" content="de" />
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="keywords" lang="de" content="Medieninformatik, an, der, FH, K&ouml;ln, //, Abschlussarbeiten, //, Eine vertrauensw&uuml;rdige Architektur zum Teilen nutzergenerierter Inhalte im Web " />
<meta name="description" lang="de" content="Eine vertrauensw&uuml;rdige Architektur zum Teilen nutzergenerierter Inhalte im Web : Tim Schneider Masterarbeit 2011 betreut von: Prof. Dr. Kristian Fischer ... " />
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache, must-revalidate" />
<meta name="DC.Title" content="Medieninformatik 
 Website" />
<meta name="DC.Source" content=" O-496 S-513" />
<meta name="DC.Publisher" content="CMS by Klickmeister GmbH, www.klickmeister.de" />
<meta name="DC.Creator" content="Medieninformatik 
 Website" />
<meta name="DC.Contributor" content="Studiengang Medieninformatik an der FH K&ouml;ln" />
<meta name="DC.Format" content="text/html" />
<meta name="DC.Type" content="Text" />
<meta name="DC.Language" content="de" />
<meta name="DC.Date" content="2017-11-11 10:54:10" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="alternate" type="application/rss+xml" title="MI RSS-Feed" href="feed://twitter.com/statuses/user_timeline/43148201.rss" />
<script type="text/javascript">
// Stats
var stats = "/cgi-bin/k2/kunden/medieninformatik/kord_stats.pl/k2.pl";
var aenderung = "2017-11-11 10:54:10";
var gattung = "Abschlussarbeiten";
var spezifikation = "MI am Campus GM";
var kord_modus = "zeigen";</script>
<?php  include("../../../../../struktur/php/ie.php"); ?>
<script src="/struktur/js/protoculous-1.0.2.js" type="text/javascript" charset="utf-8"></script>
<script src="/struktur/js/mi_2009.js" type="text/javascript"></script>
<script src="/struktur/js/flash_zeigen.js" type="text/javascript"></script>
<script src="/struktur/js/browsererkennung.js" type="text/javascript"></script>
<script src="/struktur/js/bildershow.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" media="all" href="/struktur/daten/mi_2009.css" />
<?php  include("../../../../../struktur/php/googleapi.php"); ?>
<link rel="SHORTCUT ICON" href="/struktur/images/favicon.ico" /></head>
<body>
<div id="wrap">
<div id="header">
<?php 
include("../../../../../struktur/php/header.php");
?></div>
<div id="content">
<h1>Eine vertrauensw&uuml;rdige Architektur zum Teilen nutzergenerierter Inhalte im Web </h1>
<div class="zeile">
<h2 class="float einfach"><strong>Tim Schneider</strong><br /><a href="../../../../../website/master/wpf_ma/masterarbei_67/de/de_masterarbei_univer_1.php" rel="pkm67">Masterarbeit</a> 2011<br /><br />betreut von:<br /><a href="../../../../../website/mi_am_campu/prof/prof_dr_k_12/de/de_prof_dr_k_univer_1.php" rel="pkm12">Prof. Dr. Kristian Fischer</a><br /><a href="../../../../../website/mi_am_campu/prof/prof_chris_5/de/de_prof_chris_univer_1.php" rel="pkm5">Prof. Christian Noss</a> </h2>
<div class="float dreifach last">
<p>Die Dynamik des Social Webs motiviert zum Teilen nutzergenerierter Inhalte. Diese entstehen in zahlreichen Social Networks meist unter Missachtung der Schutzziele der IT-Sicherheit: Vertraulichkeit, Verf&uuml;gbarkeit und Integrit&auml;t von Nutzerdaten. Betreiber von Web-Anwendungen k&ouml;nnen Inhalte ihrer Nutzer einsehen, f&auml;lschen, l&ouml;schen oder zu unbekannten Zwecken auswerten und verf&uuml;gen &uuml;ber Wissen &uuml;ber Kommunikationspartner und -verhalten - ohne, dass sich Benutzer wirksam davor absichern k&ouml;nnten. Von dem im Grundgesetz verankerten Recht auf Privatsph&auml;re ausgehend soll im Rahmen dieser Ausarbeitung eine neuartige Architektur zum Teilen nutzergenerierter Inhalte im Web entwickelt werden, die Benutzeranforderungen an die Erf&uuml;llung der Schutzziele der IT-Sicherheit vollst&auml;ndig gew&auml;hrleistet und dar&uuml;ber hinaus durch eine bewusste Kommunikation dieser Qualit&auml;t als vertrauensw&uuml;rdig aufgefasst werden kann. In einem Goal-directed Design-Prozess wird eine Architekturskizze entwickelt, welche die im Prozess erarbeiteten Benutzeranforderungen durch die Bereitstellung zweier Web-Services erf&uuml;llt: Der Signed Content Storage adressiert als zuverl&auml;ssiger und durch den Urheber autorisierter Web-Speicherort signierter, nutzergenerierter Inhalte die Schutzziele Verf&uuml;gbarkeit und Integrit&auml;t. In Kombination mit dem Identity Provider, der gesicherte Informationen von Urheber und Teilhabern zur Verf&uuml;gung stellt, ist ein vertrauliches Teilen von Inhalten im Web m&ouml;glich. Vertrauensw&uuml;rdigkeit gewinnt diese Architektur durch konsequente Transparenz, Selbstbeschreibungsf&auml;higkeit, externe Bewertbarkeit und der Dokumentationsf&auml;higkeit von Nutzungserfahrungen.<br /><br /><a href="http://opus.bibl.fh-koeln.de/volltexte/2011/303/pdf/MasterThesis_TimSchneider.pdf">Arbeit als PDF-Dokument</a> </p></div>
<div class="clear">&nbsp;<br /></div></div></div>
<div id="footer">
<p id="copy">&copy; 2000 - <?php  echo date("Y"); ?> FH K&ouml;ln<a href="http://kord.klickmeister.com/cgi-bin/k2/kunden/medieninformatik/k2.pl/k2.pl/1510394050?PKM_Seite=513&amp;S_Aktion=_quickedit&amp;S_PKM=496&amp;S_Sprachkuerzel=de&amp;S_AktiveSprache=de&amp;FKM_PDB_Langkey=1031&amp;FKM_PDB_TU=1">&nbsp;</a></p>
<?php 
#include("../../../../../struktur/php/footer.php");
?></div></div>
<div id="raster"><img src="/struktur/images/bg_fh_oben.gif" alt="raster" /></div>
<script type="text/javascript">startaktion();</script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-3987615-1");
pageTracker._initData();
pageTracker._trackPageview();</script></body></html>
