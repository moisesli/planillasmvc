<?php 
	session_start();
	$miempresa=$_SESSION['codempresa'];	
	$miperiodo=$_SESSION['periodo'];

	include("../config.php");
	require_once(LOGICA."/negocio.php");	

	$oUsuario=new Negocio_clsPlanilla();

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

	$txtafp1=$_POST['txtafp1'];
	$txtafp2=$_POST['txtafp2'];
	$txtafp3=$_POST['txtafp3'];

	$txtonp=$_POST['txtonp'];
	$txties=$_POST['txties'];
	$txtippsvida=$_POST['txtippsvida'];
	$txtquinta=$_POST['txtquinta'];

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

	$txtessalud=$_POST['txtessalud'];
	$txtsenati=$_POST['txtsenati'];
	$txtscrtsalud=$_POST['txtscrtsalud'];
	$txtscrtpension=$_POST['txtscrtpension'];
	$txtcts=$_POST['txtcts'];

	$rpta=$oUsuario->AgregarConcepto($miempresa,$miperiodo,$txtingreso1,$txtingreso2,$txtingreso3,$txtingreso4,$txtingreso5,$txtingreso6,$txtingreso7,$txtingreso8,$txtingreso9,$txtingreso10,$txtingreso11,$txtingreso12,$txtingreso13,$txtingreso14,$txtingreso15,$txtingreso16,$txtingreso17,$txtingreso18,$txtingreso19,$txtingreso20,$txtingreso21,$txtingreso22,$txtingreso23,$txtingreso24,$txtafp1,$txtafp2,$txtafp3,$txtonp,$txties,$txtippsvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtdescuento6,$txtdescuento7,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17,$txtessalud,$txtsenati,$txtscrtsalud,$txtscrtpension,$txtcts);

	header("location: concepto.php");

?>		