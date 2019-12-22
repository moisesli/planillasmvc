<?php
//$date1 = "2017-10-18";
//$date2 = "2019-04-15";

$date1 =$_POST['clave1'];
$date2 =$_POST['clave2'];

$diff = abs(strtotime($date2) - strtotime($date1));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

$mitiempo=$years.' Años '.$months.' Meses '.$days.' Dias';

?>
<input type="text" class="form-control" name="txttiempo" value="<?php echo $mitiempo;?>" readonly>