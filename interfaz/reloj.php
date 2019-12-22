<?php session_start();
	$miusuario=$_SESSION["apellidos"];
	$misiglas=$_SESSION["usuario"];
	$micodusu=$_SESSION['codigo'];	
	$miempresa=$_SESSION['codempresa'];	
	$miperiodo=$_SESSION['periodo'];
	$mitipo=$_SESSION['tipo'];
	if(!($_SESSION["accesar"] == "OK")){
		session_destroy();
		echo "<META HTTP-EQUIV = REFRESH CONTENT='0;URL=../index.php'>";	
	}

	require_once '../libreria/cuerpo/cabeza1.php';
	
	include("../config.php");
	require_once(LOGICA."/negocio.php");

	$laclave=$_POST['txtclave'];
	$elmes=$_POST['txtelmes'];
	//echo $elmes;
	if ($laclave)
	{ 
		// CCONTAR EL TRABAJADOR CON SU CLAVE
		$oDescuento=new Negocio_clsDescuento();
		$rsTotalTrabajador=$oDescuento->Contar_Clave($laclave,$miempresa);
		$num_trabajador=$rsTotalTrabajador['total'];
		//echo $num_trabajador;
		if ($num_trabajador==0)
		{ ?>
			<script language="javascript">
				alert('LA CLAVE ES INCORRECTA VUELVA A INTENTARLO');
				document.clock.txtclave.value='';
			</script>		
		<?php
		}
		else
		{ 
			$rsDescuento=$oDescuento->Buscar_Clave($laclave,$miempresa);
			$codtrabajador=$rsDescuento['codigo'];
			// la hora
				$time = time();
				$lahora=date("H:i");			
			//////////	
			// CONVERTIR TURNO
			$tur=date("A");
			if (trim($tur)=="AM") 
			{
				$tur="M";
			}
			else
			{
				$tur="T";
			}			
			// BUSCAR SI YA MARCO EN EL TURNO			
			$rowContarAsistencia=$oDescuento->Contar_Asistencia($miempresa,$codtrabajador,date('Y-m-d'),$miperiodo,$elmes,$tur);

			
			if ($rowContarAsistencia['total']==0)			
			{
				// AGREGAR EL REGISTRO DE ASISTENCIA
				?>
					<script>
						alert('NO TIENE HORA PARA ESTE DIA Y TURNO, VERIFICAR CON PERSONAL...');
						document.clock.txtclave.value='';
					</script>		
				<?php				
			}
			else
			{
				$rowBuscarasiste=$oDescuento->Buscarhoramarcada($miempresa,$codtrabajador,date('Y-m-d'),$miperiodo,$elmes,$tur);
				if ($rowBuscarasiste['hora']=='')
				{
					$elcodasiste=$rowBuscarasiste['codigo'];
					
					$rowDescuento=$oDescuento->Modificar_Asistencia($elcodasiste,$lahora);
					?>
						<script>
							alert('REGISTRO SU ASISTENCIA CORRECTAMENTE...');
							document.clock.txtclave.value='';
						</script>		
					<?php					
				}
				else
				{
					?>
						<script>
							alert('YA REGISTRO SU ASISTENCIA PARA ESTE TURNO');	
							document.clock.txtclave.value='';
						</script>		
					<?php					
				}
			}
			
		}
		// BUSCO LA CLAVE EN LOS TRABAJADORES		
//		
	}
		
?>

<script language="javascript" type="text/javascript" src="../js/funciones.js"></script>
<script>
function lafecha(){
   mesarray=new Array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO","AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");
   diaarray=new Array( "DOMINGO","LUNES", "MARTES", "MIERCOLES", "JUEVES", "VIERNES", "SABADO");
   hoy = new Date();
   dias = hoy.getDate();
   dia = hoy.getDay();
   mes = hoy.getMonth();
   mes=mesarray[mes];
   dia =diaarray[dia];
   anno = hoy.getFullYear();
   document.clock.txtlafecha.value=dia+' '+dias+' DE '+mes+' DEL '+anno;
   document.clock.txtelmes.value=mes;
 } 
