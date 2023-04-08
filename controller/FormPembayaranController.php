<?php
class PembayaranController extends TableJadwal{
    private $model;
    public function __construct()
    {
        $this->model= new TableJadwal();
    }
    public function handleForm() {
        if(isset($_POST['submit'])){
            
            $id_pembayaran = $_POST['id_pembayaran'];
            $pembayaran = $this->model->getId_pembayaran($id_pembayaran);

            if ($pembayaran == null) {
                echo "Jadwal tidak ditemukan";
                return;
              }

              $id_formulir = $_POST['id_formulir'];
              $id_pembayaran = $pembayaran['id_pembayaran'];
              
              $update = $this->model->updatePembayaranFormulir($id_formulir, $id_pembayaran);
              if($update){
                echo "<script>alert('Jadwal keberangkatan berhasil dipilih');window.location='konfirmasi_pembayaran.php?id_pembayaran=$id_pembayaran';</script>";
              } else {
                echo "<script>alert('Jadwal keberangkatan berhasil dipilih');</script>";
              }
            }
          }
}

