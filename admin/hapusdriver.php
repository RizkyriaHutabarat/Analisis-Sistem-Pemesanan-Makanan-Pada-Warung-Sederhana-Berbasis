<?php

	$ambil = $koneksi->query("SELECT * FROM driver WHERE id_driver='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();

	$koneksi->query("DELETE FROM driver WHERE id_driver='$_GET[id]'");

	echo "<script>alert('driver terhapus');</script>";
	echo "<script>location='index.php?halaman=driver';</script>";

?>