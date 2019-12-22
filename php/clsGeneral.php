<?php
class clsGeneral{
	function Mostrar_Combo($rs,$campo_id,$campo_nombre,$valor_a_ubicar){
		while($row=$rs->fetch_row()){
			$texto.="<option value='".$row[$campo_id]."'  ";
			$texto.=$row[$campo_id]==$valor_a_ubicar?" SELECTED ":"";
			$texto.=">".htmlentities($row[$campo_nombre])."</option>";
		}
		return $texto;
	}
	function Mostrar_Combo_Todo($rs,$campo_id,$campo_nombre,$valor_a_ubicar){
		$texto.="<option value='TODOS'>TODOS</option>";	
		while($row=$rs->fetch_row()){
			$texto.="<option value='".$row[$campo_id]."'  ";
			$texto.=$row[$campo_id]==$valor_a_ubicar?" SELECTED ":"";
			$texto.=">".htmlentities($row[$campo_nombre])."</option>";
		}
		return $texto;
	}	
	function Mostrar_Combo_Seleccione($rs,$campo_id,$campo_nombre,$valor_a_ubicar){
		$texto.="<option value='SELECCIONA'>--Seleccione--</option>";	
		while($row=$rs->fetch_row()){
			$texto.="<option value='".$row[$campo_id]."'  ";
			$texto.=$row[$campo_id]==$valor_a_ubicar?" SELECTED ":"";
			$texto.=">".htmlentities($row[$campo_nombre])."</option>";
		}
		return $texto;
	}		
	function Mostrar_Combo_Seleccione1($rs,$campo_id,$campo_nombre,$valor_a_ubicar){
		$texto.="<option value=''>--Seleccione--</option>";	
		while($row=$rs->fetch_row()){
			$texto.="<option value='".$row[$campo_id]."'  ";
			$texto.=$row[$campo_id]==$valor_a_ubicar?" SELECTED ":"";
			$texto.=">".htmlentities($row[$campo_nombre])."</option>";
		}
		return $texto;
	}		
	function Mostrar_Combo_Seleccione2($rs,$campo_id,$campo_nombre,$valor_a_ubicar){
		$texto="<option value=''></option>";
		while($row=$rs->fetch_row()){
			$texto.="<option value='".$row[$campo_id]."'  ";
			$texto.=$row[$campo_id]==$valor_a_ubicar?" SELECTED ":"";
			$texto.=">".htmlentities($row[$campo_nombre])."</option>";
		}
		return $texto;
	}		
	
	function Mostrar_Combo1($rs,$campo_id,$campo_nombre,$campo_nombre1,$valor_a_ubicar){
		while($row=$rs->fetch_row()){
			$texto.="<option value='".$row[$campo_id]."'  ";
			$texto.=$row[$campo_id]==$valor_a_ubicar?" SELECTED ":"";
			$texto.=">".htmlentities($row[$campo_nombre]).'-'.htmlentities($row[$campo_nombre1])."</option>";
		}
		return $texto;
	}	
	function CDate_Mysql($separador_actual,$fecha){
		if (trim($fecha)=="") {return "";}
		else{
			ereg( "([0-9]{1,2})$separador_actual([0-9]{1,2})$separador_actual([0-9]{2,4})", $fecha, $mifecha);
			$lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
			return $lafecha;
		}
	}
	function CDate_Normal($separador_actual,$fecha){
		if (trim($fecha)=="") {return "";}
		else{
			ereg( "([0-9]{2,4})$separador_actual([0-9]{1,2})$separador_actual([0-9]{1,2})", $fecha, $mifecha);
			$lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
			return $lafecha;
		}
	}
	function Comparar_Fechas($vFecha1,$vFecha2){
		if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$vFecha1))
			  list($vDia1,$vMes1,$vAno1)=split("/",$vFecha1);
		if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$vFecha1))
			  list($vDia1,$vMes1,$vAno1)=split("-",$vFecha1);
		if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$vFecha2))
			  list($vDia2,$vMes2,$vAno2)=split("/",$vFecha2);
		if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$vFecha2))
			  list($vDia2,$vMes2,$vAno2)=split("-",$vFecha2);
			 
		$vDiferencia = mktime(0,0,0,$vMes1,$vDia1,$vAno1) - mktime(0,0,0, $vMes2,$vDia2,$vAno2);
		//echo $vDiferencia;
		return ($vDiferencia);                         
	}
	function compararFechas($primera, $segunda)   
	 {   
	  $valoresPrimera = explode ("-", $primera);      
	  $valoresSegunda = explode ("-", $segunda);    
	  $diaPrimera    = $valoresPrimera[0];     
	  $mesPrimera  = $valoresPrimera[1];     
	  $anyoPrimera   = $valoresPrimera[2];    
	  $diaSegunda   = $valoresSegunda[0];     
	  $mesSegunda = $valoresSegunda[1];     
	  $anyoSegunda  = $valoresSegunda[2];   
	  $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);     
	  $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);        
	  if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){   
		// "La fecha ".$primera." no es v�lida";   
		return 0;   
	  }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){   
		// "La fecha ".$segunda." no es v�lida";   
		return 0;   
	  }else{   
		return  $diasPrimeraJuliano - $diasSegundaJuliano;   
	  }    
	}  	
