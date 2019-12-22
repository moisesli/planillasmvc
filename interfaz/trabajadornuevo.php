<?php session_start();
$miusuario = $_SESSION["apellidos"];
$misiglas = $_SESSION["usuario"];
$micodusu = $_SESSION['codigo'];
$miempresa = $_SESSION['codempresa'];
$miperiodo = $_SESSION['periodo'];
$mitipo = $_SESSION['tipo'];
if (!($_SESSION["accesar"] == "OK")) {
    session_destroy();
    echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=../index.php'>";
}

// Conexion BD
include "../bd/conn.php";


function genera_option($items,$id){
  /*Items tiene dos valores id y nombre
  id: es el valor actual*/
  $options = "";
  foreach ($items as $item){
    $options .= "<option value='{$item['id']}'";
    //$options .= $id==$item['id']? "selected":"";
    $options .= ">{$item['nombre']}</option>";
  }
  return $options;
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
    require_once(LOGICA . "/negocio.php");
    require_once(HERRAMIENTAS_PHP . "/clsGeneral.php");
    $oGeneral = new clsGeneral();

    ?>
  <script type="text/javascript">
      function seguro() {
          if (confirm("Seguro de Grabar los Datos..?")) {
              return true;
          } else {
              return false;
          }
      }
  </script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Empleados.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="administrador.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="trabajador.php">Empleados</a></li>
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
                <h3 class="card-title"><a href="trabajador.php" title="Modificar">
                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i>
                    </button>
                  </a>Empleado - Nuevo.
                </h3>
              </div>

              <form name="formulario" action="trabajadorgrabar.php?opcion=1" method="post">
                <!-- conyemido -->


                <div class="card card-primary card-outline card-outline-tabs">
                  <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                           href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                           aria-selected="true"><strong>Datos Personales</strong></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                           href="#custom-tabs-three-laboral" role="tab" aria-controls="custom-tabs-three-profile"
                           aria-selected="false"><strong>Laborales</strong></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                           href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile"
                           aria-selected="false"><strong>Aportes y Otros</strong></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
                           href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages"
                           aria-selected="false"><strong>T-Registro</strong></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill"
                           href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings"
                           aria-selected="false"><strong>Judiciales</strong></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-settings-acccess" data-toggle="pill"
                           href="#custom-tabs-three-settings-access" role="tab"
                           aria-controls="custom-tabs-three-settings" aria-selected="false"><strong>Accesos</strong></a>
                      </li>

                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">

                      <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel"
                           aria-labelledby="custom-tabs-three-home-tab">

                        <div class="card-body">
                          <div class="row">
                            <label class="col-sm-3 col-form-label">Apellido Paterno</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="txtapellidos" required autofocus>
                            </div>
                            <label class="col-sm-3 col-form-label">Apellido Materno</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="txtapellidos2" required>
                            </div>
                            <label class="col-sm-3 col-form-label">Nombres</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="txtnombres" required>
                            </div>
                            <label class="col-sm-3 col-form-label">Tipo de Documento</label>
                            <div class="col-sm-9">
                              <select name="txtcoddocu" class="form-control" required>
                                  <?php
                                  $oDocumento = new Negocio_clsTablas();
                                  $rsDocumento = $oDocumento->Mostrar_Documento();
                                  echo $oGeneral->Mostrar_Combo($rsDocumento, 0, 0);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">No de Documento</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="txtnundoc" required>
                            </div>
                            <label class="col-sm-3 col-form-label">Direccion</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="txtdireccion" required>
                            </div>
                            <label class="col-sm-3 col-form-label">Sexo</label>
                            <div class="col-sm-9">
                              <select name="txtsexo" class="form-control">
                                  <?php
                                  $oSexo = new Negocio_clsTablas();
                                  $rsSexo = $oSexo->Mostrar_Sexo();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsSexo, 0, 0);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Fecha de Nac.</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control" name="txtfecnaci">
                            </div>
                            <label class="col-sm-3 col-form-label">Email.</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" name="txtemail">
                            </div>
                            <label class="col-sm-3 col-form-label">Foto.</label>
                            <div class="col-sm-9">
                              <input name="archivo" type="file" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Activo.</label>
                            <div class="col-sm-9">
                              <!-- Bootstrap Switch -->
                              <div class="card card-secondary">
                                <div class="card-body">
                                  <input type="checkbox" name="txtactivo" checked data-bootstrap-switch
                                         data-off-color="danger" data-on-color="success">
                                </div>
                              </div>
                              <!-- /.card -->
                            </div>
                          </div>
                        </div>

                      </div>

                      <!-- Laboral -->
                      <div class="tab-pane fade" id="custom-tabs-three-laboral" role="tabpanel"
                           aria-labelledby="custom-tabs-three-settings-tab">
                        <div class="card-body">
                          <div class="row">

                            <!-- Tipo Trabajador -->
                            <label class="col-sm-3 col-form-label">Tipo de Trabajador</label>
                            <div class="col-sm-3">
                              <select name="txttipotrabajador" class="form-control" required>
                                  <?php
                                  $oTipotra = new Negocio_clsTablas();
                                  $rsTipotra = $oTipotra->Mostrar_Tipotrabajador();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsTipotra, 0, 0);
                                  ?>
                              </select>
                            </div>

                            <!-- Numero Contrato -->
                            <label class="col-sm-3 col-form-label pb-2">Número de Contrato</label>
                            <div class="col-sm-3 pb-2">
                              <input type="text" class="form-control" name="txtnuncontratto" required>
                            </div>


                            <!-- Actividad Add -->
                            <label class="col-sm-3 col-form-label pb-2">Actividad</label>
                            <div class="col-sm-3 pb-2">
                              <select class="form-control" name="txtactividad">
                                <option value="" selected>Seleccione Actividad</option>
                                <option>0044 Gerencia de Desarrollo Economico y Social</option>
                              </select>
                            </div>


                            <!-- Fuente Add -->
                            <label class="col-sm-3 col-form-label pb-2">Fuente</label>
                            <div class="col-sm-3 pb-2">
                              <select class="form-control" name="txtfuente">
                                <option value="" selected>Seleccione Actividad</option>
                                <option>097 Recursos Directamente Recaudados</option>
                              </select>
                            </div>


                            <!-- Fecha Inicio -->
                            <label class="col-sm-3 col-form-label">Fecha de Inicio</label>
                            <div class="col-sm-3">
                              <input type="date" class="form-control" name="txtfecini" required>
                            </div>

                            <!-- Fecha Final -->
                            <label class="col-sm-3 col-form-label">Fecha Final</label>
                            <div class="col-sm-3">
                              <input type="date" class="form-control" name="txtfecfin" required>
                            </div>

                            <!-- Cargo -->
                            <label class="col-sm-3 col-form-label">Cargo</label>
                            <div class="col-sm-3">
                              <select name="txtcargo" class="form-control" required>
                                  <?php
                                  $oSexo = new Negocio_clsTablas();
                                  $rsSexo = $oSexo->Mostrar_Cargo();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsSexo, 0, 0);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Sueldo / 30 / 15 / 7</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="txtsueldo" required>
                            </div>

                          </div>
                        </div>
                      </div>
                      <!-- End Laboral -->

                      <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                           aria-labelledby="custom-tabs-three-profile-tab">

                        <div class="card-body">
                          <div class="row">

                            <label class="col-sm-3 col-form-label">Autogenerado ESSALUD</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="txtautogenerado" required>
                            </div>

                            <label class="col-sm-3 col-form-label">Onp ?</label>
                            <div class="col-sm-3">
                              <select name="txtonp" class="form-control">
                                  <?php
                                  $oActivo1 = new Negocio_clsTablas();
                                  $rsActivo1 = $oActivo1->Mostrar_Activo();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsActivo1, 1, 0, 'S');
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Afp ?</label>
                            <div class="col-sm-3">
                              <select name="txtafp" class="form-control">
                                  <?php
                                  $oAfp = new Negocio_clsAfp();
                                  $rsAfp = $oAfp->Mostrar_Todos($miempresa);
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsAfp, 0, 0);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Cupps</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="txtcupss">
                            </div>
                            <label class="col-sm-3 col-form-label">Flujo Afp ?</label>
                            <div class="col-sm-3">
                              <select name="txtflujo" class="form-control">
                                  <?php
                                  $oActivo1 = new Negocio_clsTablas();
                                  $rsActivo1 = $oActivo1->Mostrar_Activo();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsActivo1, 1, 0, 'N');
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Banco ?</label>
                            <div class="col-sm-3">
                              <select name="txtbanco" class="form-control">
                                  <?php
                                  $oActivo3 = new Negocio_clsBanco();
                                  $rsActivo3 = $oActivo3->Mostrar_Todos($miempresa);
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsActivo3, 0, 0);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">No de Cta.</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="txtcuenta">
                            </div>
                            <label class="col-sm-3 col-form-label">Asig. Fam. ?</label>
                            <div class="col-sm-3">
                              <select name="txtasigna" class="form-control">
                                  <?php
                                  $oActivo1 = new Negocio_clsTablas();
                                  $rsActivo1 = $oActivo1->Mostrar_Activo();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsActivo1, 1, 0, 'N');
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">5ta Cat. ?</label>
                            <div class="col-sm-3">
                              <select name="txtrenta" class="form-control">
                                  <?php
                                  $oActivo1 = new Negocio_clsTablas();
                                  $rsActivo1 = $oActivo1->Mostrar_Activo();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsActivo1, 1, 0, 'N');
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Scrt. ?</label>
                            <div class="col-sm-3">
                              <select name="txtscrt" class="form-control">
                                  <?php
                                  $oActivo1 = new Negocio_clsTablas();
                                  $rsActivo1 = $oActivo1->Mostrar_Activo();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsActivo1, 1, 0, 'N');
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Cts. ?</label>
                            <div class="col-sm-3">
                              <select name="txtcts" class="form-control">
                                  <?php
                                  $oActivo1 = new Negocio_clsTablas();
                                  $rsActivo1 = $oActivo1->Mostrar_Activo();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsActivo1, 1, 0, 'N');
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Cafae. ?</label>
                            <div class="col-sm-3">
                              <select name="txtcafae" class="form-control">
                                  <?php
                                  $oActivo1 = new Negocio_clsTablas();
                                  $rsActivo1 = $oActivo1->Mostrar_Activo();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsActivo1, 1, 0, 'N');
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Escolaridad. ?</label>
                            <div class="col-sm-3">
                              <select name="txtescolar" class="form-control">
                                  <?php
                                  $oActivo1 = new Negocio_clsTablas();
                                  $rsActivo1 = $oActivo1->Mostrar_Activo();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsActivo1, 1, 0, 'N');
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Vacaciones. ?</label>
                            <div class="col-sm-3">
                              <select name="txtvaca" class="form-control">
                                  <?php
                                  $oActivo1 = new Negocio_clsTablas();
                                  $rsActivo1 = $oActivo1->Mostrar_Activo();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsActivo1, 1, 0, 'N');
                                  ?>
                              </select>
                            </div>

                          </div>
                        </div>


                      </div>

                      <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                           aria-labelledby="custom-tabs-three-messages-tab">
                        <div class="card-body">
                          <div class="row">

                            <label class="col-sm-3 col-form-label">Essalud Vida. ?</label>
                            <div class="col-sm-3">
                              <select name="txtessalud" class="form-control">
                                  <?php
                                  $oTabla1 = new Negocio_clsTablas();
                                  $rsTabla1 = $oTabla1->Mostrar_Sino();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsTabla1, 0, 1);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Domiciliado. ?</label>
                            <div class="col-sm-3">
                              <select name="txtdomiciliado" class="form-control">
                                  <?php
                                  $oTabla1 = new Negocio_clsTablas();
                                  $rsTabla1 = $oTabla1->Mostrar_Sino();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsTabla1, 0, 1, 0);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Tipo Via</label>
                            <div class="col-sm-3">
                              <select name="txtvia" class="form-control">
                                  <?php
                                  $oVia = new Negocio_clsTablas();
                                  $rsVia = $oVia->Mostrar_Vias();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsVia, 0, 1);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Nombre de Via.</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="txtnomvia">
                            </div>
                            <label class="col-sm-3 col-form-label">No de Via.</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="txtnumvia">
                            </div>
                            <label class="col-sm-3 col-form-label">Interior.</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="txtinterior">
                            </div>
                            <label class="col-sm-3 col-form-label">Tipo Zona</label>
                            <div class="col-sm-3">
                              <select name="txtzona" class="form-control">
                                  <?php
                                  $oZona = new Negocio_clsTablas();
                                  $rsZona = $oZona->Mostrar_Zonas();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsZona, 0, 1);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Nombre Zona.</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="txtnomzona">
                            </div>
                            <label class="col-sm-3 col-form-label">Referencia.</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="txtreferencia">
                            </div>
                            <label class="col-sm-3 col-form-label">Ubigeo.</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="txtubigeo">
                            </div>
                            <label class="col-sm-3 col-form-label">Regimen Laboral</label>
                            <div class="col-sm-9">
                              <select name="txtregimenlaboral" class="form-control">
                                  <?php
                                  $oRegimen = new Negocio_clsTablas();
                                  $rsRegimen = $oRegimen->Mostrar_Regimenlaboral();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsRegimen, 0, 1);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Ocupacion</label>
                            <div class="col-sm-9">
                              <select name="txtocupacion" class="form-control">
                                  <?php
                                  $oOcupacion = new Negocio_clsTablas();
                                  $rsOcupacion = $oOcupacion->Mostrar_Ocupacion();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsOcupacion, 0, 1);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Discapacidad</label>
                            <div class="col-sm-3">
                              <select name="txtdiscapacidad" class="form-control">
                                  <?php
                                  $oTabla1 = new Negocio_clsTablas();
                                  $rsTabla1 = $oTabla1->Mostrar_Sino();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsTabla1, 0, 1, 0);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Tip. Contrato</label>
                            <div class="col-sm-3">
                              <select name="txttipocontrato" class="form-control">
                                  <?php
                                  $oContrato = new Negocio_clsTablas();
                                  $rsContrato = $oContrato->Mostrar_Tipocontrato();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsContrato, 0, 1);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Reg. Alternativo ?</label>
                            <div class="col-sm-3">
                              <select name="txtregimenalternativo" class="form-control">
                                  <?php
                                  $oTabla1 = new Negocio_clsTablas();
                                  $rsTabla1 = $oTabla1->Mostrar_Sino();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsTabla1, 0, 1, 0);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Jornada. Trab. Max. ?</label>
                            <div class="col-sm-3">
                              <select name="txtjornadamaxima" class="form-control">
                                  <?php
                                  $oTabla1 = new Negocio_clsTablas();
                                  $rsTabla1 = $oTabla1->Mostrar_Sino();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsTabla1, 0, 1, 0);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Horario Nocturno ?</label>
                            <div class="col-sm-3">
                              <select name="txthorario" class="form-control">
                                  <?php
                                  $oTabla1 = new Negocio_clsTablas();
                                  $rsTabla1 = $oTabla1->Mostrar_Sino();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsTabla1, 0, 1, 0);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Es Sindicalizado ?</label>
                            <div class="col-sm-3">
                              <select name="txtdindicato" class="form-control">
                                  <?php
                                  $oTabla1 = new Negocio_clsTablas();
                                  $rsTabla1 = $oTabla1->Mostrar_Sino();
                                  echo $oGeneral->Mostrar_Combo_Seleccione($rsTabla1, 0, 1, 0);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Periocidad de Remuneracion</label>
                            <div class="col-sm-3">
                              <select name="txtperiodicidad" class="form-control">
                                  <?php
                                  $oTabla8 = new Negocio_clsTablas();
                                  $rsTabla8 = $oTabla8->Mostrar_Periocidad();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsTabla8, 0, 1);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Situacion Laboral</label>
                            <div class="col-sm-3">
                              <select name="txtsituacion" class="form-control">
                                  <?php
                                  $oTabla9 = new Negocio_clsTablas();
                                  $rsTabla9 = $oTabla9->Mostrar_Situacion();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsTabla9, 0, 1);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Situacion Especial</label>
                            <div class="col-sm-3">
                              <select name="txtsituacione" class="form-control">
                                  <?php
                                  $oTabla12 = new Negocio_clsTablas();
                                  $rsTabla12 = $oTabla12->Mostrar_Situacionespecial();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsTabla12, 0, 1);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Tipo de Pago</label>
                            <div class="col-sm-3">
                              <select name="txttipopago" class="form-control">
                                  <?php
                                  $oTabla13 = new Negocio_clsTablas();
                                  $rsTabla13 = $oTabla13->Mostrar_Tipopago();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsTabla13, 0, 1);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Categoria Ocupaciones</label>
                            <div class="col-sm-3">
                              <select name="txtcategoria" class="form-control">
                                  <?php
                                  $oTabla14 = new Negocio_clsTablas();
                                  $rsTabla14 = $oTabla14->Mostrar_CategoriaOcupacional();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsTabla14, 0, 1);
                                  ?>
                              </select>
                            </div>
                            <label class="col-sm-3 col-form-label">Convenios</label>
                            <div class="col-sm-3">
                              <select name="txtconvenio" class="form-control">
                                  <?php
                                  $oTabla15 = new Negocio_clsTablas();
                                  $rsTabla15 = $oTabla15->Mostrar_Convenios();
                                  echo $oGeneral->Mostrar_Combo_Seleccione2($rsTabla15, 0, 1);
                                  ?>
                              </select>
                            </div>


                          </div>
                        </div>
                      </div>

                      <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel"
                           aria-labelledby="custom-tabs-three-settings-tab">
                        <div class="card-body">
                          <div class="row">

                            <label class="col-sm-3 col-form-label">Apellidos y Nombres</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="txtapellidosjudicial">
                            </div>
                            <label class="col-sm-3 col-form-label">Monto</label>
                            <div class="col-sm-3">
                              <input type="number" class="form-control" name="txtsueldojudicial">
                            </div>
                            <label class="col-sm-3 col-form-label">Apellidos y Nombres</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="txtapellidosjudicial1">
                            </div>
                            <label class="col-sm-3 col-form-label">Monto</label>
                            <div class="col-sm-3">
                              <input type="number" class="form-control" name="txtsueldojudicial1">
                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="tab-pane fade" id="custom-tabs-three-settings-access" role="tabpanel"
                           aria-labelledby="custom-tabs-three-settings-access">
                        <div class="card-body">
                          <div class="row">

                            <label class="col-sm-3 col-form-label">Nombre de Usuario</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="txtusuario">
                            </div>
                            <label class="col-sm-3 col-form-label">Clave de Usuario</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="txtclave">
                            </div>

                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- /.card -->
                </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onclick="return seguro();">Grabar</button>
                  <a href="trabajador.php">
                    <button type="button" class="btn btn-danger float-right">Cancelar</button>
                  </a>
                </div>
              </form>
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