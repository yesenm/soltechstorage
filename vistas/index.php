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

    $usuario = $_SESSION["usuario_valido"];
    //echo $usuario;

    $conexion=mysqli_connect("localhost","root","","soltech");

    $instruccion= "select id_rol from vendedores where nameuser='$usuario'";

    $consulta = mysqli_query($conexion,$instruccion) or die
                ("Fallo en la consulta...");

        while($row=mysqli_fetch_array($consulta)){
            $prueba = $row['id_rol'];
                
            //echo $prueba;
        }

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