//defina variables.
var timerID = null
var timerRunning = false
function stopTimer(){
        //stop the clock
        if(timerRunning) {
                clearTimeout(timerID)
                timerRunning = false
        }
} 
function startTimer(){
    // Stop the clock (in case it's running), then make it go.
    stopTimer()
    runClock()
}
function runClock(){
        document.clock.face.value = timeNow()
        //Notice how setTimeout() calls its own calling function, runClock().
        timerID = setTimeout("runClock()",1000)
        timerRunning = true
}
function timeNow() {
        //Grabs the current time and formats it into hh:mm:ss am/pm format.
        now = new Date()
        hours = now.getHours()
        minutes = now.getMinutes()
        seconds = now.getSeconds()
        timeStr = "" + ((hours > 12) ? hours - 12 : hours)
        timeStr  += ((minutes < 10) ? ":0" : ":") + minutes
        timeStr  += ((seconds < 10) ? ":0" : ":") + seconds
        timeStr  += (hours >= 12) ? " PM" : " AM"
        return timeStr
}
// fin -->
</script>
<style>
<!--
	A{text-decoration: none}
-->
</style>
<?php
$fec=date("Y-m-d");
$hor=date("g");
$min=date("i");
$tur=date("A");
if (trim($tur)=="AM") 
{
	$tur="M";
}
else
{
	$tur="T";
}
?>
<!-- MENU -->			
<body class="hold-transition sidebar-mini layout-fixed" onLoad="startTimer()" onUnload="stopTimer()">
<div class="wrapper">
<!-- BARRA -->		
<?php
	require_once '../libreria/cuerpo/barrareloj.php';
?>

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small box -->
          </div>
          <!-- ./col -->
          <div class="col-lg-8 col-6">
          <br><br>
			<div class="card card-info">
			  <div class="card-header">
				<h3 class="card-title">Marque su Asistencia - Ingrese su Acceso.</h3>                                
			  </div>

			  <form action="" name="clock" method="post" align="center" onSubmit="return validarreloj();">						   
			  <input type="hidden" name="txtelmes" id="txtelmes">
				<div class="card-body">			  	  				  					
						<table align="center" border="0" bgcolor="#FFFFFF" bordercolor="#000066" width="100%" height="60%" cellpadding="0" cellspacing="0">
										<tr height="80">									
											<td align="center">
												<input type="text" style="background-color:#ffffff; font-weight: bold; font-size:48px; font-family:'Arial Black'; font-size-adjust:inherit; color:#C91209; text-decoration:none ; border: 0px outset rgb(255,255,255); align-content: center" class="form-control" name="txtlafecha" id="txtlafecha" readonly>
											</td>
										</tr>									
									<tr height="80">									
											<td align="center">
												<input type="text" name="face" size="10" style="background-color:#ffffff; font-weight: bold; font-size:72px; font-family:'Arial Black'; font-size-adjust:inherit; color:#0B0BB9; text-decoration:none ; border: 0px outset rgb(255,255,255)" readonly>
											</td>
									</tr>
									<tr height="80">
										<td align="center"><input type="password" name="txtclave" id="txtclave" maxlength="15" style="font-size:42px;font-size-adjust:inherit; color:#0B0BB9; text-decoration:none ;" autofocus>		
									</tr>
									</table>  
												    		
			    		
			    		
				    
				    
				    
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
				  <button type="submit" class="btn btn-primary">Registrar Asistencia</button>				  
				</div>                
			  </form>
			</div>           
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
          </div>
<!-- ./col -->
          <!-- ./col -->
          
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
      
      
      

    <!-- /.content -->
    
  
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<?php
	require_once '../libreria/cuerpo/pie1.php';
?>
<script language="javascript">
	lafecha();
</script>

</body>
</html>
