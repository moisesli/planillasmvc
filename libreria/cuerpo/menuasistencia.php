<!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="asistencia.php" class="brand-link">
		    <img src="../libreria/dist/img/_milogo1.png" alt="Inicio" class="bbrand-image bimg-circle belevation-5  " style="opacity: .8">
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Mantenimiento
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="horario.php" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <p>Horarios</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="justificacion.php" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <p>Motivo de Justif.</p>
                </a>
              </li>
              
            </ul>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Procesos
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="apertura.php" class="nav-link">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <p>Apertura de Dias</p>
                </a>
              </li>              
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="asistenciaver.php" class="nav-link">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <p>Asistencia</p>
                </a>
              </li>              
            </ul>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Reportes
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="asistenciaimprimir.php" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <p>Reporte de Asistencia</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Utilidades
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../manual/manual.pdf" class="nav-link" target="_blank">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <p>Manual de Usuario</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Sistema
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../index.php" class="nav-link">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <p>Salir del Sistema</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
			<div style="color:#A0DCEF; font-size:18px; font-weight:bold;" align="center"><?php echo TITULO; ?></div>
			<div align="center" style="color:#E4C705; font-size:18px; font-weight:bold;"><?php echo date('d-m-Y'); ?></div>
    </div>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>