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
	function FormatDate($fecha){
		list($anio,$mes,$dia)=explode("-",$fecha); 
		return $dia."-".$mes."-".$anio; 
	}
	$laplanilla=$_GET['micodigo'];	
	// BUSCAR ESTRUCTURA PLANILLA
	$oPlanilla=new Negocio_clsCreacion();
	$rsPlanilla=$oPlanilla->getROW($laplanilla);
	$elperiodoplanilla=$rsPlanilla['periodo'];
	$nomplanilla=$rsPlanilla['planilla'];
	$elmesplanilla=$rsPlanilla['mes'];
	$eltipoplanilla=$rsPlanilla['tipo'];
	$elnumeroplanilla=$rsPlanilla['numero'];
	// BUSCAR DATOS DE LA ENTIDAD
		$oEntidad=new Negocio_clsConfiguracion();
		$rsEntidad=$oEntidad->Buscar_Entidad($miempresa,$miperiodo);
		$rucempresa=$rsEntidad['ruc'];	
	
	
	// PROCESO DE MONTO AFECTO
?>
<link href="../css/estilosrepplanilla.css" rel="stylesheet" type="text/css" />
<script>
 function printpage()
   {
   window.print()
   }
 </script>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td width="9%" rowspan="2" align="center"><img src="../images/loguito1.png" width="86" height="84" /></td>
		<td width="41%">
			<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td align="center" style="font-family: Tahoma; font-size: 14; font-weight: bold"><?php echo TITULO; ?></td>
				</tr>
				<tr>	
					<td align="center" style="font-family: Tahoma; font-size: 14; font-weight: bold">RUC :<?php echo $rucempresa; ?></td>
				</tr>
			</table>
		
		
		</td>
		<td width="25%" align="center" style="font-family: Tahoma; font-size: 12; font-weight: bold">PERIODO :&nbsp;<?php echo $rsPlanilla['mes'].' - '.$rsPlanilla['periodo']; ?></td>
		<td width="25%" align="center" style="font-family: Tahoma; font-size: 12; font-weight: bold"><?php echo $rsPlanilla['tipo']; ?></td>
	</tr> 
	<tr>
		<td align="center" style="font-family: Tahoma; font-size: 14; font-weight: bold">PLANILLA DE <?php echo $rsPlanilla['planilla']; ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr> 
	
</table>	
 

<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr height="10">
	</tr>
</table>	
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td>
			<table width="100%" border="1" style="border:thick">
				<tr height="1">
					<td></td>
				</tr>
			</table>			
		</td>
	</tr>
