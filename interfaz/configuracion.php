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

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Configuracion.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item active">Configuracion</li>
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
              <div class="card-body p-0">
                <table class="table table-condensed table-responsive">
                  <thead>
                    <tr>
                      <th>Unidad Eject.</th>
                      <th>Entidad</th>
                      <th>Ruc</th>
                      <th>Direccion</th>
                      <th>Email</th>
                      <th>Telefono</th>
                      <th>UIT</th>
                      <th>Sueldo Basico</th>
                      <th>Asig. Fam (%)</th>
                      <th>Cts</th>
                      <th>Dcto x Min.</th>
                      <th>Tope Quinta</th>
                      <th>Mod</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
					  	$olistado=new Negocio_clsConfiguracion();
						$rslistado=$olistado->Mostrar_Registros(0,100,$miempresa,$miperiodo);			
						while($rowusuario=$rslistado->fetch_array())
						{
					?>                   
						<tr>
							<td><?php echo $rowusuario['unidad'];?></td>
							<td><?php echo $rowusuario['nombre'];?></td>
							<td><?php echo $rowusuario['ruc'];?></td>
							<td><?php echo $rowusuario['direccion'];?></td>
							<td><?php echo $rowusuario['email'];?></td>
							<td><?php echo $rowusuario['telefono'];?></td>
							<td><?php echo number_format($rowusuario['uit'],2);?></td>
							<td><?php echo $rowusuario['sueldo'];?></td>
							<td><?php echo $rowusuario['asignacion'];?></td>
							<td><?php echo $rowusuario['cts'];?></td>
							<td><?php echo $rowusuario['minuto'];?></td>
							<td><?php echo number_format($rowusuario['quinta'],2);?></td>
							<td align="center"><a href="configuracionmant.php?opcion=2&elcodigo=<?php echo intval($rowusuario['codigo'])?>" title="Modificar"><button class="btn btn-primary" type="button"><i class="nav-icon fas fa-edit"></i></button></a>
						</tr>
                   <?php
						}
					?>  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
  $(function() {
    //The passed argument has to be at least a empty object or a object with your desired options
    $('table').overlayScrollbars({ });
  });
</script>
</body>
</html>