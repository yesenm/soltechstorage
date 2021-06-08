<?php
    session_start();
  if(!$_SESSION["usuario_valido"]){

?>
    <script>
            alert('Inicia sesion para acceder a este sitio');
            window.location= 'login.php';
    </script>";
<?php
    exit();
  }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Index</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    session_start();
    $usuario = $_SESSION["usuario_valido"];
    echo $usuario;

    $conexion=mysqli_connect("localhost","root","","soltech");

    $instruccion= "select id_rol from vendedores where nameuser='$usuario'";

    $consulta = mysqli_query($conexion,$instruccion) or die
                ("Fallo en la consulta...");

        while($row=mysqli_fetch_array($consulta)){
            $prueba = $row['id_rol'];
                
            echo $prueba;
        }

?>

<?php

    if($prueba == 1){
?>
    <script>
            window.location= 'admin/admin.php';
    </script>"
<?php
    }else if ($prueba == 2){
?>
    <script>
            window.location= 'usuario/usuario.php';
    </script>"
<?php
    }
?>

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