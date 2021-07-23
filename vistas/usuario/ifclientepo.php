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
            <h4>Agrega un nuevo cliente potencial</h4>
            <?php 
                include("../../includes/proclientespo.php");
            ?>
            <br>
            <form id="PForm" class="rounded-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="row">
                    <div class="col-md-8">
                        <label>Nombre</label>
                        <div class="input-group">
                            <input id="nombrepo" name="nombrepo" type="text" class="form-control" placeholder="Nombre" class="rounded-3" value="<?php echo $nombrepo; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Teléfono</label>
                        <div class="input-group">
                            <input id="telefonopo" name="telefonopo" type="text" class="form-control" placeholder="Teléfono" class="rounded-3" value="<?php echo $telefonopo; ?>">
                        </div>
                    </div>
                    <div class="col-md-12"><br>
                        <label>Dirección</label>
                        <div class="input-group">
                            <input id="direccionpo" name="direccionpo" type="text" class="form-control" placeholder="Dirección" class="rounded-3" value="<?php echo $direccionpo; ?>">
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Correo</label>
                        <div class="input-group">
                            <input id="correopo" name="correopo" type="text" class="form-control" placeholder="Correo" class="rounded-3" value="<?php echo $correopo; ?>">
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>RFC</label>
                        <div class="input-group">
                            <input id="rfcpo" name="rfcpo" type="text" class="form-control" placeholder="RFC" class="rounded-3" value="<?php echo $rfcpo; ?>">
                        </div>
                    </div>
                    <div class="col-md-12"><br>
                        <button type="submit" class="btn btn-primary" name="Agregar">Agregar cliente potencial</button>
                        <a href="clientespo.php"><button class="btn btn-warning" type="button">Regresar a la lista de clientes potenciales</button></a>
                    </div>
                </div>
            </form> <br>
       </center> 
    </div>
    <!--Finaliza Formulario-->
    
    <!--Inicia Footer-->
<?php
    include("usuario_footer.php");
    include("../../includes/pag_table.php");
?>
    <!--Finaliza Footer-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>