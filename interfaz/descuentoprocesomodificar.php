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
	$oGeneral=new clsGeneral();			
	
	
	$laplanila=$_GET['laplanilla'];
	$elcodigo=$_GET['micodigo'];
	//echo $laplanila;
	// BUSCAR PLANILLA
	$oPlanilla=new Negocio_clsCreacion();
	$rsPlanilla=$oPlanilla->getROW($laplanila);

	$rowusuario=$oPlanilla->getROW($laplanila);

	//////////////////
	// BUSCAR TIPO TRABAJADOR PARA LOS DIAS
	$oTipo=new Negocio_clsTipotrabajador();
	$rsTipo=$oTipo->Buscar_Tipo($miempresa,$rsPlanilla['tipo']);
	$losdias=$rsTipo['dias'];
	//////////////////	
	// BUSCAR EL CODIGO DEL TRABAJADOR EN DESCUEBNTO
	$oDescuento=new Negocio_clsDescuento();
	$rowCodigo=$oDescuento->getROW($elcodigo);
	//echo $rowCodigo['codtrabajador'];
	// BUSCAR EL TRABAJADOR
	$oTrabajador=new Negocio_clsTrabajador();
	$rowTrabajador=$oTrabajador->getROW($rowCodigo['codtrabajador']);
	
