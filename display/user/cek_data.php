<?php
session_start();
include('../../connection.php');
include_once('../../input/DataFormulir.php');
    if(!isset($_SESSION['id_users'])) {
      echo "<script>alert('Anda harus login terlebih dahulu');window.location='../user/login.php';</script>";
      exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="../../core/style/style.css"/>
</head>
<body>
    <main>
    <div class="hContainer daftar">
        <h1 class="heading">Formulir Pendaftaran</h1>
        <form class="form" action="" method="post" enctype="multipart/form-data">
        <?php 
        $formulir = new Formulir();
        $id_formulir = $_GET['id_formulir'] ?? null;
        $user = $formulir->getData($id_formulir);

if ($user) {
?>
            <h3>Program :</h3> <p><?php echo strtoupper($user['program'] ?? ''); ?></p>
            <p><?php echo strtoupper($user['kamar'] ?? ''); ?></p>
            <br>
            <div class="field field_v1">
            <label for="nama" class="ha-screen-reader">Nama Lengkap</label><br>
            <input type="text" name="nama_lengkap" id="nama" class="field__input" placeholder="Isikan nama lengkap anda" value="<?php echo strtoupper($user['nama_lengkap'] ?? ''); ?>" readonly>
            <span class="field__label-wrap" aria-hidden="true">
                <span class="field__label">Nama Lengkap</span>
              </span>
            </div>
            <br><br>
            <div class="field field_v1">
            <label for="nik" class="ha-screen-reader">NIK</label><br>
            <input type="txt" name="nik" id="nik" class="field__input" placeholder="Nomor kartu penduduk anda" pattern="\d*" value="<?php echo $user['nik'] ?? ''; ?>" readonly>
            <span class="field__label-wrap" aria-hidden="true">
                <span class="field__label">NIK</span>
              </span>
            </div>
            <br><br>
            <div class="field field_v1">
                <label for="ayah" class="ha-screen-reader">Nama Ayah Kandung</label><br>
                <input type="txt" name="nama_ayah_kandung" id="ayah" class="field__input" placeholder="Masukkan nama lengkap ayah anda" value="<?php echo strtoupper($user['nama_ayah_kandung'] ?? ''); ?>"readonly>
                <span class="field__label-wrap" aria-hidden="true">
                    <span class="field__label">Nama Ayah Kandung</span>
                  </span>

                </div>
            <br><br>
            <div class="field field_v1">
                <label for="lahir" class="ha-screen-reader">Tempat Lahir</label><br>
                <input type="txt" name="tempat_lahir" id="lahir" class="field__input" placeholder="Tempat lahir anda" value="<?php echo strtoupper($user['tempat_lahir'] ?? ''); ?>" readonly>
                <span class="field__label-wrap" aria-hidden="true">
                    <span class="field__label">Tempat Lahir Anda</span>
                  </span>
                </div>
            <br><br>
            <div class="tanggal">
              <label for="dateofbirth" class="za-lahir">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" id="dateofbirth" class="tanggal-input" value="<?php echo $user['tanggal_lahir'] ?? ''; ?>" readonly>
              <span class="note-1">*</span>
              </div>
              <br>
              <div class="field field_v1">
                <label for="passport" class="ha-screen-reader">Nomor Passport</label><br>
                <input type="txt" name="no_paspor" id="passport" class="field__input" placeholder="Masukkan nomor passport" value="<?php echo $user['no_paspor'] ?? ''; ?>" readonly>
                <span class="field__label-wrap" aria-hidden="true">
                    <span class="field__label">Nomor Passport</span>
                  </span>
                </div>
            <br><br>
            <div class="field field_v1">
              <label for="tmpt-passport" class="ha-screen-reader">Tempat Dikeluarkan Passport</label><br>
              <input type="txt" name="tempat_dikeluarkan_paspor" id="tmpt-passport" class="field__input" placeholder="Masukkan tempat dikeluarkan passport anda" value="<?php echo strtoupper($user['tempat_dikeluarkan_paspor'] ?? ''); ?>" readonly >
              <span class="field__label-wrap" aria-hidden="true">
                  <span class="field__label">Tempat Dikeluarkan Passport</span>
                </span>
            </div>
          <br><br>
          <div class="tanggal">
            <label for="tgl-passport" class="za-lahir">Tanggal Dikeluarkan Passport</label>
            <input type="date" name="tanggal_dikeluarkan_paspor" id="tgl-passport" class="tanggal-input" value="<?php echo $user['tanggal_dikeluarkan_paspor'] ?? ''; ?>" readonly>
            </div>
            <br>
            <div class="tanggal">
              <label for="ms-passport" class="za-lahir">Masa Berlaku Passport</label>
              <input type="date" name="masa_berlaku_paspor" id="ms-passport" class="tanggal-input" value="<?php echo $user['masa_berlaku_paspor'] ?? ''; ?>" readonly>
              </div>
              <br>
              <h3>Jenis Kelamin :</h3>
              <p><?php echo strtoupper($user['jenis_kelamin'] ?? ''); ?></p><br>
              <div class="goldar">
                <label for="bloodType"></label>
                <select id="bloodType" name="golongan_darah" disabled>
                <option value="A" <?php if ($user !== null && $user['golongan_darah'] === 'A') echo "selected"; ?>>A</option>
                <option value="B" <?php if ($user !== null && $user['golongan_darah'] === 'B') echo "selected"; ?>>B</option>
                <option value="AB" <?php if ($user !== null && $user['golongan_darah'] === 'AB') echo "selected"; ?>>AB</option>
                <option value="O" <?php if ($user !== null && $user['golongan_darah'] === 'O') echo "selected"; ?>>O</option>
                </select>
              </div>
              <span class="note-1">*</span>
              <br>
              <div class="goldar">
                <label for="bloodType"></label>
                <select id="bloodType" name="status_perkawinan" disabled>
                <option value="sudah" <?php if ($user !== null && $user['status_perkawinan'] === 'sudah') echo "selected"; ?>>Sudah Menikah</option>
                <option value="Pernah" <?php if ($user !== null && $user['status_perkawinan'] === 'pernah') echo "selected"; ?>>Pernah Menikah</option>
                <option value="belum" <?php if ($user !== null && $user['status_perkawinan'] === 'belum') echo "selected"; ?>>Belum Menikah</option>
                </select>
              </div>
              <span class="note-1">*</span>
              <br>
              <?php 
$formulir = new Formulir();
$id_formulir = $_GET['id_formulir'] ?? null;
$row = $formulir->getWilayah($id_formulir);;
if ($row) {
?>
               <div class="goldar">
                <label for="dataOption"></label>
                <select id="provinsi" name="provinsi" disabled>
                <option value="<?php echo $row['provinsi']; ?>">
                <?php echo $row['provinsi']; ?>
                </option>
                </select>
                </div>
                <span class="note-1">*</span>
                <br>
                <div class="goldar">
                <label for="dataOption"></label>
                <select id="kota" name="kota_kabupaten" disabled>
                <option value=""><?php echo $row['kota_kabupaten']; ?></option>
                </select>
                </div>
                <span class="note-1">*</span>
                <br>
                <div class="goldar">
                <label for="dataOption" ></label>
                <select id="kec" name="kecamatan" disabled>
                <option value=""><?php echo $row['kecamatan']; ?></option>
                </select>
                </div>
                <span class="note-1">*</span>
                <br>
                <div class="goldar">
                <label for="dataOption"></label>
                <select id="kel" name="kelurahan" disabled>
                <option value=""><?php echo $row['kelurahan']; ?></option>
                </select>
                <?php
                                } else {
    echo "No Record Found";
  } ?>
              </div>
              <span class="note-1">*</span>
              <br>
              <div class="field field_v1">
                <label for="jalan" class="ha-screen-reader">Jalan</label><br>
                <input type="txt" name="jalan" id="jalan" class="field__input" placeholder="Masukkan jalan tempat tinggal anda" value="<?php echo strtoupper($user['jalan'] ?? ''); ?>" readonly>
                <span class="field__label-wrap" aria-hidden="true">
                    <span class="field__label">Jalan</span>
                  </span>
                </div>
                <br><br>
                <div class="field field_v1">
                  <label for="email" class="ha-screen-reader">Email</label><br>
                  <input type="email" name="email" id="email" class="field__input" placeholder="Masukkan Email anda" value="<?php echo $user['email'] ?? ''; ?>" readonly>
                  <span class="field__label-wrap" aria-hidden="true">
                      <span class="field__label">Email</span>
                    </span>
                  </div>
                  <br><br>
                  <div class="field field_v1">
                    <label for="no_telp_rumah" class="ha-screen-reader">No Telpon Rumah</label><br>
                    <input type="txt" name="no_telp_rumah" id="no_telp_rumah" class="field__input" placeholder="Nomor telpon rumah anda" pattern="\d*" value="<?php echo $user['no_telp_rumah'] ?? ''; ?>" readonly>
                    <span class="field__label-wrap" aria-hidden="true">
                        <span class="field__label">No Telpon Rumah</span>
                      </span>
                    </div>
                    <br><br>
                    <div class="field field_v1">
                      <label for="no_telp_seluler" class="ha-screen-reader">No Telpon Seluler</label><br>
                      <input type="txt" name="no_telp_seluler" id="no_telp_seluler" class="field__input" placeholder="Nomor telpon seluler anda" pattern="\d*" value="<?php echo $user['no_telp_seluler'] ?? ''; ?>" readonly>
                      <span class="field__label-wrap" aria-hidden="true">
                          <span class="field__label">No Telpon Seluler</span>
                        </span>
                      </div>
                      <br><br>
                      <h3>Pendidikan Terakhir :</h3>
                      <p><?php echo strtoupper($user['pendidikan_terakhir'] ?? ''); ?></p>
                      <br>
                      <div class="field field_v1">
                        <label for="pekerjaan" class="ha-screen-reader">Pekerjaan</label><br>
                        <input type="txt" name="pekerjaan" id="pekerjaan" class="field__input" placeholder="Masukkan pekerjaan anda" value="<?php echo strtoupper($user['pekerjaan'] ?? ''); ?>" readonly>
                        <span class="field__label-wrap" aria-hidden="true">
                            <span class="field__label">Pekerjaan</span>
                          </span>
                        </div>
                        <br><br>
                        <div class="field field_v1">
                          <label for="keluarga_yg_ikut" class="ha-screen-reader">Keluarga Yang Ikut</label><br>
                          <input type="txt" name="keluarga_yg_ikut" id="keluarga_yg_ikut" class="field__input" placeholder="Keluarga Yang Ikut" value="<?php echo strtoupper($user['keluarga_yg_ikut'] ?? ''); ?>" readonly>
                          <span class="field__label-wrap" aria-hidden="true">
                              <span class="field__label">Keluarga yang ikut</span>
                            </span>
                          </div>
                          <br><br>
                          <div class="field field_v1">
                            <label for="hubungan" class="ha-screen-reader">Hubungan</label><br>
                            <input type="txt" name="hubungan" id="hubungan" class="field__input" placeholder="Hubungan" value="<?php echo strtoupper($user['hubungan'] ?? ''); ?>" readonly>
                            <span class="field__label-wrap" aria-hidden="true">
                                <span class="field__label">Hubungan</span>
                              </span>
                            </div>
                            <br><br>
                            <div class="field field_v1">
                              <label for="no_telp" class="ha-screen-reader">No Telpon Keluarga Yang Ikut</label><br>
                              <input type="txt" name="no_telp" id="no_telp_seluler" class="field__input" placeholder="Nomor telpon keluarga yang ikut" pattern="\d*" value="<?php echo $user['no_telp'] ?? ''; ?>" readonly>
                              <span class="field__label-wrap" aria-hidden="true">
                                  <span class="field__label">No Telpon Keluarga Yang ikut</span>
                                </span>
                              </div>
                              <br><br>
                              <div class="field field_v1">
                                <label for="informasi_pendaftaran" class="ha-screen-reader">Informasi Pendaftaran (Refferal)</label><br>
                                <input type="txt" name="informasi_pendaftaran" id="informasi_pendaftaran" class="field__input" placeholder="Masukkan nama orang yang mengajak anda untuk daftar di Itkontama Travel" value="<?php echo strtoupper($user['informasi_pendaftaran'] ?? ''); ?>" readonly>
                                <span class="field__label-wrap" aria-hidden="true">
                                    <span class="field__label">Informasi Pendaftaran (Refferal)</span>
                                  </span>
                              </div>
                            <br><br>
                            <div class="field field_v1">
                              <label for="penyakit_kronis" class="ha-screen-reader">Penyakit Kronis</label><br>
                              <input type="txt" name="penyakit_kronis" id="penyakit_kronis" class="field__input" placeholder="Masukkan jika punya" value="<?php echo strtoupper($user['penyakit_kronis'] ?? ''); ?>" readonly>
                              <span class="field__label-wrap" aria-hidden="true">
                                  <span class="field__label">Penyakit Kronis</span>
                                </span>
                              </div>
                              <br><br>
                              <div class="field field_v1">
                                <label for="keluarga_yg_bisa_dihubungi" class="ha-screen-reader">Keluarga Yang Bisa Dihubungi Ketika Darurat</label><br>
                                <input type="txt" name="keluarga_yg_bisa_dihubungi" id="keluarga_yg_bisa_dihubungi" class="field__input" placeholder="Nama keluarga yang bisa dihubungi" value="<?php echo strtoupper($user['keluarga_yg_bisa_dihubungi'] ?? ''); ?>" readonly>
                                <span class="field__label-wrap" aria-hidden="true">
                                    <span class="field__label">Keluarga Yang Bisa Dihubungi Ketika Darurat</span>
                                  </span>
                                </div>
                                <br><br>
                                <div class="field field_v1">
                                  <label for="hubungan_keluarga" class="ha-screen-reader">Hubungan Keluarga Yang Bisa Dihubungi Ketika Darurat</label><br>
                                  <input type="txt" name="hubungan_keluarga" id="hubungan_keluarga" class="field__input" placeholder="Hubungan keluarga yang bisa dihubungi" value="<?php echo strtoupper($user['hubungan_keluarga'] ?? ''); ?>" readonly>
                                  <span class="field__label-wrap" aria-hidden="true">
                                      <span class="field__label">Hubungan Keluarga Yang Bisa Dihubungi Ketika Darurat</span>
                                    </span>
                                  </div>
                                  <br><br>
                                <div class="field field_v1">
                                  <label for="no_telp_keluarga" class="ha-screen-reader">No Telpon Keluarga Yang Bisa Dihubungi Ketika Darurat</label><br>
                                  <input type="txt" name="no_telp_keluarga" id="no_telp_keluarga" class="field__input" placeholder="Nomor keluarga yang bisa dihubungi" value="<?php echo $user['no_telp_keluarga'] ?? ''; ?>" readonly>
                                  <span class="field__label-wrap" aria-hidden="true">
                                      <span class="field__label">No Telpon Keluarga Yang Bisa Dihubungi Ketika Darurat</span>
                                    </span>
                                  </div>
                                  <br><br><br>
                                  <label for="file"></label>
                                  <span>Foto 3X4 :</span>
                                  <span class="note-1">*</span>
                                  <input type="file" id="file" name="foto" class="file-input" disabled> 
                                      <!-- <a href="table_jadwal.html"><button href="" class="kirim" type="submit"  name ="submit" value="submit"></button></a> -->
                                      <?php
                                } else {
    echo "No Record Found";
  } ?>
                                    </form>
        <a href="profile.php"><button class="bBtn">Kembali</button></a>
        <nav class="sidebar">
          <a href="profile.php"><img class="user-logo" src="../../core/asset/icon-user.png" alt="user-logo" href="../../index.php"></a>  
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
          <a href="../../index.php"><img class="img-logo" src="../../core./asset/LogoItkontamaTravelOrange2022.png" alt="Logo-icon"></a>
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </nav>
    </div>
</main>
<script src="../../core/script/script.js"></script>
</body>
</html>
