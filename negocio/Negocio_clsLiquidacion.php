<?php
class Negocio_clsLiquidacion{
	public $pCodigo;
	
	function Mostrar_Registros(){
		$oBanco=new Datos_clsLiquidacion();
		return $oBanco->Mostrar_Registros();
	}
	function getROW($vCodigo) {
		$oBanco=new Datos_clsLiquidacion();
		return $oBanco->getROW($vCodigo);
	}
	function AgregarLiquidacion($txtcodtra){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->AgregarLiquidacion($txtcodtra);
		return $rpta;
	}
	function AgregarLiquidaciodatosn($rscodliquidacion,$txtapellidos,$txtdni,$txtcargo,$txtfechaini,$txtfechafin,$txttiempo,$txtfalta,$txtmotivo){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->AgregarLiquidaciodatosn($rscodliquidacion,$txtapellidos,$txtdni,$txtcargo,$txtfechaini,$txtfechafin,$txttiempo,$txtfalta,$txtmotivo);
		return $rpta;
	}
	function AgregarLiquidacioncompua($rscodliquidacion,$txtsueldo,$txtasignacion,$txtcomision,$txtextras,$txtotro,$txtsexto,$totalcompu,$totalcompuotro){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->AgregarLiquidacioncompua($rscodliquidacion,$txtsueldo,$txtasignacion,$txtcomision,$txtextras,$txtotro,$txtsexto,$totalcompu,$totalcompuotro);
		return $rpta;
	}
	
	function AgregarLiquidacioncts($rscodliquidacion,$txtctsmes,$txtctsdia,$totalctsmes,$totalctsdia,$totalcts){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->AgregarLiquidacioncts($rscodliquidacion,$txtctsmes,$txtctsdia,$totalctsmes,$totalctsdia,$totalcts);
		return $rpta;
	}
	function AgregarLiquidacionvaca($rscodliquidacion,$tiempocompu,$txtvacadiapen,$txtvacamesefec,$txtvacadiaefec,$txttotalvacadiapen,$txttotalmesefec,$txttotcavadiaefec,$totalvaca){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->AgregarLiquidacionvaca($rscodliquidacion,$tiempocompu,$txtvacadiapen,$txtvacamesefec,$txtvacadiaefec,$txttotalvacadiapen,$txttotalmesefec,$txttotcavadiaefec,$totalvaca);
		return $rpta;
	}
	function AgregarLiquidaciongrati($rscodliquidacion,$txtgratimesefec,$txtgratibonopor,$tiempograti,$totalgratimesefec,$totalgratibono,$totalgrati){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->AgregarLiquidaciongrati($rscodliquidacion,$txtgratimesefec,$txtgratibonopor,$tiempograti,$totalgratimesefec,$totalgratibono,$totalgrati);
		return $rpta;
	}
	function AgregarLiquidacionotros($rscodliquidacion,$txtotro1,$txtotro2,$txtotro3,$txtotro4,$totalotros){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->AgregarLiquidacionotros($rscodliquidacion,$txtotro1,$txtotro2,$txtotro3,$txtotro4,$totalotros);
		return $rpta;
	}
	function AgregarLiquidacionessalud($rscodliquidacion,$txtgratibonopor100,$totalesalud){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->AgregarLiquidacionessalud($rscodliquidacion,$txtgratibonopor100,$totalesalud);
		return $rpta;
	}
	function AgregarLiquidacionafp($rscodliquidacion,$poraporte,$afp1,$porprima,$afp2,$aporteafpcomi,$afp3,$poronp,$totalonp,$totaldctoafp){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->AgregarLiquidacionafp($rscodliquidacion,$poraporte,$afp1,$porprima,$afp2,$aporteafpcomi,$afp3,$poronp,$totalonp,$totaldctoafp);
		return $rpta;
	}
	
	
	function Modificar($micodigo,$txtbanco){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->Modificar($micodigo,$txtbanco);
		return $rpta;
	}	
	function Eliminar($vCodigo){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->Eliminar($vCodigo);
		return $rpta;
	}
	
