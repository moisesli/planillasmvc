<?php
require_once '../libreria/cuerpo/cabeza1.php';		
	include("../config.php");

	require_once(LOGICA."/negocio.php");
	require_once(HERRAMIENTAS_PHP."/clsGeneral.php");
	$oGeneral=new clsGeneral();			
	$elcodigo=$_GET['micodigo'];	
	$elcodliquidacion=$_GET['elcodliquidacion'];	
	// BUSCAR EL TRABAJADOR
	$olistado=new Negocio_clsTrabajador();
	$rsTrabajador=$olistado->getROW($elcodigo);	

		$oEntidad=new Negocio_clsConfiguracion();
		$rsEntidad=$oEntidad->Buscar_Entidad($miempresa,$miperiodo);
		$asignapor=$rsEntidad['asignacion']/100;
		$sueldobasico=$rsEntidad['sueldo'];
		$cts=$rsEntidad['cts']/100;
		$miasignacion=$sueldobasico*$asignapor;

		$rsempleador=$oEntidad->Buscar_aporteempleador($miempresa,$miperiodo);
		
		$oLiquidacion=new Negocio_clsLiquidacion();

		$rsliquidacion=$oLiquidacion->getROW($elcodliquidacion);
		$rsliquidatos=$oLiquidacion->Buscar_Liquidatos($elcodliquidacion);
		$rsliquicompu=$oLiquidacion->Buscar_Liquicompu($elcodliquidacion);
		$rsliquicts=$oLiquidacion->Buscar_Liquicts($elcodliquidacion);
		$rsliquivaca=$oLiquidacion->Buscar_Liquivaca($elcodliquidacion);
		$rsliquigrati=$oLiquidacion->Buscar_Liquigrati($elcodliquidacion);
		$rsliquiotro=$oLiquidacion->Buscar_Liquiotro($elcodliquidacion);
		$rsliquiessalud=$oLiquidacion->Buscar_Liquiessalud($elcodliquidacion);
		$rsliquiafp=$oLiquidacion->Buscar_Liquiafp($elcodliquidacion);

		$totalingresos=$rsliquicts['total']+$rsliquivaca['total']+$rsliquigrati['total']+$rsliquiotro['total'];

		function FormatDate($fecha){
			list($anio,$mes,$dia)=explode("-",$fecha); 
			return $dia."-".$mes."-".$anio; 
		}			


?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<script>
 function printpage()
   {
   window.print()
   }
 </script>
<!-- BARRA -->		
<?php
	include("../config.php");
	
?>
<script language = "javascript">
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
function grabar1(miopcion)
{ //esta es la funcion que envia los datos de manea asincrona
	divResultado = document.getElementById('milista1');
	laopcion=miopcion;	
	codtra=document.formulario1.txtcodtra.value;	
	clave1=document.formulario1.txtdetalle.value;
	clave2=document.formulario1.txtdes.value;
	clave3=document.formulario1.txtobserva.value;
	
	ajax=objetoAjax();
	ajax.open("POST", "escalafongrabar.php",true);
	divResultado.innerHTML= 'Mostrando...';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("codtra="+codtra+"&laopcion="+laopcion+"&clave1="+clave1+"&clave2="+clave2+"&clave3="+clave3);

}
function grabar2(miopcion)
{ //esta es la funcion que envia los datos de manea asincrona
	divResultado = document.getElementById('milista2');
	laopcion=miopcion;	
	codtra=document.formulario2.txtcodtra2.value;	
	clave1=document.formulario2.txtdetalle2.value;
	clave2=document.formulario2.txtdes2.value;
	clave3=document.formulario2.txtobserva2.value;
	
	ajax=objetoAjax();
	ajax.open("POST", "escalafongrabar2.php",true);
	divResultado.innerHTML= 'Mostrando...';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("codtra="+codtra+"&laopcion="+laopcion+"&clave1="+clave1+"&clave2="+clave2+"&clave3="+clave3);

}
function vertiempo()
{ //esta es la funcion que envia los datos de manea asincrona
	divResultado = document.getElementById('vertiempo');

	clave1=document.formulario1.txtfechaini.value;	
	clave2=document.formulario1.txtfechafin.value;
	
	ajax=objetoAjax();
	ajax.open("POST", "fechas.php",true);
	divResultado.innerHTML= 'Mostrando...';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("clave1="+clave1+"&clave2="+clave2);

}
</script> 
<table width="100%" border="0">
    <tr>
      <td align="center" style="font-size: 22px; font-weight: bold" colspan="2">Liquidacion de Beneficios Sociales</td>
    </tr>
    <tr>
      <td align="left" style="font-size: 16px; font-weight: bold"><?php echo TITULO; ?></td>
      <td align="center" style="font-size: 22px; font-weight: bold"></td>
    </tr>   
