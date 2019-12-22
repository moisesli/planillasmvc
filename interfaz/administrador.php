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

	$olistado=new Negocio_clsTrabajador();
	$rslistado=$olistado->Contar_Registros($mibusca,$labusca,$miempresa);			
	$totaltrabajador=$rslistado["total"];

	$mimes=date('m');
	$mianual=date('Y');	

	$rslistado=$olistado->Contar_Contratosvencidos($mimes);			
	$totalcontratos=$rslistado["total"];

	$rslistado=$olistado->Buscar_Mes($mimes);			
	$mimesnombre=$rslistado["nombre1"];

// BUSCAR ULTIMA PLANILLA PROCESADA
	$oplanilla=new Negocio_clsPlanilla();
	$rsplanillas=$oplanilla->Buscar_UltimaPlanilla();				
	$elcodplanilla=$rsplanillas["codigo"];
	$LisPlanilla=$oplanilla->Buscar_Planillas($elcodplanilla);				

	$ousuario=new Negocio_clsUsuario();
	$rsusuario=$ousuario->Contar_Registros('',$miempresa);				
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- BARRA -->		
<?php
	require_once '../libreria/cuerpo/barra.php';
?>
<!-- MENU -->			
<?php
	require_once '../libreria/cuerpo/menu.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Panel de Control</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Panel de Control</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $totaltrabajador; ?></h3>
                <p>Trabajadores Activos</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="trabajador.php" class="small-box-footer">Lista de Trabajadores <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $totalcontratos; ?></h3>

                <p>Contratos que Vencen en (<?php echo $mimesnombre.' - '.$mianual; ?>)</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="escalafon.php" class="small-box-footer">Ver Empleados <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>S/. <?php echo number_format($LisPlanilla["totalingresos"],2); ?></h3>

                <p>Total Planilla (<?php echo ucfirst(strtolower($rsplanillas["mes"])).' - '.$rsplanillas["periodo"]; ?>)</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="planillaimprimir.php" class="small-box-footer">Ver Planilla <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $rsusuario["total"]; ?></h3>

                <p>Usuarios del Sistema</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="usuario.php" class="small-box-footer">Lista de usuarios <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
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