	function Buscar_Liquidatos($elcodliquidacion) {
		$oBanco=new Datos_clsLiquidacion();
		return $oBanco->Buscar_Liquidatos($elcodliquidacion);
	}
	function Buscar_Liquicompu($elcodliquidacion) {
		$oBanco=new Datos_clsLiquidacion();
		return $oBanco->Buscar_Liquicompu($elcodliquidacion);
	}
	function Buscar_Liquicts($elcodliquidacion) {
		$oBanco=new Datos_clsLiquidacion();
		return $oBanco->Buscar_Liquicts($elcodliquidacion);
	}
	function Buscar_Liquivaca($elcodliquidacion) {
		$oBanco=new Datos_clsLiquidacion();
		return $oBanco->Buscar_Liquivaca($elcodliquidacion);
	}
	function Buscar_Liquigrati($elcodliquidacion) {
		$oBanco=new Datos_clsLiquidacion();
		return $oBanco->Buscar_Liquigrati($elcodliquidacion);
	}
	function Buscar_Liquiotro($elcodliquidacion) {
		$oBanco=new Datos_clsLiquidacion();
		return $oBanco->Buscar_Liquiotro($elcodliquidacion);
	}
	function Buscar_Liquiessalud($elcodliquidacion) {
		$oBanco=new Datos_clsLiquidacion();
		return $oBanco->Buscar_Liquiessalud($elcodliquidacion);
	}
	function Buscar_Liquiafp($elcodliquidacion) {
		$oBanco=new Datos_clsLiquidacion();
		return $oBanco->Buscar_Liquiafp($elcodliquidacion);
	}

	
	// modificasar
	
	function ModificarLiquidaciodatosn($rscodliquidacion,$txtapellidos,$txtdni,$txtcargo,$txtfechaini,$txtfechafin,$txttiempo,$txtfalta,$txtmotivo){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->ModificarLiquidaciodatosn($rscodliquidacion,$txtapellidos,$txtdni,$txtcargo,$txtfechaini,$txtfechafin,$txttiempo,$txtfalta,$txtmotivo);
		return $rpta;
	}
	function ModificarLiquidacioncompua($rscodliquidacion,$txtsueldo,$txtasignacion,$txtcomision,$txtextras,$txtotro,$txtsexto,$totalcompu,$totalcompuotro){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->ModificarLiquidacioncompua($rscodliquidacion,$txtsueldo,$txtasignacion,$txtcomision,$txtextras,$txtotro,$txtsexto,$totalcompu,$totalcompuotro);
		return $rpta;
	}
	
	function ModificarLiquidacioncts($rscodliquidacion,$txtctsmes,$txtctsdia,$totalctsmes,$totalctsdia,$totalcts){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->ModificarLiquidacioncts($rscodliquidacion,$txtctsmes,$txtctsdia,$totalctsmes,$totalctsdia,$totalcts);
		return $rpta;
	}
	function ModificarLiquidacionvaca($rscodliquidacion,$tiempocompu,$txtvacadiapen,$txtvacamesefec,$txtvacadiaefec,$txttotalvacadiapen,$txttotalmesefec,$txttotcavadiaefec,$totalvaca){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->ModificarLiquidacionvaca($rscodliquidacion,$tiempocompu,$txtvacadiapen,$txtvacamesefec,$txtvacadiaefec,$txttotalvacadiapen,$txttotalmesefec,$txttotcavadiaefec,$totalvaca);
		return $rpta;
	}
	function ModificarLiquidaciongrati($rscodliquidacion,$txtgratimesefec,$txtgratibonopor,$tiempograti,$totalgratimesefec,$totalgratibono,$totalgrati){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->ModificarLiquidaciongrati($rscodliquidacion,$txtgratimesefec,$txtgratibonopor,$tiempograti,$totalgratimesefec,$totalgratibono,$totalgrati);
		return $rpta;
	}
	function ModificarLiquidacionotros($rscodliquidacion,$txtotro1,$txtotro2,$txtotro3,$txtotro4,$totalotros){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->ModificarLiquidacionotros($rscodliquidacion,$txtotro1,$txtotro2,$txtotro3,$txtotro4,$totalotros);
		return $rpta;
	}
	function ModificarLiquidacionessalud($rscodliquidacion,$txtgratibonopor100,$totalesalud){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->ModificarLiquidacionessalud($rscodliquidacion,$txtgratibonopor100,$totalesalud);
		return $rpta;
	}
	function ModificarLiquidacionafp($rscodliquidacion,$poraporte,$afp1,$porprima,$afp2,$aporteafpcomi,$afp3,$poronp,$totalonp,$totaldctoafp){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->ModificarLiquidacionafp($rscodliquidacion,$poraporte,$afp1,$porprima,$afp2,$aporteafpcomi,$afp3,$poronp,$totalonp,$totaldctoafp);
		return $rpta;
	}

	function Modificarliquidacion($rscodliquidacion,$totalcts,$totalvaca,$totalgrati,$totalotros,$totalesalud,$totaldctoafp,$totalneto){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->Modificarliquidacion($rscodliquidacion,$totalcts,$totalvaca,$totalgrati,$totalotros,$totalesalud,$totaldctoafp,$totalneto);
		return $rpta;
	}
	
	function Eliminarliquidacion($micodigo){
		$oBanco=new Datos_clsLiquidacion();
		$rpta=$oBanco->Eliminarliquidacion($micodigo);
		return $rpta;
	}
	
}
?>