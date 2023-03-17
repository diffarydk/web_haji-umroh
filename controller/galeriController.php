<?php
class GaleriController extends PhotoModel 
{       
    private $model;

    public function __construct() {
        $this->model = new PhotoModel();
    }

    public function handleRequest() {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $this->deletePhoto($id);
        }

        if (isset($_POST['submit'])) {
            $nama_file = $_FILES['nama_file']['name'];
            $ukuran_file = $_FILES['nama_file']['size'];
            $tmp_file = $_FILES['nama_file']['tmp_name'];
            $deskripsi = $_POST['deskripsi'];
            $this->uploadPhoto($nama_file, $ukuran_file, $tmp_file, $deskripsi);
        }

        if (isset($_POST['update_deskripsi'])) {
            $id = $_POST['id'];
            $deskripsi = $_POST['deskripsi'];
            $this->updatePhotoDesc($id, $deskripsi);
        }

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $nama_file_lama = $_POST['nama_file_lama'];
            $deskripsi = $_POST['deskripsi'];
            $gambar_baru = $_FILES['gambar_baru'];
            $this->updatePhoto($id, $nama_file_lama, $deskripsi, $gambar_baru);
        }
    }

    public function getAllPhotos() {
        $photos = $this->model->getAllPhotos();
        return $photos;
    }

    public function deletePhoto($id) {
        $result = $this->model->deletePhotoById($id);
        if ($result) {
            echo "File berhasil dihapus dari server dan data berhasil dihapus dari database.";
        } else {
            echo "Terjadi kesalahan saat menghapus file.";
        }
    }

    public function uploadPhoto($nama_file, $ukuran_file, $tmp_file, $deskripsi) {
        $dir_upload = "../../../core/galeri/";
        $target_file = $dir_upload . $nama_file;

        $result = $this->model->upload($nama_file, $ukuran_file, $tmp_file, $deskripsi);
        if ($result) {
            echo "File berhasil di-upload dan data berhasil disimpan ke database.";
        } else {
            // echo "<script>alert('error');window.location='galeri.php';</script>";
        }
    }

    public function updatePhoto($id, $nama_file_lama, $deskripsi, $gambar_baru) {
        $photo = new PhotoModel();

        // Mengambil informasi file gambar baru
        $nama_file = $gambar_baru['name'];
        $ukuran_file = $gambar_baru['size'];
        $error = $gambar_baru['error'];
        $tmp_name = $gambar_baru['tmp_name'];

        // Jika ada gambar baru yang di-upload
        if ($nama_file != '') {
            $update_result = $this->model->updatePhotoById($id, $nama_file, $ukuran_file, $tmp_name, $deskripsi);

            if ($update_result) {
                // Mengarahkan ke halaman galeri dengan pesan sukses
                header("Location: galeri.php?status=success");
                exit();
                } else {
                // Mengarahkan ke halaman galeri dengan pesan error
                header("Location: galeri.php?status=error");
                exit();
                }
                } else {
                // Jika tidak ada gambar baru yang di-upload, hanya mengupdate deskripsi
                $update_result = $this->model->updatePhotoDescById($id, $deskripsi);
                if ($update_result) {
                    // Mengarahkan ke halaman galeri dengan pesan sukses
                    header("Location: galeri.php?status=success");
                    exit();
                } else {
                    // Mengarahkan ke halaman galeri dengan pesan error
                    header("Location: galeri.php?status=error");
                    exit();
                }
            }
        }
        
        public function updatePhotoDesc($id, $deskripsi) {
            $result = $this->model->updatePhotoDescById($id, $deskripsi);
            if ($result) {
                echo "Deskripsi berhasil di-update.";
            } else {
                echo "Terjadi kesalahan saat meng-update deskripsi.";
            }
        }
    }        
               