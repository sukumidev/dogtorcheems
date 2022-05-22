<?php
require_once "config.php";

// Procesar datos del formulario cuando el formulario sea subido
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $id = trim($_POST["id"]);
    $nombre = trim($_POST["nombre"]);
    $apellidos = trim($_POST["apellidos"]);
    $email = trim($_POST["email"]);
    $telefono = trim($_POST["telefono"]);

        // Preparar la sentencia de insert
        $sql = "UPDATE clientes SET nombre = '$nombre', apellidos = '$apellidos', email = '$email', telefono = '$telefono' WHERE id = $id";

        if(mysqli_query($link, $sql)){
            //echo "Records were updated successfully.";
            header("location: tablaClientes.php");
        } else {
            echo "ERROR: No se pudo ejecutar la query $sql. " . mysqli_error($link);
        }
         
    }
    
    // Close connection
    mysqli_close($link);
?>