?>

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0 text-dark">Ing. Dctos. Planilla - <strong style="color: #9A0204"><?php echo $rsPlanilla['planilla'].' - '.$rsPlanilla['mes'].' - '.$rsPlanilla['tipo'].' - '.$rsPlanilla['numero'];?></strong></h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="descuento.php">Seleccionar Planilla</a></li>
              <li class="breadcrumb-item"><a href="descuentoproceso.php?micodigo=<?php echo $laplanila;?>">Seleccionar Trabajador</a></li>
              
              
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
          
          
			<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><a href="descuentoproceso.php?micodigo=<?php echo $elcodigo;?>&laplanilla=<?php echo $laplanila;?>" title="Registrar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Ingresos y Dctos de Planillas - Modificar.</h3>                                
              </div>
				              
              
               	<!-- conyemido -->
               	

					<div class="card card-primary card-outline card-outline-tabs">
				  
						<div class="card-body">
							<div class="row">
							  	<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Trabajador</label>
								<div class="col-sm-6">
									<input type="text" name="txtapellidos" style="font-size: 22px; color: #4103B4; font-weight: bold" value="<?php echo $rowTrabajador['apellidos'].' '.$rowTrabajador['apellidos2'].' '.$rowTrabajador['nombres']; ?>" class="form-control" readonly>
								</div>
								<label class="col-sm-2 col-form-label"></label>
								
								
							  </div>					  
				  
					  <div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
						  <li class="nav-item">
							<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true"><strong>Ingreso y Descuentos</strong></a>
						  </li>
						</ul>
					  </div>
					  <div class="card-body">
						<div class="tab-content" id="custom-tabs-three-tabContent">
						  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
						  	<form name="formulario" action="descuentoprocesograbar.php" method="post">
						  	<input type="hidden" name="txtcodigo" value="<?php echo $elcodigo;?>">
						  	<input type="hidden" name="txtlaplanilla" value="<?php echo $laplanila;?>">
						  	
						  	
							<div class="card-body">
							<div class="row">
							  	<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Dias</label>
								<div class="col-sm-4">
									<input type="number" name="txtdias" min="1" max="31" value="<?php echo $rowCodigo['dias'];?>" class="form-control" autofocus>
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
								
								<label class="col-sm-2 col-form-label"></label>
								<label class="col-sm-2 col-form-label">Faltas</label>
								<div class="col-sm-4">
									<input type="number" name="txtfaltas" min="0" max="31" value="<?php echo $rowCodigo['falta'];?>" class="form-control">
								</div>
								<label class="col-sm-4 col-form-label"></label>
								
							  </div>					  	  
					  	  
					  	  
					  	  
						  	  <div class="row">
						  	  	<label class="col-sm-6 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">INGRESOS</label>
						  	  	<label class="col-sm-6 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">DESCUENTOS</label>			
						  	  </div>
							  <div class="row">
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso1']; ?></label>
								<div class="col-sm-3">							  	  
								  <input type="text" class="form-control" name="txtingreso1" value="<?php echo $rowTrabajador['sueldo'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['afp1']; ?></label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtafp1" value="<?php echo $rowCodigo['afp1'];?>" readonly>
								</div>
								
										
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso2']; ?></label>
									<?php
										if ($rowusuario['ingreso2'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso2" value="<?php echo $rowCodigo['ingreso2'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['afp2']; ?></label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtafp2" value="<?php echo $rowCodigo['afp2'];?>" readonly>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso3']; ?></label>
									<?php
										if ($rowusuario['ingreso3'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso3" value="<?php echo $rowCodigo['ingreso3'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['afp3']; ?></label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtafp3" value="<?php echo $rowCodigo['afp3'];?>" readonly>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso4']; ?></label>
									<?php
										if ($rowusuario['ingreso4'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso4" value="<?php echo $rowCodigo['ingreso4'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['onp']; ?></label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtonp" value="<?php echo $rowplanilla['onp'];?>" readonly>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso5']; ?></label>
									<?php
										if ($rowusuario['ingreso5'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso5" value="<?php echo $rowCodigo['ingreso5'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ies']; ?></label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txties" value="<?php echo $rowplanilla['ies'];?>" readonly>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso6']; ?></label>
									<?php
										if ($rowusuario['ingreso6'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso6" value="<?php echo $rowCodigo['ingreso6'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ipssvida']; ?></label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtipssvida" value="<?php echo $rowplanilla['ipssvida'];?>" readonly>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso7']; ?></label>
									<?php
										if ($rowusuario['ingreso7'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso7" value="<?php echo $rowCodigo['ingreso7'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['quinta']; ?></label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtquinta" value="<?php echo $rowplanilla['quinta'];?>" readonly>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso8']; ?></label>
									<?php
										if ($rowusuario['ingreso8'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso8" value="<?php echo $rowCodigo['ingreso8'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento1']; ?></label>
									<?php
										if ($rowusuario['descuento1'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento1" value="<?php echo $rowCodigo['descuento1'];?>" <?php echo $op;?>>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso9']; ?></label>
									<?php
										if ($rowusuario['ingreso9'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso9" value="<?php echo $rowCodigo['ingreso9'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento2']; ?></label>
									<?php
										if ($rowusuario['descuento2'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento2" value="<?php echo $rowCodigo['descuento2'];?>" <?php echo $op;?>>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso10']; ?></label>
									<?php
										if ($rowusuario['ingreso10'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso10" value="<?php echo $rowCodigo['ingreso10'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento3']; ?></label>
									<?php
										if ($rowusuario['descuento3'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento3" value="<?php echo $rowCodigo['descuento3'];?>" <?php echo $op;?>>
								</div>
								
																								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso11']; ?></label>
									<?php
										if ($rowusuario['ingreso11'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso11" value="<?php echo $rowCodigo['ingreso11'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento4']; ?></label>
									<?php
										if ($rowusuario['descuento4'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento4" value="<?php echo $rowCodigo['descuento4'];?>" <?php echo $op;?>>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso12']; ?></label>
									<?php
										if ($rowusuario['ingreso12'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso12" value="<?php echo $rowCodigo['ingreso12'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento5']; ?></label>
									<?php
										if ($rowusuario['descuento5'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento5" value="<?php echo $rowCodigo['descuento5'];?>" <?php echo $op;?>>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso13']; ?></label>
									<?php
										if ($rowusuario['ingreso13'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso13" value="<?php echo $rowCodigo['ingreso13'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento6']; ?></label>
									<?php
										if ($rowusuario['descuento6'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento6" value="<?php echo $rowCodigo['descuento6'];?>" <?php echo $op;?>>
								</div>
																								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso14']; ?></label>
									<?php
										if ($rowusuario['ingreso14'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso14" value="<?php echo $rowCodigo['ingreso14'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento7']; ?></label>
									<?php
										if ($rowusuario['descuento7'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento7" value="<?php echo $rowCodigo['descuento7'];?>" <?php echo $op;?>>
								</div>
							
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso15']; ?></label>
									<?php
										if ($rowusuario['ingreso15'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso15" value="<?php echo $rowCodigo['ingreso15'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento8']; ?></label>
									<?php
										if ($rowusuario['descuento8'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento8" value="<?php echo $rowCodigo['descuento8'];?>" <?php echo $op;?>>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso16']; ?></label>
									<?php
										if ($rowusuario['ingreso16'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso16" value="<?php echo $rowCodigo['ingreso16'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento9']; ?></label>
									<?php
										if ($rowusuario['descuento9'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento9" value="<?php echo $rowCodigo['descuento9'];?>" <?php echo $op;?>>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso17']; ?></label>
									<?php
										if ($rowusuario['ingreso17'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso17" value="<?php echo $rowCodigo['ingreso17'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento10']; ?></label>
									<?php
										if ($rowusuario['descuento10'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento10" value="<?php echo $rowCodigo['descuento10'];?>" <?php echo $op;?>>
								</div>
								
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso18']; ?></label>
									<?php
										if ($rowusuario['ingreso18'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso18" value="<?php echo $rowCodigo['ingreso18'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento11']; ?></label>
									<?php
										if ($rowusuario['descuento11'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento11" value="<?php echo $rowCodigo['descuento11'];?>" <?php echo $op;?>>
								</div>								
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso19']; ?></label>
									<?php
										if ($rowusuario['ingreso19'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso19" value="<?php echo $rowCodigo['ingreso19'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento12']; ?></label>
									<?php
										if ($rowusuario['descuento12'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento12" value="<?php echo $rowCodigo['descuento12'];?>" <?php echo $op;?>>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso20']; ?></label>
									<?php
										if ($rowusuario['ingreso20'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso20" value="<?php echo $rowCodigo['ingreso20'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento13']; ?></label>
									<?php
										if ($rowusuario['descuento13'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento13" value="<?php echo $rowCodigo['descuento13'];?>" <?php echo $op;?>>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso21']; ?></label>
									<?php
										if ($rowusuario['ingreso21'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso21" value="<?php echo $rowCodigo['ingreso21'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento14']; ?></label>
									<?php
										if ($rowusuario['descuento14'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento14" value="<?php echo $rowCodigo['descuento14'];?>" <?php echo $op;?>>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso22']; ?></label>
									<?php
										if ($rowusuario['ingreso22'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso22" value="<?php echo $rowCodigo['ingreso22'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento15']; ?></label>
									<?php
										if ($rowusuario['descuento15'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento15" value="<?php echo $rowCodigo['descuento15'];?>" <?php echo $op;?>>
								</div>
							
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso23']; ?></label>
									<?php
										if ($rowusuario['ingreso23'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso23" value="<?php echo $rowCodigo['ingreso23'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento16']; ?></label>
									<?php
										if ($rowusuario['descuento16'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento16" value="<?php echo $rowCodigo['descuento16'];?>" <?php echo $op;?>>
								</div>
								
								
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['ingreso24']; ?></label>
									<?php
										if ($rowusuario['ingreso24'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtingreso24" value="<?php echo $rowCodigo['ingreso24'];?>" <?php echo $op;?>>
								</div>
								<label class="col-sm-3 col-form-label"><?php echo $rowusuario['descuento17']; ?></label>
									<?php
										if ($rowusuario['descuento17'])
										{
											$op='';
										}
										else
										{
											$op='hidden';
										}
									?>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtdescuento17" value="<?php echo $rowCodigo['descuento17'];?>" <?php echo $op;?>>
								</div>
								
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
                  <a href="descuentoproceso.php?micodigo=<?php echo $laplanila;?>"><button type="button" class="btn btn-danger float-right">Regresar</button></a>
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