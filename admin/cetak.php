<?php include '../koneksi.php'; ?>
<center>
<h2>Warung Makan Sederhana</h2>

<?php
	$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
	$detail = $ambil->fetch_assoc();
?>
<strong>Kode:<?php echo $detail['id_pelanggan']; ?></strong><br>
<strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
<p>
	<?php echo $detail['telepon_pelanggan']; ?><br>
	<?php echo $detail['email_pelanggan']; ?><br>
	<?php echo $detail['alamat_pelanggan']; ?>
</p>

<p>
	tanggal:<?php echo $detail['tanggal_pembelian']; ?><br>
	waktu :<?php date_default_timezone_set('Asia/Jakarta');
	echo date('H:i:s'); ?> <br>
	total:<?php echo $detail['total_pembelian']; ?>
</p>
<table class="table table-bordered" border="1">
	<thead>
		<tr>
			<th>no</th>
			<th>nama produk</th>
			<th>harga</th>
			<th>jumlah</th>
			<th>subtotal</th>
		</tr>
	</thead>
<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk on pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>
				<?php echo $pecah['harga_produk']*$pecah['jumlah']; ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
<script>
		window.print();
	</script>


                    <?php
					if (isset($_POST["beli"]))
					{
						$jumlah = $_POST["jumlah"];
						$_SESSION["keranjang"][$id_produk] = $jumlah;

						echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
						echo "<script>location='keranjang.php';</script>";
					}
				?>
