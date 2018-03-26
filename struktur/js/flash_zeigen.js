// versionsmanagement:
// v1.0.2 ss Debug Seite versenden
// v1.0.1x cn ??? Einbau Seite versenden
// v1.0.1 ss 2007-04-10
// v1.0.0 cn 2006-11-30 it als Navsprache bekannt gemacht
// v0.0.3 ss 20060410 
// v0.0.2 ss 20060407 - ss var Merkzettelcookiename
// v0.0.1  11.01.2006 - ss Frameloader fuer DL - Bereich angepasst (laden bei .pl + )
// v0.0.0  05.12.2004 - c.noss neue version mit neuen Features wegen des neuen Wegs
  



// ########################################################################################
// ########################################################################################
// ########################################################################################
// ########################################################################################
// Flash und Shockwave Stuff

var download_swf_player = "http://sdc.shockwave.com/shockwave/download/download.cgi?";
var download_flash_player = "http://www.macromedia.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash";
var swf_alternative = "/struktur/images/shockwave_alt.jpg";
var flash_alternative = "/struktur/images/flash_alt.jpg";
var src;
var flashvars;
var html;

function flash_zeigen(container_id, src, flashvars, required_version, width, height, bgcolor, alternative, wmode, klasse){

	// wurde noch ein Parameter ueber die URL weiter gegeben, z.B. bei Kontakt
	var queryVars = (location.href.split("?"))[1];
	if((queryVars)&&(queryVars != "undefined")){
		if(queryVars.match(/flashvar(.*)/)){
			queryVars = RegExp.$1;
		}
	}else{
		queryVars = "";
	}
	if(!wmode){ wmode = "transparent"; } 
	
	var flashVersion = DetectFlashVer();

		// Vars in die SRC packen
	if(flashvars){ 
			
		// erco_system_test_intro_1_1_.swf - LS
		// c.noss+5768+125106+1.swf - PScout
		// 00003+1.swf - Pscout offline
		// 40_syst6243206_t242s5183p1de.jpg.swf - LSP
		if((src.match( /erco_/ )) && (!src.match( /erco_ps/ ))){ queryVars += "&lightscout=1"; }
		else{ queryVars += "&lightscout=0"; }
		if(flashvars.match(/lang=(.*)/)){ flashvars = flashvars + "&" + "sprache=" +RegExp.$1 ; }
		src = src+"?"+flashvars + "&" + queryVars; 
	}

	// reicht die Player Version?
	if( (versionsvergleich(flashVersion, required_version)) || (isIE && !flashVersion)){
		var html = "<object class=\""+klasse+"\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" bgcolor=\""+bgcolor+"\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0\" width=\""+width+"\" height=\""+height+"\" id=\"film_1\" align=\"middle\">"
			+"<param name=\"allowScriptAccess\" value=\"sameDomain\" />"
			+"<param name=\"movie\" value=\""+ src +"\" />"
			+"<param name=\"quality\" value=\"high\" />"
			+"<param name=\"wmode\" value=\""+wmode+"\" />"
			+" <param name=\"swliveconnect\" value=\"true\" />"
			+"<param name=\"bgcolor\" value=\""+bgcolor+"\" />"
			+"<param name=\"allowFullScreen\" value=\"true\" />"
			+"<embed class=\""+klasse+"\" allowFullScreen=\"true\" src=\""+ src +"\" quality=\"high\" bgcolor=\""+bgcolor+"\" width=\""+width+"\" height=\""+height+"\" name=\""+container_id+"\" align=\"middle\" allowScriptAccess=\"sameDomain\" wmode=\""+wmode+"\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" swliveconnect=\"true\" />"
			+"</object>";
			
			
		
	}else{
	
		if(!alternative){ alternative = flash_alternative; }
		
		if(alternative.match(/\/erco_/)){ alternative = alternative.replace(/\/erco_/, "/eur_erco_"); }
		var simple_version = (required_version.split(/\./))[0];
		html = "<div style=\"height: 30px; width: 305px; filter:alpha(opacity=60);-moz-opacity:0.6; opacity:0.6; background: #000; color: #738098; border: solid 1px #738098;\"><a style=\"display: block; padding: 1px; padding-left: 5px; padding-right: 5px; \" href=\""+download_flash_player+"\" target=\"_blank\"><strong>Flash Player "+simple_version+" required to see dynamic content</strong><br>Get latest Flash Player. Your version is "+flashVersion+"</a></div><div style=\"margin-top: -32px\"><img src=\""+alternative+"\"></div>";
	}
	
	
	if(container_id){
		document.getElementById(container_id).innerHTML = html;
	}else{
		document.write(html);
	}

}

