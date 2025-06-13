<?php
ob_start();
session_start();
include "koneksi.php";

echo '<fieldset style="width:450;margin-right: auto;margin-left:auto;"><legend>Silahkan isi Username dan Password</legend>
<form method="post" enctype="multipart/form-data">
<table style="width:376;border:0;" align="left">
<tr>
    <td style="width:200;">Username</td>
    <td style="width:8;">:</td>
    <td style="width:203;"><input type="text" name="username" id="textfield"></td>
</tr>
<tr>
    <td>Password</td>
    <td>:</td>
    <td><input type="text" name="password" id="textfield2"></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Proses">
    <input type="reset" name="button2" id="button2" value="Reset"></td>
</tr>
</table>
</form>
</fieldset>';





if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM akun_users WHERE username = ?  AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password); // bind param
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
 // Login sukses
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role']; // misalnya 'admin' atau 'user'
    header("Location: index.php");
    exit;
    ob_end_flush();
    } else {
    echo "Login gagal!";
    }
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <h2>Login Sistem</h2>
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="text" name="password" required><br><br>
        <input type="submit" value="login">
    </form>
</body>
</html>