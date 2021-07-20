<?php
    include("admin_menu.php");
?>
<!doctype html>
<html lang="es">
<body>
    <!--Inicia Formulario Gastos-Form -->
    <div class="container">
        <center><br>
        <h4>Agrega un nuevo gasto</h4>
            <?php 
            include("../../includes/progastos.php");
            ?>
        <br>
            <form id="BPForm" class="rounded-3" method="POST"
			action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row">
                    <div class="col-md-6">
                        <label>Empleado</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="empleado" value="<?php echo $empleado; ?>" placeholder="Ingresa el nombre del empleado">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Rubro</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="rubro" value="<?php echo $rubro; ?>" placeholder="Añade el rubro del empleado">
                        </div>
                    </div>
                    
                    <div class="col-md-12"><br>
                        <label>Proyecto</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="proyecto" value="<?php echo $proyecto; ?>" placeholder="Ingresa el nombre del proyecto">
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Fecha</label>
                        <div class="input-group">
                            <input type="date" class="form-control" name="fecha" value="<?php echo $fecha; ?>" placeholder="Ingresa la fecha del gasto">
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Concepto cantidad</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="cantidad" value="<?php echo $cantidad; ?>" placeholder="Ingresa la cantidad gastada">
                        </div>
                    </div>
                    <center>
                    
                    <div class="col-md-12"><br><br>
                        <button type="submit" class="btn btn-primary" name="agregargasto">Agregar gasto</button>
                        <a href="gastos.php"><button type="button" class="btn btn-warning">Ir a gastos</button></a>
                    </div>
                    </center>
                </div>
            </form>
        </div>
    </center>
    <!--Finaliza Formulario-->
    
    <!--Inicia Footer-->
    <?php
    include("admin_footer.php");
    ?>
    <!--Finaliza Footer-->
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>