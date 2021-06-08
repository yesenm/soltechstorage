<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>inventario formulario</title>
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
    <div class="container"><center>
        <!--Inicia Formulario-->
        <div class="container">
            <h4>Agrega un producto</h4>
            
            <form id="PForm" class="rounded-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Código del producto</label>
                    <input type="text" class="form-control" id="name" placeholder="Ingresa el código del producto">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="description" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Precio por mayreo</label>
                    <input type="number" class="form-control" id="code" placeholder="Ingresa el precio por mayoreo">
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">IVA</label>
                    <input type="number" class="form-control" id="code" placeholder="Ingresa el IVA">
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Precio bruto</label>
                    <input type="number" class="form-control" id="code" placeholder="Ingresa el precio bruto">
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Precio a la venta</label>
                    <input type="number" class="form-control" id="code" placeholder="Ingresa el precio a la venta">
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Existencias</label>
                    <input type="number" class="form-control" id="amount" placeholder="Ingresa la cantidad de existencias">
                </div>
                <div class="mb-3">
                    <label for="supplier" class="form-label">Proveedor</label>
                    <select class="form-select">
                        <option>ELIGE EL PROVEEDOR</option>
                        <option>EDUARDO</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoria</label>
                    <select class="form-select">
                        <option>ELIGE LA CATEGORÍA A LA QUE PERTENECE EL PRODUCTO</option>
                        <option>ACCESORIOS</option>
                        <option>ASPERSORES</option>
                        <option>CED. 40</option>
                        <option>CED. 80</option>
                        <option>COMPUERTA</option>
                        <option>CONEX.ALUMINIO</option>
                        <option>CONEX.REGANTES</option>
                        <option>CONSUMIBLES</option>
                        <option>FERTIRIEGO</option>
                        <option>FILTRACIO</option>
                        <option>GALVANIZADOS</option>
                        <option>GEOMEMBRANA</option>
                        <option>MEDIDORES</option>
                        <option>MICRO Y GOTEO</option>
                        <option>PANELES</option>
                        <option>PZAS TALLER</option>
                        <option>EQUIPOS MECANIZADOS</option>
                        <option>PEBD</option>
                        <option>BOMBEO</option>
                        <option>TUBERIAS</option>
                        <option>LAY FLAT</option>
                        <option>VALVULAS</option>
                    </select>
                </div>
                
                <div class="d-grid gap-2">
                    <a href="inventario.php"><button class="btn btn-primary" type="button">Agregar</button></a>
                </div>
            </form>
        </div>
        <!--Finaliza Formulario-->
    </div></center>
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