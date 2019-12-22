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
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ing, Dcto. de Planilla - Seleccione.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item active">Seleccione Planulla</li>   
              
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
                  <th>Planilla</th>
                  <th>Mes</th>
                  <th>Tipo</th>
                  <th>Numero</th>
                  <th>Fecha Inicial</th>
                  <th>Fecha Final</th>
                  <th>Seleccionar</th>
                </tr>
                </thead>
                <tbody>
					<?php					  
					  	$olistado=new Negocio_clsCreacion();
						$rslistado=$olistado->Mostrar_Registros(0,10000,$miempresa,$miperiodo);			
						while($rowusuario=$rslistado->fetch_array())
						{
					?>                   

						<tr>
							<td><?php echo $rowusuario['codigo'];?></td>
							<td><?php echo $rowusuario['planilla'];?></td>
							<td><?php echo $rowusuario['mes'];?></td>
							<td><?php echo $rowusuario['tipo'];?></td>
							<td align="center"><?php echo $rowusuario['numero'];?></td>
							<td align="center"><?php echo FormatDate($rowusuario['fini']);?></td>
							<td align="center"><?php echo FormatDate($rowusuario['ffin']);?></td>
							
							<td align="center"><a href="descuentoproceso.php?micodigo=<?php echo intval($rowusuario['codigo'])?>" title="Seleccionar"><button class="btn btn-success" type="button"><i class="nav-icon fas fa-check"></i></button></a></td>
							
						</tr>
                   <?php
						}  
					?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Planilla</th>
                  <th>Mes</th>
                  <th>Tipo</th>
                  <th>Numero</th>
                  <th>Fecha Inicial</th>
                  <th>Fecha Final</th>
                  <th>Seleccionar</th>
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