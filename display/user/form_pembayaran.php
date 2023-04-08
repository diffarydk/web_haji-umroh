<?php
require_once "../LinkModelController.php";
$pembayaran = new PembayaranController();
$pembayaran->handleForm();
$admin = new admin();
$result = $admin->DataBank();
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
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="payment-info">
          <div class="row">
            <label for="bank">Nama Bank:</label>
            <select id="bank" name="bank" onchange="updateFields()" required>
              <option value="" selected> Pilih Bank </option>
              <?php
                   foreach($result as $row) {
                  echo "<option value='" .  $row['bank'] . "' data-id='" . $row['id_pembayaran'] . "' data-name-rek='" . ucwords($row['name_rek']) . "' data-no-rek='" . $row['no_rek'] . "' data-program='" . ucwords($row['program']) . "' data-nominal='" . $row['nominal'] . "'>" . $row['bank'] . "</option>";
                }
              ?>
            </select>
          </div>
          <input type="hidden" name="id_pembayaran_formulir" value="<?php echo $row['id_pembayaran']; ?>">
          <div class="row admin">
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
            <input type="file" id="proof" name="proof" accept="image/*" required>
          </div>
        </div>
        <div class="btn-container">
          <button class="sbt-button" type="submit" name="submit" onclick="inputData()">Kirim</button>
          <a href="table_jadwal.php?id_formulir=<?php echo $row['id_formulir']; ?>" class="back-button">Kembali</a>
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
    var confirmed = confirm("Anda yakin ingin menghapus data ini?");
    if (confirmed) {
      window.location.href = "konfirmasi_pembayaran.php?id_pembayaran=" + id_pembayaran;
    }
  }
    </script>
</body>
</html>
