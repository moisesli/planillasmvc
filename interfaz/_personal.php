<?php include "../libreria/cuerpo/cabeza_nueva.php"; ?>
<style>
    .tabla {
        font-size: 11px;
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
    //  Conexion Bd
    include './planillas/sql.php';
?>
<div class="wrapper" >
    <?php
    require_once '../libreria/cuerpo/barra.php';
    require_once '../libreria/cuerpo/menu.php';
    include("../config.php");
    ?>
    <div class="content-wrapper" id="app">

      <!-- Breadcumd (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Planilla Unica de <?php echo $creacion['planilla'] ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Reporte</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>


      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col">

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><?php echo $creacion['tipo'].' '.$creacion['mes'].' '.$creacion['periodo'] ?></h3>
                  <div class="card-tools">
                    <span class="badge bg-secondary"><a href="_print_planilla.php?micodigo=<?php echo $_GET['micodigo']?>" target="_blank"><i class="fa fa-print"></i> Imprimir</a></span>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">

                  <!-- Filtros -->
                  <div class="row pl-2">
                    <div class="col-3">
                      <div class="form-group">
                        <select class="form-control form-control-sm bg-light" v-if="array_fuentes.length > 0" v-model="fuente" @change="filtrar_fuente">
                          <option value="">Seleccione</option>
                          <option v-for="fuent in array_fuentes" :value="fuent.id">{{fuent.nombre}}</option>
                        </select>
                        <small class="form-text text-muted">Filtrar por Fuente</small>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <select class="form-control form-control-sm bg-light" v-if="array_actividades.length > 0" v-model="actividad" @change="filtrar_actividad">
                          <option value="">Seleccione</option>
                          <option v-for="acti in array_actividades" :value="acti.id">{{acti.nombre}}</option>
                        </select>
                        <small class="form-text text-muted">Filtrar por Actividad</small>
                      </div>
                    </div>
                  </div>

                  <!-- Tabla Contenido Principal -->
                  <table class="table table-bordered table-sm table-responsive table-hover tabla" id="table1">
                    <thead class="thead-light">

                    <!-- Cabezera uno table -->
                    <tr class="bg-light">
                      <td rowspan="2" class="align-middle">No</td>
                      <td rowspan="2" class="align-middle">Dni</td>
                      <td rowspan="2" class="align-middle">Apellidos y Nombres</td>
                      <td rowspan="2" class="align-middle">Cargo</td>
                      <td>Grp</td>
                      <td>Regim</td>
                      <td rowspan="2" class="align-middle">Meta</td>
                      <td>dias</td>
                      <td colspan="<?php echo $column_ingresos; ?> " class="text-center">INGRESOS</td>
                      <td>Total</td>
                      <td colspan="5" class="text-center">
                        <span>DESCUENTOS</span></td>
                      <td>Total</td>
                      <td>Neto</td>
                      <td colspan="3" class="text-center">APORTES</td>
                    </tr>

                    <!-- Cabezera dos table -->
                    <tr class="bg-light">
                      <td>Niv</td>
                      <td>Pensio</td>
                      <td>Lab</td>
                        <?php
                        foreach ($ingresos as $ingreso){
                            echo "<td>".substr($ingreso['nombre'],0,5)."</td>";
                        }
                        ?>
                      <td>Otros</td>
                      <td>Ingre</td>
                      <td><?php echo substr($creacion['afp1'],0,6) ?></td>
                      <td><?php echo substr($creacion['afp2'],0,6) ?></td>
                      <td><?php echo substr($creacion['afp3'],0,6) ?></td>
                      <td><?php echo $creacion['onp'] ?></td>
                      <td>Otros</td>
                      <td>Desctos</td>
                      <td>Pagar</td>
                      <td><?php echo $creacion['essalud'] ?></td>
                      <td><?php echo $creacion['scrtsalud'] ?></td>
                      <td><?php echo substr($creacion['scrtpension'],0,5) ?></td>
                    </tr>
                    </thead>

                    <!-- Filas del Personal-->
                    <tr v-for="(planilla, index) in filtrarPlanillas">
                      <td>{{index+1}}</td>
                      <td>{{planilla.dni}}</td>
                      <td>{{planilla.nombre}}</td>
                      <td>{{planilla.cargo}}</td>
                      <td>OBR</td>
                      <td>{{planilla.trabajador_afp}}</td>
                      <td>{{planilla.fuente}}</td>
                      <td>{{planilla.dias}}</td>
                      <td v-for="ingreso in planilla.ingresos">
                        {{ingreso.ingreso}}
                      </td>
                      <td>{{planilla.ingresos_otros}}</td>
                      <td data-toggle="tooltip" data-html="true" data-placement="right" :title="planilla.ingresos_all">
                        {{planilla.ingresos_linea_total}}
                      </td>
                      <td>{{planilla.afp1}}</td>
                      <td>{{planilla.afp2}}</td>
                      <td>{{planilla.afp3}}</td>
                      <td>{{planilla.onp}}</td>
                      <td>{{planilla.descuento_lineal_otros}}</td>
                      <td data-toggle="tooltip" data-html="true" data-placement="right" :title="planilla.descuentos_all">
                        {{planilla.descuento_lineal_total}}
                      </td>
                      <td>{{planilla.neto_pagar_lineal}}</td>
                      <td>{{planilla.essalud}}</td>
                      <td>{{planilla.scrtsalud}}</td>
                      <td>{{planilla.scrtpension}}</td>
                    </tr>



                    <!-- Totales -->
                    <tr class="bg-light">
                      <td colspan="8" class="text-center"><strong>TOTAL IMPORTE</strong></td>
                      <!-- Ingresos array -->
                      <td v-for="ingreso in ingresosTotalesArray">{{ingreso | digito}}</td>
                      <td>{{ingresosOtrosTotales | digito}}</td>
                      <td>{{ingresosTotal | digito}}</td>
                      <!-- Descuentos Array-->
                      <td v-for="descuento in descuentosArrayTotal">{{descuento | digito}}</td>
                      <td>{{descuentosOtrosTotal | digito}}</td>
                      <td>{{descuentosTotal | digito}}</td>
                      <td>{{neto_total | digito}}</td>
                      <!-- Aportes -->
                      <td>{{aportes_uno_total | digito}}</td>
                      <td>{{aportes_dos_total | digito}}</td>
                      <td>{{aportes_tres_total | digito}}</td>
                    </tr>

                  </table>

                  <!-- Totales Abajo -->
                  <div class="row">

                    <!-- Afectacion Presupuestal -->
                    <div class="col">
                      <table class="table table-sm table-responsive-lg table-hover tabla">
                        <tr class="bg-light"><td colspan="4" class="text-center">AFECTACION PRESUPUESTAL</td></tr>
                        <tr class="bg-light"><td>Fte</td><td>Partida</td><td>Descripcion</td><td class="text-right">Importe</td></tr>
                        <tr v-for="afectacion in afectacion_presupuestal_array"><td>{{afectacion.fuente}}</td><td>{{afectacion.partida}}</td><td>{{afectacion.concepto}}</td><td class="text-right">{{afectacion.monto | digito}}</td></tr>
                        <tr><td colspan="3">Total</td><td class="text-right">{{conceptos_remunerativos_total | digito}}</td></tr>
                        <tr class="bg-light"><td colspan="4" class="text-center">APORTES SPP - AFPS</td></tr>
                        <tr class="bg-light"><td>Afp</td><td>Aporte</td><td>Comision</td><td class="text-right">Total</td></tr>
                        <tr v-for="aporte in aportes_array_total" v-if="aporte.total !=0"><td>{{aporte.afp}}</td><td>{{aporte.monto | digito}}</td><td>{{aporte.comision | digito}}</td><td class="text-right">{{aporte.total  | digito}}</td></tr>
                        <tr><td>Total</td><td>{{descuentosArrayTotal[0] | digito}}</td><td>{{descuentosArrayTotal[1]+descuentosArrayTotal[2] | digito}}</td><td class="text-right">{{descuentosArrayTotal[0] + descuentosArrayTotal[1]+descuentosArrayTotal[2]| digito}}</td></tr>
                      </table>
                    </div>

                    <!-- Conceptos Remunerativos-->
                    <div class="col">
                      <table class="table table-sm table-responsive-lg table-hover tabla">
                        <tr class="bg-light"><td colspan="2" class="text-center">CONCEPTOS REMUNERATIVOS</td></tr>
                        <tr class="bg-light"><td>Remuneracion</td><td class="text-right">Importe</td></tr>
                        <tr v-for="concepto in conceptos_remunerativos_array" v-if="concepto.monto !=0"><td>{{concepto.nombre}}</td><td class="text-right">{{concepto.monto | digito}}</td></tr>
                        <tr><td>Total</td><td class="text-right">{{conceptos_remunerativos_total | digito}}</td></tr>
                      </table>
                    </div>

                    <!-- Descuentos y/o Retenciones -->
                    <div class="col">
                      <table class="table table-sm table-responsive-lg table-hover tabla">
                        <tr class="bg-light"><td colspan="2" class="text-center">DESCUENTOS Y/O RETENCIONES</td></tr>
                        <tr class="bg-light"><td>Concepto</td><td class="text-right">Importe</td></tr>
                        <tr v-for="descuento in array_descuento_retenciones" v-if="descuento.monto != 0"><td>{{descuento.nombre}}</td><td class="text-right">{{descuento.monto | digito}}</td></tr>
                        <tr><td>Total</td><td class="text-right">{{descuentosTotal | digito}}</td></tr>
                      </table>
                    </div>

                    <!-- Resumen -->
                    <div class="col">
                      <table class="table table-sm table-responsive-lg table-hover tabla">
                        <tr class="bg-light"><td colspan="2" class="text-center">RESUMEN</td></tr>
                        <tr class="bg-light"><td>Total Remuneracion</td><td class="text-right">{{ingresosTotal | digito}}</td></tr>
                        <tr><td>Total Descuentos</td><td class="text-right">{{descuentosTotal | digito}}</td></tr>
                        <tr><td><strong>Neto a Pagar</strong></td><td class="text-right"><strong>{{neto_total | digito}}</strong></td></tr>
                      </table>
                    </div>
                  </div>

                </div>
              </div>



            </div>
          </div>
        </div>
      </section>

    </div>
    <!-- Vue -->

    <?php require_once '../libreria/cuerpo/abajo.php';?>
</div>
<?php require_once '../libreria/cuerpo/pie_nuevo.php'; ?>
<?php include "./planillas/_js.php" ?>
<script>
  $(function() {
    //The passed argument has to be at least a empty object or a object with your desired options
    $('#table1').overlayScrollbars({
      scrollbars : {
        visibility       : "auto",
        autoHide         : "leave",
        autoHideDelay    : 400,
        dragScrolling    : true,
        clickScrolling   : false,
        touchSupport     : true,
        snapHandle       : false
      }
    });
  });
</script>
</body>
</html>
