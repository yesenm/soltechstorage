<?php 
$conexion=mysqli_connect('localhost','root','','soltech');
$categoria=$_POST['categoria'];

	$sql="SELECT id,
			 categoriai,
			 descripcioni,
             existencias,
             pnetoi
		from inventario
		where categoria='$categoria'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<select id='lista2' name='lista2'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."</select>";
	

?>