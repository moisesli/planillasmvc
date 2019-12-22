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
	$micodigo=$_GET['micodigo'];
	$oafp=new Negocio_clsAfp();
	$rowafp=$oafp->getROW($micodigo);
	
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
            <h1 class="m-0 text-dark">Afp - Aportes - <strong style="font-size: 28px; color: #940507"><?php echo $rowafp['nombre']; ?></strong></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="afp.php">Afp.</a></li>
              <li class="breadcrumb-item"><a href="afpaportes.php?opcion=3&micodigo=<?php echo $micodigo; ?>">Afp - Aportes</a></li>              
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
							<h3 class="card-title"><a href="afpaportes.php?opcion=3&micodigo=<?php echo $micodigo; ?>" title="Regresar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Afp Aportes - Nuevo.</h3>                            
						  </div>
						  <form name="formulario" action="afpaportegrabar.php?opcion=1" method="post">						   
						  <input type="hidden" name="txtelcodigo" value="<?php echo $elcodigo; ?>">
							<div class="card-body">
							  <div class="row">
							  
								<label class="col-sm-3 col-form-label">Mes</label>
								<div class="col-sm-9">
										<select name="txtmes" class="form-control">
											<?php
											$oMes= new Negocio_clsAfp();													
											$rsMes=$oMes->Mostrar_Registros_Mes();
											echo $oGeneral->Mostrar_Combo_Seleccione($rsMes, 0,0);
											?>
										</select>								  
								</div>
								<label class="col-sm-3 col-form-label">Aporte Obligatorio (%)</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtaporte" required>
								</div>
								<label class="col-sm-3 col-form-label">Prima de Seguro (%)</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtprima" required>
								</div>
								<label class="col-sm-3 col-form-label">Comision Remun. (%)</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtcomision" required>
								</div>
								<label class="col-sm-3 col-form-label">Comision Flujo (%)</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtflujo" required>
								</div>
								<label class="col-sm-3 col-form-label">Tope (S/.)</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txttope" required>
								</div>
							  
							  </div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
							  <button type="submit" class="btn btn-primary" onclick="return seguro();">Grabar</button>
							  <a href="afpaportes.php?opcion=3&micodigo=<?php echo $micodigo; ?>"><button type="button" class="btn btn-danger float-right">Cancelar</button></a>
							</div>                
						  </form>
						</div>  				
   				<?php
				break;
				}
					$miopcion=intval($_GET['opcion']);
					//echo $miopcion;
					switch ($miopcion){
					// OPCION 1 NUEVO
					case 2:
						$micod=$_GET['elcodigo'];
						$olistado=new Negocio_clsAfp();
						$rowusuario=$olistado->getROW_Aporte($micod);
				?>          
						<div class="card card-info">
						  <div class="card-header">
							<h3 class="card-title"><a href="afpaportes.php?opcion=3&micodigo=<?php echo $micodigo; ?>" title="Regresar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Afp Aportes - Modificar.</h3>                                
						  </div>

						  <form name="formulario" action="afpaportegrabar.php?opcion=2" method="post">
						   <input type="hidden" name="txtcodigo" value="<?php echo $micod; ?>" class="ingreso" size="40"/>
						   <input type="hidden" name="txtelcodigo" value="<?php echo $micodigo; ?>">
							<div class="card-body">
							  <div class="row">
								<label class="col-sm-3 col-form-label">Mes</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtmes" value="<?php echo $rowusuario['mes']; ?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Aporte Obligatorio (%)</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtaporte" value="<?php echo $rowusuario['aporte']; ?>" required>
								</div>
								<label class="col-sm-3 col-form-label">Prima de Seguro (%)</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtprima" value="<?php echo $rowusuario['prima']; ?>" required>
								</div>
								<label class="col-sm-3 col-form-label">Comision Remun. (%)</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtcomision" value="<?php echo $rowusuario['comision']; ?>" required>
								</div>
								<label class="col-sm-3 col-form-label">Comision Flujo (%)</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtflujo" value="<?php echo $rowusuario['flujo']; ?>" required>
								</div>
								<label class="col-sm-3 col-form-label">Tope (S/.)</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txttope" value="<?php echo $rowusuario['tope']; ?>" required>
								</div>
							  </div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
							  <button type="submit" class="btn btn-primary" onclick="return seguro();">Grabar</button>
							  <a href="afpaportes.php?opcion=3&micodigo=<?php echo $micodigo; ?>"><button type="button" class="btn btn-danger float-right">Cancelar</button></a>
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