</table>

<table width="100%" border="0">
    <tr>
      <td align="center" style="font-size: 16px; font-weight: bold; background-color: #EBEBEB" colspan="3">DATOS PERSONALES</td>
    </tr>   
    <tr>
      <td width="20%"  align="left" style="font-size: 14px; font-weight: bold">APELLIDOS Y NOMBRES</td>
      <td width="35%"  align="left" style="font-size: 14px; font-weight: bold"><?php echo $rsTrabajador['apellidos'].' '.$rsTrabajador['apellidos2'].' '.$rsTrabajador['nombres'];?></td>
      <td width="45%" rowspan="8" align="center" style="font-size: 22px; font-weight: bold">
      	<table width="100%" border="0">
			<tr>
			  <td align="center" style="font-size: 16px; font-weight: bold; background-color: #EBEBEB" colspan="2">REMUNERACION COMPUTABLE</td>
			</tr>   
      		<tr>
      			<td width="20%"  align="left" style="font-size: 14px;">SUELDO</td>		
      			<td width="20%"  align="right" style="font-size: 14px;"><?php echo number_format($rsliquicompu['sueldo'],2);?></td>		
      		</tr>   
      		<tr>
      			<td width="20%"  align="left" style="font-size: 14px;">ASIG. FAMILIAR</td>		
      			<td width="20%"  align="right" style="font-size: 14px;"><?php echo number_format($rsliquicompu['asignacion'],2);?></td>		
      		</tr>   
      		<tr>
      			<td width="20%"  align="left" style="font-size: 14px;">PROM. COMISIONES</td>		
      			<td width="20%"  align="right" style="font-size: 14px;"><?php echo number_format($rsliquicompu['comision'],2);?></td>		
      		</tr>   
      		<tr>
      			<td width="20%"  align="left" style="font-size: 14px;">HORAS EXTRAS</td>		
      			<td width="20%"  align="right" style="font-size: 14px;"><?php echo number_format($rsliquicompu['extras'],2);?></td>		
      		</tr>   
      		<tr>
      			<td width="20%"  align="left" style="font-size: 14px;">OTROS</td>		
      			<td width="20%"  align="right" style="font-size: 14px;"><?php echo number_format($rsliquicompu['otro'],2);?></td>		
      		</tr>   
      		<tr>
      			<td width="20%"  align="left" style="font-size: 14px;">SEXTO DE GRATIF.</td>		
      			<td width="20%"  align="right" style="font-size: 14px;"><?php echo number_format($rsliquicompu['sexto'],2);?></td>		
      		</tr>   
      		<tr>
      			<td width="20%"  align="center" style="font-size: 14px; font-weight: bold">TOTAL</td>		
      			<td width="20%"  align="right" style="font-size: 14px; font-weight: bold"><?php echo number_format($rsliquicompu['total'],2);?></td>		
      		</tr>   
      		
		</table>      	
      </td>
    </tr>   
    <tr>
      <td width="20%"  align="left" style="font-size: 14px;">DNI</td>
      <td width="35%"  align="left" style="font-size: 14px;"><?php echo $rsTrabajador['numdocu'];?></td>
    </tr>   
    <tr>
      <td width="20%"  align="left" style="font-size: 14px;">CARGO</td>
      <td width="35%"  align="left" style="font-size: 14px;"><?php echo $rsTrabajador['cargo'];?></td>
    </tr>   
    <tr>
      <td width="20%"  align="left" style="font-size: 14px;">FECHA DE INGRESO</td>
      <td width="35%"  align="left" style="font-size: 14px;"><?php echo FormatDate($rsliquidatos['fechaini']);?></td>
    </tr>   
    <tr>
      <td width="20%"  align="left" style="font-size: 14px;">FECHA DE CESE</td>
      <td width="35%"  align="left" style="font-size: 14px;"><?php echo FormatDate($rsliquidatos['fechafin']);?></td>
    </tr>   
    <tr>
      <td width="20%"  align="left" style="font-size: 14px;">TIEMPO DE SERVICIO</td>
      <td width="35%"  align="left" style="font-size: 14px;"><?php echo $rsliquidatos['tiempo'];?></td>
    </tr>   
    <tr>
      <td width="20%"  align="left" style="font-size: 14px;">FALTAS</td>
      <td width="35%"  align="left" style="font-size: 14px;"><?php echo $rsliquidatos['faltas'];?></td>
    </tr>   
    <tr>
      <td width="20%"  align="left" style="font-size: 14px;">MOTIVO DE CESE</td>
      <td width="35%"  align="left" style="font-size: 14px;"><?php echo $rsliquidatos['motivo'];?></td>
    </tr>   
    
