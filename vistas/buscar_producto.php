<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>inventario</title>
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
    <br>
    <center>

    <?php 

        //Eliminacion de un registro
        $servidor = "localhost";
        $nombreusuario = "root";
        $password = "";
        $db = "soltech";
    
        $conect = new mysqli($servidor, $nombreusuario, $password, $db);
    
        if($conect->connect_error){
            die("Conexión fallida: " . $conect->connect_error);
        }
        //metodo de eliminar
        if(isset($_REQUEST['eliminar'])){
            
            $id = $_REQUEST['eliminar'];
            $sql = "DELETE FROM inventario WHERE id = $id";

            if($conect->query($sql) === true){
                ?>
                <script>
                    alert('El registro se ha eliminado');
                    window.location = "inventario.php";
                </script>
                <?php
            }else{
                die("Error al actualizar datos: " . $conect->error);
            }
        }
    ?>

    <?php
        $busqueda = strtolower( $_REQUEST['busqueda']);
        if(empty($busqueda)){
            header("location: inventario.php");
        }
    ?>
    
    <div class="container">
        <form id="BPForm" class="rounded-3 form_search" action="buscar_producto.php" method="get">
                <label>Registra producto:</label>
                <a href="forminventario.php"><button class="btn btn-primary" type="button"><i class="fas fa-seedling"></i></button></a>
                <input id="buspro" value="<?php echo $busqueda; ?>" type="text" name="busqueda" placeholder="Buscar producto" aria-label="Search" class="rounded-3">
                <button class="btn btn-success btn_search" type="submit" value="Buscar"><i class="fas fa-search"></i></button>
                <a href="inventario.php"><button class="btn btn-warning" type="button"><i class="fas fa-book-open"></i></button></a>
                <a href="../includes/pdf/pdfinventario.php"><button class="btn btn-info" type="button"><i class="fas fa-file-pdf"></i></button></a>
        </form>   

        <div class="mb-3"><br>
            <h4>Filtrar por categoría</h4>
        </div>
                
        <form id="BPForm" class="rounded-3">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    categorias
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </form>

        <div class="mb-3"><br>
            <h4>Invetario</h4>
        </div>

        <!--Inicia tabla-->
        <form id="BPForm" class="rounded-3">
            <div class="table-responsive">
                <table class="table" id="inv">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Código</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Medidas</th>
                            <th scope="col">$Mayoreo</th>
                            <th scope="col">$Bruto</th>
                            <th scope="col">$Neto</th>
                            <th scope="col">Existencias</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //Conexión con la base de datos
                        $conexion = mysqli_connect("localhost","root","","soltech");
                        if(mysqli_connect_errno()){
                            echo "Fallo en la conexión. ".mysqli_connect_error();
                        }

                        //Consulta a la base de datos
                        $sql_registe= ("SELECT * FROM inventario
                        WHERE (id LIKE '%$busqueda%' OR
                            codigoi LIKE '%$busqueda%' OR
                            descripcioni LIKE '%$busqueda%' OR
                            medidasi LIKE '%$busqueda%' OR
                            pmayoreoi LIKE '%$busqueda%' OR
                            pbrutoi LIKE '%$busqueda%' OR
                            pnetoi LIKE '%$busqueda%')OR
                            existenciasi LIKE '%$busqueda%' OR
                            proveedoresi LIKE '%$busqueda%' OR
                            categoriai LIKE '%$busqueda%'");
                                                    
                        $resultado = $conexion->query($sql_registe);

                        //Impresión de filas
                        while($row = $resultado->fetch_assoc()){?>
                            <tr>
                                <th> <?php echo $row['id']; ?></th>
                                <td> <?php echo $row['codigoi']; ?></td>
                                <td> <?php echo $row['descripcioni']; ?></td>
                                <td> <?php echo $row['medidasi']; ?></td>
                                <td>$<?php echo $row['pmayoreoi']; ?></td>
                                <td>$<?php echo $row['pbrutoi']; ?></td>
                                <td>$<?php echo $row['pnetoi']; ?></td>
                                <td> <?php echo $row['existenciasi']; ?></td>
                                <td> <?php echo $row['proveedoresi']; ?></td>
                                <td> <?php echo $row['categoriai']; ?></td>
                                <td><?php echo
                                    "<a href='forminventariomod.php?id=".$row['id']."'><button type='button' class='btn btn-warning'><i class='fas fa-edit'></i></button></a>" ?>
                                    <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="inventario.php">
                                    <button type="submit" name="eliminar" value="<?php echo $row['id']; ?>" class="btn btn-danger eliminar"><i class="fas fa-trash"></i></button></form>
                                </td>
                            </tr>
                    <?php } mysqli_free_result($resultado); ?>
                    </tbody>
                </table>
            </div>
        </form>
                
        <br>

        <script>
            function confirmation (e){
                if(confirm ("¿Estas seguro de eliminar este registro?")){
                    return true;
                }else{
                    e.preventDefault();
                }
            }

            let linkEliminar = document.querySelectorAll(".eliminar");

            for(var i = 0; i < linkEliminar.length; i++){
                linkEliminar[i].addEventListener('click', confirmation);
            }
        </script>
            
    <!--Finaliza tabla-->
    </div>
    </center>


    <!--Inicia Footer-->
    <br><br>
    <footer style="background-color: #7ad2ae;">
        <h3>© Todos los derechos reservados</h3>
    </footer>
    <!--Finaliza Footer-->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>