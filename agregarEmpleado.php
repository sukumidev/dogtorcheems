<?php
require_once "config.php";
 
// Definir variables e inicializarlas como vacias
$username = $password = $nombre = $apellidos = $permisos = $telefono = $puesto = $nss = $fechanacimiento = $iniciolabores = "";
 

// Procesar datos del formulario cuando el formulario sea subido
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
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
        $sql = "INSERT INTO `empleados` (`ID_empleado`, `username`, `password`, `nombre`, `apellidos`, `permisos`, `telefono`, `puesto`, `nss`, `fechanacimiento`, `iniciolabores`)
                 VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Unir (bind) variables para la sentencia preparada como parametros
            mysqli_stmt_bind_param($stmt,"ssssssssss", $param_username, $param_password, $param_nombre, $param_apellidos, $param_permisos, $param_telefono, $param_puesto, $param_nss, $param_fechanac, $param_iniciolabores);
            
            // Set parametros
            $param_username =$username;
            $param_password =$password;
            $param_nombre= $nombre;
            $param_apellidos = $apellidos;
            $param_permisos = $permisos;
            $param_telefono = $telefono;
            $param_puesto = $puesto;
            $param_nss = $nss;
            $param_fechanac = $fechanacimiento;
            $param_iniciolabores = $iniciolabores;
            
            // Intenta registrar a la base de datos
            if(mysqli_stmt_execute($stmt)){
                // Registro exitoso, redireccionando a la landing page
                header("location: index.html");
                exit();
            } else{
                echo "Oops! Algo salió mal, intentalo de nuevo";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
   // mysqli_close($link);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h5 class="text-center mb-4">Añadir nuevo empleado</h5>
                        <form class="form-card" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onSubmit= Alerta()>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">ID Asignado<span class="text-danger"> *</span></label> 
                                <label class="form-control-label px-4">
                                    <?php 
                                        require_once "config.php";
                                        if ($result = mysqli_query($link, "SELECT ID_empleado FROM `empleados` ORDER BY ID_empleado DESC LIMIT 1")) {
                                              $row = mysqli_fetch_array($result);
                                              echo (int)$row[0]+1;
                                        }
                                        mysqli_close($link);
                                    ?>
                                </label> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Username <span class="text-danger"> *</span></label> <input type="text" name="username" placeholder="Ingresa el username" onblur="validate(1)" required> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Agregar contraseña<span class="text-danger"> *</span></label> <input type="text" name="password" placeholder="Contraseña" onblur="validate(4)" required> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nombre(s)<span class="text-danger"> *</span></label> <input type="text" name="nombre" placeholder="Ingresa el nombre" onblur="validate(1)" required> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Apellidos<span class="text-danger"> *</span></label> <input type="text" name="apellidos" placeholder="Ingresa los apellidos" onblur="validate(2)" required> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Permisos<span class="text-danger"> *</span></label> 
                                    <select  class="form-select form-select-lg mb-3" aria-label=".form-select-sm example"
                                     name="permisos">
                                    <option value="Admin">Administrador</option>
                                    <option value="Recepcionista">Recepcionista</option>
                                    <option value="Medico">Médico</option>
                                    <option value="Normal">Normal</option>
                                  </select> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Número de teléfono<span class="text-danger"> *</span></label> <input type="text" name="telefono" placeholder="Numero de telefono" onblur="validate(4)" required> </div>
                            </div>
                            
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Puesto<span class="text-danger"> *</span></label> <input type="text" name="puesto" placeholder="Agregue el puesto de trabajo" onblur="validate(5)" required> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">NSS<span class="text-danger"> *</span></label> <input type="text" name="nss" placeholder="Numero de seguro social" onblur="validate(5)" required> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Fecha de nacimiento<span class="text-danger"> *</span></label> <input type="date" name="fechanacimiento" placeholder="Fecha de nacimiento" onblur="validate(5)" required> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Fecha de inicio de labores<span class="text-danger"> *</span></label> <input type="date" name="iniciolabores" placeholder="Fecha en la que inicio labores" onblur="validate(5)" required> </div>
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