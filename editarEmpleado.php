<?php 
    require_once "config.php";
    $empleado_id = $_GET["id"];
    
    $usernameViejo = $passwordViejo = $nombreViejo = $apellidosViejos = $permisosViejos = $telefonoViejo = $puestoViejo = $nssViejo = $fechanacimientoVieja = $iniciolaboresViejo = "";
    
    if ($result = mysqli_query($link, "SELECT * FROM `empleados` WHERE `empleados`.`ID_empleado` = $empleado_id")) {
        $row = mysqli_fetch_array($result);
        $usernameViejo = $row['username'];
        $passwordViejo = $row['password'];
        $nombreViejo = $row['nombre'];
        $apellidosViejos = $row['apellidos'];
        $puestoViejo = $row['puesto'];
        $permisosViejos = $row['permisos'];
        $telefonoViejo = $row['telefono'];
        $nssViejo = $row['nss'];
        $fechanacimientoVieja = $row['fechanacimiento'];
        $iniciolaboresViejo = $row['iniciolabores'];
    }
    mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <title>Editar datos</title>
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
                alert("Empleado modificado exitosamente!");
            } 
        </script>


        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <div class="card">
                        <h5 class="text-center mb-4">Editar datos del empleado</h5>
                        <form class="form-card" action="updateEmpleado.php" method="post">
                            <div class="row justify-content-between text-left">
                                <input type="hidden" name="id_empleado" value=<?php echo $_GET["id"];?>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">ID Asignado<span class="text-danger"> *</span></label> 
                                <label class="form-control-label px-4">
                                    <?php 
                                        echo $_GET["id"];
                                    ?>
                                </label> </div>
                                </div>
                            <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Username <span class="text-danger"> *</span></label> <input type="text" name="username" value=<?php echo $usernameViejo?> onblur="validate(1)" required> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Agregar contraseña<span class="text-danger"> *</span></label> <input type="text" name="password" value=<?php echo $passwordViejo?> onblur="validate(4)" required> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nombre(s)<span class="text-danger"> *</span></label> <input type="text" name="nombre" value=<?php echo $nombreViejo?> onblur="validate(1)" required> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Apellidos<span class="text-danger"> *</span></label> <input type="text" name="apellidos" value=<?php echo $apellidosViejos?> onblur="validate(2)" required> </div>
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
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Número de teléfono<span class="text-danger"> *</span></label> <input type="text" name="telefono" value=<?php echo $telefonoViejo?> onblur="validate(4)" required> </div>
                            </div>
                            
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Puesto<span class="text-danger"> *</span></label> <input type="text" name="puesto" value=<?php echo $puestoViejo?> onblur="validate(5)" required> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">NSS<span class="text-danger"> *</span></label> <input type="text" name="nss" value=<?php echo $nssViejo?> onblur="validate(5)" required> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Fecha de nacimiento<span class="text-danger"> *</span></label> <input type="date" name="fechanacimiento" value=<?php echo $fechanacimientoVieja?> onblur="validate(5)" required> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Fecha de inicio de labores<span class="text-danger"> *</span></label> <input type="date" name="iniciolabores" value=<?php echo $iniciolaboresViejo?> onblur="validate(5)" required> </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">Continuar</button> </div>
                            </div>
                            <a  href="tablaEmpleados.php" class="ForgetPwd">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>