<?php
class Datos_clsTablas{
	public $pCodigo;

// TABLA DOCUMENTO
	function Mostrar_Documento(){
		$vConsulta="select nombre from documento";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
// TABLA SEXO
	function Mostrar_Sexo(){
		$vConsulta="select nombre from sexo";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}		
// TABLA NACIONALIDAD
	function Mostrar_Nacionalidad(){
		$vConsulta="select codigo,nombre from nacionalidad order by nombre ";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function Agregar_Nacionalidad($minacion){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert nacionalidad (codigo,nombre) values('','$minacion')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}	
// TABLA ACTIVO
	function Mostrar_Activo(){
		$vConsulta="select * from activo";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
// TABLA EDUCACION
	function Mostrar_Educacion(){
		$vConsulta="select * from educacion order by nombre";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
// TABLA TIPO DE TRABAJADOR
	function Mostrar_Tipotrabajador(){
		$vConsulta="select nombre from tipotrabajador";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
// TABLA SINO
	function Mostrar_Sino(){
		$vConsulta="select * from sino";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}				
// TABLA VIAS
	function Mostrar_Vias(){
		$vConsulta="select * from vias order by nombre";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}				
// TABLA ZONAS
	function Mostrar_Zonas(){
		$vConsulta="select * from zonas order by nombre";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
// TABLA REGIMEN LABORAL
	function Mostrar_Regimenlaboral(){
		$vConsulta="select * from regimenlaboral order by nombre";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
// TABLA OCUPACION
	function Mostrar_Ocupacion(){
		$vConsulta="select * from ocupacion order by nombre";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}		
// TABLA TIPO CONTRATO
	function Mostrar_Tipocontrato(){
		$vConsulta="select * from tipocontrato order by nombre";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
// TABLA PERIODICIDAD
	function Mostrar_Periocidad(){
		$vConsulta="select * from periocidad order by nombre";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
// TABLA SITUACION LABORAL
	function Mostrar_Situacion(){
		$vConsulta="select * from situacionlaboral";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
// TABLA SITUACION ESPECIAL
	function Mostrar_Situacionespecial(){
		$vConsulta="select * from situacionespecial";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
// TABLA TIPO DE PAGO
	function Mostrar_Tipopago(){
		$vConsulta="select * from tipopago";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
// TABLA CATEGORIA OCUPACIONAL
	function Mostrar_CategoriaOcupacional(){
		$vConsulta="select * from categoriaocupacional order by nombre";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
// TABLA CONVENIOS
	function Mostrar_Convenios(){
		$vConsulta="select * from convenios order by nombre";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
// TABLA CONVENIOS
	function Mostrar_Instituto(){
		$vConsulta="select * from instituto order by nombre";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
// TABLA CARRERAS
	function Mostrar_Carrera($lapro){
		$vConsulta="select codigo,nombre from carreras where codist='$lapro' order by nombre";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}											
	function Mostrar_Cargo(){
		$vConsulta="select nombre from cargo order by codigo";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}											
	function Mostrar_Registros_Periodos(){
		$vConsulta="select * from periodo";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function BuscarDocumento($documento){
		$vConsulta="select * from documento where nombre='$documento'";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function BuscarEmpleados($documento){
		$vConsulta="select * from trabajador where codigo='$documento'";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function BuscarMes($documento){
		$vConsulta="select * from meses where nombre='$documento'";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function BuscarTipotrabajador($documento){
		$vConsulta="select * from tipotrabajador where nombre='$documento'";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function MostrarEscalafon($elcodigo,$laopcion){
		$vConsulta="select * from escalafon where nivel='$laopcion' and codtrabajador='$elcodigo'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Meses(){
		$vConsulta="select * from meses order by codigo";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}				
	function Mostrar_Asistencia($elcodigo,$elmes){
		$vConsulta="select * from asistencia where codtrabajador='$elcodigo' and mes='$elmes' order by fecha desc";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function BuscarHorario($micod){
		$vConsulta="select * from asistencia where codigo='$micod'";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Mostrar_Justifica(){
		$vConsulta="select codigo,nombre from justifica";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function ContarControl($miperiodo,$elmes,$elcodigo){
		$vConsulta="select count(*) as total from control where codtrabajador='$elcodigo' and periodo='$miperiodo' and mes='$elmes'";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function AgregarControl($miperiodo,$elmes,$elcodigo,$totdias,$totalhoras,$totalminutos,$desdia,$deshora,$desmin){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert control (codtrabajador,periodo,mes,dia,horas,minutos,desdia,deshor,desmin) values('$elcodigo','$miperiodo','$elmes','$totdias','$totalhoras','$totalminutos','$desdia','$deshora','$desmin')";
		//echo $strSQL;
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}	
	function ModificarControl($miperiodo,$elmes,$elcodigo,$totdias,$totalhoras,$totalminutos,$desdia,$deshora,$desmin){
		$oConexion= new Datos_clsConexion();
		$strSQL="update control set dia='$totdias',horas='$totalhoras',minutos='$totalminutos',desdia='$desdia',deshor='$deshora',desmin='$desmin' where codtrabajador='$elcodigo' and periodo='$miperiodo' and mes='$elmes'";
		//echo $strSQL;
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}	
	function Ponertardanza($codtra,$horas,$miminuto){
		$oConexion= new Datos_clsConexion();
		$strSQL="update asistencia set horatarde='$horas',minutotarde='$miminuto' where codigo='$codtra'";
		//echo $strSQL;
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}	
	function Mostrar_Trabajadores(){
		$vConsulta="select codigo,concat(apellidos,' ',apellidos2,' ',nombres) as miapellido from trabajador order by apellidos,apellidos2,nombres";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}				
	function BuscarJustifica($micod){
		$vConsulta="select * from justifica where codigo='$micod'";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Buscarmesnumero($elmesnumero){
		$vConsulta="select * from meses where codigo='$elmesnumero'";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	
}
?>