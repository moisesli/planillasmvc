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
function grabar3(miopcion)
{ //esta es la funcion que envia los datos de manea asincrona
	divResultado = document.getElementById('milista3');
	laopcion=miopcion;	
	codtra=document.formulario3.txtcodtra3.value;	
	clave1=document.formulario3.txtdetalle3.value;
	clave2=document.formulario3.txtdes3.value;
	clave3=document.formulario3.txtobserva3.value;
	
	ajax=objetoAjax();
	ajax.open("POST", "escalafongrabar3.php",true);
	divResultado.innerHTML= 'Mostrando...';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("codtra="+codtra+"&laopcion="+laopcion+"&clave1="+clave1+"&clave2="+clave2+"&clave3="+clave3);

}
function grabar4(miopcion)
{ //esta es la funcion que envia los datos de manea asincrona
	divResultado = document.getElementById('milista4');
	laopcion=miopcion;	
	codtra=document.formulario4.txtcodtra4.value;	
	clave1=document.formulario4.txtdetalle4.value;
	clave2=document.formulario4.txtdes4.value;
	clave3=document.formulario4.txtobserva4.value;
	
	ajax=objetoAjax();
	ajax.open("POST", "escalafongrabar4.php",true);
	divResultado.innerHTML= 'Mostrando...';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("codtra="+codtra+"&laopcion="+laopcion+"&clave1="+clave1+"&clave2="+clave2+"&clave3="+clave3);

}
	
function eliminar1(miopcion,micodigo)
{ //esta es la funcion que envia los datos de manea asincrona
	divResultado = document.getElementById('milista1');
	laopcion=miopcion;
	micodigo=micodigo;
	codtra=document.formulario1.txtcodtra.value;	
	
	ajax=objetoAjax();
	ajax.open("POST", "escalafoneliminar.php",true);
	divResultado.innerHTML= 'Mostrando...';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("codtra="+codtra+"&laopcion="+laopcion+"&micodigo="+micodigo);

}
function eliminar2(miopcion,micodigo)
{ //esta es la funcion que envia los datos de manea asincrona
	divResultado = document.getElementById('milista2');
	laopcion=miopcion;
	micodigo=micodigo;
	codtra=document.formulario2.txtcodtra2.value;	
	
	ajax=objetoAjax();
	ajax.open("POST", "escalafoneliminar2.php",true);
	divResultado.innerHTML= 'Mostrando...';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("codtra="+codtra+"&laopcion="+laopcion+"&micodigo="+micodigo);

}
function eliminar3(miopcion,micodigo)
{ //esta es la funcion que envia los datos de manea asincrona
	divResultado = document.getElementById('milista3');
	laopcion=miopcion;
	micodigo=micodigo;
	codtra=document.formulario3.txtcodtra3.value;	
	
	ajax=objetoAjax();
	ajax.open("POST", "escalafoneliminar3.php",true);
	divResultado.innerHTML= 'Mostrando...';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("codtra="+codtra+"&laopcion="+laopcion+"&micodigo="+micodigo);

}
function eliminar4(miopcion,micodigo)
{ //esta es la funcion que envia los datos de manea asincrona
	divResultado = document.getElementById('milista4');
	laopcion=miopcion;
	micodigo=micodigo;
	codtra=document.formulario4.txtcodtra4.value;	
	
	ajax=objetoAjax();
	ajax.open("POST", "escalafoneliminar4.php",true);
	divResultado.innerHTML= 'Mostrando...';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("codtra="+codtra+"&laopcion="+laopcion+"&micodigo="+micodigo);

}
	
</script>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- BARRA -->		
<?php
	require_once '../libreria/cuerpo/barra.php';
	require_once '../libreria/cuerpo/menu.php';
	include("../config.php");
	
