<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Consultas Pineapple</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
<div id="index">
<img src="logo.png" />
<h2>Consultas Pineapple</h2>
<form name="consulta" action="consulta.php" method="post">
</br></br>
<input type="text" name="consultitas" required/>
</br></br>
<?php
	if(isset($_POST['ConsultaOK'])){
		$consul;
		$cadena = "<table> <tr> <th>Nombre</th> <th>Apellido</th> <th>DNI</th> <th>Dirección</th> <th>Sueldo</th> </tr>";
		for ($i = 0; $i < count($_SESSION['tablita']) ;$i++)
			{
					if($_SESSION['tablita'][$i]['dni'] == $_POST['consultitas'])
					{
						$consul=$i;
					}
				
			}
		if(isset($consul)){
		$cadena .= "<tr> <td>".$_SESSION['tablita'][$consul]['nombre']."</td> <td>".$_SESSION['tablita'][$consul]['apellido']."</td> 
		<td>".$_SESSION['tablita'][$consul]['dni']."</td> <td>".$_SESSION['tablita'][$consul]['direccion']."</td>
		<td>".$_SESSION['tablita'][$consul]['sueldo']."</td></tr> </table>";
		echo $cadena;
		}
	}
?>
<input type="submit" name="ConsultaOK" value="Enviar" />
<input type="button" name="bajaNOTOK" value="Cancelar" onClick="window.location.href='index.php'"/>
</form>

</div>
</body>
</html>