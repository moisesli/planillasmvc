<?php
	include("../config.php");
	require_once(LOGICA."/negocio.php");
	require_once(HERRAMIENTAS_PHP."/clsGeneral.php");
	$oGeneral=new clsGeneral();	

	$micodigo=$_POST['micodigo'];
	$codtra=$_POST['codtra'];
	$laopcion=$_POST['laopcion'];

	//echo $codtra;
	//echo $laopcion;
	//echo $detalle;
	//echo $descripcion;
	//echo $observa;
		// GRABAR ESCALAFON
		$oUsuario=new Negocio_clsTrabajador();
		$rpta=$oUsuario->EliminarEscalafon($micodigo);			
		?>	
			<div class="card-body">
			  <form name="formulario4" action="#" method="post">
			  <input type="hidden" name="txtcodtra4" value="<?php echo $codtra; ?>">
			  <div class="row">							  	
				<label class="col-sm-3 col-form-label">Detalle</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" name="txtdetalle4" required autofocus>
				</div>
				<label class="col-sm-3 col-form-label">Descripcion</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" name="txtdes4" required>
				</div>
				<label class="col-sm-3 col-form-label">Observacion</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" name="txtobserva4" required>
				</div>
				<br><br>
				<div class="col-sm-12" align="center">
					<button type="button" class="btn btn-primary" onclick="grabar4('4');">Grabar</button>
				</div>
				<div class="col-sm-12">


					<div class="card">
					  <!-- /.card-header -->
					  <div class="card-body p-0">
						<table class="table table-condensed">
						  <thead>
							<tr>
							  <th>#</th>
							  <th>Detalle</th>
							  <th>Desc.</th>
							  <th>Obs.</th>
							  <th>Eli</th>
							</tr>
						  </thead>
						  <tbody>
							<?php					  
								$olistado=new Negocio_clsTablas();
								$rslistado=$olistado->MostrarEscalafon($codtra,$laopcion);			
								while($rowusuario=$rslistado->fetch_array())
								{
							?>                   
								<tr>
									<td><?php echo $rowusuario['codigo'];?></td>
									<td><?php echo $rowusuario['detalle'];?></td>
									<td><?php echo $rowusuario['descripcion'];?></td>
									<td><?php echo $rowusuario['observa'];?></td>

									<td align="center"><button class="btn btn-danger" type="button" onclick="eliminar4('4',<?php echo $rowusuario['codigo'];?>);"><i class="nav-icon fas fa-eraser"></i></button></td>
								</tr>
						   <?php
								}
							?>  
						  </tbody>
						</table>
					  </div>
					  <!-- /.card-body -->
					</div>


				</div>
			  </div>
			  </form>
			</div>	
			</div>							  
		
