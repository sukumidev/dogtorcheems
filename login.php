<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','id18947108_usagianonimo','BtJ@>vi4Eo0tsrgD','id18947108_dogtorcheems') 
        or die('No se pudo conectar');
        $result = mysqli_query($con,"SELECT * FROM login_empleados WHERE username='" . $_POST["username"] . "' and password = '". $_POST["pass"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["username"] = $row['username'];
        } else {
         $message = "Contraseña o username inválido!";
        }
    }
    if(isset($_SESSION["id"])) {
    header("Location:index.php");
    }
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet">
<meta charset="utf-8">

<!------ Include the above in your HEAD tag ---------->
<h1><a href="index.html"><img src="img/DogtorCheemsLogo2.png" width="300" ></a></h1>
<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Inicio de sesion para clientes</h3>
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Tu correo electrónico*" value="" name="email"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Contraseña*" value="" name="pass" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Ingresar" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="form-group">
                            <a href="registroCliente.html" class="ForgetPwd">Crear cuenta</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Inicio de sesión para el personal</h3>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tu username de empleado*" value="" name="username" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Contraseña*" value="" name="pass"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Ingresar" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">¿Olvidaste tu contraseña?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
        