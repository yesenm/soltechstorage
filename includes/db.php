  <?php

  //Conexión con base de datos
    $servidor = "localhost";
    $nombreusuario = "root";
    $password = "KYErmv2019";
    $db = "soltech";

    $conexion = new mysqli($servidor, $nombreusuario, $password, $db);

    if($conexion->connect_error){
        die("Conexión fallida: " . $conexion->connect_error);
    }

    /*
    //Creación de base de datos
    $sql = "CREATE DATABASE soltech";
    if($conexion->query($sql) === true){
        echo "Base de datos creada correctamente...";
    }else{
        die("Error al crear base de datos: " . $conexion->error);
    }
    */

    //Creación de tabla de roles
    $sql = "CREATE TABLE roles(
        id INT(2) AUTO_INCREMENT PRIMARY KEY,
        rol VARCHAR(50) NOT NULL
    )";

    if($conexion->query($sql) === true){
        echo "La tabla se creó correctamente...";
    }else{
        die("Error al crear tabla: " . $conexion->error);
    }

?>