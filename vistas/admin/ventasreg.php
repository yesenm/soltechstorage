<?php
    include("admin_menu.php");
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
            $sql = "DELETE ven, fac FROM ventasregis AS ven INNER JOIN 
            factura AS fac WHERE ven.invoice_id=fac.invoice_id 
            AND ven.invoice_id LIKE $id";

            if($conect->query($sql) === true){
                echo "<br><div class='alert alert-success' role='alert'>
                        La venta se ha eliminado correctamente.
                    </div>";
            }else{
                die("Error al actualizar datos: " . $conect->error);
            }
        }
    ?>
    <br>
        <form id="BPForm" class="rounded-3 form_search">
            <div class="row">
                <div class="col-md-6">
                    <label>Registra una venta:</label>
                    <a href="ventas.php"><button class="btn btn-primary" type="button"><i class="fas fa-cart-plus"></i></button></a>
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
                            <th style="width:50px;">Factura</th>
                            <th style="width:50px;">Opciones</th>
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
                                <td> <?php 
                                if($row['reqfac'] == 0){
                                    echo "No";
                                }else{
                                    echo "Si";
                                }
                                ?>
                                </td>
                                <td><div class="tdbutton">
                                    <a href="../../includes/pdf/pdffactura.php?id=<?php echo $row['invoice_id']; ?>" target="_blank" class="btn btn-info btntd btn-sm"><i class="fa fa-print"></i></a>
                                    <form method="POST" id="form_eliminar_<?php echo $row['invoice_id']; ?>" action="ventasreg.php">
                                    <button type="submit" name="eliminar" value="<?php echo $row['invoice_id']; ?>" class="btn btn-danger btn-sm eliminar btntd"><i class="fas fa-trash"></i></button></form>
                            </div></td>
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
    include("admin_footer.php");
    include("../../includes/pag_table.php");
   ?>
    <!--Finaliza Footer-->

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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>