<?php
require_once "../LinkModelController.php";
$pembayaran = new FormPembayaran();
$pembayaran -> handlePembayaran();
$id_formulir = $_SESSION['id_formulir'];
$id_jadwal = $_SESSION['id_jadwal'];
$tanggal_keberangkatan = $_SESSION['tanggal_keberangkatan'];
$tanggal_pulang = $_SESSION['tanggal_pulang'];
$maskapai = $_SESSION['maskapai'];
$mekah = $_SESSION['mekah'];
$madinah = $_SESSION['madinah'];
$result = $pembayaran->GetAllBank();
if($result) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="../../core/style/style.css"/>
    <link rel="stylesheet" href="../../core/style/pembayaran.css"/>
</head>
<body>
    <main>
    <div class="page-container">
    <div class="payment-container">
    <form action="" method="post" enctype="multipart/form-data">

    <input type="hidden" name="tanggal_keberangkatan" value="<?= $tanggal_keberangkatan; ?>">
    <input type="hidden" name="tanggal_pulang" value="<?= $tanggal_pulang; ?>">
    <input type="hidden" name="maskapai" value="<?= $maskapai; ?>">
    <input type="hidden" name="mekah" value="<?= $mekah; ?>">
    <input type="hidden" name="madinah" value="<?= $madinah; ?>">
    <input type="hidden" name="id_jadwal" value="<?=$id_jadwal;?>">
    <input type="hidden" name="id_formullir" value="<?= $id_formulir; ?>">

        <div class="payment-info">
          <div class="row admin">
            <label for="bank">Nama Bank:</label>
            <select id="bank" name="bank" onchange="updateFields(); inputData();" required>
              <option value="" selected> Pilih Bank </option>
              <?php
                   foreach($result as $row) {
                  echo "<option value='" .  $row['bank'] . "' data-id='" . $row['id_pembayaran'] . "' data-name-rek='" . ucwords($row['name_rek']) . "' data-no-rek='" . $row['no_rek'] . "' data-program='" . ucwords($row['program']) . "' data-nominal='" . $row['nominal'] . "'>" . $row['bank'] . "</option>";
                }
              ?>
            </select>
          </div>
          <input type="hidden" name="id_pembayaran" value="<?php echo $row['id_pembayaran']; ?>">
          <div class="row">
            <label for="account-name">Nama Rekening:</label>
            <input type="text" id="account-name" name="name_rek" value="" readonly>
          </div>
          <div class="row">
            <label for="account-number">Nomor Rekening:</label>
            <input type="text" id="account-number" name="no_rek" readonly>
          </div>
          <div class="row">
            <label for="program">Program:</label>
            <input type="text" id="program" name="program" readonly>
          </div>
          <div class="row">
            <label for="amount">Nominal Pembayaran:</label>
            <input type="text" id="amount" name="nominal" pattern="\d*"readonly>
          </div>
        <?php
      }
      ?>
          <div class="row">
            <label for="proof">Bukti Pembayaran:</label>
            <input type="file" id="proof" name="bukti_pembayaran" accept="image/*">
          </div>
        </div>
        <div class="btn-container">
        <input type="hidden" name="id_formulir" value="<?= $id_formulir; ?>"> 
          <button class="sbt-button" type="submit" name="submit">Kirim</button>
          <a href="table_jadwal.php?id_formulir=<?= $id_formulir; ?>" class="back-button">Kembali</a>
        </div>
      </form>
    </div>
  </div>  
        <nav class="sidebar">
            <a href="profile.html"><img class="user-logo" src="../../core/asset/icon-user.png" alt="user-logo" href="../index.html"></a>  
            <ul class="nav-list">
                <li class="list-item"><a class="login" href="login.html">Login/Daftar</a></li>
                <li class="list-item"><a class="fa" href="galeri.html">Galeri</a></li>
                <li class="list-item"><a class="fa" href="kontak.html">Kontak</a></li>
                <li class="list-item"><a class="fa" href="pendaftaran.html">Daftar Haji & Umroh</a></li>
                <li class="list-item"><a class="fa" href="panduan.html">Panduan</a></li>
                <li class="list-item"><a class="fa tentang-kami" href="tentang-kami.html">Tentang Kami</a></li>
                <li class="list-item"><a class="logout" href="#">Logout</a></li>
              </ul>
        </nav>
        <nav class="wrapper">
          <a href="../index.html"><img class="img-logo" src="../../core/asset/LogoItkontamaTravelOrange2022.png" alt="Logo-icon"></a>
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </nav>
    </div>
</main>
    <script src="../../core/script/script.js"></script>
    <script>
      function updateFields() {
  var bankDropdown = document.getElementById("bank");
  var selectedBank = bankDropdown.value;
  var accountNameInput = document.getElementById("account-name");
  var accountNumberInput = document.getElementById("account-number");
  var programDropdown = document.getElementById("program");
  var amountInput = document.getElementById("amount");

  // Find the option element that corresponds to the selected bank
  var optionElements = bankDropdown.getElementsByTagName("option");
  for (var i = 0; i < optionElements.length; i++) {
    var optionElement = optionElements[i];
    if (optionElement.value === selectedBank) {
      // Update the fields with the corresponding data
      accountNameInput.value = optionElement.dataset.nameRek;
      accountNumberInput.value = optionElement.dataset.noRek;
      programDropdown.value = optionElement.dataset.program;
      amountInput.value = optionElement.dataset.nominal;
      break;
    }
  }
}
function inputData() {
    var id_pembayaran = document.querySelector('#bank option:checked').dataset.id;
    document.querySelector('input[name="id_pembayaran"]').value = id_pembayaran;
}

    </script>
</body>
</html>