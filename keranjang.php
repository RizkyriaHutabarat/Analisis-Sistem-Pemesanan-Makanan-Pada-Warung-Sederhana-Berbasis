<?php
session_start();

require 'koneksi.php';


if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
	echo "<script>location='index.php';</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Keranjang Belanja</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

	<!-- navbar -->
	<nav class="navbar navbar-default">
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="keranjang.php">Keranjang</a></li>
				<li><a href="admin/login.php">Admin</a></li>
				<li><a href="../Project-3-master/driver/index.php">Driver</a></li>
				<?php if (isset($_SESSION["pelanggan"])):?>
					<li><a href="logout.php">Logout</a></li>

				<?php else: ?>
					<li><a href="login.php">Login</a></li>

				<?php endif ?>
					<li><a href="checkout.php">Checkout</a></li>
			</ul>
		</div>
	</nav>

	<section class="konten">
		<div class="container">
			<h1>Keranjang Belanja</h1>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subharga</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php foreach ($_SESSION ["keranjang"] as $id_produk => $jumlah): ?> 
					<?php
					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
					$pecah = $ambil->fetch_assoc();
					$subharga = $pecah["harga_produk"]*$jumlah;

					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah["nama_produk"];?></td>
						<td><?php echo number_format($pecah["harga_produk"]);?></td>
						<td><?php echo $jumlah; ?></td>
						<td>Rp. <?php echo number_format($subharga); ?></td>
						<td>
							<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger " >Hapus </a>
							
						</td>
					</tr>
					<?php $nomor++; ?>
					<?php endforeach ?>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
			<a href="checkout.php" class="btn btn-primary">Checkout</a>
		</div>
	</section>

</body>
</html>