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
    $this->Cell(90,10,'Reporte de Gastos',0,0,'C');
    // Salto de línea
    $this->Ln(15);
    //cabecera de tabla
    $this->Cell(10,10, 'Id',1,0,'C',0);
    $this->Cell(60,10, 'Empleado',1,0,'C',0);
    $this->Cell(30,10, 'Rubro',1,0,'C',0);
    $this->Cell(30,10, 'Fecha',1,0,'C',0);
    $this->Cell(40,10, 'Proyecto',1,0,'C',0);
    $this->Cell(25,10, 'Cantidad',1,1,'C',0);
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
$consulta = "SELECT * FROM gastos";
$resultado = $mysqli -> query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
while($row = $resultado->fetch_assoc()){
    $pdf->Cell(10,10, $row['id'],1,0,'C',0);
    $pdf->Cell(60,10, utf8_decode($row['empleado']),1,0,'C',0);
    $pdf->Cell(30,10, utf8_decode($row['rubro']),1,0,'C',0);
    $pdf->Cell(30,10, $row['fecha'],1,0,'C',0);
    $pdf->Cell(40,10, utf8_decode($row['proyecto']),1,0,'C',0);
    $pdf->Cell(25,10, $row['cantidad'],1,1,'C',0);
}

$pdf->Output();
?>