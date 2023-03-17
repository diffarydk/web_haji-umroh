<?php
class EditPaketModel extends Database{

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function getGambar()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM gambarpaket");
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function UpdatePaket($id, $nama_file, $ukuran_file, $tmp_file, $gambar_lama)
    {
        $target_dir = "../../../core/GambarPaket/";
        $target_file = $target_dir . basename($nama_file);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($tmp_file);

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<script>alert('File sudah ada');</script>";
            $uploadOk = 0;
        }

        // Check file size
        if ($ukuran_file > 5000000) {
            echo "<script>alert('Ukuran file terlalu besar');</script>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "<script>alert('Jenis file yang di upload hanya JPG, JPEG, PNG & GIF');</script>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            return false;
        } else {
            // hapus file gambar lama jika ada
            $old_path = $target_dir . $gambar_lama;
            if (file_exists($old_path)) {
                unlink($old_path);
            }
            // upload file gambar baru ke folder upload
            if (move_uploaded_file($tmp_file, $target_file)) {
                $sql = "UPDATE gambarpaket SET gambar='$nama_file' WHERE id = '$id'";
                if (mysqli_query($this->conn, $sql)) {
                    return true;
                } else {
                    echo "Error: " . mysqli_error($this->conn);
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    
    
    
} // <-- Missing curly brace
