<?php
    //Creacion de consulta para llenar los campos correctamente
    $consulta = ConsultarProveedor($_GET['id']);

    function ConsultarProveedor($id_prov){

        //Conexión con la base de datos
    $conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){
        echo "Fallo en la conexión. ".mysqli_connect_error();
    }
        $sentencia="SELECT *FROM vendedores WHERE id='".$id_prov."'";
        $resultado= $conexion->query($sentencia);
        $row=mysqli_fetch_assoc($resultado);
        return [
            $row['id']
        ];
    }
?>

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
    <div class="container col-6 lg-6 md-5"><center>
    <br>
    <h4>Actualiza la contraseña</h4>
        
        <?php
            //Creacion devariables vacías para que se mantengan llenos los campos
            $conActual="";
            $nuevacon="";
            $confirmcon="";

            //Conexión con la base de datos
            $conexion = mysqli_connect("localhost","root","","soltech");
            if(mysqli_connect_errno()){
                echo "Fallo en la conexión. ".mysqli_connect_error();
            }
                //Entra al botón
                if(isset($_POST['editpass'])){
                    extract ($_POST);
                    //Se declara el id
                    $id = $_REQUEST['id'];

                    //Declaración de variables donde se almacene lo que viene en los inputs
                    $old_pwd=$_POST['conActual'];
                    $pwd=$_POST['nuevacon'];
                    $c_pwd=$_POST['confirmcon'];

                    //Confirma que no tengan menos de 8 caracteres
                    if(strlen($old_pwd)<8 && strlen($pwd)<8 && strlen($c_pwd)<8){
                        echo "<br><div class='alert alert-danger' role='alert'>
                                Los campos no pueden contener menos de 8 caracteres, ni estar vacíos.
                                </div>";
                    }else{
                        //Confirma que no estén vacíos los campos
                        if($old_pwd!="" && $pwd!="" && $c_pwd!="") :
                        //Confrima si la contraseña nueva y son cinfirmacion son las mimas
                        if($pwd == $c_pwd) :
                        //Confirma que la antigua contraseña y la nueva no sean iguales
                        if($pwd!=$old_pwd) :
                            //Consulta de contraseña por id
                            $sql=("SELECT contrasena FROM vendedores WHERE id='$id'");
                            $db_check=$conexion->query($sql);

                            //Verifica que la contraseña antigua coincida con lo que hay en la base de datos
                            if(password_verify($old_pwd,$db_check->fetch_assoc()['contrasena'])):
                                $new_pw = password_hash($c_pwd, PASSWORD_DEFAULT);
                                $fetch=$conexion->query("UPDATE `vendedores` SET `contrasena` = '$new_pw' WHERE `id`='$id'");
                                
                                echo "<br><div class='alert alert-success' role='alert'>
                                    ¡Contraseña actualizada!
                                    </div>";
                                    
                                $conActual="";
                                $nuevacon="";
                                $confirmcon="";
                        else:
                            echo "<br><div class='alert alert-danger' role='alert'>
                                La contraseña antigua es incorrecta.
                                </div>";
                        endif;
                        else :
                            echo "<br><div class='alert alert-danger' role='alert'>
                                La antigua contraseña y la nueva son las mismas.
                                </div>";
                        endif;
                        else:
                            echo "<br><div class='alert alert-danger' role='alert'>
                                La nueva contraseña y la confirmación de la misma no coinciden.
                                </div>";
                        endif;
                        else :
                            echo "<br><div class='alert alert-danger' role='alert'>
                                Los campos no pueden estar vacíos.
                                </div>";
                        endif;
                    }
                }
        ?>
        <br>
        <form method="POST" id="VForm" class="rounded-3">
            <input type="hidden" name="id" id="update_id" value="<?php echo $_GET['id'];?>">
            <label>Contraseña actual</label>
            <input type="password" placeholder="Escribe tu contraseña actual" name="conActual" class="form-control" value="<?php echo $conActual; ?>">
            <label>Nueva contraseña</label>
            <input type="password" placeholder="Ingresa la nueva contraseña" name="nuevacon" class="form-control" value="<?php echo $nuevacon; ?>">
            <label>Confirma la nueva contraseña</label>
            <input type="password" placeholder="Escribe nuevamente la nueva contraseña" name="confirmcon" class="form-control" value="<?php echo $confirmcon; ?>">
            <br>
            <button type="submit" class="btn btn-primary" name="editpass" value="editpass">Cambiar contraseña</button>
            <a href="vendedores.php"><button type="button" class="btn btn-warning">Cencelar</button></a>
        </form></center>
    </div>
</body>
</html>