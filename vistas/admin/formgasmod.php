<?php
    include("admin_menu.php");

    //Creacion de consulta para llenar los campos correctamente
    $consulta = ConsultarGasto($_GET['id']);

    function ConsultarGasto($id_prov){

        //Conexión con la base de datos
    $conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){
        echo "Fallo en la conexión. ".mysqli_connect_error();
    }
        $sentencia="SELECT * FROM gastos WHERE id='".$id_prov."'";
        $resultado= $conexion->query($sentencia);
        $row=mysqli_fetch_assoc($resultado);
        return [
            $row['id'],
            $row['empleado'],
            $row['rubro'],
            $row['fecha'],
            $row['proyecto'],
            $row['cantidad']
        ];
    }
?>
<!doctype html>
<html lang="es">
<body>
    <!--Inicia Formulario Gastos-Form -->
    <div class="container">
        <center><br>
        <h4>Edita la información del gasto</h4>
            <?php 
                include("../../includes/mod_gastos.php");
            ?>
        <br>
            <form id="VForm" class="rounded-3" method="POST" action="">
                <input type="hidden" name="id" id="update_id" value="<?php echo $_GET['id'];?>">
                <div class="row">
                    <div class="col-md-6">
                        <label>Empleado</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="empleado" name="empleado" value="<?php echo $consulta[1];?>" placeholder="Ingresa el nombre del empleado">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Rubro</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="rubro" name="rubro" value="<?php echo $consulta[2];?>" placeholder="Añade el rubro del empleado">
                        </div>
                    </div>
                    <div class="col-md-12"><br>
                        <label>Proyecto</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="proyecto" name="proyecto" value="<?php echo $consulta[4];?>" placeholder="Ingresa el nombre del proyecto">
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Fecha</label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $consulta[3];?>" placeholder="Ingresa la fecha del gasto">
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Concepto cantidad</label>
                        <div class="input-group">
                            <input type="number" min="0" class="form-control" id="cantidad" name="cantidad" value="<?php echo $consulta[5];?>" placeholder="Ingresa la cantidad gastada">
                        </div>
                    </div>
                    <center>
                    <div class="col-md-12"><br><br>
                        <button type="submit" class="btn btn-primary" name="editarGasto" value="editarGasto">Editar gasto</button>
                        <a href="gastos.php"><button type="button" class="btn btn-warning">Cancelar</button></a>
                    </div>
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