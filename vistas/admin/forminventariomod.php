<?php

    include("admin_menu.php");

    //Creacion de consulta para llenar los campos correctamente
    $consulta = ConsultarVendedor($_GET['id']);

    function ConsultarVendedor($id_prod){

        //Conexión con la base de datos
    $conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){
        echo "Fallo en la conexión. ".mysqli_connect_error();
    }
        $sentencia="SELECT * FROM inventario WHERE id='".$id_prod."'";
        $resultado= $conexion->query($sentencia);
        $row=mysqli_fetch_assoc($resultado);
        return [
            $row['id'],
            $row['codigoi'],
            $row['descripcioni'],
            $row['medidasi'],
            $row['pmayoreoi'],
            $row['pbrutoi'],
            $row['pnetoi'],
            $row['existenciasi'],
            $row['proveedoresi'],
            $row['categoriai']
        ];
    }
?>
<!doctype html>
<html lang="es">
<body>
    <br>
    <div class="container">
        <center>
            <!--Inicia Formulario-->
            <h4>Actualiza la información del producto</h4>
            <?php
                include("../../includes/mod_producto.php");
            ?>
            <br>
            
            <form id="PForm" class="rounded-3" method="POST" action="">
            <input type="hidden" name="id" id="update_id" value="<?php echo $_GET['id'];?>">
            <div class="row">
                    <div class="col-md-4">
                        <label>Código del producto</label>
                        <div class="input-group">
                            <input id="codigoi" type="text" class="form-control" name="codigoi" value="<?php echo $consulta[1]; ?>" placeholder="Ingresa la descripcion del producto">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label>Descripción</label>
                        <div class="input-group">
                            <input id="descripcioni" type="text" class="form-control" name="descripcioni" value="<?php echo $consulta[2]; ?>" placeholder="Escribe la descripción del producto">
                        </div>
                    </div>
                    <div class="col-md-3"><br>
                        <label>Medidas</label>
                        <div class="input-group">
                            <input id="medidasi" type="text" class="form-control" name="medidasi" value="<?php echo $consulta[3]; ?>" placeholder="Ingresa las medidas del producto">
                        </div>
                    </div>
                    <div class="col-md-3"><br>
                        <label>Precio por mayreo</label>
                        <div class="input-group">
                            <input id="pmayoreoi" type="number" class="form-control" name="pmayoreoi" value="<?php echo $consulta[4]; ?>" placeholder="Escribe el precio por mayoreo">
                        </div>
                    </div>
                    <div class="col-md-3"><br>
                        <label>Precio bruto</label>
                        <div class="input-group">
                            <input id="pbrutoi" type="number" class="form-control" name="pbrutoi" value="<?php echo $consulta[5]; ?>" placeholder="Escribe el precio bruto">
                        </div>
                    </div>
                    <div class="col-md-3"><br>
                        <label>Precio neto</label>
                        <div class="input-group">
                            <input id="pnetoi" type="number" class="form-control" name="pnetoi" value="<?php echo $consulta[6]; ?>" placeholder="Ingresa el precio neto">
                        </div>
                    </div>
                    <div class="col-md-4"><br>
                        <label>Existencias</label>
                        <div class="input-group">
                            <input id="pexistenciasi" type="number" class="form-control" name="existenciasi" value="<?php echo $consulta[7]; ?>" placeholder="Ingresa la cantidad de existencias">
                        </div>
                    </div>
                    <div id="proveedores"class="col-md-4"><br>
                        <label>Elige el proveedor</label>
                        <div class="input-group">
                        <select class="form-select" name="proveedoresi" id="proveedoresi">
                        
                        <?php
                            //Conexión con la base de datos
                            $conexion = mysqli_connect("localhost","root","","soltech");
                            if(mysqli_connect_errno()){
                                echo "Fallo en la conexión. ".mysqli_connect_error();
                            }

                            //Consulta
                            $consulta ="SELECT * FROM proveedores";
                            $ejecutar = mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));
                        ?>
                        <?php foreach ($ejecutar as $opciones):?>
                        
                        <option value="<?php echo $opciones['nombrep']; ?>"><?php echo $opciones['nombrep']; ?></option>
                        
                        <?php endforeach ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-4"><br>
                    <label class="form-label">Categoría</label>
                    <div class="input-group">
                    <select class="form-select" name="categoriai" id="categoriai">
                        <option value="Accesorios" <?php if($consulta[9] == "Accesorios") echo "selected"; ?>>Accesorios</option>
                        <option value="Aspersores" <?php if($consulta[9] == "Aspersores") echo "selected"; ?>>Aspersores</option>
                        <option value="CED. 40" <?php if($consulta[9] == "CED. 40") echo "selected"; ?>>CED. 40</option>
                        <option value="CED. 80" <?php if($consulta[9] == "CED. 80") echo "selected"; ?>>CED. 80</option>
                        <option value="Compuerta" <?php if($consulta[9] == "Compuerta") echo "selected"; ?>>Compuerta</option>
                        <option value="Conex. Aluminio" <?php if($consulta[9] == "Conex. Aluminio") echo "selected"; ?>>Conex. Aluminio</option>
                        <option value="Conex. Regantes" <?php if($consulta[9] == "Conex. Regantes") echo "selected"; ?>>Conex. Regantes</option>
                        <option value="Combustibles" <?php if($consulta[9] == "Combustibles") echo "selected"; ?>>Combustibles</option>
                        <option value="Fertiriego" <?php if($consulta[9] == "Fertiriego") echo "selected"; ?>>Fertiriego</option>
                        <option value="Filtración" <?php if($consulta[9] == "Filtración") echo "selected"; ?>>Filtración</option>
                        <option value="Galvanizados" <?php if($consulta[9] == "Galvanizados") echo "selected"; ?>>Galvanizados</option>
                        <option value="Geomembrana" <?php if($consulta[9] == "Geomembrana") echo "selected"; ?>>Geomembrana</option>
                        <option value="Medidores" <?php if($consulta[9] == "Medidores") echo "selected"; ?>>Medidores</option>
                        <option value="Micro y Goteo" <?php if($consulta[9] == "Micro y Goteo") echo "selected"; ?>>Micro y Goteo</option>
                        <option value="Paneles" <?php if($consulta[9] == "Paneles") echo "selected"; ?>>Paneles</option>
                        <option value="Pzas Taller" <?php if($consulta[9] == "Pzas Taller") echo "selected"; ?>>Pzas Taller</option>
                        <option value="Equipos Mecanizados" <?php if($consulta[9] == "Equipos Mecanizados") echo "selected"; ?>>Equipos Mecanizados</option>
                        <option value="PEBD" <?php if($consulta[9] == "PEBD") echo "selected"; ?>>PEBD</option>
                        <option value="Bombeo" <?php if($consulta[9] == "Bombeo") echo "selected"; ?>>Bombeo</option>
                        <option value="Tuberías" <?php if($consulta[9] == "Tuberías") echo "selected"; ?>>Tuberías</option>
                        <option value="LAY FLAT" <?php if($consulta[9] == "LAY FLAT") echo "selected"; ?>>LAY FLAT</option>
                        <option value="Válvulas" <?php if($consulta[9] == "Válvulas") echo "selected"; ?>>Válvulas</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-md-12"><br>
                    <button type="submit" class="btn btn-primary" name="editarproducto" value="editarproducto">Editar Producto</button>
                    <a href="inventario.php"><button type="button" class="btn btn-warning">Cancelar</button></a>
                    </div>
                </div>
            </form><br>
        </center>
    </div>
        <!--Finaliza Formulario-->
    
    <!--Inicia Footer-->
    <?php
    include("admin_footer.php");
    ?>
    <!--Finaliza Footer-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>