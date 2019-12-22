<?php session_start();
	$miusuario=$_SESSION["apellidos"];
	$misiglas=$_SESSION["usuario"];
	$micodusu=$_SESSION['codigo'];	
	$miempresa=$_SESSION['codempresa'];	
	$miperiodo=$_SESSION['periodo'];
	$mitipo=$_SESSION['tipo'];
	if(!($_SESSION["accesar"] == "OK")){
		session_destroy();
		echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=../index.php'>";	
	}

	require_once '../libreria/cuerpo/cabeza1.php';
	
	include("../config.php");

	require_once(LOGICA."/negocio.php");
	require_once(HERRAMIENTAS_PHP."/clsGeneral.php");
	$oGeneral=new clsGeneral();			

	$elcodigo=$_GET['micodigo'];	
	$elmes=$_GET['mimes'];	
	// BUSCAR EL TRABAJADOR
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

	//$mifechahoy=date('Y-m-d');
	//$oUsuario=new Negocio_clsDescuento();
	//$olistado=new Negocio_clsTablas();
	//$rslistado=$olistado->Mostrar_Asistencia($elcodigo,$elmes);			
	//while($rowusuario=$rslistado->fetch_array())

	//{
	//	$micodasiste=$rowusuario['codigo'];

//		$mifechaasis=$rowusuario['fecha'];

//		if ($mifechaasis<$mifechahoy and $rowusuario['justificacion']==0)
//		{
//			if ($rowusuario['hora']=='')
//			{									
//				$intError=$oUsuario->Actualizarfalta2($micodasiste,$horatrabajo);									
//			}
//		}
//	}

?>
<script language = "javascript">
	function AbrirCentrado(Url,NombreVentana,width,height,extras)
	{
		var largo = width;
		var altura = height;
		var adicionales= extras;
		var top = (screen.height-altura)/2;
		var izquierda = (screen.width-largo)/2; nuevaVentana=window.open(''+ Url + '',''+ NombreVentana + '','width=' + largo + ',height=' + altura + ',top=' + top + ',left=' + izquierda + ',features=' + adicionales + ''); 
		nuevaVentana.focus();
	}
</script>

<script type="text/javascript">
function seguro() {
       if ( confirm("Seguro de Registrar la Falta..?") ) {
            return true;
       } else {
             return false;
       }
}	
</script>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- BARRA -->		
<?php
	require_once '../libreria/cuerpo/barraasistencia.php';
	require_once '../libreria/cuerpo/menuasistencia.php';
	include("../config.php");
	
