<?php

    include("usuario_menu.php");

    if(!$_SESSION["usuario_valido"]){
    ?>
    <script>
            alert('Inicia sesion para acceder a este sitio');
            window.location= 'login.php';
    </script>
    <?php
    exit();
    }
    //Conseguir el nombre del usuario validado
    $usuario = $_SESSION["usuario_valido"];
    $conexion=mysqli_connect("localhost","root","","soltech");
    $instruccion= "select nombrev from vendedores where nameuser='$usuario'";
    $consulta = mysqli_query($conexion,$instruccion) or die ("Fallo en la consulta...");
    while($row=mysqli_fetch_array($consulta)){
        $userloged = $row['nombrev'];
    }
    
    //Conexión BD
    $conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){echo "Fallo en la conexión. ".mysqli_connect_error();}

    error_reporting(0);
    date_default_timezone_set('america/mexico_city');
    
?>
<!doctype html>
<html lang="es">
<body>
  <!-- Content Wrapper. Contains page content -->
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header"><br>
      <h2><center>
        Ventas
      </h2></center>
    </section>

    <?php 
      include("../../includes/proventas.php");
    ?>

    <!-- Main content -->
    <section class><center>
        <div class="box box-success">
          <form id="FormVentas" class="rounded-3 form_search" action="" method="POST">
            <div class="box-body">

            <div class="container">
              <form >
                <div class="row" id="clientes">
                  <div class="col-md-4">
                    <label>Usuario</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="cashier_name" value="<?php echo $userloged; ?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label>Fecha de la transacción</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                    <input type="text" class="form-control pull-right" name="orderdate" value="<?php echo date("d-m-Y");?>" readonly
                      data-date-format="yyyy-mm-dd">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label>Hora de la transacción</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="timeorder" value="<?php echo date('H:i') ?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-12"><br><hr>
                    <center><label>Elige el tipo de cliente</label></center>
                  </div>
                  <div class="col-md-4" >
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio1" id="radio1">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Eventual
                        <script>
                          $('#radio1').click(function(){
                            $('#btn_addOrder').removeAttr('disabled');
                            var input1='';
                            input1+='<div class="row" >'
                            input1+='<div class="col-md-9">';
                            input1+='<h2>Escribe el nombre del cliente</h2>'
                            input1+='<input type="text" class="form-control" name="clienteev" id="clienteev" required>';
                            input1+='</div>';
                            input1+='<div class="col-md-3">';
                            input1+='<br><br>';
                            input1+=`<button class="btn btn-info btn-block cambiar" style="" id="cambiarCliente">Cambiar cliente</button>`;
                            input1+='</div>';
                            input1+='</div>';
                            $('#elecciondelcliente').append(input1);
                            $('#radio1').attr('disabled', 'disabled');
                            $('#radio2').attr('disabled', 'disabled');
                            $('#radio3').attr('disabled', 'disabled');

                            $('.cambiar').click(function(){
                              location.reload();
                            });
                          });
                        </script>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio2" id="radio2">
                      <label class="form-check-label" for="flexRadioDefault2">
                        Potencial
                        <script>
                          $('#radio2').click(function(){
                            $('#btn_addOrder').removeAttr('disabled');
                            var input2='';
                            input2+='<div class="row">'
                            input2+='<div class="col-md-9">';
                            input2+='<h2>Selecciona al cliente</h2>'
                            input2+=`<select class="form-control clientepo" name="clientepo"required><option value="No especifica">Selecciona</option><?php 
                            $consulta ="SELECT * FROM clientespo";
                            $ejecutar = mysqli_query($conexion, $consulta) or die (mysqli_error($conexion)); ?>
                            <?php foreach ($ejecutar as $opciones):?>
                            <option value="<?php echo $opciones['nombrepo']; ?>"><?php echo $opciones['nombrepo']; ?></option>
                            <?php endforeach ?></select>`;
                            input2+='</div>';
                            input2+='<div class="col-md-3">';
                            input2+='<br><br>';
                            input2+='<input type="button" class="btn btn-info btn-block" id="cambiarCliente" value="Cambiar tipo de cliente">';
                            input2+='</div>';
                            input2+='</div>';
                            $('#elecciondelcliente').append(input2);
                            $('#radio1').attr('disabled', 'disabled');
                            $('#radio2').attr('disabled', 'disabled');
                            $('#radio3').attr('disabled', 'disabled');
                            $('#cambiarCliente').click(function(){
                              location.reload();
                            });
                          });
                        </script>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio3" id="radio3">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Crédito
                        <script>
                          $('#radio3').click(function(){
                            $('#btn_addOrder').removeAttr('disabled');
                            var input3='';
                            input3+='<div class="row">'
                            input3+='<div class="col-md-9">';
                            input3+='<h2>Selecciona al cliente</h2>'
                            input3+=`<select class="form-control clientecr" name="clientecr"required><option value="No especifica">Selecciona</option><?php 
                            $consulta ="SELECT * FROM clientescr";
                            $ejecutar = mysqli_query($conexion, $consulta) or die (mysqli_error($conexion)); ?>
                            <?php foreach ($ejecutar as $opciones):?>
                            <option value="<?php echo $opciones['nombrecr']; ?>"><?php echo $opciones['nombrecr']; ?></option>
                            <?php endforeach ?></select>`;
                            input3+='</div>';
                            input3+='<div class="col-md-3">';
                            input3+='<br><br>';
                            input3+='<input type="button" class="btn btn-info btn-block" id="cambiarCliente" value="Cambiar cliente">';
                            input3+='</div>';
                            input3+='</div>';
                            $('#elecciondelcliente').append(input3);
                            $('#radio1').attr('disabled', 'disabled');
                            $('#radio2').attr('disabled', 'disabled');
                            $('#radio3').attr('disabled', 'disabled');
                            $('#cambiarCliente').click(function(){
                              location.reload();
                            });
                          });
                        </script>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12" id="elecciondelcliente">
                  
                  </div>
                </div>
              </form><br><hr>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <label>Obtén el código del producto:</label>
                </div>
                <div class="col-md-5">
                <select class="form-select" name="categoriai" id="categoriai">
                        <option value="0">Selecciona una opción</option>      
                        <option value="Accesorios">Accesorios</option>
                        <option value="Aspersores">Aspersores</option>
                        <option value="CED. 40">CED. 40</option>
                        <option value="CED. 80">CED. 80</option>
                        <option value="Compuerta">Compuerta</option>
                        <option value="Conex. Aluminio">Conex. Aluminio</option>
                        <option value="Conex. Regantes">Conex. Regantes</option>
                        <option value="Combustibles">Combustibles</option>
                        <option value="Fertiriego">Fertiriego</option>
                        <option value="Filtración">Filtración</option>
                        <option value="Galvanizados">Galvanizados</option>
                        <option value="Geomembrana">Geomembrana</option>
                        <option value="Medidores">Medidores</option>
                        <option value="Micro y Goteo">Micro y Goteo</option>
                        <option value="Paneles">Paneles</option>
                        <option value="Pzas Taller">Pzas Taller</option>
                        <option value="Equipos Mecanizados">Equipos Mecanizados</option>
                        <option value="PEBD">PEBD</option>
                        <option value="Bombeo">Bombeo</option>
                        <option value="Tuberías">Tuberías</option>
                        <option value="LAY FLAT">LAY FLAT</option>
                        <option value="Válvulas">Válvulas</option>
                    </select><br>
                </div>
                <div style="overflow-x:auto;" class="col-md-12">
                <table cellspacing="0" cellpadding="0" border="0" width="950">
                  <tr>
                    <td>
                      <table class="table" cellspacing="0" cellpadding="1" border="1" width="300" >
                        <thead style="background-color:#7ad2ae;">
                          <tr>
                            <th style="widht:200px;">Código</th>
                            <th style="widht:500px;">Descripción del producto</th>
                            <th style="widht:300px;">Medidas del producto</th>
                          </tr>
                        </thead>
                      </table>
                    </td>
                  <tr>
                  <tr>
                    <td>
                      <div style=" width=320px; height:100px; overflow:auto;">
                        <table class="table">
                          <tbody id="codigos" >

                          </tbody>
                        </table>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="box-body">
              <div class="col-md-12" style="overflow-x:auto;"><br><hr>
              <label>Genera una nueva venta</label>
                <table class="table table-border" id="myOrder">
                  <thead style="background-color:#ffc107;">
                      <tr>
                          <th></th>
                          <th>Código</th>
                          <th>Descripción</th>
                          <th>Stock</th>
                          <th>Precio</th>
                          <th>Cantidad</th>
                          <th>IVA</th>
                          <th>Total</th>
                          <th>
                            <button type="button" name="addOrder" class="btn btn-primary btn-sm" id="btn_addOrder" disabled required>
                              <i class="fa fa-plus"></i>
                            </button>
                          </th>
                      </tr>

                  </thead>
                  <tbody>
                    <script>
                    $('#btn_addOrder').click(function(){
                      var html='';
                      html+=`<tr>`;
                      
                      html+=`<td><input type="hidden"  class="form-control id_" name="id_[]" readonly></td>`;
                      html+=`<td><input type="text" class="form-control codigoi_" name="codigoi_[]" style="width:100px;" required></td>`;
                      
                      html+=`<td><input type="text" class="form-control descripcioni_" style="width:200px;" name="descripcioni_[]" style="background-color: #82c577;" readonly></td>`;
                      html+=`<td><input type="text" class="form-control existenciasi_" style="width:50px;" name="existenciasi_[]" readonly></td>`;
                      html+=`<td><input type="text" class="form-control pnetoi_" style="width:100px;" name="pnetoi_[]" readonly></td>`;
                      html+=`<td><input type="text" class="form-control quantity_product" style="width:100px;" name="cantidadi_[]" disabled required></td>`;
                      html+=`<td><input type="text" class="form-control iva_product" style="width:100px;" name="ivai_[]" disabled required></td>`;
                      html+=`<td><input type="text" class="form-control producttotal" style="width:150px;" name="producttotal[]" readonly></td>`;
                      html+=`<td><button type="button" name="remove" class="btn btn-danger btn-sm btn-remove"><i class="fa fa-remove"></i></button></td>`;
                      html+=`</tr>`;
                      $('#myOrder').append(html);

                    });
                    </script>
                  </tbody>
                </table>
              </div>
            </div>


            <div class="box-body">
              <div class="col-md-offset-1 col-md-10">
                <div class="form-group">
                  <label>Total</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <span>MXN</span>
                    </div>
                    <input type="text" class="form-control pull-right" name="total" id="total" required readonly>
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="form-group">
                  <label>Dinero recibido</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <span>MXN</span>
                    </div>
                    <input type="number" min="1" class="form-control pull-right" name="paid" id="paid" required>
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="form-group">
                  <label>Cambio</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <span>MXN <?php echo $_SESSION['invoice_id']; ?></span>
                    </div>
                    <input type="text" class="form-control pull-right" name="due" id="due" required readonly>
                  </div>
                  <!-- /.input group -->
                </div>
              </div>
            </div>

            <div class="box-footer" align="center">
              <input type="submit" name="save_order" value="Cobrar venta" class="btn btn-primary">
              <a href="ventasreg.php" class="btn btn-warning">Ver la lista de Ventas registradas</a>
            </div></center>
          </form>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php
    include("usuario_footer.php");
  ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="../js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>