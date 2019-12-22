<?php
	session_start();
	$miperiodo=$_SESSION['periodo'];
	$mitipo=$_SESSION['tipo'];
	$miape=$_SESSION['apellidos'];
	if ($mitipo=='1')
	{
		$mitipousuario='Administrador';	
	}
	
?>
    <!-- Navbar BARRA DE CABECERA DE ARRIBA -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="administrador.php" class="nav-link" style="font-size: 20px; color:#0E048B"><strong>Inicio</strong></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
         <a href="periodo.php" class="nav-link" style="font-size: 20px; color: #FB0716" title="Periodos"><strong>Periodo - <?php echo $miperiodo; ?></strong></a>
      </li>
      
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="../libreria/dist/img/user2-160x160.jpg" width="30px" height="30px" class="img-circle elevation-1" alt="User Image"><strong style="font-size: 16px; color:#0E048B"><?php echo $miape; ?></strong>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo $mitipousuario; ?></span>
          <div class="dropdown-divider"></div>
          <a href="../index.php" class="dropdown-item">
            <i class="nav-icon fas fa-copy"></i> Salir del Sistema            
          </a>
          <div class="dropdown-divider"></div>
          
        </div>
      </li>
      
      <li class="nav-item" hidden="">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->