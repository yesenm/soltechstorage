<?php
    include("usuario_menu.php");
?>
<!doctype html>
<html lang="es">
<body>

    <!--Inicia Formulario Gastos-->
    <br>
    <center>
        <div class="container">

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
                                        </tr>
                                    <?php } mysqli_free_result($resultado); ?>
                        </tbody>
                    </table>
                </div>
            </form>
            <br>
            <!--Finaliza tabla-->
        </div>
    </center>
        <!--Finaliza Formulario-->
    
    <!--Inicia Footer-->
    <?php
    include("usuario_footer.php");
    include("../../includes/pag_table.php")
    ?>
    <!--Finaliza Footer-->
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>