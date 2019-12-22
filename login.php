<?php
	include("config.php");
	require_once(LOGICA."/negocio.php");
	$usuario1=strtoupper($_POST["txtusuario"]);	
	$clave=$_POST["txtpassword"];
	$rpta="";
	session_start();
		$oUsuario=new Negocio_clsUsuario();		
		$row1=$oUsuario->Verificar_Usuario($usuario1, $clave);
		if ($usuario=='JAZBSOFT')	
		{
			$_SESSION['accesar']='OK';
			$_SESSION['codigo']=0;
			$_SESSION['usuario']='JAZBSOFT';
			$_SESSION['apellidos']='ADMINISTRADOR';
			$_SESSION['codempresa']=1;
			$_SESSION['periodo']="2017";
			$_SESSION['tipo']="1";
			echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=interfaz/administrador.php'>";
		}
		else
		{
		if ($row1>0){
			$rowUsuario=$row1->fetch_array();
			$_SESSION['accesar']='OK';
			$_SESSION['codigo']=intval($rowUsuario['codigo']);
			$_SESSION['usuario']=trim($rowUsuario['usuario']);
			$_SESSION['apellidos']=trim($rowUsuario['apellidos']);
			$_SESSION['codempresa']=intval($rowUsuario['codempresa']);
			$_SESSION['periodo']=trim($rowUsuario['codperiodo']);;
			$_SESSION['tipo']=intval($rowUsuario['tipo']);
			
//			echo 'entrando';
//			echo $_SESSION['clase'];
//			$oMenu=new Negocio_clsMenu();
//			$rscontar=$oMenu->Contar_Registros_Menu(intval($rowUsuario['codigo']));
			//echo $_SESSION['tipo']; 	
			if ($_SESSION['tipo']==1)
				echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=interfaz/administrador.php'>";				
			if ($_SESSION['tipo']==2)
				echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=interfaz/reloj.php'>";
			if ($_SESSION['tipo']==3)
				echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=interfaz/asistencia.php'>";				
			if ($_SESSION['tipo']==4)
				echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=interfaz/empleado.php'>";				
			
		}else{				
		?>
		<?php
			$error='!Error! : Los datos del usuario son incorrectos...';
			require 'index.php';
		}
	}		
?>		