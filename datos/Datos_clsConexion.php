<?php
class Datos_clsConexion{
	private $miConexion;
	private $pServer="";
	private $pDatabase="";
	private $pUser="";
	private $pPassword="";
	private $pPort="";
	
    function __construct(){ 
//		$this->pServer="localhost";
//		$this->pDatabase="casar_narza";
//		$this->pUser="jazbsist_jazbsoft";
//		$this->pPassword="j1010";
//		$this->pPort="3306";	

		$this->pServer="localhost";
		$this->pDatabase="planillamvc";
		$this->pUser="root";
		$this->pPassword="";
		$this->pPort="3306";	

//		$this->pServer="localhost";
//		$this->pDatabase="jazbsist_personal";
//		$this->pUser="jazbsist_persona";
//		$this->pPassword="j101010";
//		$this->pPort="3306";	

		$this->miConexion=new mysqli($this->pServer, $this->pUser, $this->pPassword, $this->pDatabase, $this->pPort);
    }
	function Escapar_Caracteres($vCadena){
		return mysqli_real_escape_string($this->miConexion, $vCadena);
	}
	function Ejecutar_Consulta($strQuery){
		$rs=$this->miConexion->query($strQuery);
		if ($rs)
			return $rs;
		else
			return false;
	}
	function Ultimo_Codigo_Generado(){
		$rs=$this->miConexion->query("select last_insert_id() as codigo"); 
		if ($rs){
			$row=$rs->fetch_array();
			return intval($row['codigo']);
		}else
			return 0;
	}
	function Ejecutar_SQL($strQuery){
		$rptaS=$this->miConexion->query($strQuery);
		return $rptaS;
	}
	function __destruct(){
		$this->miConexion->close();
	}
}
?>