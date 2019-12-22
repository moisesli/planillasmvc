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
	$laplanilla=$_GET['micodigo'];	
	// ELIMINAR LA PLANILLA PROCESADA
	$oPlanillas=new Negocio_clsPlanilla();
	$rsPlanillas=$oPlanillas->Eliminar($laplanilla);
	// BUSCAR ESTRUCTURA PLANILLA
	$oPlanilla=new Negocio_clsCreacion();
	$rsPlanilla=$oPlanilla->getROW($laplanilla);
	$elperiodoplanilla=$rsPlanilla['periodo'];


	$nomplanilla=$rsPlanilla['planilla'];
	$elmesplanilla=$rsPlanilla['mes'];
	$eltipoplanilla=$rsPlanilla['tipo'];
	$elnumeroplanilla=$rsPlanilla['numero'];
	// PROCESO DE MONTO AFECTO
	$numafecto=0;
	$mitipoplanilla=substr($eltipoplanilla,0,3);
	//echo $mitipoplanilla;
	//echo $numafecto;
	//////////////////
	// BUSCAR TIPO DE PLANILLA PARA VER SI ESTA EXONERADO O NO
	$oTipoPlanilla=new Negocio_clsTipoplanilla();
	$rsTipoPlanilla=$oTipoPlanilla->Buscar_Tipoplanilla($rsPlanilla['planilla'],$miempresa);
	$exonera=$rsTipoPlanilla['descuento'];
	// PORCENTAJE DE ASIGNACION - SUELDO - MINUTO
		$oEntidad=new Negocio_clsConfiguracion();
		$rsEntidad=$oEntidad->Buscar_Entidad($miempresa,$miperiodo);
		$asignapor=$rsEntidad['asignacion']/100;
		$sueldobasico=$rsEntidad['sueldo'];
		$porminuto=$rsEntidad['minuto'];
		$quintatope=$rsEntidad['quinta'];
		$uit=$rsEntidad['uit'];
		$ctspor=$rsEntidad['cts']/100;
	// PORCENTAJES DEL EMPLEADOR
	$oEmpleador=new Negocio_clsEmpleador();
	$rsEmpleador=$oEmpleador->Buscar_Aporte($miempresa,$miperiodo,$rsPlanilla['mes']);
	$poressalud=$rsEmpleador['essalud']/100;

	$poronp=$rsEmpleador['onp']/100;
