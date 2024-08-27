<?php    

    if(!isset($_SESSION["login"])){
        header("location: login.php");
        exit;
    }
?>
<h2>Detail Pemesanan</h2>
<?php
	$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
	$detail = $ambil->fetch_assoc();
?>


<strong>No.<?php echo $detail['id_pelanggan']; ?></strong><br>
<strong>Nama : <?php echo $detail['nama_pelanggan']; ?></strong><br>
<p>
	<?php echo $detail['telepon_pelanggan']; ?><br>
	<?php echo $detail['email_pelanggan']; ?> <br>
	<?php echo $detail['alamat_pelanggan']; ?>
</p>

<p>
	tanggal:<?php echo $detail['tanggal_pembelian']; ?><br>
	waktu :<?php date_default_timezone_set('Asia/Jakarta');
	echo date('H:i:s'); ?> <br>
	total:<?php echo $detail['total_pembelian']; ?>
</p>


<table class="table table-bordered">
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
		<?php $nomor=1; 
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		}
		?>
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
		<a href="cetak.php?id=<?= $id?>" class="btn btn-info">cetak</a>
	</tbody>
</table>
