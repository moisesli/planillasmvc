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

	function FormatDate($fecha){
		list($anio,$mes,$dia)=explode("-",$fecha); 
		return $dia."-".$mes."-".$anio; 
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
	
	$micodigo=$_GET['micodigo'];
	
	$oGeneral=new clsGeneral();			
	$oafp=new Negocio_clsPlanilla();
	$rowplanilla=$oafp->BuscarCreacion($micodigo);	
	
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
                <h3 class="card-title"><a href="creacion.php" title="Modificar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Creacion de Planillas - Ver.</h3>                                
              </div>
				              
              
               	<!-- conyemido -->
               	

					<div class="card card-primary card-outline card-outline-tabs">
				  
				  
							<div class="card-body">
							  
							  
							  
							</div>				  
				  
					  <div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
						  <li class="nav-item">
							<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true"><strong>Detalles</strong></a>
						  </li>
						</ul>
					  </div>
					  <div class="card-body">
						<div class="tab-content" id="custom-tabs-three-tabContent">
						  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
						  	<form name="formulario" action="creaciongrabar.php?opcion=2" method="post">
						  	<input type="hidden" name="txtcodigo" value="<?php echo $micodigo;?>">
							<div class="card-body">
					  	  
					  	  
							<div class="row">
							  	<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Planilla</label>
								<div class="col-sm-4">
									<select name="txtplanilla" class="form-control" disabled>
										<?php
										$oPlanilla= new Negocio_clsTipoplanilla();													
										$rsPlanilla=$oPlanilla->Mostrar_Registros_Todos($miempresa);
										echo $oGeneral->Mostrar_Combo_Seleccione($rsPlanilla, 0,0,$rowplanilla['planilla']);
										?>
									</select>	
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Mes</label>
								<div class="col-sm-4">
									<select name="txtmes" class="form-control" disabled>
										<?php
										$oMes= new Negocio_clsCreacion();													
										$rsMes=$oMes->Mostrar_Registros_Mes();
										echo $oGeneral->Mostrar_Combo_Seleccione2($rsMes, 0,0,$rowplanilla['mes']);
										?>
									</select>	
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Tipo</label>
								<div class="col-sm-4">
									<select name="txttipo" class="form-control" disabled>
										<?php
										$oTipo= new Negocio_clsTipotrabajador();													
										$rsTipo=$oTipo->Mostrar_Registros_Todos($miempresa);
										echo $oGeneral->Mostrar_Combo_Seleccione2($rsTipo, 0,0,$rowplanilla['tipo']);
										?>
									</select>	
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Numero</label>
								<div class="col-sm-4">
								  <input type="number" class="form-control" value="1" name="txtnumero" value="<?php echo $rowplanilla['numero'];?>" readonly>
								</div>				
								<label class="col-sm-4 col-form-label"></label>
								
								<label class="col-sm-2 col-form-label"></label>								
								<label class="col-sm-2 col-form-label">Fecha Inicial</label>
								<div class="col-sm-4">
								  <input type="date" class="form-control" name="txtfechaini" value="<?php echo $rowplanilla['fini'];?>" readonly>
								</div>								
								<label class="col-sm-4 col-form-label"></label>
								
								<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Fecha Final</label>
								<div class="col-sm-4">
								  <input type="date" class="form-control" name="txtfechafin" value="<?php echo $rowplanilla['ffin'];?>" readonly>
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
								  <input type="text" class="form-control" name="txtingreso1" value="<?php echo $rowplanilla['ingreso1'];?>" readonly>
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
								  <input type="text" class="form-control" name="txtessalud" value="<?php echo $rowplanilla['essalud'];?>" readonly>
								</div>
								
										
								<label class="col-sm-1 col-form-label">Ingreso 2</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso2" value="<?php echo $rowplanilla['ingreso2'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok2" id="txtok2" value="S" <?php if ($rowplanilla['ok2']=='S') echo 'checked';?> disabled>
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
								  <input type="text" class="form-control" name="txtsenati" value="<?php echo $rowplanilla['senati'];?>" readonly>
								</div>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 3</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso3" value="<?php echo $rowplanilla['ingreso3'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok3" id="txtok3" value="S" <?php if ($rowplanilla['ok3']=='S') echo 'checked';?> disabled>
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
								  <input type="text" class="form-control" name="txtscrtsalud" value="<?php echo $rowplanilla['scrtsalud'];?>" readonly>
								</div>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 4</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso4" value="<?php echo $rowplanilla['ingreso4'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok4" id="txtok4" value="S" <?php if ($rowplanilla['ok4']=='S') echo 'checked';?> disabled>
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
								  <input type="text" class="form-control" name="txtscrtpension" value="<?php echo $rowplanilla['scrtpension'];?>" readonly>
								</div>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 5</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso5" value="<?php echo $rowplanilla['ingreso5'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok5" id="txtok5" value="S" checked disabled>
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
								  <input type="text" class="form-control" name="txtcts" value="<?php echo $rowplanilla['cts'];?>" readonly>
								</div>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 6</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso6" value="<?php echo $rowplanilla['ingreso6'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok6" id="txtok6" value="S" <?php if ($rowplanilla['ok6']=='S') echo 'checked';?> disabled>
									<label for="txtok6">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">IppsVida</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtippsvida" value="<?php echo $rowplanilla['ipssvida'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 7</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso7" value="<?php echo $rowplanilla['ingreso7'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok7" id="txtok7" <?php if ($rowplanilla['ok7']=='S') echo 'checked';?> disabled>
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
								  <input type="text" class="form-control" name="txtingreso8" value="<?php echo $rowplanilla['ingreso8'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok8" id="txtok8" value="S" <?php if ($rowplanilla['ok8']=='S') echo 'checked';?> disabled>
									<label for="txtok8">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 1</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento1" value="<?php echo $rowplanilla['descuento1'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 9</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso9" value="<?php echo $rowplanilla['ingreso9'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok9" id="txtok9" value="S" <?php if ($rowplanilla['ok9']=='S') echo 'checked';?> disabled>
									<label for="txtok9">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 2</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento2" value="<?php echo $rowplanilla['descuento2'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 10</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso10" value="<?php echo $rowplanilla['ingreso10'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok10" id="txtok10" value="S" <?php if ($rowplanilla['ok10']=='S') echo 'checked';?> disabled>
									<label for="txtok10">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 3</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento3" value="<?php echo $rowplanilla['descuento3'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
																								
								<label class="col-sm-1 col-form-label">Ingreso 11</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso11" value="<?php echo $rowplanilla['ingreso11'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok11" id="txtok11" value="S" <?php if ($rowplanilla['ok11']=='S') echo 'checked';?> disabled>
									<label for="txtok11">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 4</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento4" value="<?php echo $rowplanilla['descuento4'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 12</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso12" value="<?php echo $rowplanilla['ingreso12'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok12" id="txtok12" value="S" <?php if ($rowplanilla['ok12']=='S') echo 'checked';?> disabled>
									<label for="txtok12">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 5</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento5" value="<?php echo $rowplanilla['descuento5'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 13</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso13" value="<?php echo $rowplanilla['ingreso13'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok13" id="txtok13" value="S" <?php if ($rowplanilla['ok13']=='S') echo 'checked';?> disabled>
									<label for="txtok13">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 6</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento6" value="<?php echo $rowplanilla['descuento6'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>								
																								
								
								<label class="col-sm-1 col-form-label">Ingreso 14</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso14" value="<?php echo $rowplanilla['ingreso14'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok14" id="txtok14" value="S" <?php if ($rowplanilla['ok14']=='S') echo 'checked';?> disabled>
									<label for="txtok14">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 7</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento7" value="<?php echo $rowplanilla['descuento7'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 15</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso15" value="<?php echo $rowplanilla['ingreso15'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok15" id="txtok15" value="S" <?php if ($rowplanilla['ok15']=='S') echo 'checked';?> disabled>
									<label for="txtok15">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 8</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento8" value="<?php echo $rowplanilla['descuento8'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 16</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso16" value="<?php echo $rowplanilla['ingreso16'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok16" id="txtok16" value="S" <?php if ($rowplanilla['ok16']=='S') echo 'checked';?> disabled>
									<label for="txtok16">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 9</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento9" value="<?php echo $rowplanilla['descuento9'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 17</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso17" value="<?php echo $rowplanilla['ingreso17'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok17" id="txtok17" value="S" <?php if ($rowplanilla['ok17']=='S') echo 'checked';?> disabled>
									<label for="txtok17">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 10</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento10" value="<?php echo $rowplanilla['descuento10'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								
								<label class="col-sm-1 col-form-label">Ingreso 18</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso18" value="<?php echo $rowplanilla['ingreso18'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok18" id="txtok18" value="S" <?php if ($rowplanilla['ok18']=='S') echo 'checked';?> disabled>
									<label for="txtok18">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 11</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento11" value="<?php echo $rowplanilla['descuento11'];?>" readonly>
								</div>								
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 19</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso19" value="<?php echo $rowplanilla['ingreso19'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok19" id="txtok19" value="S" <?php if ($rowplanilla['ok19']=='S') echo 'checked';?> disabled>
									<label for="txtok19">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 12</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento12" value="<?php echo $rowplanilla['descuento12'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 20</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso20" value="<?php echo $rowplanilla['ingreso20'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok20" id="txtok20" value="S" <?php if ($rowplanilla['ok20']=='S') echo 'checked';?> disabled>
									<label for="txtok20">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 13</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento13" value="<?php echo $rowplanilla['descuento13'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 21</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso21" value="<?php echo $rowplanilla['ingreso21'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok21" id="txtok21" value="S" <?php if ($rowplanilla['ok21']=='S') echo 'checked';?> disabled>
									<label for="txtok21">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 14</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento14" value="<?php echo $rowplanilla['descuento14'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 22</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso22" value="<?php echo $rowplanilla['ingreso22'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok22" id="txtok22" value="S" <?php if ($rowplanilla['ok22']=='S') echo 'checked';?> disabled>
									<label for="txtok22">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 15</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento15" value="<?php echo $rowplanilla['descuento15'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 23</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso23" value="<?php echo $rowplanilla['ingreso23'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok23" id="txtok23" value="S" <?php if ($rowplanilla['ok23']=='S') echo 'checked';?> disabled>
									<label for="txtok23">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 16</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento16" value="<?php echo $rowplanilla['descuento16'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-1 col-form-label">Ingreso 24</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtingreso24" value="<?php echo $rowplanilla['ingreso24'];?>" readonly>
								</div>
								<div class="col-sm-1">							  	  								  
								 <div class="icheck-primary d-inline">
									<input type="checkbox" name="txtok24" id="txtok24" value="S" <?php if ($rowplanilla['ok24']=='S') echo 'checked';?> disabled>
									<label for="txtok24">
									</label>
								  </div>
								</div>								
								<label class="col-sm-2 col-form-label">Descuento 17</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtdescuento17" value="<?php echo $rowplanilla['descuento17'];?>" readonly>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
							  </div>
							</div>								  
								  
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