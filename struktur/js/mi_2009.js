/*
mi_2009.js 
Klickmeister 2008/2009
c.noss@klickmeister.de

------------------------------------------------------------------------------------*/

//var fades = new Array();
var fadehash = new Hash();
var max_items = new Hash();
max_items["termine"] = 4;
max_items["wiki"] = 3;

/*
Hier wird geprueft, ob alle Bilder da sind
------------------------------------------------------------------------------------*/
function bilder_checken(){

	// Bilder durch-iterieren und Ladestatus pruefen
	$$('img').each( function(s){ if(!s.complete){ return false; } });

	window.clearInterval(bilderOK);
	mi_init();
	if(!kord_modus){ init_bildwechlser(); }
	
	return true;
}

/*
Wird via HTML am Start aufgerufen, wenn die Seite durchgeladen ist
------------------------------------------------------------------------------------*/

function startaktion(){
	if(!$("startbild")){ 
		$("flash").setStyle({ "height": "188px" });
		new Effect.Appear("nav_wrap");
		new Effect.Opacity('flash', { to: 1, duration: 0.2, delay: 1 });
	}
	
	// Pruefen, ob alle Bilder geladen sind
	bilderOK = window.setInterval("bilder_checken()", 500);
	
	wiki_eintraege();
	termin_eintraege();
	$$(".startnews a img").each( 
		function(obj){ 
			obj.setOpacity(0.7);  
			obj.up().observe('mouseover', function(event){ show_button( obj ); });
			obj.up().observe('mouseout', function(event){ fade_button( obj ); });
	});

}


function switch_startbild(){
	

	
	// $("raster").setOpacity(0);
	//$("raster").hide();
	if($("startbild")){ $("startbild").setOpacity(0); }
	if($("nav_wrap")){ $("nav_wrap").setOpacity(0); }

	if($("startbild")){ 
		var temp = $("nav_wrap").innerHTML;
		$("nav_wrap").remove();
		$("startbild").innerHTML += "<div id=\"nav_wrap\">"+temp+"</div>";
		$("nav_wrap").setStyle({ "margin-left": 0 });
		$("content").setStyle({ "margin-top": 0 });
		new Effect.Opacity('startbild', { to: 1, duration: 0.2, delay: 1.5 });

	}else{
		$("flash").setStyle({ "height": "188px" });
		new Effect.Appear("nav_wrap");
	}
	
	new Effect.Opacity('flash', { to: 1, duration: 0.2, delay: 1 });
	
	
}
/*
Ersetzt Text durch Bilder 
------------------------------------------------------------------------------------*/

function set_replace(){

	$$('h1.myriad').each( function(s){
		var curr_content = encodeURI(s.innerHTML);
		curr_content = curr_content.replace(/&amp;/g, "kaufmannsund");
		s.innerHTML = "<img src=\"/cgi-bin/mi_headline/generator.pl?typ=headline&text="+curr_content+"\" alt=\""+curr_content+"\">";
	});
	
	$$('.tagebuch_teaser h2').each( function(s){
		var curr_content = encodeURI(s.innerHTML);
		curr_content = curr_content.replace(/&amp;/g, "kaufmannsund");
		s.innerHTML = "<img src=\"/cgi-bin/mi_headline/generator.pl?typ=tagebuch&text="+curr_content+"\" alt=\""+curr_content+"\">";
	});
	
	$$('p.myriad').each( function(s){
		var curr_content = encodeURI(s.innerHTML);
		curr_content = curr_content.replace(/&amp;/g, "kaufmannsund");
		s.innerHTML = "<img src=\"/cgi-bin/mi_headline/generator.pl?typ=text&text="+curr_content+"\" alt=\""+curr_content+"\">";
	});
	
	/*$$('p.myriadklein').each( function(s){
		var curr_content = encodeURI(s.innerHTML);
		curr_content = curr_content.replace(/&amp;/g, "kaufmannsund");
		s.innerHTML = "<img src=\"/cgi-bin/mi_headline/generator.pl?typ=text&textklein="+curr_content+"\" alt=\""+curr_content+"\">";
	});*/
}

/*
Initialisiert die wesentlichen Funktionen
------------------------------------------------------------------------------------*/
function mi_init(){
	//set_replace();
	raster();	
}


/*
Google Map
------------------------------------------------------------------------------------*/
function map(){
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.setCenter(new GLatLng(50.963576,7.530484), 13);
		map.addControl(new GSmallMapControl());
		var marker = new GMarker(new GLatLng(50.963576,7.530484));
		map.addOverlay(marker);
      }
}

/*
Bildwechsler
------------------------------------------------------------------------------------*/
var bilder = new Array();
var blende = 2;

function addImg(klasse, src, alt){
		
	// Source setzen
	var newImg = document.createElement("img");
	var newSrc = document.createAttribute("src");
	newSrc.nodeValue = src;
	newImg.setAttributeNode(newSrc);
	
	// klasse setzen
 	var newClass = document.createAttribute("class");
	newClass.nodeValue = klasse;
	newImg.setAttributeNode(newClass);
	
	// Alt Text setzen
	var newAlt = document.createAttribute("alt");
	newAlt.nodeValue = alt;
	newImg.setAttributeNode(newAlt);
		
	return newImg;
}

// Initialisiert den Bildwechsler
function init_bildwechlser() {
	
	// Blendboxen abklappern
	$$('.blendbox').each( function(s){
		initBox(s);
	});
	
}

