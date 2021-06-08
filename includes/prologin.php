<?php

    $usuario="";
    $password="";

    //Validar que los campos sean llenados.
    if(isset($_POST['usuario'])){
        $usuario = $_POST['usuario'];
        $password = $_POST['contrasena'];
        
        $campos = array();
        
        if($usuario == ""){
            array_push($campos, "Ingresa el nombre de usuario");
        }
        
        if($password = "" || strlen($password)<8){
            array_push($campos, "La contraseña no puede ir vacía ni contener menos de 8 caracteres");
        }
        
        if(count($campos) > 0){
            echo "<br><div class='alert alert-danger' role='alert'>";
            for($i = 0; $i < count($campos); $i++){
                echo "<li>" . $campos[$i] . "</li>";
            }
            echo "</div>";    
        }else{
            
            //Checar si la contraseña es la misma
            
            session_start();
            
            $usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario']:null;
            
            $contrasena = isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena']:null;
            
            if(isset($usuario)&& isset($contrasena)){
                $conexion=mysqli_connect("localhost","root","","soltech");
                
                $instruccion= "select nameuser, contrasena from vendedores where nameuser='$usuario'";
                
                $consulta = mysqli_query($conexion,$instruccion) or die
                ("Fallo en la consulta...");
                if(mysqli_num_rows(mysqli_query($conexion,$instruccion))>0){
                    
                    if(!mysqli_query($conexion,$instruccion)){
                        
                        echo "Error ".mysqli_error($conexion);
                    }
                    $resultado=mysqli_fetch_array($consulta);
                    
                    if(password_verify($contrasena,$resultado['contrasena'])){
                        $usuario_valido= $usuario;
                        $_SESSION["usuario_valido"]=$usuario_valido;
                        
                        //Si las contraseñas coinciden, ingresa al sistema
                        ?>
                        <script>
                            window.location="index.php";
                        </script>
                        <?php
                    }else{
                        //En caso de que no coincidan, mandar alerta de error
                        echo "<div class='alert alert-danger' role='alert'>
                        El usuario y/o la contraseña son incorrectas</div>";
                    }
                }
                mysqli_close($conexion);
            }
        }
    }
?>