//echo $poronp;
	// SEGURO DE CONSTRUCCION CIVIL
	$porsenati=$rsEmpleador['senati']/100;
	$porscrtsalud=$rsEmpleador['scrtsalud']/100;
	$porscrtpension=$rsEmpleador['scrtpension']/100;
	$sueldobruto=0;
	// RECORRIDO DE TRABAJADORES ACTIVOS Y SEGUN TIPOTRABAJADOR
	$oTrabajador=new Negocio_clsTrabajador();
	if ($nomplanilla=='VACACIONES')
	{
		$rslistado=$oTrabajador->Mostrar_Registros_Todos1($miempresa,$rsPlanilla['tipo']);
	}
	else
	{
		$rslistado=$oTrabajador->Mostrar_Registros_Todos($miempresa,$rsPlanilla['tipo']);		
	}
	
	while($rowtrabajador=$rslistado->fetch_array())
	{
		// LIMPIAR VARIABLES
		$signatotal=0;
		$totalafecto=0;
		$totalonp=0;
		$nombreafp='';
		$afp1=0;
		$afp2=0;
		$afp3=0;
		//echo $rowtrabajador['onp'];
		// ESSALUD
		$totalessalud=0;	
		$totalsenati=0;
		$totalscrtsalud=0;
		$totalscrtpension=0;
		$totalfaltas=0;
		$totaltardanza=0;
		
		$codtrabajador=$rowtrabajador['codigo'];
		$elcargo=$rowtrabajador['cargo'];
		
		if ($nomplanilla=='VACACIONES')
		{
			$elsueldo=0;
		}
		else
		{
			$elsueldo=$rowtrabajador['sueldo'];
		}
		// SUELDO
		
		// ASIGNACION
		
		if ($rowtrabajador['asignacion']=='S')
		{
			$signatotal=$sueldobasico*$asignapor;		
		}
		else
		{
			$signatotal=0;
		}
		
		
		
		$oDescuento=new Negocio_clsDescuento();
		$rsDescuento=$oDescuento->Buscar_Descuento($laplanilla,$codtrabajador);
		// DIAS
		$diastrabajados=$rsDescuento['dias']-$rsDescuento['falta'];
		//$diastrabajados=$rsDescuento['dias']-$rsDescuento['falta'];
		
		$diasfaltas=$rsDescuento['falta'];
		//$diastarde=$rsDescuento['tardanza'];	
		
		if (substr($rsPlanilla['tipo'],0,2)=='P9' or substr($rsPlanilla['tipo'],0,3)=='P10')
		{
			// calcular el ingreso 1
			$miingreso1=$elsueldo*$diastrabajados;
			$rsIngreso1=$oDescuento->ActualizarIngreso1($laplanilla,$codtrabajador,$miingreso1);
		}
		else
		{
			$miingreso1=0;
			//$rsIngreso1=$oDescuento->ActualizarIngreso1($laplanilla,$codtrabajador,$miingreso1);
		}	
		
		
		// INGRESOS
		$totalingreso1=$elsueldo;
		$totalingreso2=$rsDescuento['ingreso2'];
		$totalingreso3=$rsDescuento['ingreso3'];
		$totalingreso4=$rsDescuento['ingreso4'];
		if ($nomplanilla=='GRATIFICACIONES')
		{		
			$totalingreso5=$rsDescuento['ingreso5']+$signatotal;
		}
		else
		{
			$totalingreso5=$rsDescuento['ingreso5'];
		}
		$totalingreso6=$rsDescuento['ingreso6'];
		$totalingreso7=$rsDescuento['ingreso7'];
		$totalingreso8=$rsDescuento['ingreso8'];
		$totalingreso9=$rsDescuento['ingreso9'];
		$totalingreso10=$rsDescuento['ingreso10'];
		$totalingreso11=$rsDescuento['ingreso11'];
		$totalingreso12=$rsDescuento['ingreso12'];
		$totalingreso13=$rsDescuento['ingreso13'];
		$totalingreso14=$rsDescuento['ingreso14'];
		$totalingreso15=$rsDescuento['ingreso15'];
		$totalingreso16=$rsDescuento['ingreso16'];
		$totalingreso17=$rsDescuento['ingreso17'];
		$totalingreso18=$rsDescuento['ingreso18'];
		$totalingreso19=$rsDescuento['ingreso19'];
		$totalingreso20=$rsDescuento['ingreso20'];
		$totalingreso21=$rsDescuento['ingreso21'];
		$totalingreso22=$rsDescuento['ingreso22'];
		$totalingreso23=$rsDescuento['ingreso23'];
		$totalingreso24=$rsDescuento['ingreso24'];
		
		$sueldobruto=$totalingreso1+$totalingreso2+$totalingreso3+$totalingreso4+$totalingreso5+$totalingreso6+$totalingreso7+$totalingreso8+$totalingreso9+$totalingreso10+$totalingreso11+$totalingreso12+$totalingreso13+$totalingreso14+$totalingreso15+$totalingreso16+$totalingreso17+$totalingreso18+$totalingreso19+$totalingreso20+$totalingreso21+$totalingreso22+$totalingreso23+$totalingreso24+$signatotal;
		
		//echo $signatotal;
/////////////////		
	if ($rsPlanilla['ok1']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso1;
	}
	if ($rsPlanilla['ok2']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso2;
	}
	if ($rsPlanilla['ok3']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso3;
	}
	if ($rsPlanilla['ok4']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso4;
	}
	if ($rsPlanilla['ok5']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso5;
	}
	if ($rsPlanilla['ok6']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso6;
	}
	if ($rsPlanilla['ok7']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso7;
	}
	if ($rsPlanilla['ok8']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso8;
	}
	if ($rsPlanilla['ok9']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso9;
	}
	if ($rsPlanilla['ok10']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso10;
	}
	if ($rsPlanilla['ok11']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso11;
	}
	if ($rsPlanilla['ok12']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso12;
	}
	if ($rsPlanilla['ok13']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso13;
	}
	if ($rsPlanilla['ok14']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso14;
	}
	if ($rsPlanilla['ok15']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso15;
	}
	if ($rsPlanilla['ok16']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso16;
	}
	if ($rsPlanilla['ok17']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso17;
	}
	if ($rsPlanilla['ok18']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso18;
	}
	if ($rsPlanilla['ok19']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso19;
	}
	if ($rsPlanilla['ok20']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso20;
	}
	if ($rsPlanilla['ok21']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso21;
	}
	if ($rsPlanilla['ok22']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso22;
	}
	if ($rsPlanilla['ok23']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso23;
	}
	if ($rsPlanilla['ok24']=='S')
	{
		$totalafecto=$totalafecto+$totalingreso24;
	}
		
	//echo $totalafecto;
		//echo $totalafecto.'<br>';

		$valordia=round($sueldobruto/30,2);
		$totalfaltas=round($valordia*$diasfaltas,2);
		
		
////////////////////////////
		//echo $rowtrabajador['onp'];
		// DESCUENTOS
		if ($exonera=='S') // NO SE EXONERA (NO SE DESCUENTA)
		{		
			if ($rowtrabajador['onp']=='S')
			{
				// ES ONP
				//echo 'ENTRO';
				$totalonp= round($totalafecto*$poronp,2);
				
				//echo $totalonp;
				
				$nombreafp='ONP';
				$afp1=0;
				$afp2=0;
				$afp3=0;
				// ESSALUD
				
				if ($totalafecto<=$sueldobasico)
				{
					$totalessalud=83.70;	
				}
				else
				{
						if ($totalafecto<=1245)
						{
							$totalessalud= round($totalafecto*$poressalud,2);
						}
						else
						{
							$totalessalud=112.05;
						}
				}
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
					$afp3=round($totalafecto*$porflujo,2);		
				}
				else
				{
					$afp3=round($totalafecto*$porcomision,2);	
				}
				
				// ESSALUD
				if ($totalafecto<=$sueldobasico)
				{
					$totalessalud=83.70;	
				}
				else
				{
						if ($totalafecto<=1245)
						{
							$totalessalud= round($totalafecto*$poressalud,2);
						}
						else
						{
							$totalessalud=112.05;
						}
				}

				//echo $afp3;
				//echo $afp1;
				
			}
		}
		else // ES EXONERADO
		{
				//$totalonp=0;
				$afp1=0;
				$afp2=0;
				$afp3=0;
				// ESSALUD
				$totalessalud=0;
		
		}
		if ($nomplanilla=='GRATIFICACIONES')
		{
			$totalscrtsalud=0;
			$totalcts=0;	
			$totalcafae=0;
			
				
			$valorquinta=0;	
						
			
		}
		else
		{							
				if ($rowtrabajador['scrt']=='S')
				{
					$totalscrtsalud=round($totalafecto*$porscrtsalud,2);	
				}
				else
				{
					$totalscrtsalud=0;	
				}		
				if ($rowtrabajador['cts']=='S')
				{
					$totalcts=round($totalafecto*$ctspor,2);	
					
					//$valora=$sueldobruto/$diastrabajados;
					//$valorb=$valora/12;
					//$totalcts=round($valorb*$diastrabajados,2);
				}
				else
				{
					$totalcts=0;	
				}		
				if ($rowtrabajador['cafae']=='S')
				{
					$calor1=round($sueldobruto/30,2);	
					$totalcafae=$calor1*$diasfaltas;
					$rsCafae=$oDescuento->ActualizarCafae($laplanilla,$codtrabajador,$totalcafae);
					
				}
				else
				{
					$totalcafae=0;
					$rsCafae=$oDescuento->ActualizarCafae($laplanilla,$codtrabajador,$totalcafae);
				}		
		
		//CALCULAR LA QUINTA
				if ($rowtrabajador['quinta']=='S')
				{
					if ($sueldobruto>$quintatope)
					{
						// SI CUMPLE
						$valor1=$sueldobruto*15;
						$valor2=$uit*7;
						$valor3=$valor1-$valor2;
						$valor4=$valor3*0.08;
						$valorquinta=round($valor4/12,2);

					}
					else
					{
						$valorquinta=0;
					}
					
				}
				else
				{
					$valorquinta=0;	
				}		
			}

		
		
		
		// SI ES CONSTRUCCION CIVIL
