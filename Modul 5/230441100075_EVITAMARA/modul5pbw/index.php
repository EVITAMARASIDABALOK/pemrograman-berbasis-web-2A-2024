<?php
session_start();
if(isset($_SESSION['username'])){
    header("location: home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <center>
    <div class="container">
        <p>Silahkan login terlebih dahulu!</p>
        <form action="proses.php" method="post">
            <p>Username:</p>
            <input type="text" name="username">
            <p>Password:</p>
            <input type="password" name="password"><br><br>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
    </center>
</body>
</html>
