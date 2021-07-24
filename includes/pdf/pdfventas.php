<?php
//Incluimos la bibioletca personalizada
include ("pdf_mc_table.php");
//Creamos un nuevo objeto
$pdf = new PDF_MC_Table();
//Añadimos pagina
$pdf->AddPage();
// Cabecera de página
$pdf->SetFont('Arial','B',12);
// Movernos a la derecha
$pdf->Cell(50);
// Título
$pdf->Cell(90,10,'Reporte de Ventas',0,0,'C');
// Salto de línea
$pdf->Ln(15);
//cabecera de tabla
$pdf->SetFont('Arial','B',10);
$pdf->SetDrawColor(120,120,120);
$pdf->Cell(10,10, 'Id',1,0,'C',0);
$pdf->Cell(62,10, 'Empleado',1,0,'C',0);
$pdf->Cell(62,10, 'Cliente',1,0,'C',0);
$pdf->Cell(30,10, 'Fecha',1,0,'C',0);
$pdf->Cell(23,10, 'Monto',1,1,'C',0);



$pdf->SetFont('Arial', '', 7);
$pdf->SetDrawColor(120,120,120);
//Definimos el ancho de las columnas (5 columnas)
$pdf->SetWidths(Array(10,62,62,30,23));
//Definimos el alto de las columnas, pero referido a que cada renglon vale 5 puntos
$pdf->SetLineHeight(5);
//Nos conectamos a la base de datos y hacemos la consulta
$mysqli = new mysqli("localhost","root","","soltech");
$consulta = "SELECT * FROM ventasregis";
$resultado = $mysqli -> query($consulta);
//Cargamos los datos
while($item = $resultado->fetch_assoc()){
    $pdf->Row(Array(
        $item['invoice_id'],
        utf8_decode($item['cashier_name']),
        utf8_decode($item['cliente']),
        $item['order_date'],
        $item['total']
    ));
}

//Salida del pdf
$pdf->Output();

?>