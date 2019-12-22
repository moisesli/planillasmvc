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

?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- BARRA -->		
<?php
	require_once '../libreria/cuerpo/barra.php';
	require_once '../libreria/cuerpo/menu.php';
	include("../config.php");
	require_once(LOGICA."/negocio.php");
?>
<script language="Javascript">
function seguro() {
       if ( confirm("Seguro de Eliminar la Liquidacion..?") ) {
            return true;
       } else {
             return false;
       }
}
</script>
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
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liquidaciones.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item active">Liquidaciones</li>   
              <li class="breadcrumb-item"><a href="trabajadorliq.php" title="Registrar"><button class="btn btn-success btn-sm" type="button">Registrar</button></a></li>           
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
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
                  <th>Empleado</th>
                  <th>Fecha</th>
                  <th>Cts</th>
                  <th>Vacac.</th>
                  <th>Gratif.</th>
                  <th>Otros Ing.</th>
                  <th>Aporte. Essalud</th>
                  <th>Dcto. Afp</th>
                  <th>Neto a Pagar</th>
                  <th>Mod</th>
                  <th>Eli</th>
                  <th>Imp</th>
                </tr>
                </thead>
                <tbody>
					<?php					  
						$oTrabajadpr=new Negocio_clsTrabajador();
					  	$olistado=new Negocio_clsLiquidacion();
						$rslistado=$olistado->Mostrar_Registros();			
						while($rowusuario=$rslistado->fetch_array())
						{
							$codtrabajador=$rowusuario['codtrabajador'];
							$rstrabajador=$oTrabajadpr->getROW($codtrabajador);
							
					?>                   

						<tr>
							<td><?php echo $rowusuario['codigo'];?></td>
							<td><?php echo $rstrabajador['apellidos'].' '.$rstrabajador['apellidos2'].' '.$rstrabajador['nombres']; ?></td>
							<td align="center"><?php echo FormatDate($rowusuario['fecha']);?></td>
							<td align="right"><?php echo $rowusuario['cts'];?></td>
							<td align="right"><?php echo $rowusuario['vacaciones'];?></td>
							<td align="right"><?php echo $rowusuario['grati'];?></td>
							<td align="right"><?php echo $rowusuario['otros'];?></td>
							<td align="right"><?php echo $rowusuario['essalud'];?></td>
							<td align="right"><?php echo $rowusuario['afp'];?></td>
							<td align="right"><?php echo $rowusuario['neto'];?></td>
							
							<td align="center"><a href="liquidacionmodificar.php?opcion=2&micodigo=<?php echo intval($rowusuario['codtrabajador'])?>&elcodliquidacion=<?php echo intval($rowusuario['codigo'])?>" title="Modificar"><button class="btn btn-primary" type="button"><i class="nav-icon fas fa-edit"></i></button></a></td>
							
							<td align="center"><a href="liquidacioneliminar.php?opcion=3&micodigo=<?php echo intval($rowusuario['codigo'])?>" title="Eliminar" onclick="return seguro();" title="Eliminar"><button class="btn btn-danger" type="button"><i class="nav-icon fas fa-eraser"></i></button></a></td>
							
							<td align="center"><button class="btn btn-warning" type="button" onclick="javascript:AbrirCentrado('liquidacionimprimir.php?micodigo=<?php echo intval($rowusuario['codtrabajador'])?>&elcodliquidacion=<?php echo intval($rowusuario['codigo'])?>','','1024','600','');"><i class="nav-icon fas fa-print"></i></button></td>
							
						</tr>
                   <?php
						}  
					?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Empleado</th>
                  <th>Fecha</th>
                  <th>Cts</th>
                  <th>Vacac.</th>
                  <th>Gratif.</th>
                  <th>Otros Ing.</th>
                  <th>Aporte. Essalud</th>
                  <th>Dcto. Afp</th>
                  <th>Neto a Pagar</th>
                  <th>Mod</th>
                  <th>Eli</th>
                  <th>Imp</th>
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