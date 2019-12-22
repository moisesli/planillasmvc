<?php
	$mivar1='07:20';
	$mivar2='08:25';
	$h1=intval(substr($mivar1,0,2));
	$m1=intval(substr($mivar1,3,2));
	$h2=intval(substr($mivar2,0,2));
	$m2=intval(substr($mivar2,3,2));

	//echo $mivar1.' ';
	//echo $mivar2.' ';

	if ($h1==$h2)
	{
		$horas=0;
		// son iguales y se conpara minutos
		if ($m2>$m1)
		{
			$miminuto=$m2-$m1;
			//echo 'Hor :'.$horas.' Min :'.$miminuto;
		}
		else
		{
			$miminuto=0;
			//echo 'Hor :'.$horas.' Min :'.$miminuto;
		}
	}
	else
	{
		if ($h2<$h1)
		{
			$horas=0;
			$miminuto=0;
			//echo 'Hor :'.$horas.' Min :'.$miminuto;
		}
		else
		{
			$mical=60-$m1;				// 15 minutos
			$h1=$h1+1;
		//	echo $mical;
			$mical1=$m2;
			$miminuto=$mical+$mical1;
			
			for ($i = $h1; $i <= $h2; $i++)
			{
				$con++;
			}			
			$horas=$con-1;
			
			if ($miminuto>=60)
			{
				$mival=$miminuto/60;
				$lavoz=intval($mival);
				$por=$lavoz*60;
				$miminuto=$miminuto-$por;
				//echo 'EL VALO ENTERO'.$lavoz;
				$horas=$horas+$lavoz;
				//echo 'TOTAL'.$mival ;
			}
			//echo 'Hor :'.$horas.' Min :'.$miminuto;
		}
	}

?>
