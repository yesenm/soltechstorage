<?php
include("admin_menu.php");
?>
<!doctype html>
<html lang="es">
<body>
    <br>
    <div class="container">
        <center>
            <!--Inicia Formulario-->
            <h4>Agrega un nuevo producto</h4>
                <?php 
                include("../../includes/insinventario.php");
                ?>
            <br>
            
        <form id="PForm" class="rounded-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row">
                <div class="col-md-4">
                    <label>Código del producto</label>
                    <div class="input-group">
                        <input id="codigoi" type="text" class="form-control" name="codigoi" value="<?php echo $codigoi; ?>" placeholder="Código del producto">
                    </div>
                </div>
                <div class="col-md-8">
                    <label>Descripción</label>
                    <div class="input-group">
                        <input id="descripcioni" type="text" class="form-control" name="descripcioni" value="<?php echo $descripcioni; ?>" placeholder="Descripción del producto">
                    </div>
                </div>
                <div class="col-md-3"><br>
                    <label>Medidas</label>
                    <div class="input-group">
                        <input id="medidasi" type="text" class="form-control" name="medidasi" value="<?php echo $medidasi; ?>" placeholder="Medidas">
                    </div>
                </div>
                <div class="col-md-3"><br>
                    <label>Precio por mayreo</label>
                    <div class="input-group">
                        <input id="pmayoreoi" type="number" min="0" class="form-control" name="pmayoreoi" value="<?php echo $pmayoreoi; ?>" placeholder="Precio por mayoreo">
                    </div>
                </div>
                <div class="col-md-3"><br>
                    <label>Precio bruto</label>
                    <div class="input-group">
                        <input id="pbrutoi" type="number" min="0" class="form-control" name="pbrutoi" value="<?php echo $pbrutoi; ?>" placeholder="Precio bruto">
                    </div>
                </div>
                <div class="col-md-3"><br>
                    <label>Precio neto</label>
                    <div class="input-group">
                        <input id="pnetoi" type="number" min="0" class="form-control" name="pnetoi" value="<?php echo $pnetoi; ?>" placeholder="Precio neto">
                    </div>
                </div>
                <div class="col-md-4"><br>
                    <label>Existencias</label>
                    <div class="input-group">
                        <input id="pexistenciasi" type="number" min="0" class="form-control" name="existenciasi" value="<?php echo $existenciasi; ?>" placeholder="Existencias">
                    </div>
                </div>
                <div class="col-md-4"><br>
                <div id="proveedores">
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
                </div>
                <div class="col-md-4"><br>
                    <label class="form-label">Categoría</label>
                    <div class="input-group">
                        <select class="form-select" name="categoriai" id="categoriai">
                            <option value="Accesorios" <?php if($categoriai == 'Accesorios') echo "selected"; ?>>Accesorios</option>
                            <option value="Aspersores" <?php if($categoriai == "Aspersores") echo "selected"; ?>>Aspersores</option>
                            <option value="CED. 40" <?php if($categoriai == "CED. 40") echo "selected"; ?>>CED. 40</option>
                            <option value="CED. 80" <?php if($categoriai == "CED. 80") echo "selected"; ?>>CED. 80</option>
                            <option value="Compuerta" <?php if($categoriai == "Compuerta") echo "selected"; ?>>Compuerta</option>
                            <option value="Conex. Aluminio" <?php if($categoriai == "Conex. Aluminio") echo "selected"; ?>>Conex. Aluminio</option>
                            <option value="Conex. Regantes" <?php if($categoriai == "Conex. Regantes") echo "selected"; ?>>Conex. Regantes</option>
                            <option value="Combustibles" <?php if($categoriai == "Combustibles") echo "selected"; ?>>Combustibles</option>
                            <option value="Fertiriego" <?php if($categoriai == "Fertiriego") echo "selected"; ?>>Fertiriego</option>
                            <option value="Filtración" <?php if($categoriai == "Filtración") echo "selected"; ?>>Filtración</option>
                            <option value="Galvanizados" <?php if($categoriai == "Galvanizados") echo "selected"; ?>>Galvanizados</option>
                            <option value="Geomembrana" <?php if($categoriai == "Geomembrana") echo "selected"; ?>>Geomembrana</option>
                            <option value="Medidores" <?php if($categoriai == "Medidores") echo "selected"; ?>>Medidores</option>
                            <option value="Micro y Goteo" <?php if($categoriai == "Micro y Goteo") echo "selected"; ?>>Micro y Goteo</option>
                            <option value="Paneles" <?php if($categoriai == "Paneles") echo "selected"; ?>>Paneles</option>
                            <option value="Pzas Taller" <?php if($categoriai == "Pzas Taller") echo "selected"; ?>>Pzas Taller</option>
                            <option value="Equipos Mecanizados" <?php if($categoriai == "Equipos Mecanizados") echo "selected"; ?>>Equipos Mecanizados</option>
                            <option value="PEBD" <?php if($categoriai == "PEBD") echo "selected"; ?>>PEBD</option>
                            <option value="Bombeo" <?php if($categoriai == "Bombeo") echo "selected"; ?>>Bombeo</option>
                            <option value="Tuberías" <?php if($categoriai == "Tuberías") echo "selected"; ?>>Tuberías</option>
                            <option value="LAY FLAT" <?php if($categoriai == "LAY FLAT") echo "selected"; ?>>LAY FLAT</option>
                            <option value="Válvulas" <?php if($categoriai == "Válvulas") echo "selected"; ?>>Válvulas</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="col-md-12"><br>
                    <button type="submit" class="btn btn-primary" name="agregarproducto" value="agregarproducto">Agregar Producto</button>
                    <a href="inventario.php"><button type="button" class="btn btn-warning">Ir a inventario</button></a>
                </div>
            </div>
        </form>
        </center><br>
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