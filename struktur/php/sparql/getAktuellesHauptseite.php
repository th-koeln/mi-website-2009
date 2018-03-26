<?php


	//Funktion holen
	include '../../../../../struktur/php/magpierss-0.72/rss_fetch.inc';
	
	//Benutzerdaten
	$user = "mirapuser";
	$pass = "knin7as2dok2ub2geut7dirv1ip5bev9nan6jo";
	
	//Aufruf
	$url_projekte = "https://$user:$pass@mims04.gm.fh-koeln.de/w/index.php/Spezial:Semantische_Suche/-5B-5BKategorie:Vorschlag-5D-5D-5B-5BhatAnsprechpartner::%2B-5D-5D/-3FHatArt%3DArt-20des-20Vorschlags/-3FHatAnsprechpartner%3DAnsprechpartner/-3FHatBeschreibung%3DBeschreibung/-3FHatStudiengang%3DStudiengang/sort%3D/order%3DDESC/format%3Drss/limit%3D10";
	$url_aktuelles = "https://$user:$pass@mims04.gm.fh-koeln.de/w/index.php/Spezial:Semantische_Suche/-5B-5BKategorie:Nachricht-5D-5D-5B-5BhatDatum::-3E10.10.2009-5D-5D/-3FHatDatum%3DDatum/-3FHatAutor%3DAutor/-3FNachricht//-3FHatBezug%3DBezug/sort%3DHatDatum/order%3DDESC/format%3Drss/limit%3D10";

	#Projekte
	$rss = fetch_rss($url_aktuelles); ?>

	<div class="mensaplan">
		<table cellpadding=&#039;3&#039; cellspacing=&#039;0&#039;>
			<tbody>
					<?php
					$i = 0;
					foreach ($rss->items as $item )
					{
						$title = $item[title];
						
						$url_projekte   = $item[link];
						
						// Zwei Zeilen nebeneinander
						if( $i%2 == '0')
							echo "<tr><td><a href=$url_projekte>$title</a></td>";
						else
							echo "<td><a href=$url_projekte>$title</a></td></td>";
							
						$i++;
					} 
					?>
			</tbody>
		</table>
	</div>
	