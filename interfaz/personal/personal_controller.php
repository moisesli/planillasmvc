<?php

// conexion bd
include "../../bd/conn.php";

// tipo de pedido
$option = $_GET['option'];

// Get Actividades
if ($option == 'getactividades'){
    $actividades = $conn->query("select * from trabajador_actividades order by id Desc")->fetch_all(MYSQLI_ASSOC);
    echo json_encode($actividades);
}

// Get Fuentes
if ($option == 'getfuentes'){
    $fuentes = $conn->query("select * from trabajador_fuentes  order by id Desc")->fetch_all(MYSQLI_ASSOC);
    echo json_encode($fuentes);
}

// Guarda Actividades
if ($option == 'saveactividades'){
    $data = json_decode(file_get_contents("php://input"), true);
    $conn->query("insert into trabajador_actividades (codigo,nombre) values ('{$data['actividad']['codigo']}','{$data['actividad']['nombre']}')");
    echo json_encode($data['actividad']);
}

//Guarda Fuentes
if ($option == 'savefuentes'){
    $data = json_decode(file_get_contents("php://input"), true);
    $conn->query("insert into trabajador_fuentes (codigo,nombre) values ('{$data['fuente']['codigo']}','{$data['fuente']['nombre']}')");
    echo json_encode($data['fuente']);
}

//Update Edit Fuente
if ($option == 'editsavefuentes'){
  $data = json_decode(file_get_contents("php://input"), true);
  $conn->query("update trabajador_fuentes set codigo='{$data['fuente']['codigo']}', nombre='{$data['fuente']['nombre']}' where id={$data['fuente']['id']}");
  echo json_encode($data['fuente']);
}

//Update Edit Actividad
if ($option == 'editsaveactividades'){
    $data = json_decode(file_get_contents("php://input"), true);
    $conn->query("update trabajador_actividades set codigo='{$data['actividad']['codigo']}', nombre='{$data['actividad']['nombre']}' where id={$data['actividad']['id']}");
    echo json_encode($data['actividad']);
}