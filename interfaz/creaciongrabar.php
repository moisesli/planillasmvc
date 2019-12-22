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
	$micodigo=intval($_POST['txtcodigo']);
	$elcodigo=intval($_GET['micodigo']);
	switch($miopcion){
	case 1:	
		$oUsuario=new Negocio_clsCreacion();
		$txtplanilla=$_POST['txtplanilla'];
		$txtmes=$_POST['txtmes'];
		$txttipo=$_POST['txttipo'];
		$txtnumero=$_POST['txtnumero'];
		
		// INGRESOS
		$txtingreso1=$_POST['txtingreso1'];
		$txtok1='S';
		$txtingreso2=$_POST['txtingreso2'];
		$txtok2=$_POST['txtok2'];
		$txtingreso3=$_POST['txtingreso3'];
		$txtok3=$_POST['txtok3'];
		$txtingreso4=$_POST['txtingreso4'];
		$txtok4=$_POST['txtok4'];
			
		$txtingreso5=$_POST['txtingreso5'];
		$txtok5=$_POST['txtok5'];			
			
		if ($txtplanilla=='REMUNERACIONES' or $txtplanilla=='GRATIFICACIONES')	
		{
			$txtingreso5='ASIG. FAM.';
			$txtok5='S';		
		}
			
			
		$txtasigna=$_POST['txtingreso6'];		
		$txtok6=$_POST['txtok6'];	
		
		$txtfechaini=$_POST['txtfechaini'];
		$txtfechafin=$_POST['txtfechafin'];
				
		$txtingreso7=$_POST['txtingreso7'];		
		$txtok7=$_POST['txtok7'];	
		$txtingreso8=$_POST['txtingreso8'];		
		$txtok8=$_POST['txtok8'];	
		$txtingreso9=$_POST['txtingreso9'];		
		$txtok9=$_POST['txtok9'];	
		$txtingreso10=$_POST['txtingreso10'];		
		$txtok10=$_POST['txtok10'];	

		$txtingreso11=$_POST['txtingreso11'];		
		$txtok11=$_POST['txtok11'];	
		$txtingreso12=$_POST['txtingreso12'];		
		$txtok12=$_POST['txtok12'];	
		$txtingreso13=$_POST['txtingreso13'];		
		$txtok13=$_POST['txtok13'];	
		$txtingreso14=$_POST['txtingreso14'];		
		$txtok14=$_POST['txtok14'];	
		$txtingreso15=$_POST['txtingreso15'];		
		$txtok15=$_POST['txtok15'];	
		$txtingreso16=$_POST['txtingreso16'];		
		$txtok16=$_POST['txtok16'];	
		$txtingreso17=$_POST['txtingreso17'];		
		$txtok17=$_POST['txtok17'];	
		$txtingreso18=$_POST['txtingreso18'];		
		$txtok18=$_POST['txtok18'];	
		$txtingreso19=$_POST['txtingreso19'];		
		$txtok19=$_POST['txtok19'];	
		$txtingreso20=$_POST['txtingreso20'];		
		$txtok20=$_POST['txtok20'];	
		$txtingreso21=$_POST['txtingreso21'];		
		$txtok21=$_POST['txtok21'];	
		$txtingreso22=$_POST['txtingreso22'];		
		$txtok22=$_POST['txtok22'];	
		$txtingreso23=$_POST['txtingreso23'];		
		$txtok23=$_POST['txtok23'];	
		$txtingreso24=$_POST['txtingreso24'];		
		$txtok24=$_POST['txtok24'];	
			
		// DESCUENTOS
		$txtafp1=$_POST['txtafp1'];
		$txtafp2=$_POST['txtafp2'];
		$txtafp3=$_POST['txtafp3'];
		$txtonp=$_POST['txtonp'];
		$txties=$_POST['txties'];
			
		$txtipssvida=$_POST['txtipssvida'];
			
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
			
			
		// APORTES
		$txtessalud=$_POST['txtessalud'];
		$txtsenati=$_POST['txtsenati'];
		$txtscrtsalud=$_POST['txtscrtsalud'];
		$txtscrtpension=$_POST['txtscrtpension'];
		$txtcts=$_POST['txtcts'];
		// BUSCAR PLANILLA
		$rscontar=$oUsuario->Contar_Registros_Planilla($miempresa,$miperiodo,$txtplanilla,$txtmes,$txttipo,$txtnumero);
		$planillatotal=$rscontar['total'];
		if ($planillatotal==0)
		{
			$rpta=$oUsuario->Agregar($miempresa,$miperiodo,$txtplanilla,$txtmes,$txttipo,$txtnumero,$txtingreso1,$txtok1,$txtingreso2,$txtok2,$txtingreso3,$txtok3,$txtingreso4,$txtok4,$txtingreso5,$txtok5,$txtasigna,$txtok6,$txtafp1,$txtafp2,$txtafp3,$txtonp,$txtessalud,$txtsenati,$txtscrtsalud,$txtscrtpension,$txties,$txtipssvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtcts,$txtdescuento6,$txtdescuento7,$txtfechaini,$txtfechafin,$txtingreso7,$txtok7,$txtingreso8,$txtok8,$txtingreso9,$txtok9,$txtingreso10,$txtok10,$txtingreso11,$txtok11,$txtingreso12,$txtok12,$txtingreso13,$txtok13,$txtingreso14,$txtok14,$txtingreso15,$txtok15,$txtingreso16,$txtok16,$txtingreso17,$txtok17,$txtingreso18,$txtok18,$txtingreso19,$txtok19,$txtingreso20,$txtok20,$txtingreso21,$txtok21,$txtingreso22,$txtok22,$txtingreso23,$txtok23,$txtingreso24,$txtok24,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17);		
			header("location: creacion.php");
		}
		else
		{
			header("location: creacion.php");
		}
	break;
	case 2:	
		$oUsuario=new Negocio_clsCreacion();

		$txtingreso1=$_POST['txtingreso1'];
		$txtok1='S';
		$txtingreso2=$_POST['txtingreso2'];
		$txtok2=$_POST['txtok2'];
		$txtingreso3=$_POST['txtingreso3'];
		$txtok3=$_POST['txtok3'];
		$txtingreso4=$_POST['txtingreso4'];
		$txtok4=$_POST['txtok4'];
		$txtingreso5=$_POST['txtingreso5'];
		$txtok5=$_POST['txtok5'];
		$txtasigna=$_POST['txtingreso6'];		
		$txtok6=$_POST['txtok6'];		
		// DESCUENTOS
		$txtfechaini=$_POST['txtfechaini'];
		$txtfechafin=$_POST['txtfechafin'];
				
		$txtingreso7=$_POST['txtingreso7'];		
		$txtok7=$_POST['txtok7'];	
		$txtingreso8=$_POST['txtingreso8'];		
		$txtok8=$_POST['txtok8'];	
		$txtingreso9=$_POST['txtingreso9'];		
		$txtok9=$_POST['txtok9'];	
		$txtingreso10=$_POST['txtingreso10'];		
		$txtok10=$_POST['txtok10'];	

		
		$txtingreso11=$_POST['txtingreso11'];		
		$txtok11=$_POST['txtok11'];	
		$txtingreso12=$_POST['txtingreso12'];		
		$txtok12=$_POST['txtok12'];	
		$txtingreso13=$_POST['txtingreso13'];		
		$txtok13=$_POST['txtok13'];	
		$txtingreso14=$_POST['txtingreso14'];		
		$txtok14=$_POST['txtok14'];	
		$txtingreso15=$_POST['txtingreso15'];		
		$txtok15=$_POST['txtok15'];	
		$txtingreso16=$_POST['txtingreso16'];		
		$txtok16=$_POST['txtok16'];	
		$txtingreso17=$_POST['txtingreso17'];		
		$txtok17=$_POST['txtok17'];	
		$txtingreso18=$_POST['txtingreso18'];		
		$txtok18=$_POST['txtok18'];	
		$txtingreso19=$_POST['txtingreso19'];		
		$txtok19=$_POST['txtok19'];	
		$txtingreso20=$_POST['txtingreso20'];		
		$txtok20=$_POST['txtok20'];	
		$txtingreso21=$_POST['txtingreso21'];		
		$txtok21=$_POST['txtok21'];	
		$txtingreso22=$_POST['txtingreso22'];		
		$txtok22=$_POST['txtok22'];	
		$txtingreso23=$_POST['txtingreso23'];		
		$txtok23=$_POST['txtok23'];	
		$txtingreso24=$_POST['txtingreso24'];		
		$txtok24=$_POST['txtok24'];	
			
			
		$txtafp1=$_POST['txtafp1'];
		$txtafp2=$_POST['txtafp2'];
		$txtafp3=$_POST['txtafp3'];
		$txtonp=$_POST['txtonp'];
		$txties=$_POST['txties'];
		$txtipssvida=$_POST['txtippsvida'];
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
			
			
		// APORTES
		$txtessalud=$_POST['txtessalud'];
		$txtsenati=$_POST['txtsenati'];
		$txtscrtsalud=$_POST['txtscrtsalud'];
		$txtscrtpension=$_POST['txtscrtpension'];
		$txtcts=$_POST['txtcts'];

		$intError=$oUsuario->Modificar($micodigo,$txtingreso1,$txtok1,$txtingreso2,$txtok2,$txtingreso3,$txtok3,$txtingreso4,$txtok4,$txtingreso5,$txtok5,$txtasigna,$txtok6,$txtafp1,$txtafp2,$txtafp3,$txtonp,$txtessalud,$txtsenati,$txtscrtsalud,$txtscrtpension,$txties,$txtipssvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtcts,$txtdescuento6,$txtdescuento7,$txtfechaini,$txtfechafin,$txtingreso7,$txtok7,$txtingreso8,$txtok8,$txtingreso9,$txtok9,$txtingreso10,$txtok10,$txtingreso11,$txtok11,$txtingreso12,$txtok12,$txtingreso13,$txtok13,$txtingreso14,$txtok14,$txtingreso15,$txtok15,$txtingreso16,$txtok16,$txtingreso17,$txtok17,$txtingreso18,$txtok18,$txtingreso19,$txtok19,$txtingreso20,$txtok20,$txtingreso21,$txtok21,$txtingreso22,$txtok22,$txtingreso23,$txtok23,$txtingreso24,$txtok24,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17);		
		header("location: creacion.php");
	break;	
	case 3:	
		$oUsuario=new Negocio_clsCreacion();
		$intError=$oUsuario->Eliminar($elcodigo);
		header("location: creacion.php");
	break;
	case 4:	
		$oUsuario=new Negocio_clsCreacion();
		$txtplanilla=$_POST['txtplanillax'];
		$txtmes=$_POST['txtmesx'];
		$txttipo=$_POST['txttipox'];
		$txtnumero=$_POST['txtnumerox'];
		
		// INGRESOS
		$txtingreso1=$_POST['txtingreso1x'];
		$txtok1='S';
		$txtingreso2=$_POST['txtingreso2x'];
		$txtok2=$_POST['txtok2x'];
		$txtingreso3=$_POST['txtingreso3x'];
		$txtok3=$_POST['txtok3x'];
		$txtingreso4=$_POST['txtingreso4x'];
		$txtok4=$_POST['txtok4x'];
		$txtingreso5=$_POST['txtingreso5x'];
		$txtok5=$_POST['txtok5x'];
		$txtasigna=$_POST['txtingreso6x'];		
		$txtok6=$_POST['txtok6x'];	
		
		$txtfechaini=$_POST['txtfechainix'];
		$txtfechafin=$_POST['txtfechafinx'];
				
		$txtingreso7=$_POST['txtingreso7x'];		
		$txtok7=$_POST['txtok7x'];	
		$txtingreso8=$_POST['txtingreso8x'];		
		$txtok8=$_POST['txtok8x'];	
		$txtingreso9=$_POST['txtingreso9x'];		
		$txtok9=$_POST['txtok9x'];	
		$txtingreso10=$_POST['txtingreso10x'];		
		$txtok10=$_POST['txtok10x'];	

		$txtingreso11=$_POST['txtingreso11x'];		
		$txtok11=$_POST['txtok11x'];	
		$txtingreso12=$_POST['txtingreso12x'];		
		$txtok12=$_POST['txtok12x'];	
		$txtingreso13=$_POST['txtingreso13x'];		
		$txtok13=$_POST['txtok13x'];	
		$txtingreso14=$_POST['txtingreso14x'];		
		$txtok14=$_POST['txtok14x'];	
		$txtingreso15=$_POST['txtingreso15x'];		
		$txtok15=$_POST['txtok15x'];	
		$txtingreso16=$_POST['txtingreso16x'];		
		$txtok16=$_POST['txtok16x'];	
		$txtingreso17=$_POST['txtingreso17x'];		
		$txtok17=$_POST['txtok17x'];	
		$txtingreso18=$_POST['txtingreso18x'];		
		$txtok18=$_POST['txtok18x'];	
		$txtingreso19=$_POST['txtingreso19x'];		
		$txtok19=$_POST['txtok19x'];	
		$txtingreso20=$_POST['txtingreso20x'];		
		$txtok20=$_POST['txtok20x'];	
		$txtingreso21=$_POST['txtingreso21x'];		
		$txtok21=$_POST['txtok21x'];	
		$txtingreso22=$_POST['txtingreso22x'];		
		$txtok22=$_POST['txtok22x'];	
		$txtingreso23=$_POST['txtingreso23x'];		
		$txtok23=$_POST['txtok23x'];	
		$txtingreso24=$_POST['txtingreso24x'];		
		$txtok24=$_POST['txtok24x'];	
			
		// DESCUENTOS
		$txtafp1=$_POST['txtafp1x'];
		$txtafp2=$_POST['txtafp2x'];
		$txtafp3=$_POST['txtafp3x'];
		$txtonp=$_POST['txtonpx'];
		$txties=$_POST['txtiesx'];
		$txtipssvida=$_POST['txtipssvidax'];
		$txtquinta=$_POST['txtquintax'];
		$txtdescuento1=$_POST['txtdescuento1x'];
		$txtdescuento2=$_POST['txtdescuento2x'];
		$txtdescuento3=$_POST['txtdescuento3x'];
		$txtdescuento4=$_POST['txtdescuento4x'];
		$txtdescuento5=$_POST['txtdescuento5x'];
		$txtdescuento6=$_POST['txtdescuento6x'];
		$txtdescuento7=$_POST['txtdescuento7x'];
			
		$txtdescuento8=$_POST['txtdescuento8x'];
		$txtdescuento9=$_POST['txtdescuento9x'];
		$txtdescuento10=$_POST['txtdescuento10x'];
		$txtdescuento11=$_POST['txtdescuento11x'];
		$txtdescuento12=$_POST['txtdescuento12x'];
		$txtdescuento13=$_POST['txtdescuento13x'];
		$txtdescuento14=$_POST['txtdescuento14x'];
		$txtdescuento15=$_POST['txtdescuento15x'];
		$txtdescuento16=$_POST['txtdescuento16x'];
		$txtdescuento17=$_POST['txtdescuento17x'];
			
			
		// APORTES
		$txtessalud=$_POST['txtessaludx'];
		$txtsenati=$_POST['txtsenatix'];
		$txtscrtsalud=$_POST['txtscrtsaludx'];
		$txtscrtpension=$_POST['txtscrtpensionx'];
		$txtcts=$_POST['txtctsx'];
		// BUSCAR PLANILLA
		$rscontar=$oUsuario->Contar_Registros_Planilla($miempresa,$miperiodo,$txtplanilla,$txtmes,$txttipo,$txtnumero);
		$planillatotal=$rscontar['total'];
		if ($planillatotal==0)
		{
			$rpta=$oUsuario->Agregar($miempresa,$miperiodo,$txtplanilla,$txtmes,$txttipo,$txtnumero,$txtingreso1,$txtok1,$txtingreso2,$txtok2,$txtingreso3,$txtok3,$txtingreso4,$txtok4,$txtingreso5,$txtok5,$txtasigna,$txtok6,$txtafp1,$txtafp2,$txtafp3,$txtonp,$txtessalud,$txtsenati,$txtscrtsalud,$txtscrtpension,$txties,$txtipssvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtcts,$txtdescuento6,$txtdescuento7,$txtfechaini,$txtfechafin,$txtingreso7,$txtok7,$txtingreso8,$txtok8,$txtingreso9,$txtok9,$txtingreso10,$txtok10
									
			,$txtingreso11,$txtok11,$txtingreso12,$txtok12,$txtingreso13,$txtok13,$txtingreso14,$txtok14,$txtingreso15,$txtok15,$txtingreso16,$txtok16,$txtingreso17,$txtok17,$txtingreso18,$txtok18,$txtingreso19,$txtok19,$txtingreso20,$txtok20,$txtingreso21,$txtok21,$txtingreso22,$txtok22,$txtingreso23,$txtok23,$txtingreso24,$txtok24,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17						
									
									);		
			header("location: creacion.php");
		}
		else
		{
			header("location: creacion.php");
		}
	break;
			
	}	
?>		