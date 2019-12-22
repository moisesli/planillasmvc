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

		$oEntidad=new Negocio_clsConfiguracion();
		$rsEntidad=$oEntidad->Buscar_Entidad($miempresa,$miperiodo);
		$asignapor=$rsEntidad['asignacion']/100;
		$sueldobasico=$rsEntidad['sueldo'];
		$cts=$rsEntidad['cts']/100;
		$miasignacion=$sueldobasico*$asignapor;

		$rsempleador=$oEntidad->Buscar_aporteempleador($miempresa,$miperiodo);
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- BARRA -->		
<?php
	require_once '../libreria/cuerpo/barra.php';
	require_once '../libreria/cuerpo/menu.php';
	include("../config.php");
	
?>
<script language = "javascript">
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
function grabar1(miopcion)
{ //esta es la funcion que envia los datos de manea asincrona
	divResultado = document.getElementById('milista1');
	laopcion=miopcion;	
	codtra=document.formulario1.txtcodtra.value;	
	clave1=document.formulario1.txtdetalle.value;
	clave2=document.formulario1.txtdes.value;
	clave3=document.formulario1.txtobserva.value;
	
	ajax=objetoAjax();
	ajax.open("POST", "escalafongrabar.php",true);
	divResultado.innerHTML= 'Mostrando...';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("codtra="+codtra+"&laopcion="+laopcion+"&clave1="+clave1+"&clave2="+clave2+"&clave3="+clave3);

}
function grabar2(miopcion)
{ //esta es la funcion que envia los datos de manea asincrona
	divResultado = document.getElementById('milista2');
	laopcion=miopcion;	
	codtra=document.formulario2.txtcodtra2.value;	
	clave1=document.formulario2.txtdetalle2.value;
	clave2=document.formulario2.txtdes2.value;
	clave3=document.formulario2.txtobserva2.value;
	
	ajax=objetoAjax();
	ajax.open("POST", "escalafongrabar2.php",true);
	divResultado.innerHTML= 'Mostrando...';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("codtra="+codtra+"&laopcion="+laopcion+"&clave1="+clave1+"&clave2="+clave2+"&clave3="+clave3);

}
function vertiempo()
{ //esta es la funcion que envia los datos de manea asincrona
	divResultado = document.getElementById('vertiempo');

	clave1=document.formulario1.txtfechaini.value;	
	clave2=document.formulario1.txtfechafin.value;
	
	ajax=objetoAjax();
	ajax.open("POST", "fechas.php",true);
	divResultado.innerHTML= 'Mostrando...';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("clave1="+clave1+"&clave2="+clave2);

}
</script> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liquidaciones - <strong style="color: #9A0204"><?php echo $rsTrabajador['apellidos'].' '.$rsTrabajador['apellidos2'].' '.$rsTrabajador['nombres'];?></strong></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="liquidacion.php">Liquidaciones</a></li>
              <li class="breadcrumb-item"><a href="trabajadorliq.php">Trabajadores</a></li>
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
                <h3 class="card-title"><a href="trabajadorliq.php" title="Regresar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Liquidaciones - Nuevo.</h3>                                
              </div>
               	<!-- conyemido -->
					<div class="card card-primary card-outline card-outline-tabs">
					  <div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
						  <li class="nav-item">
							<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true"><strong>Liquidacion.</strong></a>
						  </li>
						  
						  
						</ul>
					  </div>
					  <div class="card-body">
						<div class="tab-content" id="custom-tabs-three-tabContent">
						  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
						  
							<div class="card-body">
				  	  	  
					  	  	  <form name="formulario1" action="liquidacionnuevograbar.php" method="post">
					  	  	  	<input type="hidden" name="txtcts" value="<?php echo $cts;?>">
					  	  	  	<input type="hidden" name="txtsueldobasico" value="<?php echo $sueldobasico;?>">
					  	  	  	
						  	  	<label class="col-sm-12 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">DATOS PERSONALES</label>
						  	  
						  	  <input type="hidden" name="txtcodtra" value="<?php echo $elcodigo; ?>">
							  <div class="row">							  	
								<label class="col-sm-3 col-form-label">Apellidos y Nombres</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtapellidos" value="<?php echo $rsTrabajador['apellidos'].' '.$rsTrabajador['apellidos2'].' '.$rsTrabajador['nombres'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Dni</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdni" value="<?php echo $rsTrabajador['numdocu'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Cargo</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtcargo" value="<?php echo $rsTrabajador['cargo'];?>" readonly>
								</div>
								
								<label class="col-sm-3 col-form-label">Fec. Ingreso</label>
								<div class="col-sm-3">
								  <input type="date" class="form-control" name="txtfechaini" value="<?php echo $rsTrabajador['fini'];?>" autofocus>
								</div>
								<label class="col-sm-3 col-form-label">Fecha Cese.</label>
								<div class="col-sm-3">
								  <input type="date" class="form-control" name="txtfechafin" value="<?php echo $rsTrabajador['ffin'];?>">
								</div>
								<div class="col-sm-3">
								  <button class="btn btn-success" type="button" onClick="vertiempo();">Ver Tiempo</button>
								</div>
								
								<label class="col-sm-3 col-form-label">Tiempo de Servicio</label>
								<div class="col-sm-6">
							  		<div id="vertiempo">
								  <input type="text" class="form-control" name="txttiempo" readonly>
									</div>  
								</div>
								
								<label class="col-sm-3 col-form-label">Faltas</label>
								<div class="col-sm-3">
								  <input type="number" class="form-control" name="txtfalta">
								</div>
								<label class="col-sm-2 col-form-label">Motivo Cese.</label>
								<div class="col-sm-4">
								  <input type="text" class="form-control" name="txtmotivo">
								</div>

						  
						  	  
						  	  	<label class="col-sm-12 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">REMUNERACION COMPUTABLE</label>
						  	  
								<label class="col-sm-3 col-form-label">Sueldo</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtsueldo" value="<?php echo $rsTrabajador['sueldo'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Asig. Familiar</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtasignacion" value="<?php echo number_format($miasignacion,2);?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Prom. Comisiones</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtcomision">
								</div>
								<label class="col-sm-3 col-form-label">Prom. Horas Extras</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtextras" >
								</div>
								<label class="col-sm-3 col-form-label">Otros</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtotro">
								</div>
								<label class="col-sm-3 col-form-label">Sexto Gratif.</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtsexto" >
								</div>
						  
						  		<label class="col-sm-12 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">INGRESOS - <strong style="font-size: 18px; font-weight: bold; color: #220790">Compensación por Tiempo de Servicio (CTS)</strong></label>
						  								  		
						  		
						  		<label class="col-sm-4 col-form-label">Tiempo por Pagar</label>
						  		<label class="col-sm-2 col-form-label">Meses</label>
								<div class="col-sm-2">
								  <input type="number" class="form-control" name="txtctsmes" >
								</div>
						  		<label class="col-sm-2 col-form-label">Dias</label>
								<div class="col-sm-2">
								  <input type="number" class="form-control" name="txtctsdia">
								</div>
								
						  		 
						  		 <label class="col-sm-12 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">INGRESOS - <strong style="font-size: 18px; font-weight: bold; color: #220790">Vacaciones Truncas.</strong></label>
						  		 
						  		<label class="col-sm-2 col-form-label">Dias Pend.</label>
								<div class="col-sm-2">
								  <input type="number" class="form-control" name="txtvacadiapen">
								</div>
						  		<label class="col-sm-2 col-form-label">Meses Efectivos</label>
								<div class="col-sm-2">
								  <input type="number" class="form-control" name="txtvacamesefec">
								</div>
						  		<label class="col-sm-2 col-form-label">Dias Efectivos</label>
								<div class="col-sm-2">
								  <input type="number" class="form-control" name="txtvacadiaefec">
								</div>
						  		 						  		
						  		<label class="col-sm-12 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">INGRESOS - <strong style="font-size: 18px; font-weight: bold; color: #220790">Gratificaciones Truncas.</strong></label>
						  		
						  		<label class="col-sm-3 col-form-label">Meses Efectivos</label>
								<div class="col-sm-3">
								  <input type="number" class="form-control" name="txtgratimesefec">
								</div>
						  		<label class="col-sm-3 col-form-label">Bono Ley 30334 (%)</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtgratibonopor" value="<?php echo $rsempleador['essalud'];?>" readonly>
								</div>
						  								  		
						  		<label class="col-sm-12 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">INGRESOS - <strong style="font-size: 18px; font-weight: bold; color: #220790">Otros Ingresos.</strong></label>
						  		
								<label class="col-sm-3 col-form-label">Indemnización Vacacional</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtotro1">
								</div>
								<label class="col-sm-3 col-form-label">Devolución 5ta.</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtotro2">
								</div>
								<label class="col-sm-3 col-form-label">Remuneración Mensual</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtotro3">
								</div>
								<label class="col-sm-3 col-form-label">Movilidad Supeditada a Asist</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtotro4" >
								</div>
						  		
							  </div>

									<div class="card-footer">
									  <button type="submit" class="btn btn-primary" onclick="return seguro();">Calcular y Grabar Liquidacion</button>
									  <a href="trabajadorliq.php"><button type="button" class="btn btn-danger float-right">Regresar</button></a>
									</div>                
							  
							  </form>
							</div>	
							
						  </div>
							
						  </div>
						  
						</div>
					  </div>
					  <!-- /.card -->
					</div>
              
            </div>
          </div>
         <div class="col-md-2">
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