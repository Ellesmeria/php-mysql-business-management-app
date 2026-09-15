<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
ob_start();
require_once 'pdf.php';
$html = ob_get_clean();
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();



$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('test.pdf', ['Attachment' => 0]);