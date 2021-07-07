<?php 

class ventas{
	public function obtenDatosProducto($id){

        $conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){
        echo "Fallo en la conexión. ".mysqli_connect_error();
    }

		$sql = "SELECT 
                    codigoi, descripcioni, pnetoi, existenciasi
				FROM
				    inventario WHERE id = '$id'";

		$result=mysqli_query($conexion,$sql); 

		$ver=mysqli_fetch_row($result);

		$data=array(
			'codigoi' => $ver[0],
			'descripcioni' => $ver[1],
			'pnetoi' => $ver[2],
			'existenciasi' => $ver[3]
		);		
		return $data;
	}
}

?>