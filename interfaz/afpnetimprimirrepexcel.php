<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=afpexcel.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<?php
	include("../config.php");
	require_once(LOGICA."/negocio.php");
?>	
<?php
	$elcodplanilla=$_GET['micodigo'];
	$oPlanilla=new Negocio_clsPlanilla();	
// BUSCAR EN CREACION Y VER EL AFECTADO
	$oTablas=new Negocio_clsTablas();
	$oPlanilla1=new Negocio_clsCreacion();
	$rsPlanilla=$oPlanilla1->getROW($elcodplanilla);
	// PROCESO DE MONTO AFECTO
	$numafecto=0;
	if ($rsPlanilla['ok1']=='S')
	{
		$numafecto=$numafecto+1;
	}
	if ($rsPlanilla['ok2']=='S')
	{
		$numafecto=$numafecto+1;
	}
	if ($rsPlanilla['ok3']=='S')
	{
		$numafecto=$numafecto+1;
	}
	if ($rsPlanilla['ok4']=='S')
	{
		$numafecto=$numafecto+1;
	}
	if ($rsPlanilla['ok5']=='S')
	{
		$numafecto=$numafecto+1;
	}
	if ($rsPlanilla['ok6']=='S')
	{
		$numafecto=$numafecto+1;
	}
	//echo $numafecto;

$rslistado=$oPlanilla->Mostrar_Registros_Todos_Trabajadores_Planilla($elcodplanilla);	
$a=0;
?>
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
<?php
while($rowtrabajador=$rslistado->fetch_array())
{
	$a++;
		// OBTENER EL TOTAL AFECTO		
		if ($rsPlanilla['ok1']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso1'];
		}
		if ($rsPlanilla['ok2']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso2'];
		}
		if ($rsPlanilla['ok3']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso3'];
		}
		if ($rsPlanilla['ok4']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso4'];
		}
		if ($rsPlanilla['ok5']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso5'];
		}
		if ($rsPlanilla['ok6']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso6'];
		}	
		if ($rsPlanilla['ok7']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso7'];
		}	
		if ($rsPlanilla['ok8']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso8'];
		}	
		if ($rsPlanilla['ok9']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso9'];
		}	
		if ($rsPlanilla['ok10']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso10'];
		}	
		if ($rsPlanilla['ok11']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso11'];
		}	
		if ($rsPlanilla['ok12']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso12'];
		}	
		if ($rsPlanilla['ok13']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso13'];
		}	
		if ($rsPlanilla['ok14']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso14'];
		}	
		if ($rsPlanilla['ok15']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso15'];
		}	
		if ($rsPlanilla['ok16']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso16'];
		}	
		if ($rsPlanilla['ok17']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso17'];
		}	
		if ($rsPlanilla['ok18']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso18'];
		}	
		if ($rsPlanilla['ok19']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso19'];
		}	
		if ($rsPlanilla['ok20']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso20'];
		}	
		if ($rsPlanilla['ok21']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso21'];
		}	
		if ($rsPlanilla['ok22']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso22'];
		}	
		if ($rsPlanilla['ok23']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso23'];
		}	
		if ($rsPlanilla['ok24']=='S')
		{
			$totalafecto=$totalafecto+$rowtrabajador['ingreso24'];
		}	
		// BUSCAR DATOS DEL TRABAJADOR
		$rsEmpleados=$oTablas->BuscarEmpleados($rowtrabajador['codtrabajador']);	
		//echo $rowtrabajador['mes'];
		//////////////////////////////
		// TIPO DE DOCUMENTO
		$rsTipodoc=$oTablas->BuscarDocumento($rsEmpleados['coddocu']);	
		$elcoddocu=$rsTipodoc['coddocumento'];
		// BUSCAR TIPO DE TRABAJADOR
		$rsTipotrabajador=$oTablas->BuscarTipotrabajador($rsEmpleados['tipo']);	
		$eltipotrabajador=$rsTipotrabajador['inicial'];
		// BUSCAR MES
		$rsMimes=$oTablas->BuscarMes($rowtrabajador['mes']);	
		$elmesplani=$rsMimes['otro'];
		/////////////
		$mimesvence=substr($rsEmpleados['ffin'],5,2);
		$mimesinicia=substr($rsEmpleados['fini'],5,2);
		if ($elmesplani==$mimesvence)
		{
			$RL1='N';
			$RL3='S';
		}
		else
		{
			$RL1='S';
			$RL3='N';
		}
		if ($elmesplani==$mimesinicia)
		{
			$RL2='S';
		}
		else
		{
			$RL2='N';
		}
	?>
		<tr>
			<td><?php echo $a; ?></td>
			<td><?php echo $rowtrabajador['cupps']; ?></td>
			<td><?php echo $elcoddocu; ?></td>
			<td><?php echo $rowtrabajador['numdocu']; ?></td>
			<td><?php echo $rowtrabajador['apellidos']; ?></td>
			<td><?php echo $rowtrabajador['apellidos2']; ?></td>
			<td><?php echo $rowtrabajador['nombres']; ?></td>
			<td><?php echo $RL1; ?></td>
			<td><?php echo $RL2; ?></td>
			<td><?php echo $RL3; ?></td>
			<td><?php echo ''; ?></td>
			<td><?php echo $totalafecto; ?></td>
			<td><?php echo '0'; ?></td>
			<td><?php echo '0'; ?></td>
			<td><?php echo '0'; ?></td>
			<td><?php echo ''; ?></td>
			<td><?php echo $eltipotrabajador; ?></td>
			
		</tr>
	<?php
}
?>
</table>