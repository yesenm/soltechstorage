<?php
    
    $servidor = "localhost";
    $nombreusuario = "root";
    $password = "";
    $db = "soltech";

    $conexion = new mysqli($servidor, $nombreusuario, $password, $db);

    if($conexion->connect_error){
        die("Conexión fallida: " . $conexion->connect_error);
    }

     //Creación de tabla de vendedores
     $sql = "CREATE TABLE vendedores(
        id INT(4) AUTO_INCREMENT PRIMARY KEY,
        nombrev VARCHAR(100) NOT NULL,
        telefonov VARCHAR (14) NOT NULL,
        direccionv VARCHAR (100) NOT NULL,
        correov VARCHAR (100) NOT NULL,
        rfcv VARCHAR (100) NOT NULL,
        nameuser VARCHAR (50) NOT NULL,
        contrasena VARCHAR (100) NOT NULL,
        id_rol INT (2)
    )";

    if($conexion->query($sql) === true){
        echo "La tabla se creó correctamente...";
    }else{
        die("Error al crear tabla: " . $conexion->error);
    }
?>