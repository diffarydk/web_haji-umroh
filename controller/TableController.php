<?php
class TableController extends TableJadwal{
    private $model;
    public function __construct()
    {
        $this->model= new TableJadwal();
    }

    public function GetAllJadwal(){
      $jadwal = $this->model->DataJadwal();
      return $jadwal;
      }

    
          
          public function handleForm() {
            if(isset($_POST['submit'])){
              $id_jadwal = $_POST['id_jadwal'];
              $_SESSION['id_jadwal'] = $id_jadwal;
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
              $_SESSION['tanggal_keberangkatan'] = $tanggal_keberangkatan;
              $_SESSION['tanggal_pulang'] = $tanggal_pulang;
              $_SESSION['maskapai'] = $maskapai;
              $_SESSION['mekah'] = $mekah;
              $_SESSION['madinah'] = $madinah;
              header("location: form_pembayaran.php");
            //   $id_jadwal = $_POST['id_jadwal'];
            //   $jadwal = $this->model->getJadwalPerjalananById($id_jadwal);
              
            //   if ($jadwal == null) {
            //     echo "Jadwal tidak ditemukan";
            //     return;
            //   }
          
            //   $id_formulir = $_POST['id_formulir'];
            //   $tanggal_keberangkatan = $jadwal['tanggal_keberangkatan'];
            //   $tanggal_pulang = $jadwal['tanggal_pulang'];
            //   $maskapai = $jadwal['maskapai'];
            //   $mekah = $jadwal['mekah'];
            //   $madinah = $jadwal['madinah'];
          
            //   $update = $this->model->updateFormulir($id_formulir, $id_jadwal, $tanggal_keberangkatan,$tanggal_pulang, $maskapai,$mekah, $madinah);
            //   if($update){
            //     echo "<script>alert('Berhasil');window.location='form_pembayaran.php';</script>";
            //     // echo "Data gagal diupdate";
            //   } else {
            //     echo "Data gagal diupdate";
            //   }
            // }
          }
          
         
}
}
  
    
