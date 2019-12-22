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
		$oUsuario=new Negocio_clsUsuario();
		$oUsuario->pApellidos=$_POST['txtapellidos'];
		$oUsuario->pUsuario=$_POST['txtusuario'];
		$oUsuario->pClave=$_POST['txtclave'];
		$oUsuario->pTipo=$_POST['txtdependencia'];
		$miperiodo=date('Y');		
		$rpta=$oUsuario->Agregar($miperiodo,$miempresa,$miempresa);
		header("location: usuario.php");
	break;
	case 2:	
		//echo $fecha;	
		$oUsuario=new Negocio_clsUsuario();
		$oUsuario->pApellidos=$_POST['txtapellidos'];
		$oUsuario->pUsuario=$_POST['txtusuario'];
		$oUsuario->pClave=$_POST['txtclave'];
		$oUsuario->pTipo=$_POST['txtdependencia'];
		$intError=$oUsuario->Modificar($micodigo);
		
		header("location: usuario.php");
	break;	
	case 3:	
		$oUsuario=new Negocio_clsUsuario();
		$intError=$oUsuario->Eliminar($elcodigo);
		header("location: usuario.php");
	break;
	case 4:	
		//echo $fecha;	
		$oUsuario=new Negocio_clsUsuario();
		$oUsuario->pClave=$_POST['txtclave'];
		$intError=$oUsuario->Modificarusuario($micodigo);	
		header("location: cambiar.php?elcod=101");
	break;				
	case 5:	
		//echo $fecha;	
		$oUsuario=new Negocio_clsUsuario();
		$oUsuario->pClave=$_POST['txtclave'];
		$intError=$oUsuario->Modificarusuario($micodigo);	
		header("location: cambiar1.php?elcod=101");
	break;				
	case 6:	
		//echo $fecha;	
		$oUsuario=new Negocio_clsUsuario();
		$oUsuario->pClave=$_POST['txtclave'];
		$intError=$oUsuario->Modificarusuario($micodigo);	
		header("location: cambiar2.php?elcod=101");
	break;				
	
	}	
?>		
<script languaje="javascript">
	prehide(); 
</script>