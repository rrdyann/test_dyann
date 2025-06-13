<?php
include_once "koneksi.php";

$id_siswalama = $_GET['id_siswa']; // Ambil ID dari URL

$query = "SELECT * FROM siswa_baru WHERE id_siswa = '$id_siswalama'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

?>

<h2>Edit Data Siswa</h2>
<form action="proses_data.php" method="post">
    <input type="hidden" name="id_siswalama" value="<?= $id_siswalama; ?>">

    <label>Id Siswa</label><br>
    <input type="text" name="id_siswa" value="<?= $data['id_siswa']; ?>"><br><br>

    <label>Nama</label><br>
    <input type="text" name="nama" value="<?= $data['nama']; ?>"><br><br>

    <label>Tempat Tanggal Lahir</label><br>
    <input type="text" name="ttl" value="<?= $data['ttl']; ?>"><br><br>

    <label>Warga Negara</label><br>
    <input type="text" name="warga_negara" value="<?= $data['warga_negara']; ?>"><br><br>

        <label>Alamat</label><br>
    <input type="text" name="alamat" value="<?= $data['alamat']; ?>"><br><br>

    <label>Email</label><br>
    <input type="text" name="email" value="<?= $data['email']; ?>"><br><br>

    <label>Nomor Hp</label><br>
    <input type="text" name="nomor_hp" value="<?= $data['nomor_hp']; ?>"><br><br>

    <label>Asal SMP</label><br>
    <input type="text" name="asal_smp" value="<?= $data['asal_smp']; ?>"><br><br>

    <label>Nama Ayah</label><br>
    <input type="text" name="nama_ayah" value="<?= $data['nama_ayah']; ?>"><br><br>

    <label>Nama Ibu</label><br>
    <input type="text" name="nama_ibu" value="<?= $data['nama_ibu']; ?>"><br><br>

    <label>Penghasilan Kedua Orang Tua</label><br>
    <input type="text" name="penghasilan_ortu" value="<?= $data['penghasilan_ortu']; ?>"><br><br>

    <input type="submit" value="Update">
</form>