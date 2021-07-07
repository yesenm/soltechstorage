<?php
    /*
    //Redirección
    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: login.php');
        }
    }*/
?>
<?php
    //Conexion con la base de datos
    $conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){echo "Fallo en la conexión. ".mysqli_connect_error();}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>ventas</title>
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
    
    <!--Inicia Formulario-->
    <div class="container">
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
            $sql = "DELETE FROM ventasregis WHERE invoice_id = $id";

            if($conect->query($sql) === true){
                echo "<br><div class='alert alert-success' role='alert'>
                        La venta se ha eliminado correctamente.
                    </div>";
            }else{
                die("Error al actualizar datos: " . $conect->error);
            }
        }
    ?>
    <br>
        <form id="BPForm" class="rounded-3 form_search" action="buscar_venta.php" method="get">
            <label>Registra una venta:</label>
            <a href="ventav.php"><button class="btn btn-primary" type="button"><i class="fas fa-cart-plus"></i></button></a>
            <input id="buspro" type="text" name="busqueda" placeholder="Buscar venta" aria-label="Search" class="rounded-3">
            <button class="btn btn-success btn_search" type="submit" value="Buscar"><i class="fas fa-search"></i></button>
            <a href="../includes/pdf/pdfventas.php"><button class="btn btn-info" type="button"><i class="fas fa-file-pdf"></i></button></a>
        </form>
                
        <div class="mb-3"><br>
            <h4>Ventas</h4>
        </div>

    </center>
    </div>

    <div class="container">
    <center>
        <br>
        <form id="inv" class="rounded-3">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:20px;">No</th>
                            <th style="width:150px;">Vendedor</th>
                            <th style="width:150px;">Cliente</th>
                            <th style="width:50px;">Fecha</th>
                            <th style="width:50px;">Monto</th>
                            <th style="width:50px;">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        //Consulta a la base de datos
                        $ventas= "SELECT * FROM ventasregis ORDER BY invoice_id DESC";
                        $resultado= $conexion->query($ventas);
                            //Impresión de filas
                            while($row = $resultado->fetch_assoc()){?>
                                <tr>
                                <th> <?php echo $no++; ?></th>
                                <td> <?php echo $row['cashier_name']; ?></td>
                                <td> <?php echo $row['cliente']; ?></td>
                                <td> <?php echo $row['order_date']; ?></td>
                                <td>$ <?php echo $row['total']; ?></td>
                                <td>
                                    <a href="../includes/pdf/pdffactura.php?id=<?php echo $row['invoice_id']; ?>" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print"></i></a>
                                    <?php if($_SESSION['rol_id']=="1"){ ?>
                                <form method="POST" id="form_eliminar_<?php echo $row['invoice_id']; ?>" action="ventasreg.php">
                                            <button type="submit" name="eliminar" value="<?php echo $row['invoice_id']; ?>" class="btn btn-danger btn-sm eliminar"><i class="fas fa-trash"></i></button>
                                           
                                <?php } ?>
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
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>