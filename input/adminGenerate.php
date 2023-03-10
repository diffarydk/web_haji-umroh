<?php 
require_once '../connection.php';
require_once 'DataPdf.php';
require '../fpdf185/fpdf.php';

$pdf_template = '../template_pdf/FormulirUmrah.png';if (isset($_GET['id_users'])) {
    $formulir = new Form();
    $id_formulir = $_GET['id_formulir'];
    $id_users = $_GET['id_users'];
    $user = $formulir->getInfo($id_formulir, $id_users);

    if ($user) {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->AddFont('Helvetica', '', 'helvetica.php');
        $pdf->SetFont('Helvetica', '', 8);
        $pdf->Image($pdf_template, 0, 0, 210, 297);
        $pdf->Text(75, 45, strtoupper($user['program']));
        $pdf->Text(75, 50, strtoupper($user['kamar']));
        $pdf->Text(79, 67, strtoupper($user['nama_lengkap']));
        $pdf->Text(79, 74, strtoupper($user['nik']));
        $pdf->Text(79, 81.5, strtoupper($user['nama_ayah_kandung']));
        $pdf->Text(79, 89, strtoupper($user['tempat_lahir']));
        $pdf->Text(79, 95.5, date('d-m-Y', strtotime($user['tanggal_lahir'])));
        $pdf->Text(79, 103, strtoupper($user['no_paspor']));
        $pdf->Text(79, 110, strtoupper($user['tempat_dikeluarkan_paspor']));
        $pdf->Text(79, 116.5, date('d-m-Y', strtotime($user['tanggal_dikeluarkan_paspor'])));
        $pdf->Text(79, 124.5, date('d-m-Y', strtotime($user['masa_berlaku_paspor'])));
        $pdf->Text(79, 131.5, strtoupper($user['jenis_kelamin']));
        $pdf->Text(79, 138.5, strtoupper($user['golongan_darah']));
        $pdf->Text(79, 145.5, strtoupper($user['status_perkawinan']));
        $pdf->Text(79, 152.5, strtoupper($user['provinsi']));
        $pdf->Text(115, 152.5, strtoupper($user['kota_kabupaten']));
        $pdf->Text(79, 160, strtoupper($user['kecamatan']));
        $pdf->Text(122, 160, strtoupper($user['kelurahan']));
        $pdf->Text(160, 160, strtoupper($user['jalan']));
        $pdf->Text(79, 167, strtoupper($user['email']));
        $pdf->Text(79, 174, strtoupper($user['no_telp_rumah']));
        $pdf->Text(79, 181, strtoupper($user['no_telp_seluler']));
        $pdf->Text(79, 188, strtoupper($user['pendidikan_terakhir']));
        $pdf->Text(79, 195, strtoupper($user['pekerjaan']));
        $pdf->Text(79, 207, strtoupper($user['keluarga_yg_ikut']));
        $pdf->Text(127, 207, strtoupper($user['hubungan']));
        $pdf->Text(173, 207, strtoupper($user['no_telp']));
        $pdf->Text(79, 224, strtoupper($user['informasi_pendaftaran']));
        $pdf->Text(79, 231, strtoupper($user['penyakit_kronis']));
        $pdf->Text(79, 240, strtoupper($user['keluarga_yg_bisa_dihubungi']));
        $pdf->Text(121, 240, strtoupper($user['hubungan_keluarga']));
        $pdf->Text(171, 240, strtoupper($user['no_telp_keluarga']));
        $pdf->Output('Formulir Umroh '.ucfirst($user['nama_lengkap']).'.pdf', 'D');
    } else {
        echo "No Record Found";
    }
} else {
    echo "Missing id_formulir parameter";
}