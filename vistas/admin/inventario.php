<?php
include("admin_menu.php");
?>
<!doctype html>
<html lang="es">
<body><br>
    <div class="container">
    <center>

    <?php
        //Eliminacion de un registro
        $servidor = "localhost";
        $nombreusuario = "root";
        $password = "";
        $db = "soltech";
    
        $conect = new mysqli($servidor, $nombreusuario, $password, $db);
    
        if($conect->connect_error){
            die("Conexión fallida: " . $conect->connect_error);
        }
        //metodo de eliminar
        if(isset($_REQUEST['eliminar'])){
            
            $id = $_REQUEST['eliminar'];
            $sql = "DELETE FROM inventario WHERE id = $id";

            if($conect->query($sql) === true){
                echo "<br><div class='alert alert-success' role='alert'>
                        El registro se ha eliminado correctamente.
                    </div>";
            }else{
                die("Error al actualizar datos: " . $conect->error);
            }
        }
    ?>

        <form id="BPForm" class="rounded-3 form_search">
            <div class="row">
                <div class="col-md-6">
                    <label>Registra un producto:</label>
                    <a href="forminventario.php"><button class="btn btn-primary" type="button"><i class="fas fa-seedling"></i></button></a>
                </div>
                <div class="col-md-6">
                    <label>Imprime el registro de inventario:</label>
                    <a href="../../includes/pdf/pdfinventario.php"><button class="btn btn-warning" type="button"><i class="fas fa-file-pdf"></i></button></a>
                </div>
            </div>
        </form> 

        <div class="mb-3"><br>
            <h4>Invetario</h4>
        </div>

        <!--Inicia tabla-->
        <form id="BPForm" class="rounded-3">
            <div class="table-responsive">
                <table class="table" id="tablax">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Código</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Medidas</th>
                            <th scope="col">$Mayoreo</th>
                            <th scope="col">$Bruto</th>
                            <th scope="col">$Neto</th>
                            <th scope="col">Existencias</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //Conexión con la base de datos
                        $conexion = mysqli_connect("localhost","root","","soltech");
                        if(mysqli_connect_errno()){
                            echo "Fallo en la conexión. ".mysqli_connect_error();
                        }

                        //Consulta a la base de datos
                        $productos= "SELECT * FROM inventario";
                        $resultado= $conexion->query($productos);

                        //Impresión de filas
                        while($row = $resultado->fetch_assoc()){?>
                            <tr>
                                <th> <?php echo $row['id']; ?></th>
                                <td> <?php echo $row['codigoi']; ?></td>
                                <td> <?php echo $row['descripcioni']; ?></td>
                                <td> <?php echo $row['medidasi']; ?></td>
                                <td>$<?php echo $row['pmayoreoi']; ?></td>
                                <td>$<?php echo $row['pbrutoi']; ?></td>
                                <td>$<?php echo $row['pnetoi']; ?></td>
                                <td> <?php echo $row['existenciasi']; ?></td>
                                <td> <?php echo $row['proveedoresi']; ?></td>
                                <td> <?php echo $row['categoriai']; ?></td>
                                <td><?php echo
                                    "<a href='forminventariomod.php?id=".$row['id']."'><button type='button' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i></button></a>" ?>
                                    <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="inventario.php">
                                    <button type="submit" name="eliminar" value="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm eliminar"><i class="fas fa-trash"></i></button></form>
                                </td>
                            </tr>
                    <?php } mysqli_free_result($resultado); ?>
                    </tbody>
                </table>
            </div>
        </form>
                
        <br>
        <script>
            function confirmation (e){
                if(confirm ("¿Estas seguro de eliminar este registro?")){
                    return true;
                }else{
                    e.preventDefault();
                }
            }

            let linkEliminar = document.querySelectorAll(".eliminar");

            for(var i = 0; i < linkEliminar.length; i++){
                linkEliminar[i].addEventListener('click', confirmation);
            }
        </script>
            
    <!--Finaliza tabla-->
    </div>
    </center>


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