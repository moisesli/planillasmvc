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
	$elmes=$_GET['mimes'];
	$mihoratrabajo=$_GET['mihoratrabajo'];
	
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
            <h1 class="m-0 text-dark">Mantenimiento de Asistencia - <strong style="color: #9A0204"><?php echo $rsTrabajador['apellidos'].' '.$rsTrabajador['apellidos2'].' '.$rsTrabajador['nombres'];?></strong></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="asistencia.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="asistenciaver.php">Procesar Asistencia</a></li>
              <li class="breadcrumb-item"><a href="asistenciaprocesar.php?micodigo=<?php echo $elcodigo; ?>">Meses</a></li>
              
              <li class="breadcrumb-item"><a href="procesarasistencia.php?micodigo=<?php echo $elcodigo; ?>&mimes=<?php echo $elmes; ?>">procesar</a></li>
              
              <li class="breadcrumb-item active">Mant. Asistencia</li>
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

					$micod=$_GET['micodasiste'];
					//echo $micodigo;
					$olistado=new Negocio_clsTablas();
					$rsTrabajador=$olistado->BuscarHorario($micod);
				?>          
			<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><a href="procesarasistencia.php?micodigo=<?php echo $elcodigo; ?>&mimes=<?php echo $elmes; ?>" title="Modificar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Mantenimiento de Asistencia.</h3>                                
              </div>
				              
              <form name="formulario" action="asistenciamantgrabar.php" method="post">
               <input type="hidden" name="txtcodigo" value="<?php echo $micod; ?>">
               <input type="hidden" name="txtcodtrabajador" value="<?php echo $elcodigo; ?>">
               <input type="hidden" name="txtmes" value="<?php echo $elmes; ?>">
               <input type="hidden" name="txthoratrabajo" value="<?php echo $mihoratrabajo; ?>">
               
               <input type="hidden" name="txtfecha" value="<?php echo $rsTrabajador['fecha']; ?>">
               
                <div class="card-body">
                  <div class="row">
                  	<label class="col-sm-3 col-form-label">Fecha</label>
                    <div class="col-sm-3">                      
                      <input type="date" class="form-control" name="fecha" value="<?php echo $rsTrabajador['fecha']; ?>" readonly>
                    </div>
                  	<label class="col-sm-3 col-form-label">Detalle</label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="detalle" value="<?php echo $rsTrabajador['dia'].'-'.$rsTrabajador['mes'].'-'.$rsTrabajador['periodo']; ?>" readonly>
                    </div>
                  	
                  </div>
                  	
                  <div class="row">
                   
                    <label class="col-sm-3 col-form-label"><?php echo $rsTrabajador['dia'].' - HORA A MARCAR'; ?></label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="lunese" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['horaasiste']; ?>" readonly>
                    </div>
                    <label class="col-sm-3 col-form-label"><?php echo $rsTrabajador['dia'].' - HORA MARCADA'; ?></label>
                    <div class="col-sm-3">                      
                      <input type="text" class="form-control" name="lahora" data-inputmask='"mask": "99:99"' data-mask value="<?php echo $rsTrabajador['hora']; ?>" autofocus>
                    </div>
                   
                   
                  </div>
			  <div class="row">
				<label class="col-sm-4 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">JUSTIFICACIONES</label>
			  </div>
				<div class="row">			
								<label class="col-sm-3 col-form-label">Motivo de Justificacion</label>
								<div class="col-sm-3">
								  <select name="txtmotivo" class="form-control">
										<?php
										$oDocumento= new Negocio_clsTablas();													
										$rsDocumento=$oDocumento->Mostrar_Justifica();
										echo $oGeneral->Mostrar_Combo_Seleccione2($rsDocumento, 1,1);
										?>
									</select>
								</div>
								<label class="col-sm-3 col-form-label">Descripcion de la Justificacion</label>
								<div class="col-sm-3">
								  <textarea name="txtdetalle" class="form-control" rows="2" cols="50"></textarea>
								</div>
                
                 </div> 
                </div>
                
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onclick="return seguro();">Grabar</button>
                  <a href="procesarasistencia.php?micodigo=<?php echo $elcodigo; ?>&mimes=<?php echo $elmes; ?>"><button type="button" class="btn btn-danger float-right">Cancelar</button></a>
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