<?php
//Conexión BD
$conexion = mysqli_connect("localhost","root","","soltech");
if(mysqli_connect_errno()){echo "Fallo en la conexión. ".mysqli_connect_error();}

if(isset($_POST['save_order'])){
    $cashier_name = $_POST['cashier_name'];
    $order_date = date("Y-m-d",strtotime($_POST['orderdate']));
    $order_time = date("H:i", strtotime($_POST['timeorder']));
    $total = $_POST['total'];
    $paid = $_POST['paid'];
    $due = $_POST['due'];
    $clienteev = $_POST['clienteev'];
    $clientepo = $_POST['clientepo'];
    $clientecr = $_POST['clientecr'];
    $reqfac = $_POST['reqfac'];
    
    $arr_product_id =  $_POST['id_'];
    $arr_product_code = $_POST['codigoi_'];
    $arr_product_des = $_POST['descripcioni_'];
    $arr_product_exi = $_POST['existenciasi_'];//Existencias
    $arr_product_pre = $_POST['pnetoi_'];//PrecioNeto
    $arr_product_can = $_POST['cantidadi_'];//Cantidad
    $arr_product_iva = $_POST['ivai_'];//IVA
    $arr_product_total =  $_POST['producttotal'];//Importe
    
    if($arr_product_id == "" || $arr_product_code == "" || $arr_product_can == "" || $arr_product_iva == ""){
        echo "<div class='container'><br><div class='alert alert-danger' role='alert'><center>
        Los campos no pueden ir vacíos.</center></div></div>";
    }else{
        if($paid<$total){
            echo "<div class='container'><br><div class='alert alert-danger' role='alert'><center>
            El monto de cobro no es suficiente.</center></div></div>";
        }else{
            //Eventual
            if($clientepo == "" && $clientecr ==""){
                //inserta en ventas registradas
                $sql = ("INSERT INTO ventasregis(cashier_name, order_date, time_order, total, paid, due, cliente, reqfac)
                VALUES('$cashier_name', '$order_date', '$order_time', '$total','$paid', '$due', '$clienteev', '$reqfac')");
                
                if(!mysqli_query($conexion,$sql)){echo "Error: ".mysqli_error($conexion);}
                
                $invoice_id = mysqli_insert_id($conexion);
                
                if($invoice_id!=null){
                    for($i=0; $i<count($arr_product_id); $i++){
                        
                        $rem_qty = $arr_product_exi[$i] - $arr_product_can[$i];
                        
                        if($rem_qty<0){
                            echo "<div class='container'><br><div class='alert alert-danger' role='alert'><center>
                            Ingrese el monto de compra.</center></div></div>";
                        }else{
                            //Editar existencias
                            $cambios ="UPDATE inventario SET existenciasi ='$rem_qty' 
                            WHERE id='".$arr_product_id[$i]."'";
                            
                            if(mysqli_query($conexion,$cambios)){}
                            
                            if(!mysqli_query($conexion,$cambios)){echo"Error".mysqli_error($conexion);}
                        }
                        
                        //insertar datos de factura
                        $insert = ("INSERT INTO factura(invoice_id, product_id, product_code, product_description,
                        cantidad, iva, precio, total, order_date)
                        VALUES('$invoice_id', '$arr_product_id[$i]', '$arr_product_code[$i]', '$arr_product_des[$i]',
                        '$arr_product_can[$i]', '$arr_product_iva[$i]', '$arr_product_pre[$i]', '$arr_product_total[$i]',
                        '$order_date')");
                        
                        if(!mysqli_query($conexion,$insert)){echo "Error: ".mysqli_error($conexion);}
                        
                    }
                    echo "<script>
                    alert('Venta registrada, imprime el ticket desde el registro de ventas');
                    window.location= 'ventasreg.php';
                    </script>";
                    
                }
                //Potencial
            }else if ($clienteev == "" && $clientecr ==""){
                //Actualizacion de las compras del cliente 
                $instruccion= "SELECT cantidadpo FROM clientespo WHERE nombrepo='$clientepo'";
                $consulta = mysqli_query($conexion,$instruccion) or die ("Fallo en la consulta...");
                while($row=mysqli_fetch_array($consulta)){
                    $cantidadpo = $row['cantidadpo'];
                }
                $up = $cantidadpo + 1;
                $update = "UPDATE clientespo SET cantidadpo='$up' WHERE nombrepo='$clientepo' ";
                
                if(mysqli_query($conexion,$update)){}
                if(!mysqli_query($conexion,$update)){echo"Error".mysqli_error($conexion);}
                
                //Insertar venta
                $sql = ("INSERT INTO ventasregis(cashier_name, order_date, time_order, total, paid, due, cliente, reqfac)
                VALUES('$cashier_name', '$order_date', '$order_time', '$total','$paid', '$due', '$clientepo', '$reqfac')");
                
                if(!mysqli_query($conexion,$sql)){echo "Error: ".mysqli_error($conexion);}
                
                $invoice_id = mysqli_insert_id($conexion);
                
                if($invoice_id!=null){
                    for($i=0; $i<count($arr_product_id); $i++){
                        
                        $rem_qty = $arr_product_exi[$i] - $arr_product_can[$i];
                        
                        if($rem_qty<0){
                            echo "<div class='container'><br><div class='alert alert-danger' role='alert'><center>
                            Ingrese el monto de compra.</center></div></div>";
                        }else{
                            //Editar existencias
                            $cambios ="UPDATE inventario SET existenciasi ='$rem_qty' 
                            WHERE id='".$arr_product_id[$i]."'";
                            
                            if(mysqli_query($conexion,$cambios)){}
                            
                            if(!mysqli_query($conexion,$cambios)){echo"Error".mysqli_error($conexion);}
                        }
                        //insertar datos de factura
                        $insert = ("INSERT INTO factura(invoice_id, product_id, product_code, product_description,
                        cantidad, iva, precio, total, order_date)
                        VALUES('$invoice_id', '$arr_product_id[$i]', '$arr_product_code[$i]', '$arr_product_des[$i]',
                        '$arr_product_can[$i]', '$arr_product_iva[$i]', '$arr_product_pre[$i]', '$arr_product_total[$i]',
                        '$order_date')");
                        
                        if(!mysqli_query($conexion,$insert)){echo "Error: ".mysqli_error($conexion);}
                    }
                    echo "<script>
                    alert('Venta registrada, imprime el ticket desde el registro de ventas');
                    window.location= 'ventasreg.php';
                    </script>";
                }
                
                //Credito
            }else if($clienteev == "" && $clientepo ==""){
                //Actualizar credito del cliente
                $busqueda= "SELECT restantecr FROM clientescr WHERE nombrecr='$clientecr'";
                $consultaID = mysqli_query($conexion,$busqueda) or die ("Fallo en la consulta...");
                while($row=mysqli_fetch_array($consultaID)){
                    $restante = $row['restantecr'];
                    $creditot = $row['creditocr'];
                }
                
                if( $total > $restante && $total > $creditot){
                    echo "<div class='container'><br><div class='alert alert-danger' role='alert'><center>
                    Crédito insuficiente.</center></div></div>";
                }else{
                    $quitarR = $restante - $total;
                    //Editar credito
                    $credito = "UPDATE clientescr SET restantecr ='$quitarR' WHERE nombrecr='$clientecr'";
                    
                    if(mysqli_query($conexion,$credito)){}
                    if(!mysqli_query($conexion,$credito)){echo"Error".mysqli_error($conexion);}
                    
                    //inserta en ventas registradas
                    $sql = ("INSERT INTO ventasregis(cashier_name, order_date, time_order, total, paid, due, cliente, reqfac)
                    VALUES('$cashier_name', '$order_date', '$order_time', '$total','$paid', '$due', '$clientecr', '$reqfac')");
                    
                    if(!mysqli_query($conexion,$sql)){echo "Error: ".mysqli_error($conexion);}
                    
                    $invoice_id = mysqli_insert_id($conexion);
                    
                    if($invoice_id!=null){
                        for($i=0; $i<count($arr_product_id); $i++){
                            
                            $resd= $cantidad-$paid; //operacion
                            $rem_qty = $arr_product_exi[$i] - $arr_product_can[$i];
                            
                            if($rem_qty<0){
                                echo "<div class='container'><br><div class='alert alert-danger' role='alert'><center>
                                Ingrese el monto de compra.</center></div></div>";
                            }else{
                                //Editar existencias
                                $cambios ="UPDATE inventario SET existenciasi ='$rem_qty' 
                                WHERE id='".$arr_product_id[$i]."'";
                                
                                if(mysqli_query($conexion,$cambios)){} 
                                if(!mysqli_query($conexion,$cambios)){echo"Error".mysqli_error($conexion);}
                            }
                            
                            //insertar datos de factura
                            $insert = ("INSERT INTO factura(invoice_id, product_id, product_code, product_description,
                            cantidad, iva, precio, total, order_date)
                            VALUES('$invoice_id', '$arr_product_id[$i]', '$arr_product_code[$i]', '$arr_product_des[$i]',
                            '$arr_product_can[$i]', '$arr_product_iva[$i]', '$arr_product_pre[$i]', '$arr_product_total[$i]',
                            '$order_date')");
                            
                            if(!mysqli_query($conexion,$insert)){echo "Error: ".mysqli_error($conexion);}
                            
                        }
                    }
                    echo "<script>
                    alert('Venta registrada, imprime el ticket desde el registro de ventas');
                    window.location= 'ventasreg.php';
                    </script>";
                }
            }
            
        }
    }
}
?>