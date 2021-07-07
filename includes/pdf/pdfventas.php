<?php
require('fpdf/fpdf.php');

class PDF extends FPDF{
// Cabecera de página
function Header(){
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(90,10,'Reporte de Ventas',0,0,'C');
    // Salto de línea
    $this->Ln(15);
    //cabecera de tabla
    $this->Cell(10,10, 'Id',1,0,'C',0);
    $this->Cell(62,10, 'Empleado',1,0,'C',0);
    $this->Cell(62,10, 'Cliente',1,0,'C',0);
    $this->Cell(30,10, 'Fecha',1,0,'C',0);
    $this->Cell(23,10, 'Monto',1,1,'C',0);
}

// Pie de página
function Footer(){
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

$mysqli = new mysqli("localhost","root","","soltech");
$consulta = "SELECT * FROM ventasregis";
$resultado = $mysqli -> query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
while($row = $resultado->fetch_assoc()){
    $pdf->Cell(10,10, $row['invoice_id'],1,0,'C',0);
    $pdf->Cell(62,10, utf8_decode($row['cashier_name']),1,0,'C',0);
    $pdf->Cell(62,10, utf8_decode($row['cliente']),1,0,'C',0);
    $pdf->Cell(30,10, $row['order_date'],1,0,'C',0);
    $pdf->Cell(23,10, $row['total'],1,1,'C',0);
}

$pdf->Output();
?>