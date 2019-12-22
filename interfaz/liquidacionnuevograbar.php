<?php session_start();
	$miempresa=$_SESSION['codempresa'];
	$miperiodo=$_SESSION['periodo'];
	$miempresa=$_SESSION['codempresa'];	
	if(!($_SESSION["accesar"] == "OK")){
		session_destroy();
		echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=../index.php'>";	
	}
	include("../config.php");
	require_once(LOGICA."/negocio.php");	

	$oLiquidacion=new Negocio_clsLiquidacion();
	$oTrabajador=new Negocio_clsTrabajador();
	$oEntidad=new Negocio_clsConfiguracion();
	$oTablas=new Negocio_clsTablas();

	$rsempleador=$oEntidad->Buscar_aporteempleador($miempresa,$miperiodo);
	$poronp=$rsempleador['onp']/100;

	$txtcodtra=$_POST['txtcodtra'];	

	$rowtrabajador=$oTrabajador->getROW($txtcodtra);	
	
	$rscodliquidacion=$oLiquidacion->AgregarLiquidacion($txtcodtra);

	$txtapellidos=$_POST['txtapellidos'];
	$txtdni=$_POST['txtdni'];
	$txtcargo=$_POST['txtcargo'];
	$txtfechaini=$_POST['txtfechaini'];
	$txtfechafin=$_POST['txtfechafin'];
	$txttiempo=$_POST['txttiempo'];
	$txtfalta=$_POST['txtfalta'];
	$txtmotivo=$_POST['txtmotivo'];	

	$rsregistro=$oLiquidacion->AgregarLiquidaciodatosn($rscodliquidacion,$txtapellidos,$txtdni,$txtcargo,$txtfechaini,$txtfechafin,$txttiempo,$txtfalta,$txtmotivo);

	$txtsueldo=$_POST['txtsueldo'];
	$txtasignacion=$_POST['txtasignacion'];
	$txtcomision=$_POST['txtcomision'];
	$txtextras=$_POST['txtextras'];
	$txtotro=$_POST['txtotro'];
	$txtsexto=$_POST['txtsexto'];

	$totalcompu=$txtsueldo+$txtasignacion+$txtcomision+$txtextras+$txtotro+$txtsexto;
	$totalcompuotro=$txtsueldo+$txtasignacion+$txtcomision+$txtextras+$txtotro;
	
	$rsregistro=$oLiquidacion->AgregarLiquidacioncompua($rscodliquidacion,$txtsueldo,$txtasignacion,$txtcomision,$txtextras,$txtotro,$txtsexto,$totalcompu,$totalcompuotro);


	$txtctsmes=$_POST['txtctsmes'];
	$txtctsdia=$_POST['txtctsdia'];
	$txtcts=$_POST['txtcts'];
	
	$totalctsmes=($totalcompu*$txtctsmes)*$txtcts;
	$totalctsdia=($totalcompu/30*$txtctsdia)*$txtcts;

	$totalcts=$totalctsmes+$totalctsdia;

	$rsregistro=$oLiquidacion->AgregarLiquidacioncts($rscodliquidacion,$txtctsmes,$txtctsdia,$totalctsmes,$totalctsdia,$totalcts);

	$txtvacadiapen=$_POST['txtvacadiapen'];
	$txtvacamesefec=$_POST['txtvacamesefec'];
	$txtvacadiaefec=$_POST['txtvacadiaefec'];	


	$txttotalvacadiapen=($totalcompuotro)/365*$txtvacadiapen;
	$txttotalmesefec=($totalcompuotro)/12*$txtvacamesefec;	
	$txttotcavadiaefec=($totalcompuotro)/12/30*$txtvacadiaefec;

	$tiempocompu=$txtvacamesefec.' meses y '.($txtvacadiapen+$txtvacadiaefec).' dias';

	$totalvaca=$txttotalvacadiapen+$txttotalmesefec+$txttotcavadiaefec;
		
	$rsregistro=$oLiquidacion->AgregarLiquidacionvaca($rscodliquidacion,$tiempocompu,$txtvacadiapen,$txtvacamesefec,$txtvacadiaefec,$txttotalvacadiapen,$txttotalmesefec,$txttotcavadiaefec,$totalvaca);

	$txtgratimesefec=$_POST['txtgratimesefec'];
	$txtgratibonopor=$_POST['txtgratibonopor'];

	$txtgratibonopor100=$_POST['txtgratibonopor']/100;

	$tiempograti=$txtgratimesefec.' meses';

	$totalgratimesefec=($totalcompuotro)/6*$txtgratimesefec;
	$totalgratibono=$totalgratimesefec*$txtgratibonopor100;

	$totalgrati=$totalgratimesefec+$totalgratibono;

	$rsregistro=$oLiquidacion->AgregarLiquidaciongrati($rscodliquidacion,$txtgratimesefec,$txtgratibonopor,$tiempograti,$totalgratimesefec,$totalgratibono,$totalgrati);

	$txtotro1=$_POST['txtotro1'];
	$txtotro2=$_POST['txtotro2'];
	$txtotro3=$_POST['txtotro3'];
	$txtotro4=$_POST['txtotro4'];

	$totalotros=$txtotro1+$txtotro2+$txtotro3+$txtotro4;

	$rsregistro=$oLiquidacion->AgregarLiquidacionotros($rscodliquidacion,$txtotro1,$txtotro2,$txtotro3,$txtotro4,$totalotros);

	$txtsueldobasico=$_POST['txtsueldobasico'];
	
	$montoessalud=$totalvaca+$totalotros;
		
	if ($montoessalud<$txtsueldobasico)
	{
		$totalesalud=round($txtsueldobasico*$txtgratibonopor100,2);
	}
	else
	{
		$totalesalud=round($montoessalud*$txtgratibonopor100,2);
	}

	$rsregistro=$oLiquidacion->AgregarLiquidacionessalud($rscodliquidacion,$txtgratibonopor100,$totalesalud);
	
	// AFP Y ONP
		$totalafecto=round($totalvaca+$totalgrati+$totalotros,2);
		
			//echo $totalafecto;
			if ($rowtrabajador['onp']=='S')
			{
				//echo $poronp;// ES ONP
				
				$totalonp= round($totalafecto*$poronp,2);
				
				//echo $totalonp;
				
				$afp1=0;
				$afp2=0;
				$afp3=0;
				// ESSALUD								
			}
			if ($rowtrabajador['afp'])
			{
				// ES AFP
				$nombreafp=$rowtrabajador['afp'];
				// DESCUENTOS POR AFP	
				$oAfp=new Negocio_clsAfp();
				// BUSCAR EL CODIGO DE LA AFP
				$rsAfpcodigo=$oAfp->Buscar_Afpcodigo($miempresa,$nombreafp);
				$codafp=$rsAfpcodigo['codigo'];
				
				$elmesnumero=intval(date('m'));
				
				$rstablas=$oTablas->Buscarmesnumero($elmesnumero);
				$elmesplanilla=$rstablas['nombre'];
					
				
				$rsAfp=$oAfp->Buscar_Aporte($codafp,$miperiodo,$elmesplanilla);
				$poraporte=$rsAfp['aporte']/100;
				$porprima=$rsAfp['prima']/100;
				$porcomision=$rsAfp['comision']/100;
				$porflujo=$rsAfp['flujo']/100;
				
				//$totalonp=0;
				$afp1=round($totalafecto*$poraporte,2);
				$afp2=round($totalafecto*$porprima,2);
				if ($rowtrabajador['flujo']=='S')
				{	
					$aporteafpcomi=$porflujo;	
					$afp3=round($totalafecto*$porflujo,2);		
				}
				else
				{
					$aporteafpcomi=$porcomision;
					$afp3=round($totalafecto*$porcomision,2);	
				}
				
				$totalonp=0;
			}

		$totaldctoafp=$afp1+$afp2+$afp3+$totalonp;
			
	$rsregistro=$oLiquidacion->AgregarLiquidacionafp($rscodliquidacion,$poraporte,$afp1,$porprima,$afp2,$aporteafpcomi,$afp3,$poronp,$totalonp,$totaldctoafp);

	$totalneto=($totalcts+$totalvaca+$totalgrati+$totalotros)-$totaldctoafp;

	$rsregistrosss=$oLiquidacion->Modificarliquidacion($rscodliquidacion,$totalcts,$totalvaca,$totalgrati,$totalotros,$totalesalud,$totaldctoafp,$totalneto);

	header("location: liquidacionmodificar.php?micodigo=$txtcodtra&elcodliquidacion=$rscodliquidacion");
?>		