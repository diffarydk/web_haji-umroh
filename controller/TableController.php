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
      $jadwal = $this->model->getJadwalPerjalananById($id_jadwal);
      
      if ($jadwal == null) {
        echo "Jadwal tidak ditemukan";
        return;
      }
  
      $id_formulir = $_POST['id_formulir'];
      $tanggal_keberangkatan = $jadwal['tanggal_keberangkatan'];
      $maskapai = $jadwal['maskapai'];
      $tanggal_pulang = $jadwal['tanggal_pulang'];
  
      $update = $this->model->updateFormulir($id_formulir, $id_jadwal, $tanggal_keberangkatan, $maskapai, $tanggal_pulang);
      if($update){
        echo "<script>alert('Jadwal keberangkatan berhasil dipilih');window.location='form_pembayaran.php?id_formulir=$id_formulir';</script>";
      } else {
        echo "<script>alert('Jadwal keberangkatan berhasil dipilih');</script>";
      }
    }
  }
  
  
    
}