<?php
        //Conexión a la base de datos
        $conexion = mysqli_connect("localhost","root","","soltech");
        if(mysqli_connect_errno()){
            echo "Fallo en la conexión. ".mysqli_connect_error();
        }

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

            //Conexión a la base de datos
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

            if(isset($_REQUEST['editarproducto'])){ 
                    $id=$_REQUEST['id'];
                    $codigoi= $_REQUEST['codigoi'];
                    $descripcioni=$_REQUEST['descripcioni'];
                    $medidasi=$_REQUEST['medidasi'];
                    $pmayoreoi=$_REQUEST['pmayoreoi'];
                    $pbrutoi=$_REQUEST['pbrutoi'];
                    $pnetoi=$_REQUEST['pnetoi'];
                    $existenciasi=$_REQUEST['existenciasi'];
                    $proveedoresi=$_REQUEST['proveedoresi'];
                    $categoriai=$_REQUEST['categoriai'];

    
                    $cambios ="UPDATE inventario SET codigoi ='$codigoi', 
                                descripcioni='$descripcioni', 
                                medidasi='$medidasi',
                                pmayoreoi='$pmayoreoi', 
                                pbrutoi='$pbrutoi',
                                pnetoi='$pnetoi',
                                existenciasi='$existenciasi',
                                proveedoresi='$proveedoresi',
                                categoriai='$categoriai' WHERE id='$id'";
    
                if(mysqli_query($conexion,$cambios)){
                    echo "<br><div class='alert alert-success' role='alert'>
                        Los datos fueron actualizados correctamente.
                        </div>";

                        ?>
                        <script>
                            setTimeout(() => {
                                window.location= "../admin/inventario.php";
                            }, 3000);
                        </script>
                        <?php
                }
                
                if(!mysqli_query($conexion,$cambios)){
                    echo"Error".mysqli_error($conexion);
                }
            }
            mysqli_close($conexion);
        }
    }
?>