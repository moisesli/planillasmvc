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
            <h1 class="m-0 text-dark">Tipo de Trabajador.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="tipotrabajador.php">Tipo de Trabajador</a></li>
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
							<h3 class="card-title"><a href="tipotrabajador.php" title="Regresar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Tipo de Trabajador - Nuevo.</h3>                                
						  </div>

						  <form name="formulario" action="tipotrabajadorgrabar.php?opcion=1" method="post">						   
							<div class="card-body">
							  <div class="row">
								<label class="col-sm-3 col-form-label">Tipo de Trabajador</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txttipo" required>
								</div>
								<label class="col-sm-3 col-form-label">Hora Ent. (M)-(HH:MM)</label>
								<div class="col-sm-9">								  
								  <input type="text" class="form-control" name="txtentradam" data-inputmask='"mask": "99:99"' data-mask>
								</div>
								<label class="col-sm-3 col-form-label">Hora Ent. (T)-(HH:MM)</label>
								<div class="col-sm-9">								  
								  <input type="text" class="form-control" name="txtentradat" data-inputmask='"mask": "99:99"' data-mask>
								</div>
								<label class="col-sm-3 col-form-label">Dias</label>
								<div class="col-sm-9">
								  <input type="number" class="form-control" name="txtdias" required>
								</div>
								<label class="col-sm-3 col-form-label">Tipo</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtinicial" required>
								</div>
								<label class="col-sm-3 col-form-label">Horas Trabajo</label>
								<div class="col-sm-9">
								  <input type="number" class="form-control" name="txttrabajo" required>
								</div>
								
							  </div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
							  <button type="submit" class="btn btn-primary" onclick="return seguro();">Grabar</button>
							  <a href="tipotrabajador.php"><button type="button" class="btn btn-danger float-right">Cancelar</button></a>
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
						$olistado=new Negocio_clsTipotrabajador();
						$rowusuario=$olistado->getROW($micod);
						$time = time();
						$lahora=date("H:i",$time);
						$eslahora=$rowusuario['entradat'];
						//echo $lahora;
						//echo $eslahora;
						//$descuento=$lahora-$eslahora;
						$hora = time()-$eslahora;
						//echo RestarHoras($lahora,$eslahora);
				?>          
						<div class="card card-info">
						  <div class="card-header">
							<h3 class="card-title"><a href="tipotrabajador.php" title="Regresar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Tipo de Trabajador - Modificar.</h3>                                
						  </div>

						  <form name="formulario" action="tipotrabajadorgrabar.php?opcion=2" method="post">
						   <input type="hidden" name="txtcodigo" value="<?php echo $micod; ?>" class="ingreso" size="40"/>
							<div class="card-body">
							  <div class="row">
								<label class="col-sm-3 col-form-label">Tipo de Trabajador</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txttipo" value="<?php echo $rowusuario['nombre']; ?>" required>
								</div>
								<label class="col-sm-3 col-form-label">Hora Ent. (M)-(HH:MM)</label>
								<div class="col-sm-9">								  
								  <input type="text" class="form-control" name="txtentradam" value="<?php echo $rowusuario['entradam']; ?>" data-inputmask='"mask": "99:99"' data-mask>
								</div>
								<label class="col-sm-3 col-form-label">Hora Ent. (T)-(HH:MM)</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtentradat" value="<?php echo $rowusuario['entradat']; ?>" data-inputmask='"mask": "99:99"' data-mask>
								</div>
								<label class="col-sm-3 col-form-label">Dias</label>
								<div class="col-sm-9">
								  <input type="number" class="form-control" name="txtdias" value="<?php echo $rowusuario['dias']; ?>" required>
								</div>
								<label class="col-sm-3 col-form-label">Tipo</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtinicial" value="<?php echo $rowusuario['inicial']; ?>" required>
								</div>
								<label class="col-sm-3 col-form-label">Horas Trabajo</label>
								<div class="col-sm-9">
								  <input type="number" class="form-control" name="txttrabajo" value="<?php echo $rowusuario['trabajo']; ?>" required>
								</div>
								
								
							  </div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
							  <button type="submit" class="btn btn-primary" onclick="return seguro();">Grabar</button>
							  <a href="tipotrabajador.php"><button type="button" class="btn btn-danger float-right">Cancelar</button></a>
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