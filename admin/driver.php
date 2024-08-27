<?php    

    if(!isset($_SESSION["login"])){
        header("location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<h2>Data Driver</h2>
<table class="table table-bordered">
	<thead>
		<th>No</th>
		<th>Nama</th>
		<th>Email</th>
        <th>Jenis motor</th>
        <th>Plat motor</th>
		<th>Alamat driver</th>
		<th>No Hp</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<?php $nomor=1 ?>
		<?php $ambil=$koneksi->query("SELECT * FROM driver"); ?>
		<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['username_driver']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
        	<td><?php echo $pecah['jenis_motor']; ?></td>
			<td><?php echo $pecah['plat_motor']; ?></td>
            <td><?php echo $pecah['alamat_driver']; ?></td>
			<td><?php echo $pecah['no_hp']; ?></td>
			<td>
				<a href="index.php?halaman=hapusdriver&id=<?php echo $pecah['id_driver']; ?>" class="btn btn-danger">hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>	
</body>
</html>
