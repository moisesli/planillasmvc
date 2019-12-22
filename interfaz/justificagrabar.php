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
		$oUsuario=new Negocio_clsBanco();
		$txtbanco=$_POST['txtbanco'];
		$rpta=$oUsuario->AgregarJustifca($txtbanco);
		header("location: justificacion.php");
	break;
	case 2:	
		//echo $fecha;	
		$oUsuario=new Negocio_clsBanco();
		$txtbanco=$_POST['txtbanco'];
		$intError=$oUsuario->ModificarJustifca($micodigo,$txtbanco);		
		header("location: justificacion.php");
	break;	
	}	
?>		
<script languaje="javascript">
	prehide(); 
</script>