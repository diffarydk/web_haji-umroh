<?php
require_once "../../LinkModelController.php";
$controller = new EditHomeController();
$row = $controller->GetAll();
$controller->update();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../../core/style/EditHome.css">
</head>
<body>
  <div class="wrapper">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="upload-box">
        <input type="file" name="gambar" accept="/*" hidden id="file-input">
        <img src="upload-icon.svg" alt="" id="upload-icon">
        <p>Browse File to Upload</p>
      </div>
      <div class="content">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="hidden" name="gambar_lama" value="<?php echo $row['gambar']; ?>">
        <button type="submit" name="update" class="download-btn">Update</button>
      </div>
    </form>
  </div>
</body>
<script src="../../../core/script/EditHome.js"></script>
</html>