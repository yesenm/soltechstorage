<?php

include("admin_menu.php");
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
            $row['id'],
            $row['nameuser']
        ];
    }


?>

<!doctype html>
<html lang="es">
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
                    if(strlen($old_pwd)<8 || strlen($pwd)<8 || strlen($c_pwd)<8){
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
                            
                                ?>
                                <script>
                                    setTimeout(() => {
                                        window.location= "../admin/vendedores.php";
                                    }, 3000);
                                </script>
                                <?php
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
        <center>
            <label>Usuario:</label>
            <label style="color: blue;"><?php echo $consulta[1];?></label>
        </center>
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
<br><br>
    <!--Inicia Footer-->
<?php
    include("admin_footer.php");
    include("../../includes/pag_table.php")
?>
<!--Finaliza Footer-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>