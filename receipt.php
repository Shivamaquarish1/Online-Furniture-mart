




Adding Image to PDF file by FPDF
PDF Image 
<?Php
require('fpdf.php');
$pdf = new FPDF(); 
$pdf->AddPage();
$pdf->Image('./xampp/htdocs/logo.png',0,0);
$pdf->Output();
?>