<tr>
		<td colspan="25">
			<table width="100%" border="0" style="border: medium; border-color:rgba(241,241,241,1.00)" cellpadding="0" cellspacing="0">
				<tr height="15">
					<td align="center" style="font-family: Tahoma; font-size: 10; font-weight: bold">No</td>
					<td width="15%" align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">APELIIDOS Y NOMBRES</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">DIAS TRABAJADOS</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">CARGO</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">FEC.NAC.</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">DNI</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">F.ING</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">NIVEL</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">REG.ESP.</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">CONDICION</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">AFP</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">No CTA.</td>
				</tr>
				<tr height="15">
					<td colspan="2" align="right" style="font-family: Tahoma; font-size: 7; font-weight: bold">INGRESOS 1 :</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso1']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso2']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso3']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso4']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso5']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso6']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso7']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso8']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso9']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso10']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso11']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso12']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">TOTAL BRUTO</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">NETO A COBRAR</td>
					<td></td>
				</tr>
				<tr height="15">
					<td colspan="2" align="right" style="font-family: Tahoma; font-size: 7; font-weight: bold">INGRESOS 2 :</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso13']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso14']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso15']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso16']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso17']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso18']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso19']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso20']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso21']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso22']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso23']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso24']; ?></td>
				</tr>
				<tr height="15">
					<td colspan="2" align="right" style="font-family: Tahoma; font-size: 7; font-weight: bold">DESCUENTOS 1 :</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo 'PROFUTURO'; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo 'HABITAT'; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo 'INTEGRA'; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo 'PRIMA'; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['onp']; ?></td>	
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ies']; ?></td>	
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ipssvida']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['quinta']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento1']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento2']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento3']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento4']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento5']; ?></td>
					
				</tr>
				<tr height="15">
					<td colspan="2" align="right" style="font-family: Tahoma; font-size: 7; font-weight: bold">DESCUENTOS 2 :</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento6']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento7']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento8']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento9']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento10']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento11']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento12']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento13']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento14']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento15']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento16']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['descuento17']; ?></td>
				</tr>
				<tr height="15">
					<td colspan="2" align="right" style="font-family: Tahoma; font-size: 7; font-weight: bold">APORTES Y OBSERVACIONES :</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['essalud']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ies']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['scrtsalud']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['cts']; ?></td>		
				</tr>
				
	<?php
		$oPlanilla=new Negocio_clsPlanilla();
		$rslistado=$oPlanilla->Mostrar_Registros_Todos($laplanilla);
		$id=0;
		$otroingresos=0;
		$totalremuneracion=0;
		$totaldescuentos=0;
		$totalaportes=0;
		$totalapagar=0;			
		$afphabitat=0;
		$afpintegra=0;
		$afpprima=0;
		$afpprofucturo=0;		
				
		$otrabador=new Negocio_clsTrabajador();
		while($rowplanilla=$rslistado->fetch_array())
		{ 
			$id++;
			$afpintegra1=0;
			$afpprima1=0;
			$afpprofucturo1=0;
			$afphabitat1=0;
			$elcodtrabajador=$rowplanilla['codtrabajador'];
			
			$rsTrabajador=$otrabador->getROW($elcodtrabajador);
		
			// VER TOTALES DE AFP
			if ($rsTrabajador['afp']<>'SELECCIONA')
			{
				
				if ($rsTrabajador['afp']=='INTEGRA')
				{
					$afpintegra=$afpintegra+$rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3'];
					$afpintegra1=$rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3'];
				}
				if ($rsTrabajador['afp']=='PRIMA')
				{
					$afpprima=$afpprima+$rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3'];
					$afpprima1=+$rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3'];
				}
				if ($rsTrabajador['afp']=='PROFUTURO')
				{
					$afpprofucturo=$afpprofucturo+$rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3'];
					$afpprofucturo1=$rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3'];
				}
				if ($rsTrabajador['afp']=='HABITAT')
				{
					$afphabitat=$afphabitat+$rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3'];					
					$afphabitat1=$rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3'];					
				}
				
			}
			
			/////////////////////
			$otroingresos=round($rowplanilla['ingreso1']+$rowplanilla['ingreso2']+$rowplanilla['ingreso3']+$rowplanilla['ingreso4']+$rowplanilla['ingreso5']+$rowplanilla['ingreso6']+$rowplanilla['ingreso7']+$rowplanilla['ingreso8']+$rowplanilla['ingreso9']+$rowplanilla['ingreso10']+$rowplanilla['ingreso11']+$rowplanilla['ingreso12']+$rowplanilla['ingreso13']+$rowplanilla['ingreso14']+$rowplanilla['ingreso15']+$rowplanilla['ingreso16']+$rowplanilla['ingreso17']+$rowplanilla['ingreso18']+$rowplanilla['ingreso19']+$rowplanilla['ingreso20']+$rowplanilla['ingreso21']+$rowplanilla['ingreso22']+$rowplanilla['ingreso23']+$rowplanilla['ingreso24'],2);
			
			//$totalremuneracion=$otroingresos+$rowplanilla['ingreso1']+$rowplanilla['asignacion'];
			$totalremuneracion=$otroingresos;
			$totalremuneraciongeneral=$totalremuneraciongeneral+$otroingresos;
			$totaldescuentos=$rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3']+$rowplanilla['onp']+$rowplanilla['quinta']+$rowplanilla['ipssvida']+$rowplanilla['descuento1']+$rowplanilla['descuento2']+$rowplanilla['descuento3']+$rowplanilla['descuento4']+$rowplanilla['descuento5']+$rowplanilla['descuento6']+$rowplanilla['descuento7']+$rowplanilla['descuento8']+$rowplanilla['descuento9']+$rowplanilla['descuento10']+$rowplanilla['descuento11']+$rowplanilla['descuento12']+$rowplanilla['descuento13']+$rowplanilla['descuento14']+$rowplanilla['descuento15']+$rowplanilla['descuento16']+$rowplanilla['descuento17'];
			
			$totalaportes=$rowplanilla['essalud']+$rowplanilla['senati']+$rowplanilla['scrtsalud']+$rowplanilla['scrtpension'];
			
			$totalapagar=$totalremuneracion-$totaldescuentos;
		?>
				<tr height="21">
					<td colspan="25">
						<table width="100%" border="1" style="border:thick">
							<tr height="1">
								<td></td>
							</tr>
						</table>
						
					</td>
				</tr>
				<tr height="10">
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $id; ?></td>
					<td align="left" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rowplanilla['apellidos'].' '.$rowplanilla['apellidos2'].' '.$rowplanilla['nombres']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo $rowplanilla['dias']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo $rowplanilla['cargo']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo FormatDate($rsTrabajador['fnaci']); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo $rsTrabajador['numdocu']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo FormatDate($rsTrabajador['fini']); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo $rsTrabajador['nivel']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo '';//$rsTrabajador['regimen']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo $rsTrabajador['condicion']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rsTrabajador['afp']<>'SELECCIONA') echo $rsTrabajador['afp']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo $rsTrabajador['cuenta']; ?></td>
				</tr>
		
				<tr height="10">
					<td colspan="2" align="right" style="font-family: Tahoma; font-size: 7">INGRESOS 1 :</td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso1']>0) echo number_format($rowplanilla['ingreso1'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso2']>0) echo number_format($rowplanilla['ingreso2'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso3']>0) echo number_format($rowplanilla['ingreso3'],2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso4']>0) echo number_format($rowplanilla['ingreso4'],2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso5']>0) echo number_format($rowplanilla['ingreso5'],2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso6']>0) echo number_format($rowplanilla['ingreso6'],2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso7']>0) echo number_format($rowplanilla['ingreso7'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso8']>0) echo number_format($rowplanilla['ingreso8'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso9']>0) echo number_format($rowplanilla['ingreso9'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso10']>0) echo number_format($rowplanilla['ingreso10'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso11']>0) echo number_format($rowplanilla['ingreso11'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso12']>0) echo number_format($rowplanilla['ingreso12'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo number_format($totalremuneracion,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 10; font-weight: bold"><?php echo number_format($totalapagar,2); ?></td>
					<td class="texto2"></td>
				</tr>
				<tr height="10">
					<td colspan="2" align="right" style="font-family: Tahoma; font-size: 7">INGRESOS 2 :</td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso13']>0) echo number_format($rowplanilla['ingreso13'],2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso14']>0) echo number_format($rowplanilla['ingreso14'],2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso15']>0) echo number_format($rowplanilla['ingreso15'],2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso16']>0) echo number_format($rowplanilla['ingreso16'],2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso17']>0) echo number_format($rowplanilla['ingreso17'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso18']>0) echo number_format($rowplanilla['ingreso18'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso19']>0) echo number_format($rowplanilla['ingreso19'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso20']>0) echo number_format($rowplanilla['ingreso20'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso21']>0) echo number_format($rowplanilla['ingreso21'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso22']>0) echo number_format($rowplanilla['ingreso22'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso23']>0) echo number_format($rowplanilla['ingreso23'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ingreso24']>0) echo number_format($rowplanilla['ingreso24'],2); ?></td>
					<td align="right" style="font-size: 12; font-weight: bold"></td>
					<td align="right" style="font-size: 16; font-weight: bold"></td>
					<td class="texto2"></td>
				</tr>
				<tr height="10">
					<td colspan="2" align="right" style="font-family: Tahoma; font-size: 7">DESCUENTOS 1 :</td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($afpprofucturo1>0) echo number_format($afpprofucturo1,2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($afphabitat1>0) echo number_format($afphabitat1,2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($afpintegra1>0) echo number_format($afpintegra1,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($afpprima1>0) echo number_format($afpprima1,2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['onp']>0) echo number_format($rowplanilla['onp'],2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ies']>0) echo number_format($rowplanilla['ies'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ipssvida']>0) echo number_format($rowplanilla['ipssvida'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['quinta']>0) echo number_format($rowplanilla['quinta'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento1']>0) echo number_format($rowplanilla['descuento1'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento2']>0) echo number_format($rowplanilla['descuento2'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento3']>0) echo number_format($rowplanilla['descuento3'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento4']>0) echo number_format($rowplanilla['descuento4'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento5']>0) echo number_format($rowplanilla['descuento5'],2); ?></td>
					<td align="right" style="font-size: 12; font-weight: bold"></td>
					<td align="right" style="font-size: 16; font-weight: bold"></td>
					<td class="texto2"></td>
				</tr>
				<tr height="10">
					<td colspan="2" align="right" style="font-family: Tahoma; font-size: 7">DESCUENTOS 2 :</td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento6']>0) echo number_format($rowplanilla['descuento6'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento7']>0) echo number_format($rowplanilla['descuento7'],2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento8']>0) echo number_format($rowplanilla['descuento8'],2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento9']>0) echo number_format($rowplanilla['descuento9'],2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento10']>0) echo number_format($rowplanilla['descuento10'],2); ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento11']>0) echo number_format($rowplanilla['descuento11'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento12']>0) echo number_format($rowplanilla['descuento12'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento13']>0) echo number_format($rowplanilla['descuento13'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento14']>0) echo number_format($rowplanilla['descuento14'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento15']>0) echo number_format($rowplanilla['descuento15'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento16']>0) echo number_format($rowplanilla['descuento16'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['descuento17']>0) echo number_format($rowplanilla['descuento17'],2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"></td>
					<td align="center" style="font-family: Tahoma; font-size: 7" colspan="2"></td>
					
					<td align="right" style="font-size: 16; font-weight: bold"></td>

				</tr>
				<tr height="10">
					<td colspan="2" align="right" style="font-family: Tahoma; font-size: 7">APORTES Y OBSERVACIONES :</td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['essalud']>0) echo $rowplanilla['essalud']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['ies']>0) echo $rowplanilla['ies']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['scrtsalud']>0) echo $rowplanilla['scrtsalud']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($rowplanilla['cts']>0) echo $rowplanilla['cts']; ?></td>		
					<td class="titulo2"></td>		
					<td class="titulo2"></td>		
					<td align="left" style="font-family: Tahoma; font-size: 7" colspan="6">OBSERV.</td>
					<td align="center" style="font-family: Tahoma; font-size: 7" colspan="2">FIRMA</td>
					<td align="center" style="font-family: Tahoma; font-size: 7" A>DNI</td>
				</tr>
		<?php
		// SUMAS TOTALES
			
			$sumaremuneracion=$totalremuneracion;
			
			$sumardescuentos=$totaldescuentos;
			
			$sumardescuentosgeneral=$sumardescuentosgeneral+$totaldescuentos;
			
			$sumaaportes=$totalaportes;
			$sumaaportesgeneral=$sumaaportesgeneral+$totalaportes;
			//$sumardescuentos=$totaldescuentos;
			
			$sumaingresos1=$sumaingresos1+$rowplanilla['ingreso1'];
			$sumaingresos2=$sumaingresos2+$rowplanilla['ingreso2'];
			$sumaingresos3=$sumaingresos3+$rowplanilla['ingreso3'];
			$sumaingresos4=$sumaingresos4+$rowplanilla['ingreso4'];
			$sumaingresos5=$sumaingresos5+$rowplanilla['ingreso5'];
			$sumaingresos6=$sumaingresos6+$rowplanilla['ingreso6'];
			$sumaingresos7=$sumaingresos7+$rowplanilla['ingreso7'];
			$sumaingresos8=$sumaingresos8+$rowplanilla['ingreso8'];
			$sumaingresos9=$sumaingresos9+$rowplanilla['ingreso9'];
			$sumaingresos10=$sumaingresos10+$rowplanilla['ingreso10'];
			$sumaingresos11=$sumaingresos11+$rowplanilla['ingreso11'];
			$sumaingresos12=$sumaingresos12+$rowplanilla['ingreso12'];
			$sumaingresos13=$sumaingresos13+$rowplanilla['ingreso13'];
			$sumaingresos14=$sumaingresos14+$rowplanilla['ingreso14'];
			$sumaingresos15=$sumaingresos15+$rowplanilla['ingreso15'];
			$sumaingresos16=$sumaingresos16+$rowplanilla['ingreso16'];
			$sumaingresos17=$sumaingresos17+$rowplanilla['ingreso17'];
			$sumaingresos18=$sumaingresos18+$rowplanilla['ingreso18'];
			$sumaingresos19=$sumaingresos19+$rowplanilla['ingreso19'];
			$sumaingresos20=$sumaingresos20+$rowplanilla['ingreso20'];
			$sumaingresos21=$sumaingresos21+$rowplanilla['ingreso21'];
			$sumaingresos22=$sumaingresos22+$rowplanilla['ingreso22'];
			$sumaingresos23=$sumaingresos23+$rowplanilla['ingreso23'];
			$sumaingresos24=$sumaingresos24+$rowplanilla['ingreso24'];
			
			$sumaafp1=$sumaafp1+$rowplanilla['afp1'];			
			$sumaafp2=$sumaafp2+$rowplanilla['afp2'];
			$sumaafp3=$sumaafp3+$rowplanilla['afp3'];
			
			$sumaonp=$sumaonp+$rowplanilla['onp'];
			$sumaies=$sumaies+$rowplanilla['ies'];
			$sumaipssvida=$sumaipssvida+$rowplanilla['ipssvida'];
			$sumaquinta=$sumaquinta+$rowplanilla['quinta'];
			
			$sumadescuento1=$sumadescuento1+$rowplanilla['descuento1'];
			$sumadescuento2=$sumadescuento2+$rowplanilla['descuento2'];
			$sumadescuento3=$sumadescuento3+$rowplanilla['descuento3'];
			$sumadescuento4=$sumadescuento4+$rowplanilla['descuento4'];
			$sumadescuento5=$sumadescuento5+$rowplanilla['descuento5'];
			$sumadescuento6=$sumadescuento6+$rowplanilla['descuento6'];
			$sumadescuento7=$sumadescuento7+$rowplanilla['descuento7'];
			$sumadescuento8=$sumadescuento8+$rowplanilla['descuento8'];
			$sumadescuento9=$sumadescuento9+$rowplanilla['descuento9'];
			$sumadescuento10=$sumadescuento10+$rowplanilla['descuento10'];
			$sumadescuento11=$sumadescuento11+$rowplanilla['descuento11'];
			$sumadescuento12=$sumadescuento12+$rowplanilla['descuento12'];
			$sumadescuento13=$sumadescuento13+$rowplanilla['descuento13'];
			$sumadescuento14=$sumadescuento14+$rowplanilla['descuento14'];
			$sumadescuento15=$sumadescuento15+$rowplanilla['descuento15'];
			$sumadescuento16=$sumadescuento16+$rowplanilla['descuento16'];
			$sumadescuento17=$sumadescuento17+$rowplanilla['descuento17'];
			
			$sumaessalud=$sumaessalud+$rowplanilla['essalud'];
			$sumaessalud1=$sumaessalud1+$rowplanilla['ies'];
			$sumaessalud2=$sumaessalud2+$rowplanilla['scrtsalud'];
			$sumaessalud3=$sumaessalud3+$rowplanilla['cts'];
			
		}			
	?>
				<tr height="21">
					<td colspan="25">
						<table width="100%" border="1" style="border:thick">
							<tr height="1">
								<td></td>
							</tr>
						</table>
						
					</td>
				</tr>
		
		
			</table>
		</td>
	</tr>
	
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td style="font-family: Tahoma; font-size: 12; font-weight: bold">RESUMEN GENERAL DE PLANILLA DE <?php echo $rsPlanilla['planilla']; ?></td>
				<td align="right" style="font-family: Tahoma; font-size: 12; font-weight: bold">PERIODO :&nbsp;<?php echo $rsPlanilla['mes'].' - '.$rsPlanilla['periodo']; ?></td>
			</tr>
	</table>		
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr height="21">
					<td colspan="25">
						<table width="100%" border="1" style="border:thick">
							<tr height="1">
								<td></td>
							</tr>
						</table>
						
					</td>
				</tr>
			<tr height="15">
				<td rowspan="4" align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold">TOTAL INGRESOS :</td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso1']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso2']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso3']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso4']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso5']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso6']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso7']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso8']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso9']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso10']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso11']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso12']; ?></td>
					<td></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">TOTAL INGRESOS</td>
					<td align="center" style="font-family: Tahoma; font-size: 10; font-weight: bold"><?php echo number_format($totalremuneraciongeneral,2); ?></td>
					<td class="titulo2"></td>
					
			</tr>
			<tr>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos1,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos2,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos3,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos4,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos5,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos6,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos7,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos8,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos9,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos10,2); ?></td>
					<td calign="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos11,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos12,2); ?></td>
			</tr>
			<tr height="15">
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso13']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso14']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso15']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso16']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso17']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso18']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso19']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso20']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso21']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso22']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso23']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold"><?php echo $rsPlanilla['ingreso24']; ?></td>
			</tr>
			<tr>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos13,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos14,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos15,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos16,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos17,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos18,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos19,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos20,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos21,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos22,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos23,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaingresos24,2); ?></td>

			</tr>
				<tr height="21">
					<td colspan="25">
						<table width="100%" border="1" style="border:thick">
							<tr height="1">
								<td></td>
							</tr>
						</table>
						
					</td>
				</tr>
			<tr height="15">
				<td rowspan="4" align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold">TOTAL DESCUENTOS :</td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo 'PROFUTURO'; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo 'HABITAT'; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo 'INTEGRA'; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo 'PRIMA'; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['onp']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['ies']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['ipssvida']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['quinta']; ?></td>					
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento1']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento2']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento3']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento4']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento5']; ?></td>
					
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">TOTAL DESCUENTOS</td>
					<td align="center" style="font-family: Tahoma; font-size: 10; font-weight: bold"><?php echo number_format($sumardescuentosgeneral,2); ?></td>
					
			</tr>
			
				<tr>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($afpprofucturo,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($afphabitat,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($afpintegra,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($afpprima,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaonp,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaipssvida,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaies,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumaquinta,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento1,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento2,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento3,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento4,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento5,2); ?></td>
					
				</tr>
				<tr height="15">
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento6']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento7']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento8']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento9']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento10']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento11']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento12']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento13']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento14']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento15']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento16']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['descuento17']; ?></td>
				</tr>
				
				
				<tr>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento6,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento7,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento8,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento9,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento10,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento11,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento12,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento13,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento14,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento15,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento16,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php echo number_format($sumadescuento17,2); ?></td>
					
				</tr>
				<tr height="21">
					<td colspan="25">
						<table width="100%" border="1" style="border:thick">
							<tr height="1">
								<td></td>
							</tr>
						</table>
						
					</td>
				</tr>
				
			<tr height="25">
				<td rowspan="4" align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold">TOTAL APORTES :</td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['essalud']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['ies']; ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['scrtsalud']; ?></td>		
					<td align="center" style="font-family: Tahoma; font-size: 8; font-weight: bold"><?php echo $rsPlanilla['cts']; ?></td>		
					<td class="titulo2"></td>		
					<td class="titulo2"></td>		
					<td class="titulo2"></td>
					<td class="titulo2"></td>
					<td class="titulo2"></td>
					<td class="texto2"></td>					
					<td class="titulo2"></td>
					<td class="titulo2"></td>
					<td class="titulo2"></td>
					<td align="center" style="font-family: Tahoma; font-size: 7; font-weight: bold">TOTAL APORTES</td>
					<td align="center" style="font-family: Tahoma; font-size: 10; font-weight: bold"><?php echo number_format($sumaaportesgeneral,2); ?></td>
			</tr>
				
				
				<tr>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($sumaessalud>0) echo number_format($sumaessalud,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($sumaessalud1>0) echo number_format($sumaessalud1,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($sumaessalud2>0) echo number_format($sumaessalud2,2); ?></td>
					<td align="center" style="font-family: Tahoma; font-size: 7"><?php if ($sumaessalud3>0) echo number_format($sumaessalud3,2); ?></td>
					<td class="texto2"></td>
					<td class="texto2"></td>
					<td class="texto2"></td>
					<td class="texto2"></td>
					<td class="texto2"></td>
					<td class="texto2"></td>
					<td class="texto2"></td>
					<td class="texto2"></td>
					<td class="texto2"></td>
					<td class="texto2"></td>
					<td class="titulo2"></td>
					<td class="titulo2"></td>
					<td class="titulo2"></td>
				</tr>
				<tr height="21">
					<td colspan="25">
						<table width="100%" border="1" style="border:thick">
							<tr height="1">
								<td></td>
							</tr>
						</table>
						
					</td>
				</tr>
				

</table>

<script>
	printpage();	
</script>