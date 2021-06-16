<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Proovedores</title>
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
    
    <!--Inicia Formulario-->
    <div class="container">
        <center>
            <h4>Agrega un nuevo proveedor</h4>

            <?php
            //Insertar un registro
                include("../includes/proproveedores.php");

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
                $sql = "DELETE FROM proveedores WHERE id = $id";

                if($conect->query($sql) === true){
                    echo "<br><div class='alert alert-success' role='alert'>
                            El registro se ha eliminado correctamente.
                        </div>";
                }else{
                    die("Error al actualizar datos: " . $conect->error);
                }
            }
            ?>
            <br>
            <form id="PForm" class="rounded-3" method="POST"
			action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <fieldset>
                <label>Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre" name="nombrep" id="nombrep" value="<?php echo $nombrep;?>" class="rounded-3"/><br>
                <label>Teléfono</label>
                <input type="text" class="form-control" placeholder="Teléfono" name="telefonop" id="telefonop" value="<?php echo $telefonop;?>" class="rounded-3"/><br>
                <label>Dirección</label>
                <input type="text" class="form-control" placeholder="Dirección" name="direccionp" id="direccionp" value="<?php echo $direccionp;?>" class="rounded-3"/><br>
                <label>Correo</label>
                <input type="text" class="form-control" placeholder="Correo" name="correop" id="correop" value="<?php echo $correop;?>" class="rounded-3"/><br>
                <label>RFC</label>
                <input type="text" class="form-control" placeholder="RFC" name="rfcp" id="rfcp" value="<?php echo $rfcp;?>" class="rounded-3"/><br>
                <label>Productos</label>
                <input type="text" class="form-control" placeholder="Productos proveídos" name="productosp" id="productosp" value="<?php echo $productosp;?>" class="rounded-3"/><br>
                <label>Empresa</label>
                <input type="text" class="form-control" placeholder="Empresa" name="empresap" id="empresap" value="<?php echo $empresap;?>" class="rounded-3"/><br>
                <button type="submit" class="btn btn-primary" name="enviar" value="Enviar datos">Agregar proveedor</button>
                </fieldset>
            </form>
            
            
            <div class="mb-3"><br>
                <h4>Busca proveedor</h4>
            </div>
            
            <form id="BPForm" class="rounded-3">
                <input id="buspro" type="search" placeholder="Buscar proveedor" aria-label="Search">
                <button class="btn btn-success" type="submit">Buscar</button>
            </form>
            
            <div class="mb-3"><br>
                <h4>Proveedores</h4>
            </div>
            
            <form id="BPForm" class="rounded-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Correo</th>
                                <th scope="col">RFC</th>
                                <th scope="col">Productos</th>
                                <th scope="col">Empresa</th>
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
                                $usuarios= "SELECT * FROM proveedores";
                                $resultado= $conexion->query($usuarios);

                                //Impresión de filas
                                    while($row = $resultado->fetch_assoc()){?>
                                    <tr>
                                        <th> <?php echo $row['id']; ?></th>
                                        <td> <?php echo $row['nombrep']; ?></td>
                                        <td> <?php echo $row['telefonop']; ?></td>
                                        <td> <?php echo $row['direccionp']; ?></td>
                                        <td> <?php echo $row['correop']; ?></td>
                                        <td> <?php echo $row['rfcp']; ?></td>
                                        <td> <?php echo $row['productosp']; ?></td>
                                        <td> <?php echo $row['empresap']; ?></td>
                                        <td> <?php echo
                                            "<a href='formprovmod.php?id=".$row['id']."'><button type='button' class='btn btn-warning'><i class='fas fa-edit'></i></button></a>" ?>
                                            <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="proveedores.php">
                                            <button type="submit" name="eliminar" value="<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                        </td>
                                    </tr>
                            <?php } mysqli_free_result($resultado); ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

    </center>
    
    <!--Finaliza Formulario-->
    
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