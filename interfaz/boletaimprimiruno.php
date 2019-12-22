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

	require_once '../libreria/cuerpo/barra.php';
	require_once '../libreria/cuerpo/menu.php';
	include("../config.php");
	require_once(LOGICA."/negocio.php");
	
	$laplanila=$_GET['micodigo'];
	//echo $laplanila;
	// BUSCAR PLANILLA
	$oPlanilla=new Negocio_clsCreacion();
	$rsPlanilla=$oPlanilla->getROW($laplanila);
	//////////////////
	// BUSCAR TIPO TRABAJADOR PARA LOS DIAS
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<script language="Javascript">
function seguro() {
       if ( confirm("Seguro de Eliminar el Registro - Se eliminara todo lo relacionado a esta Registro..?") ) {
            return true;
       } else {
             return false;
       }
}
</script>
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
          <div class="col-sm-8">
            <h1 class="m-0 text-dark">Imprimir Boleta - <strong style="color: #9A0204"><?php echo $rsPlanilla['planilla'].' - '.$rsPlanilla['mes'].' - '.$rsPlanilla['tipo'].' - '.$rsPlanilla['numero'];?></strong></h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="boletaimprimir.php">Seleccionar Planilla</a></li>   
              <li class="breadcrumb-item">Seleccionar Trabajador</li> 
              
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
                  <th>Trabajador</th>
                  <th>Cargo</th>
                  <th>Dias Trab.</th>
                  <th>Total Remun.</th>
                  <th>Total Dctos.</th>
                  <th>Total Aportes</th>
                  <th>Total a Pagar</th>
                  <th>Imprimir</th>
                </tr>
                </thead>
                <tbody>
					<?php					  
					  	$olistado=new Negocio_clsDescuento();
						$rslistado=$olistado->Mostrar_Registros_Planilla(0,10000,$laplanila);		
						while($rowusuario=$rslistado->fetch_array())
						{
								$MITOTALREMUN=$rowusuario['ingreso1']+$rowusuario['ingreso2']+$rowusuario['ingreso3']+$rowusuario['ingreso4']+$rowusuario['ingreso5']+$rowusuario['ingreso6']+$rowusuario['ingreso7']+$rowusuario['ingreso8']+$rowusuario['ingreso9']+$rowusuario['ingreso10']+$rowusuario['ingreso11']+$rowusuario['ingreso12']+$rowusuario['ingreso13']+$rowusuario['ingreso14']+$rowusuario['ingreso15']+$rowusuario['ingreso16']+$rowusuario['ingreso17']+$rowusuario['ingreso18']+$rowusuario['ingreso19']+$rowusuario['ingreso20']+$rowusuario['ingreso21']+$rowusuario['ingreso22']+$rowusuario['ingreso23']+$rowusuario['ingreso24'];
																				//echo $MITOTALREMUN;
								$MITOTALDESCUENTO=$rowusuario['afp1']+$rowusuario['afp2']+$rowusuario['afp3']+$rowusuario['onp']+$rowusuario['descuento1']+$rowusuario['descuento2']+$rowusuario['descuento3']+$rowusuario['descuento4']+$rowusuario['descuento5']+$rowusuario['descuento6']+$rowusuario['descuento7']+$rowusuario['descuento8']+$rowusuario['descuento9']+$rowusuario['descuento10']+$rowusuario['descuento11']+$rowusuario['descuento12']+$rowusuario['descuento13']+$rowusuario['descuento14']+$rowusuario['descuento15']+$rowusuario['descuento16']+$rowusuario['descuento7']+$rowusuario['quinta']+$rowusuario['ipssvida'];
																		
								$SALDOAPAGAR=$MITOTALREMUN-$MITOTALDESCUENTO;							
							
					?>                   

						<tr>
							<td><?php echo $rowusuario['codtrabajador'];?></td>
							<td><?php echo $rowusuario['apellidos'].' '.$rowusuario['apellidos2'].' '.$rowusuario['nombres'];?></td>
							<td><?php echo $rowusuario['cargo'];?></td>
							<td align="center"><?php echo $rowusuario['dias'];?></td>
							<td align="right"><?php echo number_format($MITOTALREMUN,2,'.',',');?></td>
							<td align="right"><?php echo number_format($MITOTALDESCUENTO,2,'.',',');?></td>
							
							<td align="right"><?php echo number_format($rowusuario['essalud']+$rowusuario['senati']+$rowusuario['scrtsalud']+$rowusuario['scrtpension'],2,'.',',');?></td>
							<td align="right"><?php echo number_format($SALDOAPAGAR,2,'.',',');?></td>
							
							<td align="center"><button class="btn btn-success" type="button" <?php echo $miok;?> onclick="javascript:AbrirCentrado('boletaimprimirrep.php?micodigo=<?php echo $laplanila; ?>&elcodtrabajador=<?php echo $rowusuario['codtrabajador']; ?>&laopcion=2','','1024','600','');"><i class="nav-icon fas fa-print"></i></button></a>
						
								
						</tr>
                   <?php
						}  
					?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Trabajador</th>
                  <th>Cargo</th>
                  <th>Dias Trab.</th>
                  <th>Total Remun.</th>
                  <th>Total Dctos.</th>
                  <th>Total Aportes</th>
                  <th>Total a Pagar</th>
                  <th>Imprimir</th>
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