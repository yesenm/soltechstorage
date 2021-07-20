<?php
include("admin_menu.php");
?>
<!doctype html>
<html lang="es">
<body>
    <br>
    <!--Inicia Formulario-->
    <div class="container">
        <center>
        <h4>Agrega un nuevo vendedor o administrador</h4>
        <h6>Recuerda que estos usuarios podrán iniciar sesión</h6>

        <?php 
            include("../../includes/provendedores.php");
        ?>

        <br>
		<form  id="PForm" class="rounded-3" method="POST"
			action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<fieldset>
                <div class="row">
                    <div class="col-md-4">
                        <label>Nombre Completo:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nombre completo" name="nombrev" id="nombrev" value="<?php echo $nombrev;?>" />
                        </div>
                    </div>   
                    <div class="col-md-4">
                        <label>Telefono:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Télefono" name="telefonov" id="telefonov" value="<?php echo $telefonov;?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Dirección:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Dirección" name="direccionv" id="direccionv" value="<?php echo $direccionv;?>" />
                        </div>
                    </div>  
                    <div class="col-md-6"><br>
                        <label>Correo:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Correo electrónico" name="correov" id="correov" value="<?php echo $correov;?>" />
                        </div>
                    </div>  
                    <div class="col-md-6"><br>
                        <label>RFC:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="RFC" name="rfcv" id="rfcv" value="<?php echo $rfcv;?>" />
                        </div>
                    </div>  
                    <div class="col-md-6"><br>
                        <label>Nombre de usuario:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nombre de usuario (Con este podrá iniciar sesión)" name="nameuser" id="nameuser" value="<?php echo $nameuser;?>" />
                        </div>
                    </div>  
                    <div class="col-md-3"><br>
                        <label>Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" id="contrasena" value="<?php echo $pass_cifrado;?>" />
                        </div>
                    </div>  
                    <div class="col-md-3"><br>
                        <label>Rol del usuario:</label>
                        <div class="input-group">
                            <select class="form-control" name="id_rol" id="id_rol">
                            <option value="1" <?php if($id_rol == "1") echo "selected" ?> >Administrador</option>
                            <option value="2" <?php if($id_rol == "2") echo "selected" ?> >Vendedor</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-12"><br>
                        <button type="submit" class="btn btn-primary" name="enviar" value="Enviar datos">Registrar</button>
                        <a href="vendedores.php"><button class="btn btn-warning" type="button">Regresar a la lista de usuarios</button></a>
                    </div>
                </div>
            </fieldset>
		</form>
        </center>
        </div>
<!--Inicia Footer-->
<?php
    include("admin_footer.php");
?>
<!--Finaliza Footer-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>