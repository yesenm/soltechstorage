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
    $this->Cell(90,10,'Reporte de Inventario',0,0,'C');
    // Salto de línea
    $this->Ln(15);
    //cabecera de tabla
    $this->Cell(10,10, 'Id',1,0,'C',0);
    $this->Cell(22,10, utf8_decode('Código'),1,0,'C',0);
    $this->Cell(60,10, utf8_decode('Descripción'),1,0,'C',0);
    $this->Cell(25,10, 'Medidas',1,0,'C',0);
    $this->Cell(15,10, '$M',1,0,'C',0);
    $this->Cell(15,10, '$B',1,0,'C',0);
    $this->Cell(15,10, '$N',1,0,'C',0);
    $this->Cell(15,10, 'Ex',1,0,'C',0);
    $this->Cell(30,10, 'Proveedor',1,0,'C',0);
    $this->Cell(30,10, utf8_decode('Categoría'),1,1,'C',0);

    
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
$consulta = "SELECT * FROM inventario";
$resultado = $mysqli -> query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);
while($row = $resultado->fetch_assoc()){
    $pdf->Cell(10,10, $row['id'],1,0,'C',0);
    $pdf->Cell(22,10, utf8_decode($row['codigoi']),1,0,'C',0);
    $pdf->Cell(60,10, utf8_decode($row['descripcioni']),1,0,'C',0);
    $pdf->Cell(25,10, utf8_decode($row['medidasi']),1,0,'C',0);
    $pdf->Cell(15,10, utf8_decode($row['pmayoreoi']),1,0,'C',0);
    $pdf->Cell(15,10, utf8_decode($row['pbrutoi']),1,0,'C',0);
    $pdf->Cell(15,10, utf8_decode($row['pnetoi']),1,0,'C',0);
    $pdf->Cell(15,10, utf8_decode($row['existenciasi']),1,0,'C',0);
    $pdf->Cell(45,10, utf8_decode($row['proveedoresi']),1,0,'C',0);
    $pdf->Cell(30,10, utf8_decode($row['categoriai']),1,1,'C',0);
}

$pdf->Output();
?>