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
//echo 'SE PROCESO CORRECTAMENTE...';
?>
<?php
$oEntidad=new Negocio_clsConfiguracion();
$rsEntidad=$oEntidad->Buscar_Entidad($miempresa,$miperiodo);
$archivo='../plameterceros/PT_'.$rsEntidad['ruc'].'.tra';
$fp=fopen($archivo,'w');
$oTrabajador=new Negocio_clsTrabajador();	
$rslistado=$oTrabajador->Mostrar_Registros_Todos_Todos($miempresa);	
while($rowtrabajador=$rslistado->fetch_array())
{
	
	$eldocumento=$rowtrabajador['coddocu'];
	$rsDocumento=$oTrabajador->Buscar_Documento($eldocumento);
	$elnumerodoc=$rowtrabajador['numdocu'];
	if ($rowtrabajador['onp']=='N')
	{
		$elonp=1;
	}
	else
	{
		$elonp=2;
	}
	if ($rowtrabajador['coddocu']=='DNI')
	{
		$elcodpais='604';
	}
	else
	{
		$elcodpais='';
	}	
	if (substr($rowtrabajador['tipo'],0,2)=='P11')
	{
	fwrite($fp,$rsDocumento['coddocumento']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['numdocu']);
	fwrite($fp,'|');	
	fwrite($fp,'|'. PHP_EOL);
	}
}
fclose($fp);
echo 'SE PROCESO CORRECTAMENTE...';
?>