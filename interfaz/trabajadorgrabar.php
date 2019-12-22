<?php session_start();
	$miempresa=$_SESSION['codempresa'];
	$miperiodo=$_SESSION['periodo'];
	if(!($_SESSION["accesar"] == "OK")){
		session_destroy();
		echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=../index.php'>";	
	}

	include("../config.php");
	require_once(LOGICA."/negocio.php");	
	
	function CDate($vfecha){
		list($dia,$mes,$anio)=explode("-",$vfecha); 
		return $anio."-".$mes."-".$dia;
	}	
	
	$miopcion=intval($_GET['opcion']);
	$micodigo=intval($_POST['txtelcodigotra']);
	$elcodigo=intval($_GET['micodigo']);
	switch($miopcion){
	case 1:			
		$oUsuario=new Negocio_clsTrabajador();		
		$txtapellidos=$_POST['txtapellidos'];
		$txtapellidos2=$_POST['txtapellidos2'];
		$txtnombres=$_POST['txtnombres'];
		$txtcoddocu=$_POST['txtcoddocu'];
		$txtnundoc=$_POST['txtnundoc'];
		$txtdireccion=$_POST['txtdireccion'];
		$txtsexo=$_POST['txtsexo'];
		$txtfecnaci=$_POST['txtfecnaci'];		
		$txtnacionalidad=$_POST['txtnacionalidad'];
		$txtemail=$_POST['txtemail'];
		$txteducacion=$_POST['txteducacion'];
		$txtflujo=$_POST['txtflujo'];	
		$txtvaca=$_POST['txtvaca'];		
			
			
		// SUBIR FOTO AL SERVIDOR
		$target_path = "../fotos/";
		$target_path = $target_path .basename( $_FILES['archivo']['name']);
		if(move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path))
			{ 
				$mifoto=trim($_FILES['archivo']['name']);
			} 
			else
			{
				$mifoto='';
			}				
		/////////////////////		
			
		$miactivo=$_POST['txtactivo'];
		if ($miactivo=='on')
		{
			$txtactivo='S';
		}
		else
		{
			$txtactivo='N';
		}
		$txttipotrabajador=$_POST['txttipotrabajador'];
		$txtnuncontratto=$_POST['txtnuncontratto'];
		$txtfecini=$_POST['txtfecini'];
		$txtfecfin=$_POST['txtfecfin'];
		$txtcargo=$_POST['txtcargo'];
		$txtsueldo=$_POST['txtsueldo'];
		$txtautogenerado=$_POST['txtautogenerado'];
		$txtasigna=$_POST['txtasigna'];
		$txtonp=$_POST['txtonp'];
		$txtafp=$_POST['txtafp'];
		$txtcupss=$_POST['txtcupss'];
		$txtbanco=$_POST['txtbanco'];
		$txtcuenta=$_POST['txtcuenta'];
		$txtapellidosjudicial=$_POST['txtapellidosjudicial'];
		$txtsueldojudicial=$_POST['txtsueldojudicial'];
		$txtapellidosjudicial1=$_POST['txtapellidosjudicial1'];
		$txtsueldojudicial1=$_POST['txtsueldojudicial1'];
		$txtusuario=$_POST['txtusuario'];
		$txtclave=$_POST['txtclave'];
		
		// DATOS PARA EL T-REGISTRO
		$txtessalud=$_POST['txtessalud'];
		$txtdomiciliado=$_POST['txtdomiciliado'];
		$txtvia=$_POST['txtvia'];
		$txtnomvia=$_POST['txtnomvia'];
		$txtnumvia=$_POST['txtnumvia'];
		$txtinterior=$_POST['txtinterior'];
		$txtzona=$_POST['txtzona'];
		$txtnomzona=$_POST['txtnomzona'];
		$txtreferencia=$_POST['txtreferencia'];
		$txtubigeo=$_POST['txtubigeo'];	
		
		$txtregimenlaboral=$_POST['txtregimenlaboral'];	
		$txtocupacion=$_POST['txtocupacion'];	
		$txtdiscapacidad=$_POST['txtdiscapacidad'];	
		$txttipocontrato=$_POST['txttipocontrato'];	
		$txtregimenalternativo=$_POST['txtregimenalternativo'];	
		$txtjornadamaxima=$_POST['txtjornadamaxima'];	
		$txthorario=$_POST['txthorario'];	
		$txtdindicato=$_POST['txtdindicato'];	
		$txtperiodicidad=$_POST['txtperiodicidad'];	
		$txtsituacion=$_POST['txtsituacion'];	
		$txtrenta=$_POST['txtrenta'];	
		$txtsituacione=$_POST['txtsituacione'];	
		$txttipopago=$_POST['txttipopago'];	
		$txtcategoria=$_POST['txtcategoria'];	
		$txtconvenio=$_POST['txtconvenio'];	
		
		$txtinstituto=$_POST['txtinstituto'];	
		$txtcarrera=$_POST['txtcarrera'];	
		$txtano=$_POST['txtano'];
			
		$txtscrt=$_POST['txtscrt'];
		$txtcts=$_POST['txtcts'];
		$txtcafae=$_POST['txtcafae'];
			
		$txtescolar=$_POST['txtescolar'];	
		///////////////////////////
		$rpta=$oUsuario->Agregar($miempresa,$txtapellidos,$txtapellidos2,$txtnombres,$txtcoddocu,$txtnundoc,$txtdireccion,$txtsexo,$txtfecnaci,$txtnacionalidad,$txtemail,$txteducacion,$mifoto,$txtactivo,$txttipotrabajador,$txtnuncontratto,$txtfecini,$txtfecfin,$txtcargo,$txtsueldo,$txtautogenerado,$txtasigna,$txtonp,$txtafp,$txtcupss,$txtbanco,$txtcuenta,$txtapellidosjudicial,$txtsueldojudicial,$txtapellidosjudicial1,$txtsueldojudicial1,$txtusuario,$txtclave,$txtessalud,$txtdomiciliado,$txtvia,$txtnomvia,$txtnumvia,$txtinterior,$txtzona,$txtnomzona,$txtreferencia,$txtubigeo,$txtregimenlaboral,$txtocupacion,$txtdiscapacidad,$txttipocontrato,$txtregimenalternativo,$txtjornadamaxima,$txthorario,$txtdindicato,$txtperiodicidad,$txtsituacion,$txtrenta,$txtsituacione,$txttipopago,$txtcategoria,$txtconvenio,$txtinstituto,$txtcarrera,$txtano,$txtflujo,$txtscrt,$txtcts,$txtcafae,$txtescolar,$txtvaca);

		header("location: trabajador.php");
	break;
	case 2:	
		$oUsuario=new Negocio_clsTrabajador();		
		$txtapellidos=$_POST['txtapellidos'];
		$txtapellidos2=$_POST['txtapellidos2'];
		$txtnombres=$_POST['txtnombres'];
		$txtcoddocu=$_POST['txtcoddocu'];
		$txtnundoc=$_POST['txtnundoc'];
		$txtdireccion=$_POST['txtdireccion'];
		$txtsexo=$_POST['txtsexo'];
		$txtfecnaci=$_POST['txtfecnaci'];
		$txtnacionalidad=$_POST['txtnacionalidad'];
		$txtemail=$_POST['txtemail'];
		$txteducacion=$_POST['txteducacion'];
		$txtvaca=$_POST['txtvaca'];			
		//$txtactivo=$_POST['txtactivo'];
		$miactivo=$_POST['txtactivo'];
		if ($miactivo=='on')
		{
			$txtactivo='S';
		}
		else
		{
			$txtactivo='N';
		}
		
		$txttipotrabajador=$_POST['txttipotrabajador'];
		$txtnuncontratto=$_POST['txtnuncontratto'];
		$txtfecini=$_POST['txtfecini'];
		$txtfecfin=$_POST['txtfecfin'];
		$txtcargo=$_POST['txtcargo'];
		$txtsueldo=$_POST['txtsueldo'];
		$txtautogenerado=$_POST['txtautogenerado'];
		$txtasigna=$_POST['txtasigna'];
		$txtonp=$_POST['txtonp'];
		$txtafp=$_POST['txtafp'];
		$txtcupss=$_POST['txtcupss'];
		$txtbanco=$_POST['txtbanco'];
		$txtcuenta=$_POST['txtcuenta'];
		$txtapellidosjudicial=$_POST['txtapellidosjudicial'];
		$txtsueldojudicial=$_POST['txtsueldojudicial'];
		$txtapellidosjudicial1=$_POST['txtapellidosjudicial1'];
		$txtsueldojudicial1=$_POST['txtsueldojudicial1'];
		$txtusuario=$_POST['txtusuario'];
		$txtclave=$_POST['txtclave'];
		$lafoto=trim($_FILES['archivo']['name']);
		$txtflujo=$_POST['txtflujo'];
