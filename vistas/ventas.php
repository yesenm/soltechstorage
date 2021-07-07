<?php
    //Conexión con la base de datos
    $conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){
        echo "Fallo en la conexión. ".mysqli_connect_error();
    }

    $sql="SELECT id, codigoi from inventario";
    $result=mysqli_query($conexion,$sql);
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ventas</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body id="mostrarProductos">
    <!--Inicia Nabvar-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #7ad2ae;">
        
        <div class="container-fluid">
            <a href=""><img src="../img/logooooo.png" id="logo"></a>
            <div class="container col-6"></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ventas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #7ad2ae;">
                            <li><a class="dropdown-item" href="ventas.php">Ventas</a></li>
                            <li><a class="dropdown-item" href="ventasreg.php">Ventas registradas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gastos.php">Gastos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inventario.php">Inventario</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Usuarios
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #7ad2ae;">
                            <li><a class="dropdown-item" href="clientescr.php">Clientes a crédito</a></li>
                            <li><a class="dropdown-item" href="clientespo.php">Clientes Potenciales</a></li>
                            <li><a class="dropdown-item" href="proveedores.php">Proveedores</a></li>
                            <li><a class="dropdown-item" href="vendedores.php">Vendedores</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Opciones
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #7ad2ae;">
                            <li><a class="dropdown-item" href="habilitar.php">Habilitar permisos</a></li>
                            <li><a class="dropdown-item" href="login.php">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Finaliza Nabvar-->
    
    <br>
    
    <!--Inicia Formulario-->
    <div class="container"><center>
        <h4>Selecciona el artículo que deseas vender y rellena los campos</h4><br>
        
            <form id="frmVentasProductos" class="rounded-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col" id="desc">Descripción</th>
                                <th scope="col">Precio $</th>
                                <th scope="col">Existencias</th>
                                <th scope="col" id="canti">Cantidad</th>
                                <th scope="col">IVA %</th>
                                <th scope="col">Importe</th>
                                <th scope="col">Comprar</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                                <th scope="row" style="width:15%; ">
                                <select class="form-control" id="productoVenta" name="productoVenta" >
                                    <option value="A">Selecciona</option>
                                    <?php

                                        while ($producto=mysqli_fetch_row($result)):
                                            ?>
                                        <option value="<?php echo $producto[0] ?>"><?php echo $producto[1] ?></option>
                                    <?php endwhile; ?>
                                </select>
                                </th><input readonly="" type="hidden" class="form-control" id="codigoV" name="codigoV">
                                <td style="width:25%; "><input readonly="" type="text" class="form-control" id="descripcionV" name="descripcionV" style="background-color: transparent; border-color:transparent;"></td>
                                <td style="width:10%; "><input readonly="" type="text" class="form-control" id="precioV" name="precioV" style="background-color: transparent; border-color:transparent;"></td>
                                <td style="width:10%; "><input readonly="" type="text" class="form-control" id="existenciasV" name="existenciasV" style="background-color: transparent; border-color:transparent;"></td>
                                <td style="width:10%; "><input type="text" id="inputcant" class="form-control" value="0" disabled></td>
                                <td style="width:10%; "><input type="text" id="inputiva" class="form-control" value="0" disabled></td>
                                <td style="width:10%; "><input readonly="" type="text" class="form-control" id="importeV" name="importeV" style="background-color: transparent; border-color:transparent;"></td>
                                <td style="width:10%; ">
                                <button type="button" class="btn btn-primary" id="btnAgregaVenta"><i class="fas fa-cart-plus"></i></button>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-3"><br>
                    <label>Productos adquiridos</label>
                </div>
                
                <div id="tablaVentasTempLoad" class="table-responsive">
                    <table class="table">
                        <thead class="thead bg-info">
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio $</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">IVA %</th>
                                <th scope="col">Importe</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="tabla">
                           <script>
                            //Mostrar tabla
                            $(document).ready(function(){
                                $(document).on('click', '#mostrarProductos', function(){
                                    var productosRegistradosVista=[];
                                    var tablahtml='';

                                    var productosLS = window.localStorage.getItem('ProductosRegistrados');
                                    if (productosLS==null) {
                                        productosRegistradosVista=[];        
                                    }else{
                                        productosRegistradosVista=JSON.parse(productosLS); 
                                    }

                                    console.log(productosRegistradosVista);

                                    for (var i = 0; i < productosRegistradosVista.length; i++) {
                                        tablahtml+=`<tr>`;
                                        tablahtml+=`<td>${productosRegistradosVista[i].codigoV}</td>`;
                                        tablahtml+=`<td>${productosRegistradosVista[i].descripcionV}</td>`;
                                        tablahtml+=`<td>${productosRegistradosVista[i].precioV}</td>`;
                                        tablahtml+=`<td>${productosRegistradosVista[i].inputcant}</td>`;
                                        tablahtml+=`<td>${productosRegistradosVista[i].inputiva}</td>`;
                                        tablahtml+=`<td>${productosRegistradosVista[i].importe}</td>`;
                                        tablahtml+=`<td><button type='button' class='btn btn-danger'><i class="fas fa-trash"></i></button></td>`;
                                        tablahtml+=`</tr>`;
                                        $('#tabla').append(tablahtml);
                                        
                                    }
                                });
                            });
                           </script>
                        </tbody>
                    </table>
                </div>
                    
                       
                <!--<a href="#"><button type="button" class="btn btn-warning" onclick="crearVenta()">Cobrar recibo</button></a>
                <br><br>
                <a href="#"><button type="button" class="btn btn-success">Ver ventas registradas</button></a>-->
            </form>
            
        
    </center>
    </div>
    

    
    
    <!--Finaliza Formulario-->
    
    <!--Inicia Footer-->
    <br><br>
    <footer style="background-color: #7ad2ae;">
        <h3>© Todos los derechos reservados</h3>
    </footer>
    <!--Finaliza Footer-->
    
    <script type="text/javascript">
	$(document).ready(function(){

		//$('#tablaVentasTempLoad').load("tablaVentasTemp.php");

        //Trae los valores del select que sea seleccionado
		$('#productoVenta').change(function(){
			$.ajax({ 
				type:"POST",
				data:"id=" + $('#productoVenta').val(),
				url:"../includes/llenarFormProducto.php",
				success:function(r){
					dato=jQuery.parseJSON(r);
                    
					$('#codigoV').val(dato['codigoi']);
                    $('#descripcionV').val(dato['descripcioni']);
					$('#precioV').val(dato['pnetoi']);
					$('#existenciasV').val(dato['existenciasi']);

                   $('#inputcant').removeAttr('disabled');
                   
				}
                 
			});
		});

        //Calcular total
        $('#inputcant').keyup(function(e) {
            e.preventDefault();
            //Calcula el precio x cantidad
            var precio_cant = $(this).val() * $('#precioV').val();
             $('#importeV').val(precio_cant);
             $('#productoVenta').change(function(e){
                        e.preventDefault();

                        $('#inputcant').val('');
                        $('#inputiva').val('');
                        $('#importeV').val('');
                    });
            //Existencia
            var existencia = parseInt($('#existenciasV').val());
            if (($(this).val() < 1 || isNaN($(this).val())) || ($(this).val() > existencia)){
                $('#btnAgregaVenta').slideUp();
            }else {
                $('#btnAgregaVenta').slideDown();
                $('#inputiva').removeAttr('disabled');
                    
                //Sacar el IVA
                $('#inputiva').keyup(function(e) {
                    e.preventDefault();
                    
                    var iva = $('#inputiva').val()*0.01; //Iva se convierte a decimal
                    var ivadeprecio = $('#precioV').val() * iva; //Se saca cuanto es el Iva de cierto precio
                    var ivatotal = $('#inputcant').val() *ivadeprecio; //Multiplica el Iva de cierto precio x cantidad
                    var total = precio_cant + ivatotal; //Suma precio de cantidad + precio de iva total
                    $('#importeV').val(total);

                    $('#productoVenta').change(function(e){
                        e.preventDefault();

                        $('#inputcant').val('');
                        $('#inputiva').val('');
                        $('#importeV').val('');
                    });

                    $('#inputcant').keyup(function(e){
                        e.preventDefault();

                        $('#inputiva').val('');
                    });

                });
            }  
        });

        

        

        //Se activa al tocar el vbotón del carrito de compras
        /*
		$('#btnAgregaVenta').click(function(){
            
            vacios=validarFormVacio('frmVentasProductos');

			if(vacios > 0){
				alert("Los campos no pueden ir vacíos!");
				return false;
			}
            
            var codproducto = $('#productoVenta').val();
            var cantidad = $('#inputcant').val();
            var iva = $('#inputiva').val();
            datos=$('#frmVentasProductos').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"../procesos/agregaProductoTemp.php",
                success:function(r){

                    
                console.log(datos);
                    $('#tablaVentasTempLoad').load("tablaVentasTemp.php");
                }
            });
		});*/
		
/*
		$('#btnVaciarVentas').click(function(){

		$.ajax({
			url:"../procesos/ventas/vaciarTemp.php",
			success:function(r){
				$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
			}
		});
	})*/
})
	
</script>


<script type="text/javascript">/*
	function quitarP(index){
		$.ajax({
			type:"POST",
			data:"ind=" + index,
			url:"../procesos/ventas/quitarproducto.php",
			success:function(r){
				$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
				alertify.success("Se quito el producto :D");
			}
		});
	}

	function crearVenta(){
		$.ajax({
			url:"../procesos/ventas/crearVenta.php",
			success:function(r){
				if(r > 0){
					$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
					$('#frmVentasProductos')[0].reset();
					alertify.alert("Venta creada con exito, consulte la informacion de esta en ventas hechas :D");
				}else if(r==0){
					alertify.alert("No hay lista de venta!!");
				}else{
					alertify.error("No se pudo crear la venta");
				}
			}
		});
	}*/
</script>

<script type="text/javascript">/*
	$(document).ready(function(){
		//$('#clienteVenta').select2();
		$('#productoVenta').select2();

	});*/
</script>

    <script src="../js/venta.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>