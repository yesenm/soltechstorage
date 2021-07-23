<?php 
class ProCategoria{
	public function obtenCodigos($categoria){

        $conexion = mysqli_connect("localhost","root","","soltech");
    if(mysqli_connect_errno()){
        echo "Fallo en la conexión. ".mysqli_connect_error();
    }

		$sql = "SELECT *FROM inventario WHERE categoriai = '$categoria'";

		$result=mysqli_query($conexion,$sql); 

        //Impresión de filas
        while($row = $result->fetch_assoc()){?>
            <tr>
            <th style="widht:200px;"> <?php echo $row['codigoi']; ?></th>
            <td style="widht:500px;"> <?php echo $row['descripcioni']; ?></td>
            <td style="widht:300px;"> <?php echo $row['medidasi']; ?></td>
            </tr>
        <?php } mysqli_free_result($result);
	}
}
?>