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

	function FormatDate($vFecha, $vFormat='d-m-Y'){
	$miFecha=split("-", $vFecha);
	$vFecha=mktime(0, 0, 0, intval($miFecha[1]), intval($miFecha[2]), intval($miFecha[0]));
	return date($vFormat, $vFecha);
	}	
	function add_ceros($numero,$ceros) {
		$order_diez = explode(".",$numero);
		$dif_diez = $ceros - strlen($order_diez[0]);
		for($m = 0 ;
		$m < $dif_diez;
		 $m++)
		{
				@$insertar_ceros .= 0;
		}
		return $insertar_ceros .= $numero;
	}	
			
	$laplanilla=$_GET['micodigo'];
	$codtrabajador=$_GET['elcodtrabajador'];
	$laopcion=$_GET['laopcion'];

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
		$dirempresa=$rsEntidad['direccion'];
	
	// PROCESO DE MONTO AFECTO
?>
<link href="../css/estilosrep.css" rel="stylesheet" type="text/css" />
<script>
 function printpage()
   {
   window.print()
   }
 </script>
 <?php
	$oTrabajadpr=new Negocio_clsTrabajador();
 	$oPlanilla=new Negocio_clsPlanilla();

 	if ($laopcion=='1')
	{
		// IMPRIMIR TODO
		$rslistado=$oPlanilla->Mostrar_Registros_Todos1($laplanilla);	
	}
	else
	{
		// IMPRIMIR INDIVIDUAL		
		$rslistado=$oPlanilla->Mostrar_Registros_Todos2($laplanilla,$codtrabajador);
		
	}
		while($rowplanilla=$rslistado->fetch_array())
		{
			
			if ($nomplanilla=='VACACIONES' or $nomplanilla=='GRATIFICACIONES')
			{
				$codtrabajador=$rowplanilla['codtrabajador'];
				$rstrabajador=$oTrabajadpr->getROW($codtrabajador);
				$elsueldo=$rstrabajador['sueldo'];
			}
			else
			{
				$elsueldo=$rowplanilla['ingreso1'];
			}
			//echo $rowplanilla['codtrabajador'];
		?>
			
 <!-- INCIO DE BOLETA-->
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td class="titulo1" align="center"><?php echo strtoupper(TITULO); ?></td>
		<td class="titulo1" align="center">BOLETA DE PAGO</td>
		<td width="5%"></td>
		<td class="titulo1" align="center"><?php echo TITULO; ?></td>
		<td class="titulo1" align="center">BOLETA DE PAGO</td>	
	</tr> 
	<tr>
		<td class="titulo1" align="center">RUC :&nbsp;<?php echo $rucempresa; ?></td>
		<td class="titulo1" align="center"><?php echo $rsPlanilla['planilla'].' '.$rsPlanilla['mes'].' '.$rsPlanilla['periodo']; ?></td>
		<td></td>
		<td class="titulo1" align="center">RUC :&nbsp;<?php echo $rucempresa; ?></td>
		<td class="titulo1" align="center"><?php echo $rsPlanilla['planilla'].' '.$rsPlanilla['mes'].' '.$rsPlanilla['periodo']; ?></td>	
	</tr> 
	<tr>
		<td class="titulo1" align="center"><?php echo $dirempresa; ?></td>
		<td class="titulo1" align="center"></td>
		<td></td>
		<td class="titulo1" align="center"><?php echo $dirempresa; ?></td>
		<td class="titulo1" align="center"></td>		
	</tr> 
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr height="1">
		<td>
		</td>
	</tr>
</table>
<!-- INICIO DE CONTENIDO-->	
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td width="48%">
			<table width="100%" cellpadding="0" cellspacing="0" border="1">
				<tr>
					<td>
						<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tr>
								<td width="30%" class="textoboleta1">&nbsp;Codigo : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo add_ceros($rowplanilla['codtrabajador'],6); ?></td>
							</tr>
							<tr>
								<td width="30%" class="textoboleta1">&nbsp;Apellidos y Nombres : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo $rowplanilla['apellidos'].' '.$rowplanilla['apellidos2'].' '.$rowplanilla['nombres']; ?></td>
							</tr>
							<tr>
								<td width="30%" class="textoboleta1">&nbsp;Doc-Num : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo $rowplanilla['coddocu'].' -  '.$rowplanilla['numdocu']; ?></td>
							</tr>
							<tr>
								<td width="30%" class="textoboleta1">&nbsp;Regimen Pens. : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo $rowplanilla['nomafp'].' -  '.$rowplanilla['cupps']; ?></td>
							</tr>
							<tr>
								<td width="30%" class="textoboleta1">&nbsp;Tipo de Trabajador : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo $rowplanilla['tipopla']; ?></td>
							</tr>
							<tr>
								<td width="30%" class="textoboleta1">&nbsp;Cargo : &nbsp;</td>
								<td>
									<table width="100%" cellpadding="0" cellspacing="0" border="0">
										<tr>
											<td align="left" class="textoboleta2"><?php echo $rowplanilla['cargo']; ?></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="30%" class="textoboleta1">&nbsp;Dias Trabajados : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo $rowplanilla['dias']; ?></td>
							</tr>
							<tr>
								<td width="30%" class="textoboleta1">&nbsp;Sueldo : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo 'S/. '.number_format($elsueldo,2,'.',','); ?></td>
							</tr>
							<tr>
								<td width="30%" class="textoboleta1">&nbsp;Fecha Ingreso : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo FormatDate($rowplanilla['fini']); ?></td>
							</tr>
							<tr>
								<td width="30%" class="textoboleta1">&nbsp;Fecha Termino : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo FormatDate($rowplanilla['ffin']); ?></td>
							</tr>
							<tr>
								<td width="30%" class="textoboleta1">&nbsp;Deposito Bancario : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo $rowplanilla['banco'].' - '.$rowplanilla['cuenta']; ?></td>
							</tr>
							
							<tr>
								<td colspan="2">
									<table width="100%" cellpadding="0" cellspacing="0" border="1">
										<tr height="30">
											<td width="35%" class="textoboleta2titulo">REMUNERACIONES</td>
											<td width="35%" class="textoboleta2titulo">DESCUENTOS</td>
											<td width="35%" class="textoboleta2titulo">APORTES</td>
										</tr>
										<tr>
											<td>
												<table width="100%" cellpadding="0" cellspacing="0" border="0">
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['ingreso1']>0) echo $rsPlanilla['ingreso1']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso1']>0) echo number_format($rowplanilla['ingreso1'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso2']) echo $rsPlanilla['ingreso2']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso2']>0) echo number_format($rowplanilla['ingreso2'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso3']) echo $rsPlanilla['ingreso3']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso3']>0) echo number_format($rowplanilla['ingreso3'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso4']) echo $rsPlanilla['ingreso4']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso4']>0) echo number_format($rowplanilla['ingreso4'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['ingreso5']>0) echo $rsPlanilla['ingreso5']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso5']>0) echo number_format($rowplanilla['ingreso5'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso6']) echo $rsPlanilla['ingreso6']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso6']>0) echo number_format($rowplanilla['ingreso6'],2,'.',','); ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso7']) echo $rsPlanilla['ingreso7']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso7']>0) echo number_format($rowplanilla['ingreso7'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso8']) echo $rsPlanilla['ingreso8']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso8']>0) echo number_format($rowplanilla['ingreso8'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso9']) echo $rsPlanilla['ingreso9']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso9']>0) echo number_format($rowplanilla['ingreso9'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso10']) echo $rsPlanilla['ingreso10']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso10']>0) echo number_format($rowplanilla['ingreso10'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso11']) echo $rsPlanilla['ingreso11']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso11']>0) echo number_format($rowplanilla['ingreso11'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso12']) echo $rsPlanilla['ingreso12']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso12']>0) echo number_format($rowplanilla['ingreso12'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso13']) echo $rsPlanilla['ingreso13']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso13']>0) echo number_format($rowplanilla['ingreso13'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso14']) echo $rsPlanilla['ingreso14']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso14']>0) echo number_format($rowplanilla['ingreso14'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso15']) echo $rsPlanilla['ingreso15']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso15']>0) echo number_format($rowplanilla['ingreso15'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso16']) echo $rsPlanilla['ingreso16']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso16']>0) echo number_format($rowplanilla['ingreso16'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso17']) echo $rsPlanilla['ingreso17']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso17']>0) echo number_format($rowplanilla['ingreso17'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso18']) echo $rsPlanilla['ingreso18']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso18']>0) echo number_format($rowplanilla['ingreso18'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso19']) echo $rsPlanilla['ingreso19']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso19']>0) echo number_format($rowplanilla['ingreso19'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso20']) echo $rsPlanilla['ingreso20']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso20']>0) echo number_format($rowplanilla['ingreso20'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso21']) echo $rsPlanilla['ingreso21']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso21']>0) echo number_format($rowplanilla['ingreso21'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso22']) echo $rsPlanilla['ingreso22']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso22']>0) echo number_format($rowplanilla['ingreso22'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso23']) echo $rsPlanilla['ingreso23']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso23']>0) echo number_format($rowplanilla['ingreso23'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso24']) echo $rsPlanilla['ingreso24']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso24']>0) echo number_format($rowplanilla['ingreso24'],2,'.',','); ?>&nbsp;</td>
													</tr>
													
													
													
													
													<tr height="1">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>																										
													<tr>
														<td colspan="2">
															<table width="100%" cellpadding="0" cellspacing="0" border="1">													
																<tr height="40">
																	<td colspan="2">
																		<table width="100%" cellpadding="0" cellspacing="0" border="0">
																			<tr>
																				<td>
																					<table width="100%" cellpadding="0" cellspacing="0" border="0">
																						<tr>
																							<td class="textoboleta2b">&nbsp;TOTAL REMUNERACION</td>																				
																						</tr>
																					</table>
																				</td>
																				<td>
																					<table width="100%" cellpadding="0" cellspacing="0" border="0">
																						<tr>																				
																							<td class="textoboleta2cc"><?php echo number_format($rowplanilla['ingreso1']+$rowplanilla['ingreso2']+$rowplanilla['ingreso3']+$rowplanilla['ingreso4']+$rowplanilla['ingreso5']+$rowplanilla['ingreso6']+$rowplanilla['ingreso7']+$rowplanilla['ingreso8']+$rowplanilla['ingreso9']+$rowplanilla['ingreso10']+$rowplanilla['ingreso11']+$rowplanilla['ingreso12']+$rowplanilla['ingreso13']+$rowplanilla['ingreso14']+$rowplanilla['ingreso15']+$rowplanilla['ingreso16']+$rowplanilla['ingreso17']+$rowplanilla['ingreso18']+$rowplanilla['ingreso19']+$rowplanilla['ingreso20']+$rowplanilla['ingreso21']+$rowplanilla['ingreso22']+$rowplanilla['ingreso23']+$rowplanilla['ingreso24'],2,'.',','); ?>&nbsp;</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
														</td>
													</tr>		
												</table>
											</td>
											<td>
												<table width="100%" cellpadding="0" cellspacing="0" border="0">
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['afp1']>0) echo $rsPlanilla['afp1']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['afp1']>0) echo number_format($rowplanilla['afp1'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['afp2']>0) echo $rsPlanilla['afp2']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['afp2']>0) echo number_format($rowplanilla['afp2'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['afp3']>0) echo $rsPlanilla['afp3']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['afp3']>0) echo number_format($rowplanilla['afp3'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['onp']>0) echo $rsPlanilla['onp']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['onp']>0) echo number_format($rowplanilla['onp'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['ipssvida']>0) echo $rsPlanilla['ipssvida']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ipssvida']>0) echo number_format($rowplanilla['ipssvida'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['ies']>0) echo $rsPlanilla['ies']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ies']>0) echo number_format($rowplanilla['ies'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['quinta']>0) echo $rsPlanilla['quinta']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['quinta']>0) echo $rowplanilla['quinta']; ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento1']>0) echo $rsPlanilla['descuento1']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento1']>0) echo $rowplanilla['descuento1']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento2']>0) echo $rsPlanilla['descuento2']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento2']>0) echo $rowplanilla['descuento2']; ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento3']>0) echo $rsPlanilla['descuento3']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento3']>0) echo $rowplanilla['descuento3']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento4']>0) echo $rsPlanilla['descuento4']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento4']>0) echo $rowplanilla['descuento4']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento5']>0) echo $rsPlanilla['descuento5']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento5']>0) echo $rowplanilla['descuento5']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento6']>0) echo $rsPlanilla['descuento6']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento6']>0) echo $rowplanilla['descuento6']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento7']>0) echo $rsPlanilla['descuento7']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento7']>0) echo $rowplanilla['descuento7']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento8']>0) echo $rsPlanilla['descuento8']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento8']>0) echo $rowplanilla['descuento8']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento9']>0) echo $rsPlanilla['descuento9']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento9']>0) echo $rowplanilla['descuento9']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento10']>0) echo $rsPlanilla['descuento10']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento10']>0) echo $rowplanilla['descuento10']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento11']>0) echo $rsPlanilla['descuento11']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento11']>0) echo $rowplanilla['descuento11']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento12']>0) echo $rsPlanilla['descuento12']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento12']>0) echo $rowplanilla['descuento12']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento13']>0) echo $rsPlanilla['descuento13']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento13']>0) echo $rowplanilla['descuento13']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento14']>0) echo $rsPlanilla['descuento14']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento14']>0) echo $rowplanilla['descuento14']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento15']>0) echo $rsPlanilla['descuento15']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento15']>0) echo $rowplanilla['descuento15']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento16']>0) echo $rsPlanilla['descuento16']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento16']>0) echo $rowplanilla['descuento16']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento17']>0) echo $rsPlanilla['descuento17']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento17']>0) echo $rowplanilla['descuento17']; ?>&nbsp;</td>
													</tr>													
																										
													<tr>
														<td colspan="2">
															<table width="100%" cellpadding="0" cellspacing="0" border="1">													
																<tr height="40">
																	<td colspan="2">
																		<table width="100%" cellpadding="0" cellspacing="0" border="0">
																			<tr>
																				<td>
																					<table width="100%" cellpadding="0" cellspacing="0" border="0">
																						<tr>
																							<td class="textoboleta2b">&nbsp;TOTAL DESCUENTOS</td>																				
																						</tr>
																					</table>
																				</td>
																				<td>
																					<table width="100%" cellpadding="0" cellspacing="0" border="0">
																						<tr>																				
																							<td class="textoboleta2cc"><?php echo number_format($rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3']+$rowplanilla['onp']+$rowplanilla['descuento1']+$rowplanilla['descuento2']+$rowplanilla['descuento3']+$rowplanilla['descuento4']+$rowplanilla['descuento5']+$rowplanilla['descuento6']+$rowplanilla['descuento7']+$rowplanilla['descuento8']+$rowplanilla['descuento9']+$rowplanilla['descuento10']+$rowplanilla['descuento11']+$rowplanilla['descuento12']+$rowplanilla['descuento13']+$rowplanilla['descuento14']+$rowplanilla['descuento15']+$rowplanilla['descuento16']+$rowplanilla['descuento17']+$rowplanilla['ies']+$rowplanilla['ipssvida']+$rowplanilla['quinta'],2,'.',','); ?>&nbsp;</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
														</td>
													</tr>		
												</table>
											</td>
											<td>
												<table width="100%" cellpadding="0" cellspacing="0" border="0">
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['essalud']>0) echo $rsPlanilla['essalud']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['essalud']>0) echo $rowplanilla['essalud']; ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['senati']>0) echo $rsPlanilla['senati']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['senati']>0) echo $rowplanilla['senati']; ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['scrtsalud']>0) echo $rsPlanilla['scrtsalud']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['scrtsalud']>0) echo $rowplanilla['scrtsalud']; ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['scrtpension']>0) echo $rsPlanilla['scrtpension']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['scrtpension']>0) echo $rowplanilla['scrtpension']; ?>&nbsp;</td>
													</tr>
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>													
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>													
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>													
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>													
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>													
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>													
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>																										
													<tr>
														<td colspan="2">
															<table width="100%" cellpadding="0" cellspacing="0" border="1">													
																<tr height="40">
																	<td colspan="2">
																		<table width="100%" cellpadding="0" cellspacing="0" border="0">
																			<tr>
																				<td>
																					<table width="100%" cellpadding="0" cellspacing="0" border="0">
																						<tr>
																							<td class="textoboleta2b">&nbsp;TOTAL APORTES</td>																				
																						</tr>
																					</table>
																				</td>
																				<td>
																					<table width="100%" cellpadding="0" cellspacing="0" border="0">
																						<tr>																				
																							<td class="textoboleta2cc"><?php echo number_format($rowplanilla['essalud']+$rowplanilla['senati']+$rowplanilla['scrtsalud']+$rowplanilla['scrtpension'],2,'.',','); ?>&nbsp;</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
														</td>
													</tr>		
												</table>
											</td>
										</tr>
										<tr>																				
											<td colspan="6" class="textoboleta2"><?php echo 'NETO A PAGAR : '.number_format(($rowplanilla['ingreso1']+$rowplanilla['ingreso2']+$rowplanilla['ingreso3']+$rowplanilla['ingreso4']+$rowplanilla['ingreso5']+$rowplanilla['ingreso6']+$rowplanilla['ingreso7']+$rowplanilla['ingreso8']+$rowplanilla['ingreso9']+$rowplanilla['ingreso10']+$rowplanilla['ingreso11']+$rowplanilla['ingreso12']+$rowplanilla['ingreso13']+$rowplanilla['ingreso14']+$rowplanilla['ingreso15']+$rowplanilla['ingreso16']+$rowplanilla['ingreso17']+$rowplanilla['ingreso18']+$rowplanilla['ingreso19']+$rowplanilla['ingreso20']+$rowplanilla['ingreso21']+$rowplanilla['ingreso22']+$rowplanilla['ingreso23']+$rowplanilla['ingreso24'])-($rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3']+$rowplanilla['onp']+$rowplanilla['descuento1']+$rowplanilla['descuento2']+$rowplanilla['descuento3']+$rowplanilla['descuento4']+$rowplanilla['descuento5']+$rowplanilla['descuento6']+$rowplanilla['descuento7']+$rowplanilla['descuento8']+$rowplanilla['descuento9']+$rowplanilla['descuento10']+$rowplanilla['descuento11']+$rowplanilla['descuento12']+$rowplanilla['descuento13']+$rowplanilla['descuento14']+$rowplanilla['descuento15']+$rowplanilla['descuento16']+$rowplanilla['descuento17']+$rowplanilla['ies']+$rowplanilla['ipssvida']+$rowplanilla['quinta']),2,'.',','); ?>&nbsp;</td>
										</tr>
									</table>		
								</td>
							</tr>							
						</table>										
					</td>
				</tr>
			</table>
		</td>
		
		
		<td width="5%"></td>
		<td width="48%">
			<table width="100%" cellpadding="0" cellspacing="0" border="1">
				<tr>
					<td>
						<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tr height="1">
								<td width="30%" class="textoboleta1">&nbsp;Codigo : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo add_ceros($rowplanilla['codtrabajador'],6); ?></td>
							</tr>
							<tr height="1">
								<td width="30%" class="textoboleta1">&nbsp;Apellidos y Nombres : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo $rowplanilla['apellidos'].' '.$rowplanilla['apellidos2'].' '.$rowplanilla['nombres']; ?></td>
							</tr>
							<tr height="1">
								<td width="30%" class="textoboleta1">&nbsp;Doc-Num : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo $rowplanilla['coddocu'].' -  '.$rowplanilla['numdocu']; ?></td>
							</tr>
							<tr height="1">
								<td width="30%" class="textoboleta1">&nbsp;Regimen Pens. : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo $rowplanilla['nomafp'].' -  '.$rowplanilla['cupps']; ?></td>
							</tr>
							<tr height="1">
								<td width="30%" class="textoboleta1">&nbsp;Tipo de Trabajador : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo $rowplanilla['tipopla']; ?></td>
							</tr>
							<tr height="1">
								<td width="30%" class="textoboleta1">&nbsp;Cargo : &nbsp;</td>
								<td>
									<table width="100%" cellpadding="0" cellspacing="0" border="0">
										<tr>
											<td align="left" class="textoboleta2"><?php echo $rowplanilla['cargo']; ?></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr height="1">
								<td width="30%" class="textoboleta1">&nbsp;Dias Trabajados : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo $rowplanilla['dias']; ?></td>
							</tr>
							<tr height="1">
								<td width="30%" class="textoboleta1">&nbsp;Sueldo : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo 'S/. '.number_format($elsueldo,2,'.',','); ?></td>
							</tr>
							<tr height="1">
								<td width="30%" class="textoboleta1">&nbsp;Fecha Ingreso : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo FormatDate($rowplanilla['fini']); ?></td>
							</tr>
							<tr height="1">
								<td width="30%" class="textoboleta1">&nbsp;Fecha Termino : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo FormatDate($rowplanilla['ffin']); ?></td>
							</tr>
							<tr height="1">
								<td width="30%" class="textoboleta1">&nbsp;Deposito Bancario : &nbsp;</td>
								<td align="left" class="textoboleta2"><?php echo $rowplanilla['banco'].' - '.$rowplanilla['cuenta']; ?></td>
							</tr>
							
							<tr>
								<td colspan="2">
									<table width="100%" cellpadding="0" cellspacing="0" border="1">
										<tr height="30">
											<td width="35%" class="textoboleta2titulo">REMUNERACIONES</td>
											<td width="35%" class="textoboleta2titulo">DESCUENTOS</td>
											<td width="35%" class="textoboleta2titulo">APORTES</td>
										</tr>
										<tr>
											<td>
												<table width="100%" cellpadding="0" cellspacing="0" border="0">
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['ingreso1']>0) echo $rsPlanilla['ingreso1']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso1']>0) echo number_format($rowplanilla['ingreso1'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso2']) echo $rsPlanilla['ingreso2']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso2']>0) echo number_format($rowplanilla['ingreso2'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso3']) echo $rsPlanilla['ingreso3']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso3']>0) echo number_format($rowplanilla['ingreso3'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso4']) echo $rsPlanilla['ingreso4']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso4']>0) echo number_format($rowplanilla['ingreso4'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['ingreso5']>0) echo $rsPlanilla['ingreso5']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso5']>0) echo number_format($rowplanilla['ingreso5'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php echo $rsPlanilla['ingreso6']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso6']>0) echo number_format($rowplanilla['ingreso6'],2,'.',','); ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso7']) echo $rsPlanilla['ingreso7']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso7']>0) echo number_format($rowplanilla['ingreso7'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso8']) echo $rsPlanilla['ingreso8']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso8']>0) echo number_format($rowplanilla['ingreso8'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso9']) echo $rsPlanilla['ingreso9']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso9']>0) echo number_format($rowplanilla['ingreso9'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso10']) echo $rsPlanilla['ingreso10']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso10']>0) echo number_format($rowplanilla['ingreso10'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso11']) echo $rsPlanilla['ingreso11']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso11']>0) echo number_format($rowplanilla['ingreso11'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso12']) echo $rsPlanilla['ingreso12']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso12']>0) echo number_format($rowplanilla['ingreso12'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso13']) echo $rsPlanilla['ingreso13']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso13']>0) echo number_format($rowplanilla['ingreso13'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso14']) echo $rsPlanilla['ingreso14']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso14']>0) echo number_format($rowplanilla['ingreso14'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso15']) echo $rsPlanilla['ingreso15']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso15']>0) echo number_format($rowplanilla['ingreso15'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso16']) echo $rsPlanilla['ingreso16']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso16']>0) echo number_format($rowplanilla['ingreso16'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso17']) echo $rsPlanilla['ingreso17']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso17']>0) echo number_format($rowplanilla['ingreso17'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso18']) echo $rsPlanilla['ingreso18']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso18']>0) echo number_format($rowplanilla['ingreso18'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso19']) echo $rsPlanilla['ingreso19']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso19']>0) echo number_format($rowplanilla['ingreso19'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso20']) echo $rsPlanilla['ingreso20']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso20']>0) echo number_format($rowplanilla['ingreso20'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso21']) echo $rsPlanilla['ingreso21']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso21']>0) echo number_format($rowplanilla['ingreso21'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso22']) echo $rsPlanilla['ingreso22']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso22']>0) echo number_format($rowplanilla['ingreso22'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso23']) echo $rsPlanilla['ingreso23']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso23']>0) echo number_format($rowplanilla['ingreso23'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rsPlanilla['ingreso24']) echo $rsPlanilla['ingreso24']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ingreso24']>0) echo number_format($rowplanilla['ingreso24'],2,'.',','); ?>&nbsp;</td>
													</tr>
												
												
												
													<tr>
														<td colspan="2">
															<table width="100%" cellpadding="0" cellspacing="0" border="1">													
																<tr height="40">
																	<td colspan="2">
																		<table width="100%" cellpadding="0" cellspacing="0" border="0">
																			<tr>
																				<td>
																					<table width="100%" cellpadding="0" cellspacing="0" border="0">
																						<tr>
																							<td class="textoboleta2b">&nbsp;TOTAL REMUNERACION</td>																				
																						</tr>
																					</table>
																				</td>
																				<td>
																					<table width="100%" cellpadding="0" cellspacing="0" border="0">
																						<tr>																				
																							<td class="textoboleta2cc"><?php echo number_format($rowplanilla['ingreso1']+$rowplanilla['ingreso2']+$rowplanilla['ingreso3']+$rowplanilla['ingreso4']+$rowplanilla['ingreso5']+$rowplanilla['ingreso6']+$rowplanilla['ingreso7']+$rowplanilla['ingreso8']+$rowplanilla['ingreso9']+$rowplanilla['ingreso10']+$rowplanilla['ingreso11']+$rowplanilla['ingreso12']+$rowplanilla['ingreso13']+$rowplanilla['ingreso14']+$rowplanilla['ingreso15']+$rowplanilla['ingreso16']+$rowplanilla['ingreso17']+$rowplanilla['ingreso18']+$rowplanilla['ingreso19']+$rowplanilla['ingreso20']+$rowplanilla['ingreso21']+$rowplanilla['ingreso22']+$rowplanilla['ingreso23']+$rowplanilla['ingreso24'],2,'.',','); ?>&nbsp;</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
														</td>
													</tr>		
												</table>
											</td>
											<td>
												<table width="100%" cellpadding="0" cellspacing="0" border="0">
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['afp1']>0) echo $rsPlanilla['afp1']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['afp1']>0) echo number_format($rowplanilla['afp1'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['afp2']>0) echo $rsPlanilla['afp2']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['afp2']>0) echo number_format($rowplanilla['afp2'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['afp3']>0) echo $rsPlanilla['afp3']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['afp3']>0) echo number_format($rowplanilla['afp3'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['onp']>0) echo $rsPlanilla['onp']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['onp']>0) echo number_format($rowplanilla['onp'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['ipssvida']>0) echo $rsPlanilla['ipssvida']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ipssvida']>0) echo number_format($rowplanilla['ipssvida'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['ies']>0) echo $rsPlanilla['ies']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['ies']>0) echo number_format($rowplanilla['ies'],2,'.',','); ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['quinta']>0) echo $rsPlanilla['quinta']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['quinta']>0) echo $rowplanilla['quinta']; ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento1']>0) echo $rsPlanilla['descuento1']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento1']>0) echo $rowplanilla['descuento1']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento2']>0) echo $rsPlanilla['descuento2']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento2']>0) echo $rowplanilla['descuento2']; ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento3']>0) echo $rsPlanilla['descuento3']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento3']>0) echo $rowplanilla['descuento3']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento4']>0) echo $rsPlanilla['descuento4']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento4']>0) echo $rowplanilla['descuento4']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento5']>0) echo $rsPlanilla['descuento5']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento5']>0) echo $rowplanilla['descuento5']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento6']>0) echo $rsPlanilla['descuento6']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento6']>0) echo $rowplanilla['descuento6']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento7']>0) echo $rsPlanilla['descuento7']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento7']>0) echo $rowplanilla['descuento7']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento8']>0) echo $rsPlanilla['descuento8']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento8']>0) echo $rowplanilla['descuento8']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento9']>0) echo $rsPlanilla['descuento9']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento9']>0) echo $rowplanilla['descuento9']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento10']>0) echo $rsPlanilla['descuento10']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento10']>0) echo $rowplanilla['descuento10']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento11']>0) echo $rsPlanilla['descuento11']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento11']>0) echo $rowplanilla['descuento11']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento12']>0) echo $rsPlanilla['descuento12']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento12']>0) echo $rowplanilla['descuento12']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento13']>0) echo $rsPlanilla['descuento13']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento13']>0) echo $rowplanilla['descuento13']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento14']>0) echo $rsPlanilla['descuento14']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento14']>0) echo $rowplanilla['descuento14']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento15']>0) echo $rsPlanilla['descuento15']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento15']>0) echo $rowplanilla['descuento15']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento16']>0) echo $rsPlanilla['descuento16']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento16']>0) echo $rowplanilla['descuento16']; ?>&nbsp;</td>
													</tr>													
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['descuento17']>0) echo $rsPlanilla['descuento17']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['descuento17']>0) echo $rowplanilla['descuento17']; ?>&nbsp;</td>
													</tr>													
																										
													<tr>
														<td colspan="2">
															<table width="100%" cellpadding="0" cellspacing="0" border="1">													
																<tr height="40">
																	<td colspan="2">
																		<table width="100%" cellpadding="0" cellspacing="0" border="0">
																			<tr>
																				<td>
																					<table width="100%" cellpadding="0" cellspacing="0" border="0">
																						<tr>
																							<td class="textoboleta2b">&nbsp;TOTAL DESCUENTOS</td>																				
																						</tr>
																					</table>
																				</td>
																				<td>
																					<table width="100%" cellpadding="0" cellspacing="0" border="0">
																						<tr>																				
																							<td class="textoboleta2cc"><?php echo number_format($rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3']+$rowplanilla['onp']+$rowplanilla['descuento1']+$rowplanilla['descuento2']+$rowplanilla['descuento3']+$rowplanilla['descuento4']+$rowplanilla['descuento5']+$rowplanilla['descuento6']+$rowplanilla['descuento7']+$rowplanilla['descuento8']+$rowplanilla['descuento9']+$rowplanilla['descuento10']+$rowplanilla['descuento11']+$rowplanilla['descuento12']+$rowplanilla['descuento13']+$rowplanilla['descuento14']+$rowplanilla['descuento15']+$rowplanilla['descuento16']+$rowplanilla['descuento17']+$rowplanilla['ies']+$rowplanilla['ipssvida']+$rowplanilla['quinta'],2,'.',','); ?>&nbsp;</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
														</td>
													</tr>		
												</table>
											</td>
											<td>
												<table width="100%" cellpadding="0" cellspacing="0" border="0">
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['essalud']>0) echo $rsPlanilla['essalud']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['essalud']>0) echo $rowplanilla['essalud']; ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['senati']>0) echo $rsPlanilla['senati']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['senati']>0) echo $rowplanilla['senati']; ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['scrtsalud']>0) echo $rsPlanilla['scrtsalud']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['scrtsalud']>0) echo $rowplanilla['scrtsalud']; ?>&nbsp;</td>
													</tr>
													<tr height="1">
														<td class="textoboleta2b">&nbsp;<?php if ($rowplanilla['scrtpension']>0) echo $rsPlanilla['scrtpension']; ?></td>
														<td class="textoboleta2c"><?php if ($rowplanilla['scrtpension']>0) echo $rowplanilla['scrtpension']; ?>&nbsp;</td>
													</tr>
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>													
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>													
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>													
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>													
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>													
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>													
													<tr height="15">
														<td class="textoboleta2b"></td>
														<td class="textoboleta2c"></td>
													</tr>																										
													<tr>
														<td colspan="2">
															<table width="100%" cellpadding="0" cellspacing="0" border="1">													
																<tr height="40">
																	<td colspan="2">
																		<table width="100%" cellpadding="0" cellspacing="0" border="0">
																			<tr>
																				<td>
																					<table width="100%" cellpadding="0" cellspacing="0" border="0">
																						<tr>
																							<td class="textoboleta2b">&nbsp;TOTAL APORTES</td>																				
																						</tr>
																					</table>
																				</td>
																				<td>
																					<table width="100%" cellpadding="0" cellspacing="0" border="0">
																						<tr>																				
																							<td class="textoboleta2cc"><?php echo number_format($rowplanilla['essalud']+$rowplanilla['senati']+$rowplanilla['scrtsalud']+$rowplanilla['scrtpension'],2,'.',','); ?>&nbsp;</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
														</td>
													</tr>		
												</table>
											</td>
										</tr>
										<tr>																				
											<td colspan="6" class="textoboleta2"><?php echo 'NETO A PAGAR : '.number_format(($rowplanilla['ingreso1']+$rowplanilla['ingreso2']+$rowplanilla['ingreso3']+$rowplanilla['ingreso4']+$rowplanilla['ingreso5']+$rowplanilla['ingreso6']+$rowplanilla['ingreso7']+$rowplanilla['ingreso8']+$rowplanilla['ingreso9']+$rowplanilla['ingreso10']+$rowplanilla['ingreso11']+$rowplanilla['ingreso12']+$rowplanilla['ingreso13']+$rowplanilla['ingreso14']+$rowplanilla['ingreso15']+$rowplanilla['ingreso16']+$rowplanilla['ingreso17']+$rowplanilla['ingreso18']+$rowplanilla['ingreso19']+$rowplanilla['ingreso20']+$rowplanilla['ingreso21']+$rowplanilla['ingreso22']+$rowplanilla['ingreso23']+$rowplanilla['ingreso24'])-($rowplanilla['afp1']+$rowplanilla['afp2']+$rowplanilla['afp3']+$rowplanilla['onp']+$rowplanilla['descuento1']+$rowplanilla['descuento2']+$rowplanilla['descuento3']+$rowplanilla['descuento4']+$rowplanilla['descuento5']+$rowplanilla['descuento6']+$rowplanilla['descuento7']+$rowplanilla['descuento8']+$rowplanilla['descuento9']+$rowplanilla['descuento10']+$rowplanilla['descuento11']+$rowplanilla['descuento12']+$rowplanilla['descuento13']+$rowplanilla['descuento14']+$rowplanilla['descuento15']+$rowplanilla['descuento16']+$rowplanilla['descuento17']+$rowplanilla['ies']+$rowplanilla['ipssvida']+$rowplanilla['quinta']),2,'.',','); ?>&nbsp;</td>
										</tr>
										
										
									</table>		
								</td>
							</tr>							
						</table>										
					</td>
				</tr>
			</table>
		</td>
				</tr>
			</table>					
		</td>
	</tr>
</table> 
<br><br><br><br><br><br><br><br><br><br><br><br><br>
	
<!-- FIN DE CONTENIDO-->
 <!-- FIN DE BOLETA-->
		<?php
		}		
 ?>
<script>
	printpage();	
</script>