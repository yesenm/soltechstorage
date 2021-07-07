<?php
require('fpdf/fpdf.php');
$mysqli = new mysqli("localhost","root","","soltech");

$id = $_GET['id'];
$consulta = "SELECT * FROM ventasregis WHERE invoice_id=$id";
$resultado = $mysqli -> query($consulta);


$pdf = new FPDF('P','mm', array(80,200));

$pdf->AddPage();

//Header
$pdf->SetFont('Arial','B',16);
$pdf->Cell(64,8,'SOLTECH',0,1,'C');

$pdf->Line(10,17,72,17);
$pdf->Line(10,18,72,18);

$pdf->SetFont('Arial','',6);
$pdf->Cell(60,4,utf8_decode('Soluciones y Tecnologías Hidroagrícolas S de RL de CV.'),0,1,'C');

$pdf->SetFont('Arial','',6);
$pdf->Cell(63,4,utf8_decode(' El Milagro, Carretera Panamericana 1.'),0,1,'C');
$pdf->SetFont('Arial','',6);
$pdf->Cell(63,4,utf8_decode('Salida a Pabellón de Hidalgo, 20436. Aguascalientes, Ags.'),0,1,'C');

$pdf->SetFont('Arial','',6);
$pdf->Cell(63,4,'Email: contacto@gruposoltech.com',0,1,'C');

$pdf->SetFont('Arial','',6);
$pdf->Cell(63,4,'Tel: 461 617 9645, 449 911 4017 y 461 346 2138',0,1,'C');

$pdf->Line(10,38,72,38);
$pdf->Line(10,39,72,39);

//Datos de factura

$pdf->SetY(41);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(65,6 ,'Factura de Compra',0,1,'C');



while($row = $resultado->fetch_assoc()){
    $pdf->SetFont('Courier','B',8);
    $pdf->Cell(20,4 ,'Fecha y Hora: ',0,0,'C');
    
    $pdf->SetFont('Courier','BI',8);
    $pdf->Cell(21,4 ,$row['order_date'],0,0,'C');
    
    $pdf->SetFont('Courier','BI',8);
    $pdf->Cell(10,4 ,$row['time_order'],0,1,'C');
    
    $pdf->SetFont('Courier','B',8);
    $pdf->Cell(10,4 ,'Usuario:',0,0,'C');
    
    $pdf->SetFont('Courier','BI',8);
    $pdf->Cell(45,4 ,utf8_decode($row['cashier_name']),0,1,'C');
    
    $pdf->SetFont('Courier','B',8);
    $pdf->Cell(20,4 ,'Cliente:      ',0,0,'C');
    
    $pdf->SetFont('Courier','BI',8);
    $pdf->Cell(9,4 ,utf8_decode($row['cliente']),0,1,'C');
    
    $pdf->SetFont('Courier','B',8);
    $pdf->Cell(7,4 ,'Folio:',0,0,'C');
    
    $pdf->SetFont('Courier','BI',8);
    $pdf->Cell(10,4 ,$row['invoice_id'],0,1,'C');
    
    $pdf->Line(6,70,74,70);
    $pdf->Line(6,71,74,71);
    
    //Tablaaaa
    $pdf->SetX(5);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(5,8 ,'C',0,0,'C');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(35,8 ,utf8_decode('Descripción'),0,0,'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(10,8 ,'Precio',0,0,'C');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(10,8 ,'IVA',0,0,'C');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(10,8 ,'Total',0,1,'C');
    
    $select = "SELECT * FROM factura WHERE invoice_id=$id";
    $result = $mysqli -> query($select);
    while($item = $result->fetch_assoc()){
        
        //////////////////////////////////////////////
        
        $pdf->SetX(5);
        $pdf->SetFont('Arial','',6);
        $pdf->Cell(5,5,$item['cantidad'],0,0,'C', 0);
        $pdf->Cell(35,5,$item['product_description'],0,0,'L', 0);
        
        $pdf->Cell(10,5,''.number_format($item['precio'],2),0,0,'C', 0);
        $pdf->Cell(10,5,''.number_format($item['iva'],2),0,0,'C', 0);
        
        $pdf->Cell(10,5,''.number_format($item['total'],2),0,1,'C', 0);
        
    }
    
    //////////////////////////////////////////////
    $pdf->SetX(43);
    $pdf->SetFont('Arial','Bi',8);
    $pdf->Cell(25,8 ,'Total  :',0,0,'C');
    
    $pdf->SetFont('Arial','BI',8);
    $pdf->Cell(1,8 ,number_format($row['total'],2),0,1,'C');
    
    $pdf->SetX(43);
    $pdf->SetFont('Arial','BI',7);
    $pdf->Cell(25,4 ,'Efectivo  :',0,0,'C');
    
    $pdf->SetFont('Arial','BI',7);
    $pdf->Cell(1,4 ,''. number_format($row['paid'],2),0,1,'C');
    
    $pdf->SetX(43);
    $pdf->SetFont('Arial','BI',8);
    $pdf->Cell(25,8 ,'Cambio  :',0,0,'C');
    
    $pdf->SetFont('Arial','BI',7);
    $pdf->Cell(1,8 ,''. number_format($row['due'],2),0,1,'C');
    
}

//////////////////////////////////////////////

// Pie de página
$pdf->SetFont('Arial','BI',8);
$pdf->Cell(60,4 ,utf8_decode('¡Gracias por su compra!'),10,1,'C');

$pdf->SetFont('Arial','BI',7);
$pdf->Cell(60,4 ,'https://gruposoltech.com/',0,0,'C');

$pdf->Output();

