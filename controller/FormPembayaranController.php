<?php
class FormPembayaran extends TableJadwal{
  private $model;
  public function __construct()
  {
      $this->model= new TableJadwal();
  }
  public function GetAllBank(){
    $jadwal = $this->model->DataBank();
    return $jadwal;
    }

    public function handlePembayaran() {
      if(isset($_POST['submit'])){
        
        $id_pembayaran = $_POST['id_pembayaran'];
        $bukti_pembayaran = $_POST['bukti_pembayaran'];
        $pembayaran = $this->model->getIdpembayaran($id_pembayaran);
        
        if ($pembayaran == null) {
          echo "Jadwal tidak ditemukan";
          return;
        }

        $id_formulir = $_POST['id_formulir'];

        $upload_dir = '../core/imgbayar/';
        $upload_file = $upload_dir . basename($_FILES['bukti_pembayaran']['name']);
    
        if (!move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'], $upload_file)) {
          echo "<script>alert('Pembayaran Gagal');</script>";
          return;
        }

        $update = $this->model->updatePembayaranFormulir($id_formulir, $id_pembayaran, $bukti_pembayaran);
        if($update){
          echo "<script>alert('Pembayaran Berhasil');window.location='konfirmasi_pembayaran.php';</script>";
        } else {
          echo "<script>alert('Pembayaran Gagal');</script>";
        }
      }
      }
    } 
?>