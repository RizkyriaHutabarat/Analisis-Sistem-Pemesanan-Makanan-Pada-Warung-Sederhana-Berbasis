<?php
session_start();
require 'koneksi.php';

if(!isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php';</script>";
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

	<!-- navbar -->
	<nav class="navbar navbar-default">
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="keranjang.php">Keranjang</a></li>
				<li><a href="admin/login.php">Admin</a></li>
				<li><a href="../Project-3-master/driver/index.php3">Driver</a></li>
				<?php if (isset($_SESSION["pelanggan"])):?>
					<li><a href="logout.php">Logout</a></li>

					

				<?php endif ?>
					<li><a href="checkout.php">Checkout</a></li>
			</ul>
		</div>
	</nav>

	<section class="konten">
		<div class="container">
			<h1></h1>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subharga</th>
					
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $totalbelanja=0; ?>
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
					</tr>
					<?php $nomor++; ?>
					<?php $totalbelanja+=$subharga; ?>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4">Total Belanja</th>
						<th>Rp. <?php echo number_format($totalbelanja); ?></th>
					</tr>
				</tfoot>
			</table>
			
			<form method="post">
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
						</div>
				</div>
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Masukkan Alamat Anda</label>
							<input type="text" class="form-control" name="alamat">
						</div>

					</div>
				</div>
				<button class="btn btn-primary" name="checkout">Checkout</button>

				
			<?php 
				if(isset($_POST["checkout"]))
				{
					$query = "SELECT max(id_pembelian)as id_pembelian FROM pembelian";
					$hasil = mysqli_query($koneksi,$query);
					$data = mysqli_fetch_array($hasil);
					$id_pembelian = $data['id_pembelian'];
					$urutan = (int) substr($id_pembelian,3,3);
					$urutan++;
					$huruf = "PML";
					$id_pembelian = $huruf.sprintf("%3s",$urutan);
					

					$id_pembelian = $_GET['id_pembelian'];
					$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
					$tanggal_pembelian = date("Y-m-d");
				
					$arrayongkir = $ambil->fetch_assoc();
					$tarif = $arrayongkir['tarif'];
					$total_pembelian = $totalbelanja + $tarif;

					$koneksi->query("INSERT INTO `pembelian`(`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`) VALUES ('$id_pembelian','$id_pelanggan','$tanggal_pembelian','$total_pembelian')"); 
					
					$id_pembelian_barusan = $koneksi->insert_id;

					foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
					{
						$koneksi->query("INSERT INTO pembelian_produk(id_pembelian, id_produk, jumlah) VALUES ('$id_pembelian_barusan', '$id_produk', '$jumlah')");
					}

					unset($_SESSION["keranjang"]);

					echo "<script>alert('pembelian sukses');</script>";
					echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
				}


			?>

			

				<?php
				if(isset($_POST["checkout"])){

					
					$alamat = $_POST["alamat_pengiriman"];


					$sql = "SELECT * FROM pembelian (alamat_pengiriman) 
							VALUES ('$alamat')";
					$query = mysqli_query($koneksi, $sql);

				}
				?>

		</div>
	</section>

</body>
</html>