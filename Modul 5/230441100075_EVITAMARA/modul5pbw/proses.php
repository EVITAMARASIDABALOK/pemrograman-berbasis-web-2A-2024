<?php
session_start();
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek ke database untuk proses autentikasi (disesuaikan dengan database Anda)
    if($username == "evi" && $password == "evi14"){
        $_SESSION['username'] = $username;
        header("location: home.php");
    } else {
        echo "Login gagal. Silakan coba lagi.";
    }
}
?>
