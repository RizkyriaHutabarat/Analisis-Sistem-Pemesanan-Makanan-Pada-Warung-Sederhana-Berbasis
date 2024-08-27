<?php    

    if(!isset($_SESSION["login"])){
        header("location: login.php");
        exit;
    }
?>
<h2>Tambah Produk</h2>

					<?php $query = "SELECT max(id_produk)as id_produk FROM produk";
					$hasil = mysqli_query($koneksi,$query);
					$data = mysqli_fetch_array($hasil);
					$id_produk = $data['id_produk'];
					$urutan = (int) substr($id_produk,3,3);
					$urutan++;
					$huruf = "RPD";
					$id_produk = $huruf.sprintf("%3s",$urutan);
					 ?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Produk</label>
		<input type="text" class="form-control" name="id_produk" value="<?php echo $id_produk;?>"readonly>
	</div>
	<div class="form-group">
		<label>nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga (RP)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">simpan
	</button>
</form>


<?php
	if(isset($_POST['save']))
	{
		$id_produk =$_FILES['id_produk'];
		$nama = $_FILES['foto']['name'];
		$lokasi = $_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi, "../foto_produk/".$nama);
		$koneksi->query("INSERT INTO produk (id_produk,nama_produk, harga_produk, foto_produk, deskripsi_produk) VALUES('$_POST[id_produk]','$_POST[nama]', '$_POST[harga]', '$nama', '$_POST[deskripsi]')");

		echo "<div class='alert alert-info'>Data tersimpan</div>";
		echo "<meta http-equiv='refresh'content='1;url=index.php?halaman=produk'>";
	}
?>
