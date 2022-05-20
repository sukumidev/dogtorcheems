<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'id18947108_usagianonimo');
define('DB_PASSWORD', 'BtJ@>vi4Eo0tsrgD');
define('DB_NAME', 'id18947108_dogtorcheems');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    echo "Conexión exitosa!";
}
?>