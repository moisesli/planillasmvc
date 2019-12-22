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
	function FormatDate($fecha){
		list($anio,$mes,$dia)=explode("-",$fecha); 
		return $dia."-".$mes."-".$anio; 
	}			

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
<script language = "javascript">
	function AbrirCentrado(Url,NombreVentana,width,height,extras)
	{
		var largo = width;
		var altura = height;
		var adicionales= extras;
		var top = (screen.height-altura)/2;
		var izquierda = (screen.width-largo)/2; nuevaVentana=window.open(''+ Url + '',''+ NombreVentana + '','width=' + largo + ',height=' + altura + ',top=' + top + ',left=' + izquierda + ',features=' + adicionales + ''); 
		nuevaVentana.focus();
	}
</script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">AFP - NET - Procesar - Seleccione.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item active">Seleccione Planulla</li>   
              
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
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Estado</th>
                  <th>Planilla</th>
                  <th>Mes</th>
                  <th>Tipo</th>
                  <th>Numero</th>
                  <th>Fecha Inicial</th>
                  <th>Fecha Final</th>
                  <th>Excel</th>
                  <th>Txt</th>
                </tr>
                </thead>
                <tbody>
					<?php					  
					  	$olistado=new Negocio_clsCreacion();
						$rslistado=$olistado->Mostrar_Registros(0,10000,$miempresa,$miperiodo);			
						while($rowusuario=$rslistado->fetch_array())
						{
					?>                   

						<tr>
							<td><?php echo $rowusuario['codigo'];?></td>
							<td align="center">
								<?php 
									if ($rowusuario['procesada']=='1')
									{
										?>
											<span class="right badge badge-danger">Procesada</span>
										<?php		
									}
									else
									{
										?>
											<span class="right badge badge-success">No Procesada</span>
										<?php		
									}
								?>
							</td>
							<td><?php echo $rowusuario['planilla'];?></td>
							<td><?php echo $rowusuario['mes'];?></td>
							<td><?php echo $rowusuario['tipo'];?></td>
							<td align="center"><?php echo $rowusuario['numero'];?></td>
							<td align="center"><?php echo FormatDate($rowusuario['fini']);?></td>
							<td align="center"><?php echo FormatDate($rowusuario['ffin']);?></td>
							
							<td align="center"><button class="btn btn-info" type="button" onclick="javascript:AbrirCentrado('afpnetimprimirrepexcel.php?micodigo=<?php echo $rowusuario['codigo'];?>&laopcion=1','','600','200','');"><i class="nav-icon far fa-hourglass"></i></button>
							
							<td align="center"><button class="btn btn-success" type="button" onclick="javascript:AbrirCentrado('afpnetimprimirreptxt.php?micodigo=<?php echo $rowusuario['codigo'];?>&laopcion=1','','600','200','');"><i class="nav-icon far fa-hourglass"></i></button>
							
							
							</td>
							
						</tr>
                   <?php
						}  
					?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Estado</th>
                  <th>Planilla</th>
                  <th>Mes</th>
                  <th>Tipo</th>
                  <th>Numero</th>
                  <th>Fecha Inicial</th>
                  <th>Fecha Final</th>
                  <th>Excel</th>
                  <th>Txt</th>

                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>           
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
<script>
  $(function () {
    $("#example1").DataTable();
    //$('#example2').DataTable({
      //"paging": true,
      //"lengthChange": false,
      //"searching": false,
      //"ordering": true,
      //"info": true,
      //"autoWidth": false,
    //});
  });
</script>
</body>
</html>