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
                $sql = "DELETE FROM clientespo WHERE id = $id";

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
        <label>Registra un cliente potencial:</label>
        <a href="ifclientepo.php"><button class="btn btn-primary" type="button"><i class="fas fa-user-plus"></i></button></a>
    </form>
            
            <div class="mb-3"><br>
                <h4>Clientes potenciales</h4>
            </div>
            
            
            <form id="BPForm" class="rounded-3">
                
                <div class="table-responsive">
                    <table class="table" id="tablax">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Correo</th>
                                <th scope="col">RFC</th>
                                <th scope="col">N° compras</th>
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
                                $usuarios= "SELECT * FROM clientespo";
                                $resultado= $conexion->query($usuarios);

                                //Impresión de filas
                                    while($row = $resultado->fetch_assoc()){?>
                                        <tr>
                                        <th> <?php echo $row['id']; ?></th>
                                        <td> <?php echo $row['nombrepo']; ?></td>
                                        <td> <?php echo $row['telefonopo']; ?></td>
                                        <td> <?php echo $row['direccionpo']; ?></td>
                                        <td> <?php echo $row['correopo']; ?></td>
                                        <td> <?php echo $row['rfcpo']; ?></td>
                                        <td> <?php echo $row['cantidadpo']; ?></td>
                                        <td><div class="tdbutton"><?php echo
                                            "<a href='formclipomod.php?id=".$row['id']."'><button type='button' class='btn btn-warning btn-sm btntd'><i class='fas fa-edit'></i></button></a>" ?>
                                            <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="clientespo.php">
                                            <button type="submit" name="eliminar" value="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm eliminar btntd"><i class="fas fa-trash"></i></button>
                                        </form></div>
                                        </td>
                                        </tr>
                            <?php } mysqli_free_result($resultado); ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </center>
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
    <!--Finaliza Formulario-->
    
    <!--Inicia Footer-->
<?php
    include("admin_footer.php");
    include("../../includes/pag_table.php");
?>
    <!--Finaliza Footer-->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>