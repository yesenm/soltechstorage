<?php
include("usuario_menu.php");

if(!$_SESSION["usuario_valido"]){
    ?>
    <script>
            alert('Inicia sesion para acceder a este sitio');
            window.location= 'login.php';
    </script>
    <?php
    exit();
    }
    //Conseguir el nombre del usuario validado
    $usuario = $_SESSION["usuario_valido"];
    $conexion=mysqli_connect("localhost","root","","soltech");
    $instruccion= "select nameuser from vendedores where nameuser='$usuario'";
    $consulta = mysqli_query($conexion,$instruccion) or die ("Fallo en la consulta...");
    while($row=mysqli_fetch_array($consulta)){
        $userloged = $row['nameuser'];
    }
?>
<html>
<body>
    <?php
     
    date_default_timezone_set('America/mexico_city');

	function fechaMexico(){
		$mes = array("","Enero",
					  "Febrero",
					  "Marzo",
					  "Abril",
					  "Mayo",
					  "Junio",
					  "Julio",
					  "Agosto",
					  "Septiembre",
					  "Octubre",
					  "Noviembre",
					  "Diciembre");
		return date('d')." de ". $mes[date('n')] . " de " . date('Y');
	}

   try{
    $pdo = new PDO('mysql:host=localhost;dbname=soltech','root','');
        //echo 'Connection Successfull';
    }catch(PDOException $error){
        echo $error->getmessage();
    }
    //Usuarios
   $select = $pdo->prepare("SELECT count(id) as u FROM vendedores");
        $select->execute();
        $row_us=$select->fetch(PDO::FETCH_OBJ);
        $total = $row_us->u;
//Clientes potenciales
        $selectc = $pdo->prepare("SELECT count(id) as cp FROM clientespo");
        $selectc->execute();
        $row_cp=$selectc->fetch(PDO::FETCH_OBJ);
        $totalcp = $row_cp->cp;

        //Clientes potenciales
        $selectcr = $pdo->prepare("SELECT count(id) as cr FROM clientescr");
        $selectcr->execute();
        $row_cr=$selectcr->fetch(PDO::FETCH_OBJ);
        $totalcr = $row_cr->cr;

        //Proveedores
        $selectp = $pdo->prepare("SELECT count(id) as p FROM proveedores");
        $selectp->execute();
        $row_p=$selectp->fetch(PDO::FETCH_OBJ);
        $totalp = $row_p->p;

        //Productos
        $selecti = $pdo->prepare("SELECT count(id) as i FROM inventario");
        $selecti->execute();
        $row_i=$selecti->fetch(PDO::FETCH_OBJ);
        $totali = $row_i->i;

        //Gastos
        $selectg = $pdo->prepare("SELECT count(id) as g FROM gastos");
        $selectg->execute();
        $row_g=$selectg->fetch(PDO::FETCH_OBJ);
        $totalg = $row_g->g;

        //Ventas
        $selectv = $pdo->prepare("SELECT count(invoice_id) as v FROM ventasregis");
        $selectv->execute();
        $row_v=$selectv->fetch(PDO::FETCH_OBJ);
        $totalv = $row_v->v;
    ?>

    <div class="container">
        <center>
            <br>
            
            <br>
        </center>
    </div>