</table>

<table width="100%" border="0">
    <tr>
      <td align="center" style="font-size: 16px; font-weight: bold; background-color: #EBEBEB" colspan="6">INGRESOS</td>
    </tr>   
    <tr>
      <td width="35%" align="left" style="font-size: 14px; font-weight: bold">Compensación por Tiempo de Servicio (CTS)</td>
      <td width="15%" style="font-size: 14px">Meses</td>
      <td width="15%" style="font-size: 14px"><?php echo $rsliquicts['meses'];?></td>
      <td width="10%" style="font-size: 14px">Dias</td>
      <td width="10%" style="font-size: 14px"><?php echo $rsliquicts['dias'];?></td>
      <td></td>
    </tr>   
    <tr>
      <td align="left" style="font-size: 14px;">Meses Efectivos</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquicts['montomes'],2);?></td>
    </tr>   
    <tr>
      <td align="left" style="font-size: 14px;">Dias Efectivos</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquicts['montodia'],2);?></td>
    </tr>   
    <tr style="background-color: #EBEBEB">
      <td align="left" style="font-size: 14px; font-weight: bold">TOTAL</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px; font-weight: bold"><?php echo number_format($rsliquicts['total'],2);?></td>
    </tr>   
    <tr>
      <td width="35%" align="left" style="font-size: 14px; font-weight: bold">Vacaciones Truncas</td>
      <td width="15%" style="font-size: 14px">Meses</td>
      <td width="15%" style="font-size: 14px"><?php echo $rsliquivaca['mesesefectivo'];?></td>
      <td width="10%" style="font-size: 14px">Dias</td>
      <td width="10%" style="font-size: 14px"><?php echo $rsliquivaca['diasefectivos'];?></td>
      <td></td>
    </tr>   
    <tr>
      <td align="left" style="font-size: 14px;">Tiempo Pagado</td>
      <td></td>
      <td align="right" style="font-size: 14px;"></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"></td>
    </tr>   
    <tr>
      <td align="left" style="font-size: 14px;">Dias Pendientes</td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo $rsliquivaca['diaspendiente'];?></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquivaca['montodiapen'],2);?></td>
    </tr>   
    <tr>
      <td align="left" style="font-size: 14px;">Meses Efectivos</td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo $rsliquivaca['mesesefectivo'];?></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquivaca['montomespen'],2);?></td>
    </tr>   
    <tr>
      <td align="left" style="font-size: 14px;">Dias Efectivos</td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo $rsliquivaca['diasefectivos'];?></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquivaca['montodiaefec'],2);?></td>
    </tr>   
    <tr style="background-color: #EBEBEB">
      <td align="left" style="font-size: 14px; font-weight: bold">TOTAL</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px; font-weight: bold"><?php echo number_format($rsliquivaca['total'],2);?></td>
    </tr>   

    <tr>
      <td width="35%" align="left" style="font-size: 14px; font-weight: bold">Gratificaciones Truncas</td>
      <td width="15%" style="font-size: 14px">Meses</td>
      <td width="15%" style="font-size: 14px"><?php echo $rsliquigrati['mesefectivo'];?></td>
      <td width="10%" style="font-size: 14px"></td>
      <td width="10%" style="font-size: 14px"></td>
      <td></td>
    </tr>   
    <tr>
      <td align="left" style="font-size: 14px;">Meses Efectivos</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquigrati['montomes'],2);?></td>
    </tr>   
    <tr>
      <td align="left" style="font-size: 14px;">Bono Ley 30334</td>
      <td></td>
      <td align="left" style="font-size: 14px;"><?php echo $rsliquigrati['bonoley'].'%';?></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquigrati['montobono'],2);?></td>
    </tr>   
    <tr style="background-color: #EBEBEB">
      <td align="left" style="font-size: 14px; font-weight: bold">TOTAL</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px; font-weight: bold"><?php echo number_format($rsliquigrati['total'],2);?></td>
    </tr>   
    
    <tr>
      <td width="35%" align="left" style="font-size: 14px; font-weight: bold">Otros Ingresos</td>
      <td width="15%" style="font-size: 14px"></td>
      <td width="15%" style="font-size: 14px"></td>
      <td width="10%" style="font-size: 14px"></td>
      <td width="10%" style="font-size: 14px"></td>
      <td></td>
    </tr>   
    <tr>
      <td align="left" style="font-size: 14px;">Indemnizacion Vacacional</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquiotro['vaca'],2);?></td>
    </tr>   
    <tr>
      <td align="left" style="font-size: 14px;">Devolucion %ta.</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquiotro['quinta'],2);?></td>
    </tr>         
    <tr>
      <td align="left" style="font-size: 14px;">Remuneracion Mensual</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquiotro['remun'],2);?></td>
    </tr>   
    <tr>
      <td align="left" style="font-size: 14px;">Movilidad Supeditada a Asist.</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquiotro['movil'],2);?></td>
    </tr>   
    <tr style="background-color: #EBEBEB">
      <td align="left" style="font-size: 14px; font-weight: bold">TOTAL</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px; font-weight: bold"><?php echo number_format($rsliquiotro['total'],2);?></td>
    </tr>   
    
    <tr style="background-color: #EBEBEB">
      <td align="left" style="font-size: 18px; font-weight: bold">TOTAL INGRESOS</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 18px; font-weight: bold"><?php echo number_format($rsliquicts['total']+$rsliquivaca['total']+$rsliquigrati['total']+$rsliquiotro['total'],2);?></td>
    </tr>   

    <tr>
      <td align="center" style="font-size: 16px; font-weight: bold; background-color: #EBEBEB" colspan="6">DESCUENTOS</td>
    </tr>   
        
    <tr>
      <td align="left" style="font-size: 14px;">Aporte Obligatorio</td>
      <td></td>
      <td align="left" style="font-size: 14px;"><?php echo $rsliquiafp['afp1']*100;?></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquiafp['montoafp1'],2);?></td>
    </tr>   
    <tr>
      <td align="left" style="font-size: 14px;">Seguros</td>
      <td></td>
      <td align="left" style="font-size: 14px;"><?php echo $rsliquiafp['afp2']*100;?></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquiafp['montoafp2'],2);?></td>
    </tr>   
    <tr>
      <td align="left" style="font-size: 14px;">Comision Porc. / Flujo</td>
      <td></td>
      <td align="left" style="font-size: 14px;"><?php echo $rsliquiafp['afp3']*100;?></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquiafp['montoafp3'],2);?></td>
    </tr>   
    <tr>
      <td align="left" style="font-size: 14px;">Onp</td>
      <td></td>
      <td align="left" style="font-size: 14px;"><?php echo $rsliquiafp['onp']*100;?></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquiafp['montoonp'],2);?></td>
    </tr>   
    <tr style="background-color: #EBEBEB">
      <td align="left" style="font-size: 18px; font-weight: bold">TOTAL DESCUENTOS</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 18px; font-weight: bold"><?php echo number_format($rsliquiafp['total'],2);?></td>
    </tr>   
    <tr style="background-color: #EBEBEB">
      <td align="left" style="font-size: 22px; font-weight: bold">NETO A PAGAR</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 22px; font-weight: bold"><?php echo number_format(($rsliquicts['total']+$rsliquivaca['total']+$rsliquigrati['total']+$rsliquiotro['total'])-$rsliquiafp['total'],2);?></td>
    </tr>   
    
    <tr>
      <td align="center" style="font-size: 16px; font-weight: bold; background-color: #EBEBEB" colspan="6">APORTES</td>
    </tr>   
    
    <tr>
      <td align="left" style="font-size: 14px;">Essalud</td>
      <td></td>
      <td align="left" style="font-size: 14px;"><?php echo $rsliquiessalud['essalud']*100;?>%</td>
      <td></td>
      <td></td>
      <td align="right" style="font-size: 14px;"><?php echo number_format($rsliquiessalud['montoessalud'],2);?></td>
    </tr>   
    <br><br><br>	    
    <tr height="120">
      <td align="left" style="font-size: 18px;" colspan="6">FIRMO LA PRESENTE COMO CONSTANCIA DE HABER RECIBIDO LA INTEGRIDAD DE MI LIQUIDACION DE BENEFICIOS SOCIALES DE CONFORMIDAD AL D.LEG. Nº 650 . HE RECIBIDO</td>
    </tr>   
    <tr height="120">
      <td align="left" style="font-size: 14px;" colspan="3">NOMBRE :</td>
      <td align="left" style="font-size: 14px;" colspan="3">DNI :</td>
    </tr>   
    <tr height="120" valign="bottom">
      <td align="left" style="font-size: 14px;" colspan="3"></td>
      <td align="center" style="font-size: 14px;" colspan="3">FIRMA</td>
    </tr>   
                        
</table>
<script>
	printpage();	
</script>