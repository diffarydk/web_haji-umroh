<?php 
require_once '../connection.php';
require_once 'DataPdf.php';
require '../fpdf185/fpdf.php';

$pdf_template = '../template_pdf/FormulirUmrah.png';
session_start();
if (isset($_GET['id_formulir'])) {
    $formulir = new Form();
    $id_formulir = $_GET['id_formulir'];
    $id_users = $_SESSION['id_users'];
    $user = $formulir->getForm($id_formulir, $id_users);

    if ($user) {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->AddFont('Helvetica', '', 'helvetica.php');
        $pdf->SetFont('Helvetica', '', 11);
        $pdf->Image($pdf_template, 0, 0, 210, 297);
        $pdf->Text(75, 45, strtoupper($user['program']));
        $pdf->Text(75, 50, strtoupper($user['kamar']));
        $pdf->Text(79, 67, strtoupper($user['nama_lengkap']));
        $pdf->Text(79, 74, strtoupper($user['nik']));
        $pdf->Text(79, 81, strtoupper($user['nama_ayah_kandung']));
        $pdf->Text(79, 89, strtoupper($user['tempat_lahir']));
        $pdf->Text(79, 96, date('d-m-Y', strtotime($user['tanggal_lahir'])));
        $pdf->Output('Formulir Umroh '.ucfirst($user['nama_lengkap']).'.pdf', 'D');
    } else {
        echo "No Record Found";
    }
} else {
    echo "Missing id_formulir parameter";
}
?>
