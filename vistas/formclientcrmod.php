<?php

    //Creacion de consulta para llenar los campos correctamente
    $consulta = ConsultarCliente($_GET['id']);

    function ConsultarCliente($id_prov){

        //Conexión con la base de datos
    $conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){
        echo "Fallo en la conexión. ".mysqli_connect_error();
    }
        $sentencia="SELECT * FROM clientescr WHERE id='".$id_prov."'";
        $resultado= $conexion->query($sentencia);
        $row=mysqli_fetch_assoc($resultado);
        return [
            $row['id'],
            $row['nombrecr'],
            $row['telefonocr'],
            $row['direccioncr'],
            $row['correocr'],
            $row['rfccr'],
            $row['cantidadcr'],
            $row['restantecr'],
            $row['fechalicr']
        ];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Edicion de clientes</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

     <!--Inicia Nabvar-->
     <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #7ad2ae;">
        
        <div class="container-fluid">
            <a href=""><img src="../img/logooooo.png" id="logo"></a>
            <div class="container col-6"></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ventas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #7ad2ae;">
                            <li><a class="dropdown-item" href="ventas.php">Ventas</a></li>
                            <li><a class="dropdown-item" href="ventasreg.php">Ventas registradas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gastos.php">Gastos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inventario.php">Inventario</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Usuarios
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #7ad2ae;">
                            <li><a class="dropdown-item" href="clientescr.php">Clientes a crédito</a></li>
                            <li><a class="dropdown-item" href="clientespo.php">Clientes Potenciales</a></li>
                            <li><a class="dropdown-item" href="proveedores.php">Proveedores</a></li>
                            <li><a class="dropdown-item" href="vendedores.php">Vendedores</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Opciones
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #7ad2ae;">
                            <li><a class="dropdown-item" href="habilitar.php">Habilitar permisos</a></li>
                            <li><a class="dropdown-item" href="login.php">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Finaliza Nabvar-->
<div class="container">
    <center><br>
    <h4>Edita la información del cliente</h4>
        <?php
            include("../includes/mod_clientescr.php");
        ?>
        
            <br>

    <form id="PForm" class="rounded-3" method="POST"
		action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <fieldset>
                <input type="hidden" name="id" id="update_id" value="<?php echo $_GET['id'];?>">
                <label>Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre" name="nombrecr" id="nombrecr" value="<?php echo $consulta[1];?>" class="rounded-3"/><br>
                <label>Teléfono</label>
                <input type="text" class="form-control" placeholder="Teléfono" name="telefonocr" id="telefonocr" value="<?php echo $consulta[2];?>" class="rounded-3"/><br>
                <label>Dirección</label>
                <input type="text" class="form-control" placeholder="Dirección" name="direccioncr" id="direccioncr" value="<?php echo $consulta[3];?>" class="rounded-3"/><br>
                <label>Correo</label>
                <input type="text" class="form-control" placeholder="Correo" name="correocr" id="correocr" value="<?php echo $consulta[4];?>" class="rounded-3"/><br>
                <label>RFC</label>
                <input type="text" class="form-control" placeholder="RFC" name="rfccr" id="rfccr" value="<?php echo $consulta[5];?>" class="rounded-3"/><br>
                <label>Cantidad de crédito</label>
                <input type="text" class="form-control" placeholder="Cantidad de crédito" name="cantidadcr" id="cantidadcr" value="<?php echo $consulta[6];?>" class="rounded-3"/><br>
                <label>Cantidad de restante</label>
                <input type="text" class="form-control" placeholder="Cantidad restante" name="restantecr" id="restantecr" value="<?php echo $consulta[7];?>" class="rounded-3"/><br>
                <label>Fecha límite</label>
                <input type="date" class="form-control" name="fechalicr" id="fechalicr" value="<?php echo $consulta[8];?>" class="rounded-3"/><br>
                <button type="submit" class="btn btn-primary" name="editarclientcr" value="editarclientcr">Editar cliente</button>
            </fieldset>
    </form>
</div>
</center>
            
            <!--Inicia Footer-->
    <br><br>
    <footer style="background-color: #7ad2ae;">
        <h3>© Todos los derechos reservados</h3>
    </footer>
    <!--Finaliza Footer-->

</body>
</html>