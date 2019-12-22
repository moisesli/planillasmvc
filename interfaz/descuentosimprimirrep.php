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
		<td width="60%" class="titulo1" align="center">PLANILLA DE 'DESCUENTOS</td>
		<td width="20%" class="titulo1" align="center">FECHA :&nbsp;<?php echo date('d-m-Y'); ?></td>
	</tr> 
	<tr>
		<td width="20%" class="titulo1" align="center">RUC :&nbsp;<?php echo $rucempresa; ?></td>
		<td width="60%" class="titulo1" align="center">PERIODO :&nbsp;&nbsp;<?php echo $rsPlanilla['periodo'].' MES : '.$rsPlanilla['mes']; ?></td>
		<td width="20%"></td>
	</tr>
	<tr>
		<td width="20%" class="titulo1" align="center"></td>
		<td width="60%" class="titulo1" align="center">TIPO :&nbsp;&nbsp;<?php echo $rsPlanilla['tipo']; ?></td>
		<td width="20%"></td>
	</tr>		 	
</table>	
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr height="20">
	</tr>
</table>	
<table width="100%" cellpadding="0" cellspacing="0" border="1">
	<tr>
		<td rowspan="2" class="titulo2">ID</td>
		<td rowspan="2" class="titulo2">APELIIDOS Y NOMBRES</td>
		<td rowspan="2" class="titulo2">CARGO</td>
		<td rowspan="2" class="titulo2">DIAS</td>
		<td colspan="13" class="titulo2">DESCUENTOS</td>
		<td rowspan="2" class="titulo2">TOTAL DSCTO.</td>
	</tr>
	<tr>
		<td class="titulo2">ONP/AFP</td>
		<td class="titulo2"><?php echo $rsPlanilla['afp1']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['afp2']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['afp3']; ?></td>
		<td class="titulo2">ONP</td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento1']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento2']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento3']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento4']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento5']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento6']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento7']; ?></td>
	</tr>
	<tr>
		<td class="titulo2"></td>
		<td class="titulo2"></td>
		<td class="titulo2"></td>
		<td class="titulo2"></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento8']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento9']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento10']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento11']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento12']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento13']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento14']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento15']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento16']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['descuento17']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['ies']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['ipssvida']; ?></td>
		<td class="titulo2"><?php echo $rsPlanilla['quinta']; ?></td>
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
		while($rowplanilla=$rslistado->fetch_array())
		{ 
			$id++;
			$otroingresos=round($rowplanilla['ingreso1']+$rowplanilla['ingreso2']+$rowplanilla['ingreso3']+$rowplanilla['ingreso4']+$rowplanilla['ingreso5']+$rowplanilla['ingreso6']+$rowplanilla['ingreso7']+$rowplanilla['ingreso8']+$rowplanilla['ingreso9']+$rowplanilla['ingreso10']+$rowplanilla['ingreso11']+$rowplanilla['ingreso12']+$rowplanilla['ingreso13']+$rowplanilla['ingreso14']+$rowplanilla['ingreso15']+$rowplanilla['ingreso16']+$rowplanilla['ingreso17']+$rowplanilla['ingreso18']+$rowplanilla['ingreso19']+$rowplanilla['ingreso20']+$rowplanilla['ingreso21']+$rowplanilla['ingreso22']+$rowplanilla['ingreso23']+$rowplanilla['ingreso24'],2);	
			
			$totalremuneracion=$otroingresos;
			$totaldescuentos=$rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3']+$rowplanilla['onp']+$rowplanilla['descuento1']+$rowplanilla['descuento2']+$rowplanilla['descuento3']+$rowplanilla['descuento4']+$rowplanilla['descuento5']+$rowplanilla['descuento6']+$rowplanilla['descuento7']+$rowplanilla['descuento8']+$rowplanilla['descuento9']+$rowplanilla['descuento10']+$rowplanilla['descuento11']+$rowplanilla['descuento12']+$rowplanilla['descuento13']+$rowplanilla['descuento14']+$rowplanilla['descuento15']+$rowplanilla['descuento16']+$rowplanilla['descuento17']+$rowplanilla['ies']+$rowplanilla['ipssvida']+$rowplanilla['quinta'];
			
			$totalaportes=$rowplanilla['essalud']+$rowplanilla['senati']+$rowplanilla['scrtsalud']+$rowplanilla['scrtpension'];
			
			
			$totalapagar=$totalremuneracion-$totaldescuentos;
		?>
			<tr>
				<td rowspan="2" class="texto"><?php echo $id; ?></td>
				<td rowspan="2" class="texto1"><?php echo $rowplanilla['apellidos'].' '.$rowplanilla['apellidos2'].' '.$rowplanilla['nombres']; ?></td>
				<td rowspan="2" class="texto1"><?php echo $rowplanilla['cargo']; ?></td>
				<td rowspan="2" class="texto"><?php echo $rowplanilla['dias']; ?></td>
				<td class="texto"><?php echo $rowplanilla['nomafp']; ?></td>
				<td class="texto2"><?php echo number_format($rowplanilla['afp1'],2,'.',','); ?></td>
				<td class="texto2"><?php echo number_format($rowplanilla['afp2'],2,'.',','); ?></td>
				<td class="texto2"><?php echo number_format($rowplanilla['afp3'],2,'.',','); ?></td>
				<td class="texto2"><?php echo number_format($rowplanilla['onp'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento1']>0) echo number_format($rowplanilla['descuento1'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento2']>0) echo number_format($rowplanilla['descuento2'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento3']>0) echo number_format($rowplanilla['descuento3'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento4']>0) echo number_format($rowplanilla['descuento4'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento5']>0) echo number_format($rowplanilla['descuento5'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento6']>0) echo number_format($rowplanilla['descuento6'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento7']>0) echo number_format($rowplanilla['descuento7'],2,'.',','); ?></td>
				<td class="texto"></td>
				<td rowspan="2" class="texto2"><?php echo number_format($totaldescuentos,2,'.',','); ?></td>
			</tr>			
			<tr>
				
				<td class="texto2"><?php if ($rowplanilla['descuento8']>0) echo number_format($rowplanilla['descuento8'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento9']>0) echo number_format($rowplanilla['descuento9'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento10']>0) echo number_format($rowplanilla['descuento10'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento11']>0) echo number_format($rowplanilla['descuento11'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento12']>0) echo number_format($rowplanilla['descuento12'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento13']>0) echo number_format($rowplanilla['descuento13'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento14']>0) echo number_format($rowplanilla['descuento14'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento15']>0) echo number_format($rowplanilla['descuento15'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento16']>0) echo number_format($rowplanilla['descuento16'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['descuento17']>0) echo number_format($rowplanilla['descuento17'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['ies']>0) echo number_format($rowplanilla['ies'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['ipssvida']>0) echo number_format($rowplanilla['ipssvida'],2,'.',','); ?></td>
				<td class="texto2"><?php if ($rowplanilla['quinta']>0) echo number_format($rowplanilla['quinta'],2,'.',','); ?></td>
			</tr>			
			
		<?php
		// SUMAS TOTALES
		$sumaingreso1=$sumaingreso1+$rowplanilla['ingreso1'];
		$sumaingreso2=$sumaingreso2+$otroingresos;
		$sumaingreso3=$sumaingreso3+$rowplanilla['asignacion'];
		$sumaremuneracion=$sumaremuneracion+$totalremuneracion;
		$sumaafp1=$sumaafp1+$rowplanilla['afp1'];
		$sumaafp2=$sumaafp2+$rowplanilla['afp2'];
		$sumaafp3=$sumaafp3+$rowplanilla['afp3'];
		$sumaonp=$sumaonp+$rowplanilla['onp'];
		$sumafalta=$sumafalta+$rowplanilla['descuento3'];
		$sumatardanza=$sumatardanza+$rowplanilla['descuento4'];
		$sumaadelanto=$sumaadelanto+$rowplanilla['descuento1'];
		$sumaprestamo=$sumaprestamo+$rowplanilla['descuento2'];
		$sumaotrodscto5=$sumaotrodscto+$rowplanilla['descuento5'];
		$sumaotrodscto6=$sumaotrodscto+$rowplanilla['descuento6'];
		$sumaotrodscto7=$sumaotrodscto+$rowplanilla['descuento7'];
		$sumadescuentos=$sumadescuentos+$totaldescuentos;
		$sumaessalud=$sumaessalud+$rowplanilla['essalud'];
		$sumasenati=$sumasenati+$rowplanilla['senati'];
		$sumascrtsalud=$sumascrtsalud+$rowplanilla['scrtsalud'];
		$sumascrtpension=$sumascrtpension+$rowplanilla['scrtpension'];
		$sumaaportes=$sumaaportes+$totalaportes;
		$sumatotal=$sumatotal+$totalapagar;
		}			
	?>
		<!--	<tr>
				<td class="texto"></td>
				<td class="texto1"></td>
				<td class="texto1"></td>
				<td class="texto"></td>
				<td class="texto"></td>
				<td class="texto22"><?php echo number_format($sumaafp1,2,'.',','); ?></td>
				<td class="texto22"><?php echo number_format($sumaafp2,2,'.',','); ?></td>
				<td class="texto22"><?php echo number_format($sumaafp3,2,'.',','); ?></td>
				<td class="texto22"><?php echo number_format($sumaonp,2,'.',','); ?></td>
				
				<td class="texto22"><?php echo number_format($sumafalta,2,'.',','); ?></td>
				<td class="texto22"><?php echo number_format($sumatardanza,2,'.',','); ?></td>
				<td class="texto22"><?php echo number_format($sumaadelanto,2,'.',','); ?></td>
				<td class="texto22"><?php echo number_format($sumaprestamo,2,'.',','); ?></td>
				<td class="texto22"><?php if ($sumaotrodscto5>0) echo number_format($sumaotrodscto5,2,'.',','); ?></td>
				<td class="texto22"><?php if ($sumaotrodscto6>0) echo number_format($sumaotrodscto6,2,'.',','); ?></td>
				<td class="texto22"><?php if ($sumaotrodscto7>0)echo number_format($sumaotrodscto7,2,'.',','); ?></td>
				<td class="texto"></td>
				<td class="texto22"><?php if ($sumadescuentos>0)echo number_format($sumadescuentos,2,'.',','); ?></td>
				
			</tr>			-->
</table>
<script>
	printpage();	
</script>