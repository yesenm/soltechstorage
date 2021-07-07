<?php
    //Declarar variables vacías
    $codigoi="";
    $descripcioni="";
    $medidasi="";
    $pmayoreoi="";
    $pbrutoi="";
    $pnetoi="";
    $existenciasi="";
    $proveedoresi="";
    $categoriai="";

    //Validar que los campos sean llenados.
    if(isset($_POST['codigoi'])){
        $codigoi = $_POST['codigoi'];
        $descripcioni = $_POST['descripcioni'];
        $medidasi = $_POST['medidasi'];
        $pmayoreoi = $_POST['pmayoreoi'];
        $pbrutoi = $_POST['pbrutoi'];
        $pnetoi = $_POST['pnetoi'];
        $existenciasi = $_POST['existenciasi'];
        $proveedoresi = $_POST['proveedoresi'];
        $categoriai = $_POST['categoriai'];

        $campos = array();

        if($codigoi == ""){
            array_push($campos, "Ingrese el código del producto");
        }
        if($descripcioni == ""){
            array_push($campos, "La descripción del producto no puede ir vacía");
        }
        if($medidasi == ""){
            array_push($campos, "Ingrese las medidas del producto");
        }
        if($pmayoreoi == ""){
            array_push($campos, "El precio por mayoreo no puede ir vacío");
        }
        if($pbrutoi == ""){
            array_push($campos, "Ingrese el precio bruto del producto");
        }
        if($pnetoi == ""){
            array_push($campos, "Ingrese el precio neto del producto");
        }
        if($existenciasi == ""){
            array_push($campos, "El campo de existencias no puede ir vacío");
        }
        if($proveedoresi == ""){
            array_push($campos, "Seleccione el proveedor del producto");
        }
        if($categoriai == ""){
            array_push($campos, "Seleccione la categoría del producto");
        }

        if(count($campos) > 0){
            echo "<br><div class='alert alert-danger' role='alert'>";;
            for($i = 0; $i < count($campos); $i++){
                echo "<li>" . $campos[$i] . "</li>";
            }
            echo "</div>";   
        

        }else{

            //Conexión con la base de datos
            $conexion = mysqli_connect("localhost","root","","soltech");
            if(mysqli_connect_errno()){
                echo "Fallo en la conexión. ".mysqli_connect_error();
            }

            //Toma los datos que se agregan en los inputs y quita los espacios
            $query ="select max(id) as maximo from inventario";
            $result = mysqli_query($conexion,$query);
            $row = mysqli_fetch_array($result);
            $numero = $row["maximo"];
            $numero++;
            
            function quitarEspacios($dato){
                $dato=trim($dato);
                return $dato;
            }
            
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $codigoi=quitarEspacios($_POST["codigoi"]);
                $descripcioni=quitarEspacios($_POST["descripcioni"]);
                $medidasi=quitarEspacios($_POST["medidasi"]);
                $pmayoreoi=quitarEspacios($_POST["pmayoreoi"]);
                $pbrutoi=quitarEspacios($_POST["pbrutoi"]);
                $pnetoi=quitarEspacios($_POST["pnetoi"]);
                $existenciasi=quitarEspacios($_POST["existenciasi"]);
                $proveedoresi=quitarEspacios($_POST["proveedoresi"]);
                $categoriai=quitarEspacios($_POST["categoriai"]);
            }

            //Inserta los datos en la base de datos
            if(isset($_REQUEST['agregarproducto'])){
                $conexion = mysqli_connect("localhost","root","","soltech");
                if(mysqli_connect_errno()){
                    echo "Fallo en la conexión. ".mysqli_connect_error();
                }

                $instruccion ="SELECT codigoi FROM inventario WHERE codigoi ='$codigoi'";
                if(mysqli_num_rows(mysqli_query($conexion,$instruccion))<=0){

                $sql = ("INSERT INTO inventario(codigoi, descripcioni, medidasi, pmayoreoi, 
                                pbrutoi, pnetoi, existenciasi, proveedoresi, categoriai)
                        VALUES('$codigoi', '$descripcioni', '$medidasi', '$pmayoreoi','$pbrutoi',
                                '$pnetoi', '$existenciasi', '$proveedoresi', '$categoriai')");
                
                echo "<br><div class='alert alert-success' role='alert'>
                El producto se ha registrado correctamente.
                </div>";

                $codigoi="";
                $descripcioni="";
                $medidasi="";
                $pmayoreoi="";
                $pbrutoi="";
                $pnetoi="";
                $existenciasi="";
                $proveedoresi="";
                $categoriai="";
                
                if(!mysqli_query($conexion,$sql)){
                    echo "Error: ".mysqli_error($conexion);
                }
                
                } else if(mysqli_num_rows(mysqli_query($conexion,$instruccion))>0){
                    echo "<br><div class='alert alert-danger' role='alert'>
                    Ya existe un producto con este código.
                    </div>";
                }
                mysqli_close($conexion);
            }
        }
    }
?>