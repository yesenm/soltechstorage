<?php

    //Declarar las variables vacías
    $empleado="";
    $rubro="";
    $fecha="";
    $proyecto="";
    $cantidad="";

    //Validar que los campos sean llenados.

    if(isset($_POST['empleado'])){
        $empleado = $_POST['empleado'];
        $rubro = $_POST['rubro'];
        $fecha = $_POST['fecha'];
        $proyecto = $_POST['proyecto'];
        $cantidad = $_POST['cantidad'];
        
        $campos = array();
        
        if($empleado == ""){
            array_push($campos, "El campo de empleado no puede ir vacío");
        }
        
        if($rubro == ""){
            array_push($campos, "Ingrese el rubro del empleado");
        }
        
        if($fecha == ""){
            array_push($campos, "El campo de fecha no puede ir vacío");
        }
        
        if($proyecto == ""){
            array_push($campos, "Especifica el nombre del proyecto");
        }
        
        if($cantidad == ""){
            array_push($campos, "Ingresa la cantidad gastada");
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
            
            $query ="select max(id) as maximo from vendedores";
            $result = mysqli_query($conexion,$query);
            $row = mysqli_fetch_array($result);
            $numero = $row["maximo"];
            $numero++;
            
            function quitarEspacios($dato){
                $dato=trim($dato);
                return $dato;
            }
            
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $empleado=quitarEspacios($_POST["empleado"]);
                $rubro=quitarEspacios($_POST["rubro"]);
                $fecha=quitarEspacios($_POST["fecha"]);
                $proyecto=quitarEspacios($_POST["proyecto"]);
                $cantidad=quitarEspacios($_POST["cantidad"]);
            }
            //Inserta los datos en la base de datos
            if(isset($_REQUEST['agregargasto'])){
                $conexion = mysqli_connect("localhost","root","","soltech");
                
                if(mysqli_connect_errno()){
                    echo "Fallo en la conexión. ".mysqli_connect_error();
                }
                    $sql = ("insert into gastos(empleado, rubro, fecha, proyecto, cantidad)
                    values('$empleado', '$rubro', '$fecha', '$proyecto','$cantidad')");
                    
                    if(!mysqli_query($conexion,$sql)){
                        echo "Error: ".mysqli_error($conexion);
                    }
                    
                    echo "<br><div class='alert alert-success' role='alert'>
                    El gasto se ha registrado correctamente.
                    </div>";
                    ?>
                    <script>
                        setTimeout(() => {
                            window.location= 'gastos.php';
                        }, 3000);
                    </script>
                    <?php
                    
                mysqli_close($conexion);
            }
        }
    }

    
?>