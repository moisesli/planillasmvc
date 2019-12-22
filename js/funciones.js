var miFila;
var nav4 = window.Event ? true : false;
function Asignar_Fila(myRow){
	miFila = myRow;
return myRow;
}
function popup_window(url,w,h)
{
	 var width=w;
	 var height=h;
	 var from_top=(screen.height-h)/2-50;
	 var from_left=(screen.width-w)/2;
//	 var from_top=50;
//	 var from_left=150;
	 var toolbar='no';
	 var location='no';
	 var directories='no';
	 var status='no';
	 var menubar='no';
	 var scrollbars='yes';
	 var resizable='no';
	 var atts='width='+width+'show,height='+height+',top='+from_top+',screenY=';
	 atts+= from_top+',left='+from_left+',screenX='+from_left+',toolbar='+toolbar;
	 atts+=',location='+location+',directories='+directories+',status='+status;
	 atts+=',menubar='+menubar+',scrollbars='+scrollbars+',resizable='+resizable;
	 window.open(url,'win_name',atts);
 }	
function Iluminar_Fila(Color,myRow,sw,texcolor){
	if (sw)
		{
			myRow.style.backgroundColor = Color;
			myRow.style.color = texcolor;
		}
	else
		{	
			myRow.style.backgroundColor='';
			myRow.style.color = '';
		}
	return true;
}		
function eTab(){
	if (!nav4){
		if(event.keyCode==13) event.keyCode=9;
	}{
		if(event.which==13) event.which=9;
	}
}
function Solo_Enteros(evt){	
	// NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57	
	var key = nav4 ? evt.which : evt.keyCode;	
	return (key <= 13 || (key >= 48 && key <= 57));
}
function Solo_Numeros(evt){
	// NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57	
	var key = nav4 ? evt.which : evt.keyCode;	
	return (key <= 13 || (key >= 48 && key <= 57) || key==46);
}
// FUNCIONES DE ACTIVAR EL MENSAJE DE ESPERA
	function prehide(){ 
		if (document.getElementById){ 
			document.getElementById('preload').style.visibility='hidden'} 
		} 
		function preshow(){ 
			document.all.capFondo.style.visibility='visible';
			document.all.capFrame.style.visibility='visible';
			document.all.capSombra.style.visibility='visible';
//		if (document.getElementById){ 
//			document.getElementById('preload').style.visibility='visible'} 
		} 
////////////////////////////////////		
String.prototype.trim = function(){ return this.replace(/^[\s]+|[\s]+$/g,'') }