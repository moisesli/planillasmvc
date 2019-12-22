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
$archivo='../tregistro/RP_'.$rsEntidad['ruc'].'.tra';
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
	fwrite($fp,$rsDocumento['coddocumento']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['numdocu']);
	fwrite($fp,'|');	
	fwrite($fp,$elcodpais);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['regimen']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['educacion']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['ocupacion']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['discapacidad']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['cupps']);
	fwrite($fp,'|');
	fwrite($fp,'');
	//fwrite($fp,$elonp);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['tipocontrato']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['sujeto1']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['sujeto2']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['sujeto3']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['sindicato']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['periodicidad']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['sueldo']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['situacion']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['quinta']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['especial']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['tipopago']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['categoria']);
	fwrite($fp,'|');
	fwrite($fp,$rowtrabajador['convenio']);
	fwrite($fp,'|');	
	fwrite($fp,'|'. PHP_EOL);
}
fclose($fp);
echo 'SE PROCESO CORRECTAMENTE...'.'<p>';
echo 'EL ARCHIVO SE ENCUENTRA EN LA CARPETA tregistro...'.'<p>';

?>