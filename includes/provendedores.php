<?php

    //Declarar las variables vacías
    $nombrev="";
    $telefonov="";
    $direccionv="";
    $correov="";
    $rfcv="";
    $nameuser="";
    $pass_cifrado="";
    $id_rol="";

    //Validar que los campos sean llenados.

    if(isset($_POST['nombrev'])){
        $nombrev = $_POST['nombrev'];
        $telefonov = $_POST['telefonov'];
        $direccionv = $_POST['direccionv'];
        $correov = $_POST['correov'];
        $rfcv = $_POST['rfcv'];
        $nameuser = $_POST['nameuser'];
        $contrasena = $_POST['contrasena'];
        $id_rol = $_POST['id_rol'];
        
        $campos = array();
        
        if($nombrev == ""){
            array_push($campos, "El campo de nombre no puede ir vacío");
        }
        
        if($telefonov == "" || strlen($telefonov)>11){
            array_push($campos, "El campo de telefono no puede ir vacío o contener más de diez dígitos");
        }
        
        if($direccionv == ""){
            array_push($campos, "Ingrese la dirección del usuario");
        }
        
        if($correov == "" || strpos($correov, "@") === false){
            array_push($campos, "Ingresa un email válido");
        }
        
        if($rfcv == ""){
            array_push($campos, "El campo de RFC no puede ir vacío");
        }
        
        if($nameuser == ""){
            array_push($campos, "Ingresa el nombre del usuario");
        }
        
        if($contrasena = "" || strlen($contrasena)<8){
            array_push($campos, "La contraseña no puede ir vacía ni contener menos de 8 caracteres");
        }
        
        if($id_rol == ""){
            array_push($campos, "Selecciona el tipo de rol que tendrá el usuario");
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
                $contrasena=quitarEspacios($_POST["contrasena"]);
                $nombrev=quitarEspacios($_POST["nombrev"]);
                $telefonov=quitarEspacios($_POST["telefonov"]);
                $direccionv=quitarEspacios($_POST["direccionv"]);
                $correov=quitarEspacios($_POST["correov"]);
                $rfcv=quitarEspacios($_POST["rfcv"]);
                $nameuser=quitarEspacios($_POST["nameuser"]);
                $id_rol=quitarEspacios($_POST["id_rol"]);
            }
            //Inserta los datos en la base de datos y compara si ya existe el usuario con ese nombre
            if(isset($_REQUEST['enviar'])){
                $pass_cifrado=password_hash($contrasena,PASSWORD_DEFAULT, array("cost"=>10));
                $conexion = mysqli_connect("localhost","root","","soltech");
                
                if(mysqli_connect_errno()){
                    echo "Fallo en la conexión. ".mysqli_connect_error();
                }
                
                $instruccion ="select nameuser from vendedores where nameuser ='$nameuser'";
                if(mysqli_num_rows(mysqli_query($conexion,$instruccion))<=0){
                    $insert = ("insert into vendedores(nombrev, telefonov, direccionv, correov,
                    rfcv, nameuser, contrasena, id_rol)
                    values('$nombrev', '$telefonov', '$direccionv', '$correov', 
                    '$rfcv', '$nameuser', '$pass_cifrado','$id_rol')");

                    $nombrev="";
                    $telefonov="";
                    $direccionv="";
                    $correov="";
                    $rfcv="";
                    $nameuser="";
                    $pass_cifrado="";
                    $id_rol="";
                    
                    if(!mysqli_query($conexion,$insert)){
                        echo "Error: ".mysqli_error($conexion);
                    }
                    
                    echo "<br><div class='alert alert-success' role='alert'>
                    El usuario se ha registrado correctamente.
                    </div>";
                    
                } else if(mysqli_num_rows(mysqli_query($conexion,$instruccion))>0){
                    echo "<br><div class='alert alert-danger' role='alert'>
                    Ya existe un usuario con este nombre.
                    </div>";
                }
                mysqli_close($conexion);
            }
        }
    }

    
?>