<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    

    <title>Gestión de empleados</title>
    
  </div>
  </head>


  <body>
  

  <div class="content">
    
    <div class="container">
      <h1><img src="img/DogtorCheemsLogo2.png" width="300"></h1>
      <h2 style="text-align:center;" class="mb-5">Gestión de empleados</h2>
      <h3 style="text-align: right;">Agregar empleado <a href="agregarEmpleado.php"> <i class="icon-plus"></i> </a> </h3>

      <div class="table-responsive">
        <div class="search-container">
          <form action="tablaEmpleados.php" method="GET">
            <input type="text" placeholder="Buscar por id o nombre" name="search">
            <button type="submit">Buscar</button>
          </form>
        </div>

<?php

require_once "config.php";
 
if (isset($_GET["search"])){
    $search = $_GET["search"];
    $sql = "SELECT * FROM empleados WHERE active = 1 AND (nombre LIKE '%$search%' OR ID_empleado LIKE '%$search%')";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class= \" table custom-table \">";
            echo "<tr>";
                    echo "<th scope= \"col \">ID</th>";
                    echo "<th scope= \"col \">Username</th>";
                    echo "<th scope= \"col \">Nombre</th>";
                    echo "<th scope= \"col \">Apellidos</th>";
                    echo "<th scope= \"col \">Puesto</th>";
                    echo "<th scope= \"col \">Permisos</th>";
                    echo "<th scope= \"col \">Teléfono</th>";
                    echo "<th scope= \"col \">NSS</th>";
                    echo "<th scope= \"col \">Fecha de nacimiento</th>";
                    echo "<th scope= \"col \">Fecha de inicio de labores</th>";
                echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                    echo "<td>" . $row['ID_empleado'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['apellidos'] . "</td>";
                    echo "<td>" . $row['puesto'] . "</td>";
                    echo "<td>" . $row['permisos'] . "</td>";
                    echo "<td>" . $row['telefono'] . "</td>";
                    echo "<td>" . $row['nss'] . "</td>";
                    echo "<td>" . $row['fechanacimiento'] . "</td>";
                    echo "<td>" . $row['iniciolabores'] . "</td>";
                    echo "<td> <a href=\"editarEmpleado.php?id=" .$row['ID_empleado']. "\"><i class=\"icon-edit-sign\"></i> </a></td>";
                    echo "<td> <a href=\"deleteEmpleado.php?id=" .$row['ID_empleado']. "\"><i class=\"icon-trash\"></i></a></td>";
                echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No se encontraron registros.";
    }
} else{
    echo "ERROR: No se pudo realizar la query: $sql. " . 
    mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}
else if(empty($_GET["search"]) || !isset($_GET["search"])){
    $sql = "SELECT * FROM empleados WHERE active = 1";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class= \" table custom-table \">";
                echo "<tr>";
                    echo "<th scope= \"col \">ID</th>";
                    echo "<th scope= \"col \">Username</th>";
                    echo "<th scope= \"col \">Nombre</th>";
                    echo "<th scope= \"col \">Apellidos</th>";
                    echo "<th scope= \"col \">Puesto</th>";
                    echo "<th scope= \"col \">Permisos</th>";
                    echo "<th scope= \"col \">Teléfono</th>";
                    echo "<th scope= \"col \">NSS</th>";
                    echo "<th scope= \"col \">Fecha de nacimiento</th>";
                    echo "<th scope= \"col \">Fecha de inicio de labores</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                
                echo "<tr>";
                    echo "<td>" . $row['ID_empleado'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['apellidos'] . "</td>";
                    echo "<td>" . $row['puesto'] . "</td>";
                    echo "<td>" . $row['permisos'] . "</td>";
                    echo "<td>" . $row['telefono'] . "</td>";
                    echo "<td>" . $row['nss'] . "</td>";
                    echo "<td>" . $row['fechanacimiento'] . "</td>";
                    echo "<td>" . $row['iniciolabores'] . "</td>";
                    echo "<td> <a href=\"editarEmpleado.php?id=" .$row['ID_empleado']. "\"><i class=\"icon-edit-sign\"></i> </a></td>";
                    echo "<td> <a href=\"deleteEmpleado.php?id=" .$row['ID_empleado']. "\"><i class=\"icon-trash\"></i></a></td>";
                echo "</tr>";
            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No se encontraron registros.";
    }
} else{
    echo "ERROR: No se pudo realizar la query: $sql. " . 
    mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}
?>