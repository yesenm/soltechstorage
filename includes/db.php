  <?php

  //Conexión con base de datos
    $servidor = "localhost";
    $nombreusuario = "root";
    $password = "";
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
    /*
    //Creación de tabla de roles
    $sql = "CREATE TABLE roles(
        id INT(2) AUTO_INCREMENT PRIMARY KEY,
        rol VARCHAR(50) NOT NULL
    )";

    if($conexion->query($sql) === true){
        echo "La tabla se creó correctamente...";
    }else{
        die("Error al crear tabla: " . $conexion->error);
    }*/
/*
    //CReacion de la tabla inventario
    $sql = "CREATE TABLE inventario(
        id INT(3) AUTO_INCREMENT PRIMARY KEY,
        codigoi VARCHAR (20) NOT NULL,
        descripcioni VARCHAR (150) NOT NULL,
        medidasi VARCHAR (100) NOT NULL,
        pmayoreoi INT (5) NOT NULL,
        pbrutoi INT(5) NOT NULL,
        pnetoi INT (5) NOT NULL,
        existenciasi INT (5) NOT NULL,
        proveedoresi VARCHAR (100) NOT NULL,
        categoriai VARCHAR (100) NOT NULL
    )";

    $sql= "CREATE TABLE `ventasregis` (
        `invoice_id` int(11) AUTO_INCREMENT PRIMARY KEY,
        `cashier_name` varchar(100) NOT NULL,
        `order_date` date NOT NULL,
        `time_order` varchar(50) NOT NULL,
        `total` float NOT NULL,
        `paid` float NOT NULL,
        `due` float NOT NULL,
        `cliente` varchar(100) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1";*/

      //Tabla de facturas
      $sql= "CREATE TABLE `factura` (
        `id` int(11) AUTO_INCREMENT PRIMARY KEY,
        `invoice_id` int(11) NOT NULL,
        `product_id` int(11) NOT NULL,
        `product_code` char(6) NOT NULL,
        `product_description` varchar(100) NOT NULL,
        `cantidad` int(11) NOT NULL,
        `iva` int(11) NOT NULL,
        `precio` float NOT NULL,
        `total` float NOT NULL,
        `order_date` date NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

    if($conexion->query($sql) === true){
        echo "La tabla se creó correctamente...";
    }else{
        die("Error al crear tabla: " . $conexion->error);
    }

?>