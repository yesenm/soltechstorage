<?php
    include("usuario_menu.php");
    //Conexion con la base de datos
    $conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){echo "Fallo en la conexión. ".mysqli_connect_error();}
?>

<!doctype html>
<html lang="en">
<body>
    
    <!--Inicia Formulario-->
    <div class="container">
    <center>

    <br>
        <form id="BPForm" class="rounded-3 form_search">
            <div class="row">
                <div class="col-md-6">
                    <label>Registra una venta:</label>
                    <a href="u_ventas.php"><button class="btn btn-primary" type="button"><i class="fas fa-cart-plus"></i></button></a>
                </div><div class="col-md-6">
                    <label>Imprime el registro de ventas:</label>
                    <a href="../../includes/pdf/pdfventas.php"><button class="btn btn-warning" type="button"><i class="fas fa-file-pdf"></i></button></a>
                </div>
            </div>
        </form>
                
        <div class="mb-3"><br>
            <h4>Ventas</h4>
        </div>

    </center>
    </div>

    <div class="container">
    <center>
        <br>
        <form id="inv" class="rounded-3">
            <div class="table-responsive">
                <table class="table" id="tablax">
                    <thead>
                        <tr>
                            <th style="width:20px;">No</th>
                            <th style="width:150px;">Vendedor</th>
                            <th style="width:120px;">Cliente</th>
                            <th style="width:80px;">Fecha</th>
                            <th style="width:50px;">Monto</th>
                            <th style="width:50px;">Ticket</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        //Consulta a la base de datos
                        $ventas= "SELECT * FROM ventasregis ORDER BY invoice_id DESC";
                        $resultado= $conexion->query($ventas);
                            //Impresión de filas
                            while($row = $resultado->fetch_assoc()){?>
                                <tr>
                                <th> <?php echo $no++; ?></th>
                                <td> <?php echo $row['cashier_name']; ?></td>
                                <td> <?php echo $row['cliente']; ?></td>
                                <td> <?php echo $row['order_date']; ?></td>
                                <td>$ <?php echo $row['total']; ?></td>
                                <td>
                                    <a href="../../includes/pdf/pdffactura.php?id=<?php echo $row['invoice_id']; ?>" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print"></i></a>
                                </td>
                                </tr>
                            <?php } mysqli_free_result($resultado); ?>
                    </tbody>
                </table>
            </div>
        </form>
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