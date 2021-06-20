<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Usuarios</title>
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
        <h4>Agrega un nuevo vendedor o administrador</h4>
        <h6>Recuerda que estos usuarios podrán iniciar sesión</h6>

        <?php 
            include("../includes/provendedores.php");

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
                $sql = "DELETE FROM vendedores WHERE id = $id";

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
		<form  id="PForm" class="rounded-3" method="POST"
			action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            
			<fieldset>
				<label>Nombre Completo:</label>
				<input type="text" class="form-control" placeholder="Escribe el nombre completo del usuario" name="nombrev" id="nombrev" value="<?php echo $nombrev;?>" /><br/>
				<label>Telefono:</label>
				<input type="text" class="form-control" placeholder="Ingresa el teléfono del usuario" name="telefonov" id="telefonov" value="<?php echo $telefonov;?>" /><br/>
				<label>Dirección:</label>
				<input type="text" class="form-control" placeholder="Escribe la dirección del usuario" name="direccionv" id="direccionv" value="<?php echo $direccionv;?>" /><br/>
				<label>Correo:</label>
				<input type="text" class="form-control" placeholder="Ingresa el email del usuario" name="correov" id="correov" value="<?php echo $correov;?>" /><br/>
                <label>RFC:</label>
				<input type="text" class="form-control" placeholder="Escribe el RFC del usuario" name="rfcv" id="rfcv" value="<?php echo $rfcv;?>" /><br/>
                <label>Nombre de usuario:</label>
				<input type="text" class="form-control" placeholder="Ingresa el nombre de usuario (Con este podrá iniciar sesión)" name="nameuser" id="nameuser" value="<?php echo $nameuser;?>" /><br/>
				<label>Password:</label>
				<input type="password" class="form-control" placeholder="Escribe la contraseña del usuario" name="contrasena" id="contrasena" value="<?php echo $pass_cifrado;?>" /><br/>
                <label>Elige un rol para el usuario:</label>
                <select class="form-control" name="id_rol" id="id_rol">
                    <option value="1" <?php if($id_rol == "1") echo "selected" ?> >Administrador</option>
                    <option value="2" <?php if($id_rol == "2") echo "selected" ?> >Vendedor</option>
                </select><br>
                <button type="submit" class="btn btn-primary" name="enviar" value="Enviar datos">Registrar</button>
			</fieldset>
		</form>
		

<div class="mb-3"><br>
    <h4>Busca vendedor</h4>
    </div>

    <form id="BPForm" class="rounded-3">
        <input id="buspro" type="search" placeholder="Buscar vendedor" aria-label="Search">
        <button class="btn btn-success" type="submit">Buscar</button>
    </form>

    <div class="mb-3"><br>
        <h4>Vendedores</h4>
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
                            <th scope="col">Usuario</th>
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
                                $usuarios= "SELECT * FROM vendedores";
                                $resultado= $conexion->query($usuarios);

                                //Impresión de filas
                                    while($row = $resultado->fetch_assoc()){?>
                                        <tr>
                                        <th> <?php echo $row['id']; ?></th>
                                        <td> <?php echo $row['nombrev']; ?></td>
                                        <td> <?php echo $row['telefonov']; ?></td>
                                        <td> <?php echo $row['direccionv']; ?></td>
                                        <td> <?php echo $row['correov']; ?></td>
                                        <td> <?php echo $row['rfcv']; ?></td>
                                        <td> <?php echo $row['nameuser']; ?></td>
                                        <td> <?php echo
                                            "<a href='formvenmod.php?id=".$row['id']."'><button type='button' class='btn btn-warning'><i class='fas fa-edit'></i></button></a>";
                                            echo "<a href='cambiarpassword.php?id=".$row['id']."'><button type='button' class='btn btn-info'><i class='fas fa-key'></i></button></a>";
                                            ?>
                                            <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="vendedores.php">
                                            <button type="submit" name="eliminar" value="<?php echo $row['id']; ?>" class="btn btn-danger eliminar"><i class="fas fa-trash"></i></button>
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