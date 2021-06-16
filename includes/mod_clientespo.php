<?php

            $conexion = mysqli_connect("localhost","root","","soltech");
            if(mysqli_connect_errno()){
                echo "Fallo en la conexión. ".mysqli_connect_error();
            }

        if(isset($_POST['nombrepo'])){
            $nombre = $_POST['nombrepo'];
            $telefono = $_POST['telefonopo'];
            $direccion = $_POST['direccionpo'];
            $correo = $_POST['correopo'];
            $rfc = $_POST['rfcpo'];
            
            $campos = array();
            
            if($nombre == ""){
                array_push($campos, "El campo de nombre no puede ir vacío");
            }
            
            if($telefono == "" || strlen($telefono)>11){
                array_push($campos, "El campo de telefono no puede ir vacío o contener más de diez dígitos");
            }
            
            if($direccion == ""){
                array_push($campos, "Ingrese la dirección del cliente");
            }
            
            if($correo == "" || strpos($correo, "@") === false){
                array_push($campos, "Ingresa un email válido");
            }
            
            if($rfc == ""){
                array_push($campos, "El campo de RFC no puede ir vacío");
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
            
            $query ="select max(id) as maximo from clientespo";
            $result = mysqli_query($conexion,$query);
            $row = mysqli_fetch_array($result);
            $numero = $row["maximo"];
            $numero++;
            
            function quitarEspacios($dato){
                $dato=trim($dato);
                return $dato;
            }
            
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $nombre=quitarEspacios($_POST["nombrepo"]);
                $telefono=quitarEspacios($_POST["telefonopo"]);
                $direccion=quitarEspacios($_POST["direccionpo"]);
                $correo=quitarEspacios($_POST["correopo"]);
                $rfc=quitarEspacios($_POST["rfcpo"]);
            }

            if(isset($_REQUEST['editarclip'])){ 
                $id=$_REQUEST['id'];
                    $nombre = $_REQUEST['nombrepo'];
                    $telefono=$_REQUEST['telefonopo'];
                    $direccion=$_REQUEST['direccionpo'];
                    $correo=$_REQUEST['correopo'];
                    $rfc=$_REQUEST['rfcpo'];


    
                    $cambios ="update clientespo set nombrepo ='$nombre',telefonopo='$telefono', direccionpo='$direccion',
                                correopo='$correo', rfcpo='$rfc' where id='$id'";
    
                if(mysqli_query($conexion,$cambios)){
                    echo "<br><div class='alert alert-success' role='alert'>
                        Los datos fueron actualizados correctamente.
                        </div>";

                        ?>
                        <script>
                            setTimeout(() => {
                                window.location= "../vistas/clientespo.php";
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