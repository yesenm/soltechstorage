<?php
include("admin_menu.php");

    //Creacion de consulta para llenar los campos correctamente
    $consulta = ConsultarVendedor($_GET['id']);

    function ConsultarVendedor($id_vend){

        //Conexión con la base de datos
    $conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){
        echo "Fallo en la conexión. ".mysqli_connect_error();
    }
        $sentencia="SELECT * FROM vendedores WHERE id='".$id_vend."'";
        $resultado= $conexion->query($sentencia);
        $row=mysqli_fetch_assoc($resultado);
        return [
            $row['id'],
            $row['nombrev'],
            $row['telefonov'],
            $row['direccionv'],
            $row['correov'],
            $row['rfcv'],
            $row['nameuser'],
            $row['contrasena'],
            $row['id_rol']
        ];
    }
?>

<!DOCTYPE html>
<html lang="es">
<body>
    <div class="container">
    <center><br>
    <h4>Edita la información del usuario</h4>
        <?php
            include("../../includes/mod_usuarios.php");
        ?>
            <br>

        <form  id="PForm" class="rounded-3" method="POST" action="">            
			<fieldset>
                <div class="row">
                    <div class="col-md-4">
                        <input type="hidden" name="id" id="update_id" value="<?php echo $_GET['id'];?>">
                        <label>Nombre Completo:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escribe el nombre completo del usuario" name="nombrev" id="nombrev" value="<?php echo $consulta[1];?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Telefono:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Ingresa el teléfono del usuario" name="telefonov" id="telefonov" value="<?php echo $consulta[2];?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Dirección:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escribe la dirección del usuario" name="direccionv" id="direccionv" value="<?php echo $consulta[3];?>" />
                        </div>
                    </div>
                    <div class="col-md-4"><br>
                        <label>Correo:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Ingresa el email del usuario" name="correov" id="correov" value="<?php echo $consulta[4];?>" />
                        </div>
                    </div>
                    <div class="col-md-4"><br>
                        <label>RFC:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escribe el RFC del usuario" name="rfcv" id="rfcv" value="<?php echo $consulta[5];?>" />
                        </div>
                    </div>
                    <div class="col-md-4"><br>
                        <label>Nombre de usuario:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Ingresa el nombre de usuario (Con este podrá iniciar sesión)" name="nameuser" id="nameuser" value="<?php echo $consulta[6];?>" />
                            <input type="hidden" class="form-control" placeholder="Escribe la contraseña del usuario" name="contrasena" id="contrasena" value="<?php echo $consulta[7];?>" />
                        </div>
                    </div>
                    <div class="col-md-12"><br>
                        <label>Elige el rol del usuario:</label>
                        <div class="input-group">
                            <select name="id_rol" id="id_rol" class="form-control">
                                <option value="1" <?php if($consulta[8]==1){ ?> selected<?php } ?>>Administrador</option>
                                <option value="2" <?php if($consulta[8]==2){ ?> selected<?php } ?>>Vendedor</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12"><br>
                        <button type="submit" class="btn btn-primary" name="editarUsuario" value="editarUsuario">Editar usuario</button>
                        <a href="vendedores.php"><button type="button" class="btn btn-warning">Cancelar</button></a>
                    </div>
                </div>
            </fieldset>
		</form>
        <br>
</div>
</center>
            
    <!--Inicia Footer-->
<?php
    include("admin_footer.php");
?>
    <!--Finaliza Footer-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>