?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Procesar Asistencia - <strong style="color: #9A0204"><?php echo $rsTrabajador['apellidos'].' '.$rsTrabajador['apellidos2'].' '.$rsTrabajador['nombres'].' - '.$elmes;?></strong></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="asistencia.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="asistenciaver.php">Empleados</a></li>
              <li class="breadcrumb-item"><a href="asistenciaprocesar.php?micodigo=<?php echo $elcodigo; ?>">Meses</a></li>
              <li class="breadcrumb-item"><button class="btn btn-success btn-sm" type="button" onclick="javascript:AbrirCentrado('asistenciarep.php?elmes=<?php echo $elmes; ?>&eltrabajador=<?php echo $elcodigo; ?>&elperiodo=<?php echo $miperiodo; ?>','','1024','600','');">Imprimir</button></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

		<div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Fecha</th>      
                  <th>Dia</th>      
                  <th>Hora Ent/Sal</th>
                  <th>Turno</th>
                  <th>Hora Marcada</th>
                  <th>Horas Tarde</th>
                  <th>Minutos Tarde</th>
                  <th>Estado</th>
                  <th>Registrar</th>
                  <th>Falta</th>
                </tr>
                </thead>
                <tbody>
					<?php	
												
					  	$olistado=new Negocio_clsTablas();
						$rslistado=$olistado->Mostrar_Asistencia($elcodigo,$elmes);			
						while($rowusuario=$rslistado->fetch_array())
							
						{
							$micodasiste=$rowusuario['codigo'];
							
							$mivar1=$rowusuario['horaasiste'];
							$mivar2=$rowusuario['hora'];
							$h1=intval(substr($mivar1,0,2));
							$m1=intval(substr($mivar1,3,2));
							$h2=intval(substr($mivar2,0,2));
							$m2=intval(substr($mivar2,3,2));
							
							if ($rowusuario['falta']=='0' and $rowusuario['justificacion']=='0')
							{
								if ($h1==$h2)
								{
									$horas=0;
									if ($m2>$m1)
									{
										$miminuto=$m2-$m1;
									}
									else
									{
										$miminuto=0;
									}
								}
								else
								{
									if ($h2<$h1)
									{
										$horas=0;
										$miminuto=0;
									}
									else
									{
										$mical=60-$m1;				// 15 minutos
										$h1=$h1+1;
										$mical1=$m2;
										$miminuto=$mical+$mical1;
										for ($i = $h1; $i <= $h2; $i++)
										{
											$con++;
										}			
										$horas=$con-1;
										if ($miminuto>=60)
										{
											$mival=$miminuto/60;
											$lavoz=intval($mival);
											$por=$lavoz*60;
											$miminuto=$miminuto-$por;
											$horas=$horas+$lavoz;
										}
									}
								}
							}	
							else
							{
								if ($rowusuario['falta']=='1' and $rowusuario['justificacion']=='0')
									{
										$horas=$horatrabajo;
										$totalminutos=$totalminutos;
									}								
								if ($rowusuario['falta']=='0' and $rowusuario['justificacion']=='1')
									{
										$horas=$horas;
										$totalminutos=$totalminutos;
									}								
								
							}
							
							$totalhoras=$totalhoras+$horas;
							$totalminutos=$totalminutos+$miminuto;	
							
							$rsokok=$olistado->Ponertardanza($rowusuario['codigo'],$horas,$miminuto);
							
					?>                   

						<tr>
							<td><?php echo $rowusuario['codigo'];?></td>
							<td align="center"><?php echo FormatDate($rowusuario['fecha']);?></td>							
							<td align="center"><?php echo $rowusuario['dia'];?></td>
							<td align="center"><?php echo $rowusuario['horaasiste'];?></td>
							<td align="center"><?php echo $rowusuario['turno'];?></td>
							<td align="center"><?php echo $rowusuario['hora'];?></td>
							<td align="center"><?php echo $horas;?></td>
							<td align="center"><?php echo $miminuto;?></td>
							
							<td align="center">
								<?php 
									if ($rowusuario['falta']=='1')
									{
										?>
											<span class="right badge badge-danger">FALTA</span>
										<?php		
									}
									else
									{
										if ($rowusuario['justificacion']=='1')
										{
											?>
												<span class="right badge badge-warning">JUSTIFICADA</span>
											<?php													
										}
									}
								?>
							
								
							</td>
							
							<td align="center"><a href="asistenciamant.php?mimes=<?php echo $elmes; ?>&micodigo=<?php echo $elcodigo; ?>&micodasiste=<?php echo $rowusuario['codigo'];?>&mihoratrabajo=<?php echo $horatrabajo;?> " title="Procesar"><button class="btn btn-success" type="button"><i class="nav-icon fas fa-check"></i></button></a></td>
							
							<td align="center"><a href="asistenciafalta.php?mimes=<?php echo $elmes; ?>&micodigo=<?php echo $elcodigo; ?>&micodasiste=<?php echo $rowusuario['codigo'];?>" title="Registrar Falta"><button class="btn btn-danger" type="button" onClick="return seguro();"><i class="nav-icon fas fa-minus-circle"></i></button></a></td>
							
						</tr>
					   <?php
							}  
							//$totalhoras=11;
					
							if ($totalminutos>=60)
							{
								$mival=$totalminutos/60;
								$lavoz=intval($mival);
								$por=$lavoz*60;
								$totalminutos=$totalminutos-$por;
								$totalhoras=$totalhoras+$lavoz;
							}
					
							if ($totalhoras>=$horatrabajo)
							{
								$mival=$totalhoras/$horatrabajo;
								$lavoz=intval($mival);

								$por=$lavoz*$horatrabajo;

								$totalhoras=$totalhoras-$por;

								$totdias=$totdias+$lavoz;
							}
						
							$desdia=$totdias*$misueldodia;
							$deshora=$totalhoras*$misueldohora;
							$desmin=$totalminutos*$misueldominuto;
					
							$rscontrol=$olistado->ContarControl($miperiodo,$elmes,$elcodigo);		
							if ($rscontrol['total']=='0')
							{
								$rscontroles=$olistado->AgregarControl($miperiodo,$elmes,$elcodigo,$totdias,$totalhoras,$totalminutos,$desdia,$deshora,$desmin);
							}
							else
							{
								$rscontroles=$olistado->ModificarControl($miperiodo,$elmes,$elcodigo,$totdias,$totalhoras,$totalminutos,$desdia,$deshora,$desmin);
							}
						
						?>
               
               
                </tbody>
                <tfoot>
                <tr>
                  <td colspan="5" align="right" style="color: #E40206; font-weight: bold; font-size: 18px">Total Faltas y Tardanzas : </td>                  
                  <td style="color: #E40206; font-weight: bold; font-size: 18px" align="center"><?php echo 'Dias : '.intval($totdias);?></td>
                  <td style="color: #E40206; font-weight: bold; font-size: 18px" align="center"><?php echo 'Horas : '.intval($totalhoras);?></td>
                  <td style="color: #E40206; font-weight: bold; font-size: 18px" align="center"><?php echo 'Minutos : '.intval($totalminutos);?></td>
                  <td colspan="3"></td>                  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>           
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <!-- /.row -->
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>    
    
            
    
  </div>
<?php
	require_once '../libreria/cuerpo/abajo.php';	
?>
</div>
<?php
	require_once '../libreria/cuerpo/pie1.php';
?>
</body>
</html>