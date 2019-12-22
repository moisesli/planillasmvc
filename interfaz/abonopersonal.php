<?php session_start();
	$miusuario=$_SESSION["apellidos"];
	$misiglas=$_SESSION["usuario"];
	$micodusu=$_SESSION['codigo'];	
	$miempresa=$_SESSION['codempresa'];	
	$miperiodo=$_SESSION['periodo'];
	$mitipo=$_SESSION['tipo'];
	if(!($_SESSION["accesar"] == "OK")){
		session_destroy();
		echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=../index.php'>";	
	}
?>
<?php
	include("../config.php");
	require_once(LOGICA."/negocio.php");

	function FormatDate($vFecha, $vFormat='d/m/Y'){
	$miFecha=split("-", $vFecha);
	$vFecha=mktime(0, 0, 0, intval($miFecha[1]), intval($miFecha[2]), intval($miFecha[0]));
	return date($vFormat, $vFecha);
	}
		
?>	
<?php
$oEntidad=new Negocio_clsConfiguracion();
$rsEntidad=$oEntidad->Buscar_Entidad($miempresa,$miperiodo);
$archivo='../txt/DP'.$rsEntidad['periodo'].'.txt';
$fp=fopen($archivo,'w');
$oTrabajador=new Negocio_clsTrabajador();	
$rslistado=$oTrabajador->Mostrar_Registros_Todos_Todos($miempresa);	
while($rowtrabajador=$rslistado->fetch_array())
{
	$documento=$rowtrabajador['coddocu'];
	$elsexo=$rowtrabajador['sexo'];
	$rsDocumento=$oTrabajador->Buscar_Documento($documento);
	$rsSexo=$oTrabajador->Buscar_Sexo($elsexo);
	fwrite($fp,$rsDocumento['coddocumento']);
	fwrite($fp,';');
	fwrite($fp,$rowtrabajador['numdocu']);
	fwrite($fp,';');
	fwrite($fp,$rowtrabajador['apellidos']);
	fwrite($fp,';');
	fwrite($fp,$rowtrabajador['apellidos2']);
	fwrite($fp,';');
	fwrite($fp,$rowtrabajador['nombres']);
	fwrite($fp,';');
	fwrite($fp,$rsSexo['codsexo']);
	fwrite($fp,';');
	fwrite($fp,FormatDate($rowtrabajador['fnaci']));
	fwrite($fp,';');
	fwrite($fp,';');
	fwrite($fp,';');
	fwrite($fp,"N" . PHP_EOL);
}
fclose($fp);
echo 'SE PROCESO CORRECTAMENTE...'.'<p>';
echo 'EL ARCHIVO SE ENCUENTRA EN LA CARPETA TXT...'.'<p>';

?>