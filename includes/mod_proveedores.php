<?php

            $conexion = mysqli_connect("localhost","root","","soltech");
            if(mysqli_connect_errno()){
                echo "Fallo en la conexión. ".mysqli_connect_error();
            }

        if(isset($_POST['nombrep'])){
            $nombre = $_POST['nombrep'];
            $telefono = $_POST['telefonop'];
            $direccion = $_POST['direccionp'];
            $correo = $_POST['correop'];
            $rfc = $_POST['rfcp'];
            $productos = $_POST['productosp'];
            $empresa = $_POST['empresap'];
            
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
            
            if($productos == ""){
                array_push($campos, "El campo de productos no puede ir vacío");
            }
            
            if($empresa == "" ){
                array_push($campos, "El campo de empresa no puede ir vacío");
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
            
            $query ="select max(id) as maximo from proveedores";
            $result = mysqli_query($conexion,$query);
            $row = mysqli_fetch_array($result);
            $numero = $row["maximo"];
            $numero++;
            
            function quitarEspacios($dato){
                $dato=trim($dato);
                return $dato;
            }
            
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $empresa=quitarEspacios($_POST["empresap"]);
                $nombre=quitarEspacios($_POST["nombrep"]);
                $telefono=quitarEspacios($_POST["telefonop"]);
                $direccion=quitarEspacios($_POST["direccionp"]);
                $correo=quitarEspacios($_POST["correop"]);
                $rfc=quitarEspacios($_POST["rfcp"]);
                $productos=quitarEspacios($_POST["productosp"]);
            }

            if(isset($_REQUEST['editarpro'])){ 
                $id=$_REQUEST['id'];
                    $nombre = $_REQUEST['nombrep'];
                    $telefono=$_REQUEST['telefonop'];
                    $direccion=$_REQUEST['direccionp'];
                    $correo=$_REQUEST['correop'];
                    $rfc=$_REQUEST['rfcp'];
                    $productos=$_REQUEST['productosp'];
                    $empresa=$_REQUEST['empresap'];


    
                    $cambios ="update proveedores set nombrep ='$nombre',telefonop='$telefono', direccionp='$direccion',
                                correop='$correo', rfcp='$rfc', productosp='$productos', empresap='$empresa' where id='$id'";
    
                if(mysqli_query($conexion,$cambios)){
                    echo "<br><div class='alert alert-success' role='alert'>
                        Los datos fueron actualizados correctamente.
                        </div>";

                        ?>
                        <script>
                            setTimeout(() => {
                                window.location= "../vistas/proveedores.php";
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