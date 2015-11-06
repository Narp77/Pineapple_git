<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Ordenar Pineapple</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
<div id="index">
<img src="logo.png" />
<h2>Ordenar Pineapple</h2>
<form name="ordenar" action="ordenar.php" method="post">
<br><br>

<?php
	if(isset($_POST['Ordenar']))
	{
		
		if($_POST['ordenartipo']=='N')
		{
			$aux=array();
			while(count($_SESSION['tablita'])>0)
			{
				$maximo="a";
				$cont=0;
				for ($i = 0; $i < count($_SESSION['tablita']) ;$i++)
				{
					if($_SESSION['tablita'][$i]['nombre'] >= $maximo)
					{
						$maximo=$_SESSION['tablita'][$i]['nombre'];
						$count=$i;
					}
				}
				array_push($aux, array("nombre" => $_SESSION['tablita'][$cont]['nombre'],"apellido" => $_SESSION['tablita'][$cont]['apellido'],
				"dni" => $_SESSION['tablita'][$cont]['dni'],"direccion" => $_SESSION['tablita'][$cont]['direccion'],
				"sueldo" => $_SESSION['tablita'][$cont]['sueldo']));
				array_splice($_SESSION['tablita'],$cont,1);
			}
			$_SESSION['tablita']=$aux;
		}
		else
		{
			$aux=array();
			while(count($_SESSION['tablita'])!=0)
			{
				$maximo="a";
				$cont;
				for ($i = 0; $i < count($_SESSION['tablita']) ;$i++)
				{
					if($_SESSION['tablita'][$i]['sueldo'] >= $maximo)
					{
						$maximo=$_SESSION['tablita'][$i]['sueldo'];
						$count=$i;
					}
				}
				array_push($aux, array("nombre" => $_SESSION['tablita'][$cont]['nombre'],"apellido" => $_SESSION['tablita'][$cont]['apellido'],
				"dni" => $_SESSION['tablita'][$cont]['dni'],"direccion" => $_SESSION['tablita'][$cont]['direccion'],
				"sueldo" => $_SESSION['tablita'][$cont]['sueldo']));
				array_splice($_SESSION['tablita'],$cont,1);
			}
			$_SESSION['tablita']=$aux;
		}
	}
	else
	{
		echo '<input type="radio" name="ordenartipo" value="N" checked="checked"/> Ordenar por nombre</br>
              <input type="radio" name="ordenartipo" value="S"/> Ordenar por sueldo </br></br>';
		echo '<input type="radio" name="ordenar" value="A" checked="checked"/> Ordenar ascendentemente</br>
       		  <input type="radio" name="ordenar" value="D"/> Ordenar descendentemente </br></br>';
	}
?>
</br>
<input type="submit" name="Ordenar" value="Ordenar"/>
<input type="button" name="bajaNOTOK" value="Cancelar" onClick="window.location.href='index.php'"/>
</form>
</div>
</body>
</html>