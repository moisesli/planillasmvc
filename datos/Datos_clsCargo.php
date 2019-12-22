<?php
class Datos_clsCargo{
	public $pCodigo;

	function Contar_Registros($miempresa) {
		$vConsulta="select count(*) as total from cargo where codempresa='$miempresa'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Mostrar_Registros($miinicio,$mifinal,$miempresa){
		$vConsulta="select * from cargo where codempresa='$miempresa' LIMIT ".$miinicio.",".$mifinal;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function getROW($vCodigo) {
		$vConsulta="select * from cargo where codigo=".intval($vCodigo);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Agregar($miempresa,$txtbanco){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert cargo (codigo,codempresa,nombre) values('','$miempresa','$txtbanco')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Modificar($micodigo,$txtbanco){
		$oConexion= new Datos_clsConexion();
		$strSQL="update cargo set nombre='$txtbanco' where codigo=".intval($micodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Eliminar($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL="delete from cargo where codigo=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
	}	
}
?>