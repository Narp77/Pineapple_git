<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Modificaciones Pineapple</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
<div id="modificar">
<img src="logo.png" />
<h2>Modificaciones Pineapple</h2>
<form name="modificar2" action="supuesto_array.php" method="POST">
     </br>
     Nombre: <input type="text" name="nombre"  value="<?php echo $_SESSION['tablita'][$_POST['numerito']]['nombre']; ?>" required/>
     </br> </br>
     
     Apellido: <input type="text" name="apellido" value="<?php echo $_SESSION['tablita'][$_POST['numerito']]['apellido']; ?>" required/>
     </br> </br>
     
     DNI: <input type="text" name="dni" maxlength="9" value="<?php echo $_SESSION['tablita'][$_POST['numerito']]['dni']; ?>" required/>
     </br> </br>
     
     Dirección: <input type="text" name="direccion" value="<?php echo $_SESSION['tablita'][$_POST['numerito']]['direccion']; ?>" />
     </br> </br>
     
     Sueldo: <input type="number" min="1" name="sueldo"  value="<?php echo $_SESSION['tablita'][$_POST['numerito']]['sueldo']; ?>" required/>
	  </br> </br>
     
     <input type="submit" name="modificarOK" value="Confirmar"/>
     <input type="button" name="bajaNOTOK" value="Cancelar" onClick="window.location.href='modificar.php'"/>
     <input id="numerito" type="text" name="numerito" value="<?php echo $_POST['numerito']; ?>"/>
</form>
</div>
<script>
document.getElementById("numerito").style.display = 'none';
</script>
</body>
</html>