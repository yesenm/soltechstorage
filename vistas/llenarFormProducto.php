<?php 
	
    //Conexión con la base de datos
	$conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){
        echo "Fallo en la conexión. ".mysqli_connect_error();
    }
	require_once "../includes/claseVenta.php";

	$obj= new ventas();

	echo json_encode($obj->obtenDatosProducto($_POST['id']))

 ?>