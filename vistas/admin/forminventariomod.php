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

    $categoria = $consulta[9];

    if($categoria == "Accesorios"){
        $selectcat = 1;
    }else if($categoria == "Aspersores"){
        $selectcat = 2;
    }else if($categoria == "CED. 40"){
        $selectcat = 3;
    }else if($categoria == "CED. 80"){
        $selectcat = 4;
    }else if($categoria == "Compuerta"){
        $selectcat = 5;
    }else if($categoria == "Conex. Aluminio"){
        $selectcat = 6;
    }else if($categoria == "Conex. Regantes"){
        $selectcat = 7;
    }else if($categoria == "Combustibles"){
        $selectcat = 8;
    }else if($categoria == "Fertiriego"){
        $selectcat = 9;
    }else if($categoria == "Filtración"){
        $selectcat = 10;
    }else if($categoria == "Galvanizados"){
        $selectcat = 11;
    }else if($categoria == "Geomembrana"){
        $selectcat = 12;
    }else if($categoria == "Medidores"){
        $selectcat = 13;
    }else if($categoria == "Micro y Goteo"){
        $selectcat = 14;
    }else if($categoria == "Paneles"){
        $selectcat = 15;
    }else if($categoria == "Pzas Taller"){
        $selectcat = 16;
    }else if($categoria == "Equipos Mecanizados"){
        $selectcat = 17;
    }else if($categoria == "PEBD"){
        $selectcat = 18;
    }else if($categoria == "Bombeo"){
        $selectcat = 19;
    }else if($categoria == "Tuberías"){
        $selectcat = 20;
    }else if($categoria == "LAY FLAT"){
        $selectcat = 21;
    }else if($categoria == "Válvulas"){
        $selectcat = 22;
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
                            <input id="pmayoreoi" type="number" min="0" class="form-control" name="pmayoreoi" value="<?php echo $consulta[4]; ?>" placeholder="Escribe el precio por mayoreo">
                        </div>
                    </div>
                    <div class="col-md-3"><br>
                        <label>Precio bruto</label>
                        <div class="input-group">
                            <input id="pbrutoi" type="number" min="0" class="form-control" name="pbrutoi" value="<?php echo $consulta[5]; ?>" placeholder="Escribe el precio bruto">
                        </div>
                    </div>
                    <div class="col-md-3"><br>
                        <label>Precio neto</label>
                        <div class="input-group">
                            <input id="pnetoi" type="number" min="0" class="form-control" name="pnetoi" value="<?php echo $consulta[6]; ?>" placeholder="Ingresa el precio neto">
                        </div>
                    </div>
                    <div class="col-md-4"><br>
                        <label>Existencias</label>
                        <div class="input-group">
                            <input id="pexistenciasi" type="number" min="0" class="form-control" name="existenciasi" value="<?php echo $consulta[7]; ?>" placeholder="Ingresa la cantidad de existencias">
                        </div>
                    </div>
                    <div class="col-md-4"><br>
                        <label>Proveedor</label>
                        <div class="input-group">
                            <input id="proveedoresi" type="text" class="form-control" name="proveedoresi" value="<?php echo $consulta[8]; ?>" placeholder="Ingresa el nombre del proveedor">
                        </div>
                    </div>
                    <div class="col-md-4"><br>
                    <label class="form-label">Categoría</label>
                    <div class="input-group">
                    <select class="form-select" name="categoriai" id="categoriai">
                        <option value="Accesorios" <?php if($selectcat == 1){ ?> selected <?php }?>>Accesorios</option>
                        <option value="Aspersores" <?php if($selectcat == 2){ ?> selected<?php } ?>>Aspersores</option>
                        <option value="CED. 40" <?php if($selectcat == 3) { ?> selected<?php }?>>CED. 40</option>
                        <option value="CED. 80" <?php if($selectcat == 4) { ?> selected<?php } ?>>CED. 80</option>
                        <option value="Compuerta" <?php if($selectcat == 5) { ?> selected<?php } ?>>Compuerta</option>
                        <option value="Conex. Aluminio" <?php if($selectcat == 6) { ?> selected<?php } ?>>Conex. Aluminio</option>
                        <option value="Conex. Regantes" <?php if($selectcat == 7){ ?> selected<?php } ?>>Conex. Regantes</option>
                        <option value="Combustibles" <?php if($selectcat == 8) { ?> selected<?php } ?>>Combustibles</option>
                        <option value="Fertiriego" <?php if($selectcat == 9) { ?> selected<?php } ?>>Fertiriego</option>
                        <option value="Filtración" <?php if($selectcat == 10) { ?> selected<?php } ?>>Filtración</option>
                        <option value="Galvanizados" <?php if($selectcat == 11) { ?> selected<?php } ?>>Galvanizados</option>
                        <option value="Geomembrana" <?php if($selectcat == 12) { ?> selected<?php } ?>>Geomembrana</option>
                        <option value="Medidores" <?php if($selectcat == 13) { ?> selected<?php } ?>>Medidores</option>
                        <option value="Micro y Goteo" <?php if($selectcat == 14) { ?> selected<?php } ?>>Micro y Goteo</option>
                        <option value="Paneles" <?php if($selectcat == 15) { ?> selected<?php } ?>>Paneles</option>
                        <option value="Pzas Taller" <?php if($selectcat == 16) { ?> selected<?php } ?>>Pzas Taller</option>
                        <option value="Equipos Mecanizados" <?php if($selectcat == 17) { ?> selected<?php } ?>>Equipos Mecanizados</option>
                        <option value="PEBD" <?php if($selectcat == 18) { ?> selected<?php } ?>>PEBD</option>
                        <option value="Bombeo" <?php if($selectcat == 19) { ?> selected<?php } ?>>Bombeo</option>
                        <option value="Tuberías" <?php if($selectcat == 20) { ?> selected<?php } ?>>Tuberías</option>
                        <option value="LAY FLAT" <?php if($selectcat == 21) { ?> selected<?php } ?>>LAY FLAT</option>
                        <option value="Válvulas" <?php if($selectcat == 22) { ?> selected<?php } ?>>Válvulas</option>
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