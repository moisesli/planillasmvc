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
	$elcodliquidacion=$_GET['elcodliquidacion'];	
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
		
		$oLiquidacion=new Negocio_clsLiquidacion();

		$rsliquidacion=$oLiquidacion->getROW($elcodliquidacion);
		$rsliquidatos=$oLiquidacion->Buscar_Liquidatos($elcodliquidacion);
		$rsliquicompu=$oLiquidacion->Buscar_Liquicompu($elcodliquidacion);
		$rsliquicts=$oLiquidacion->Buscar_Liquicts($elcodliquidacion);
		$rsliquivaca=$oLiquidacion->Buscar_Liquivaca($elcodliquidacion);
		$rsliquigrati=$oLiquidacion->Buscar_Liquigrati($elcodliquidacion);
		$rsliquiotro=$oLiquidacion->Buscar_Liquiotro($elcodliquidacion);
		$rsliquiessalud=$oLiquidacion->Buscar_Liquiessalud($elcodliquidacion);
		$rsliquiafp=$oLiquidacion->Buscar_Liquiafp($elcodliquidacion);

		$totalingresos=$rsliquicts['total']+$rsliquivaca['total']+$rsliquigrati['total']+$rsliquiotro['total'];

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
                <h3 class="card-title"><a href="trabajadorliq.php" title="Regresar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Liquidaciones - Modificar.</h3>                                
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
				  	  	  
					  	  	  <form name="formulario1" action="liquidacionmodificargrabar.php" method="post">
					  	  	  	<input type="hidden" name="txtcts" value="<?php echo $cts;?>">
					  	  	  	<input type="hidden" name="txtsueldobasico" value="<?php echo $sueldobasico;?>">
					  	  	  	<input type="hidden" name="txtcodtra" value="<?php echo $elcodigo; ?>">	
					  	  	  	<input type="hidden" name="elcodliquidacion" value="<?php echo $elcodliquidacion;?>">
					  	  	  	
					  	  	  	
						  	  	<label class="col-sm-12 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">DATOS PERSONALES</label>
						  	  
						  	  
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
								  <input type="date" class="form-control" name="txtfechaini" value="<?php echo $rsliquidatos['fechaini'];?>" autofocus>
								</div>
								<label class="col-sm-3 col-form-label">Fecha Cese.</label>
								<div class="col-sm-3">
								  <input type="date" class="form-control" name="txtfechafin" value="<?php echo $rsliquidatos['fechafin'];?>">
								</div>
								<div class="col-sm-3">
								  <button class="btn btn-success" type="button" onClick="vertiempo();">Ver Tiempo</button>
								</div>
								
								<label class="col-sm-3 col-form-label">Tiempo de Servicio</label>
								<div class="col-sm-6">
							  		<div id="vertiempo">
								  <input type="text" class="form-control" name="txttiempo" value="<?php echo $rsliquidatos['tiempo'];?>" readonly>
									</div>  
								</div>
								
								<label class="col-sm-3 col-form-label">Faltas</label>
								<div class="col-sm-3">
								  <input type="number" class="form-control" name="txtfalta" value="<?php echo $rsliquidatos['faltas'];?>">
								</div>
								<label class="col-sm-2 col-form-label">Motivo Cese.</label>
								<div class="col-sm-4">
								  <input type="text" class="form-control" name="txtmotivo" value="<?php echo $rsliquidatos['motivo'];?>">
								</div>

						  
						  	  
						  	  	<label class="col-sm-12 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">REMUNERACION COMPUTABLE</label>
						  	  
								<label class="col-sm-3 col-form-label">Sueldo</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtsueldo" value="<?php echo $rsliquicompu['sueldo'];?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Asig. Familiar</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtasignacion" value="<?php echo number_format($rsliquicompu['asignacion'],2);?>" readonly>
								</div>
								<label class="col-sm-3 col-form-label">Prom. Comisiones</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtcomision" value="<?php echo $rsliquicompu['comision'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Prom. Horas Extras</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtextras" value="<?php echo $rsliquicompu['extras'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Otros</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtotro" value="<?php echo $rsliquicompu['otro'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Sexto Gratif.</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtsexto" value="<?php echo $rsliquicompu['sexto'];?>">
								</div>

								<label class="col-sm-3 col-form-label"></label>
								<div class="col-sm-3">
								  
								</div>																
								<label class="col-sm-3 col-form-label" style="color: #0D05BD">TOTAL</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txttotalcompu" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquicompu['total'],2);?>" readonly>
								</div>
						  
						  		<label class="col-sm-12 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">INGRESOS - <strong style="font-size: 18px; font-weight: bold; color: #220790">Compensación por Tiempo de Servicio (CTS)</strong></label>
						  								  		
						  		
						  		<label class="col-sm-4 col-form-label">Tiempo por Pagar</label>
						  		<label class="col-sm-2 col-form-label">Meses</label>
								<div class="col-sm-2">
								  <input type="number" class="form-control" name="txtctsmes" value="<?php echo $rsliquicts['meses'];?>">
								</div>
						  		<label class="col-sm-2 col-form-label">Dias</label>
								<div class="col-sm-2">
								  <input type="number" class="form-control" name="txtctsdia" value="<?php echo $rsliquicts['dias'];?>">
								</div>

						  		<label class="col-sm-4 col-form-label"></label>
						  		<label class="col-sm-2 col-form-label"></label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtMES1" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquicts['montomes'],2);?>" readonly>
								</div>
						  		<label class="col-sm-2 col-form-label"></label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtMES2" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquicts['montodia'],2);?>" readonly>
								</div>
					  		 								
						  		<label class="col-sm-4 col-form-label"></label>
						  		<label class="col-sm-2 col-form-label"></label>
								<div class="col-sm-2">
								</div>
						  		<label class="col-sm-2 col-form-label" style="color: #0D05BD">TOTAL</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquicts['total'],2);?>" readonly>
								</div>
						  		 
						  		 <label class="col-sm-12 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">INGRESOS - <strong style="font-size: 18px; font-weight: bold; color: #220790">Vacaciones Truncas.</strong></label>

						  		<label class="col-sm-3 col-form-label">Tiempo Computable</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtaaa" value="<?php echo $rsliquivaca['tiempocom'];?>" readonly>
								</div>
						  		 						  		 
						  		<label class="col-sm-2 col-form-label">Dias Pend.</label>
								<div class="col-sm-2">
								  <input type="number" class="form-control" name="txtvacadiapen" value="<?php echo $rsliquivaca['diaspendiente'];?>">
								</div>
						  		<label class="col-sm-2 col-form-label">Meses Efectivos</label>
								<div class="col-sm-2">
								  <input type="number" class="form-control" name="txtvacamesefec" value="<?php echo $rsliquivaca['mesesefectivo'];?>">
								</div>
						  		<label class="col-sm-2 col-form-label">Dias Efectivos</label>
								<div class="col-sm-2">
								  <input type="number" class="form-control" name="txtvacadiaefec" value="<?php echo $rsliquivaca['diasefectivos'];?>">
								</div>

						  		<label class="col-sm-2 col-form-label"></label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquivaca['montodiapen'],2);?>" readonly>
								</div>
						  		<label class="col-sm-2 col-form-label"></label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquivaca['montomespen'],2);?>" readonly>
								</div>
						  		<label class="col-sm-2 col-form-label"></label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquivaca['montodiaefec'],2);?>" readonly>
								</div>
					  		
						  		<label class="col-sm-2 col-form-label"></label>
								<div class="col-sm-2">								  
								</div>
						  		<label class="col-sm-2 col-form-label"></label>
								<div class="col-sm-2">
								</div>
						  		<label class="col-sm-2 col-form-label" style="color: #0D05BD">TOTAL</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquivaca['total'],2);?>" readonly>
								</div>
					  		
					  		
					  		
					  		
						  		<label class="col-sm-12 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">INGRESOS - <strong style="font-size: 18px; font-weight: bold; color: #220790">Gratificaciones Truncas.</strong></label>
						  		
						  		<label class="col-sm-3 col-form-label">Tiempo Por Pagar</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtaaa" value="<?php echo $rsliquigrati['tiempo'];?>" readonly>
								</div>
						  		
						  		<label class="col-sm-3 col-form-label">Meses Efectivos</label>
								<div class="col-sm-3">
								  <input type="number" class="form-control" name="txtgratimesefec" value="<?php echo $rsliquigrati['mesefectivo'];?>">
								</div>
						  		<label class="col-sm-3 col-form-label">Bono Ley 30334 (%)</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtgratibonopor" value="<?php echo $rsliquigrati['bonoley'];?>" readonly>
								</div>

						  		<label class="col-sm-3 col-form-label"></label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquigrati['montomes'],2);?>" readonly>
								</div>
						  		<label class="col-sm-3 col-form-label"></label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquigrati['montobono'],2);?>" readonly>
								</div>
					  								  								  								  		
						  		<label class="col-sm-3 col-form-label"></label>
								<div class="col-sm-3">
								</div>
						  		<label class="col-sm-3 col-form-label" style="color: #0D05BD">TOTAL</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquigrati['total'],2);?>" readonly>
								</div>
					  								  								  								  		
					  								  								  								  		
					  								  								  								  		
						  								  								  								  		
						  		<label class="col-sm-12 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">INGRESOS - <strong style="font-size: 18px; font-weight: bold; color: #220790">Otros Ingresos.</strong></label>
						  		
								<label class="col-sm-3 col-form-label">Indemnización Vacacional</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtotro1" value="<?php echo $rsliquiotro['vaca'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Devolución 5ta.</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtotro2" value="<?php echo $rsliquiotro['quinta'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Remuneración Mensual</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtotro3" value="<?php echo $rsliquiotro['remun'];?>">
								</div>
								<label class="col-sm-3 col-form-label">Movilidad Supeditada a Asist</label>
								<div class="col-sm-3">
								  <input type="text" class="form-control" name="txtotro4" value="<?php echo $rsliquiotro['movil'];?>">
								</div>
					  		
								<label class="col-sm-3 col-form-label"></label>
								<div class="col-sm-3">
								</div>
								<label class="col-sm-3 col-form-label" style="color: #0D05BD">TOTAL</label>
								<div class="col-sm-3">
								   <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquiotro['total'],2);?>" readonly>
								</div>
					  		
								<label class="col-sm-3 col-form-label"></label>
								<div class="col-sm-3">
								</div>
								<label class="col-sm-3 col-form-label" style="color: #C561E5; font-size: 22px">TOTAL INGRESOS</label>
								<div class="col-sm-3">
								   <input type="text" class="form-control" name="txtMES22" style="color: #4800CD; font-weight: bold; font-size: 22px" value="<?php echo number_format($totalingresos,2);?>" readonly>
								</div>

						  							
						  								  		
								<label class="col-sm-12 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">DESCUENTOS - <strong style="font-size: 18px; font-weight: bold; color: #220790">Afp - Onp.</strong></label>						  								  			  		
					  								  			  			  			  		
						  		<label class="col-sm-4 col-form-label">Afp - Aporte Obligatorio (%)</label>
								<div class="col-sm-4">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquiafp['afp1']*100,2);?>" readonly>
								</div>
								<div class="col-sm-4">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquiafp['montoafp1'],2);?>" readonly>
								</div>
					  								  			  			  			  		
						  		<label class="col-sm-4 col-form-label">Afp - Seguros (%)</label>
								<div class="col-sm-4">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquiafp['afp2']*100,2);?>" readonly>
								</div>
								<div class="col-sm-4">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquiafp['montoafp2'],2);?>" readonly>
								</div>
					  								  			  			  			  		
						  								  			  			  			  		
						  		<label class="col-sm-4 col-form-label">Afp - Comis. Porc. / Flujo (%)</label>
								<div class="col-sm-4">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquiafp['afp3']*100,2);?>" readonly>
								</div>
								<div class="col-sm-4">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquiafp['montoafp3'],2);?>" readonly>
								</div>
								
						  		<label class="col-sm-4 col-form-label">Onp (%)</label>
								<div class="col-sm-4">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquiafp['onp']*100,2);?>" readonly>
								</div>
								<div class="col-sm-4">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquiafp['montoonp'],2);?>" readonly>
								</div>
								
								<label class="col-sm-3 col-form-label"></label>
								<div class="col-sm-3">
								</div>
								<label class="col-sm-3 col-form-label" style="color: #C561E5; font-size: 22px">TOTAL DESCUENTOS</label>
								<div class="col-sm-3">
								   <input type="text" class="form-control" name="txtMES22" style="color: #4800CD; font-weight: bold; font-size: 22px" value="<?php echo number_format($rsliquiafp['total'],2);?>" readonly>
								</div>
								
								
								<label class="col-sm-12 col-form-label" style="font-size: 18px; font-weight: bold; color: #B10306">APORTES EMPLEADOR - <strong style="font-size: 18px; font-weight: bold; color: #220790">Essalud.</strong></label>						  								  	
						  		<label class="col-sm-4 col-form-label">Essalud</label>
								<div class="col-sm-4">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquiessalud['essalud']*100,2);?>" readonly>
								</div>
								<div class="col-sm-4">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquiessalud['montoessalud'],2);?>" readonly>
								</div>
								
						  		<label class="col-sm-4 col-form-label"></label>
								<label class="col-sm-4 col-form-label">TOTAL APORTE.</label>
								<div class="col-sm-4">
								  <input type="text" class="form-control" name="txtMES22" style="color: #CD0104; font-weight: bold" value="<?php echo number_format($rsliquiessalud['montoessalud'],2);?>" readonly>
								</div>

								
								<label class="col-sm-3 col-form-label"></label>
								<div class="col-sm-3">
								</div>
								<label class="col-sm-3 col-form-label" style="color: #D5A270; font-size: 22px">NETO A PAGAR</label>
								<div class="col-sm-3">
								   <input type="text" class="form-control" name="txtMES22" style="color: #D5A270; font-weight: bold; font-size: 22px" value="<?php echo number_format($totalingresos-$rsliquiafp['total'],2);?>" readonly>
								</div>
																
																																
							  </div>

									<div class="card-footer">
									  <button type="submit" class="btn btn-primary" onclick="return seguro();">Calcular y Grabar Liquidacion</button>
									  <a href="liquidacion.php"><button type="button" class="btn btn-danger float-right">Regresar</button></a>
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