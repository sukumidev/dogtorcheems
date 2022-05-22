<?php
    $confirmado = false;
?>

<html>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script>
            function confirmar(){
                if(confirm("¿Estás seguro de eliminar este registro?") === true){
                    <?php $confirmado = true;  ?>
                }else{
                    <?php $confirmado = false;  ?>
                   }
                 }
        </script>
</html>

<?php    
require_once "config.php";
echo "<script> confirmar() </script>";

// Procesar datos del formulario cuando el formulario sea subido
if($_SERVER["REQUEST_METHOD"] == "GET" && $confirmado = true){
    
    $id_empleado = trim($_GET["id"]);

        // Preparar la sentencia de insert
        $sql = "UPDATE empleados SET active = 0 WHERE ID_empleado = $id_empleado;";

        if(mysqli_query($link, $sql)){
            echo "<div style= \"text-align: center;\"><h1> El registro se ha eliminado exitosamente <h1></div>";
            echo "<div style='text-align: center;'><img src=\"https://pbs.twimg.com/media/FM41HdEWYAQAauP.jpg\" width='300'></div>";
            echo "<meta http-equiv=\"refresh\" content=\"1; url=https://dogtorcheems.000webhostapp.com/tablaEmpleados.php\"/>";
        } else {
            echo "ERROR: No se pudo ejecutar la query $sql. " . mysqli_error($link);
        }
    }
    // Close connection
    mysqli_close($link);
?>