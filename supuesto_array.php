<?php 
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Supuesto Array</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
<div id="index">
    <img src="logo.png" />
    <h2>Trabajadores Pineapple</h2>
    
        </br> </br>
        <input type="button" name="alta" value="Alta" onClick="window.location.href='altas.html'" />
        <input type="button" name="baja" value="Baja" onClick="window.location.href='bajas.php'"/>
        <input type="button" name="modificar" value="Modificar"  onClick="window.location.href='modificar.php'"/>
        <input type="button" name="consulta" value="Consulta" onClick="window.location.href='consulta.php'"/>
        <input type="button" name="estadistica" value="Estadística" onClick="window.location.href='Estadisticas.php'"/>
        <input type="button" name="ordenar" value="Ordenar" onClick="window.location.href='ordenar.php'"/>
        </br> </br>
    <?php
    if (isset($_SESSION['tablita'])){
        
        if(isset($_POST['altaOK'])){
            
            array_push($_SESSION['tablita'], array("nombre" => $_POST['nombre'],"apellido" => $_POST['apellido'], "dni"=> $_POST['dni'],"direccion"=>
            $_POST['direccion'],"sueldo" =>	$_POST['sueldo']));
        }
        
        if(isset($_POST['bajaOK'])){
            
            if(isset($_POST['numerito'])){
                $numerillo=$_POST['numerito'];
                array_splice($_SESSION['tablita'],$numerillo,1);
            }
        }
            
        if(isset($_POST['modificarOK'])){
            
            if(isset($_POST['numerito'])){
                $numerillo=$_POST['numerito'];
                $_SESSION['tablita'][$numerillo]= array("nombre" => $_POST['nombre'],"apellido" => $_POST['apellido'], "dni"=> $_POST['dni'],					            "direccion"=> $_POST['direccion'],"sueldo" => $_POST['sueldo']);
            }
        }
        
    }
    else{
    $_SESSION['tablita']= array(
                    array("nombre" => "Pepe","apellido" => "Román", "dni"=>"12345678X","direccion"=>"c/Sevilla","sueldo"=>"1000"), 
                    array("nombre" => "Juan","apellido" => "Gómez", "dni"=>"12345678Z","direccion"=>"c/Asunción","sueldo"=>"2000")
                    );
    }
    $cadena = "<table> <tr> <th>Nombre</th> <th>Apellido</th> <th>DNI</th> <th>Dirección</th> <th>Sueldo</th> </tr>";
    for ($i = 0; $i < count($_SESSION['tablita']) ;$i++)
        {
            $cadena .= " <tr> ";
            
            foreach ($_SESSION['tablita'][$i] as $value) {
                
                    $cadena .= " <td>".$value."</td>";
            }
        $cadena .= " </tr>";
        }
        
    $cadena .= "</table>";
    echo $cadena;
    ?>
</div>
</body>
</html>