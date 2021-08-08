<?php

//Declarar las variables vacías
$nombrep="";
$telefonop="";
$direccionp="";
$correop="";
$rfcp="";
$productosp="";
$empresap="";
$fechap="";

//Validar que los campos sean llenados.

if(isset($_POST['nombrep'])){
    $nombrep = $_POST['nombrep'];
    $telefonop = $_POST['telefonop'];
    $direccionp = $_POST['direccionp'];
    $correop = $_POST['correop'];
    $rfcp = $_POST['rfcp'];
    $productosp = $_POST['productosp'];
    $empresap = $_POST['empresap'];
    $fechap = $_POST['fechap'];
    
    $campos = array();
    
    if($nombrep == ""){
        array_push($campos, "El campo de nombre no puede ir vacío");
    }
    
    if($telefonop == "" || strlen($telefonop)>11){
        array_push($campos, "El campo de telefono no puede ir vacío o contener más de diez dígitos");
    }
    
    if($direccionp == ""){
        array_push($campos, "Ingrese la dirección del proveedor");
    }
    
    if($correop == "" || strpos($correop, "@") === false){
        array_push($campos, "Ingresa un email válido");
    }
    
    if($rfcp == ""){
        array_push($campos, "El campo de RFC no puede ir vacío");
    }
    
    if($productosp == ""){
        array_push($campos, "El campo de productos no puede ir vacío");
    }
    
    if($empresap == "" ){
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
            $empresap=quitarEspacios($_POST["empresap"]);
            $nombrep=quitarEspacios($_POST["nombrep"]);
            $telefonop=quitarEspacios($_POST["telefonop"]);
            $direccionp=quitarEspacios($_POST["direccionp"]);
            $correop=quitarEspacios($_POST["correop"]);
            $rfcp=quitarEspacios($_POST["rfcp"]);
            $productosp=quitarEspacios($_POST["productosp"]);
            $fechap=quitarEspacios($_POST["fechap"]);
        }
        //Inserta los datos en la base de datos y compara si ya existe el usuario con ese nombre
        if(isset($_REQUEST['enviar'])){
            $conexion = mysqli_connect("localhost","root","","soltech");
            
            if(mysqli_connect_errno()){
                echo "Fallo en la conexión. ".mysqli_connect_error();
            }
            
            $instruccion ="select nombrep from proveedores where nombrep ='$nombrep'";
            if(mysqli_num_rows(mysqli_query($conexion,$instruccion))<=0){
                $insert = ("insert into proveedores(nombrep, telefonop, direccionp, correop,
                rfcp, productosp, empresap, fechap)
                values('$nombrep', '$telefonop', '$direccionp', '$correop', 
                '$rfcp', '$productosp', '$empresap', '$fechap' )");
                
                if(!mysqli_query($conexion,$insert)){
                    echo "Error: ".mysqli_error($conexion);
                }
                
                echo "<br><div class='alert alert-success' role='alert'>
                    El proveedor se ha registrado correctamente.</div>";
                
                $nombrep="";
                $telefonop="";
                $direccionp="";
                $correop="";
                $rfcp="";
                $productosp="";
                $empresap="";
              
            } else if(mysqli_num_rows(mysqli_query($conexion,$instruccion))>0){
                echo "<br><div class='alert alert-danger' role='alert'>
                Ya existe un proveedor con este nombre.
                </div>";
            }
            mysqli_close($conexion);
        }
    }
}    
?>