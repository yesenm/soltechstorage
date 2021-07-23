<?php
//Llenar el select de los codigos segun la categoría para el area de ventas 
//Conexión BD
$conexion = mysqli_connect("localhost","root","","soltech");
if(mysqli_connect_errno()){echo "Fallo en la conexión. ".mysqli_connect_error();}

	require_once "../includes/claseProCategoria.php";

	$obj= new ProCategoria();

	echo json_encode($obj->obtenCodigos($_POST['categoria']));

?>