?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Empleados - Escalafon - <strong style="color: #9A0204"><?php echo $rsTrabajador['apellidos'].' '.$rsTrabajador['apellidos2'].' '.$rsTrabajador['nombres'];?></strong></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="escalafon.php">Empleados</a></li>
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
                <h3 class="card-title"><a href="escalafon.php" title="Modificar"><button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button></a>Escalafon.</h3>                                
              </div>
               	<!-- conyemido -->
					<div class="card card-primary card-outline card-outline-tabs">
					  <div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
						  <li class="nav-item">
							<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true"><strong>Personales</strong></a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-laboral" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false"><strong>Estudios</strong></a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false"><strong>Trabajos</strong></a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false"><strong>Otros</strong></a>
						  </li>
						  
						</ul>
					  </div>
					  <div class="card-body">
						<div class="tab-content" id="custom-tabs-three-tabContent">
						  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
						  	<div id="milista1">
							<div class="card-body">
						  	  <form name="formulario1" action="#" method="post">
						  	  <input type="hidden" name="txtcodtra" value="<?php echo $elcodigo; ?>">
							  <div class="row">							  	
								<label class="col-sm-3 col-form-label">Detalle</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdetalle" required autofocus>
								</div>
								<label class="col-sm-3 col-form-label">Descripcion</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdes" required>
								</div>
								<label class="col-sm-3 col-form-label">Observacion</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtobserva" required>
								</div>
								<br><br>
								<div class="col-sm-12" align="center">
									<button type="button" class="btn btn-primary" onclick="grabar1('1');">Grabar</button>
								</div>
								<div class="col-sm-12">
									
											<div class="card">
											  <!-- /.card-header -->
											  <div class="card-body p-0">
												<table class="table table-condensed">
												  <thead>
													<tr>
													  <th>#</th>
													  <th>Detalle</th>
													  <th>Desc.</th>
													  <th>Obs.</th>
													  <th>Eli</th>
													</tr>
												  </thead>
												  <tbody>
													<?php					  
														$olistado=new Negocio_clsTablas();
														$rslistado=$olistado->MostrarEscalafon($elcodigo,'1');			
														while($rowusuario=$rslistado->fetch_array())
														{
													?>                   
														<tr>
															<td><?php echo $rowusuario['codigo'];?></td>
															<td><?php echo $rowusuario['detalle'];?></td>
															<td><?php echo $rowusuario['descripcion'];?></td>
															<td><?php echo $rowusuario['observa'];?></td>

															<td align="center"><button class="btn btn-danger" type="button" onclick="eliminar1('1',<?php echo $rowusuario['codigo'];?>);"><i class="nav-icon fas fa-eraser"></i></button></td>
														</tr>
												   <?php
														}
													?>  
												  </tbody>
												</table>
											  </div>
											  <!-- /.card-body -->
											</div>
																			
									
								</div>
							  </div>
							  </form>
							</div>	
							</div>							  
							
						  </div>
						  
						  <div class="tab-pane fade" id="custom-tabs-three-laboral" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
							<div id="milista2">
								<div class="card-body">
								  <form name="formulario2" action="#" method="post">
								  <input type="hidden" name="txtcodtra2" value="<?php echo $elcodigo; ?>">
								  <div class="row">							  	
									<label class="col-sm-3 col-form-label">Grado de Instruccion</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" name="txtdetalle2" required autofocus>
									</div>
									<label class="col-sm-3 col-form-label">Institucion Educativa</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" name="txtdes2" required>
									</div>
									<label class="col-sm-3 col-form-label">Año de Graduacion</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" name="txtobserva2" required>
									</div>
									<br><br>
									<div class="col-sm-12" align="center">
										<button type="button" class="btn btn-primary" onclick="grabar2('2');">Grabar</button>
									</div>
									<div class="col-sm-12">

												<div class="card">
												  <!-- /.card-header -->
												  <div class="card-body p-0">
													<table class="table table-condensed">
													  <thead>
														<tr>
														  <th>#</th>
														  <th>Grado</th>
														  <th>Institucion</th>
														  <th>Año</th>
														  <th>Eli</th>
														</tr>
													  </thead>
													  <tbody>
														<?php					  
															$olistado=new Negocio_clsTablas();
															$rslistado=$olistado->MostrarEscalafon($elcodigo,'2');			
															while($rowusuario=$rslistado->fetch_array())
															{
														?>                   
															<tr>
																<td><?php echo $rowusuario['codigo'];?></td>
																<td><?php echo $rowusuario['detalle'];?></td>
																<td><?php echo $rowusuario['descripcion'];?></td>
																<td><?php echo $rowusuario['observa'];?></td>

																<td align="center"><button class="btn btn-danger" type="button" onclick="eliminar2('2',<?php echo $rowusuario['codigo'];?>);"><i class="nav-icon fas fa-eraser"></i></button></td>
															</tr>
													   <?php
															}
														?>  
													  </tbody>
													</table>
												  </div>
												  <!-- /.card-body -->
												</div>


									</div>
								  </div>
								  </form>
								</div>	
								</div>								
						  </div>
						  
						  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
						  
							<div id="milista3">
								<div class="card-body">
								  <form name="formulario3" action="#" method="post">
								  <input type="hidden" name="txtcodtra3" value="<?php echo $elcodigo; ?>">
								  <div class="row">							  	
									<label class="col-sm-3 col-form-label">Nombre de Empresa</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" name="txtdetalle3" required autofocus>
									</div>
									<label class="col-sm-3 col-form-label">Cargo</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" name="txtdes3" required>
									</div>
									<label class="col-sm-3 col-form-label">Periodo</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" name="txtobserva3" required>
									</div>
									<br><br>
									<div class="col-sm-12" align="center">
										<button type="button" class="btn btn-primary" onclick="grabar3('3');">Grabar</button>
									</div>
									<div class="col-sm-12">

												<div class="card">
												  <!-- /.card-header -->
												  <div class="card-body p-0">
													<table class="table table-condensed">
													  <thead>
														<tr>
														  <th>#</th>
														  <th>Empresa</th>
														  <th>Cargo</th>
														  <th>Periodo</th>
														  <th>Eli</th>
														</tr>
													  </thead>
													  <tbody>
														<?php					  
															$olistado=new Negocio_clsTablas();
															$rslistado=$olistado->MostrarEscalafon($elcodigo,'3');			
															while($rowusuario=$rslistado->fetch_array())
															{
														?>                   
															<tr>
																<td><?php echo $rowusuario['codigo'];?></td>
																<td><?php echo $rowusuario['detalle'];?></td>
																<td><?php echo $rowusuario['descripcion'];?></td>
																<td><?php echo $rowusuario['observa'];?></td>

																<td align="center"><button class="btn btn-danger" type="button" onclick="eliminar3('3',<?php echo $rowusuario['codigo'];?>);"><i class="nav-icon fas fa-eraser"></i></button></td>
															</tr>
													   <?php
															}
														?>  
													  </tbody>
													</table>
												  </div>
												  <!-- /.card-body -->
												</div>


									</div>
								  </div>
								  </form>
								</div>	
								</div>															  
						  
						  </div>
						  						  
						  <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
							
							<div id="milista4">
							<div class="card-body">
						  	  <form name="formulario4" action="#" method="post">
						  	  <input type="hidden" name="txtcodtra4" value="<?php echo $elcodigo; ?>">
							  <div class="row">							  	
								<label class="col-sm-3 col-form-label">Detalle</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdetalle4" required autofocus>
								</div>
								<label class="col-sm-3 col-form-label">Descripcion</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtdes4" required>
								</div>
								<label class="col-sm-3 col-form-label">Observacion</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" name="txtobserva4" required>
								</div>
								<br><br>
								<div class="col-sm-12" align="center">
									<button type="button" class="btn btn-primary" onclick="grabar4('4');">Grabar</button>
								</div>
								<div class="col-sm-12">
									
											<div class="card">
											  <!-- /.card-header -->
											  <div class="card-body p-0">
												<table class="table table-condensed">
												  <thead>
													<tr>
													  <th>#</th>
													  <th>Detalle</th>
													  <th>Desc.</th>
													  <th>Obs.</th>
													  <th>Eli</th>
													</tr>
												  </thead>
												  <tbody>
													<?php					  
														$olistado=new Negocio_clsTablas();
														$rslistado=$olistado->MostrarEscalafon($elcodigo,'4');			
														while($rowusuario=$rslistado->fetch_array())
														{
													?>                   
														<tr>
															<td><?php echo $rowusuario['codigo'];?></td>
															<td><?php echo $rowusuario['detalle'];?></td>
															<td><?php echo $rowusuario['descripcion'];?></td>
															<td><?php echo $rowusuario['observa'];?></td>

															<td align="center"><button class="btn btn-danger" type="button" onclick="eliminar4('4',<?php echo $rowusuario['codigo'];?>);"><i class="nav-icon fas fa-eraser"></i></button></td>
														</tr>
												   <?php
														}
													?>  
												  </tbody>
												</table>
											  </div>
											  <!-- /.card-body -->
											</div>
																			
									
								</div>
							  </div>
							  </form>
							</div>	
							</div>	

									</div>
								  </div>
								  </form>
								</div>	
								</div>								
							
						  </div>
						  
						</div>
					  </div>
					  <!-- /.card -->
					</div>
                <div class="card-footer">                  
                  <a href="escalafon.php"><button type="button" class="btn btn-warning float-right">Regresar</button></a>
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