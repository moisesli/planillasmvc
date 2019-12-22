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
            <h1 class="m-0 text-dark">Aportes Empleador.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>              
              <li class="breadcrumb-item active">Aportes Empleador</li>              
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
                  <th>Mes</th>
                  <th>Essalud (%)</th>
                  <th>ONP (%)</th>
                  <th>Essalud Cas (%)</th>
                  <th>Soles Cas (S/.)</th>
                  <th>Monto Max. Cas (S/.)</th>
                  <th>Senati (%)</th>
                  <th>SCRT Salud (%)</th>
                  <th>SCRT Pension (S/.)</th>
                  <th>Mod</th>
                </tr>
                </thead>
                <tbody>
					<?php					  
					  	$olistado=new Negocio_clsEmpleador();
						$rslistado=$olistado->Mostrar_Registros(0,100,$miempresa,$miperiodo);
						while($rowusuario=$rslistado->fetch_array())
						{
					?>                   

						<tr>
							<td><?php echo $rowusuario['codigo'];?></td>
							<td><?php echo $rowusuario['mes'];?></td>
							<td align="right"><?php echo $rowusuario['essalud'];?></td>
							<td align="right"><?php echo $rowusuario['onp'];?></td>
							<td align="right"><?php echo $rowusuario['esscas'];?></td>
							<td align="right"><?php echo number_format($rowusuario['solcas'],2);?></td>
							<td align="right"><?php echo number_format($rowusuario['maxcas'],2);?></td>
							<td align="right"><?php echo $rowusuario['senati'];?></td>
							<td align="right"><?php echo $rowusuario['scrtsalud'];?></td>
							<td align="right"><?php echo number_format($rowusuario['scrtpension'],2);?></td>
						
							<td align="center"><a href="empleadormant.php?opcion=2&elcodigo=<?php echo intval($rowusuario['codigo'])?>" title="Modificar"><button class="btn btn-primary" type="button"><i class="nav-icon fas fa-edit"></i></button></a></td>
						</tr>
                   <?php
						}  
					?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>	
                  <th>Mes</th>
                  <th>Essalud (%)</th>
                  <th>ONP (%)</th>
                  <th>Essalud Cas (%)</th>
                  <th>Soles Cas (S/.)</th>
                  <th>Monto Max. Cas (S/.)</th>
                  <th>Senati (%)</th>
                  <th>SCRT Salud (%)</th>
                  <th>SCRT Pension (S/.)</th>
                  <th>Mod</th>
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