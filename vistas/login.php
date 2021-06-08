<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <!--Inicia Nabvar-->
    <nav class="navbar navbar-light" style="background-color: #7ad2ae;">
        <h1 id="textoinvisiblenav">Bienvendido a Soltech</h1>
    </nav>
    <center><img src="../img/logo-logo.png" id="banner"></center>
    <!--Finaliza Nabvar-->

    <!--Inicia Formulario-->
    <div class="container">
        <h1>Iniciar sesión</h1><br>
        <center>

        <?php
            include("../includes/prologin.php");
        ?>

        <form id="ISForm" class="rounded-3" method="POST">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="user" class="form-control" placeholder="Ingresa tu nombre de usuario" 
                id="user" name="usuario" value="<?php echo $usuario; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password"class="form-control" placeholder="Ingresa tu contraseña" 
                name="contrasena" value="<?php echo $password; ?>">
            </div>
            <button type="submit" class="btn btn-primary"  name="submit" value="login">Login</button>
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
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    </body>
    </html>