<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <center>
    <div class="container">
        <?php echo "Selamat datang, ".$_SESSION['username']."!"; ?><br><br>
        <a href="mahasiswa.php">data mahasiswa</a>
        <a href="logout.php">Logout</a>
    </div>
    </center>
</body>
</html>
