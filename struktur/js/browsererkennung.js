 /*  Autor, Entwicklung 8/2002 Kristof Lipfert Duesseldorf    */
 /*  Version 2005-12-09                                  */

function getBrowser(){
	if(document.ids)x='nc4';
	else if( document.all && !document.getElementById )x='ie4';
	else if( window.opera && !document.createElement )x='op5';
	else if( window.opera && window.getComputedStyle )  {
	          if(document.createRange)x='op8';
	            else if(window.navigate)x='op7.5';
	                             else x='op7.2';                   }
	else if( window.opera && document.compatMode )x='op7';
	else if( window.opera && document.releaseEvents )x='op6';
	else if( document.contains && !window.opera )x='kq3';
	else if(window.pkcs11&&window.XML)x='f15';
	else if( window.getSelection && window.atob )x='nn7';
	else if( window.getSelection && !document.compatMode )x='nn6';
	else if( window.clipboardData && document.compatMode )
	  x=window.XMLHttpRequest? 'IE7' : 'IE6';
		else if( window.clipboardData ){x='ie5';
     if( !document.createDocumentFragment ) x+='.5';
   	 if( document.doctype && !window.print ) x+='m';}
	else if( document.getElementById && !document.all ) x='op4';
	else if( document.images && !document.all ) x='nn3';
	else if(document.clientWidth&&!window.RegExp)x='kq2';
	else x='none';

	return x;
}