<?php session_start();
	$miempresa=$_SESSION['codempresa'];
	$miperiodo=$_SESSION['periodo'];
	$miempresa=$_SESSION['codempresa'];	
	if(!($_SESSION["accesar"] == "OK")){
		session_destroy();
		echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=../index.php'>";	
	}
	include("../config.php");
	require_once(LOGICA."/negocio.php");	

	$oLiquidacion=new Negocio_clsLiquidacion();

	$micodigo=$_GET['micodigo'];	

	$rsempleador=$oLiquidacion->Eliminarliquidacion($micodigo);

	header("location: liquidacion.php");
?>		