<?php session_start();
	$miempresa=$_SESSION['codempresa'];
	if(!($_SESSION["accesar"] == "OK")){
		session_destroy();
		echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=../index.php'>";	
	}
?>
<?php
	include("../config.php");
	require_once(LOGICA."/negocio.php");	
	function CDate($vFecha, $vFormat='Y-m-d'){
		$miFecha=split("-", $vFecha);
		$vFecha=mktime(0, 0, 0, intval($miFecha[1]), intval($miFecha[0]), intval($miFecha[2]));
		return date($vFormat, $vFecha);
	}		
	$miopcion=intval($_GET['opcion']);
	$micodigo=intval($_POST['txtcodigo']);
	$elcodigo=intval($_GET['micodigo']);
	switch($miopcion){
	case 1:	
		$oUsuario=new Negocio_clsTipotrabajador();
		$txttipo=$_POST['txttipo'];
		$txtentradam=$_POST['txtentradam'];
		$txtentradat=$_POST['txtentradat'];
		$txtdias=$_POST['txtdias'];
		$txtinicial=$_POST['txtinicial'];
		$txttrabajo=$_POST['txttrabajo'];	
			
		$rpta=$oUsuario->Agregar($miempresa,$txttipo,$txtentradam,$txtentradat,$txtdias,$txtinicial,$txttrabajo);
		header("location: tipotrabajador.php");
	break;
	case 2:	
		//echo $fecha;	
		$oUsuario=new Negocio_clsTipotrabajador();
		$txttipo=$_POST['txttipo'];
		$txtentradam=$_POST['txtentradam'];
		$txtentradat=$_POST['txtentradat'];	
		$txtdias=$_POST['txtdias'];	
		$txtinicial=$_POST['txtinicial'];
		$txttrabajo=$_POST['txttrabajo'];	
			
		$intError=$oUsuario->Modificar($micodigo,$txttipo,$txtentradam,$txtentradat,$txtdias,$txtinicial,$txttrabajo);		
		header("location: tipotrabajador.php");
	break;	
	case 3:	
		$oUsuario=new Negocio_clsTipotrabajador();
		$intError=$oUsuario->Eliminar($elcodigo);
		header("location: tipotrabajador.php");
	break;
	}	
?>		