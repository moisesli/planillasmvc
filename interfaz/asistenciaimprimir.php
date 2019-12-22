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
<script language = "javascript">
	function AbrirCentrado(Url,NombreVentana,width,height,extras)
	{
		
		var largo = width;
		var altura = height;
		var adicionales= extras;
		var top = (screen.height-altura)/2;
		
		var mimes=document.formulario.elmes.value;
		var codtra=document.formulario.elcodigo.value;
		
		
		var izquierda = (screen.width-largo)/2; nuevaVentana=window.open(''+ Url +'&elmes='+mimes+'&eltrabajador='+codtra+ '',''+ NombreVentana + '','width=' + largo + ',height=' + altura + ',top=' + top + ',left=' + izquierda + ',features=' + adicionales + ''); 
		nuevaVentana.focus();
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
            <h1 class="m-0 text-dark">Imprimir Asistencia.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="asistencia.php">Inicio</a></li>
              <li class="breadcrumb-item active">Imprimir</li>
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

					$micod=$_GET['micodigo'];
					//echo $micodigo;
					$olistado=new Negocio_clsTrabajador();
					$rsTrabajador=$olistado->BuscarHorario($micod);
				?>          
			<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><a href="asistencia.php" title="Modificar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Imprimir Asistencia.</h3>                                
              </div>
				              
              <form name="formulario" action="" method="post">
                              
                <div class="card-body">
                
                  <div class="row">
                   
                    <label class="col-sm-3 col-form-label">Mes</label>
                    <div class="col-sm-9">                      
					  <select name="elmes" class="form-control" required>
							<?php
							$oDocumento= new Negocio_clsTablas();													
							$rsDocumento=$oDocumento->Mostrar_Meses();
							echo $oGeneral->Mostrar_Combo($rsDocumento, 0,0);
							?>
						</select>
                    </div>
                   
                    <label class="col-sm-3 col-form-label">Trabajador</label>
                    <div class="col-sm-9">                      
					  <select name="elcodigo" class="form-control">
							<?php
							$oDocumento= new Negocio_clsTablas();													
							$rsDocumento=$oDocumento->Mostrar_Trabajadores();
							echo $oGeneral->Mostrar_Combo($rsDocumento, 0,1);
							?>
						</select>
                    </div>
                  	
                   
                    

                                                                                                                                                                                                                                                
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-primary" onclick="javascript:AbrirCentrado('asistenciarep.php?elperiodo=<?php echo $miperiodo; ?>','','1024','600','');"  >Imprimir</button>
                  <a href="asistencia.php"><button type="button" class="btn btn-danger float-right">Cancelar</button></a>
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