<?php
session_start();

require '../koneksi.php';


?>


<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pembelian</title>
	<link rel="stylesheet" type="text/css" href="../admin/assets/css/bootstrap.css">
	<link rel="stylesheet" type = "text/css" href="../admin/assets/css/custom.css">
	<link rel="stylesheet" type = "text/css" href="../admin/assets/css/font-awesome.css">
</head>
<body>

	<!-- navbar -->
	<nav class="navbar navbar-default">
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href="../index.php">Home</a></li>
				<li><a href="../logout.php">Logout</a></li>

			</ul>
		</div>
	</nav>
	
	<section class="Konten">
		<div class="container">
			<h1>Daftar Pembeli Warung Makan </h1>
			<hr>
			<table class="table table-bordered">
			</div>
	</section>


	<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama pelanggan</th>
			<th>tanggal</th>
			<th>total</th>
			<th>alamat</th>
			<th>status</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()) { ?>
		

		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td><?php echo $pecah['total_pembelian']; ?></td>
			<td><?php echo $pecah['alamat_pelanggan']; ?></td>
			<td><?php echo $pecah['status_pengiriman']; ?></td>
			<td>

			<form method="post" action="">
						<button class="btn btn-primary" name="ambil">ambil</button>
			</form>
			<form method="post" action="">
						<button class="btn btn-danger" name="tidak">tidak</button>
			</form>
			</td>
		</tr>	

		</tr>
		<?php $nomor++;?>
		<?php } ?>

		<?php $nomor=1; 
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		}
		?>
		<?php
		if(isset($_POST['ambil'])){
			
			
   			$sql = "UPDATE `pembelian` SET `status_pengiriman`='Terima' WHERE 6 ";
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

   			$sql = "UPDATE `pembelian` SET `status_pengiriman`='Tolak'   ";
			$query = mysqli_query($koneksi, $sql);


			if($query) {
				echo "<script>alert('Pesanan tidak diambil')</script>";
				// header("Location: login.php");
			}else{
				echo "<script>alert('pesanan tidak diterima')</script>";
			}
		}

		?>
	</tbody>
</table>