// DATOS ADICIONALES
		
		$txtessalud=$_POST['txtessalud'];
		$txtdomiciliado=$_POST['txtdomiciliado'];
		$txtvia=$_POST['txtvia'];
		$txtnomvia=$_POST['txtnomvia'];
		$txtnumvia=$_POST['txtnumvia'];
		$txtinterior=$_POST['txtinterior'];
		$txtzona=$_POST['txtzona'];
		$txtnomzona=$_POST['txtnomzona'];
		$txtreferencia=$_POST['txtreferencia'];
		$txtubigeo=$_POST['txtubigeo'];	
		
		$txtregimenlaboral=$_POST['txtregimenlaboral'];	
		$txtocupacion=$_POST['txtocupacion'];	
		$txtdiscapacidad=$_POST['txtdiscapacidad'];	
		$txttipocontrato=$_POST['txttipocontrato'];	
		$txtregimenalternativo=$_POST['txtregimenalternativo'];	
		$txtjornadamaxima=$_POST['txtjornadamaxima'];	
		$txthorario=$_POST['txthorario'];	
		$txtdindicato=$_POST['txtdindicato'];	
		$txtperiodicidad=$_POST['txtperiodicidad'];	
		$txtsituacion=$_POST['txtsituacion'];	
		$txtrenta=$_POST['txtrenta'];	
		$txtsituacione=$_POST['txtsituacione'];	
		$txttipopago=$_POST['txttipopago'];	
		$txtcategoria=$_POST['txtcategoria'];	
		$txtconvenio=$_POST['txtconvenio'];			
		
		$txtinstituto=$_POST['txtinstituto'];	
		$txtcarrera=$_POST['txtcarrera'];	
		$txtano=$_POST['txtano'];	
				
		$txtscrt=$_POST['txtscrt'];
		$txtcts=$_POST['txtcts'];
		$txtcafae=$_POST['txtcafae'];	
			
		$txtescolar=$_POST['txtescolar'];
    $fuentes_id = $_POST['fuentes_id'];
    $actividades_id = $_POST['actividades_id'];


		//echo $txtescolar;
		if ($lafoto)
		{
  // FOTO DE TRABAJADOR (ARCHIVO)
			if (is_uploaded_file($HTTP_POST_FILES['archivo']['tmp_name']))
			{
				copy($HTTP_POST_FILES['archivo']['tmp_name'], '../fotos/'.$_FILES['archivo']['name'].'');
				$mifoto=trim($_FILES['archivo']['name']);
			}
      $intError=$oUsuario->Modificar($micodigo,$txtapellidos,$txtapellidos2,$txtnombres,$txtcoddocu,$txtnundoc,$txtdireccion,$txtsexo,$txtfecnaci,$txtnacionalidad,$txtemail,$txteducacion,$mifoto,$txtactivo,$txttipotrabajador,$txtnuncontratto,$txtfecini,$txtfecfin,$txtcargo,$txtsueldo,$txtautogenerado,$txtasigna,$txtonp,$txtafp,$txtcupss,$txtbanco,$txtcuenta,$txtapellidosjudicial,$txtsueldojudicial,$txtapellidosjudicial1,$txtsueldojudicial1,$txtusuario,$txtclave,$txtessalud,$txtdomiciliado,$txtvia,$txtnomvia,$txtnumvia,$txtinterior,$txtzona,$txtnomzona,$txtreferencia,$txtubigeo,$txtregimenlaboral,$txtocupacion,$txtdiscapacidad,$txttipocontrato,$txtregimenalternativo,$txtjornadamaxima,$txthorario,$txtdindicato,$txtperiodicidad,$txtsituacion,$txtrenta,$txtsituacione,$txttipopago,$txtcategoria,$txtconvenio,$txtinstituto,$txtcarrera,$txtano,$txtflujo,$txtscrt,$txtcts,$txtcafae,$txtescolar,$txtvaca,$fuentes_id,$actividades_id);
		}
		else
		{
				$intError=$oUsuario->Modificar1($micodigo,$txtapellidos,$txtapellidos2,$txtnombres,$txtcoddocu,$txtnundoc,$txtdireccion,$txtsexo,$txtfecnaci,$txtnacionalidad,$txtemail,$txteducacion,$txtactivo,$txttipotrabajador,$txtnuncontratto,$txtfecini,$txtfecfin,$txtcargo,$txtsueldo,$txtautogenerado,$txtasigna,$txtonp,$txtafp,$txtcupss,$txtbanco,$txtcuenta,$txtapellidosjudicial,$txtsueldojudicial,$txtapellidosjudicial1,$txtsueldojudicial1,$txtusuario,$txtclave,$txtessalud,$txtdomiciliado,$txtvia,$txtnomvia,$txtnumvia,$txtinterior,$txtzona,$txtnomzona,$txtreferencia,$txtubigeo,$txtregimenlaboral,$txtocupacion,$txtdiscapacidad,$txttipocontrato,$txtregimenalternativo,$txtjornadamaxima,$txthorario,$txtdindicato,$txtperiodicidad,$txtsituacion,$txtrenta,$txtsituacione,$txttipopago,$txtcategoria,$txtconvenio,$txtinstituto,$txtcarrera,$txtano,$txtflujo,$txtscrt,$txtcts,$txtcafae,$txtescolar,$txtvaca,$fuentes_id,$actividades_id);
		}
		////////////////////		
		header("location: trabajador.php");
	break;	
	case 3:	
		$oUsuario=new Negocio_clsTrabajador();
		$intError=$oUsuario->Eliminar($elcodigo);
		header("location: trabajador.php");
	break;
	}	
?>		
<script languaje="javascript">
	prehide(); 
</script>
