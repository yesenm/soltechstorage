<?php 
	//EN este documento se crea el llenado del formulario de ventas
    //Conexión con la base de datos
	$conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){
        echo "Fallo en la conexión. ".mysqli_connect_error();
    }
	
    if(!empty($_POST)){

        if($_POST['action'] == 'infoProducto'){
            $data = "";
            $codigoi = $_POST['codigoi'];
            
            //Consulta

            $sql = "SELECT 
                    id, codigoi, descripcioni, pnetoi, existenciasi
				FROM
				    inventario WHERE codigoi = '$codigoi'";

            $consult = $conexion->query($sql);

            //Cuenta el numero de filas en la base de datos
            $result = mysqli_fetch_assoc($consult);
            
            if($result > 0){
                //Si el numero de filas es mayor a 0 crea un arreglo
                $resultado=mysqli_query($conexion,$sql); 

                $ver=mysqli_fetch_row($resultado);

                $data=array(
                    'id' => $ver[0],
                    'codigoi' => $ver[1],
                    'descripcioni' => $ver[2],
                    'pnetoi' => $ver[3],
                    'existenciasi' => $ver[4]
                );
                echo json_encode($data);
                exit;
            }else{
                $data = 0;
            }
        }

    }
 ?>