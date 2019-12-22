<?php
	include("../config.php");
	require_once(LOGICA."/negocio.php");	

	$elmes=$_GET['elmes'];	
	$elcodigo=$_GET['eltrabajador'];	
	$miperiodo=$_GET['elperiodo'];

	$olistado=new Negocio_clsTrabajador();
	$rsTrabajador=$olistado->getROW($elcodigo);	


	$tipotrabajador=$rsTrabajador['tipo'];

	$otipotrab=new Negocio_clsTipotrabajador();
	$rowtipotrab=$otipotrab->buscartipo($tipotrabajador);

	$horatrabajo=$rowtipotrab['trabajo'];

	$misueldo=$rsTrabajador['sueldo'];
	$misueldodia=round($misueldo/30,1);

	$misueldohora=round($misueldodia/$horatrabajo,1);

	$oEntidad=new Negocio_clsConfiguracion();
	$rsEntidad=$oEntidad->Buscar_Entidad($miempresa,$miperiodo);
	$misueldominuto=$rsEntidad['minuto'];

	function FormatDate($fecha){
		list($anio,$mes,$dia)=explode("-",$fecha); 
		return $dia."-".$mes."-".$anio; 
	}			

$oControl=new Negocio_clsDescuento();
$rscontrol=$oControl->BusscarControl($miperiodo,$elmes,$elcodigo);
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
		<td align="left" class="titulo"><?php echo TITULO; ?></td>
		<td align="right" class="titulo"><?php echo date('d-m-Y'); ?></td>
	</tr>
	<tr height="25">
		<td align="center" colspan="2" class="titulo1">Reporte de Control de Asistencia</td>		
	</tr>
	<tr>
		<td class="titulo">Trabajador :&nbsp;<strong><?php echo $rsTrabajador['apellidos'].' '.$rsTrabajador['apellidos2'].' '.$rsTrabajador['nombres'].' - '.$rsTrabajador['numdocu'];?></strong></td>
	</tr>
	<tr>
		<td class="titulo">Periodo - Mes :&nbsp;<strong><?php echo $miperiodo.' - '.$elmes;?></strong></td>
	</tr>

	<tr height="20">
		<td colspan="2">
			<table width="100%" cellpadding="0" cellspacing="0" border="1" bordercolor="#CCCCCC">
				<tr height="20" bgcolor="#CCCCCC">
					<td align="center" width="10%" class="titulo1" style="padding:1px; border-right:1px solid #CCCCCC;">Fecha</td>
					<td align="center" width="10%" class="titulo1" style="padding:1px; border-right:1px solid #CCCCCC;">Dia</td>
					<td align="center" width="20%" class="titulo1" style="padding:1px; border-right:1px solid #CCCCCC;">Ent/Sal</td>
					<td align="center" width="15%" class="titulo1" style="padding:1px; border-right:1px solid #CCCCCC;">Turno</td>
					<td align="center" width="10%" class="titulo1" style="padding:1px; border-right:1px solid #CCCCCC;">Hora Marcada</td>
					<td align="center" width="10%" class="titulo1" style="padding:1px; border-right:1px solid #CCCCCC;">Horas Tarde</td>
					<td align="center" width="10%" class="titulo1" style="padding:1px; border-right:1px solid #CCCCCC;">Minun. Tarde</td>
					<td align="center" width="10%" class="titulo1" style="padding:1px; border-right:1px solid #CCCCCC;">Estado</td>					
				</tr>
				
				
				<?php
					$olistado=new Negocio_clsTablas();
					$rslistado=$olistado->Mostrar_Asistencia($elcodigo,$elmes);			
					while($rowusuario=$rslistado->fetch_array())

					{
				
				?>
				<tr height="20">
					<td align="center" class="titulo" style="padding:1px;border-right:1px solid #CCCCCC;"><?php echo FormatDate($rowusuario['fecha']);?></td>
					<td align="center" class="titulo" style="padding:1px;border-right:1px solid #CCCCCC;"><?php echo $rowusuario['dia'];?></td>
					<td align="center" class="titulo" style="padding:1px;border-right:1px solid #CCCCCC;"><?php echo $rowusuario['horaasiste'];?></td>
					<td align="center" class="titulo" style="padding:1px;border-right:1px solid #CCCCCC;"><?php echo $rowusuario['turno'];?></td>
					<td align="center" class="titulo" style="padding:1px;border-right:1px solid #CCCCCC;"><?php echo $rowusuario['hora'];?></td>
					<td align="center" class="titulo" style="padding:1px;border-right:1px solid #CCCCCC;"><?php echo $rowusuario['horatarde'];?></td>
					<td align="center" class="titulo" style="padding:1px;border-right:1px solid #CCCCCC;"><?php echo $rowusuario['minutotarde'];?></td>
										
					
							
							<td align="center" class="titulo" style="padding:1px;border-right:1px solid #CCCCCC;">
								<?php 
									if ($rowusuario['falta']=='1')
									{
										?>
											FALTA
										<?php		
									}
									else
									{
										if ($rowusuario['justificacion']=='1')
										{
											?>
												JUSTIFICADA
											<?php													
										}
									}
								?>
							
								
							</td>
					
					
				</tr>
					
				<?php
					}
				?>	
				<tr>
					<td colspan="4" align="right"></td>
					<td align="center" class="titulo" style="padding:1px;border-right:1px solid #CCCCCC; font-weight: bold"><?php echo 'DIAS'; ?></td>
					<td align="center" class="titulo" style="padding:1px;border-right:1px solid #CCCCCC; font-weight: bold"><?php echo 'HORAS'; ?></td>
					<td align="center" class="titulo" style="padding:1px;border-right:1px solid #CCCCCC; font-weight: bold"><?php echo 'MINUTOS'; ?></td>
				</tr>
				
				<tr>
					<td colspan="4" align="right"></td>
					<td align="center" class="titulo" style="padding:1px;border-right:1px solid #CCCCCC; font-weight: bold"><?php echo $rscontrol['dia']; ?></td>
					<td align="center" class="titulo" style="padding:1px;border-right:1px solid #CCCCCC; font-weight: bold"><?php echo $rscontrol['horas']; ?></td>
					<td align="center" class="titulo" style="padding:1px;border-right:1px solid #CCCCCC; font-weight: bold"><?php echo $rscontrol['minutos']; ?></td>
				</tr>
			</table>					
		</td>		
	</tr>
</table>				

              
<script>
	printpage();	
</script>