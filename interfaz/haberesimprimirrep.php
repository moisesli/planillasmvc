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
	$codtrabajador=$_GET['micodigo'];	
	// BUSCAR ESTRUCTURA PLANILLA
	$Trabajador=new Negocio_clsTrabajador();	
	$rsTrabajador=$Trabajador->getROW($codtrabajador);
	// BUSCAR DATOS DE LA ENTIDAD
		$oEntidad=new Negocio_clsConfiguracion();
		$rsEntidad=$oEntidad->Buscar_Entidad($miempresa,$miperiodo);
		$rucempresa=$rsEntidad['ruc'];	
?>
<link href="../css/estilosrep.css" rel="stylesheet" type="text/css" />
<script>
 function printpage()
   {
   window.print()
   }
 </script>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td width="20%" class="titulo1" align="center"><?php echo strtoupper(TITULO); ?></td>
		<td width="60%" class="titulo1" align="center">CONSTANCIA DE HABERES</td>
		<td width="20%" class="titulo1" align="center">FECHA :&nbsp;<?php echo date('d-m-Y'); ?></td>
	</tr> 
	<tr>
		<td width="20%" class="titulo1" align="center">RUC :&nbsp;<?php echo $rucempresa; ?></td>
		<td width="60%" class="titulo1" align="center">TRABAJADOR :&nbsp;&nbsp;<?php echo $rsTrabajador['apellidos'].' '.$rsTrabajador['apellidos2'].$rsTrabajador['nombres']; ?></td>
		<td width="20%"></td>
	</tr>
</table>	
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr height="20">
	</tr>
</table>	
<table width="100%" cellpadding="0" cellspacing="0" border="1">
	<tr>
		<td class="titulo2">PLANILLA</td>
		<td class="titulo2">PERIODO</td>
		<td class="titulo2">MES</td>
		<td class="titulo2">DIAS</td>
		<td class="titulo2">MONTO BRUTO</td>
		<td class="titulo2">TOTAL DESCUENTOS</td>
		<td class="titulo2">TOTAL APORTES</td>
		<td class="titulo2">TOTAL REMUNERACION.</td>
	</tr>
	<?php
		$oPlanilla=new Negocio_clsPlanilla();
		$rslistado=$oPlanilla->Mostrar_Registros_Todos_Trabajador($codtrabajador);
		$otroingresos=0;
		$totalremuneracion=0;
		$totaldescuentos=0;
		while($rowplanilla=$rslistado->fetch_array())
		{ 
			$otroingresos=round($rowplanilla['ingreso1']+$rowplanilla['ingreso2']+$rowplanilla['ingreso3']+$rowplanilla['ingreso4']+$rowplanilla['ingreso5']+$rowplanilla['ingreso6']+$rowplanilla['ingreso7']+$rowplanilla['ingreso8']+$rowplanilla['ingreso9']+$rowplanilla['ingreso10']+$rowplanilla['ingreso11']+$rowplanilla['ingreso12']+$rowplanilla['ingreso13']+$rowplanilla['ingreso14']+$rowplanilla['ingreso15']+$rowplanilla['ingreso16']+$rowplanilla['ingreso17']+$rowplanilla['ingreso18']+$rowplanilla['ingreso19']+$rowplanilla['ingreso20']+$rowplanilla['ingreso21']+$rowplanilla['ingreso22']+$rowplanilla['ingreso23']+$rowplanilla['ingreso24'],2);	
			//$totalremuneracion=$otroingresos+$rowplanilla['ingreso1']+$rowplanilla['asignacion'];
			$totaldescuentos=$rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3']+$rowplanilla['onp']+$rowplanilla['descuento1']+$rowplanilla['descuento2']+$rowplanilla['descuento3']+$rowplanilla['descuento4']+$rowplanilla['descuento5']+$rowplanilla['descuento6']+$rowplanilla['descuento7']+$rowplanilla['descuento8']+$rowplanilla['descuento9']+$rowplanilla['descuento10']+$rowplanilla['descuento11']+$rowplanilla['descuento12']+$rowplanilla['descuento13']+$rowplanilla['descuento14']+$rowplanilla['descuento15']+$rowplanilla['descuento16']+$rowplanilla['descuento17']+$rowplanilla['ies']+$rowplanilla['ipssvida']+$rowplanilla['quinta'];
			
			$totalaportes=$rowplanilla['essalud']+$rowplanilla['senati']+$rowplanilla['scrtsalud']+$rowplanilla['scrtpension'];
			$totalapagar=$otroingresos-$totaldescuentos;
		?>
			<tr>
				<td class="texto1"><?php echo $rowplanilla['planilla']; ?></td>
				<td class="texto111"><?php echo $rowplanilla['periodo']; ?></td>
				<td class="texto111"><?php echo $rowplanilla['mes']; ?></td>
				<td class="texto111"><?php echo $rowplanilla['dias']; ?></td>
				<td class="texto2"><?php echo number_format($otroingresos,2,'.',','); ?></td>
				<td class="texto2"><?php echo number_format($totaldescuentos,2,'.',','); ?></td>
				<td class="texto2"><?php echo number_format($totalaportes,2,'.',','); ?></td>				
				<td class="texto2"><?php echo number_format($totalapagar,2,'.',','); ?></td>				
			</tr>			
		<?php
		// SUMAS TOTALES
		$sumaremuneracion=$sumaremuneracion+$otroingresos;
		$sumadescuentos=$sumadescuentos+$totaldescuentos;
		$sumaaportes=$sumaaportes+$totalaportes;
		$sumatotal=$sumatotal+$totalapagar;
		}			
	?>
			<tr>
				<td class="texto"></td>
				<td class="texto1"></td>
				<td class="texto1"></td>
				<td class="texto"></td>
				<td class="texto22"><?php echo number_format($sumaremuneracion,2,'.',','); ?></td>
				<td class="texto22"><?php echo number_format($sumadescuentos,2,'.',','); ?></td>
				<td class="texto22"><?php echo number_format($sumaaportes,2,'.',','); ?></td>
				<td class="texto22"><?php echo number_format($sumatotal,2,'.',','); ?></td>				
			</tr>			
</table>
<script>
	printpage();	
</script>