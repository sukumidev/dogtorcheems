<?php
require_once "config.php";

// Procesar datos del formulario cuando el formulario sea subido
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $id_empleado = trim($_POST["id_empleado"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $nombre = trim($_POST["nombre"]);
    $apellidos = trim($_POST["apellidos"]);
    $permisos = trim($_POST["permisos"]);
    $telefono = trim($_POST["telefono"]);
    $puesto = trim($_POST["puesto"]);
    $nss = trim($_POST["nss"]);
    $fechanacimiento = trim($_POST["fechanacimiento"]);
    $iniciolabores = trim($_POST["iniciolabores"]);

        // Preparar la sentencia de insert
        $sql = "UPDATE empleados SET username = '$username', password = '$password', nombre = '$nombre', apellidos = '$apellidos', permisos = '$permisos', telefono = '$telefono', puesto = '$puesto', nss = '$nss', fechanacimiento = '$fechanacimiento', iniciolabores= '$iniciolabores' WHERE ID_empleado = $id_empleado;";

        if(mysqli_query($link, $sql)){
            //echo "Records were updated successfully.";
            header("location: tablaEmpleados.php");
        } else {
            echo "ERROR: No se pudo ejecutar la query $sql. " . mysqli_error($link);
        }
         
    }
    
    // Close connection
    mysqli_close($link);
?>