<?php
session_start();
include('../../../connection.php');
include_once('../../../input/DashboardModel.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="../../../core/style/style.css"/>

</head>
<body>
    <main>
    <div class="hContainer daftar">
        <h1 class="heading">Formulir Pendaftaran</h1>
        <form class="form" action="../../../controller/UpdateController.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_formulir" value="<?php echo $user['id_formulir'] ?>" readonly>
        <input type="hidden" name="id_users" value="<?php echo $user['id_users'] ?>" readonly>
        <?php 
        $formulir = new admin();
        $id_formulir = $_GET['id_formulir'] ?? null;
        $user = $formulir->getInfo($id_formulir);

if ($user) {
?>
            <h3>Program :</h3> 
            <div class="goldar-2">
                <label for="bloodType"></label>
                <select id="bloodType" name="program" required>
                <option value="1" <?php if ($user !== null && $user['program'] === 'Umroh Reguler') echo "selected"; ?>>Umroh Reguler</option>
                <option value="2" <?php if ($user !== null && $user['program'] === 'Umroh Plus') echo "selected"; ?>>Umroh Plus</option>
                </select>
              </div>
              <br>
              <div class="goldar-2">
                <label for="bloodType"></label>
                <select id="bloodType" name="kamar" required>
                <option value="4" <?php if ($user !== null && $user['kamar'] === 'Quad') echo "selected"; ?>>Quad</option>
                <option value="3" <?php if ($user !== null && $user['kamar'] === 'Triple') echo "selected"; ?>>Triple</option>
                <option value="2" <?php if ($user !== null && $user['kamar'] === 'Doule') echo "selected"; ?>>Double</option>
                </select>
              </div>
            <div class="field field_v1">
            <label for="nama" class="ha-screen-reader">Nama Lengkap</label><br>
            <input type="text" name="nama" id="nama" class="field__input" placeholder="Isikan nama lengkap anda" value="<?php echo strtoupper($user['nama_lengkap'] ?? ''); ?>" required>
            <span class="field__label-wrap" aria-hidden="true">
                <span class="field__label">Nama Lengkap</span>
              </span>
              <span class="note-1">*</span>
            </div>
            <br><br>
            <div class="field field_v1">
            <label for="nik" class="ha-screen-reader">NIK</label><br>
            <input type="txt" name="nik" id="nik" class="field__input" placeholder="Nomor kartu penduduk anda" pattern="\d*" value="<?php echo $user['nik'] ?? ''; ?>" required>
            <span class="field__label-wrap" aria-hidden="true">
                <span class="field__label">NIK</span>
              </span>
              <span class="note-1">*</span>
            </div>
            <br><br>
            <div class="field field_v1">
                <label for="ayah" class="ha-screen-reader">Nama Ayah Kandung</label><br>
                <input type="txt" name="ayah" id="ayah" class="field__input" placeholder="Masukkan nama lengkap ayah anda" value="<?php echo strtoupper($user['nama_ayah_kandung'] ?? ''); ?>" required>
                <span class="field__label-wrap" aria-hidden="true">
                    <span class="field__label">Nama Ayah Kandung</span>
                  </span>
                  <span class="note-1">*</span>
                </div>
            <br><br>
            <div class="field field_v1">
                <label for="lahir" class="ha-screen-reader">Tempat Lahir</label><br>
                <input type="txt" name="tempat_lahir" id="lahir" class="field__input" placeholder="Tempat lahir anda" value="<?php echo strtoupper($user['tempat_lahir'] ?? ''); ?>"required>
                <span class="field__label-wrap" aria-hidden="true">
                    <span class="field__label">Tempat Lahir Anda</span>
                  </span>
                  <span class="note-1">*</span>
                </div>
            <br><br>
            <div class="tanggal">
              <label for="dateofbirth" class="za-lahir">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" id="dateofbirth" class="tanggal-input" value="<?php echo $user['tanggal_lahir'] ?? ''; ?>" required>
              <span class="note-1">*</span>
              </div>
              <br>
              <div class="field field_v1">
                <label for="passport" class="ha-screen-reader">Nomor Passport</label><br>
                <input type="txt" name="no_paspor" id="passport" class="field__input" placeholder="Masukkan nomor passport" value="<?php echo $user['no_paspor'] ?? ''; ?>">
                <span class="field__label-wrap" aria-hidden="true">
                    <span class="field__label">Nomor Passport</span>
                  </span>
                  <span class="note">(tidak wajib jika tidak punya)</span>
                </div>
            <br><br>
            <div class="field field_v1">
              <label for="tmpt-passport" class="ha-screen-reader">Tempat Dikeluarkan Passport</label><br>
              <input type="txt" name="tempat_dikeluarkan_paspor" id="tmpt-passport" class="field__input" placeholder="Masukkan tempat dikeluarkan passport anda" value="<?php echo strtoupper($user['tempat_dikeluarkan_paspor'] ?? ''); ?>">
              <span class="field__label-wrap" aria-hidden="true">
                  <span class="field__label">Tempat Dikeluarkan Passport</span>
                </span>
              <span class="note">(tidak wajib)</span>
            </div>
          <br><br>
          <div class="tanggal">
            <label for="tgl-passport" class="za-lahir">Tanggal Dikeluarkan Passport</label>
            <input type="date" name="tanggal_dikeluarkan_paspor" id="tgl-passport" class="tanggal-input" value="<?php echo $user['tanggal_dikeluarkan_paspor'] ?? ''; ?>">
            <span class="note">(tidak wajib)</span>
            </div>
            <br>
            <div class="tanggal">
              <label for="ms-passport" class="za-lahir">Masa Berlaku Passport</label>
              <input type="date" name="masa_berlaku_paspor" id="ms-passport" class="tanggal-input" value="<?php echo $user['masa_berlaku_paspor'] ?? ''; ?>">
              <span class="note">(tidak wajib)</span>
              </div>
              <br>
              <h3>Jenis Kelamin :</h3>
              <div class="goldar-3">
                <label for="bloodType"></label>
                <select id="bloodType" name="jenis_kelamin" required>
                <option value="1" <?php if ($user !== null && $user['jenis_kelamin'] === 'Pria') echo "selected"; ?>>Pria</option>
                <option value="2" <?php if ($user !== null && $user['jenis_kelamin'] === 'Wanita') echo "selected"; ?>>Wanita</option>
                </select>
              </div>
              <div class="goldar">
                <label for="bloodType"></label>
                <select id="bloodType" name="golongan_darah" required>
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
                <select id="bloodType" name="goldar" required>
                <option value="sudah" <?php if ($user !== null && $user['status_perkawinan'] === 'sudah') echo "selected"; ?>>Sudah Menikah</option>
                <option value="Pernah" <?php if ($user !== null && $user['status_perkawinan'] === 'pernah') echo "selected"; ?>>Pernah Menikah</option>
                <option value="belum" <?php if ($user !== null && $user['status_perkawinan'] === 'belum') echo "selected"; ?>>Belum Menikah</option>
                </select>
              </div>
              <span class="note-1">*</span>
              <br><?php
              $formulir = new admin();
$id_formulir = $_GET['id_formulir'] ?? null;
$row = $formulir->getWilayah($id_formulir);;
if ($row) { ?>

            <div class="field field_v1">
            <label for="provinsi" class="ha-screen-reader">Provinsi</label><br>
            <input type="text" name="nama" id="provinsi" class="field__input" placeholder="Isikan Provinsi" value="<?php echo $row['provinsi']; ?>" required>
            <span class="field__label-wrap" aria-hidden="true">
              <span class="field__label">Provinsi</span>
              </span>
              <span class="note-1">*</span>
            </div>
            <br><br>
            <div class="field field_v1">
            <label for="kota" class="ha-screen-reader">Kota/Kabupaten</label><br>
            <input type="text" name="kota_kabupaten" id="kota" class="field__input" placeholder="Isikan Kota atau Kabupaten" value="<?php echo $row['kota_kabupaten']; ?>" required>
            <span class="field__label-wrap" aria-hidden="true">
              <span class="field__label">Kota/Kabupaten</span>
              </span>
              <span class="note-1">*</span>
            </div>
                <br><br>
                <div class="field field_v1">
            <label for="kec" class="ha-screen-reader">Kecamatan</label><br>
            <input type="text" name="kota_kabupaten" id="kec" class="field__input" placeholder="Isikan Provinsi" value="<?php echo $row['kecamatan']; ?>" required>
            <span class="field__label-wrap" aria-hidden="true">
              <span class="field__label">Kecamatan</span>
              </span>
              <span class="note-1">*</span>
            </div>
                <br><br>
                <div class="field field_v1">
            <label for="kel" class="ha-screen-reader">Kelurahan</label><br>
            <input type="text" name="kelurahan" id="kel" class="field__input" placeholder="Isikan Provinsi" value="<?php echo $row['kelurahan']; ?>" required>
            <span class="field__label-wrap" aria-hidden="true">
              <span class="field__label">Kelurahan</span>
              </span>
              <span class="note-1">*</span>

                <?php
                                } else {
    echo "No Record Found";
  } ?>
              </div>
              <br><br>
              <div class="field field_v1">
                <label for="jalan" class="ha-screen-reader">Jalan</label><br>
                <input type="txt" name="jalan" id="jalan" class="field__input" placeholder="Masukkan jalan tempat tinggal anda" value="<?php echo strtoupper($user['jalan'] ?? ''); ?>" required>
                <span class="field__label-wrap" aria-hidden="true">
                    <span class="field__label">Jalan</span>
                  </span>
                  <span class="note-1">*</span>
                </div>
                <br><br>
                <div class="field field_v1">
                  <label for="email" class="ha-screen-reader">Email</label><br>
                  <input type="email" name="email" id="email" class="field__input" placeholder="Masukkan Email anda" value="<?php echo $user['email'] ?? ''; ?>" required>
                  <span class="field__label-wrap" aria-hidden="true">
                      <span class="field__label">Email</span>
                    </span>
                    <span class="note-1">*</span>
                  </div>
                  <br><br>
                  <div class="field field_v1">
                    <label for="no_telp_rumah" class="ha-screen-reader">No Telpon Rumah</label><br>
                    <input type="txt" name="no_telp_rumah" id="no_telp_rumah" class="field__input" placeholder="Nomor telpon rumah anda" pattern="\d*" value="<?php echo $user['no_telp_rumah'] ?? ''; ?>" required>
                    <span class="field__label-wrap" aria-hidden="true">
                        <span class="field__label">No Telpon Rumah</span>
                      </span>
                      <span class="note-1">*</span>
                    </div>
                    <br><br>
                    <div class="field field_v1">
                      <label for="no_telp_seluler" class="ha-screen-reader">No Telpon Seluler</label><br>
                      <input type="txt" name="no_telp_seluler" id="no_telp_seluler" class="field__input" placeholder="Nomor telpon seluler anda" pattern="\d*" value="<?php echo $user['no_telp_seluler'] ?? ''; ?>" required>
                      <span class="field__label-wrap" aria-hidden="true">
                          <span class="field__label">No Telpon Seluler</span>
                        </span>
                        <span class="note-1">*</span>
                      </div>
                      <br><br>
                      <h3>Pendidikan Terakhir :</h3>
                      <div class="goldar-4">
                <label for="bloodType"></label>
                <select id="bloodType" name="pendidikan_terakhir" required>
                <option value="1" <?php if ($user !== null && $user['pendidikan_terakhir'] === 'SD/Sederajat') echo "selected"; ?>>SD/Sederajat</option>
                <option value="2" <?php if ($user !== null && $user['pendidikan_terakhir'] === 'SMP/Sederajat') echo "selected"; ?>>SMP/Sederajat</option>
                <option value="3" <?php if ($user !== null && $user['pendidikan_terakhir'] === 'SMA/Sederajat') echo "selected"; ?>>SMA/Sederajat</option>
                <option value="4" <?php if ($user !== null && $user['pendidikan_terakhir'] === 'S1/Sederajat/Lebih') echo "selected"; ?>>S1/Sederajat/Lebih</option>
                </select>
              </div>
                      <div class="field field_v1">
                        <label for="pekerjaan" class="ha-screen-reader">Pekerjaan</label><br>
                        <input type="txt" name="pekerjaan" id="pekerjaan" class="field__input" placeholder="Masukkan pekerjaan anda" value="<?php echo strtoupper($user['pekerjaan'] ?? ''); ?>" required>
                        <span class="field__label-wrap" aria-hidden="true">
                            <span class="field__label">Pekerjaan</span>
                          </span>
                          <span class="note-1">*</span>
                        </div>
                        <br><br>
                        <div class="field field_v1">
                          <label for="keluarga_yg_ikut" class="ha-screen-reader">Keluarga Yang Ikut</label><br>
                          <input type="txt" name="keluarga_yg_ikut" id="keluarga_yg_ikut" class="field__input" placeholder="Keluarga Yang Ikut" value="<?php echo strtoupper($user['keluarga_yg_ikut'] ?? ''); ?>">
                          <span class="field__label-wrap" aria-hidden="true">
                              <span class="field__label">Keluarga yang ikut</span>
                            </span>
                            <span class="note">(tidak wajib)</span>
                          </div>
                          <br><br>
                          <div class="field field_v1">
                            <label for="hubungan" class="ha-screen-reader">Hubungan</label><br>
                            <input type="txt" name="hubungan" id="hubungan" class="field__input" placeholder="Hubungan" value="<?php echo strtoupper($user['hubungan'] ?? ''); ?>">
                            <span class="field__label-wrap" aria-hidden="true">
                                <span class="field__label">Hubungan</span>
                              </span>
                              <span class="note">(tidak wajib jika tidak ikut)</span>
                            </div>
                            <br><br>
                            <div class="field field_v1">
                              <label for="no_telp" class="ha-screen-reader">No Telpon Keluarga Yang Ikut</label><br>
                              <input type="txt" name="no_telp" id="no_telp_seluler" class="field__input" placeholder="Nomor telpon keluarga yang ikut" pattern="\d*" value="<?php echo $user['no_telp'] ?? ''; ?>">
                              <span class="field__label-wrap" aria-hidden="true">
                                  <span class="field__label">No Telpon Keluarga Yang ikut</span>
                                </span>
                                <span class="note">(tidak wajib jika tidak ikut)</span>
                              </div>
                              <br><br>
                              <div class="field field_v1">
                                <label for="informasi_pendaftaran" class="ha-screen-reader">Informasi Pendaftaran (Refferal)</label><br>
                                <input type="txt" name="informasi_pendaftaran" id="informasi_pendaftaran" class="field__input" placeholder="Masukkan nama orang yang mengajak anda untuk daftar di Itkontama Travel" value="<?php echo strtoupper($user['informasi_pendaftaran'] ?? ''); ?>" >
                                <span class="field__label-wrap" aria-hidden="true">
                                    <span class="field__label">Informasi Pendaftaran (Refferal)</span>
                                  </span>
                                <span class="note">(tidak wajib)</span>
                              </div>
                            <br><br>
                            <div class="field field_v1">
                              <label for="penyakit_kronis" class="ha-screen-reader">Penyakit Kronis</label><br>
                              <input type="txt" name="penyakit_kronis" id="penyakit_kronis" class="field__input" placeholder="Masukkan jika punya" value="<?php echo strtoupper($user['penyakit_kronis'] ?? ''); ?>">
                              <span class="field__label-wrap" aria-hidden="true">
                                  <span class="field__label">Penyakit Kronis</span>
                                </span>
                                <span class="note">(masukkan jika punya)</span>
                              </div>
                              <br><br>
                              <div class="field field_v1">
                                <label for="keluarga_yg_bisa_dihubungi" class="ha-screen-reader">Keluarga Yang Bisa Dihubungi Ketika Darurat</label><br>
                                <input type="txt" name="keluarga_yg_bisa_dihubungi" id="keluarga_yg_bisa_dihubungi" class="field__input" placeholder="Nama keluarga yang bisa dihubungi" value="<?php echo strtoupper($user['keluarga_yg_bisa_dihubungi'] ?? ''); ?>" required>
                                <span class="field__label-wrap" aria-hidden="true">
                                    <span class="field__label">Keluarga Yang Bisa Dihubungi Ketika Darurat</span>
                                  </span>
                                  <span class="note-1">*</span>
                                </div>
                                <br><br>
                                <div class="field field_v1">
                                  <label for="hubungan_keluarga" class="ha-screen-reader">Hubungan Keluarga Yang Bisa Dihubungi Ketika Darurat</label><br>
                                  <input type="txt" name="hubungan_keluarga" id="hubungan_keluarga" class="field__input" placeholder="Hubungan keluarga yang bisa dihubungi" value="<?php echo strtoupper($user['hubungan_keluarga'] ?? ''); ?>"  required>
                                  <span class="field__label-wrap" aria-hidden="true">
                                      <span class="field__label">Hubungan Keluarga Yang Bisa Dihubungi Ketika Darurat</span>
                                    </span>
                                    <span class="note-1">*</span>
                                  </div>
                                  <br><br>
                                <div class="field field_v1">
                                  <label for="no_telp_keluarga" class="ha-screen-reader">No Telpon Keluarga Yang Bisa Dihubungi Ketika Darurat</label><br>
                                  <input type="txt" name="no_telp_keluarga" id="no_telp_keluarga" class="field__input" placeholder="Nomor keluarga yang bisa dihubungi" value="<?php echo $user['no_telp_keluarga'] ?? ''; ?>"required>
                                  <span class="field__label-wrap" aria-hidden="true">
                                      <span class="field__label">No Telpon Keluarga Yang Bisa Dihubungi Ketika Darurat</span>
                                    </span>
                                    <span class="note-1">*</span>
                                  </div>
                                  <br><br><br>
                                  <!-- <label for="file"></label>
                                  <span>Foto 3X4 :</span>
                                  <span class="note-1">*</span>
                                  <input type="file" id="file" name="foto" class="file-input" accept="image/*" value="" required> -->
                                   <button  class="kirim" type="submit" name="submit" value="submit">Simpan</button>
                                   <?php
                                } else {
    echo "No Record Found";
  } ?>
        </form>
        <a href="dashboard_user.php?id_users=<?php echo $row['id_users']; ?>"><button class="bBtn">Kembali</button></a>
        <nav class="sidebar">
          <img class="user-logo" src="../../../core/asset/icon-user.png" alt="user-logo" href="../welcome.html">
            <ul class="nav-list">
                <li class="list-item"><a class="login" href="login.html">Login/Daftar</a></li>
                <li class="list-item"><a class="fa" href="galeri.html">Galeri</a></li>
                <li class="list-item"><a class="fa" href="kontak.html">Kontak</a></li>
                <li class="list-item"><a class="fa" href="pendaftaran.html">Daftar Haji & Umroh</a></li>
                <li class="list-item"><a class="fa" href="dashboard.html">Dashboard</a></li>
                <li class="list-item"><a class="fa tentang-kami" href="tentang-kami.html">Tentang Kami</a></li>
                <li class="list-item"><a class="logout" href="#">Logout</a></li>
              </ul>
        </nav>
        <nav class="wrapper">
          <a href="../welcome.html"><img class="img-logo" src="../../../core/asset/LogoItkontamaTravelOrange2022.png" alt="Logo-icon"></a>
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </nav>
    </div>
</main>
<script src="../../../core/script/script.js"></script>
</body>
</html>
