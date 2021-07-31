<?php
    include("admin_menu.php");
?>
<!doctype html>
<html lang="es">
<body>

    <!--Inicia Formulario Gastos-->
    <br>
    <center>
        <div class="container">

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
                    $sql = "DELETE FROM gastos WHERE id = $id";

                    if($conect->query($sql) === true){
                        echo "<br><div class='alert alert-success' role='alert'>
                                El gasto se ha eliminado correctamente.
                            </div>";
                    }else{
                        die("Error al actualizar datos: " . $conect->error);
                    }
                }
            ?>

            <form id="BPForm" class="rounded-3 form_search">
                <div class="row">
                    <div class="col-md-6">
                        <label>Registra un gasto:</label>
                        <a href="formgastos.php"><button class="btn btn-primary" type="button"><i class="fas fa-dollar-sign"></i></button></a>
                    </div>
                    <div class="col-md-6">
                        <label>Imprime el registro de gastos:</label>
                        <a href="../../includes/pdf/pdfgastos.php"><button class="btn btn-warning" type="button"><i class="fas fa-file-pdf"></i></button></a>
                    </div>
                </div>
            </form>
                    
            <div class="mb-3"><br>
                <h4>Gastos</h4>
            </div>

            <!--Inicia tabla-->
            <form id="BPForm" class="rounded-3">
                <div class="table-responsive">
                    <table class="table" id="tablax">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Empleado</th>
                                <th scope="col">Rubro</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Proyecto</th>
                                <th scope="col">Concepto cantidad</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                //Conexion con la base de datos
                                $conexion = mysqli_connect("localhost","root","","soltech");
                                if(mysqli_connect_errno()){
                                    echo "Fallo en la conexión. ".mysqli_connect_error();
                                }
                                //Consulta a la base de datos
                                $gastos= "SELECT * FROM gastos";
                                $resultado= $conexion->query($gastos);
                                    //Impresión de filas
                                    while($row = $resultado->fetch_assoc()){?>
                                        <tr>
                                        <th> <?php echo $row['id']; ?></th>
                                        <td> <?php echo $row['empleado']; ?></td>
                                        <td> <?php echo $row['rubro']; ?></td>
                                        <td> <?php echo $row['fecha']; ?></td>
                                        <td> <?php echo $row['proyecto']; ?></td>
                                        <td>$ <?php echo $row['cantidad']; ?></td>
                                        <td> <div class="tdbutton"><?php echo
                                            "<a href='formgasmod.php?id=".$row['id']."'><button type='button' class='btn btntd btn-warning btn-sm'><i class='fas fa-edit'></i></button></a>" ?>
                                            <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="gastos.php">
                                            <button type="submit" name="eliminar" value="<?php echo $row['id']; ?>" class="btn btntd btn-danger btn-sm eliminar"><i class="fas fa-trash"></i></button>
                                        </form></div>
                                        </td>
                                        </tr>
                                    <?php } mysqli_free_result($resultado); ?>
                        </tbody>
                    </table>
                </div>
            </form>

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
            
            <br>
            
            <!--Finaliza tabla-->
        </div>
    </center>
        <!--Finaliza Formulario-->
    
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