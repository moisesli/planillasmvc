<?php
	session_start();
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
	require_once '../libreria/cuerpo/barra.php';
	require_once '../libreria/cuerpo/menu.php';
	include("../config.php");
	require_once(LOGICA."/negocio.php");
	require_once(HERRAMIENTAS_PHP."/clsGeneral.php");
	
	$oGeneral=new clsGeneral();			
	$oafp=new Negocio_clsPlanilla();
	$rowplanilla=$oafp->BuscarConcepto($miempresa,$miperiodo);	
	
?>

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Creacion de Planilla.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="creacion.php">Creacion de PLanilla</a></li>
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
         <div class="col-md-1">	
         </div>
          <div class="col-md-10">
          
          
			<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><a href="creacion.php" title="Modificar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Creacion de Planillas - Nuevo.</h3>                                
              </div>
				              
              
               	<!-- conyemido -->
               	

					<div class="card card-primary card-outline card-outline-tabs">
				  
				  
							<div class="card-body">
							  
							  
							  
							</div>				  
				  
					  <div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
						  <li class="nav-item">
							<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true"><strong>Con Conceptos</strong></a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-laboral" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false"><strong>En Blanco</strong></a>
						  </li>
						</ul>
					  </div>
					  <div class="card-body">
						<div class="tab-content" id="custom-tabs-three-tabContent">
						  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
						  	<form name="formulario" action="creaciongrabar.php?opcion=1" method="post">
							<div class="card-body">
					  	  
					  	  
							<div class="row">
							  	<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Planilla</label>
								<div class="col-sm-4">
									<select name="txtplanilla" class="form-control" required>
										<?php
										$oPlanilla= new Negocio_clsTipoplanilla();													
										$rsPlanilla=$oPlanilla->Mostrar_Registros_Todos($miempresa);
										echo $oGeneral->Mostrar_Combo_Seleccione2($rsPlanilla, 0,0);
										?>
									</select>	
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Mes</label>
								<div class="col-sm-4">
									<select name="txtmes" class="form-control" required>
										<?php
										$oMes= new Negocio_clsCreacion();													
										$rsMes=$oMes->Mostrar_Registros_Mes();
										echo $oGeneral->Mostrar_Combo_Seleccione2($rsMes, 0,0);
										?>
									</select>	
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Tipo</label>
								<div class="col-sm-4">
									<select name="txttipo" class="form-control" required>
										<?php
										$oTipo= new Negocio_clsTipotrabajador();													
										$rsTipo=$oTipo->Mostrar_Registros_Todos($miempresa);
										echo $oGeneral->Mostrar_Combo_Seleccione2($rsTipo, 0,0);
										?>
									</select>	
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Numero</label>
								<div class="col-sm-4">
								  <input type="number" class="form-control" value="1" name="txtnumero" required>
								</div>				
								<label class="col-sm-4 col-form-label"></label>
								
								<label class="col-sm-2 col-form-label"></label>								
								<label class="col-sm-2 col-form-label">Fecha Inicial</label>
								<div class="col-sm-4">
								  <input type="date" class="form-control" name="txtfechaini" value="<?php echo date('Y-m-d');?>" required>
								</div>								
								<label class="col-sm-4 col-form-label"></label>
								
								<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Fecha Final</label>
								<div class="col-sm-4">
								  <input type="date" class="form-control" name="txtfechafin" value="<?php echo date('Y-m-d');?>" required>
								</div>								
								<label class="col-sm-4 col-form-label"></label>
							  </div>					  	  
					  	  
					  	  
						  	  <div class="row">
						  	  	<label class="col-sm-4 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">INGRESOS</label>
						  	  	<label class="col-sm-4 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">DESCUENTOS</label>
						  	  	<label class="col-sm-4 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">APORTES DE EMPLEADOR</label>
						  	  </div>
							  <div class="row">
								<label class="col-sm-1 col-form-label">Ingreso 1</label>
								<div class="col-sm-2">							  	  
								  <input type="text" class="form-control" name="txtingreso1" value="<?php echo $rowplanilla['ingreso1'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok1" id="txtok1" value="S" checked disabled>
									<label for="txtok1">
									</label>
								  </div>
								</div>
								<label class="col-sm-2 col-form-label">Afp 1</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtafp1" value="<?php echo $rowplanilla['afp1'];?>" readonly>
								</div>
								<label class="col-sm-2 col-form-label">Essalud</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtessalud" value="<?php echo $rowplanilla['essalud'];?>">
								</div>
								
										
								<label class="col-sm-1 col-form-label">Ingreso 2</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso2" value="<?php echo $rowplanilla['ingreso2'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok2" id="txtok2" value="S" checked>
									<label for="txtok2">
									</label>
								  </div>
								</div>
								<label class="col-sm-2 col-form-label">Afp 2</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtafp2" value="<?php echo $rowplanilla['afp2'];?>" readonly>
								</div>
								<label class="col-sm-2 col-form-label">Senati</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtsenati" value="<?php echo $rowplanilla['senati'];?>">
								</div>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 3</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso3" value="<?php echo $rowplanilla['ingreso3'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok3" id="txtok3" value="S" checked>
									<label for="txtok3">
									</label>
								  </div>
								</div>
								<label class="col-sm-2 col-form-label">Afp 3</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtafp3" value="<?php echo $rowplanilla['afp3'];?>" readonly>
								</div>
								<label class="col-sm-2 col-form-label">Scrt Salud</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtscrtsalud" value="<?php echo $rowplanilla['scrtsalud'];?>">
								</div>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 4</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso4" value="<?php echo $rowplanilla['ingreso4'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok4" id="txtok4" value="S" checked>
									<label for="txtok4">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Onp</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtonp" value="<?php echo $rowplanilla['onp'];?>" readonly>
								</div>
								<label class="col-sm-2 col-form-label">Scrt Pension</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtscrtpension" value="<?php echo $rowplanilla['scrtpension'];?>">
								</div>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 5</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso5" value="<?php echo $rowplanilla['ingreso5'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok5" id="txtok5" value="S" checked>
									<label for="txtok5">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Ies</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txties" value="<?php echo $rowplanilla['ies'];?>" readonly>
								</div>
								<label class="col-sm-2 col-form-label">Cts</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtcts" value="<?php echo $rowplanilla['cts'];?>">
								</div>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 6</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso6" value="<?php echo $rowplanilla['ingreso6'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok6" id="txtok6" value="S" checked>
									<label for="txtok6">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">IppsVida</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtipssvida" value="<?php echo $rowplanilla['ipssvida'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 7</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso7" value="<?php echo $rowplanilla['ingreso7'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok7" id="txtok7" value="S" checked>
									<label for="txtok7">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Quinta Cat.</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtquinta" value="<?php echo $rowplanilla['quinta'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 8</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso8" value="<?php echo $rowplanilla['ingreso8'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok8" id="txtok8" value="S" checked>
									<label for="txtok8">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 1</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento1" value="<?php echo $rowplanilla['descuento1'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 9</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso9" value="<?php echo $rowplanilla['ingreso9'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok9" id="txtok9" value="S" checked>
									<label for="txtok9">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 2</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento2" value="<?php echo $rowplanilla['descuento2'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 10</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso10" value="<?php echo $rowplanilla['ingreso10'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok10" id="txtok10" value="S" checked>
									<label for="txtok10">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 3</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento3" value="<?php echo $rowplanilla['descuento3'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
																								
								<label class="col-sm-1 col-form-label">Ingreso 11</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso11" value="<?php echo $rowplanilla['ingreso11'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok11" id="txtok11" value="S" checked>
									<label for="txtok11">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 4</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento4" value="<?php echo $rowplanilla['descuento4'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 12</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso12" value="<?php echo $rowplanilla['ingreso12'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok12" id="txtok12" value="S" checked>
									<label for="txtok12">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 5</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento5" value="<?php echo $rowplanilla['descuento5'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 13</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso13" value="<?php echo $rowplanilla['ingreso13'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok13" id="txtok13" value="S" checked>
									<label for="txtok13">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 6</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento6" value="<?php echo $rowplanilla['descuento6'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>								
																								
								
								<label class="col-sm-1 col-form-label">Ingreso 14</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso14" value="<?php echo $rowplanilla['ingreso14'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok14" id="txtok14" value="S" checked>
									<label for="txtok14">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 7</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento7" value="<?php echo $rowplanilla['descuento7'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 15</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso15" value="<?php echo $rowplanilla['ingreso15'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok15" id="txtok15" value="S" checked>
									<label for="txtok15">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 8</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento8" value="<?php echo $rowplanilla['descuento8'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 16</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso16" value="<?php echo $rowplanilla['ingreso16'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok16" id="txtok16" value="S" checked>
									<label for="txtok16">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 9</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento9" value="<?php echo $rowplanilla['descuento9'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 17</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso17" value="<?php echo $rowplanilla['ingreso17'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok17" id="txtok17" value="S" checked>
									<label for="txtok17">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 10</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento10" value="<?php echo $rowplanilla['descuento10'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 18</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso18" value="<?php echo $rowplanilla['ingreso18'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok18" id="txtok18" value="S" checked>
									<label for="txtok18">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 11</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento11" value="<?php echo $rowplanilla['descuento11'];?>">
								</div>								
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 19</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso19" value="<?php echo $rowplanilla['ingreso19'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok19" id="txtok19" value="S" checked>
									<label for="txtok19">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 12</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento12" value="<?php echo $rowplanilla['descuento12'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 20</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso20" value="<?php echo $rowplanilla['ingreso20'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok20" id="txtok20" value="S" checked>
									<label for="txtok20">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 13</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento13" value="<?php echo $rowplanilla['descuento13'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 21</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso21" value="<?php echo $rowplanilla['ingreso21'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok21" id="txtok21" value="S" checked>
									<label for="txtok21">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 14</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento14" value="<?php echo $rowplanilla['descuento14'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 22</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso22" value="<?php echo $rowplanilla['ingreso22'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok22" id="txtok22" value="S" checked>
									<label for="txtok22">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 15</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento15" value="<?php echo $rowplanilla['descuento15'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 23</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso23" value="<?php echo $rowplanilla['ingreso23'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok23" id="txtok23" value="S" checked>
									<label for="txtok23">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 16</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento16" value="<?php echo $rowplanilla['descuento16'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 24</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso24" value="<?php echo $rowplanilla['ingreso24'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok24" id="txtok24" value="S" checked>
									<label for="txtok24">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 17</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento17" value="<?php echo $rowplanilla['descuento17'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
							  </div>
							</div>								  
								  <button type="submit" class="btn btn-primary" onclick="return seguro();">Grabar</button>
							</form>							
							
							
						  </div>
						  
						  <div class="tab-pane fade" id="custom-tabs-three-laboral" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
						  	<form name="formulario" action="creaciongrabar.php?opcion=4" method="post">
							<div class="card-body">
								<div class="row">
							  	<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Planilla</label>
								<div class="col-sm-4">
									<select name="txtplanillax" class="form-control" required>
										<?php
										$oPlanilla= new Negocio_clsTipoplanilla();													
										$rsPlanilla=$oPlanilla->Mostrar_Registros_Todos($miempresa);
										echo $oGeneral->Mostrar_Combo_Seleccione2($rsPlanilla, 0,0);
										?>
									</select>	
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Mes</label>
								<div class="col-sm-4">
									<select name="txtmesx" class="form-control" required>
										<?php
										$oMes= new Negocio_clsCreacion();													
										$rsMes=$oMes->Mostrar_Registros_Mes();
										echo $oGeneral->Mostrar_Combo_Seleccione2($rsMes, 0,0);
										?>
									</select>	
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Tipo</label>
								<div class="col-sm-4">
									<select name="txttipox" class="form-control" required>
										<?php
										$oTipo= new Negocio_clsTipotrabajador();													
										$rsTipo=$oTipo->Mostrar_Registros_Todos($miempresa);
										echo $oGeneral->Mostrar_Combo_Seleccione2($rsTipo, 0,0);
										?>
									</select>	
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Numero</label>
								<div class="col-sm-4">
								  <input type="number" class="form-control" value="1" name="txtnumerox" required>
								</div>				
								<label class="col-sm-4 col-form-label"></label>
								
								<label class="col-sm-2 col-form-label"></label>								
								<label class="col-sm-2 col-form-label">Fecha Inicial</label>
								<div class="col-sm-4">
								  <input type="date" class="form-control" name="txtfechainix" value="<?php echo date('Y-m-d');?>" required>
								</div>								
								<label class="col-sm-4 col-form-label"></label>
								
								<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Fecha Final</label>
								<div class="col-sm-4">
								  <input type="date" class="form-control" name="txtfechafinx" value="<?php echo date('Y-m-d');?>" required>
								</div>								
								<label class="col-sm-4 col-form-label"></label>
							  </div>	
							  
						  	  <div class="row">
						  	  	<label class="col-sm-4 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">INGRESOS</label>
						  	  	<label class="col-sm-4 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">DESCUENTOS</label>
						  	  	<label class="col-sm-4 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">APORTES DE EMPLEADOR</label>
						  	  </div>
 								  					  							  		
							  <div class="row">
								<label class="col-sm-1 col-form-label">Ingreso 1</label>
								<div class="col-sm-2">							  	  
								  <input type="text" class="form-control" name="txtingreso1x" value="<?php echo $rowplanilla['ingreso1'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok1x" id="txtok1x" value="S" checked disabled>
									<label for="txtok1x">
									</label>
								  </div>
								</div>
								<label class="col-sm-2 col-form-label">Afp 1</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtafp1x" value="<?php echo $rowplanilla['afp1'];?>" readonly>
								</div>
								<label class="col-sm-2 col-form-label">Essalud</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtessaludx" value="<?php echo $rowplanilla['essalud'];?>">
								</div>
								
										
								<label class="col-sm-1 col-form-label">Ingreso 2</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso2x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok2x" id="txtok2x" value="S">
									<label for="txtok2x">
									</label>
								  </div>
								</div>
								<label class="col-sm-2 col-form-label">Afp 2</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtafp2x" value="<?php echo $rowplanilla['afp2'];?>" readonly>
								</div>
								<label class="col-sm-2 col-form-label">Senati</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtsenatix" value="<?php echo $rowplanilla['senati'];?>">
								</div>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 3</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso3x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok3x" id="txtok3x" value="S">
									<label for="txtok3x">
									</label>
								  </div>
								</div>
								<label class="col-sm-2 col-form-label">Afp 3</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtafp3x" value="<?php echo $rowplanilla['afp3'];?>" readonly>
								</div>
								<label class="col-sm-2 col-form-label">Scrt Salud</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtscrtsaludx" value="<?php echo $rowplanilla['scrtsalud'];?>">
								</div>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 4</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso4x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok4x" id="txtok4x" value="S">
									<label for="txtok4x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Onp</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtonpx" value="<?php echo $rowplanilla['onp'];?>" readonly>
								</div>
								<label class="col-sm-2 col-form-label">Scrt Pension</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtscrtpensionx" value="<?php echo $rowplanilla['scrtpension'];?>">
								</div>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 5</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso5x" value="<?php echo $rowplanilla['ingreso5'];?>">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok5x" id="txtok5x" value="S" checked>
									<label for="txtok5x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Ies</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtiesx" value="<?php echo $rowplanilla['ies'];?>" readonly>
								</div>
								<label class="col-sm-2 col-form-label">Cts</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtctsx" value="<?php echo $rowplanilla['cts'];?>">
								</div>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 6</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso6x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok6x" id="txtok6x" value="S">
									<label for="txtok6x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">IppsVida</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtipssvidax" value="<?php echo $rowplanilla['ipssvida'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 7</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso7x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok7x" id="txtok7x" value="S">
									<label for="txtok7x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Quinta Cat.</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtquintax" value="<?php echo $rowplanilla['quinta'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 8</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso8x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok8x" id="txtok8x" value="S">
									<label for="txtok8x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 1</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento1x" value="<?php echo $rowplanilla['descuento1'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 9</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso9x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok9x" id="txtok9x" value="S">
									<label for="txtok9x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 2</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento2x" value="<?php echo $rowplanilla['descuento2'];?>">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 10</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso10x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok10x" id="txtok10x" value="S">
									<label for="txtok10x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 3</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento3x" value="">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
																								
								<label class="col-sm-1 col-form-label">Ingreso 11</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso11x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok11x" id="txtok11x" value="S">
									<label for="txtok11x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 4</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento4x" value="">
								</div>
								<label class="col-sm-4 col-form-label"></label>								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 12</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso12x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok12x" id="txtok12x" value="S">
									<label for="txtok12x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 5</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento5x" value="">
								</div>
								<label class="col-sm-4 col-form-label"></label>								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 13</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso13x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok13x" id="txtok13x" value="S">
									<label for="txtok13x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 6</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento6x" value="">
								</div>
								<label class="col-sm-4 col-form-label"></label>								
																								
								
								<label class="col-sm-1 col-form-label">Ingreso 14</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso14x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok14x" id="txtok14x" value="S">
									<label for="txtok14x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 7</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento7x" value="">
								</div>
								<label class="col-sm-4 col-form-label"></label>								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 15</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso15x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok15x" id="txtok15x" value="S">
									<label for="txtok15x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 8</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento8x" value="">
								</div>
								<label class="col-sm-4 col-form-label"></label>								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 16</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso16x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok16x" id="txtok16x" value="S">
									<label for="txtok16x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 9</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento9x" value="">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 17</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso17x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok17x" id="txtok17x" value="S">
									<label for="txtok17x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 10</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento10x" value="">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 18</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso18x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok18x" id="txtok18x" value="S">
									<label for="txtok18x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 11</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento11x" value="">
								</div>								
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 19</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso19x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok19x" id="txtok19x" value="S">
									<label for="txtok19x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 12</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento12x" value="">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 20</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso20x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok20x" id="txtok20x" value="S">
									<label for="txtok20x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 13</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento13x" value="">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 21</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso21x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok21x" id="txtok21x" value="S">
									<label for="txtok21x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 14</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento14x" value="">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 22</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso22x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok22x" id="txtok22x" value="S">
									<label for="txtok22x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 15</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento15x" value="">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 23</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso23x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok23x" id="txtok23x" value="S">
									<label for="txtok23x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 16</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento16x" value="">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 24</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso24x" value="">
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok24x" id="txtok24x" value="S">
									<label for="txtok24x">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 17</label>
								<div class="col-sm-2">

								  <input type="text" class="form-control" name="txtdescuento17x" value="">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
							    </div>							
							  </div>
								  <button type="submit" class="btn btn-primary" onclick="return seguro();">Grabar</button>
							</form>							
								  
							  
						  </div>
						  
						  
						</div>
					  </div>
					  <!-- /.card -->
					</div>
               	
                
                <div class="card-footer">                  
                  <a href="creacion.php"><button type="button" class="btn btn-danger float-right">Regresar</button></a>
                </div>                
              
            </div>
            
            
            
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