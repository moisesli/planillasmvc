<?php session_start();
	$miempresa=$_SESSION['codempresa'];
	$miperiodo=$_SESSION['periodo'];
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
	$micodigo=intval($_POST['txtelcodigo']);
	$elcodigo=intval($_POST['txtcodigo']);
	switch($miopcion){
	case 1:	
		$oUsuario=new Negocio_clsAfp();
		$txtmes=$_POST['txtmes'];
		$txtaporte=$_POST['txtaporte'];
		$txtprima=$_POST['txtprima'];
		$txtcomision=$_POST['txtcomision'];
		$txtflujo=$_POST['txtflujo'];	
		$txttope=$_POST['txttope'];
		$rpta=$oUsuario->Agregar_Aporte($micodigo,$miperiodo,$txtmes,$txtaporte,$txtprima,$txtcomision,$txttope,$txtflujo);
		header("location: afpaportes.php?micodigo=$micodigo");
	break;
	case 2:	
		$oUsuario=new Negocio_clsAfp();
		$txtaporte=$_POST['txtaporte'];
		$txtprima=$_POST['txtprima'];
		$txtcomision=$_POST['txtcomision'];
		$txtflujo=$_POST['txtflujo'];	
		$txttope=$_POST['txttope'];
		///////////
			$numero = $txttope; 
			$caracteres = Array(",",""); 
			$txttope = str_replace($caracteres,"",$numero);
		/////////////		
		$intError=$oUsuario->Modificar_Aporte($elcodigo,$txtaporte,$txtprima,$txtcomision,$txttope,$txtflujo);		
		header("location: afpaportes.php?micodigo=$micodigo");
	break;	
	case 3:	
		$oUsuario=new Negocio_clsAfp();
		$intError=$oUsuario->Aporte($elcodigo);
		header("location: afp.php");
	break;
	}	
?>		
<script languaje="javascript">
	prehide(); 
</script>