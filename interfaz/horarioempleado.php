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

	require_once(LOGICA."/negocio.php");
	require_once(HERRAMIENTAS_PHP."/clsGeneral.php");
	$oGeneral=new clsGeneral();			
	$elcodigo=$_GET['micodigo'];	
	// BUSCAR EL TRABAJADOR
	$olistado=new Negocio_clsTrabajador();
	$rsTrabajador=$olistado->getROW($elcodigo);	

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

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- BARRA -->		
<?php
	require_once '../libreria/cuerpo/barraasistencia.php';
	require_once '../libreria/cuerpo/menuasistencia.php';
	include("../config.php");
	
?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Horario de Asistencia - <strong style="color: #9A0204"><?php echo $rsTrabajador['apellidos'].' '.$rsTrabajador['apellidos2'].' '.$rsTrabajador['nombres'];?></strong></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="asistencia.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="horario.php">Horario</a></li>
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
         <div class="col-md-2">	
         </div>
          <div class="col-md-8">
				<?php

					$micod=$_GET['micodigo'];
					//echo $micodigo;
					$olistado=new Negocio_clsTrabajador();
					$rsTrabajador=$olistado->BuscarHorario($micod);
				?>          
			<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><a href="configuracion.php" title="Modificar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Horario - Modificar.</h3>                                
              </div>
				              
              <form name="formulario" action="horariograbar.php" method="post">
               <input type="hidden" name="txtcodigo" value="<?php echo $micod; ?>" class="ingreso" size="40"/>
                <div class="card-body">
                
				  <div class="row">
					<label class="col-sm-6 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">ENTRADAS</label>
					<label class="col-sm-6 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">SALIDAS</label>
				  </div>
                  <div class="row">
                   
                    <label class="col-sm-2 col-form-label">Lunes</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="lunese" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['lunese']; ?>" autofocus>
                    </div>
					<div class="col-sm-1">							  	  								  
					 <div class="icheck-primary d-inline">
						<input type="checkbox" name="lunes_e" id="lunes_e" value="S" <?php if ($rsTrabajador['lunes_e']=='S') echo 'checked';?>>
						<label for="lunes_e">
						</label>
					  </div>
					</div>                    
                    <label class="col-sm-2 col-form-label">Lunes</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="luness" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['luness']; ?>" autofocus>
                    </div>
					<div class="col-sm-1">							  	  								  
					 <div class="icheck-primary d-inline">
						<input type="checkbox" name="lunes_s" id="lunes_s" value="S"<?php if ($rsTrabajador['lunes_s']=='S') echo 'checked';?>>
						<label for="lunes_s">
						</label>
					  </div>
					</div>
                   
                   
                   
                    <label class="col-sm-2 col-form-label">Martes</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="martese" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['martese']; ?>" autofocus>
                    </div>
					<div class="col-sm-1">							  	  								  
					 <div class="icheck-primary d-inline">
						<input type="checkbox" name="martes_e" id="martes_e" value="S" <?php if ($rsTrabajador['martes_e']=='S') echo 'checked';?>>
						<label for="martes_e">
						</label>
					  </div>
					</div>                    
                    <label class="col-sm-2 col-form-label">Martes</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="martess" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['martess']; ?>" autofocus>
                    </div>
					<div class="col-sm-1">							  	  								  
					 <div class="icheck-primary d-inline">
						<input type="checkbox" name="martes_s" id="martes_s" value="S"<?php if ($rsTrabajador['martes_s']=='S') echo 'checked';?>>
						<label for="martes_s">
						</label>
					  </div>
					</div>
                    
                    <label class="col-sm-2 col-form-label">Miercoles</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="miercolese" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['miercolese']; ?>" autofocus>
                    </div>
					<div class="col-sm-1">							  	  								  
					 <div class="icheck-primary d-inline">
						<input type="checkbox" name="miercoles_e" id="miercoles_e" value="S" <?php if ($rsTrabajador['miercoles_e']=='S') echo 'checked';?>>
						<label for="miercoles_e">
						</label>
					  </div>
					</div>                    
                    <label class="col-sm-2 col-form-label">Miercoles</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="miercoless" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['miercoless']; ?>" autofocus>
                    </div>
					<div class="col-sm-1">							  	  								  
					 <div class="icheck-primary d-inline">
						<input type="checkbox" name="miercoles_s" id="miercoles_s" value="S"<?php if ($rsTrabajador['miercoles_s']=='S') echo 'checked';?>>
						<label for="miercoles_s">
						</label>
					  </div>
					</div>
                    
                    <label class="col-sm-2 col-form-label">Jueves</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="juevese" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['juevese']; ?>" autofocus>
                    </div>
					<div class="col-sm-1">							  	  								  
					 <div class="icheck-primary d-inline">
						<input type="checkbox" name="jueves_e" id="jueves_e" value="S" <?php if ($rsTrabajador['jueves_e']=='S') echo 'checked';?>>
						<label for="jueves_e">
						</label>
					  </div>
					</div>                    
                    <label class="col-sm-2 col-form-label">Jueves</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="juevess" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['juevess']; ?>" autofocus>
                    </div>
					<div class="col-sm-1">							  	  								  
					 <div class="icheck-primary d-inline">
						<input type="checkbox" name="jueves_s" id="jueves_s" value="S"<?php if ($rsTrabajador['jueves_s']=='S') echo 'checked';?>>
						<label for="jueves_s">
						</label>
					  </div>
					</div>

                    <label class="col-sm-2 col-form-label">Viernes</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="viernese" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['viernese']; ?>" autofocus>
                    </div>
					<div class="col-sm-1">							  	  								  
					 <div class="icheck-primary d-inline">
						<input type="checkbox" name="viernes_e" id="viernes_e" value="S" <?php if ($rsTrabajador['viernes_e']=='S') echo 'checked';?>>
						<label for="viernes_e">
						</label>
					  </div>
					</div>                    
                    <label class="col-sm-2 col-form-label">Viernes</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="vierness" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['vierness']; ?>" autofocus>
                    </div>
					<div class="col-sm-1">							  	  								  
					 <div class="icheck-primary d-inline">
						<input type="checkbox" name="viernes_s" id="viernes_s" value="S"<?php if ($rsTrabajador['viernes_s']=='S') echo 'checked';?>>
						<label for="viernes_s">
						</label>
					  </div>
					</div>

                    <label class="col-sm-2 col-form-label">Sabado</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="sabadoe" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['sabadoe']; ?>" autofocus>
                    </div>
					<div class="col-sm-1">							  	  								  
					 <div class="icheck-primary d-inline">
						<input type="checkbox" name="sabado_e" id="sabado_e" value="S" <?php if ($rsTrabajador['sabado_e']=='S') echo 'checked';?>>
						<label for="sabado_e">
						</label>
					  </div>
					</div>                    
                    <label class="col-sm-2 col-form-label">Sabado</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="sabados" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['sabados']; ?>" autofocus>
                    </div>
					<div class="col-sm-1">							  	  								  
					 <div class="icheck-primary d-inline">
						<input type="checkbox" name="sabado_s" id="sabado_s" value="S"<?php if ($rsTrabajador['sabado_s']=='S') echo 'checked';?>>
						<label for="sabado_s">
						</label>
					  </div>
					</div>
                                        
                    <label class="col-sm-2 col-form-label">Domingo</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="domingoe" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['domingoe']; ?>" autofocus>
                    </div>
					<div class="col-sm-1">							  	  								  
					 <div class="icheck-primary d-inline">
						<input type="checkbox" name="domingo_e" id="domingo_e" value="S" <?php if ($rsTrabajador['domingo_e']=='S') echo 'checked';?>>
						<label for="domingo_e">
						</label>
					  </div>
					</div>                    
                    <label class="col-sm-2 col-form-label">Domingo</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="domingos" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['domingos']; ?>" autofocus>
                    </div>
					<div class="col-sm-1">							  	  								  
					 <div class="icheck-primary d-inline">
						<input type="checkbox" name="domingo_s" id="domingo_s" value="S"<?php if ($rsTrabajador['domingo_s']=='S') echo 'checked';?>>
						<label for="domingo_s">
						</label>
					  </div>
					</div>

                                                                                                                                                                                                                                                
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onclick="return seguro();">Grabar</button>
                  <a href="horario.php"><button type="button" class="btn btn-danger float-right">Cancelar</button></a>
                </div>                
              </form>
            </div>
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