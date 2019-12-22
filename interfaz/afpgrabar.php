<?php session_start();
	$miempresa=$_SESSION['codempresa'];
	$miperiodo=$_SESSION['periodo'];
	if(!($_SESSION["accesar"] == "OK")){
		session_destroy();
		echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=../index.php'>";	
	}

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
		$oUsuario=new Negocio_clsAfp();
		$miafp=$_POST['txtafp'];
		$rptaAFP=$oUsuario->Agregar($miafp,$miempresa);		
		// AGREGAR MESES DE APORTACION
		$hastaperiodo=intval($miperiodo)+5;
		for ($i = $miperiodo; $i <= $hastaperiodo; $i++) {
				$oMes= new Negocio_clsAfp();
				$rsMes=$oMes->Mostrar_Registros_Mes();		
				while($rowmes=$rsMes->fetch_array())
				{			
					$rpta=$oUsuario->Agregar_Aporte($rptaAFP,$i,$rowmes['nombre'],0,0,0,0,0);
				}
		}		
		//////////////////////////////
		header("location: afp.php");
	break;
	case 2:	
		//echo $fecha;	
		$oUsuario=new Negocio_clsAfp();
		$miafp=$_POST['txtafp'];
		$intError=$oUsuario->Modificar($micodigo,$miafp);		
		header("location: afp.php");
	break;	
	case 3:	
		$oUsuario=new Negocio_clsAfp();
		$intError=$oUsuario->Eliminar($elcodigo);
		header("location: afp.php");
	break;
	}	
?>		