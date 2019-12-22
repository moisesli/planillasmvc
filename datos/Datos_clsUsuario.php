<?php
class Datos_clsUsuario{
	public $pCodigo;
	public $pApellidos;
	public $pUsuario;
	public $pClave;
	public $pTipo;

	function Verificar_Usuario($usuario, $clave){
		$oConexion= new Datos_clsConexion();
		$vConsulta="select * from usuario where usuario='$usuario' and clave='$clave' limit 1";
		//echo $vConsulta;
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			{
			return $rs;
			}
		else
			{
			$rs=0;	
			return $rs;
			}
	}
	function Contar_Registros($miarchi,$miempresa) {
		$vConsulta="select count(*) as total from usuario where codempresa='$miempresa'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Contar_Registros_Menu() {
		$vConsulta="select count(*) as total from submenu";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}				
	function Mostrar_Registros($miinicio,$mifinal,$miarchi,$miempresa){
		$vConsulta="select a.*,b.nombre as mitipo from usuario a INNER JOIN tipousuario b ON a.tipo=b.codtipo where a.codempresa='$miempresa' and a.apellidos LIKE '%$miarchi%' order by a.apellidos LIMIT ".$miinicio.",".$mifinal;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function Mostrar_Registros_Menu($miinicio,$mifinal,$opcion){
		if ($opcion==1)
		{
			$vConsulta="select a.*,b.nombre as mimenu from submenu a INNER JOIN menu b ON a.codmenu=b.codigo where a.superadmin=1 order by a.codmenu, a.codigo LIMIT ".$miinicio.",".$mifinal;
		}
		else	
		{
			if ($opcion==2)
			{
				$vConsulta="select a.*,b.nombre as mimenu from submenu a INNER JOIN menu b ON a.codmenu=b.codigo where a.admin=1 order by a.codmenu, a.codigo LIMIT ".$miinicio.",".$mifinal;
			}
			else
			{
				if ($opcion==3)
				{
					$vConsulta="select a.*,b.nombre as mimenu from submenu a INNER JOIN menu b ON a.codmenu=b.codigo where a.caja=1 order by a.codmenu, a.codigo LIMIT ".$miinicio.",".$mifinal;
				}
				else
				{
					if ($opcion==4)
					{
						$vConsulta="select a.*,b.nombre as mimenu from submenu a INNER JOIN menu b ON a.codmenu=b.codigo where a.compra=1 order by a.codmenu, a.codigo LIMIT ".$miinicio.",".$mifinal;
					}
					else
					{
						if ($opcion==5)
						{
							$vConsulta="select a.*,b.nombre as mimenu from submenu a INNER JOIN menu b ON a.codmenu=b.codigo where a.venta=1 order by a.codmenu, a.codigo LIMIT ".$miinicio.",".$mifinal;
						}
						else
						{
							$vConsulta="select a.*,b.nombre as mimenu from submenu a INNER JOIN menu b ON a.codmenu=b.codigo where a.almacen=1 order by a.codmenu, a.codigo LIMIT ".$miinicio.",".$mifinal;
						}	
					}
				}	
			}
		}
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Registros_Tipo(){
		$vConsulta="select * from tipousuario";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Registros_Usuario($micodarea){
		$vConsulta="select usuario from usuario where codarea='$micodarea'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Registros_Usuario1($miterminal){
		$vConsulta="select codigo,apellidos from usuario where codterminal='$miterminal'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Registros_Usuario1111($miterminal,$miusuario){
		$vConsulta="select codigo,apellidos from usuario where codterminal='$miterminal' and codigo='$miusuario'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}		
	function getROW($vCodigo) {
		$vConsulta="select * from usuario where codigo=".intval($vCodigo);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function getROWEnlace($vCodigo) {
		$vConsulta="select * from enlaceodb where codigo=".intval($vCodigo);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function getROW_Submenu($vCodigo) {
		$vConsulta="select * from submenu where codigo=".intval($vCodigo);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Ver_Imprimir($vCodigo) {
		$vConsulta="select imprimir from usuario where codigo=".intval($vCodigo);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}		
	
	function Agregar($miperiodo,$miempresa){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert usuario (codigo,apellidos,usuario,clave,codempresa,codperiodo,tipo) values('','".$this->pApellidos."','".$this->pUsuario."','".$this->pClave."','$miempresa','$miperiodo','".$this->pTipo."')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Agregar1(){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert usuario (codigo,apellidos,usuario,clave,tipo) values('','".$this->pApellidos."','".$this->pUsuario."','".$this->pClave."','".$this->pTipo."')";
		echo $strSQL;
//		$rpta=$oConexion->Ejecutar_SQL($strSQL);
//		return $rpta;
	}	
	function Agregarusuariomenu($codusuario,$codmenu,$codsubmenu){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert usuariomenu (codigo,codusu,codmenu,codsubmenu) values('','".$codusuario."','".$codmenu."','".$codsubmenu."')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}	
	function Modificar($codigo){
		$oConexion= new Datos_clsConexion();
		$strSQL="update usuario set apellidos='".$this->pApellidos."', ";
		$strSQL.=" usuario='".$this->pUsuario."', clave='".$this->pClave."', tipo='".intval($this->pTipo)."' where codigo=".intval($codigo);
		//echo $strSQL;
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Modificarusuario($codigo){
		$oConexion= new Datos_clsConexion();
		$strSQL="update usuario set clave='".$this->pClave."' where codigo=".intval($codigo);
		//echo $strSQL;
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Corregir_Datos_Enlace($micodigo,$mienlace){
		$oConexion= new Datos_clsConexion();
		$strSQL="update enlaceodb set nombre='".$mienlace."' where codigo=".intval($micodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}	
	function Modificar_Imprimir($codigo,$tipo){
		$oConexion= new Datos_clsConexion();
		$strSQL="update usuario set imprimir='$tipo' where codigo=".intval($codigo);
		//echo $strSQL;
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}	
	function Eliminar($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL="delete from usuario where codigo=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
	}	
	function Eliminarusuariomenu($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL1="delete from usuariomenu where codusu=".intval($vCodigo);
		$rpta1=$oConexion->Ejecutar_SQL($strSQL1);		
		return $rpta;
	}			
	function Cambiarclave($vCodigo,$cClave){
		$oConexion= new Datos_clsConexion();
		$strSQL="update usuario set clave='".$cClave."'";
		$strSQL.=" where codigo=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}	
	function Existe($vDetalle){
		$oConexion= new Datos_clsConexion();
		$vConsulta="select dni from usuario where dni='".$vDetalle."' limit 1";
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return ($rs->num_rows>0);
	}	
	function Verificar_Usuariot($usuario, $clave){
		$oConexion= new Datos_clsConexion();
		$vConsulta="select * from trabajador where usuario='".$usuario."' and clave='".$clave."' limit 1";
		echo $vConsulta;
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			{
			return $rs;
			}
		else
			{
			$rs=0;	
			return $rs;
			}
	}
	
}
?>