<?php
	include("../config.php");
	require_once(LOGICA."/negocio.php");	
	$olistado->pNombre=$_POST['txtperiodo'];
	session_start();
	$_SESSION['periodo']=$_POST['txtperiodo'];
	header("location: periodo.php");
?>		