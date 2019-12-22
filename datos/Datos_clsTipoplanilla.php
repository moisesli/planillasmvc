<?php
class Datos_clsTipoplanilla{
	public $pCodigo;

	function Contar_Registros($miarchi,$miempresa) {
		$vConsulta="select count(*) as total from tipoplanilla where codempresa='$miempresa'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Mostrar_Registros($miinicio,$mifinal,$miarchi,$miempresa){
		$vConsulta="select * from tipoplanilla where codempresa='$miempresa' LIMIT ".$miinicio.",".$mifinal;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function getROW($vCodigo) {
		$vConsulta="select * from tipoplanilla where codigo=".intval($vCodigo);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Agregar($mitipoplanilla,$miinicial,$miempresa,$midescuento){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert tipoplanilla (codigo,nombre,inicial,codempresa,descuento) values('','$mitipoplanilla','$miinicial','$miempresa','$midescuento')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Modificar($codigo,$mitipoplanilla,$miinicial,$midescuento){
		$oConexion= new Datos_clsConexion();
		$strSQL="update tipoplanilla set nombre='$mitipoplanilla', inicial='$miinicial', descuento='$midescuento' where codigo=".intval($codigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Eliminar($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL="delete from tipoplanilla where codigo=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
	}
	function Mostrar_Registros_Todos($miempresa){
		$vConsulta="select nombre from tipoplanilla where codempresa='$miempresa'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Buscar_Tipoplanilla($laplanilla,$miempresa) {
		$vConsulta="select * from tipoplanilla where nombre='$laplanilla' and codempresa='$miempresa'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}			
}
?>