<?php

    //Declarar las variables vacías
    $nombrecr="";
    $telefonocr="";
    $direccioncr ="";
    $correocr="";
    $rfccr="";
    $cantidadcr="";
    $fechalicr="";

    //Validar que los campos sean llenados.

    if(isset($_POST['nombrecr'])){
        $nombrecr = $_POST['nombrecr'];
        $telefonocr = $_POST['telefonocr'];
        $direccioncr = $_POST['direccioncr'];
        $correocr = $_POST['correocr'];
        $rfccr = $_POST['rfccr'];
        $cantidadcr = $_POST['cantidadcr'];
        $fechalicr = $_POST['fechalicr'];
        
        $campos = array();
        
        if($nombrecr == ""){
            array_push($campos, "El campo de nombre no puede ir vacío");
        }
        
        if($telefonocr == "" || strlen($telefonocr)>11){
            array_push($campos, "El campo de telefono no puede ir vacío ni contener más de diez dígitos");
        }
        
        if($direccioncr == ""){
            array_push($campos, "Ingrese la dirección del cliente");
        }
        
        if($correocr == "" || strpos($correocr, "@") === false){
            array_push($campos, "Ingresa un email válido");
        }
        
        if($rfccr == ""){
            array_push($campos, "El campo de RFC no puede ir vacío");
        }
        
        if($cantidadcr == ""){
            array_push($campos, "Especifica la cantidad de prestamo");
        }
        
        if($fechalicr == ""){
            array_push($campos, "Selecciona la fecha límite para cubrir el prestamo");
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
                $nombrecr=quitarEspacios($_POST["nombrecr"]);
                $telefonocr=quitarEspacios($_POST["telefonocr"]);
                $direccioncr=quitarEspacios($_POST["direccioncr"]);
                $correocr=quitarEspacios($_POST["correocr"]);
                $rfccr=quitarEspacios($_POST["rfccr"]);
                $cantidadcr=quitarEspacios($_POST["cantidadcr"]);
                $fechalicr=quitarEspacios($_POST["fechalicr"]);
            }
            //Inserta los datos en la base de datos y compara si ya existe el cliente ya existe con ese nombre
            if(isset($_REQUEST['registrar'])){
                $conexion = mysqli_connect("localhost","root","","soltech");
                
                if(mysqli_connect_errno()){
                    echo "Fallo en la conexión. ".mysqli_connect_error();
                }
                
                $instruccion ="select nombrecr from clientescr where nombrecr ='$nombrecr'";

                if(mysqli_num_rows(mysqli_query($conexion,$instruccion))<=0){
                    $insert = ("insert into clientescr(nombrecr, telefonocr, direccioncr, correocr,
                    rfccr, cantidadcr, restantecr, fechalicr)
                    values('$nombrecr', '$telefonocr', '$direccioncr', '$correocr', 
                    '$rfccr', '$cantidadcr', '$cantidadcr','$fechalicr')");
                    
                    if(!mysqli_query($conexion,$insert)){
                        echo "Error: ".mysqli_error($conexion);
                    }
                    
                    echo "<br><div class='alert alert-success' role='alert'>
                    El crédito del cliente se ha registrado correctamente.
                    </div>";
                    
                } else if(mysqli_num_rows(mysqli_query($conexion,$instruccion))>0){
                    echo "<br><div class='alert alert-danger' role='alert'>
                    Ya existe un crédito con este nombre de cliente.
                    </div>";
                }
                mysqli_close($conexion);
            }
        }
    }

    
?>