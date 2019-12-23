<!-- Librerias Import -->
<?php include "../libreria/cuerpo/cabeza_nueva.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <?php
  require_once '../libreria/cuerpo/barra.php';
  require_once '../libreria/cuerpo/menu.php';
  include("../config.php");
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="app">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fuente y Actividades</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Fuente y Actividades</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- Actividades -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista Actividades</h3>
                <div class="card-tools">
                  <span class="badge bg-secondary" @click="openNewActividad"><i class="fa fa-plus"></i> Agregar</span>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th style="width: 40px">Acciones</th>
                  </tr>
                  <tr v-for="(actividad, index) in actividades">
                    <td>{{ index +1 }}</td>
                    <td>{{actividad.codigo}}</td>
                    <td>{{actividad.nombre}}</td>
                    <td class="text-right" @click="editOpenActividad(actividad)">
                      <span class="badge bg-danger"><i class="fa fa-edit"></i> Editar</span>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <!-- Modal Actividades -->
          <div class="modal fade" id="actividadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Agregar Actividad</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-3 pr-1">
                      <div class="form-group">
                        <input type="email" class="form-control" placeholder="0044" v-model="actividad.codigo">
                        <small id="emailHelp" class="form-text text-muted">Codigo</small>
                      </div>
                    </div>
                    <div class="col-9">
                      <input type="email" class="form-control" v-model="actividad.nombre" placeholder="GERENCIA DE DESARROLLO ECONOMICO">
                      <small id="emailHelp" class="form-text text-muted">Descripcion</small>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-window-close"></i> Cerrar
                  </button>

                  <!-- Guardar Nuevo -->
                  <button type="button" class="btn btn-primary" @click="saveNewActividad(actividad)" v-if="actividad.id == ''">
                    <i class="fa fa-save"></i> Guardar Cambios new
                  </button>

                  <!-- Guardar Edit -->
                  <button type="button" class="btn btn-primary" @click="editSaveActividad(actividad)" v-if="actividad.id != ''">
                    <i class="fa fa-save"></i> Guardar Cambios edit
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Fuentes -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Fuentes</h3>
                <div class="card-tools">
                  <span class="badge bg-secondary" @click="openNewfuente"><i class="fa fa-plus"></i> Agregar</span>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </tr>
                  <tr v-for="(fuente, index) in fuentes">
                    <td>{{index + 1}}</td>
                    <td>{{fuente.codigo}}</td>
                    <td>{{fuente.nombre}}</td>
                    <td class="text-right" @click="editOpenFuente(fuente)">
                      <span class="badge bg-danger"><i class="fa fa-edit"></i> Editar</span>
                    </td>
                  </tr>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>

          <!-- Modal Fuentes -->
          <div class="modal fade" id="fuenteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Agregar Fuente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-3 pr-1">
                      <div class="form-group">
                        <input type="email" class="form-control" placeholder="0044" v-model="fuente.codigo">
                        <small id="emailHelp" class="form-text text-muted">Codigo</small>
                      </div>
                    </div>
                    <div class="col-9">
                      <input type="email" class="form-control" v-model="fuente.nombre" placeholder="GERENCIA DE DESARROLLO ECONOMICO">
                      <small id="emailHelp" class="form-text text-muted">Descripcion</small>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                  <!-- Guardar Nuevo -->
                  <button type="button" class="btn btn-primary"  @click="saveNewFuente(fuente)" v-if="fuente.id == ''">
                    <i class="fa fa-save"></i> Guardar Cambios new
                  </button>

                  <!-- Guardar Edit -->
                  <button type="button" class="btn btn-primary" @click="editSaveFuente(fuente)" v-if="fuente.id != ''">
                    <i class="fa fa-save"></i> Guardar Cambios edit
                  </button>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php require_once '../libreria/cuerpo/abajo.php'; ?>
</div>

<!-- Vue -->
<script>
  var app = new Vue({
    el: '#app',
    data: {
      nombre: "moises",
      actividad: {
        id: "",
        codigo: "",
        nombre: ""
      },
      fuente: {
        id: "",
        codigo: "",
        nombre: "",
      },
      actividades: {},
      fuentes: {}
    },
    methods: {
      getActividades(){
        axios.get("./personal/personal_controller.php?option=getactividades").then(res => {
          this.actividades = res.data;
          // console.log(res.data);
        })
      },
      getFuentes(){
        axios.get("./personal/personal_controller.php?option=getfuentes").then(res => {
          this.fuentes = res.data;
          // console.log(res.data);
        })
      },
      openNewActividad(){
        this.actividad.id = "";
        this.actividad.codigo = "";
        this.actividad.nombre = "";
        $('#actividadModal').modal('show');
      },
      openNewfuente(){
        this.fuente.id = "";
        this.fuente.codigo = "";
        this.fuente.nombre = "";
        $('#fuenteModal').modal('show');
      },
      editOpenFuente(fuente){
        $('#fuenteModal').modal('show');
        this.fuente.id = fuente.id;
        this.fuente.codigo = fuente.codigo;
        this.fuente.nombre = fuente.nombre;
        console.log(this.fuente.id)
      },
      editSaveFuente(){
        axios.post('./personal/personal_controller.php?option=editsavefuentes',{fuente: this.fuente}).then(res => {
          this.getFuentes();
          $('#fuenteModal').modal('hide');
          console.log(res.data)
        })
      },
      saveNewFuente(fuente){
        axios.post("./personal/personal_controller.php?option=savefuentes", {fuente: this.fuente}).then(res =>{
          $('#fuenteModal').modal('hide');
          this.getFuentes();
          console.log(res.data)
        })
      },
      saveNewActividad(actividad){
        axios.post("./personal/personal_controller.php?option=saveactividades", {actividad: this.actividad}).then(res =>{
          $('#actividadModal').modal('hide');
          this.getActividades();
          console.log(res.data)
        })
      },
      editOpenActividad(actividad){
        $('#actividadModal').modal('show');
        this.actividad.id = actividad.id;
        this.actividad.codigo = actividad.codigo;
        this.actividad.nombre = actividad.nombre;
        console.log(this.actividad.id)
      },
      editSaveActividad(){
        axios.post('./personal/personal_controller.php?option=editsaveactividades',{actividad: this.actividad}).then(res => {
          this.getActividades();
          $('#actividadModal').modal('hide');
          console.log(res.data)
        })
      }

    },
    mounted() {
      this.getActividades();
      this.getFuentes();
    }
  })
</script>

<!-- Librerias import-->
<?php require_once '../libreria/cuerpo/pie_nuevo.php'; ?>
</body>
</html>