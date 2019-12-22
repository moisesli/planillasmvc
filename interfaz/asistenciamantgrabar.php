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

    $micodasistencia=$_POST['txtcodigo'];
	$txtcodtrabajador=$_POST['txtcodtrabajador'];
	$txtmes=$_POST['txtmes'];


	$lahora=$_POST['lahora'];
	$txtmotivo=$_POST['txtmotivo'];
	$txtdetalle=$_POST['txtdetalle'];

	$txthoratrabajo=$_POST['txthoratrabajo'];

	$lafecha=$_POST['txtfecha'];
	$fechahoy=date('Y-m-d');

	$intError=$oUsuario->ActualizarAsistencia($micodasistencia,$lahora,$txtmotivo,$txtdetalle);			

	header("location: procesarasistencia.php?micodigo=$txtcodtrabajador&mimes=$txtmes");

?>		
