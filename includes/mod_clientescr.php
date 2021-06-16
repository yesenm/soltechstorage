<?php

            $conexion = mysqli_connect("localhost","root","","soltech");
            if(mysqli_connect_errno()){
                echo "Fallo en la conexión. ".mysqli_connect_error();
            }

        if(isset($_POST['nombrecr'])){
            $nombre = $_POST['nombrecr'];
            $telefono = $_POST['telefonocr'];
            $direccion = $_POST['direccioncr'];
            $correo = $_POST['correocr'];
            $rfc = $_POST['rfccr'];
            $cantidad = $_POST['cantidadcr'];
            $fecha = $_POST['fechalicr'];
            
            $campos = array();
            
            if($nombre == ""){
                array_push($campos, "El campo de nombre no puede ir vacío");
            }
            
            if($telefono == "" || strlen($telefono)>11){
                array_push($campos, "El campo de telefono no puede ir vacío o contener más de diez dígitos");
            }
            
            if($direccion == ""){
                array_push($campos, "Ingrese la dirección del proveedor");
            }
            
            if($correo == "" || strpos($correo, "@") === false){
                array_push($campos, "Ingresa un email válido");
            }
            
            if($rfc == ""){
                array_push($campos, "El campo de RFC no puede ir vacío");
            }
            
            if($cantidad == ""){
                array_push($campos, "El campo de cantidad no puede ir vacío");
            }
            
            if($fecha == "" ){
                array_push($campos, "El campo de fecha no puede ir vacío");
            }
            
            if(count($campos) > 0){
                echo "<br><div class='alert alert-danger' role='alert'>";;
                for($i = 0; $i < count($campos); $i++){
                    echo "<li>" . $campos[$i] . "</li>";
                }
                echo "</div>";   
        }else{
            //Toma los datos que se agregan en los inputs y quita los espacios
            $conexion = mysqli_connect("localhost","root","","soltech");
            if(mysqli_connect_errno()){
                echo "Fallo en la conexión. ".mysqli_connect_error();
            }
            
            $query ="select max(id) as maximo from clientescr";
            $result = mysqli_query($conexion,$query);
            $row = mysqli_fetch_array($result);
            $numero = $row["maximo"];
            $numero++;
            
            function quitarEspacios($dato){
                $dato=trim($dato);
                return $dato;
            }
            
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $empresa=quitarEspacios($_POST["cantidadcr"]);
                $nombre=quitarEspacios($_POST["nombrecr"]);
                $telefono=quitarEspacios($_POST["telefonocr"]);
                $direccion=quitarEspacios($_POST["direccioncr"]);
                $correo=quitarEspacios($_POST["correocr"]);
                $rfc=quitarEspacios($_POST["rfccr"]);
                $productos=quitarEspacios($_POST["fechalicr"]);
            }

            if(isset($_REQUEST['editarclientcr'])){ 
                $id=$_REQUEST['id'];
                    $nombre = $_REQUEST['nombrecr'];
                    $telefono=$_REQUEST['telefonocr'];
                    $direccion=$_REQUEST['direccioncr'];
                    $correo=$_REQUEST['correocr'];
                    $rfc=$_REQUEST['rfccr'];
                    $cantidad=$_REQUEST['cantidadcr'];
                    $fecha=$_REQUEST['fechalicr'];


    
                    $cambios ="update clientescr set nombrecr ='$nombre',telefonocr='$telefono', direccioncr='$direccion',
                                correocr='$correo', rfccr='$rfc', cantidadcr='$cantidad', fechalicr='$fecha' where id='$id'";
    
                if(mysqli_query($conexion,$cambios)){
                    echo "<br><div class='alert alert-success' role='alert'>
                        Los datos fueron actualizados correctamente.
                        </div>";

                        ?>
                        <script>
                            setTimeout(() => {
                                window.location= "../vistas/clientescr.php";
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