<?php session_start();
	$miperiodo=$_SESSION['periodo'];
	$miempresa=$_SESSION['codempresa'];	
	if(!($_SESSION["accesar"] == "OK")){
		session_destroy();
		echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=../index.php'>";	
	}

	include("../config.php");
	require_once(LOGICA."/negocio.php");	

	$oUsuario=new Negocio_clsTrabajador();

	$txtfecha=$_POST['txtfecha'];
	
	$miano=substr($txtfecha,0,4);

	$fecha=$_POST['txtfecha'];
	//$fecha = '2019/12/18';
	$numDia = date("D", strtotime($fecha));
	$numMes = date("M", strtotime($fecha));

	switch($numDia){
		case 'Mon':	
			$midia='LUNES';
		break;
		case 'Tue':	
			$midia='MARTES';
		break;
		case 'Wed':	
			$midia='MIERCOLES';
		break;
		case 'Thu':	
			$midia='JUEVES';
		break;
		case 'Fri':	
			$midia='VIERNES';
		break;
		case 'Sat':	
			$midia='SABADO';
		break;
		case 'Sun':	
			$midia='DOMINGO';
		break;

		}	


	switch($numMes){
		case 'Jan':	
			$mimes='ENERO';
		break;
		case 'Feb':	
			$mimes='FEBRERO';
		break;
		case 'Mar':	
			$mimes='MARZO';
		break;
		case 'Apr':	
			$mimes='ABRIL';
		break;
		case 'May':	
			$mimes='MAYO';
		break;
		case 'Jun':	
			$mimes='JUNIO';
		break;
		case 'Jul':	
			$mimes='JULIO';
		break;
		case 'Aug':	
			$mimes='AGOSTO';
		break;
		case 'Sep':	
			$mimes='SEPTIEMBRE';
		break;
		case 'Oct':	
			$mimes='OCTUBRE';
		break;
		case 'Nov':	
			$mimes='NOVIEMBRE';
		break;
		case 'Dec':	
			$mimes='DICIEMBRE';
		break;

		}	
	//echo $midia;
	//echo $midia.' '.$mimes.' '.$miano;

	$ture='M';
	$turs='T';

	$rowAperturar=$oUsuario->Contarapertura($txtfecha);		
	if ($rowAperturar['total']=='0')
	{
		//echo 'DIA PARA APRTURAR';
		$intError=$oUsuario->AgregarAperura($txtfecha,$midia);		
		
		$rowTrabajador=$oUsuario->Mostrar_Registros_Lista($miempresa);		

		while($rowtra=$rowTrabajador->fetch_array())
		{
			//echo $rowtra['apellidos'];
			$codtrabajador=$rowtra['codigo'];
			
			$rowHorario=$oUsuario->BuscarHorario($codtrabajador);
			
			//echo $rowHorario['lunese'];

			if ($midia=='LUNES')
			{
				$opce=$rowHorario['lunes_e'];	
				$hore=$rowHorario['lunese'];	
				
				$opcs=$rowHorario['lunes_s'];	
				$hors=$rowHorario['luness'];	
				if ($opce=='S')
				{
					$rowAsistencia=$oUsuario->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$ture,$midia,$hore);
				}
				if ($opcs=='S')
				{
					$rowAsistencia=$oUsuario->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$turs,$midia,$hors);
				}				
			}
			if ($midia=='MARTES')
			{
				$opce=$rowHorario['martes_e'];	
				$hore=$rowHorario['martese'];	
				
				$opcs=$rowHorario['martes_s'];	
				$hors=$rowHorario['martess'];	
				if ($opce=='S')
				{
					$rowAsistencia=$oUsuario->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$ture,$midia,$hore);
				}
				if ($opcs=='S')
				{
					$rowAsistencia=$oUsuario->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$turs,$midia,$hors);
				}				
			}
			if ($midia=='MIERCOLES')
			{
				$opce=$rowHorario['miercoles_e'];	
				$hore=$rowHorario['miercolese'];	
				
				$opcs=$rowHorario['miercoles_s'];	
				$hors=$rowHorario['miercoless'];	
				if ($opce=='S')
				{
					$rowAsistencia=$oUsuario->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$ture,$midia,$hore);
				}
				if ($opcs=='S')
				{
					$rowAsistencia=$oUsuario->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$turs,$midia,$hors);
				}				
			}
			if ($midia=='JUEVES')
			{
				$opce=$rowHorario['jueves_e'];	
				$hore=$rowHorario['juevese'];	
				
				$opcs=$rowHorario['jueves_s'];	
				$hors=$rowHorario['juevess'];	
				if ($opce=='S')
				{
					$rowAsistencia=$oUsuario->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$ture,$midia,$hore);
				}
				if ($opcs=='S')
				{
					$rowAsistencia=$oUsuario->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$turs,$midia,$hors);
				}				
			}
			if ($midia=='VIERNES')
			{
				$opce=$rowHorario['viernes_e'];	
				$hore=$rowHorario['viernese'];	
				
				$opcs=$rowHorario['viernes_s'];	
				$hors=$rowHorario['vierness'];	
				if ($opce=='S')
				{
					$rowAsistencia=$oUsuario->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$ture,$midia,$hore);
				}
				if ($opcs=='S')
				{
					$rowAsistencia=$oUsuario->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$turs,$midia,$hors);
				}				
			}
			
			if ($midia=='SABADO')
			{
				$opce=$rowHorario['sabado_e'];	
				$hore=$rowHorario['sabadoe'];	
				
				$opcs=$rowHorario['sabado_s'];	
				$hors=$rowHorario['sabados'];	
				if ($opce=='S')
				{
					$rowAsistencia=$oUsuario->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$ture,$midia,$hore);
				}
				if ($opcs=='S')
				{
					$rowAsistencia=$oUsuario->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$turs,$midia,$hors);
				}				
			}
			if ($midia=='DOMINGO')
			{
				$opce=$rowHorario['domingo_e'];	
				$hore=$rowHorario['domingoe'];	
				
				$opcs=$rowHorario['domingo_s'];	
				$hors=$rowHorario['domingos'];	
				if ($opce=='S')
				{
					$rowAsistencia=$oUsuario->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$ture,$midia,$hore);
				}
				if ($opcs=='S')
				{
					$rowAsistencia=$oUsuario->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$turs,$midia,$hors);
				}				
			}
			
			
			
		}	
		
	}
	else
	{
		//echo 'DIA APRTURADO';
	}

	header("location: apertura.php");


?>		
