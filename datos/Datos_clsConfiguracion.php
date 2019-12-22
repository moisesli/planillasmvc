<?php
class Datos_clsConfiguracion{
	public $pCodigo;

	function Contar_Registros($miempresa,$miperiodo) {
		$vConsulta="select count(*) as total from entidad where codempresa='$miempresa' and periodo='$miperiodo'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}

	function Mostrar_Registros($miinicio,$mifinal,$miempresa,$miperiodo){
		$vConsulta="select * from entidad where codempresa='$miempresa' and periodo='$miperiodo' LIMIT ".$miinicio.",".$mifinal;
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}

	function getROW($vCodigo) {
		$vConsulta="select * from entidad where codigo=".intval($vCodigo);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Agregar($miempresa,$miperiodo){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert entidad (codigo,codempresa,periodo) values('','$miempresa','$miperiodo')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $strSQL;		
	}
	function Modificar($elcodigo,$txtunidad,$txtentidad,$txtruc,$txtdireccion,$txtemail,$txttelefono,$txtsueldo,$txtasignacion,$txtcts,$txtminuto,$txtuit,$txtquinta){
		$oConexion= new Datos_clsConexion();
		$strSQL="update entidad set unidad='$txtunidad', nombre='$txtentidad', ruc='$txtruc', direccion='$txtdireccion', email='$txtemail', telefono='$txttelefono', sueldo='$txtsueldo', asignacion='$txtasignacion', cts='$txtcts', minuto='$txtminuto', uit='$txtuit',quinta='$txtquinta' where codigo=".intval($elcodigo);
		
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Eliminar($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL="delete from entidad where codigo=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
	}
// MOSTRAR LOS MESES
	function Mostrar_Registros_Mes(){
		$vConsulta="select nombre from meses";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Buscar_Entidad($miempresa,$miperiodo) {
		$vConsulta="select * from entidad where codempresa='$miempresa' and periodo='$miperiodo'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}						
	
	function Buscar_aporteempleador($miempresa,$miperiodo) {
		$vConsulta="select * from empleador where codempresa='$miempresa' and periodo='$miperiodo' limit 1";
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