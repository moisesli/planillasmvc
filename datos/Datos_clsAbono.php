<?php
class Datos_clsAbono{
	public $pCodigo;

	function Contar_Registros() {
		$vConsulta="select count(*) as total from abonos";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Contar_Registros_Tregistro() {
		$vConsulta="select count(*) as total from tregistro";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Contar_Registros_Plame() {
		$vConsulta="select count(*) as total from plamesunat";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}		
	function Mostrar_Registros($miinicio,$mifinal){
		//$vConsulta="select * from abonos LIMIT ".$miinicio.",".$mifinal;
		$vConsulta="select * from abonos LIMIT 1";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function Mostrar_Registros_Tregistro($miinicio,$mifinal){
		$vConsulta="select * from tregistro LIMIT ".$miinicio.",".$mifinal;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function Mostrar_Registros_Plame($miinicio,$mifinal){
		$vConsulta="select * from plamesunat LIMIT ".$miinicio.",".$mifinal;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}		
	function Mostrar_Todos(){
		$vConsulta="select nombre from abonos";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function getROW($vCodigo) {
		$vConsulta="select * from abonos where codigo=".intval($vCodigo);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Agregar($miafp){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert abonos (codigo,nombre,codempresa) values('','$miafp','$miempresa')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);		
		return $rpta;		
	}
	function Modificar($codigo,$miafp){
		$oConexion= new Datos_clsConexion();
		$strSQL="update abonos set nombre='$miafp' where codigo=".intval($codigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Eliminar($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL="delete from abonos where codigo=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);		
	}				
}
?>