function meses($fech_ini,$fech_fin) {
   /*
   FELIPE DE JESUS SANTOS SALAZAR, LIFER35@HOTMAIL.COM
   SEP-2010

   ESTA FUNCION NOS REGRESA LA CANTIDAD DE MESES ENTRE 2 FECHAS

   EL FORMATO DE LAS VARIABLES DE ENTRADA $fech_ini Y $fech_fin ES DD-MM-YYYY

   $fech_ini TIENE QUE SER MENOR QUE $fech_fin

   ESTA FUNCION TAMBIEN SE PUEDE HACER CON LA FUNCION date

   SI ENCUENTRAS ALGUN ERROR FAVOR DE HACERMELO SABER

   ESPERO TE SEA DE UTILIDAD, POR FAVOR NO QUIERES ESTE COMENTARIO, GRACIAS

   */



   //SEPARO LOS VALORES DEL ANIO, MES Y DIA PARA LA FECHA INICIAL EN DIFERENTES
   //VARIABLES PARASU MEJOR MANEJO

   $fIni_yr=substr($fech_ini,6,4);
    $fIni_mon=substr($fech_ini,3,2);
    $fIni_day=substr($fech_ini,0,2);

   //SEPARO LOS VALORES DEL ANIO, MES Y DIA PARA LA FECHA FINAL EN DIFERENTES
   //VARIABLES PARASU MEJOR MANEJO
   $fFin_yr=substr($fech_fin,6,4);
    $fFin_mon=substr($fech_fin,3,2);
    $fFin_day=substr($fech_fin,0,2);

   $yr_dif=$fFin_yr - $fIni_yr;
  // echo "la diferencia de a�os es -> ".$yr_dif."<br>";
   //LA FUNCION strtotime NOS PERMITE COMPARAR CORRECTAMENTE LAS FECHAS
   //TAMBIEN ES UTIL CON LA FUNCION date
   if(strtotime($fech_ini) > strtotime($fech_fin)){
      echo 'ERROR -> la fecha inicial es mayor a la fecha final <br>';
      exit();
   }
   else{
       if($yr_dif == 1){
         $fIni_mon = 12 - $fIni_mon;
         $meses = $fFin_mon + $fIni_mon;
         return $meses;
         //LA FUNCION utf8_encode NOS SIRVE PARA PODER MOSTRAR ACENTOS Y
         //CARACTERES RAROS
    ///     echo utf8_encode("la diferencia de meses con un a�o de diferencia es -> ".$meses."<br>");
      }
      else{
          if($yr_dif == 0){
             $meses=$fFin_mon - $fIni_mon;
            return $meses;
       //     echo utf8_encode("la diferencia de meses con cero a�os de diferencia es -> ".$meses.", donde el mes inicial es ".$fIni_mon.", el mes final es ".$fFin_mon."<br>");
         }
         else{
             if($yr_dif > 1){
               $fIni_mon = 12 - $fIni_mon;
               $meses = $fFin_mon + $fIni_mon + (($yr_dif - 1) * 12);
               return $meses;
//               echo utf8_encode("la diferencia de meses con mas de un a�o de diferencia es -> ".$meses."<br>");
            }
            else
               echo "ERROR -> la fecha inicial es mayor a la fecha final <br>";
               exit();
         }
      }
   }

}
	
}
?>