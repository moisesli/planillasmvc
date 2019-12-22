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
	$oafp=new Negocio_clsPlanilla();
	$rowplanilla=$oafp->BuscarConcepto($miempresa,$miperiodo);	
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
            <h1 class="m-0 text-dark">Concepto de Planilla.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item">Concepto de PLanilla</li>
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
         <div class="col-md-4">
         </div>	
          <div class="col-md-4">
          
          
			<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><a href="administrador.php" title="Modificar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Concepto de Planillas.</h3>                                
              </div>
				              
              <form name="formulario" action="conceptograbar.php" method="post">
               	<!-- conyemido -->
               	

					<div class="card card-primary card-outline card-outline-tabs">
					  <div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
						  <li class="nav-item">
							<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true"><strong>Ingresos</strong></a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-laboral" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false"><strong>Egresos</strong></a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false"><strong>Aportes Empleador</strong></a>
						  </li>
						</ul>
					  </div>
					  <div class="card-body">
						<div class="tab-content" id="custom-tabs-three-tabContent">
						  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
						  
							<div class="card-body">
							  <div class="row">
								<label class="col-sm-3 col-form-label">Ingreso 1</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso1" value="<?php echo $rowplanilla['ingreso1'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 2</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso2" value="<?php echo $rowplanilla['ingreso2'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 3</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso3" value="<?php echo $rowplanilla['ingreso3'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 4</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso4" value="<?php echo $rowplanilla['ingreso4'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 5</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso5" value="<?php echo $rowplanilla['ingreso5'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 6</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso6" value="<?php echo $rowplanilla['ingreso6'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 7</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso7" value="<?php echo $rowplanilla['ingreso7'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 8</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso8" value="<?php echo $rowplanilla['ingreso8'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 9</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso9" value="<?php echo $rowplanilla['ingreso9'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 10</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso10" value="<?php echo $rowplanilla['ingreso10'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 11</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso11" value="<?php echo $rowplanilla['ingreso11'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 12</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso12" value="<?php echo $rowplanilla['ingreso12'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 13</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso13" value="<?php echo $rowplanilla['ingreso13'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 14</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso14" value="<?php echo $rowplanilla['ingreso14'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 15</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso15" value="<?php echo $rowplanilla['ingreso15'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 16</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso16" value="<?php echo $rowplanilla['ingreso16'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 17</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso17" value="<?php echo $rowplanilla['ingreso17'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 18</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso18" value="<?php echo $rowplanilla['ingreso18'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 19</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso19" value="<?php echo $rowplanilla['ingreso19'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 20</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso20" value="<?php echo $rowplanilla['ingreso20'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 21</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso21" value="<?php echo $rowplanilla['ingreso21'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 22</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso22" value="<?php echo $rowplanilla['ingreso22'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 23</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso23" value="<?php echo $rowplanilla['ingreso23'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Ingreso 24</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtingreso24" value="<?php echo $rowplanilla['ingreso24'];?>">
								</div>
								
							  </div>
							</div>								  
							
						  </div>
						  
						  <div class="tab-pane fade" id="custom-tabs-three-laboral" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
							<div class="card-body">
							  <div class="row">
							  
								<label class="col-sm-3 col-form-label">Afp 1</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtafp1" value="<?php echo $rowplanilla['afp1'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Afp 2</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtafp2" value="<?php echo $rowplanilla['afp2'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Afp 3</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtafp3" value="<?php echo $rowplanilla['afp3'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Onp</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtonp" value="<?php echo $rowplanilla['onp'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Ies</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txties" value="<?php echo $rowplanilla['ies'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">IppsVida</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtippsvida" value="<?php echo $rowplanilla['ipssvida'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Quinta Cat.</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtquinta" value="<?php echo $rowplanilla['quinta'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Descuento 1</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento1" value="<?php echo $rowplanilla['descuento1'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Descuento 2</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento2" value="<?php echo $rowplanilla['descuento2'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Descuento 3</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento3" value="<?php echo $rowplanilla['descuento3'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Descuento 4</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento4" value="<?php echo $rowplanilla['descuento4'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Descuento 5</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento5" value="<?php echo $rowplanilla['descuento5'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Descuento 6</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento6" value="<?php echo $rowplanilla['descuento6'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Descuento 7</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento7" value="<?php echo $rowplanilla['descuento7'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Descuento 8</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento8" value="<?php echo $rowplanilla['descuento8'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Descuento 9</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento9" value="<?php echo $rowplanilla['descuento9'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Descuento 10</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento10" value="<?php echo $rowplanilla['descuento10'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Descuento 11</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento11" value="<?php echo $rowplanilla['descuento11'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Descuento 12</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento12" value="<?php echo $rowplanilla['descuento12'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Descuento 13</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento13" value="<?php echo $rowplanilla['descuento13'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Descuento 14</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento14" value="<?php echo $rowplanilla['descuento14'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Descuento 15</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento15" value="<?php echo $rowplanilla['descuento15'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Descuento 16</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento16" value="<?php echo $rowplanilla['descuento16'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Descuento 17</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdescuento17" value="<?php echo $rowplanilla['descuento17'];?>">
								</div>
								
							  </div>
							</div>
						  </div>
						  
						  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
						  
							<div class="card-body">
							  <div class="row">
								<label class="col-sm-3 col-form-label">Essalud</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtessalud" value="<?php echo $rowplanilla['essalud'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Senati</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtsenati" value="<?php echo $rowplanilla['senati'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Scrt Salud</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtscrtsalud" value="<?php echo $rowplanilla['scrtsalud'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Scrt Pension</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtscrtpension" value="<?php echo $rowplanilla['scrtpension'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Cts</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtcts" value="<?php echo $rowplanilla['cts'];?>">
								</div>
							  
								
							  </div>
							</div>								  
						  
						  
						  </div>
						  
						  
						  
						  
						</div>
					  </div>
					  <!-- /.card -->
					</div>
               	
               	
               	
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onclick="return seguro();">Grabar</button>
                  <a href="administrador.php"><button type="button" class="btn btn-danger float-right">Cancelar</button></a>
                </div>                
              </form>
            </div>
            
            
            
          </div>
         <div class="col-md-4">
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