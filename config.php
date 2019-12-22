<?php

	define('SUPERUSUARIO',"ADMIN");
	define('WEBMASTER',"123456");
	define('LUGAR',"Direccion");
	define('SISTEMA',"SISPLANI 2019 - 2023 - Sistema de Control Personal - Planillas.");
	define('VERSION',"");
	define('JAZB',"SISBIBLIO V. 1.0");
	define('TITULO',"Sub Gerencia de Personal");
	define('HOME',$_SERVER['DOCUMENT_ROOT']."");
	define('ADMINISTRACION',HOME."/planillasmvc");
	
	define('INTERFAZ',ADMINISTRACION."/interfaz");
	define('ACCESO',ADMINISTRACION."/datos");
	define('LOGICA',ADMINISTRACION."/negocio");

	define('HERRAMIENTAS_PHP',ADMINISTRACION."/php");

	define('HOME_WEB',"");
	define('INTRANET_WEB',HOME_WEB."/planillasmvc");
	define('ADMINISTRACION_WEB',HOME_WEB."/planillasmvc");	

	define('IMAGENES',INTRANET_WEB."/images");

	define('ESTILOS',INTRANET_WEB."/css");
	define('JAVASCRIPT',INTRANET_WEB."/js");

	define('LOGIN',INTRANET_WEB."/login.php");
	define('SALIR',INTRANET_WEB."/salir.php");
	date_default_timezone_set("America/Lima");
?>