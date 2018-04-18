<?php
require('../fpdf.php');
$host_db="localhost";
$usuario_db="root";
$pass_db="Bankai123";
$db="saw";

$conexion=new mysqli($host_db,$usuario_db, $pass_db);
$conexion->set_charset("utf8");    

mysqli_select_db($conexion, "saw");   

$pdf = new FPDF();
//CABECERA
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetTextColor(0, 0, 255);
$pdf->Image('../../images/project/letras.png', 150, 8, 50);
$pdf->SetFont('Arial','B',11);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(40,10,'Fecha: '.date('d-m-Y').'', 100);
$pdf->Ln(15); //salto de línea

//REPORTE

//TITULO
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(100, 100, 100);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(150,10,'Lista de productos', 0);
$pdf->Ln(15); //salto de línea

//COLUMNAS
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(100,100,100);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(18, 8, 'ID', 1, 0, 'C', true);
$pdf->Cell(60, 8, 'Nombre', 1, 0, 'C', true);
$pdf->Cell(35, 8, 'Marca', 1, 0, 'C', true);
$pdf->Cell(35, 8, 'Categoria', 1, 0, 'C', true);
$pdf->Cell(25, 8, 'Precio', 1, 0, 'C', true);
$pdf->Cell(18, 8, 'Exist.', 1, 0, 'C', true);


$pdf->Ln(8);

//FILAS
$pdf->SetFont('Arial', '', 12);
$pdf->SetFillColor(240,240,240);
$pdf->SetTextColor(0, 0, 0);


$ban = false;
foreach ($conexion->query('SELECT * from `products`') as $row){
  $consulta = mysqli_query($conexion, "SELECT `name` FROM brands where id = ".$row['idBrand']."");
  $brandRow = mysqli_fetch_array($consulta);
  $consulta = mysqli_query($conexion, "SELECT `nombre` FROM categorias where id = ".$row['idCategory']."");
  $categoryRow = mysqli_fetch_array($consulta);

  $pdf->Cell(18, 8, $row['id'], 0, 0, 'C', $ban);
  $pdf->Cell(60, 8, $row['name'], 0, 0, 'C', $ban);
  $pdf->Cell(35, 8, $brandRow['name'], 0, 0, 'C', $ban);
  $pdf->Cell(35, 8, $categoryRow['nombre'], 0, 0, 'C', $ban);
  $pdf->Cell(25, 8, '$ ' . $row['cost'], 0, 0, 'C', $ban);
  $pdf->Cell(18, 8, $row['stock'], 0, 0, 'C', $ban);
  $pdf->Ln(8);
  $ban = !$ban;
}

//REPORTES PAGOS ADMI

$pdf->Output();
?>