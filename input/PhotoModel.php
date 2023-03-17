<?php 
class PhotoModel extends Database {
    private $nama_file;
    private $ukuran_file;
    private $tmp_file;
    private $deskripsi;

    public function __construct() {
        $db = new Database;
        $this->conn = $db->conn;
    }

    public function getAllPhotos() {
        $sql = "SELECT * FROM galeri";
        $result = mysqli_query($this->conn, $sql);
        $photos = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $photos[] = $row;
            }
        }
        return $photos;
    }
    
    public function upload($nama_file, $ukuran_file, $tmp_file, $deskripsi) {
        $this->nama_file = $nama_file;
        $this->ukuran_file = $ukuran_file;
        $this->tmp_file = $tmp_file;
        $this->deskripsi = $deskripsi;

        $target_dir = "../../../core/galeri/";
        $target_file = $target_dir . basename($this->nama_file);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($this->tmp_file);
        
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<script>alert('File sudah ada');window.location='galeri.php';</script>";
            $uploadOk = 0;
        }
        
        // Check file size
        if ($this->ukuran_file > 5000000) {
            echo "<script>alert('Ukuran file terlalu besar');window.location='galeri.php';</script>";
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "<script>alert('Jenis file yang di upload hanya JPG, JPEG, PNG & GIF');window.location='galeri.php';</script>";
            $uploadOk = 0;
        }
        
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            return false;
        } else {
            if (move_uploaded_file($this->tmp_file, $target_file)) {
                $sql = "INSERT INTO galeri VALUES ('','$this->nama_file', '$this->deskripsi')";
                if (mysqli_query($this->conn, $sql)) {
                    return true;
                } else {
                    echo "Error: " . mysqli_error($this->conn);
                    return false;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
                return false;
            }
        }
    }

    public function updatePhotoById($id, $nama_file, $ukuran_file, $tmp_file, $deskripsi) {
        // Get photo data
        $sql = "SELECT * FROM galeri WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        $photo = mysqli_fetch_assoc($result);
    
        if (!$photo) {
            echo "<script>alert('Photo not found.');window.location='../display/admin/core/galeri.php';</script>";
            return false;
        }
    
        // Delete old photo file if new photo is uploaded
        if (!empty($nama_file) && !empty($ukuran_file) && !empty($tmp_file)) {
            $target_dir = "../../../core/galeri/";
            $target_file = $target_dir . $photo['nama_file'];
            if (file_exists($target_file)) {
                unlink($target_file);
            }
    
            // Upload new photo file
            $this->nama_file = $nama_file;
            $this->ukuran_file = $ukuran_file;
            $this->tmp_file = $tmp_file;
    
            $target_file = $target_dir . basename($this->nama_file);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($this->tmp_file);
    
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "<script>alert('File already exists.');window.location='../display/admin/core/galeri.php';</script>";
                $uploadOk = 0;
            }
    
            // Check file size
            if ($this->ukuran_file > 5000000) {
                echo "<script>alert('Ukuran gambar terlalu besar');window.location='../display/admin/core/galeri.php';</script>";
                $uploadOk = 0;
            }
    
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "<script>alert('jenis file yang di ijinkan JPG, JPEG, PNG & GIF ');window.location='../display/admin/core/galeri.php';</script>";
                echo "Only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
    
            if ($uploadOk == 0) {
                echo "<script>alert('Maaf, file  ');window.location='../display/admin/core/galeri.php';</script>";
                echo "Sorry, your file was not uploaded.";
                return false;
            } else {
                if (move_uploaded_file($this->tmp_file, $target_file)) {
                    // Update photo record with new file and description
                    $sql = "UPDATE galeri SET nama_file='$this->nama_file', deskripsi='$deskripsi' WHERE id=$id";
                    if (mysqli_query($this->conn, $sql)) {
                        return true;
                    } else {
                        echo "Error updating record: " . mysqli_error($this->conn);
                        return false;
                    }
                }
            }
        }
    }

    public function updatePhotoDescById($id, $deskripsi) {
        // Get photo data
        $sql = "SELECT * FROM galeri WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        $photo = mysqli_fetch_assoc($result);
    
        if (!$photo) {
            echo "<script>alert('Photo not found.');window.location='../display/admin/core/galeri.php';</script>";
            return false;
        }
    
        // Update photo record
        $sql = "UPDATE galeri SET deskripsi='$deskripsi' WHERE id=$id";
        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            echo "Error updating record: " . mysqli_error($this->conn);
            return false;
        }
    }
    
    

    public function deletePhotoById($id) {
        // Get photo data
        $sql = "SELECT * FROM galeri WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        $photo = mysqli_fetch_assoc($result);
    
        if (!$photo) {
            echo "Photo not found.";
            return false;
        }
    
        // Delete photo file
        $target_dir = "../../../core/galeri/";
        $target_file = $target_dir . $photo['nama_file'];
        if (file_exists($target_file)) {
            unlink($target_file);
        }
    
        // Delete photo record
        $sql = "DELETE FROM galeri WHERE id = $id";
        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            echo "Error deleting record: " . mysqli_error($this->conn);
            return false;
        }
    }
    
}
?>
