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

	function FormatDate($fecha){
		list($anio,$mes,$dia)=explode("-",$fecha); 
		return $dia."-".$mes."-".$anio; 
	}			

	require_once '../libreria/cuerpo/barra.php';
	require_once '../libreria/cuerpo/menu.php';
	include("../config.php");
	require_once(LOGICA."/negocio.php");
	
	$laplanila=$_GET['micodigo'];
	//echo $laplanila;
	// BUSCAR PLANILLA
	$oPlanilla=new Negocio_clsCreacion();
	$rsPlanilla=$oPlanilla->getROW($laplanila);
	//////////////////
	// BUSCAR TIPO TRABAJADOR PARA LOS DIAS
	$tipoplanilla=$rsPlanilla['planilla'];

	$oTipo=new Negocio_clsTipotrabajador();
	$rsTipo=$oTipo->Buscar_Tipo($miempresa,$rsPlanilla['tipo']);
	$losdias=$rsTipo['dias'];
	//////////////////	
	// CONTAR SI YA ESTAN REFGISTRADOS LOS TRABAJADORES PARA LOS DESCUENTOS
	$oDescuento=new Negocio_clsDescuento();
	$rscontardscto=$oDescuento->Contar_Registros($laplanila);
	$numtrabajador=intval($rscontardscto['total']);
	
	if ($tipoplanilla=='VACACIONES')//	echo $numtrabajador; 
	{
		$rsDsctoTrabajador=$oDescuento->Mostrar_Trabajadores_Descuento1($miempresa,$rsPlanilla['tipo']);
		while($rowtrabajador=$rsDsctoTrabajador->fetch_array())
			{
				// BUSCAR AL TRABAJADOR
				$rptaBuscarTrabajador=$oDescuento->Buscar_Descuento1($laplanila,$rowtrabajador['codigo']);
				if ($rptaBuscarTrabajador['mitotal']==0)
				{
					//echo $rowtrabajador['codigo'];
					$rptaAgregarTrabajador=$oDescuento->Agregar_Trabajador($laplanila,$rowtrabajador['codigo'],$rsTipo['dias']);	
				}
				
			}
	}
	else
	{
		
		$rsDsctoTrabajador=$oDescuento->Mostrar_Trabajadores_Descuento($miempresa,$rsPlanilla['tipo']);

			while($rowtrabajador=$rsDsctoTrabajador->fetch_array())
			{
				// BUSCAR AL TRABAJADOR
				$rptaBuscarTrabajador=$oDescuento->Buscar_Descuento1($laplanila,$rowtrabajador['codigo']);
				if ($rptaBuscarTrabajador['mitotal']==0)
				{
					//echo $rowtrabajador['codigo'];
					$rptaAgregarTrabajador=$oDescuento->Agregar_Trabajador($laplanila,$rowtrabajador['codigo'],$rsTipo['dias']);	
				}
				
			}
	}
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<script language="Javascript">
function seguro() {
       if ( confirm("Seguro de Eliminar el Registro - Se eliminara todo lo relacionado a esta Registro..?") ) {
            return true;
       } else {
             return false;
       }
}
</script>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0 text-dark">Ing. Dctos. Planilla - <strong style="color: #9A0204"><?php echo $rsPlanilla['planilla'].' - '.$rsPlanilla['mes'].' - '.$rsPlanilla['tipo'].' - '.$rsPlanilla['numero'];?></strong></h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="descuento.php">Seleccionar Planilla</a></li>   
              <li class="breadcrumb-item">Seleccionar Trabajador</li> 
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
<section class="content">
      <div class="container-fluid">
		<?php
		  	if ($rsPlanilla['planilla']=='REMUNERACIONES')
			{
		?>       
        <div class="row">
          <div class="col-md-12">
			<a href="asistenciasistema.php?micodigo=<?php echo $laplanila;?>&elperiodo=<?php echo $miperiodo;?>&elmes=<?php echo $rsPlanilla['mes'];?>" title="Asistencia"><button class="btn btn-warning btn-sm" type="button">Asistencia del Sistema</button></a>          
      	    <a href="asistenciahuella.php" title="Asistencia"><button class="btn btn-success btn-sm" type="button">Asistencia de Huella Digital</button></a>
      	    <br><br>   
       	  </div>
       	  
       	</div>  			
		<?php
			}  
		?>       
       
        <div class="row">
          <div class="col-md-12">

		<div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Trabajador</th>
                  <th>Dias Trab.</th>
                  <th>Faltas</th>
                  <th>Total Ingresos sin Asig. Familiar</th>
                  <th>Total Dctos. Sin Aportes</th>
                  <th>Registrar</th>
                </tr>
                </thead>
                <tbody>
					<?php					  
					  	$olistado=new Negocio_clsDescuento();
						$rslistado=$olistado->Mostrar_Registros(0,1000,$laplanila);			
						while($rowusuario=$rslistado->fetch_array())
						{
							$codtrabajador=$rowusuario['codtrabajador'];
								if ($tipoplanilla=='VACACIONES')//	echo $numtrabajador; 
								{
									$rstrabajador=$olistado->SumarIngresos($laplanila,$codtrabajador);
									$mitotal=$rstrabajador['mitotal'];
								}	
								else
								{
									$rstrabajador=$olistado->SumarIngresos($laplanila,$codtrabajador);
									$mitotal=$rstrabajador['mitotal'];
								}
							// SU}MA DE INGRESOS BRUTOS
							
							$rstrabajadordes=$olistado->SumarDescuentos($laplanila,$codtrabajador);
							$mitotaldes=$rstrabajadordes['mitotal'];
					?>                   

						<tr>
							<td><?php echo $rowusuario['codtrabajador'];?></td>
							<td><?php echo $rowusuario['apellidos'].' '.$rowusuario['apellidos2'].' '.$rowusuario['nombres'];?></td>
							<td align="center"><?php echo $rowusuario['dias'];?></td>
							<td align="center"><?php echo $rowusuario['falta'];?></td>
							<td align="right"><?php echo number_format($mitotal,2);?></td>
							<td align="right"><?php echo number_format($mitotaldes,2);?></td>
							
							<td align="center"><a href="descuentoprocesomodificar.php?micodigo=<?php echo intval($rowusuario['codigo']); ?>&laplanilla=<?php echo $laplanila; ?>" title="Ver"><button class="btn btn-info" type="button"><i class="nav-icon far fa-eye"></i></button></a></td>
						
								
						</tr>
                   <?php
						}  
					?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Trabajador</th>
                  <th>Dias Trab.</th>
                  <th>Faltas</th>
                  <th>Total Ingresos sin Asig. Familiar</th>
                  <th>Total Dctos. Sin Aportes</th>
                  <th>Registrar</th>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
	require_once '../libreria/cuerpo/abajo.php';	
?>
</div>
<!-- ./wrapper -->
<?php
	require_once '../libreria/cuerpo/pie1.php';
?>
<script>
  $(function () {
    $("#example1").DataTable();
    //$('#example2').DataTable({
      //"paging": true,
      //"lengthChange": false,
      //"searching": false,
      //"ordering": true,
      //"info": true,
      //"autoWidth": false,
    //});
  });
</script>
</body>
</html>