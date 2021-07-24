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
        $pdf->Cell(90,10,'Reporte de Gastos',0,0,'C');
        // Salto de línea
        $pdf->Ln(15);
        //cabecera de tabla
        $pdf->SetFont('Arial','B',10);
        $pdf->SetDrawColor(120,120,120);
        $pdf->Cell(10,10, 'Id',1,0,'C',0);
        $pdf->Cell(50,10, 'Empleado',1,0,'C',0);
        $pdf->Cell(30,10, 'Rubro',1,0,'C',0);
        $pdf->Cell(30,10, 'Fecha',1,0,'C',0);
        $pdf->Cell(40,10, 'Proyecto',1,0,'C',0);
        $pdf->Cell(25,10, 'Cantidad',1,1,'C',0);

    

$pdf->SetFont('Arial', '', 7);
$pdf->SetDrawColor(120,120,120);
//Definimos el ancho de las columnas (6 columnas)
$pdf->SetWidths(Array(10,50,30,30,40,25));
//Definimos el alto de las columnas, pero referido a que cada renglon vale 5 puntos
$pdf->SetLineHeight(5);
//Nos conectamos a la base de datos y hacemos la consulta
$mysqli = new mysqli("localhost","root","","soltech");
$consulta = "SELECT * FROM gastos";
$resultado = $mysqli -> query($consulta);
//Cargamos los datos
while($item = $resultado->fetch_assoc()){
    $pdf->Row(Array(
        $item['id'],
        utf8_decode($item['empleado']),
        utf8_decode($item['rubro']),
        $item['fecha'],
        utf8_decode($item['proyecto']),
        $item['cantidad']
    ));
}

//Salida del pdf
$pdf->Output();

?>