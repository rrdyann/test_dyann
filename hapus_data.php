<?php
include_once "koneksi.php";

if (isset($_GET['id_siswa'])) {
    $id_siswa = $_GET['id_siswa'];

    $query = "DELETE FROM siswa_baru WHERE id_siswa = ?";

    $stmt = mysqli_prepare($conn, $query);
    
      if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $id_siswa); // s untuk string
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
} 

sleep(1);
header("Location: lihat_data.php");
exit;
?>