// Vergleicht zwei Versionsnummern, z.B. 10.1 mit 8.0.0.0
function versionsvergleich(swf_version, required_version){
	
	// Strings erzeugen
	swf_version = ""+swf_version+"";
	required_version = ""+required_version+"";
	
	// Arrays erzeugen
	array_swf_version = swf_version.split(/\./);
	array_required_version = required_version.split(/\./);

	// Arrays auf korrekte Laenge bringen
	while(array_swf_version.length < 10){ array_swf_version.push(0); } 
	while(array_required_version.length < 10){ array_required_version.push(0); }
	
	// Arrays vergleichen
	
	for(wert in array_swf_version){
		com_swf_version = array_swf_version[wert] * 1;
		com_required_version = array_required_version[wert] * 1;

		if(com_swf_version > com_required_version) { return true }
		if(com_swf_version < com_required_version) { return false  }
		
	}
	return true;
	
	
}

function shockwave_zeigen(container_id, src, sprache, required_version, width, height, alternative){
	
	var html;

	html = "<object classid=\"clsid:166B1BCA-3F9C-11CF-8075-444553540000\" "
		+"codebase=\" http://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=" + required_version +"\" "
		+"ID=content width=" + width +" height="+ height +">"
		+"<param name=src value=\"" + src + "\">"
		+"<param name=swRemote value=\"swSaveEnabled='false' swVolume='false' swRestart='false' swPausePlay='false' swFastForward='false' swContextMenu='true' \">"
		+"<param name=swStretchStyle value=none>"
		+"<PARAM NAME=bgColor VALUE=#ffffff>"
		+"<PARAM NAME=name VALUE=\"content\">"
		+"<PARAM NAME=progress VALUE=TRUE>"
		+"<PARAM NAME=logo VALUE=FALSE>"
		+"<PARAM NAME=sw1 VALUE=\"" + sprache + "\">"
		+"<PARAM NAME=sw2 VALUE=\"" + src + "\">"
		+"<PARAM NAME=sw4 VALUE=\"nolink\">"
		+"<embed src=\"" + src + "\" "
		+"bgColor=#ffffff "
		+"name=\"content\" "
		+"swLiveConnect=TRUE "
		+"progress=TRUE "
		+"logo=FALSE "
		+"width=" + width
		+" height=" + height
		+" sw1=\"" + sprache + "\" "
		+"sw2=\"" + src + "\" "
		+"sw4=\"nolink\" "
		+"swRemote=\"swSaveEnabled='false' swVolume='false' swRestart='false' swPausePlay='false' swFastForward='false' swContextMenu='true'\" "
		+"swStretchStyle=none "
		+"type=\"application/x-director\" "
		+"pluginspage=\"http://www.macromedia.com/shockwave/download/\"> "
		+"<\/embed>"
		+"<\/object>";
	
	document.getElementById(container_id).innerHTML = html;
}

// -------------------------------------------------------------------------------------------
// Flash Detection von Macromedia 04.2006
	
var isIE  = (navigator.appVersion.indexOf("MSIE") != -1) ? true : false;
var isWin = (navigator.appVersion.toLowerCase().indexOf("win") != -1) ? true : false;
var isOpera = (navigator.userAgent.indexOf("Opera") != -1) ? true : false;
jsVersion = 1.1;

