<?php
$conn = new mysqli('localhost', 'root', '', 'planillamvc');
// if ($_SERVER['HTTP_HOST'] == 'monases2.com'){
//   $conn = new mysqli('localhost', 'root', 'moiseslinar3s', 'monases');
// }else {
//   $conn = new mysqli('52.13.229.176', 'root', 'moiseslinar3s', 'monases');
// }
// error de conexion
if ($conn->connect_errno) {
    echo "No se pudo conectar a la Base de Datos";
    exit;
}
?>