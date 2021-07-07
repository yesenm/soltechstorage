<?php 
	//session_start();
 ?>

<div class="mb-3"><br>
    <label class="form-label">Productos por cobrar</label>
</div>
 <table class="table" style="text-align: center;">
 	<caption>
 		<span class="btn btn-warning" onclick="crearVenta()"> Generar recibo
 			<span class="glyphicon glyphicon-usd"></span>
 		</span>
 	</caption>
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col" id="des">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">IVA</th>
            <th scope="col">Importe</th>
            <th scope="col">Opciones</th>
        </tr>           
    </thead>
    <tbody>
 	
 	<?php 
 	$total=0;//esta variable tendra el total de la compra en dinero
 	$cliente=""; //en esta se guarda el nombre del cliente
 		if(isset($_SESSION['tablaComprasTemp'])):
 			$i=0;
 			foreach (@$_SESSION['tablaComprasTemp'] as $key) {

 				$d=explode("||", @$key);
 	 ?>

 	<tr>
 		<td><?php echo $d[1] ?></td>
 		<td><?php echo $d[2] ?></td>
 		<td><?php echo $d[3] ?></td>
 		<td><?php echo 1; ?></td>
 		<td>
 			<span class="btn btn-danger btn-xs" onclick="quitarP('<?php echo $i; ?>')">
 				<span class="glyphicon glyphicon-remove"></span>
 			</span>
 		</td>
 	</tr>

 <?php 
 		$total=$total + $d[3];
 		$i++;
 		$cliente=$d[4];
 	}
 	endif; 
 ?>

 	<tr>
 		<td>Total de venta: <?php echo "$".$total; ?></td>
 	</tr>
    </table>
 </table>


 <script type="text/javascript">
 	$(document).ready(function(){
 		nombre="<?php echo @$cliente ?>";
 		$('#nombreclienteVenta').text("Nombre de cliente: " + nombre);
 	});
 </script>