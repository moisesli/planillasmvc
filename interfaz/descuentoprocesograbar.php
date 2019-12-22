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
	
	$micodigo=intval($_POST['txtcodigo']);
	$laplanilla=intval($_POST['txtlaplanilla']);
	
	$oUsuario=new Negocio_clsDescuento();
	$txtfaltas=$_POST['txtfaltas'];
	$txttardanzas=$_POST['txttardanzas'];

	$txtingreso1=$_POST['txtingreso1'];
	$txtingreso2=$_POST['txtingreso2'];
	$txtingreso3=$_POST['txtingreso3'];
	$txtingreso4=$_POST['txtingreso4'];
	$txtingreso5=$_POST['txtingreso5'];
	$txtingreso6=$_POST['txtingreso6'];	
	$txtingreso7=$_POST['txtingreso7'];
	$txtingreso8=$_POST['txtingreso8'];
	$txtingreso9=$_POST['txtingreso9'];
	$txtingreso10=$_POST['txtingreso10'];

	$txtingreso11=$_POST['txtingreso11'];
	$txtingreso12=$_POST['txtingreso12'];
	$txtingreso13=$_POST['txtingreso13'];
	$txtingreso14=$_POST['txtingreso14'];
	$txtingreso15=$_POST['txtingreso15'];
	$txtingreso16=$_POST['txtingreso16'];
	$txtingreso17=$_POST['txtingreso17'];
	$txtingreso18=$_POST['txtingreso18'];
	$txtingreso19=$_POST['txtingreso19'];
	$txtingreso20=$_POST['txtingreso20'];
	$txtingreso21=$_POST['txtingreso21'];
	$txtingreso22=$_POST['txtingreso22'];
	$txtingreso23=$_POST['txtingreso23'];
	$txtingreso24=$_POST['txtingreso24'];

	
	$txtipssvida=$_POST['txtipssvida'];
	$txtquinta=$_POST['txtquinta'];

	$txties=$_POST['txties'];


	$txtdescuento1=$_POST['txtdescuento1'];
	$txtdescuento2=$_POST['txtdescuento2'];
	$txtdescuento3=$_POST['txtdescuento3'];
	$txtdescuento4=$_POST['txtdescuento4'];
	$txtdescuento5=$_POST['txtdescuento5'];
	$txtdescuento6=$_POST['txtdescuento6'];
	$txtdescuento7=$_POST['txtdescuento7'];
	$txtdescuento8=$_POST['txtdescuento8'];
	$txtdescuento9=$_POST['txtdescuento9'];
	$txtdescuento10=$_POST['txtdescuento10'];
	$txtdescuento11=$_POST['txtdescuento11'];
	$txtdescuento12=$_POST['txtdescuento12'];
	$txtdescuento13=$_POST['txtdescuento13'];
	$txtdescuento14=$_POST['txtdescuento14'];
	$txtdescuento15=$_POST['txtdescuento15'];
	$txtdescuento16=$_POST['txtdescuento16'];
	$txtdescuento17=$_POST['txtdescuento17'];
	
	$txtdias=$_POST['txtdias'];
	
	$intError=$oUsuario->Modificar_Descuento($micodigo,$txtdias,$txtfaltas,$txtingreso1,$txtingreso2,$txtingreso3,$txtingreso4,$txtingreso5,$txtingreso6,$txtingreso7,$txtingreso8,$txtingreso9,$txtingreso10,$txtingreso11,$txtingreso12,$txtingreso13,$txtingreso14,$txtingreso15,$txtingreso16,$txtingreso17,$txtingreso18,$txtingreso19,$txtingreso20,$txtingreso21,$txtingreso22,$txtingreso23,$txtingreso24,$txties,$txtipssvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtdescuento6,$txtdescuento7,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17);		
	header("location: descuentoproceso.php?micodigo=$laplanilla");
?>	