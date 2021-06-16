<?php

            $conexion = mysqli_connect("localhost","root","","soltech");
            if(mysqli_connect_errno()){
                echo "Fallo en la conexión. ".mysqli_connect_error();
            }

        if(isset($_POST['empleado'])){
            $empleadom = $_POST['empleado'];
            $rubrom = $_POST['rubro'];
            $fecham = $_POST['fecha'];
            $proyectom = $_POST['proyecto'];
            $cantidadm = $_POST['cantidad'];
            
            $campos = array();
            
            if($empleadom == ""){
                array_push($campos, "El campo de empleado no puede ir vacío");
            }
            
            if($rubrom == ""){
                array_push($campos, "Ingrese el rubro del empleado");
            }
            
            if($fecham == ""){
                array_push($campos, "El campo de fecha no puede ir vacío");
            }
            
            if($proyectom == ""){
                array_push($campos, "El campo de proyecto no puede ir vacío");
            }
            
            if($cantidadm == "" ){
                array_push($campos, "El campo de cantidad no puede ir vacío");
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
            
            $query ="select max(id) as maximo from gastos";
            $result = mysqli_query($conexion,$query);
            $row = mysqli_fetch_array($result);
            $numero = $row["maximo"];
            $numero++;
            
            function quitarEspacios($dato){
                $dato=trim($dato);
                return $dato;
            }
            
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $empleadom=quitarEspacios($_POST["empleado"]);
                $rubrom=quitarEspacios($_POST["rubro"]);
                $fecham=quitarEspacios($_POST["fecha"]);
                $proyectom=quitarEspacios($_POST["proyecto"]);
                $cantidadm=quitarEspacios($_POST["cantidad"]);
            }

            if(isset($_REQUEST['editarGasto'])){ 
                $id=$_REQUEST['id'];
                    $empleadom = $_REQUEST['empleado'];
                    $rubrom=$_REQUEST['rubro'];
                    $fecham=$_REQUEST['fecha'];
                    $proyectom=$_REQUEST['proyecto'];
                    $cantidadm=$_REQUEST['cantidad'];
    
                    $cambios ="update gastos set empleado ='$empleadom', rubro='$rubrom', fecha='$fecham',
                                proyecto='$proyectom', cantidad='$cantidadm' where id='$id'";
    
                if(mysqli_query($conexion,$cambios)){
                    echo "<br><div class='alert alert-success' role='alert'>
                        Los datos fueron actualizados correctamente.
                        </div>";

                        ?>
                        <script>
                            setTimeout(() => {
                                window.location= "../vistas/gastos.php";
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