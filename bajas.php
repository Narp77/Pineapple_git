<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Bajas Pineapple</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
<div id="index">
<img src="logo.png" />
<h2>Bajas Pineapple</h2>
<form name="baja" action="index.php" method="post" onSubmit=" return borrar()">
<?php
if (isset($_SESSION['tablita'])){
	
	if(isset($_POST['altaOK'])){
		
		array_push($_SESSION['tablita'], array("nombre" => $_POST['nombre'],"apellido" => $_POST['apellido'], "dni"=> $_POST['dni'],"direccion"=>
		$_POST['direccion'],"sueldo" =>	$_POST['sueldo']));
	}
}
else{
$_SESSION['tablita']= array(
				array("nombre" => "Pepe1","apellido" => "Perez1", "dni"=>"12345678x","direccion"=>"c/ papapa","sueldo"=>"1000"), 
				array("nombre" => "Pepe2","apellido" => "Perez2", "dni"=>"12345678z","direccion"=>"c/ papqpa","sueldo"=>"2000")
				);
}
$cadena = "<table> <tr> <th>Nombre</th> <th>Apellido</th> <th>DNI</th> <th>Dirección</th> <th>Sueldo</th> </tr>";
$radio=0;
for ($i = 0; $i < count($_SESSION['tablita']) ;$i++)
	{
		$cadena .= " <tr> ";
		$cont = 0;
		foreach ($_SESSION['tablita'][$i] as $value) {
			if($cont==0)
			{
				$cadena .= " <td> <input type='radio' name='radiob' value='".$radio."' />".$value."</td>";
				$cont=1;
				++$radio;
			}
			else
			{
				$cadena .= " <td>".$value."</td>";
			}
		}
	$cadena .= " </tr>";
	}
	
$cadena .= "</table>";
echo "</br></br>";
echo $cadena;
?>
<input type="submit" name="bajaOK" value="Borrar" />
<input type="button" name="bajaNOTOK" value="Cancelar" onClick="window.location.href='index.php'"/>
<input id="numerito" type="text" name="numerito"/>
</form>

</div>
<script>
document.getElementById("numerito").style.display = 'none';
function borrar(){
	document.getElementById("numerito").value=document.forms["baja"]["radiob"].value;
	if(document.forms['baja']['radiob'].value == "")
	{
		alert("Debe seleccionar un trabajador");
		return false;
	}
	else
	{
		return true;
	}
}
</script>
</body>
</html>