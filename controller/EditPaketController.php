<?php
    class EditPaketControlller extends EditPaketModel{

        private $model;

        public function __construct()
        {
            $this->model = new EditPaketModel();
        }

        public function GetAll(){
            $row = $this->model->getGambar();
            return $row;
        }

        public function handleRequest() {
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $nama_file_lama = $_POST['nama_file_lama'];
                $gambar_baru = $_FILES['gambar'];
                $this->update($id, $nama_file_lama, $gambar_baru);
            }

        }
    

        public function update($id, $gambar_lama, $gambar_baru) {
           
        
            // Mengambil informasi file gambar baru
            $nama_file = $gambar_baru['name'];
            $ukuran_file = $gambar_baru['size'];
            $error = $gambar_baru['error'];
            $tmp_name = $gambar_baru['tmp_name'];
        
            // Jika ada gambar baru yang di-upload
            if ($nama_file != '') {
                $update_result = $this->model->UpdatePaket($id, $nama_file, $ukuran_file, $tmp_name, $gambar_lama);
        
                if ($update_result) {
                    // Mengarahkan ke halaman EditPaket dengan pesan sukses
                    echo "<script>alert('Gambar berhasil diperbarui');window.location='EditPaket.php';</script>";
                } else {
                    // Menampilkan pesan error
                    echo "<script>alert('Gambar gagal diperbarui');</script>";
                }
            }
        }
        
}
        
    
?>