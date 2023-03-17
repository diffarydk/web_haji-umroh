<?php
    class EditHomeController extends EditHome
    {
        private $model;
        public function __construct()
        {
           $this->model = new EditHome();
        }
        
        public function GetAll()
        {
            $row = $this->model->getGambar();
            return $row;
        }
        
        public function update()
        {
            if (isset($_POST['update'])) {
                $id = $_POST['id']; // mendapatkan id yang diupdate dari form
                $gambar_lama = $_POST['gambar_lama']; // mendapatkan nama file gambar lama dari form
                $gambar_baru = $_FILES['gambar']['name']; // mendapatkan nama file gambar baru dari form
                $temp_file = $_FILES['gambar']['tmp_name']; // mendapatkan lokasi file sementara gambar baru dari form
        
                $result = $this->model->updateGambar($id, $gambar_lama, $gambar_baru, $temp_file);
                if ($result) {
                    echo "<script>alert('Data sudah di Update');window.location='../welcome.php';</script>";
                } else {
                    echo "Error: Data gagal di-update";
                }
            }
        }
      
        
    }

?>  