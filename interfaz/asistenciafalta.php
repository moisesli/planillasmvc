<?php session_start();
	$miperiodo=$_SESSION['periodo'];
	$miempresa=$_SESSION['codempresa'];	
	if(!($_SESSION["accesar"] == "OK")){
		session_destroy();
		echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=../index.php'>";	
	}

	include("../config.php");
	require_once(LOGICA."/negocio.php");	

	$oUsuario=new Negocio_clsDescuento();

    $mimes=$_GET['mimes'];
	$micodigo=$_GET['micodigo'];
	$micodasiste=$_GET['micodasiste'];


	$intError=$oUsuario->Actualizarfalta($micodasiste);		

	header("location: procesarasistencia.php?micodigo=$micodigo&mimes=$mimes");

?>		
