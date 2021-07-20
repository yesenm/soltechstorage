<?php
include("admin_menu.php");
    //Creacion de consulta para llenar los campos correctamente
    $consulta = ConsultarClientepo($_GET['id']);

    function ConsultarClientepo($id_prov){

        //Conexión con la base de datos
    $conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){
        echo "Fallo en la conexión. ".mysqli_connect_error();
    }
        $sentencia="SELECT *FROM clientespo WHERE id='".$id_prov."'";
        $resultado= $conexion->query($sentencia);
        $row=mysqli_fetch_assoc($resultado);
        return [
            $row['id'],
            $row['nombrepo'],
            $row['telefonopo'],
            $row['direccionpo'],
            $row['correopo'],
            $row['rfcpo']
        ];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<body>
<div class="container">
    <center><br>
    <h4>Edita la información del Cliente Potencial</h4>
        <?php
            include("../../includes/mod_clientespo.php");
        ?>
            <br>

    <form id="PForm" class="rounded-3" method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
            <div class="row">
                    <div class="col-md-8">
                        <input type="hidden" name="id" id="update_id" value="<?php echo $_GET['id'];?>">
                        <label>Nombre</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombrepo" id="nombrepo" value="<?php echo $consulta[1];?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Teléfono</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Teléfono" name="telefonopo" id="telefonopo" value="<?php echo $consulta[2];?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-12"><br>
                        <label>Dirección</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Dirección" name="direccionpo" id="direccionpo" value="<?php echo $consulta[3];?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Correo</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Correo" name="correopo" id="correopo" value="<?php echo $consulta[4];?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>RFC</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="RFC" name="rfcpo" id="rfcpo" value="<?php echo $consulta[5];?>" class="rounded-3"/>
                        </div>
                    </div>
                    <div class="col-md-12"><br>
                        <button type="submit" class="btn btn-primary" name="editarclip" value="editarclip">Editar cliente potencial</button>
                       <a href="clientepo.php"><button type="button" class="btn btn-warning">Cancelar</button></a>
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