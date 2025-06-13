<?php 
include_once "koneksi.php";

$id_siswa     = $_POST['id_siswa'];      // kode mk baru 
$id_siswalama = $_POST['id_siswalama'];
$nama = $_POST['nama']; 
$ttl = $_POST['ttl']; 
$warga_negara    = $_POST['warga_negara']; 
$alamat    = $_POST['alamat']; 
$email        = $_POST['email']; 
$nomor_hp       = $_POST['nomor_hp']; 
$asal_smp       = $_POST['asal_smp']; 
$nama_ayah       = $_POST['nama_ayah']; 
$nama_ibu       = $_POST['nama_ibu']; 
$penghasilan_ortu       = $_POST['penghasilan_ortu']; 
 
// Gunakan prepared statement untuk menghindari sql inj 

$query = "UPDATE siswa_baru SET id_siswa = ?, nama = ?, ttl = ?, warga_negara = ?, alamat = ?, email = ?, nomor_hp = ?, asal_smp = ?, nama_ayah = ?, nama_ibu = ?, penghasilan_ortu = ? WHERE id_siswa = ?"; 
$stmt  = mysqli_prepare($conn, $query); 
 
if ($stmt) { 
    mysqli_stmt_bind_param($stmt, "isssssisssii", $id_siswa, $nama, $ttl, $warga_negara, $alamat, $email, $nomor_hp, $asal_smp, $nama_ayah, $nama_ibu, $penghasilan_ortu, $id_siswalama); 
    $hasil = mysqli_stmt_execute($stmt); 
 
    if ($hasil) { 
        echo "Data berhasil diedit"; 
    } else { 
        echo "Data gagal diedit: " . mysqli_error($conn); 
    } 
 
    mysqli_stmt_close($stmt); 
} else { 
    echo "Gagal menyiapkan query: " .mysqli_error($conn); 
} 
 
mysqli_close($conn); 
 
// Redirect setelah 1 detik 
sleep(1); 
header("Location: lihat_data.php"); 
exit; 
?>