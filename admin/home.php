<?php    

    if(!isset($_SESSION["login"])){
        header("location: login.php");
        exit;
    }
?>
<h2>selamat datang administrator<h2>
