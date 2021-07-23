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
    <form id="BPForm" class="rounded-3 form_search">
        <label>Registrar un crédito:</label>
        <a href="ifclientecr.php"><button class="btn btn-primary" type="button"><i class="fas fa-user-plus"></i></button></a>
    </form> 
            
        <div class="mb-3"><br>
            <h4>Clientes a Crédito</h4>
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
                                <th scope="col">Crédito</th>
                                <th scope="col">Restante</th>
                                <th scope="col" style="width:200px;">Fecha de préstamo</th>
                                <th>Fecha límite</th>
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
                                $clientescr= "SELECT * FROM clientescr";
                                $resultado= $conexion->query($clientescr);
                                    //Impresión de filas
                                    while($row = $resultado->fetch_assoc()){?>
                                        <tr>
                                        <th> <?php echo $row['id']; ?></th>
                                        <td> <?php echo $row['nombrecr']; ?></td>
                                        <td> <?php echo $row['telefonocr']; ?></td>
                                        <td> <?php echo $row['direccioncr']; ?></td>
                                        <td> <?php echo $row['correocr']; ?></td>
                                        <td> <?php echo $row['rfccr']; ?></td>
                                        <td>$ <?php echo $row['cantidadcr']; ?></td>
                                        <td>$ <?php echo $row['restantecr']; ?></td>
                                        <td> <?php echo $row['fechaprcr']; ?></td>
                                        <td> <?php echo $row['fechalicr']; ?></td>
                                        </tr>
                                    <?php } mysqli_free_result($resultado); ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</center>
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