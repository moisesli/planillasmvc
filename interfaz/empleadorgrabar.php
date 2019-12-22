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
		$oUsuario=new Negocio_clsEmpleador();
		// AGREGAR MESES DE APORTACION
		$hastaperiodo=intval($miperiodo)+5;
		for ($i = $miperiodo; $i <= $hastaperiodo; $i++) {
				$oMes= new Negocio_clsEmpleador();
				$rsMes=$oMes->Mostrar_Registros_Mes();		
				while($rowmes=$rsMes->fetch_array())
				{					
					$rpta=$oUsuario->Agregar($miempresa,$i,$rowmes['nombre']);
				}
		}	
		header("location: empleador.php");
	break;
	case 2:	
		$oUsuario=new Negocio_clsEmpleador();
		$txtessalud=$_POST['txtessalud'];
		$txtonp=$_POST['txtonp'];
		$txtesscas=$_POST['txtesscas'];
		$txtsolcas=$_POST['txtsolcas'];
		$txtmaxcas=$_POST['txtmaxcas'];
		
		$txtsenati=$_POST['txtsenati'];
		$txtscrtsalud=$_POST['txtscrtsalud'];
		$txtscrtpension=$_POST['txtscrtpension'];
		
		///////////
			$numero = $txtmaxcas; 
			$caracteres = Array(",",""); 
			$txtmaxcas = str_replace($caracteres,"",$numero);
		/////////////		
		$intError=$oUsuario->Modificar($elcodigo,$txtessalud,$txtonp,$txtesscas,$txtsolcas,$txtmaxcas,$txtsenati,$txtscrtsalud,$txtscrtpension);		
		header("location: empleador.php");
	break;	
	case 3:	
		$oUsuario=new Negocio_clsEmpleador();
		$intError=$oUsuario->Aporte($elcodigo);
		header("location: afp.php");
	break;
	}	
?>		
<script languaje="javascript">
	prehide(); 
</script>