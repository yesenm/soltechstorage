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
    <div class="container">
        <center>
            <!--Inicia Formulario-->
            <h4>Agrega un nuevo producto</h4>
                <?php 
                include("../includes/insinventario.php");
                ?>
            <br>
            
            <form id="PForm" class="rounded-3" method="POST"
			action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label>Código del producto</label>
                    <input id="codigoi" type="text" class="form-control" name="codigoi" value="<?php echo $codigoi; ?>" placeholder="Ingresa la descripcion del producto">
                    <label>Descripción</label>
                    <input id="descripcioni" type="text" class="form-control" name="descripcioni" value="<?php echo $descripcioni; ?>" placeholder="Escribe la descripción del producto">
                
                    <label>Medidas</label>
                    <input id="medidasi" type="text" class="form-control" name="medidasi" value="<?php echo $medidasi; ?>" placeholder="Ingresa las medidas del producto">
                
                    <label>Precio por mayreo</label>
                    <input id="pmayoreoi" type="number" class="form-control" name="pmayoreoi" value="<?php echo $pmayoreoi; ?>" placeholder="Escribe el precio por mayoreo">
                
                    <label>Precio bruto</label>
                    <input id="pbrutoi" type="number" class="form-control" name="pbrutoi" value="<?php echo $pbrutoi; ?>" placeholder="Escribe el precio bruto">
                
                    <label>Precio neto</label>
                    <input id="pnetoi" type="number" class="form-control" name="pnetoi" value="<?php echo $pnetoi; ?>" placeholder="Ingresa el precio neto">
                
                    <label>Existencias</label>
                    <input id="pexistenciasi" type="number" class="form-control" name="existenciasi" value="<?php echo $existenciasi; ?>" placeholder="Ingresa la cantidad de existencias">
                    
                    <div id="proveedores">
                        <label>Elige el proveedor</label>
                        <select class="form-select" name="proveedoresi" id="proveedoresi">
                        
                        <?php
                            //Conexión con la base de datos
                            $conexion = mysqli_connect("localhost","root","","soltech");
                            if(mysqli_connect_errno()){
                                echo "Fallo en la conexión. ".mysqli_connect_error();
                            }

                            //Consulta
                            $consulta ="SELECT * FROM proveedores";
                            $ejecutar = mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));
                        ?>
                        <?php foreach ($ejecutar as $opciones):?>
                        
                        <option value="<?php echo $opciones['nombrep']; ?>"><?php echo $opciones['nombrep']; ?></option>
                        
                        <?php endforeach ?>

                            
                        </select>
                    </div>

                    <label class="form-label">Elige la categoría a la que pertenece el producto</label>
                    <select class="form-select" name="categoriai" id="categoriai">
                        <option value="Accesorios" <?php if($categoriai == 'Accesorios') echo "selected"; ?>>Accesorios</option>
                        <option value="Aspersores" <?php if($categoriai == "Aspersores") echo "selected"; ?>>Aspersores</option>
                        <option value="CED. 40" <?php if($categoriai == "CED. 40") echo "selected"; ?>>CED. 40</option>
                        <option value="CED. 80" <?php if($categoriai == "CED. 80") echo "selected"; ?>>CED. 80</option>
                        <option value="Compuerta" <?php if($categoriai == "Compuerta") echo "selected"; ?>>Compuerta</option>
                        <option value="Conex. Aluminio" <?php if($categoriai == "Conex. Aluminio") echo "selected"; ?>>Conex. Aluminio</option>
                        <option value="Conex. Regantes" <?php if($categoriai == "Conex. Regantes") echo "selected"; ?>>Conex. Regantes</option>
                        <option value="Combustibles" <?php if($categoriai == "Combustibles") echo "selected"; ?>>Combustibles</option>
                        <option value="Fertiriego" <?php if($categoriai == "Fertiriego") echo "selected"; ?>>Fertiriego</option>
                        <option value="Filtración" <?php if($categoriai == "Filtración") echo "selected"; ?>>Filtración</option>
                        <option value="Galvanizados" <?php if($categoriai == "Galvanizados") echo "selected"; ?>>Galvanizados</option>
                        <option value="Geomembrana" <?php if($categoriai == "Geomembrana") echo "selected"; ?>>Geomembrana</option>
                        <option value="Medidores" <?php if($categoriai == "Medidores") echo "selected"; ?>>Medidores</option>
                        <option value="Micro y Goteo" <?php if($categoriai == "Micro y Goteo") echo "selected"; ?>>Micro y Goteo</option>
                        <option value="Paneles" <?php if($categoriai == "Paneles") echo "selected"; ?>>Paneles</option>
                        <option value="Pzas Taller" <?php if($categoriai == "Pzas Taller") echo "selected"; ?>>Pzas Taller</option>
                        <option value="Equipos Mecanizados" <?php if($categoriai == "Equipos Mecanizados") echo "selected"; ?>>Equipos Mecanizados</option>
                        <option value="PEBD" <?php if($categoriai == "PEBD") echo "selected"; ?>>PEBD</option>
                        <option value="Bombeo" <?php if($categoriai == "Bombeo") echo "selected"; ?>>Bombeo</option>
                        <option value="Tuberías" <?php if($categoriai == "Tuberías") echo "selected"; ?>>Tuberías</option>
                        <option value="LAY FLAT" <?php if($categoriai == "LAY FLAT") echo "selected"; ?>>LAY FLAT</option>
                        <option value="Válvulas" <?php if($categoriai == "Válvulas") echo "selected"; ?>>Válvulas</option>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary" name="agregarproducto" value="agregarproducto">Agregar Producto</button>
                    <a href="inventario.php"><button type="button" class="btn btn-warning">Ir a inventario</button></a>
            </form>
        </center>
    </div>
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