function initBox( obj ){
	
	// Objekt absolut positionieren
	$(obj).makePositioned();
		
	// erstes Objekt klonen
	var temp = $(obj).descendants();
	
	if(temp[0].src.match(/spacer\.gif/)){ return false; }
	if(temp[1].src.match(/spacer\.gif/)){ return false; }
	
	// srcen holen
	for(i=0; i<temp.length; i++){
		bilder.push(temp[i].src);
		temp[i].remove();
	}
	
	// Bilder setzen
	var bottom = $(obj).appendChild(addImg("bottom_bild", bilder[0], "Slideshow"));
	var top = $(obj).appendChild(addImg("top_bild", bilder[0], "Slideshow"));
	new Effect.Fade( top, {duration: 0 }); 
	
	// Aufruf des Wechlsers
	if(bilder.length > 0){
		new PeriodicalExecuter(function(pe) {
  			bilderwechsel(top, bottom, bilder);
		}, 5);
	}
}



function bilderwechsel( top_bild, bottom_bild, bilder_array ){
	
	
	// Step 1: Dem top_bild das alte Bild geben
	top_bild.src = bottom_bild.src;
	new Effect.Appear( top_bild, { to: 0.99, duration: 0, afterFinish:function(){ top_bild.setStyle({ "z-index": 3}); }}); 
	
	// Step 2: Dem bottom_bild das neue Bild geben
	new Effect.Fade( bottom_bild, { to: 0, duration: 0, afterFinish:function(){ 
		
		var neues_bild = bilder_array[1];
		if(bottom_bild.src == neues_bild){ neues_bild = bilder_array[0];} 
		bottom_bild.src = neues_bild;
	
		// Step 3: Crossfade
		
		new Effect.Fade(top_bild, { duration: blende });
		new Effect.Appear(bottom_bild, { to: 0.99, duration: blende, afterFinish:function(){ 
			fading_aktiv = false; 
			top_bild.setStyle({ "z-index": 1});
		}});
	}}); 

}

/*
wir zeigen nur die ersten 3
------------------------------------------------------------------------------------*/
var items = false;

function wiki_eintraege(){


	var w_count = 0;
	var fade_icon = false;
	var wiki = ($$(".wiki"))[0];
	var temp = new Array();
	var name = "wiki";
	
	if(!items){ items = max_items[name]; }
	
	$$(".wiki div").each(

		function(obj){
			if(w_count >= items){
				new Effect.Fade(obj, {duration: 0.2});
				fade_icon = true;
				temp.push(obj);
			}
			w_count ++;
		}
	);
	
	if(fade_icon){ add_navi( wiki, name ); }
	
	fadehash[name] = temp;
}

function termin_eintraege(){
	var w_count = 0;
	var fade_icon = false;
	var termine = ($$(".termine"))[0];
	var temp = new Array();
	var name = "termine";
	if(!items){ items = max_items[name]; }
	
	$$(".termine p").each(

		function(obj){
			if(w_count >= items){
				new Effect.Fade(obj, {duration: 0.2});
				fade_icon = true;
				temp.push(obj);
			}
			w_count ++;
		}
	);
	
	if(fade_icon){ add_navi( termine, name ); }
	fadehash[name] = temp;
}


function show_button( obj ){	
	Effect.Appear(obj, { duration: 0.1 }); 
}

function fade_button( obj ){
	Effect.Fade(obj, { duration: 0.1, to: 0.6 }); 
}

function mi_fade( name ){

	var kennung = name;
	name = name.replace(/_mehr/, "");
	
	if($(kennung).src.match(/mi_weniger/)){
		$(kennung).src="/struktur/images/mi_mehr.gif";
		for(i=0; i<fadehash[name].length; i++){
			new Effect.Fade(fadehash[name][i], { duration: 0.2 });
		}
	}else{
		$(kennung).src="/struktur/images/mi_weniger.gif";
		for(i=0; i<fadehash[name].length; i++){
			new Effect.BlindDown(fadehash[name][i], { duration: 0.2 });
		}
	}
}



function add_navi( obj, name ){

	var new_fade_icon = document.createElement("img");
		
	var id = document.createAttribute("id");
	id.nodeValue = name + "_mehr";
		
	var src = document.createAttribute("src");
	src.nodeValue = "/struktur/images/mi_mehr.gif";

	new_fade_icon.setAttributeNode(src);
	new_fade_icon.setAttributeNode(id);
	obj.appendChild(new_fade_icon);
	
	//$(id.nodeValue).observe('click', mi_fade(id.nodeValue));
	
	Event.observe(id.nodeValue, 'click',function(event){ mi_fade(id.nodeValue);});
	//$(id.nodeValue).observe('over', function(event){ show_button(id.nodeValue); });
	//$(id.nodeValue).observe('out', function(event){ fade_button(id.nodeValue); });

	$(id.nodeValue).setOpacity(0.3);
}


/*
startnews
------------------------------------------------------------------------------------*/




/*
DevZone
------------------------------------------------------------------------------------*/

var raster_an = false;
function raster(){
	if($("raster")){
		new Effect.Opacity('raster', { to: 0.01, duration: 0.5 });
	}
	Event.observe(window, 'dblclick', zeige_raster);
}


function zeige_raster(){
	if(raster_an){
		new Effect.Opacity('raster', { to: 0.01, duration: 0.5, afterFinish:function(){ raster_an = false; }});
	}else{
		new Effect.Opacity('raster', { to: 0.8, duration: 0.5, afterFinish:function(){ raster_an = true; }});
	}
}