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
		
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- BARRA -->		
<?php
	require_once '../libreria/cuerpo/barra.php';
	require_once '../libreria/cuerpo/menu.php';
	include("../config.php");
	require_once(LOGICA."/negocio.php");
	
	function FormatDate($fecha){
		list($anio,$mes,$dia)=explode("-",$fecha); 
		return $dia."-".$mes."-".$anio; 
	}			
	
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
            <h1 class="m-0 text-dark">Empleados.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item active">Empleados</li>
              <li class="breadcrumb-item"><a href="trabajadornuevo.php?opcion=1" title="Registrar"><button class="btn btn-success btn-sm" type="button">Registrar</button></a></li>
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
                  <th>Apellidos y Nombres</th>
                  <th>Activo</th>
                  <th>Doc/Num</th>
                  <th>Direccion</th>
                  <th>Tipo</th>
                  <th>Cargo</th>
                  <th>Fec. Ini.</th>
                  <th>Fec. Fin.</th>
                  <th>Ver</th>
                  <th>Mod</th>
                  <th>Eli</th>
                </tr>
                </thead>
                <tbody>
					<?php					  
					  	$olistado=new Negocio_clsTrabajador();
						$rslistado=$olistado->Mostrar_Registros(0,10000,$mibusca,$labusca,$miempresa);			
						while($rowusuario=$rslistado->fetch_array())
						{
					?>                   

						<tr>
							<td><?php echo $rowusuario['codigo'];?></td>
							<td>
							<?php
								if ($rowusuario['activo']=='S')	
								{
									?>
										<span class="right badge badge-success" title="Activo">ON</span>
									<?php
								}
								else
								{
									?>	
										<span class="right badge badge-danger" title="No Activo">OFF</span>
									<?php	
								}
							?>
							
							
							<?php echo $rowusuario['apellidos'].' '.$rowusuario['apellidos2'].' '.$rowusuario['nombres'];?></td>
							<td align="center"><?php echo $rowusuario['activo'];?></td>
							<td><?php echo $rowusuario['coddocu'].'-'.$rowusuario['numdocu'];?></td>
							<td><?php echo $rowusuario['direccion'];?></td>
							<td><?php echo $rowusuario['tipo'];?></td>
							<td><?php echo $rowusuario['cargo'];?></td>
							<td><?php echo FormatDate($rowusuario['fini']);?></td>
							<td><?php echo FormatDate($rowusuario['ffin']);?></td>
							<td align="center"><a href="trabajadorver.php?micodigo=<?php echo intval($rowusuario['codigo'])?>" title="Ver"><button class="btn btn-warning" type="button"><i class="nav-icon far fa-eye"></i></button></a></td>
							<td align="center"><a href="trabajadormodificar.php?micodigo=<?php echo intval($rowusuario['codigo'])?>" title="Modificar"><button class="btn btn-primary" type="button"><i class="nav-icon fas fa-edit"></i></button></a></td>
							<td align="center"><a href="trabajadorgrabar.php?opcion=3&micodigo=<?php echo intval($rowusuario['codigo'])?>" title="Eliminar" onclick="return seguro();" title="Eliminar"><button class="btn btn-danger" type="button"><i class="nav-icon fas fa-eraser"></i></button></a></td>
						</tr>
                   <?php
						}  
					?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Apellidos y Nombres</th>
                  <th>Activo</th>
                  <th>Doc/Num</th>
                  <th>Direccion</th>
                  <th>Tipo</th>
                  <th>Cargo</th>
                  <th>Fec. Ini.</th>
                  <th>Fec. Fin.</th>
                  <th>Ver</th>
                  <th>Mod</th>
                  <th>Eli</th>
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