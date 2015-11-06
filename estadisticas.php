<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Estadisticas Pineapple</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
<div id="index">
<img src="logo.png" />
<h2>Estadísticas Pineapple</h2>
<form name="Estadistica" action="consulta.php" method="post">
<br><br>

<?php
	$media=0;
	$maximo=0;
	$maximoID;
	$minimo=1000000000000;
	$minimoID;
	
	for ($i = 0; $i < count($_SESSION['tablita']) ;$i++)
				{
						if($_SESSION['tablita'][$i]['sueldo'] >= $maximo)
						{
							$maximo= $_SESSION['tablita'][$i]['sueldo'];
							$maximoID=$i;
						}
						if($_SESSION['tablita'][$i]['sueldo'] <= $minimo)
						{
							$minimo= $_SESSION['tablita'][$i]['sueldo'];
							$minimoID=$i;
						}
						$media= $media + $_SESSION['tablita'][$i]['sueldo'];
				}	
	$media=$media/(count($_SESSION['tablita']));
	
	echo "<div id='texto'>El trabajador más remunerado en nuestra empresa es ".$_SESSION['tablita'][$maximoID]['nombre'] ." con una remuneración total de ".$maximo."€.</div> </br>";
	echo "<div id='texto'>El trabajador menos remunerado en nuestra empresa es ".$_SESSION['tablita'][$minimoID]['nombre'] ." con una remuneración total de ".$minimo."€.</div> </br>";
	echo "<div id='texto'>Nuestra empresa actualmente dispone de ".(count($_SESSION['tablita']))." trabajador/es con un sueldo medio de ".$media."€.</div> </br>";
?>
</br>
<input type="button" name="bajaNOTOK" value="Volver" onClick="window.location.href='index.php'"/>
</form>

</div>
</body>
</html>