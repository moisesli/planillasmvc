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
	require_once(HERRAMIENTAS_PHP."/clsGeneral.php");
	$oGeneral=new clsGeneral();			
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
            <h1 class="m-0 text-dark">Usuarios.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="usuario.php">Usuarios</a></li>
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
							<h3 class="card-title"><a href="usuario.php" title="Regresar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Usuario - Nuevo.</h3>                                
						  </div>

						  <form name="formulario" action="usuariograbar.php?opcion=1" method="post">						   
							<div class="card-body">
							  <div class="row">
								<label class="col-sm-3 col-form-label">Apellidos y Nombres</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtapellidos" required autofocus>
								</div>
							  
								<label class="col-sm-3 col-form-label">Tipo</label>
								<div class="col-sm-9">
								  <select name="txtdependencia" class="form-control" required>
										<?php
											$oDepedencia= new Negocio_clsUsuario();		
											$rsTerminal=$oDepedencia->Mostrar_Registros_Tipo();
											echo $oGeneral->Mostrar_Combo_Seleccione($rsTerminal, 0,1,1);
										?>
									</select>
								</div>
								<label class="col-sm-3 col-form-label">Usuario</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtusuario" required>
								</div>
								<label class="col-sm-3 col-form-label">Password</label>
								<div class="col-sm-9">
								  <input type="password" class="form-control" name="txtclave" required>
								</div>
							  
							  </div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
							  <button type="submit" class="btn btn-primary" onclick="return seguro();">Grabar</button>
							  <a href="usuario.php"><button type="button" class="btn btn-danger float-right">Cancelar</button></a>
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
						$olistado=new Negocio_clsUsuario();
						$rowusuario=$olistado->getROW($micod);
				?>          
						<div class="card card-info">
						  <div class="card-header">
							<h3 class="card-title"><a href="usuario.php" title="Regresar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Usuario - Modificar.</h3>                                
						  </div>

						  <form name="formulario" action="usuariograbar.php?opcion=2" method="post">
						   <input type="hidden" name="txtcodigo" value="<?php echo $micod; ?>" class="ingreso" size="40"/>
							<div class="card-body">
							  <div class="row">
							  
								<label class="col-sm-3 col-form-label">Apellidos y Nombres</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtapellidos" value="<?php echo $rowusuario['apellidos']; ?>" required autofocus>
								</div>
							  
								<label class="col-sm-3 col-form-label">Tipo</label>
								<div class="col-sm-9">
								  <select name="txtdependencia" class="form-control" required>
										<?php
											$oDepedencia= new Negocio_clsUsuario();		
											$rsTerminal=$oDepedencia->Mostrar_Registros_Tipo();
											echo $oGeneral->Mostrar_Combo_Seleccione($rsTerminal, 0,1,$rowusuario['tipo']);
										?>
									</select>
								</div>
								<label class="col-sm-3 col-form-label">Usuario</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtusuario" value="<?php echo $rowusuario['usuario']; ?>" required>
								</div>
								<label class="col-sm-3 col-form-label">Password</label>
								<div class="col-sm-9">
								  <input type="password" class="form-control" name="txtclave" value="<?php echo $rowusuario['clave']; ?>" required>
								</div>
							  
							  
							<div class="card-footer">
							  <button type="submit" class="btn btn-primary" onclick="return seguro();">Grabar</button>
							  <a href="usuario.php"><button type="button" class="btn btn-danger float-right">Cancelar</button></a>
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