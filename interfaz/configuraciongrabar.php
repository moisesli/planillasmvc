<?php session_start();
	$miempresa=$_SESSION['codempresa'];
	$miperiodo=$_SESSION['periodo'];
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
//	$micodigo=intval($_POST['txtelcodigo']);
	$elcodigo=intval($_POST['txtcodigo']);
	switch($miopcion){
	case 1:	
		$oUsuario=new Negocio_clsConfiguracion();
		// AGREGAR MESES DE APORTACION
		$hastaperiodo=intval($miperiodo)+5;
		for ($i = $miperiodo; $i <= $hastaperiodo; $i++) {
			$rpta=$oUsuario->Agregar($miempresa,$i);
		}	
		header("location: configuracion.php");
	break;
	case 2:	
		$oUsuario=new Negocio_clsConfiguracion();
		$txtunidad=$_POST['txtunidad'];
		$txtentidad=$_POST['txtentidad'];
		$txtruc=$_POST['txtruc'];
		$txtdireccion=$_POST['txtdireccion'];
		$txtemail=$_POST['txtemail'];
		$txttelefono=$_POST['txttelefono'];
		
		$txtsueldo=$_POST['txtsueldo'];
		$txtasignacion=$_POST['txtasignacion'];
		$txtcts=$_POST['txtcts'];
		$txtminuto=$_POST['txtminuto'];
		$txtuit=$_POST['txtuit'];
		$txtquinta=$_POST['txtquinta'];
	
		$intError=$oUsuario->Modificar($elcodigo,$txtunidad,$txtentidad,$txtruc,$txtdireccion,$txtemail,$txttelefono,$txtsueldo,$txtasignacion,$txtcts,$txtminuto,$txtuit,$txtquinta);		
		header("location: configuracion.php");
	break;	
	case 3:	
		$oUsuario=new Negocio_clsConfiguracion();
		$intError=$oUsuario->Aporte($elcodigo);
		header("location: afp.php");
	break;
	}	
?>		
<script languaje="javascript">
	prehide(); 
</script>