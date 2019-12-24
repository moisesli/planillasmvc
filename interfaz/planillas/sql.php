<?php

// Conexion Bd
include '../bd/conn.php';

// Consulta la Bd Creacion, Cabezeras
$micodigo = $_GET['micodigo'];
$creacion = $conn->query("select * from creacion where codigo=$micodigo")->fetch_array(MYSQLI_ASSOC);

// Consulta Trabajadores
$planillas = $conn->query('select a.*,b.apellidos,b.apellidos2,b.nombres from planilla a INNER JOIN trabajador b ON a.codtrabajador=b.codigo where a.codplanilla=\'1\' order by apellidos,apellidos2,nombres')->fetch_all(MYSQLI_ASSOC);

// Crea el array con las cabezeras de ingresos
$ingresos = array(); // Array Vacio
$i = 0;
if ($creacion['ok1'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso1'];
    $ingresos[$i]['position'] = 1;
    $i++;
}
if ($creacion['ok2'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso2'];
    $ingresos[$i]['position'] = 2;
    $i++;
}
if ($creacion['ok3'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso3'];
    $ingresos[$i]['position'] = 3;
    $i++;
}
if ($creacion['ok4'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso4'];
    $ingresos[$i]['position'] = 4;
    $i++;
}
if ($creacion['ok5'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso5'];
    $ingresos[$i]['position'] = 5;
    $i++;
}
if ($creacion['ok6'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso6'];
    $ingresos[$i]['position'] = 6;
    $i++;
}
if ($creacion['ok7'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso7'];
    $ingresos[$i]['position'] = 7;
    $i++;
}
if ($creacion['ok8'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso8'];
    $ingresos[$i]['position'] = 8;
    $i++;
}
if ($creacion['ok9'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso9'];
    $ingresos[$i]['position'] = 9;
    $i++;
}
if ($creacion['ok10'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso10'];
    $ingresos[$i]['position'] = 10;
    $i++;
}
if ($creacion['ok11'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso11'];
    $ingresos[$i]['position'] = 11;
    $i++;
}
if ($creacion['ok12'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso12'];
    $ingresos[$i]['position'] = 12;
    $i++;
}
if ($creacion['ok13'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso13'];
    $ingresos[$i]['position'] = 13;
    $i++;
}
if ($creacion['ok14'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso14'];
    $ingresos[$i]['position'] = 14;
    $i++;
}
if ($creacion['ok15'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso15'];
    $ingresos[$i]['position'] = 15;
    $i++;
}
if ($creacion['ok16'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso16'];
    $ingresos[$i]['position'] = 16;
    $i++;
}
if ($creacion['ok17'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso17'];
    $ingresos[$i]['position'] = 17;
    $i++;
}
if ($creacion['ok18'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso18'];
    $ingresos[$i]['position'] = 18;
    $i++;
}
if ($creacion['ok19'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso19'];
    $ingresos[$i]['position'] = 19;
    $i++;
}
if ($creacion['ok20'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso20'];
    $ingresos[$i]['position'] = 20;
    $i++;
}
if ($creacion['ok21'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso21'];
    $ingresos[$i]['position'] = 21;
    $i++;
}
if ($creacion['ok22'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso22'];
    $ingresos[$i]['position'] = 22;
    $i++;
}
if ($creacion['ok23'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso23'];
    $ingresos[$i]['position'] = 23;
    $i++;
}
if ($creacion['ok24'] == 'S') {
    $ingresos[$i]['nombre'] = $creacion['ingreso24'];
    $ingresos[$i]['position'] = 24;
    $i++;
}


// Declare Sunas Globales
//$otroingresos = 0;
//$totalremuneracion = 0;
//$totalremuneraciongeneral = 0;
//$totaldescuentos = 0;
//$totalaportes = 0;
//$totalapagar = 0;
//$afphabitat = 0;
//$afpintegra = 0;
//$afpprima = 0;
//$afpprofucturo = 0;


$array_actividades = Array();
$array_fuentes = Array();
$array_actividades_index = 0;
$array_fuentes_index = 0;
$array_descuentos = [];
$afp1 = 0;

// Recorre Todos los empleado de la planilla
// Y compara con las columnas seleccionadas en la cabezera
foreach ($planillas as $i => $empleado) {

    /*Array Descuentos para calculos*/
    $di = 0;
    $array_descuentos[$di]['position'] =$di;
    $array_descuentos[$di]['monto'] += $empleado['afp1'];
    $array_descuentos[$di]['nombre'] = $creacion['afp1'];
    $di++;
    $array_descuentos[$di]['position'] =$di;
    $array_descuentos[$di]['monto'] += $empleado['afp2'];
    $array_descuentos[$di]['nombre'] = $creacion['afp2'];
    $di++;
    $array_descuentos[$di]['position'] =$di;
    $array_descuentos[$di]['monto'] += $empleado['afp3'];
    $array_descuentos[$di]['nombre'] = $creacion['afp3'];
    $di++;
    $array_descuentos[$di]['position'] =$di;
    $array_descuentos[$di]['monto'] += $empleado['onp'];
    $array_descuentos[$di]['nombre'] = $creacion['onp'];
    $di++;
    $array_descuentos[$di]['position'] =$di;
    $array_descuentos[$di]['monto'] += $empleado['essalud'];
    $array_descuentos[$di]['nombre'] = $creacion['essalud'];
    $di++;
    $array_descuentos[$di]['position'] =$di;
    $array_descuentos[$di]['monto'] += $empleado['senati'];
    $array_descuentos[$di]['nombre'] = $creacion['senati'];
    $di++;
    $array_descuentos[$di]['position'] =$di;
    $array_descuentos[$di]['monto'] += $empleado['scrtsalud'];
    $array_descuentos[$di]['nombre'] = $creacion['scrtsalud'];
    $di++;
    $array_descuentos[$di]['position'] =$di;
    $array_descuentos[$di]['monto'] += $empleado['scrtpension'];
    $array_descuentos[$di]['nombre'] = $creacion['scrtpension'];
    $di++;
    $array_descuentos[$di]['position'] =$di;
    $array_descuentos[$di]['monto'] += $empleado['ies'];
    $array_descuentos[$di]['nombre'] = $creacion['ies'];
    $di++;
    $array_descuentos[$di]['position'] =$di;
    $array_descuentos[$di]['monto'] += $empleado['ipssvida'];
    $array_descuentos[$di]['nombre'] = $creacion['ipssvida'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['quinta'];
    $array_descuentos[$di]['nombre'] = $creacion['quinta'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento1'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento1'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento2'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento2'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento3'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento3'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento4'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento4'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento5'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento5'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento6'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento6'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento7'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento7'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento8'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento8'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento9'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento9'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento10'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento10'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento11'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento11'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento12'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento12'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento13'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento13'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento14'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento14'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento15'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento15'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento16'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento16'];
    $di++;
    $array_descuentos[$di]['position'] = $di;
    $array_descuentos[$di]['monto'] += $empleado['descuento17'];
    $array_descuentos[$di]['nombre'] = $creacion['descuento17'];

    // Ingresos
    $planillas[$i]['ingresos_linea_total'] = $empleado['ingreso1'] + $empleado['ingreso2'] + $empleado['ingreso3'] + $empleado['ingreso4'] + $empleado['ingreso5'] + $empleado['ingreso6'] + $empleado['ingreso7'] + $empleado['ingreso8'] + $empleado['ingreso9'] + $empleado['ingreso10'] + $empleado['ingreso11'] + $empleado['ingreso12'] + $empleado['ingreso13'] + $empleado['ingreso14'] + $empleado['ingreso15'] + $empleado['ingreso16'] + $empleado['ingreso17'] + $empleado['ingreso18'] + $empleado['ingreso19'] + $empleado['ingreso20'] + $empleado['ingreso21'] + $empleado['ingreso22'] + $empleado['ingreso23'] + $empleado['ingreso24'];
    $planillas[$i]['ingresos_all'] = " <div class='text-left'>
        1.- {$creacion['ingreso1']} : {$empleado['ingreso1']} <br />
        2.- {$creacion['ingreso2']} : {$empleado['ingreso2']} <br />
        3.- {$creacion['ingreso3']} : {$empleado['ingreso3']} <br />
        4.- {$creacion['ingreso4']} : {$empleado['ingreso4']} <br />
        5.- {$creacion['ingreso5']} : {$empleado['ingreso5']} <br />
        6.- {$creacion['ingreso6']} : {$empleado['ingreso6']} <br />
        7.- {$creacion['ingreso7']} : {$empleado['ingreso7']} <br />
        8.- {$creacion['ingreso8']} : {$empleado['ingreso8']} <br />
        9.- {$creacion['ingreso9']} : {$empleado['ingreso9']} <br />
        10.- {$creacion['ingreso10']} : {$empleado['ingreso10']} <br />
        11.- {$creacion['ingreso11']} : {$empleado['ingreso11']} <br />
        12.- {$creacion['ingreso12']} : {$empleado['ingreso12']} <br />
        13.- {$creacion['ingreso13']} : {$empleado['ingreso13']} <br />
        14.- {$creacion['ingreso14']} : {$empleado['ingreso14']} <br />
        15.- {$creacion['ingreso15']} : {$empleado['ingreso15']} <br />
        16.- {$creacion['ingreso16']} : {$empleado['ingreso16']} <br />
        17.- {$creacion['ingreso17']} : {$empleado['ingreso17']} <br />
        18.- {$creacion['ingreso18']} : {$empleado['ingreso18']} <br />
        19.- {$creacion['ingreso19']} : {$empleado['ingreso19']} <br />
        20.- {$creacion['ingreso20']} : {$empleado['ingreso20']} <br />
        21.- {$creacion['ingreso21']} : {$empleado['ingreso21']} <br />
        22.- {$creacion['ingreso22']} : {$empleado['ingreso22']} <br />
        23.- {$creacion['ingreso23']} : {$empleado['ingreso23']} <br />
        24.- {$creacion['ingreso24']} : {$empleado['ingreso24']} <br />
        =============== <br />
        TOTAL: {$planillas[$i]['ingresos_linea_total']}
        </div>
    ";

    // Define all Ingresos Tooltip
    $planillas[$i]['descuento_lineal_total'] = $empleado['afp1'] + $empleado['afp2'] + $empleado['afp3'] + $empleado['onp'] + $empleado['quinta'] + $empleado['ipssvida'] + $empleado['descuento1'] + $empleado['descuento2'] + $empleado['descuento3'] + $empleado['descuento4'] + $empleado['descuento5'] + $empleado['descuento6'] + $empleado['descuento7'] + $empleado['descuento8'] + $empleado['descuento9'] + $empleado['descuento10'] + $empleado['descuento11'] + $empleado['descuento12'] + $empleado['descuento13'] + $empleado['descuento14'] + $empleado['descuento15'] + $empleado['descuento16'] + $empleado['descuento17'];
    $planillas[$i]['descuento_lineal_otros'] = $empleado['quinta'] + $empleado['ipssvida'] + $empleado['descuento1'] + $empleado['descuento2'] + $empleado['descuento3'] + $empleado['descuento4'] + $empleado['descuento5'] + $empleado['descuento6'] + $empleado['descuento7'] + $empleado['descuento8'] + $empleado['descuento9'] + $empleado['descuento10'] + $empleado['descuento11'] + $empleado['descuento12'] + $empleado['descuento13'] + $empleado['descuento14'] + $empleado['descuento15'] + $empleado['descuento16'] + $empleado['descuento17'];
    $planillas[$i]['descuentos_all'] = " <div class='text-left'>
        1.- {$creacion['afp1']} : {$empleado['afp1']} <br/>
        2.- {$creacion['afp2']} : {$empleado['afp2']} <br/>
        3.- {$creacion['afp3']} : {$empleado['afp3']} <br/>
        4.- {$creacion['onp']} : {$empleado['onp']} <br/>
        5.- {$creacion['quinta']} : {$empleado['quinta']} <br/>
        6.- {$creacion['ipssvida']} : {$empleado['ipssvida']} <br/>
        7.- {$creacion['descuento1']} : {$empleado['descuento1']} <br/>
        8.- {$creacion['descuento2']} : {$empleado['descuento2']} <br/>
        9.- {$creacion['descuento3']} : {$empleado['descuento3']} <br/>
        10.- {$creacion['descuento4']} : {$empleado['descuento4']} <br/>
        11.- {$creacion['descuento5']} : {$empleado['descuento5']} <br/>
        12.- {$creacion['descuento6']} : {$empleado['descuento6']} <br/>
        13.- {$creacion['descuento7']} : {$empleado['descuento7']} <br/>
        14.- {$creacion['descuento8']} : {$empleado['descuento8']} <br/>
        15.- {$creacion['descuento9']} : {$empleado['descuento9']} <br/>
        16.- {$creacion['descuento10']} : {$empleado['descuento10']} <br/>
        17.- {$creacion['descuento11']} : {$empleado['descuento11']} <br/>
        18.- {$creacion['descuento12']} : {$empleado['descuento12']} <br/>
        19.- {$creacion['descuento13']} : {$empleado['descuento13']} <br/>
        20.- {$creacion['descuento14']} : {$empleado['descuento14']} <br/>
        21.- {$creacion['descuento15']} : {$empleado['descuento15']} <br/>
        22.- {$creacion['descuento16']} : {$empleado['descuento16']} <br/>
        23.- {$creacion['descuento17']} : {$empleado['descuento17']} <br/>
        =============== <br />
        TOTAL: {$planillas[$i]['descuento_lineal_total']}
        </div>
    ";

    // Neto a Pagar
    $planillas[$i]['neto_pagar_lineal'] = $planillas[$i]['ingresos_linea_total'] - $planillas[$i]['descuento_lineal_total'];

    // Consultar Trabajador
    $trabajador = $conn->query("SELECT 
        trabajador.*, 
        trabajador_fuentes.codigo fuente_codigo, 
        trabajador_fuentes.nombre fuente_nombre,
        trabajador_actividades.codigo actividad_codigo,
        trabajador_actividades.nombre actividad_nombre
        from trabajador 
        INNER JOIN trabajador_fuentes ON trabajador_fuentes.id=trabajador.fuentes_id     
        INNER JOIN trabajador_actividades ON trabajador_actividades.id=trabajador.actividades_id 
    where trabajador.codigo={$empleado['codtrabajador']}")->fetch_array(MYSQLI_ASSOC);



    if ( $trabajador['actividades_id'] != ""  ) { // si existe fuente entra
        $array_actividades[$array_actividades_index]['id'] = $trabajador['actividades_id'];
        $array_actividades[$array_actividades_index]['codigo'] = $trabajador['actividad_codigo'];
        $array_actividades[$array_actividades_index]['nombre'] = $trabajador['actividad_nombre'];
        $array_actividades_index++;
    }

    // Fuentes
    if ( $trabajador['fuentes_id'] != ""  ){ // si existe fuente entra
        $array_fuentes[$array_fuentes_index]['id'] =  $trabajador['fuentes_id'];
        $array_fuentes[$array_fuentes_index]['codigo'] =  $trabajador['fuente_codigo'];
        $array_fuentes[$array_fuentes_index]['nombre'] =  $trabajador['fuente_nombre'];
        $array_fuentes_index++;
    }



    if ($trabajador['afp'] <> 'SELECCIONA'){
        $afpSuma = $empleado['afp1'] + $empleado['afp2'] + $empleado['afp3'];
        if ($trabajador['afp'] == 'INTEGRA') {
            $afpintegra1 = $afpSuma;
            $afpintegra = $afpintegra + $afpSuma;
        }
        if ($trabajador['afp'] == 'PRIMA') {
            $afpprima1 = $afpSuma;
            $afpprima = $afpprima + $afpSuma;
        }
        if ($trabajador['afp'] == 'PROFUTURO') {
            $afpprofucturo1 = $afpSuma;
            $afpprofucturo = $afpprofucturo + $afpSuma;
        }
        if ($trabajador['afp'] == 'HABITAT') {
            $afphabitat1 = $afpSuma;
            $afphabitat = $afphabitat + $afpSuma;
        }
    }

    // Datos Trabajador
    $planillas[$i]['dni'] = $trabajador['numdocu'];
    $planillas[$i]['nombre'] = $trabajador['apellidos'].' '.$trabajador['apellidos2'].' '.$trabajador['nombres'];
    $planillas[$i]['cargo'] = $trabajador['cargo'];
    $planillas[$i]['trabajador_afp'] = $trabajador['afp'];
    $planillas[$i]['fuente'] = $trabajador['fuente_codigo'];
    $planillas[$i]['fuente_id'] = $trabajador['fuentes_id'];
    $planillas[$i]['actividad_id'] = $trabajador['actividades_id'];
    $planillas[$i]['actividad'] = $trabajador['actividades_id'];

    $otroingresos = round($empleado['ingreso1'] + $empleado['ingreso2'] + $empleado['ingreso3'] + $empleado['ingreso4'] + $empleado['ingreso5'] + $empleado['ingreso6'] + $empleado['ingreso7'] + $empleado['ingreso8'] + $empleado['ingreso9'] + $empleado['ingreso10'] + $empleado['ingreso11'] + $empleado['ingreso12'] + $empleado['ingreso13'] + $empleado['ingreso14'] + $empleado['ingreso15'] + $empleado['ingreso16'] + $empleado['ingreso17'] + $empleado['ingreso18'] + $empleado['ingreso19'] + $empleado['ingreso20'] + $empleado['ingreso21'] + $empleado['ingreso22'] + $empleado['ingreso23'] + $empleado['ingreso24'], 2);

    $totalremuneracion = $otroingresos;
    $totalremuneraciongeneral = $totalremuneraciongeneral + $otroingresos;
    $totaldescuentos = $empleado['afp1'] + $empleado['afp2'] + $empleado['afp3'] + $empleado['onp'] + $empleado['quinta'] + $empleado['ipssvida'] + $empleado['descuento1'] + $empleado['descuento2'] + $empleado['descuento3'] + $empleado['descuento4'] + $empleado['descuento5'] + $empleado['descuento6'] + $empleado['descuento7'] + $empleado['descuento8'] + $empleado['descuento9'] + $empleado['descuento10'] + $empleado['descuento11'] + $empleado['descuento12'] + $empleado['descuento13'] + $empleado['descuento14'] + $empleado['descuento15'] + $empleado['descuento16'] + $empleado['descuento17'];
    $totalaportes = $empleado['essalud'] + $empleado['senati'] + $empleado['scrtsalud'] + $empleado['scrtpension'];
    $totalapagar = $totalremuneracion - $totaldescuentos;


    // Calculo Ingresos Otros Sumatoria
    $ingresos_linea_otros = 0;
    for ($h=1; $h<=24;$h++){
        $esta = 0;
        foreach ($ingresos as $ingreso){
            if ($h == $ingreso['position']){
                $esta = 1;
            }
        }
        if ($esta == 0){
            $nombre = 'ingreso'.$h;
            $ingresos_linea_otros += $empleado[$nombre];
        }
    }

    /*Genera el array Trabajadores en empleados*/
    foreach ($ingresos as $h => $ingreso) {
        // Comparamos los 24 ingresos para saber si coincide con la posicion de las columnas habilitadas
        if ($ingreso['position'] == 1){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso1'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 2){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso2'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 3){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso3'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 4){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso4'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 5){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso5'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 6){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso6'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 7){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso7'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 8){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso8'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 9){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso9'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 10){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso10'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 11){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso11'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 12){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso12'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 13){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso13'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 14){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso14'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 15){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso17'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 16){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso16'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 17){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso17'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 18){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso18'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 19){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso19'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 20){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso20'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 21){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso21'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 22){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso22'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 23){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso23'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
        if ($ingreso['position'] == 24){
            $planillas[$i]['ingresos'][$h]['ingreso'] = $empleado['ingreso24'];
            $planillas[$i]['ingresos'][$h]['position'] = $i+1;
        }
    }
    $planillas[$i]['ingresos_otros'] = $ingresos_linea_otros;
}


// Cantidad de columnas de Ingresos
$column_ingresos =  count($ingresos) +1;
//echo $column_ingresos;
$planillas_json = json_encode($planillas);

// Descuentos array y retenciones
$descuentos_retenciones = [];
$dri=0;
foreach ($array_descuentos as $index => $descuento){
    if ($descuento['monto'] != 0){
       $descuentos_retenciones[$dri]['monto'] = $descuento['monto'];
       $descuentos_retenciones[$dri]['nombre'] = $descuento['nombre'];
        $dri++;
    }
}
$creacion_tabla = json_encode($creacion);
$descuentos_retenciones = json_encode($descuentos_retenciones);
$array_fuentes = json_encode(array_unique($array_fuentes,SORT_REGULAR));
$array_actividades = json_encode(array_unique($array_actividades,SORT_REGULAR));
//print_r($planillas_json);