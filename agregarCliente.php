<?php
require_once "config.php";
 
// Definir variables e inicializarlas como vacias
$email =  $nombre = $apellidos  = $telefono = "";
 

// Procesar datos del formulario cuando el formulario sea subido
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $nombre = trim($_POST["nombre"]);
    $apellidos = trim($_POST["apellidos"]);
    $email = trim($_POST["email"]);
    $telefono = trim($_POST["telefono"]);

        // Preparar la sentencia de insert
        $sql = "INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `email`, `telefono`, `active`)
                 VALUES (NULL, ?, ?, ?, ?, 1)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Unir (bind) variables para la sentencia preparada como parametros
            mysqli_stmt_bind_param($stmt,"ssss", $param_nombre, $param_apellidos, $param_email, $param_telefono);
            
            // Set parametros
            $param_nombre= $nombre;
            $param_apellidos = $apellidos;
            $param_email = $email;
            $param_telefono = $telefono;
            
            // Intenta registrar a la base de datos
            if(mysqli_stmt_execute($stmt)){
                // Registro exitoso, redireccionando a la landing page
                header("location: tablaClientes.php");
                exit();
            } else{
                echo "Oops! Algo salió mal, intentalo de nuevo";
                echo "$sql";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <title>Agregar nuevo cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style> 
</head>

<link rel="stylesheet" href="css/style.css">
    <body>

        <script>
            function Alerta() {  
                alert("Usuario creado exitosamente!");
            } 
        </script>

        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <div class="card">
                        <h5 class="text-center mb-4">Añadir nuevo cliente</h5>
                        <form class="form-card" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onSubmit= Alerta()>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">ID Asignado<span class="text-danger"> *</span></label> 
                                <label class="form-control-label px-4">
                                    <?php 
                                        require_once "config.php";
                                        if ($result = mysqli_query($link, "SELECT id FROM `clientes` ORDER BY id DESC LIMIT 1")) {
                                              $row = mysqli_fetch_array($result);
                                              echo (int)$row[0]+1;
                                        }
                                        mysqli_close($link);
                                    ?>
                                </label> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                            
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nombre(s)<span class="text-danger"> *</span></label> <input type="text" name="nombre" placeholder="Ingresa el nombre" onblur="validate(1)" required> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Apellidos<span class="text-danger"> *</span></label> <input type="text" name="apellidos" placeholder="Ingresa los apellidos" onblur="validate(2)" required> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Email <span class="text-danger"> *</span></label> <input type="email" name="email" placeholder="Ingresa el correo electronico" onblur="validate(1)" required> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Número de teléfono<span class="text-danger"> *</span></label> <input type="text" name="telefono" placeholder="Numero de telefono" onblur="validate(4)" required> </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">Continuar</button> </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>