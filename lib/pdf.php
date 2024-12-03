<?php 
require "./fpdf/fpdf.php";
include './class_mysql.php';
include './config.php';

$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM ticket WHERE id= '$id'");
$reg = mysqli_fetch_array($sql, MYSQLI_ASSOC);

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('../img/logo.png', 15, 10, 30);
        
        // Title
        $this->SetFont('Arial', 'B', 16);
        $this->SetTextColor(0, 51, 102); // Azul oscuro
        $this->Cell(0, 10, 'Soporte UTS', 0, 1, 'C');
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(0, 10, 'Reporte de problema mediante Ticket', 0, 1, 'C');
        $this->Ln(10);
    }

    // Page footer
    function Footer()
    {
        // Línea de separación
        $this->SetDrawColor(169, 169, 169);
        $this->Line(15, 265, 200, 265);

        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->SetMargins(15, 20);
$pdf->AliasNbPages();
$pdf->AddPage();

// Colores y fuentes para la tabla
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(220, 230, 241); // Azul claro para las celdas de cabecera
$pdf->SetDrawColor(0, 51, 102); // Azul oscuro para los bordes
$pdf->SetFont('Arial', 'B', 11);

// Título del contenido
$pdf->SetTextColor(0, 51, 102); // Azul oscuro
$pdf->Cell(0, 10, 'Informacion de Ticket #' . iconv("UTF-8", "ISO-8859-1", $reg['serie']), 0, 1, 'C');
$pdf->Ln(5);

// Renderizar la tabla
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 10);

$fields = [
    'Fecha' => $reg['fecha'],
    'Serie' => $reg['serie'],
    'Estado' => $reg['estado_ticket'],
    'Nombre' => $reg['nombre_usuario'],
    'Email' => $reg['email_cliente'],
    'Departamento' => $reg['departamento'],
    'Asunto' => $reg['asunto'],
    'Problema' => $reg['mensaje'],
    'Solución' => $reg['solucion'],
];

foreach ($fields as $key => $value) {
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(0, 51, 102); // Azul oscuro
    $pdf->SetTextColor(255, 255, 255); // Texto blanco
    $pdf->Cell(35, 10, iconv("UTF-8", "ISO-8859-1", $key), 1, 0, 'C', true);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTextColor(0, 0, 0); // Texto negro
    $pdf->SetFillColor(255, 255, 255); // Fondo blanco
    $pdf->Cell(0, 10, iconv("UTF-8", "ISO-8859-1", $value), 1, 1, 'L', true);
}

$pdf->Ln(10);
$pdf->SetFont('Arial', 'I', 9);
$pdf->SetTextColor(0, 51, 102); // Azul oscuro
$pdf->Cell(0, 5, "Unidades Tecnologicas De Santander", 0, 0, 'C');

$pdf->output();
