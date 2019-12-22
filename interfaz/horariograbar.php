<?php session_start();
	$miperiodo=$_SESSION['periodo'];
	$miempresa=$_SESSION['codempresa'];	
	if(!($_SESSION["accesar"] == "OK")){
		session_destroy();
		echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=../index.php'>";	
	}

	include("../config.php");
	require_once(LOGICA."/negocio.php");	

	$elcodigo=intval($_POST['txtcodigo']);
	$oUsuario=new Negocio_clsTrabajador();

	$lunese=$_POST['lunese'];
	$lunes_e=$_POST['lunes_e'];
	$luness=$_POST['luness'];
	$lunes_s=$_POST['lunes_s'];

	$martese=$_POST['martese'];
	$martes_e=$_POST['martes_e'];
	$martess=$_POST['martess'];
	$martes_s=$_POST['martes_s'];

	$miercolese=$_POST['miercolese'];
	$miercoles_e=$_POST['miercoles_e'];
	$miercoless=$_POST['miercoless'];
	$miercoles_s=$_POST['miercoles_s'];

	$juevese=$_POST['juevese'];
	$jueves_e=$_POST['jueves_e'];
	$juevess=$_POST['juevess'];
	$jueves_s=$_POST['jueves_s'];

	$viernese=$_POST['viernese'];
	$viernes_e=$_POST['viernes_e'];
	$vierness=$_POST['vierness'];
	$viernes_s=$_POST['viernes_s'];

	$sabadoe=$_POST['sabadoe'];
	$sabado_e=$_POST['sabado_e'];
	$sabados=$_POST['sabados'];
	$sabado_s=$_POST['sabado_s'];

	$domingoe=$_POST['domingoe'];
	$domingo_e=$_POST['domingo_e'];
	$domingos=$_POST['domingos'];
	$domingo_s=$_POST['domingo_s'];
	
	$intError=$oUsuario->Modificar_Horario($elcodigo,$lunese,$lunes_e,$luness,$lunes_s,$martese,$martes_e,$martess,$martes_s,$miercolese,$miercoles_e,$miercoless,$miercoles_s,$juevese,$jueves_e,$juevess,$jueves_s,$viernese,$viernes_e,$vierness,$viernes_s,$sabadoe,$sabado_e,$sabados,$sabado_s,$domingoe,$domingo_e,$domingos,$domingo_s);		

	header("location: horario.php");
?>		
