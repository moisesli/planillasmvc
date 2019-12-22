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
?>
<script language="Javascript">
function seguro() {
       if ( confirm("Seguro de Eliminar el Registro - Se eliminara todo lo relacionado a esta tipo de planilla..?") ) {
            return true;
       } else {
             return false;
       }
}
function redireccionar(obj) {
	var valorSeleccionado = obj.options[obj.selectedIndex].value; 
	document.location = 'tipoplanilla.php'+'?pg='+valorSeleccionado;
}
</script>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tipos de Planillas.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item active">Tipos de Planillas</li>
              <li class="breadcrumb-item"><a href="tipoplanillamant.php?opcion=1" title="Modificar"><button class="btn btn-success btn-sm" type="button">Registrar</button></a></li>
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
          <div class="col-md-12">

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre de Planilla</th>
                      <th>Inicial</th>
                      <th>Sujeto a Descuentos</th>
                      <th>Mod</th>
                      <th>Eli</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php					  
					  	$olistado=new Negocio_clsTipoplanilla();
					  	// INICIO DE PAGINACION
						$cantidad =10;
						if (!isset($pg)) { 
							$inicial = 0;  
							$pg = 1	;   
						} else {  
							$inicial = ($pg - 1) * $cantidad;
						} 				
						$rscontar=$olistado->Contar_Registros($mibusca,$miempresa);	
						$num_rows=$rscontar['total'];
						// SE EXTRAE EL NUMERO DE REGISTROS PARA PODER SACAR LA CANTIDAD DE PAGINAS
						$pages = intval($rscontar['total'] / $cantidad);  
						$res = ($rscontar['total'] % $cantidad);
						if ($res>0){
							$pages++;
							}
						//
					  					  	
						$rslistado=$olistado->Mostrar_Registros($inicial,$cantidad,$mibusca,$miempresa);			
						while($rowusuario=$rslistado->fetch_array())
						{
					?>                   
						<tr>
							<td><?php echo $rowusuario['codigo'];?></td>
							<td><?php echo $rowusuario['nombre'];?></td>
							<td><?php echo $rowusuario['inicial'];?></td>
							<td><?php echo $rowusuario['descuento'];?></td>
							<td align="center"><a href="tipoplanillamant.php?opcion=2&micodigo=<?php echo intval($rowusuario['codigo'])?>" title="Modificar"><button class="btn btn-primary" type="button"><i class="nav-icon fas fa-edit"></i></button></a></td>
							<td align="center"><a href="tipoplanillagrabar.php?opcion=3&micodigo=<?php echo intval($rowusuario['codigo'])?>" title="Eliminar" onclick="return seguro();" title="Eliminar"><button class="btn btn-danger" type="button"><i class="nav-icon fas fa-eraser"></i></button></a></td>
						</tr>
                   <?php
						}
							$intervalo = ceil ((10/2)-1); // el ceil del numero de paginas a mostrar/2 - 1  
									// Calculamos desde qué número de página se mostrará  
								$desde = $pg - $intervalo;  
								// Calculamos hasta qué número de página se mostrará  
								$hasta = $pg + $intervalo;  
									if($desde < 1)
									{  
									// Le sumamos la cantidad sobrante al final para mantener el número de enlaces que se quiere mostrar.   
									$hasta -= ($desde - 1);  
									// Establecemos $_pagi_nav_desde como 1.  
									$desde = 1;  
									}  
							   if($hasta > $pages)
								{  
									// Le restamos la cantidad excedida al comienzo para mantener el número de enlaces que se quiere mostrar.  
									$desde -= ($hasta - $pages);  
									// Establecemos $_pagi_nav_hasta como el total de páginas.  
									$hasta = $pages;  
									// Hacemos el último ajuste verificando que al cambiar $_pagi_nav_desde no haya quedado con un valor no válido.  
									if($desde < 1){  
										$desde = 1;  
									}   
								}  
							//FIN AQUICubatron					  
					?>  
						<tr>
							<td colspan="10" bgcolor="#E9F3F3">
								<table width="100%" border="0">
									<tr>
										<td width="3%" class="titulo3">Pag.</td>
										<td width="7%" align="center">
											<select id="codigo" onchange="redireccionar(this);" class="form-control" style="width: 60px">
											<?php
												for ($i=$desde; $i<=$hasta; $i++)
												{
													echo '<option value='.$i.'';
													if ($i == $pg)
													{
														echo ' selected>';
													}
													else
													{
														echo '>';
													}
													echo $i;
													echo '</option>';																									
												} ?>
										</select>
									  </td>
										<td width="54%" align="left">
										 de <?php echo $hasta; ?>																							
										</td>										 
										<td width="23%" align="right" style="color: #ED000E">Total Registros</td>
										<td width="10%" align="center" style="color:#042ADF"><strong><?php echo $num_rows; ?></strong></td>
									</tr>
								</table>		
						</tr>                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <!-- /.row -->
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
	require_once '../libreria/cuerpo/abajo.php';	
?>
</div>
<!-- ./wrapper -->
<?php
	require_once '../libreria/cuerpo/pie1.php';
?>

</body>
</html>