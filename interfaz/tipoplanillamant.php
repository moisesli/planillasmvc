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
<script type="text/javascript">
function seguro() {
       if ( confirm("Seguro de Grabar los Datos..?") ) {
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
            <h1 class="m-0 text-dark">Tipos de Planillas.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="tipoplanilla.php">Tipo de Planilla</a></li>
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
         <div class="col-md-3">	
         </div>         
          <div class="col-md-6">
				<?php
					$miopcion=intval($_GET['opcion']);
					//echo $miopcion;
					switch ($miopcion){
					// OPCION 1 NUEVO
					case 1:
				?>       
						<div class="card card-info">
						  <div class="card-header">
							<h3 class="card-title"><a href="tipoplanilla.php" title="Regresar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Tipo de Planilla - Nuevo.</h3>                                
						  </div>

						  <form name="formulario" action="tipoplanillagrabar.php?opcion=1" method="post">						   
							<div class="card-body">
							  <div class="row">
								<label class="col-sm-3 col-form-label">Tipo de Planilla</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txttipoplanilla" required autofocus>
								</div>
								<label class="col-sm-3 col-form-label">Inicial</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtinicial" required>
								</div>
								<label class="col-sm-3 col-form-label">Sujeto a Descuento</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento" required>
								</div>
							  </div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
							  <button type="submit" class="btn btn-primary" onclick="return seguro();">Grabar</button>
							  <a href="tipoplanilla.php"><button type="button" class="btn btn-danger float-right">Cancelar</button></a>
							</div>                
						  </form>
						</div>  				
   				<?php
				break;
				}
				?>	                          

				<?php
					$miopcion=intval($_GET['opcion']);
					//echo $miopcion;
					switch ($miopcion){
					// OPCION 1 NUEVO
					case 2:
						$micod=$_GET['micodigo'];
						$olistado=new Negocio_clsTipoplanilla();
						$rowusuario=$olistado->getROW($micod);
				?>          
						<div class="card card-info">
						  <div class="card-header">
							<h3 class="card-title"><a href="tipoplanilla.php" title="Regresar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Tipo de Planilla - Modificar.</h3>                                
						  </div>

						  <form name="formulario" action="tipoplanillagrabar.php?opcion=2" method="post">
						   <input type="hidden" name="txtcodigo" value="<?php echo $micod; ?>" class="ingreso" size="40"/>
							<div class="card-body">
							  <div class="row">
								<label class="col-sm-3 col-form-label">Tipo de Planilla</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txttipoplanilla" value="<?php echo $rowusuario['nombre']; ?>" required autofocus>
								</div>
								<label class="col-sm-3 col-form-label">Inicial</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtinicial" value="<?php echo $rowusuario['inicial']; ?>" required>
								</div>
								<label class="col-sm-3 col-form-label">Sujeto a Descuento</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento"value="<?php echo $rowusuario['descuento']; ?>" required>
								</div>
								
							  </div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
							  <button type="submit" class="btn btn-primary" onclick="return seguro();">Grabar</button>
							  <a href="tipoplanilla.php"><button type="button" class="btn btn-danger float-right">Cancelar</button></a>
							</div>                
						  </form>
						</div>
				<?php
				break;
				}
				?>	 
          </div>
         <div class="col-md-3">	
         </div>
        </div>
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