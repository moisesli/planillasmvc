<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <title>Actividades y Fuentes</title>
</head>
<body>

<!-- Conexion BD-->
<?php include './sql.php'; ?>

<!-- Navbar-->
<?php include "../shared/navbar.php" ?>

<div class="container" id="app">
    <h1 class="display-4 pt-3"><i class="fa fa-cog"></i> Administracion Personal</h1>
  <div class="row pt-4">

      <!-- Actividades -->
      <div class="col-6">
          <div class="card">
              <div class="card-header">
                  <div class="row justify-content-between align-items-center">
                      <div class="col lead">Actividades</div>
                      <div class="col text-right">
                          <button class="btn btn-warning" @click="openNewActividad">
                              <i class="fa fa-plus"></i> Agregar
                          </button>
                      </div>
                  </div>

              </div>
              <div class="card-body">
                  <table class="table table-sm">
                      <tr>
                          <td>Nro</td>
                          <td>Codigo</td>
                          <td>Nombre</td>
                          <td>Acciones</td>
                      </tr>
                      <tr v-for="(actividad, index) in actividades">
                          <td>{{ index +1 }}</td>
                          <td>{{actividad.codigo}}</td>
                          <td>{{actividad.nombre}}</td>
                          <td class="text-right">
                              <button class="btn btn-primary" @click="editOpenActividad(actividad)"><i class="fa fa-edit"></i></button>
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
      <div class="col-6">
          <div class="card">
              <div class="card-header">
                  <div class="row justify-content-between align-items-center">
                      <div class="col lead">Fuentes</div>
                      <div class="col text-right">
                          <button class="btn btn-warning" @click="openNewfuente">
                              <i class="fa fa-plus"></i> Agregar
                          </button>
                      </div>
                  </div>

              </div>
              <div class="card-body">
                  <table class="table table-sm">
                      <tr class="btn-light">
                          <td>Nro</td>
                          <td>Codigo</td>
                          <td>Nombre</td>
                          <td>Acciones</td>
                      </tr>
                      <tr v-for="(fuente, index) in fuentes">
                          <td>{{index + 1}}</td>
                          <td>{{fuente.codigo}}</td>
                          <td>{{fuente.nombre}}</td>
                          <td class="text-right">
                              <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                          </td>
                      </tr>
                  </table>
              </div>
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
                      <button type="button" class="btn btn-primary" @click="saveNewFuente(fuente)">Save changes</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<?php include "./personal_js.php" ?>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>