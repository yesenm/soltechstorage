<?php
include("usuario_menu.php");
?>
<!doctype html>
<html lang="es">
<body>
    
    <br>
    
    <!--Inicia Formulario-->
    <div class="container">
        <center>
        <h4>Agrega un nuevo cliente a crédito</h4>
        <?php 
            include("../../includes/proclientescr.php");
        ?>
        <br>
            <form id="PForm" class="rounded-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="row">
                    <div class="col-md-5">
                        <label>Nombre</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nombre" class="rounded-3" name="nombrecr" value="<?php echo $nombrecr;?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label>Teléfono</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Teléfono" class="rounded-3" name="telefonocr" value="<?php echo $telefonocr;?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label>Dirección</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Dirección" class="rounded-3" name="direccioncr" value="<?php echo $direccioncr;?>">
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Correo</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Correo" class="rounded-3" name="correocr" value="<?php echo $correocr;?>">
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>RFC</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="RFC" class="rounded-3" name="rfccr" value="<?php echo $rfccr;?>">
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Cantidad de crédito</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cantidad de crédito" class="rounded-3" name="cantidadcr" value="<?php echo $cantidadcr;?>">
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Fecha límite</label>
                        <div class="input-group">
                            <input type="date" class="form-control" class="rounded-3" name="fechalicr" value="<?php echo $fechalicr;?>">
                        </div>
                    </div>
                    <div class="col-md-12"><br>
                        <button type="submit" class="btn btn-primary" name="registrar" value="Registrar datos">Agregar cliente a crédito</button>
                        <a href="clientescr.php"><button class="btn btn-warning" type="button">Ir a la lista de clientes a crédito</button></a>
                    </div>
                </div>
            </form>
        </center>
    </div><br>

    <!--Inicia Footer-->
<?php
    include("usuario_footer.php");
?>
    <!--Finaliza Footer-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>