<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Formulario de gastos</title>
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
    
    <!--Inicia Formulario Gastos-Form -->
    <div class="container col-6 lg-6 md-5">
        <center>
            <br>
            <h4>Agrega un nuevo gasto</h4>
            <br>
            <form id="VForm" class="rounded-3">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Empleado</label>
                    <input type="text" class="form-control" placeholder="Ingresa el nombre del empleado">
                    
                    <div class="form-group">
                        <label for="formGroupExampleInput">Rubro</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Añade el rubro del empleado">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Fecha</label>
                        <input type="date" class="form-control" id="formGroupExampleInput" placeholder="Ingresa la fecha del gasto">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Proyecto</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingresa el nombre del proyecto">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Concepto cantidad</label>
                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Ingresa la cantidad gastada">
                    </div>
                    <center>
                        <a href="gastos.php"><button type="button" class="btn btn-primary">Agregar gasto</button></a>
                    </center>
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