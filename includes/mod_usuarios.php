<?php

$conexion = mysqli_connect("localhost","root","","soltech");
if(mysqli_connect_errno()){
    echo "Fallo en la conexión. ".mysqli_connect_error();
}

if(isset($_POST['nombrev'])){
    $nombre = $_POST['nombrev'];
    $telefono = $_POST['telefonov'];
    $direccion = $_POST['direccionv'];
    $correo = $_POST['correov'];
    $rfc = $_POST['rfcv'];
    $nameuser = $_POST['nameuser'];
    $id_rol = $_POST['id_rol'];
    
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
    
    if($nameuser == ""){
        array_push($campos, "El nombre de usuario no puede ir vacío");
    }
    
    if($id_rol == "" ){
        array_push($campos, "El campo del rol no puede ir vacío ni contener letras");
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
            $nombre=quitarEspacios($_POST["nombrev"]);
            $telefono=quitarEspacios($_POST["telefonov"]);
            $direccion=quitarEspacios($_POST["direccionv"]);
            $correo=quitarEspacios($_POST["correov"]);
            $rfc=quitarEspacios($_POST["rfcv"]);
            $nameuser=quitarEspacios($_POST["nameuser"]);
            $id_rol=quitarEspacios($_POST["id_rol"]);
            
        }
        
        if(isset($_REQUEST['editarUsuario'])){ 
            $id=$_REQUEST['id'];
            $nombre = $_REQUEST['nombrev'];
            $telefono=$_REQUEST['telefonov'];
            $direccion=$_REQUEST['direccionv'];
            $correo=$_REQUEST['correov'];
            $rfc=$_REQUEST['rfcv'];
            $nameuser=$_REQUEST['nameuser'];
            $id_rol=$_REQUEST['id_rol'];
            
            $conexion = mysqli_connect("localhost","root","","soltech");
            
            if(mysqli_connect_errno()){
                echo "Fallo en la conexión. ".mysqli_connect_error();
            }
            
            $instruccion ="select nameuser from vendedores where nameuser ='$nameuser'";
            if(mysqli_num_rows(mysqli_query($conexion,$instruccion))<=0){
                $cambios ="UPDATE vendedores SET nombrev ='$nombre',telefonov='$telefono', direccionv='$direccion',
                correov='$correo', rfcv='$rfc', nameuser='$nameuser',
                id_rol='$id_rol' WHERE id='$id'";
                
                if(mysqli_query($conexion,$cambios)){
                    echo "<br><div class='alert alert-success' role='alert'>
                    Los datos fueron actualizados correctamente.
                    </div>";
                    
                    ?>
                    <script>
                    setTimeout(() => {
                        window.location= "../admin/vendedores.php";
                    }, 3000);
                    </script>
                    <?php
                } 
                
                if(!mysqli_query($conexion,$cambios)){ echo"Error".mysqli_error($conexion);}
                
            }else if(mysqli_num_rows(mysqli_query($conexion,$instruccion))>0){
                echo "<br><div class='alert alert-danger' role='alert'>
                Ya existe un usuario con este nombre.
                </div>";
            }
            mysqli_close($conexion);
        }
    }
}

?>