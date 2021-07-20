<?php
    include("admin_menu.php");

    //Creacion de consulta para llenar los campos correctamente
    $consulta = ConsultarCliente($_GET['id']);

    function ConsultarCliente($id_prov){

        //Conexión con la base de datos
    $conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){
        echo "Fallo en la conexión. ".mysqli_connect_error();
    }
        $sentencia="SELECT * FROM clientescr WHERE id='".$id_prov."'";
        $resultado= $conexion->query($sentencia);
        $row=mysqli_fetch_assoc($resultado);
        return [
            $row['id'],
            $row['nombrecr'],
            $row['telefonocr'],
            $row['direccioncr'],
            $row['correocr'],
            $row['rfccr'],
            $row['cantidadcr'],
            $row['restantecr'],
            $row['fechalicr']
        ];
    }
?>

<!DOCTYPE html>
<html lang="en">
<body>
<div class="container">
    <center><br>
    <h4>Edita la información del cliente</h4>
        <?php
            include("../../includes/mod_clientescr.php");
        ?>
    <br>

    <form id="PForm" class="rounded-3" method="POST"action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <fieldset>
                <input type="hidden" name="id" id="update_id" value="<?php echo $_GET['id'];?>">
                <div class="row">
                    <div class="col-md-5">
                        <label>Nombre</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombrecr" id="nombrecr" value="<?php echo $consulta[1];?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label>Teléfono</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Teléfono" name="telefonocr" id="telefonocr" value="<?php echo $consulta[2];?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label>Dirección</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Dirección" name="direccioncr" id="direccioncr" value="<?php echo $consulta[3];?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Correo</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Correo" name="correocr" id="correocr" value="<?php echo $consulta[4];?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>RFC</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="RFC" name="rfccr" id="rfccr" value="<?php echo $consulta[5];?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-4"><br>
                        <label>Cantidad de crédito</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cantidad de crédito" name="cantidadcr" id="cantidadcr" value="<?php echo $consulta[6];?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-4"><br>
                        <label>Cantidad de restante</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cantidad restante" name="restantecr" id="restantecr" value="<?php echo $consulta[7];?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-4"><br>
                        <label>Fecha límite</label>
                        <div class="input-group">
                            <input type="date" class="form-control" name="fechalicr" id="fechalicr" value="<?php echo $consulta[8];?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-12"><br>
                        <button type="submit" class="btn btn-primary" name="editarclientcr" value="editarclientcr">Editar cliente</button>
                        <a href="clientecr.php"><button type="button" class="btn btn-warning">Cancelar</button></a>
                    </div>
                </div>
            </fieldset>
    </form>
</div><br>
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