<?php
class Datos_clsTrabajador{
	public $pCodigo;

	function Contar_Registros($mibusca,$labusca,$miempresa) {
		$vConsulta="select count(*) as total from trabajador where codempresa='$miempresa' and activo='S'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Mostrar_Registros($miinicio,$mifinal,$mibusca,$labusca,$miempresa){
		$vConsulta="select * from trabajador where codempresa='$miempresa' order by apellidos,nombres LIMIT ".$miinicio.",".$mifinal;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function getROW($vCodigo) {
		$vConsulta="select * from trabajador where codigo=".intval($vCodigo);
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Agregar($miempresa,$txtapellidos,$txtapellidos2,$txtnombres,$txtcoddocu,$txtnundoc,$txtdireccion,$txtsexo,$txtfecnaci,$txtnacionalidad,$txtemail,$txteducacion,$mifoto,$txtactivo,$txttipotrabajador,$txtnuncontratto,$txtfecini,$txtfecfin,$txtcargo,$txtsueldo,$txtautogenerado,$txtasigna,$txtonp,$txtafp,$txtcupss,$txtbanco,$txtcuenta,$txtapellidosjudicial,$txtsueldojudicial,$txtapellidosjudicial1,$txtsueldojudicial1,$txtusuario,$txtclave,$txtessalud,$txtdomiciliado,$txtvia,$txtnomvia,$txtnumvia,$txtinterior,$txtzona,$txtnomzona,$txtreferencia,$txtubigeo,$txtregimenlaboral,$txtocupacion,$txtdiscapacidad,$txttipocontrato,$txtregimenalternativo,$txtjornadamaxima,$txthorario,$txtdindicato,$txtperiodicidad,$txtsituacion,$txtrenta,$txtsituacion,$txttipopago,$txtcategoria,$txtconvenio,$txtinstituto,$txtcarrera,$txtano,$txtflujo,$txtscrt,$txtcts,$txtcafae,$txtescolar,$txtvaca){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert trabajador (codigo,codempresa,apellidos,apellidos2,nombres,coddocu,numdocu,direccion,sexo,fnaci,nacionalidad,email,educacion,foto,activo,tipo,contrato,fini,ffin,cargo,sueldo,autogenerado,asignacion,onp,afp,cupps,banco,cuenta,judicial1,monto1,judicial2,monto2,usuario,clave,essalud,domiciliado,via,vianombre,vianum,viainterior,zona,zonanombre,zonareferencia,ubigeo,regimen,ocupacion,discapacidad,tipocontrato,sujeto1,sujeto2,sujeto3,sindicato,periodicidad,situacion,quinta,especial,tipopago,categoria,convenio,instituto,carrera,anual,flujo,scrt,cts,cafae,escolar,vacaciones) values('','$miempresa','$txtapellidos','$txtapellidos2','$txtnombres','$txtcoddocu','$txtnundoc','$txtdireccion','$txtsexo','$txtfecnaci','$txtnacionalidad','$txtemail','$txteducacion','$mifoto','$txtactivo','$txttipotrabajador','$txtnuncontratto','$txtfecini','$txtfecfin','$txtcargo','$txtsueldo','$txtautogenerado','$txtasigna','$txtonp','$txtafp','$txtcupss','$txtbanco','$txtcuenta','$txtapellidosjudicial','$txtsueldojudicial','$txtapellidosjudicial1','$txtsueldojudicial1','$txtusuario','$txtclave','$txtessalud','$txtdomiciliado','$txtvia','$txtnomvia','$txtnumvia','$txtinterior','$txtzona','$txtnomzona','$txtreferencia','$txtubigeo','$txtregimenlaboral','$txtocupacion','$txtdiscapacidad','$txttipocontrato','$txtregimenalternativo','$txtjornadamaxima','$txthorario','$txtdindicato','$txtperiodicidad','$txtsituacion','$txtrenta','$txtsituacione','$txttipopago','$txtcategoria','$txtconvenio','$txtinstituto','$txtcarrera','$txtano','$txtflujo','$txtscrt','$txtcts','$txtcafae','$txtescolar','$txtvaca')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Modificar($vCodigo,$txtapellidos,$txtapellidos2,$txtnombres,$txtcoddocu,$txtnundoc,$txtdireccion,$txtsexo,$txtfecnaci,$txtnacionalidad,$txtemail,$txteducacion,$mifoto,$txtactivo,$txttipotrabajador,$txtnuncontratto,$txtfecini,$txtfecfin,$txtcargo,$txtsueldo,$txtautogenerado,$txtasigna,$txtonp,$txtafp,$txtcupss,$txtbanco,$txtcuenta,$txtapellidosjudicial,$txtsueldojudicial,$txtapellidosjudicial1,$txtsueldojudicial1,$txtusuario,$txtclave,$txtessalud,$txtdomiciliado,$txtvia,$txtnomvia,$txtnumvia,$txtinterior,$txtzona,$txtnomzona,$txtreferencia,$txtubigeo,$txtregimenlaboral,$txtocupacion,$txtdiscapacidad,$txttipocontrato,$txtregimenalternativo,$txtjornadamaxima,$txthorario,$txtdindicato,$txtperiodicidad,$txtsituacion,$txtrenta,$txtsituacione,$txttipopago,$txtcategoria,$txtconvenio,$txtinstituto,$txtcarrera,$txtano,$txtflujo,$txtscrt,$txtcts,$txtcafae,$txtescolar,$txtvaca,$fuentes_id,$actividades_id){
		$oConexion= new Datos_clsConexion();
		$strSQL="update trabajador set apellidos='$txtapellidos', apellidos2='$txtapellidos2', nombres='$txtnombres', coddocu='$txtcoddocu', numdocu='$txtnundoc', direccion='$txtdireccion', sexo='$txtsexo', fnaci='$txtfecnaci', nacionalidad='$txtnacionalidad', email='$txtemail', educacion='$txteducacion', foto='$mifoto', activo='$txtactivo', tipo='$txttipotrabajador', contrato='$txtnuncontratto', fini='$txtfecini', ffin='$txtfecfin', cargo='$txtcargo', sueldo='$txtsueldo', autogenerado='$txtautogenerado', asignacion='$txtasigna', onp='$txtonp', afp='$txtafp', cupps='$txtcupss', banco='$txtbanco', cuenta='$txtcuenta', judicial1='$txtapellidosjudicial', monto1='$txtsueldojudicial', judicial2='$txtapellidosjudicial1', monto2='$txtsueldojudicial1', usuario='$txtusuario', clave='$txtclave', essalud='$txtessalud', domiciliado='$txtdomiciliado', via='$txtvia', vianombre='$txtnomvia', vianum='$txtnumvia', viainterior='$txtinterior', zona='$txtzona', zonanombre='$txtnomzona', zonareferencia='$txtreferencia', ubigeo='$txtubigeo', regimen='$txtregimenlaboral', ocupacion='$txtocupacion', discapacidad='$txtdiscapacidad', tipocontrato='$txttipocontrato', tipocontrato='$txttipocontrato', sujeto1='$txtregimenalternativo', sujeto2='$txtjornadamaxima', sujeto3='$txthorario', sindicato='$txtdindicato', periodicidad='$txtperiodicidad', situacion='$txtsituacion', quinta='$txtrenta', especial='$txtsituacione', tipopago='$txttipopago', categoria='$txtcategoria', convenio='$txtconvenio', instituto='$txtinstituto', carrera='$txtcarrera', anual='$txtano',flujo='$txtflujo',scrt='$txtscrt',cts='$txtcts',cafae='$txtcafae',escolar='$txtescolar',vacaciones='$txtvaca',fuentes_id=$fuentes_id,actividades_id=$actividades_id where codigo=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Modificar1($micodigo,$txtapellidos,$txtapellidos2,$txtnombres,$txtcoddocu,$txtnundoc,$txtdireccion,$txtsexo,$txtfecnaci,$txtnacionalidad,$txtemail,$txteducacion,$txtactivo,$txttipotrabajador,$txtnuncontratto,$txtfecini,$txtfecfin,$txtcargo,$txtsueldo,$txtautogenerado,$txtasigna,$txtonp,$txtafp,$txtcupss,$txtbanco,$txtcuenta,$txtapellidosjudicial,$txtsueldojudicial,$txtapellidosjudicial1,$txtsueldojudicial1,$txtusuario,$txtclave,$txtessalud,$txtdomiciliado,$txtvia,$txtnomvia,$txtnumvia,$txtinterior,$txtzona,$txtnomzona,$txtreferencia,$txtubigeo,$txtregimenlaboral,$txtocupacion,$txtdiscapacidad,$txttipocontrato,$txtregimenalternativo,$txtjornadamaxima,$txthorario,$txtdindicato,$txtperiodicidad,$txtsituacion,$txtrenta,$txtsituacione,$txttipopago,$txtcategoria,$txtconvenio,$txtinstituto,$txtcarrera,$txtano,$txtflujo,$txtscrt,$txtcts,$txtcafae,$txtescolar,$txtvaca,$fuentes_id,$actividades_id){
		$oConexion= new Datos_clsConexion();
		$strSQL="update trabajador set apellidos='$txtapellidos', apellidos2='$txtapellidos2', nombres='$txtnombres', coddocu='$txtcoddocu', numdocu='$txtnundoc', direccion='$txtdireccion', sexo='$txtsexo', fnaci='$txtfecnaci', nacionalidad='$txtnacionalidad', email='$txtemail', educacion='$txteducacion', activo='$txtactivo', tipo='$txttipotrabajador', contrato='$txtnuncontratto', fini='$txtfecini', ffin='$txtfecfin', cargo='$txtcargo', sueldo='$txtsueldo', autogenerado='$txtautogenerado', asignacion='$txtasigna', onp='$txtonp', afp='$txtafp', cupps='$txtcupss', banco='$txtbanco', cuenta='$txtcuenta', judicial1='$txtapellidosjudicial', monto1='$txtsueldojudicial', judicial2='$txtapellidosjudicial1', monto2='$txtsueldojudicial1', usuario='$txtusuario', clave='$txtclave', essalud='$txtessalud', domiciliado='$txtdomiciliado', via='$txtvia', vianombre='$txtnomvia', vianum='$txtnumvia', viainterior='$txtinterior', zona='$txtzona', zonanombre='$txtnomzona', zonareferencia='$txtreferencia', ubigeo='$txtubigeo', regimen='$txtregimenlaboral', ocupacion='$txtocupacion', discapacidad='$txtdiscapacidad', tipocontrato='$txttipocontrato', tipocontrato='$txttipocontrato', sujeto1='$txtregimenalternativo', sujeto2='$txtjornadamaxima', sujeto3='$txthorario', sindicato='$txtdindicato', periodicidad='$txtperiodicidad', situacion='$txtsituacion', quinta='$txtrenta', especial='$txtsituacion', tipopago='$txttipopago', categoria='$txtcategoria', convenio='$txtconvenio', instituto='$txtinstituto',carrera='$txtcarrera',anual='$txtano',flujo='$txtflujo',scrt='$txtscrt',cts='$txtcts',cafae='$txtcafae',escolar='$txtescolar',vacaciones='$txtvaca',fuentes_id=$fuentes_id,actividades_id=$actividades_id where codigo=".intval($micodigo);
		//echo $strSQL;
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}	
	function Eliminar($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL="delete from trabajador where codigo=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}	
	function Mostrar_Registros_Todos($miempresa,$mitipo){
		$vConsulta="select * from trabajador where codempresa='$miempresa' and tipo='$mitipo' and activo='S'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Registros_Todos1($miempresa,$mitipo){
		$vConsulta="select * from trabajador where codempresa='$miempresa' and tipo='$mitipo' and activo='S' and vacaciones='S'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	
	function Mostrar_Registros_Todos_Judicial($miempresa){
		$vConsulta="select * from trabajador where codempresa='$miempresa' and activo='S' and monto1>0";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function Mostrar_Registros_Todos_Todos($miempresa){
		$vConsulta="select * from trabajador where codempresa='$miempresa'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function Buscar_Documento($midocumento) {
		$vConsulta="select * from documento where nombre='$midocumento'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Buscar_Sexo($misexo) {
		$vConsulta="select * from sexo where nombre='$misexo'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Mostrar_Registros_Todos_Todos_Pensionista($miempresa){
		$vConsulta="select * from trabajador where codempresa='$miempresa' and onp='N' and tipo='PENSIONISTA'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Buscar_Regimen($laafp) {
		$vConsulta="select * from afp where nombre='$laafp'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}				
	function ContarHorario($codtrabajador) {
		$vConsulta="select count(*) as total from horario where codtrabajador='$codtrabajador'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Contar_Contratosvencidos($mimes) {
		$vConsulta="select count(*) as total from trabajador where month(ffin) ='$mimes'";
		 
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Buscar_Mes($mimes) {
		$vConsulta="select * from meses where codigo='$mimes'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function AgregarEscalafon($codtra,$laopcion,$detalle,$descripcion,$observa){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert escalafon (codtrabajador,nivel,detalle,descripcion,observa) values('$codtra','$laopcion','$detalle','$descripcion','$observa')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function EliminarEscalafon($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL="delete from escalafon where codigo=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}	
	function BuscarHorario($micodigo) {
		$vConsulta="select * from horario where codtrabajador='$micodigo'";
		//echo  $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	
	function AgregarHorario($codtrabajador){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert horario (codtrabajador) values('$codtrabajador')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Modificar_Horario($elcodigo,$lunese,$lunes_e,$luness,$lunes_s,$martese,$martes_e,$martess,$martes_s,$miercolese,$miercoles_e,$miercoless,$miercoles_s,$juevese,$jueves_e,$juevess,$jueves_s,$viernese,$viernes_e,$vierness,$viernes_s,$sabadoe,$sabado_e,$sabados,$sabado_s,$domingoe,$domingo_e,$domingos,$domingo_s){
		$oConexion= new Datos_clsConexion();
		$strSQL="update horario set lunese='$lunese',lunes_e='$lunes_e',luness='$luness',lunes_s='$lunes_s',martese='$martese',martes_e='$martes_e',martess='$martess',martes_s='$martes_s',miercolese='$miercolese',miercoles_e='$miercoles_e',miercoless='$miercoless',miercoles_s='$miercoles_s',juevese='$juevese',jueves_e='$jueves_e',juevess='$juevess',jueves_s='$jueves_s',viernese='$viernese',viernes_e='$viernes_e',vierness='$vierness',viernes_s='$viernes_s',sabadoe='$sabadoe',sabado_e='$sabado_e',sabados='$sabados',sabado_s='$sabado_s',domingoe='$domingoe',domingo_e='$domingo_e',domingos='$domingos',domingo_s='$domingo_s' where codtrabajador='$elcodigo'";
		//echo $strSQL;
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Mostrar_Registros_Apertura(){
		$vConsulta="select * from apertura";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function Contarapertura($txtfecha) {
		$vConsulta="select count(*) as total from apertura where fecha='$txtfecha'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function AgregarAperura($txtfecha,$midia){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert apertura (fecha,dia) values('$txtfecha','$midia')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Mostrar_Registros_Lista($miempresa){
		$vConsulta="select * from trabajador where codempresa='$miempresa' and activo='S'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$turno,$midia,$horas){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert asistencia (codempresa,codtrabajador,fecha,periodo,mes,turno,dia,horaasiste) values('$miempresa','$codtrabajador','$fecha','$miano','$mimes','$turno','$midia','$horas')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	
}
?>