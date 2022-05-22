<?php 
    require_once "config.php";
    $id = $_GET["id"];
    
    $nombreViejo = $apellidosViejos = $emailViejo = $telefonoViejo = "";
    
    if ($result = mysqli_query($link, "SELECT * FROM `clientes` WHERE `clientes`.`id` = $id")) {
        $row = mysqli_fetch_array($result);
            $nombreViejo = $row['nombre'];
            $apellidosViejos = $row['apellidos'];
            $emailViejo = $row['email'];
            $telefonoViejo = $row['telefono'];
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
                alert("Cliente modificado exitosamente!");
            } 
        </script>


        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <div class="card">
                        <h5 class="text-center mb-4">Editar datos del cliente</h5>
                        <form class="form-card" action="updateCliente.php" method="post">
                            <div class="row justify-content-between text-left">
                                <input type="hidden" name="id" value=<?php echo $_GET["id"];?>
                                
                            <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">ID Asignado<span class="text-danger"> *</span></label> 
                                <label class="form-control-label px-4">
                                    <?php 
                                        echo $_GET["id"];
                                    ?>
                                </label> </div>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nombre(s)<span class="text-danger"> *</span></label> <input type="text" name="nombre" value=<?php echo $nombreViejo?> onblur="validate(1)" required> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Apellidos<span class="text-danger"> *</span></label> <input type="text" name="apellidos" value=<?php echo $apellidosViejos?> onblur="validate(2)" required> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Email <span class="text-danger"> *</span></label> <input type="text" name="email" value=<?php echo $emailViejo?> onblur="validate(1)" required> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Número de teléfono<span class="text-danger"> *</span></label> <input type="text" name="telefono" value=<?php echo $telefonoViejo?> onblur="validate(4)" required> </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">Continuar</button> </div>
                            </div>
                            <a  href="tablaClientes.php" class="ForgetPwd">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>