// JavaScript-Hilfsprogramm ist zur Ermittlung der Versionsinformationen des Flash Player Plug-Ins erforderlich
function JSGetSwfVer(i){

	// NS/Opera-Version >= 3 auf Flash-Plug-In im Plug-In-Array prŸfen
	if (navigator.plugins != null && navigator.plugins.length > 0) {
		if (navigator.plugins["Shockwave Flash 2.0"] || navigator.plugins["Shockwave Flash"]) {
			var swVer2 = navigator.plugins["Shockwave Flash 2.0"] ? " 2.0" : "";
      		var flashDescription = navigator.plugins["Shockwave Flash" + swVer2].description;
			descArray = flashDescription.split(" ");
			tempArrayMajor = descArray[2].split(".");
			versionMajor = tempArrayMajor[0];
			versionMinor = tempArrayMajor[1];
			if ( descArray[3] != "" ) {
				tempArrayMinor = descArray[3].split("r");
			} else {
				tempArrayMinor = descArray[4].split("r");
			}
      		versionRevision = tempArrayMinor[1] > 0 ? tempArrayMinor[1] : 0;
            flashVer = versionMajor + "." + versionMinor + "." + versionRevision;
      	} else {
			flashVer = -1;
		}
	}

	// MSN/WebTV 2.6 unterstŸtzt Flash 4
	else if (navigator.userAgent.toLowerCase().indexOf("webtv/2.6") != -1) flashVer = 4;

	// WebTV 2.5 unterstŸtzt Flash 3
	else if (navigator.userAgent.toLowerCase().indexOf("webtv/2.5") != -1) flashVer = 3;

	// Šlteres WebTV unterstŸtzt Flash 2
	else if (navigator.userAgent.toLowerCase().indexOf("webtv") != -1) flashVer = 2;

	// Ermittlung in allen anderen FŠllen nicht mšglich
	else {
		
		flashVer = -1;
	}
	return flashVer;
} 

// Wenn der Funktionsaufruf ohne Parameter erfolgt, gibt diese Funktion einen Gleitkommawert zurŸck,
// bei dem es sich entweder um die Flash Player-Version oder um 0.0 handelt.
// Beispiel: Flash Player 7r14 gibt 7.14 zurŸck.
// Wenn reqMinorVer, reqMajorVer, reqRevision aufgerufen wird, wird 'true' zurŸckgegeben, sofern diese bzw. eine hšhere Version verfŸgbar ist
function DetectFlashVer(reqMajorVer, reqMinorVer, reqRevision) 
{ 
 	reqVer = parseFloat(reqMajorVer + "." + reqRevision);
   	// Versionen rŸckwŠrts durchlaufen, bis die neueste Version gefunden wird	
	for (i=25;i>0;i--) {	
		if (isIE && isWin && !isOpera) {
			versionStr = VBGetSwfVer(i);
		} else {
			versionStr = JSGetSwfVer(i);		
		}
		if (versionStr == -1 ) { 
			return false;
		} else if (versionStr != 0) {
			if(isIE && isWin && !isOpera) {
				tempArray         = versionStr.split(" ");
				tempString        = tempArray[1];
				versionArray      = tempString .split(",");				
			} else {
				versionArray      = versionStr.split(".");
			}
			versionMajor      = versionArray[0];
			versionMinor      = versionArray[1];
			versionRevision   = versionArray[2];
			
			versionString     = versionMajor + "." + versionRevision;   // 7.0r24 == 7.24
			
			versionNum        = parseFloat(versionString);
			
			return versionNum;
		}
	}	
	
	return (reqVer ? false : 0.0);
}



function nostrech(){
	var teilnehmer = document.getElementsByTagName("img");

	for(i=0; i<teilnehmer.length; i++){
		if(teilnehmer[i].className == "teilnehmerbild"){

			teilnehmer[i].className = "";
		}
	}
	return false;
}