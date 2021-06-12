<?php

    //Declarar las variables vacías
    $nombrepo="";
    $telefonopo="";
    $direccionpo ="";
    $correopo="";
    $rfcpo="";

    //Validar que los campos sean llenados.

    if(isset($_POST['nombrepo'])){
        $nombrepo = $_POST['nombrepo'];
        $telefonopo = $_POST['telefonopo'];
        $direccionpo = $_POST['direccionpo'];
        $correopo = $_POST['correopo'];
        $rfcpo = $_POST['rfcpo'];
        
        $campos = array();
        
        if($nombrepo == ""){
            array_push($campos, "El campo de nombre no puede ir vacío");
        }
        
        if($telefonopo == "" || strlen($telefonopo)>11){
            array_push($campos, "El campo de telefono no puede ir vacío ni contener más de diez dígitos");
        }
        
        if($direccionpo == ""){
            array_push($campos, "Ingrese la dirección del cliente");
        }
        
        if($correopo == "" || strpos($correopo, "@") === false){
            array_push($campos, "Ingresa un email válido");
        }
        
        if($rfcpo == ""){
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
                $nombrepo=quitarEspacios($_POST["nombrepo"]);
                $telefonopo=quitarEspacios($_POST["telefonopo"]);
                $direccionpo=quitarEspacios($_POST["direccionpo"]);
                $correopo=quitarEspacios($_POST["correopo"]);
                $rfcpo=quitarEspacios($_POST["rfcpo"]);
            }
            //Inserta los datos en la base de datos y compara si ya existe el cliente ya existe con ese nombre
            if(isset($_REQUEST['Agregar'])){
                $conexion = mysqli_connect("localhost","root","","soltech");
                
                if(mysqli_connect_errno()){
                    echo "Fallo en la conexión. ".mysqli_connect_error();
                }
                
                $instruccion ="select nombrepo from clientespo where nombrepo ='$nombrepo'";

                if(mysqli_num_rows(mysqli_query($conexion,$instruccion))<=0){
                    $insert = ("insert into clientespo(nombrepo, telefonopo, direccionpo, correopo,
                    rfcpo)
                    values('$nombrepo', '$telefonopo', '$direccionpo', '$correopo', 
                    '$rfcpo')");
                    
                    if(!mysqli_query($conexion,$insert)){
                        echo "Error: ".mysqli_error($conexion);
                    }
                    
                    echo "<br><div class='alert alert-success' role='alert'>
                    El cliente potencial se ha registrado
                    </div>";
                    
                } else if(mysqli_num_rows(mysqli_query($conexion,$instruccion))>0){
                    echo "<br><div class='alert alert-danger' role='alert'>
                    Ya existe el cliente.
                    </div>";
                }
                mysqli_close($conexion);
            }
        }
    }

    
?>