<div class="container-fluid">
	<!-- Page Heading -->
	<div class="align-items-center justify-content-between mb-4">
        <div class="container">
			<div class="row">
				<div class="col-md-7">
					<h2 style="font-size: 40px; color:#ab0f0f;">Resumen de los datos</h2>
					<h5><?php echo fechaMexico(); ?> </h5>
					<h5>Usuario: <?php echo $userloged; ?> </h5>
				</div>
				<div class="col-md-5">
					<center>
					<img src="../../img/logo2.png" width="200px">
					</center>
				</div>
			</div>
		</div>
	</div>
	<!-- Content Row -->
    <div class="container">
	<div class="row">

        <!-- Earnings (Monthly) Card Example -->
		<a class="col-xl-3 col-md-6 mb-4" href="vendedores.php">
			<div class="card border-left-info shadow h-100 py-2 bg-white">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Usuarios</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row_us->u; ?></div>
								</div>
								<div class="col">
									<div class="progress progress-sm mr-2">
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</a>

			

        <!-- Earnings (Monthly) Card Example -->
		<a class="col-xl-3 col-md-6 mb-4" href="clientespo.php">
			<div class="card border-left-info shadow h-100 py-2 bg-white">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Clientes Poten.</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row_cp->cp; ?></div>
								</div>
								<div class="col">
									<div class="progress progress-sm mr-2">
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</a>

        <!-- Earnings (Monthly) Card Example -->
		<a class="col-xl-3 col-md-6 mb-4" href="clientescr.php">
			<div class="card border-left-info shadow h-100 py-2 bg-white">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Clientes a Crédito</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row_cr->cr; ?></div>
								</div>
								<div class="col">
									<div class="progress progress-sm mr-2">
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</a>
        
        <!-- Earnings (Monthly) Card Example -->
		<a class="col-xl-3 col-md-6 mb-4" href="proveedores.php">
			<div class="card border-left-success shadow h-100 py-2 bg-white">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proveedores</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row_p->p; ?></div>
								</div>
								<div class="col">
									<div class="progress progress-sm mr-2">
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</a>


		<!-- Earnings (Monthly) Card Example -->
		<a class="col-xl-3 col-md-6 mb-4" href="inventario.php">
			<div class="card border-left-success shadow h-100 py-2 bg-white">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Productos</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row_i->i; ?></div>
								</div>
								<div class="col">
									<div class="progress progress-sm mr-2">
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto">
                        <i class="fas fa-seedling fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</a>

        <!-- Earnings (Monthly) Card Example -->
		<a class="col-xl-3 col-md-6 mb-4" href="gastos.php">
			<div class="card border-left-info shadow h-100 py-2 bg-white">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Gastos</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row_g->g; ?></div>
								</div>
								<div class="col">
									<div class="progress progress-sm mr-2">
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</a>

        <!-- Earnings (Monthly) Card Example -->
		<a class="col-xl-3 col-md-6 mb-4" href="ventas.php">
			<div class="card border-left-info shadow h-100 py-2 bg-white">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ventas</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row_v->v; ?></div>
								</div>
								<div class="col">
									<div class="progress progress-sm mr-2">
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</a>

        <!-- Earnings (Monthly) Card Example -->
		<a class="col-xl-3 col-md-6 mb-4" href="ventasreg.php">
			<div class="card border-left-info shadow h-100 py-2 bg-white">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Facturas</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row_v->v; ?></div>
								</div>
								<div class="col">
									<div class="progress progress-sm mr-2">
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</a>

		

		<div class="col-lg-8"><br>
			<div class="au-card m-b-30">
				<div class="au-card-inner">
					<h3 class="title-2 m-b-40" style="color:#ab0f0f;">Productos con stock mínimo de 20 piezas</h3>
					<br>
					<div class="table-responsive" style="overflow-x:auto;">
						<table class="table">
							<thead style="background-color: #82c577">
								<th>Código</th>
								<th>Descripción</th>
								<th>Existencias</th>
							</thead>
						</table>
						<div style="height:180px; overflow:auto;">
							<table class="table">
								<tbody>
									<?php
									$sqlmin = "SELECT * FROM inventario WHERE existenciasi < 20 ORDER BY existenciasi ASC";
									
									$res= $conexion->query($sqlmin);
									//Impresión de filas
									while($row = $res->fetch_assoc()){?>
										<tr style="font-family: 'Itim'; background-color: #ffd9d9;">
										<th> <?php echo $row['codigoi']; ?></th>
										<th> <?php echo $row['descripcioni']; ?></th>
										<th> <?php echo $row['existenciasi']; ?></th>

										</tr>
									<?php } mysqli_free_result($res); ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4"><br>
			<div class="au-card m-b-30">
				<div class="au-card-inner">
					<h3 class="title-2 m-b-40" style="color:#ab0f0f;">Resumen del día</h3>
					
					
					<!-- Earnings (Monthly) Card Example -->
				<a class="col-xl-3 col-md-6 mb-4" href="ventasreg.php">
					<div class="card border-left-info shadow h-100 py-2 bg-white">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ganacias del día</div>
									<div class="row no-gutters align-items-center">
										<div class="col-auto">
										<?php
											$select = $pdo->prepare("SELECT sum(total) as total FROM ventasregis WHERE order_date = CURDATE()");
											$select->execute();
											$row=$select->fetch(PDO::FETCH_OBJ);
											$total = $row->total ;
											?>
											<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">$<?php echo number_format($total,2); ?></div>
										</div>
									</div>
								</div>
								<div class="col-auto">
								<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</a>


				<!-- Earnings (Monthly) Card Example -->
				<a class="col-xl-3 col-md-6 mb-4" href="ventas.php">
					<div class="card border-left-info shadow h-100 py-2 bg-white">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ventas del día</div>
									<div class="row no-gutters align-items-center">
										<div class="col-auto">
										<?php
										//Ventas
										$sqlventas = $pdo->prepare("SELECT count(invoice_id) as ventasd FROM ventasregis WHERE order_date = CURDATE() ");
										$sqlventas->execute();
										$row_ventasd=$sqlventas->fetch(PDO::FETCH_OBJ);
										$totalventas = $row_ventasd->ventasd;
										?>	
											<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row_ventasd->ventasd; ?></div>
										</div>
									</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</a>


				</div>
			</div>
		</div>
	</div>
</div>

</div>
<?php
include("usuario_footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>
