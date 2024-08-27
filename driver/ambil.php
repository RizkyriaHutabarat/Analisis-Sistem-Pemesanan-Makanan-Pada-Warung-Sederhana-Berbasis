<?php


require '../koneksi.php';
$id=$_GET['id'];
$sql = "SELECT * FROM pembelian WHERE id_pembelian=".$id;
$query = mysqli_query($koneksi, $sql);

?>
		<?php
		if(isset($_POST['ambil'])){

   			$sql = "UPDATE `pembelian` SET `status_pengiriman`='Terima' where id_pembelian='$id_pembelian' ";
			$query = mysqli_query($koneksi, $sql);


			if($query) {
				echo "<script>alert('Pesanan di ambil')</script>";
				// header("Location: login.php");
			}else{
				echo "<script>alert('pesanan tidak diterima')</script>";
			}
		}

		?>
		<?php
		if(isset($_POST['tidak'])){

			$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
			$pecah = $ambil->fetch_assoc();

   			$sql = "UPDATE `pembelian` SET `status_pengiriman`='Tolak' WHERE id_pelanggan='$_GET[id]";
			$query = mysqli_query($koneksi, $sql);


			if($query) {
				echo "<script>alert('Pesanan tidak diambil')</script>";
				// header("Location: login.php");
			}else{
				echo "<script>alert('pesanan tidak diterima')</script>";
			}
		}

		?>