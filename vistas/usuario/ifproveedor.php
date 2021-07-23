<?php include("usuario_menu.php"); ?>
<!doctype html>
<html lang="es">
<body>
    <br>
    <!--Inicia Formulario-->
    <div class="container">
        <center>
            <h4>Agrega un nuevo proveedor</h4>

            <?php
            //Insertar un registro
                include("../../includes/proproveedores.php");
            ?>
            <br>
            <form id="PForm" class="rounded-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <fieldset>
                <div class="row">
                    <div class="col-md-5">
                        <label>Nombre</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombrep" id="nombrep" value="<?php echo $nombrep;?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label>Teléfono</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Teléfono" name="telefonop" id="telefonop" value="<?php echo $telefonop;?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label>Dirección</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Dirección" name="direccionp" id="direccionp" value="<?php echo $direccionp;?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Correo</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Correo" name="correop" id="correop" value="<?php echo $correop;?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>RFC</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="RFC" name="rfcp" id="rfcp" value="<?php echo $rfcp;?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Productos</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Productos proveídos" name="productosp" id="productosp" value="<?php echo $productosp;?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Empresa</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Empresa" name="empresap" id="empresap" value="<?php echo $empresap;?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-12"><br>
                        <button type="submit" class="btn btn-primary" name="enviar" value="Enviar datos">Agregar proveedor</button>
                        <a href="proveedores.php"><button type="button" class="btn btn-warning">Ir a proveedores</button></a>
                    </div>
                </div>
                </fieldset>
            </form>
        </center><br>
    </div>
    
    <!--Finaliza Formulario-->
    
    <!--Inicia Footer-->
<?php
    include("usuario_footer.php");
?>
    <!--Finaliza Footer-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>