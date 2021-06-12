<?php
    
    $servidor = "localhost";
    $nombreusuario = "root";
    $password = "";
    $db = "soltech";

    $conexion = new mysqli($servidor, $nombreusuario, $password, $db);

    if($conexion->connect_error){
        die("Conexión fallida: " . $conexion->connect_error);
    }

    /*
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
    }*/

    /*
    //Creación  de tabla para clientes a credito
    $sql = "CREATE TABLE clientescr(
        id INT(4) AUTO_INCREMENT PRIMARY KEY,
        nombrecr VARCHAR(100) NOT NULL,
        telefonocr VARCHAR (14) NOT NULL,
        direccioncr VARCHAR (100) NOT NULL,
        correocr VARCHAR (100) NOT NULL,
        rfccr VARCHAR (100) NOT NULL,
        cantidadcr VARCHAR (11) NOT NULL,
        restantecr INT (11) NOT NULL,
        fechaprcr TIMESTAMP NOT NULL,
        fechalicr VARCHAR (100) NOT NULL
    )";

    if($conexion->query($sql) === true){
        echo "La tabla se creó correctamente...";
    }else{
        die("Error al crear tabla: " . $conexion->error);
    }*/
    /*
    //Creación de tabla gastos
    $sql = "CREATE TABLE gastos(
        id INT(4) AUTO_INCREMENT PRIMARY KEY,
        empleado VARCHAR(100) NOT NULL,
        rubro VARCHAR (100) NOT NULL,
        fecha VARCHAR (100) NOT NULL,
        proyecto VARCHAR (100) NOT NULL,
        cantidad INT (11) NOT NULL
    )";

    if($conexion->query($sql) === true){
        echo "La tabla se creó correctamente...";
    }else{
        die("Error al crear tabla: " . $conexion->error);
    }
    */

    /*
    //Creación de la tabla proveedores
    $sql = "CREATE TABLE proveedores(
        id INT(4) AUTO_INCREMENT PRIMARY KEY,
        nombrep VARCHAR(100) NOT NULL,
        telefonop VARCHAR (14) NOT NULL,
        direccionp VARCHAR (100) NOT NULL,
        correop VARCHAR (100) NOT NULL,
        rfcp VARCHAR (100) NOT NULL,
        productosp VARCHAR (100) NOT NULL,
        empresap VARCHAR (100) NOT NULL
    )";

    if($conexion->query($sql) === true){
        echo "La tabla se creó correctamente...";
    }else{
        die("Error al crear tabla: " . $conexion->error);
    }*/

    //Creación de la tabla Clientes potenciales
    $sql = "CREATE TABLE clientespo(
        id INT(4) AUTO_INCREMENT PRIMARY KEY,
        nombrepo VARCHAR(100) NOT NULL,
        telefonopo VARCHAR (14) NOT NULL,
        direccionpo VARCHAR (100) NOT NULL,
        correopo VARCHAR (100) NOT NULL,
        rfcpo VARCHAR (100) NOT NULL,
        cantidadpo INT (11) NOT NULL
    )";

    if($conexion->query($sql) === true){
        echo "LA TABLA SE CREÓ CORRECTAMENTE";
    }else{
        die("ERROR AL CREAR TABLA: " . $conexion->error);
    }
?>