//		if ($rsPlanilla['tipo']=='OBREROS')
//		{
//			$totalsenati=round($totalafecto*$porsenati,2);
//			$totalscrtsalud=round($totalafecto*$porscrtsalud,2);
//			$totalscrtpension=round($totalafecto*$porscrtpension,2);
//		}
//		else
//		{
//			$totalsenati=0;
//			$totalscrtsalud=0;
//			$totalscrtpension=0;
//		}
		
		//echo $totalscrtsalud;
		// CALCULO DE IES - IPSSVIDA - QUINTA - CTS
		$totalies=0;
		$totalipssvida=0;
		
		
		// DESCUENTOS
		//$totaltardanza=round($diastarde*$porminuto,2);
		
		//$totaladelanto=$rsDescuento['adelanto'];
		///$totalprestamo=$rsDescuento['prestamo'];
		// DESCUENTO JUDICIAL
		//$totaldscto5=$rowtrabajador['monto1']+$rowtrabajador['monto2'];
		/////////////////////
		
		//echo $valorquinta;
		$rsEmpleadoESr=$oDescuento->ActualizarQuinta($laplanilla,$codtrabajador,$valorquinta);
		
		//echo $cafae;
				
		
		
		$totalquinta=$rsDescuento['quinta'];
		
		$totaldscto1=$rsDescuento['descuento1'];
		$totaldscto2=$rsDescuento['descuento2'];
		$totaldscto3=$rsDescuento['descuento3'];
		$totaldscto4=$rsDescuento['descuento4'];
		$totaldscto5=$rsDescuento['descuento5'];
		$totaldscto6=$rsDescuento['descuento6'];
		$totaldscto7=$rsDescuento['descuento7'];
		$totaldscto8=$rsDescuento['descuento8'];
		$totaldscto9=$rsDescuento['descuento9'];
		$totaldscto10=$rsDescuento['descuento10'];
		$totaldscto11=$rsDescuento['descuento11'];
		$totaldscto12=$rsDescuento['descuento12'];
		$totaldscto13=$rsDescuento['descuento13'];
		$totaldscto14=$rsDescuento['descuento14'];
		$totaldscto15=$rsDescuento['descuento15'];
		$totaldscto16=$rsDescuento['descuento16'];
		$totaldscto17=$rsDescuento['descuento17'];
		
		//echo $totaldscto2;
		
		//echo $codtrabajador.' adelanto - '.$totaladelanto.' prestamos - '.$totalprestamo.'<br>';
		//echo $codtrabajador.'-'.$elsueldo.'-'.$signatotal.'-'.$diastrabajados.' NOMAFP '.$nombreafp.' ONP '.$totalonp.' AFP 1 '.$afp1.' AFP 2 '.$afp2.' AFP 3 '.$afp3.'<br>';
		
		//echo $nomplanilla;
		if ($nomplanilla=='GRATIFICACIONES')
		{
		
			// SUELDO + ASIGNACION
			
			if ($rsPlanilla['mes']=='JULIO')
			{
				$eldiainicial=substr($rowtrabajador['fini'], -2);
				$elmesinicial=substr($rowtrabajador['fini'],5,2);
				//echo $elmesinicial;
				if ($eldiainicial=='01')
				{
					if ($elmesinicial=='01')
					{
						$grati=$totalafecto;						
						//echo 'grati '.$grati;
					}
					else
					{
						$mimes=intval($elmesinicial);
						$miresta=(6-$mimes)+1;
						//echo 'mi resta es  '.$miresta;
						if ($miresta>=6)
						{
							$grati=$totalafecto;
							//echo 'grati '.$grati;
						}
						else
						{
							$misueldoentre6=round($totalafecto/6,2);
							$porcantidames=$misueldoentre6*$miresta;
							//echo 'sueldo afecto'.$totalafecto;
							//echo 'sueldo / 6 '.$misueldoentre6;
							//echo 'sueldo / 6 * cant mes '.$porcantidames;
							$gratiporesalud=$porcantidames*$poressalud;
							//echo 'grati * essalud '.$gratiporesalud;
							$grati=round($porcantidames+$gratiporesalud,2);
							//echo 'grati '.$grati;
						}
					}
						
				}
				else
				{
						$mimes=intval($elmesinicial);
						$miresta=(6-$mimes);
						//echo 'mi resta es  '.$miresta;
						if ($miresta>=6)
						{
							$grati=$totalafecto;
							///echo 'grati '.$grati;
						}
						else
						{
							$misueldoentre6=round($totalafecto/6,2);
							$porcantidames=$misueldoentre6*$miresta;
							//echo 'sueldo afecto'.$totalafecto;
							//echo 'sueldo / 6 '.$misueldoentre6;
							//echo 'sueldo / 6 * cant mes '.$porcantidames;
							$gratiporesalud=$porcantidames*$poressalud;
							//echo 'grati * essalud '.$gratiporesalud;
							$grati=round($porcantidames+$gratiporesalud,2);
							//echo 'grati '.$grati;
						}					
				}
				
			}
			
			
			if ($rsPlanilla['mes']=='DICIEMBRE')
			{
				$eldiainicial=substr($rowtrabajador['fini'], -2);
				$elmesinicial=substr($rowtrabajador['fini'],5,2);
				//echo $elmesinicial;
				if ($eldiainicial=='01')
				{
					if ($elmesinicial=='01')
					{
						$grati=$totalafecto;						
						//echo 'grati '.$grati;
					}
					else
					{
						$mimes=intval($elmesinicial);
						$miresta=(12-$mimes)+1;
						//echo 'mi resta es  '.$miresta;
						if ($miresta>=6)
						{
							$grati=$totalafecto;
							//echo 'grati '.$grati;
						}
						else
						{
							$misueldoentre6=round($totalafecto/6,2);
							$porcantidames=$misueldoentre6*$miresta;
							//echo 'sueldo afecto'.$totalafecto;
							//echo 'sueldo / 6 '.$misueldoentre6;
							//echo 'sueldo / 6 * cant mes '.$porcantidames;
							$gratiporesalud=$porcantidames*$poressalud;
							//echo 'grati * essalud '.$gratiporesalud;
							$grati=round($porcantidames+$gratiporesalud,2);
							//echo 'grati '.$grati;
						}
					}
						
				}
				else
				{
						$mimes=intval($elmesinicial);
						$miresta=(12-$mimes);
						//echo 'mi resta es  '.$miresta;
						if ($miresta>=6)
						{
							$grati=$totalafecto;
							//echo 'grati '.$grati;
						}
						else
						{
							$misueldoentre6=round($totalafecto/6,2);
							$porcantidames=$misueldoentre6*$miresta;
							//echo 'sueldo afecto'.$totalafecto;
							//echo 'sueldo / 6 '.$misueldoentre6;
							//echo 'sueldo / 6 * cant mes '.$porcantidames;
							$gratiporesalud=$porcantidames*$poressalud;
							//echo 'grati * essalud '.$gratiporesalud;
							$grati=round($porcantidames+$gratiporesalud,2);
							//echo 'grati '.$grati;
						}					
				}
				
			}
			
			
			$totalingreso1=0;
			
			$totalingreso3=0;	
			
			$totalingreso5=0;
			$signatotal=0;
			
			$totalingreso2=$grati;
			
			
		}
			
	$oPlanilla=new Negocio_clsPlanilla();
	$rsPlanillaAAAAA=$oPlanilla->Agregar($miempresa,$laplanilla,$elperiodoplanilla,$nomplanilla,$elmesplanilla,$eltipoplanilla,$elnumeroplanilla,$codtrabajador,$diastrabajados,$elcargo,$elsueldo,$totalingreso1,$totalingreso2,$totalingreso3,$totalingreso4,$totalingreso5,$totalingreso6,$totalingreso7,$totalingreso8,$totalingreso9,$totalingreso10,$totalingreso11,$totalingreso12,$totalingreso13,$totalingreso14,$totalingreso15,$totalingreso16,$totalingreso17,$totalingreso18,$totalingreso19,$totalingreso20,$totalingreso21,$totalingreso22,$totalingreso23,$totalingreso24,$signatotal,$nombreafp,$afp1,$afp2,$afp3,$totalonp,$totalessalud,$totalsenati,$totalscrtsalud,$totalscrtpension,$totalies,$totalipssvida,$valorquinta,$totalfaltas,$totaldscto1,$totaldscto2,$totaldscto3,$totaldscto4,$totaldscto5,$totaldscto6,$totaldscto7,$totaldscto8,$totaldscto9,$totaldscto10,$totaldscto11,$totaldscto12,$totaldscto13,$totaldscto14,$totaldscto15,$totaldscto16,$totaldscto17,$totalcts);
			//echo $totalonp;
	}
	header("location: procesar.php");
?>		
