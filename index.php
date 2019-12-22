<?php
	require_once 'libreria/cuerpo/cabeza.php';
	
	include("config.php");
	require_once(LOGICA."/negocio.php");
	require_once(HERRAMIENTAS_PHP."/clsGeneral.php");
	$oGeneral=new clsGeneral();
?>
<style type="text/css">
body{
    background-image: url(images/fondito.jpg);
}
</style>
<body>
<div class="row">
	<div class="col-md-5">
 	
  	</div>
	<div class="col-md-7">
		<div class="login-box">
		  <div class="login-logo">			
			<a href="http://www.munialtoalianza.gob.pe" target="_blank"><img src="libreria/dist/img/milogo.png" width="400" height="100" alt="Mdaa" class="bbrand-image bimg-circle belevation-5"></a>
			<strong style="color:#C00808; font-size: 38px"><?php echo VERSION; ?></strong>
		  </div>
		  <!-- /.login-logo -->
		  <div class="card">
			<div class="card-body login-card-body">
			<div class="container-fluid">
				<h5 align="center" style="color: #1B037C"><strong><?php echo TITULO; ?></strong></h4>
			</div>

			  <p class="login-box-msg" style="color: #B014C5">Control de Acceso al Sistema</p>

			  <form action="login.php" method="post">
				<div class="input-group mb-3">
				  <input type="text" name="txtusuario" id="txtusuario" class="form-control" value="" placeholder="Usuario" autofocus>
				  <div class="input-group-append">
					<div class="input-group-text">
					  <span class="fas fa-user"></span>
					</div>
				  </div>
				</div>
				<div class="input-group mb-3">
				  <input type="password" name="txtpassword" id="txtpassword" class="form-control" value="" placeholder="Clave de Acceso">
				  <div class="input-group-append">
					<div class="input-group-text">
					  <span class="fas fa-lock"></span>
					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-8">
				  </div>
				  <!-- /.col -->
				  <div class="col-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
				  </div>
				  <!-- /.col -->
				</div>
			  </form>
			</div>
			<!-- /.login-card-body -->
			<div>

			<table width="100%" border="0" bgcolor=#B8DEEC>
				<tr>
					<td align="center"><strong>Ingrese sus datos de acceso...</strong></td>
				</tr>
			</table>
			</div>
			<?php
				if(!empty($error))
				{
				?>				
				<hr class="thin"/>	
				  <div class="alert" style="background:#FFFFFF; color:#0066FF;">
					 <div class="heading " align="center">
					   <strong style="font-size:16px;"><?php echo $error ?></strong>
					 </div>
				  </div>
				<?php
				}
				?> 

		  </div>
		</div> 	
  	</div>
</div>  	        
<!-- /.login-box -->

<?php
	require_once 'libreria/cuerpo/pie.php';
?>

</body>
</html>
