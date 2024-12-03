<?php
require "./fpdf/fpdf.php";
include './class_mysql.php';
include './config.php';

$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM ticket WHERE serie= '$id'");
$reg = mysqli_fetch_array($sql, MYSQLI_ASSOC);

class PDF extends FPDF
{
    // Encabezado del PDF
    function Header()
    {
        // Logo
        $this->Image('../img/logo.png', 10, 10, 30); // Ajuste del tamaño y posición del logo
        // Título
        $this->SetFont('Arial', 'B', 16);
        $this->SetTextColor(0, 0, 0); // Negro para los títulos
        $this->Cell(0, 10, utf8_decode('Soporte UTS'), 0, 1, 'C');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, utf8_decode('Reporte de problema mediante Ticket'), 0, 1, 'C');
        $this->Ln(10);
    }

    // Pie de página del PDF
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 9);
        $this->SetTextColor(102, 102, 102); // Gris oscuro
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->SetMargins(15, 20, 15);
$pdf->AliasNbPages();
$pdf->AddPage();

// Configuración de colores y fuentes
$pdf->SetTextColor(0, 51, 102);
$pdf->SetFillColor(230, 242, 255); // Fondo más claro
$pdf->SetDrawColor(0, 102, 204); // Azul más brillante
$pdf->SetFont('Arial', '', 10);

// Encabezado del ticket
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(0, 0, 0); // Negro para este título
$pdf->Cell(0, 10, utf8_decode('Información del Ticket #' . $reg['serie']), 0, 1, 'C');
$pdf->Ln(5);

// Información del ticket
$labels = [
    'Fecha' => $reg['fecha'],
    'Serie' => $reg['serie'],
    'Estado' => $reg['estado_ticket'],
    'Nombre' => $reg['nombre_usuario'],
    'Email' => $reg['email_cliente'],
    'Departamento' => $reg['departamento'],
    'Asunto' => $reg['asunto'],
    'Problema' => $reg['mensaje'],
    'Solución' => $reg['solucion']
];

foreach ($labels as $label => $value) {
    $pdf->SetFont('Arial', 'B', 10); // Negrita para las etiquetas
    $pdf->SetTextColor(255, 255, 255); // Blanco
    $pdf->SetFillColor(0, 102, 204); // Azul oscuro
    $pdf->Cell(40, 10, utf8_decode($label), 1, 0, 'C', true);
    $pdf->SetFont('Arial', '', 10); // Normal para los valores
    $pdf->SetTextColor(0, 51, 102); // Azul oscuro para texto
    $pdf->Cell(0, 10, utf8_decode($value), 1, 1, 'L', false);
}

// Espaciado final
$pdf->Ln(10);

// Pie adicional
$pdf->SetFont('Arial', 'I', 10);
$pdf->SetTextColor(102, 102, 102); // Gris oscuro
$pdf->Cell(0, 10, utf8_decode('Unidades Tecnologicas De Santander'), 0, 1, 'C');

// Salida del PDF
$pdf->Output();
?>
