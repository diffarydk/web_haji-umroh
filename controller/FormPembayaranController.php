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
        $id_jadwal = $_POST['id_jadwal'];
              $jadwal = $this->model->getJadwalPerjalananById($id_jadwal);
              
              if ($jadwal == null) {
                echo "Jadwal tidak ditemukan";
                return;
              }
          
              $id_formulir = $_POST['id_formulir'];
              $tanggal_keberangkatan = $jadwal['tanggal_keberangkatan'];
              $tanggal_pulang = $jadwal['tanggal_pulang'];
              $maskapai = $jadwal['maskapai'];
              $mekah = $jadwal['mekah'];
              $madinah = $jadwal['madinah'];
              $_SESSION['id_formulir'] = $id_formulir;
          
              $update = $this->model->updateFormulir($id_formulir, $id_jadwal, $tanggal_keberangkatan,$tanggal_pulang, $maskapai,$mekah, $madinah);
              
         $id_pembayaran = $_POST['id_pembayaran'];
         $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
         $pembayaran = $this->model->getIdpembayaran($id_pembayaran);
        
        if ($pembayaran == null) {
          echo "Jadwal tidak ditemukan";
          return;
        }

        $id_formulir = $_POST['id_formulir'];
        $upload_dir = '../../core/ImgBayar/';
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
      public function updatePembayaranAdmin()
      {
        if(isset($_POST['submit'])){
          $id_formulir = $_POST['id_formulir'];
                $formulir = $this->model->getIdFormulir($id_formulir);

                if ($formulir == null) {
                  echo "Formulir Tidak Ditemukan";
                  return;
                }
              
                $id_formulir = $_POST['id_formulir'];
                $status = $formulir['status'];
                $_SESSION['id_formulir'] = $id_formulir;
                
                $update = $this->model->updatePembayaranStatus($id_formulir, $status);
                if($update){
                  echo "<script>alert('Pembayaran Berhasil')</script>";
                } else {
                  echo "<script>alert('Pembayaran Gagal');</script>";
                }
      }
    }
} 
?>