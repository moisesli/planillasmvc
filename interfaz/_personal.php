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
<div class="wrapper">
    <?php
    require_once '../libreria/cuerpo/barra.php';
    require_once '../libreria/cuerpo/menu.php';
    include("../config.php");
    ?>
    <div class="content-wrapper">

        <!--Contenido-->
        <div class="container-fluid" id="app">

            <!-- Title -->
            <div class="row pt-4">
                <div class="col">

                    <h3 class="display-4 text-center" style="font-size: 32px">Planilla Unica de <?php echo $creacion['planilla'] ?></h3>
                    <p class="lead text-center">
                        <?php echo $creacion['tipo'].' '.$creacion['mes'].' '.$creacion['periodo'] ?>
                    </p>


                    <!--<p class="tabla">
                      Actividad : 0003 SUB GERENCIA DE GESTION AMBIENTAL <br>
                      FTE FT0 : 18Q RENTA DE ADUANAS
                    </p>-->

                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <small class="form-text text-muted">Filtrar por Fuente</small>
                        <select class="form-control form-control-sm bg-light" v-if="array_fuentes.length > 0" v-model="fuente" @change="filtrar_fuente">
                            <option value="">Seleccione</option>
                            <option v-for="fuent in array_fuentes" :value="fuent.id">{{fuent.nombre}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <small class="form-text text-muted">Filtrar por Actividad</small>
                        <select class="form-control form-control-sm bg-light" v-if="array_actividades.length > 0" v-model="actividad" @change="filtrar_actividad">
                            <option value="">Seleccione</option>
                            <option v-for="acti in array_actividades" :value="acti.id">{{acti.nombre}}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card">

                <div class="card-body">
                    <!-- Tabla -->
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
                                echo "<td>".$ingreso['nombre']."</td>";
                            }
                            ?>
                            <td>Otros</td>
                            <td>Ingresos</td>
                            <td><?php echo $creacion['afp1'] ?></td>
                            <td><?php echo $creacion['afp2'] ?></td>
                            <td><?php echo $creacion['afp3'] ?></td>
                            <td><?php echo $creacion['onp'] ?></td>
                            <td>Otros</td>
                            <td>Desctos</td>
                            <td>Pagar</td>
                            <td><?php echo $creacion['essalud'] ?></td>
                            <td><?php echo $creacion['scrtsalud'] ?></td>
                            <td><?php echo $creacion['scrtpension'] ?></td>
                        </tr>
                        </thead>

                        <!-- Filas del Personal-->
                        <tr v-for="(planilla, index) in filtrarPlanillas">
                            <td>{{index+1}}</td>
                            <td>{{planilla.dni}}</td>
                            <td>{{planilla.nombre}}</td>
                            <td>{{planilla.cargo}}</td>
                            <td>OBR</td>
                            <td>Prima M</td>
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
                            <td v-for="ingreso in ingresosTotalesArray">{{ingreso}}</td>
                            <td>{{ingresosOtrosTotales}}</td>
                            <td>{{ingresosTotal}}</td>
                            <!-- Descuentos Array-->
                            <td v-for="descuento in descuentosArrayTotal">{{descuento}}</td>
                            <td>{{descuentosOtrosTotal}}</td>
                            <td>{{descuentosTotal}}</td>
                            <td>{{neto_total}}</td>
                            <!-- Aportes -->
                            <td>{{aportes_uno_total}}</td>
                            <td>{{aportes_dos_total}}</td>
                            <td>{{aportes_tres_total}}</td>
                        </tr>

                    </table>


                    <!-- Totales -->
                    <div class="row pt-3">

                        <!-- Afectacion Presupuestal -->
                        <div class="col">
                            <table class="table table-sm table-responsive-lg table-hover tabla">
                                <tr class="bg-light"><td colspan="4" class="text-center">AFECTACION PRESUPUESTAL</td></tr>
                                <tr class="bg-light"><td>Fte</td><td>Partida</td><td>Descripcion</td><td class="text-right">Importe</td></tr>
                                <tr v-for="afectacion in afectacion_presupuestal_array"><td>{{afectacion.fuente}}</td><td>{{afectacion.partida}}</td><td>{{afectacion.concepto}}</td><td class="text-right">{{afectacion.monto}}</td></tr>
                                <tr><td colspan="3">Total</td><td class="text-right">{{conceptos_remunerativos_total}}</td></tr>
                                <tr class="bg-light"><td colspan="4" class="text-center">APORTES SPP - AFPS</td></tr>
                                <tr class="bg-light"><td>Afp</td><td>Aporte</td><td>Comision</td><td class="text-right">Total</td></tr>
                                <tr><td>Afp Profuturo</td><td>34.34</td><td>6.94</td><td>41.28</td></tr>
                                <tr><td>Total</td><td>34.34</td><td>6.94</td><td>41.28</td></tr>
                            </table>
                        </div>

                        <!-- Conceptos Remunerativos-->
                        <div class="col">
                            <table class="table table-sm table-responsive-lg table-hover tabla">
                                <tr class="bg-light"><td colspan="2" class="text-center">CONCEPTOS REMUNERATIVOS</td></tr>
                                <tr class="bg-light"><td>Remuneracion</td><td class="text-right">Importe</td></tr>
                                <tr v-for="concepto in conceptos_remunerativos_array" v-if="concepto.monto !=0"><td>{{concepto.nombre}}</td><td class="text-right">{{concepto.monto}}</td></tr>
                                <tr><td>Total</td><td class="text-right">{{conceptos_remunerativos_total}}</td></tr>
                            </table>
                        </div>

                        <!-- Descuentos y/o Retenciones -->
                        <div class="col">
                            <table class="table table-sm table-responsive-lg table-hover tabla">
                                <tr class="bg-light"><td colspan="2" class="text-center">DESCUENTOS Y/O RETENCIONES</td></tr>
                                <tr class="bg-light"><td>Concepto</td><td class="text-right">Importe</td></tr>
                                <tr v-for="descuento in array_descuento_retenciones" v-if="descuento.monto != 0"><td>{{descuento.nombre}}</td><td class="text-right">{{descuento.monto}}</td></tr>
                                <tr><td>Total</td><td class="text-right">{{descuentosTotal}}</td></tr>
                            </table>
                        </div>

                        <!-- Resumen -->
                        <div class="col">
                            <table class="table table-sm table-responsive-lg table-hover tabla">
                                <tr class="bg-light"><td colspan="2" class="text-center">RESUMEN</td></tr>
                                <tr class="bg-light"><td>Total Remuneracion</td><td class="text-right">{{ingresosTotal}}</td></tr>
                                <tr><td>Total Descuentos</td><td class="text-right">{{descuentosTotal}}</td></tr>
                                <tr><td><strong>Neto a Pagar</strong></td><td class="text-right"><strong>{{neto_total}}</strong></td></tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>



        </div>

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
