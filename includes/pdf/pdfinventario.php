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
        $pdf->Cell(90,10,'Reporte de Inventario',0,0,'C');
        // Salto de línea
        $pdf->Ln(15);
        //cabecera de tabla
        $pdf->SetFont('Arial','B',10);
        $pdf->SetDrawColor(120,120,120);
        $pdf->Cell(10,10, 'Id',1,0,'C',0);
        $pdf->Cell(18,10, utf8_decode('Código'),1,0,'C',0);
        $pdf->Cell(40,10, utf8_decode('Descripción'),1,0,'C',0);
        $pdf->Cell(25,10, 'Medidas',1,0,'C',0);
        $pdf->Cell(12,10, '$M',1,0,'C',0);
        $pdf->Cell(12,10, '$B',1,0,'C',0);
        $pdf->Cell(12,10, '$N',1,0,'C',0);
        $pdf->Cell(12,10, 'Ex',1,0,'C',0);
        $pdf->Cell(30,10, 'Proveedor',1,0,'C',0);
        $pdf->Cell(20,10, utf8_decode('Categoría'),1,1,'C',0);

    

$pdf->SetFont('Arial', '', 7);
$pdf->SetDrawColor(120,120,120);
//Definimos el ancho de las columnas (10 columnas)
$pdf->SetWidths(Array(10,18,40,25,12,12,12,12,30,20));
//Definimos el alto de las columnas, pero referido a que cada renglon vale 6 puntos
$pdf->SetLineHeight(5);
//Nos conectamos a la base de datos y hacemos la consulta
$mysqli = new mysqli("localhost","root","","soltech");
$consulta = "SELECT * FROM inventario";
$resultado = $mysqli -> query($consulta);
//Cargamos los datos
while($item = $resultado->fetch_assoc()){
    $pdf->Row(Array(
        $item['id'],
        utf8_decode($item['codigoi']),
        utf8_decode($item['descripcioni']),
        utf8_decode($item['medidasi']),
        $item['pmayoreoi'],
        $item['pbrutoi'],
        $item['pnetoi'],
        $item['existenciasi'],
        utf8_decode($item['proveedoresi']),
        utf8_decode($item['categoriai'])
    ));
}

//Salida del pdf
$pdf->Output();

?>