<?php
session_start();
include '../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrasi Driver</title>
	<link rel="stylesheet" href="../admin/assets/css/bootstrap.css">
</head>
<body>

	<!-- navbar -->
	<nav class="navbar navbar-default">
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href="../index.php">Home</a></li>
				<li><a href="../keranjang.php">Keranjang</a></li>
				<li><a href="../admin/login.php">Admin</a></li>
				<li><a href="../driver/index.php">Driver</a></li>
				<?php if (isset($_SESSION["pelanggan"])):?>
					<li><a href="../logout.php">Logout</a></li>

				<?php else: ?>
					<li><a href="login.php">Login</a></li>

				<?php endif ?>
					<li><a href="checkout.php">Checkout</a></li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="pane-title">Registrasi</h3>
					</div>
					<div class="panel-body">
					<?php 
					$query = "SELECT max(id_driver)as id_driver FROM driver";
					$hasil = mysqli_query($koneksi,$query);
					$data = mysqli_fetch_array($hasil);
					$id_driver = $data['id_driver'];
					$urutan = (int) substr($id_driver,3,3);
					$urutan++;
					$huruf = "DRV";
					$id_driver = $huruf.sprintf("%1s",$urutan);
					?>
					
					<form method="post" action="">
					<div class="form-group">
							<label>ID Driver</label>
							<input type="text" class="form-control" name="id_driver" value="<?php echo $id_driver;?>" readonly>
						</div>
                        <div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="username_driver">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password_driver">
						</div>
                        <div class="form-group">
							<label>Jenis Motor</label>
							<input type="text" class="form-control" name="jenis_motor">
						</div>
						<div class="form-group">
							<label>Plat Motor</label>
							<input type="text" class="form-control" name="plat_motor">
						</div>
                        <div class="form-group">
							<label>Alamat</label>
							<input type="text" class="form-control" name="alamat_driver">
						</div>
                        <div class="form-group">
							<label>No HP</label>
							<input type="number" class="form-control" name="no_hp">
						</div>
						<button class="btn btn-primary" name="simpan">Simpan</button>
						<a href="../driver/index.php" class="btn btn-primary" name="login">Login</a>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php
if(isset($_POST['simpan'])){
    $id_driver = $_POST["id_driver"];
	$username_driver= $_POST["username_driver"];
    $email = $_POST["email"];
    $password_driver = $_POST["password_driver"];
    $jenis_motor = $_POST["jenis_motor"];
    $plat_motor = $_POST["plat_motor"];
	$alamat_driver = $_POST["alamat_driver"];
	$no_hp = $_POST["no_hp"];

    $sql = "INSERT INTO `driver`(`id_driver`, `username_driver`, `email`, `password_driver`, `jenis_motor`, `plat_motor`, `alamat_driver`, `no_hp`) 
	VALUES ('$id_driver','$username_driver','$email','$password_driver','$jenis_motor','$plat_motor','$alamat_driver','$no_hp')";
	$query = mysqli_query($koneksi, $sql);


    if($query) {
		echo "<script>alert('Berhasil Di Tambahkan!')</script>";
		// header("Location: index.php");
	}else{
		echo "<script>alert('Gagal Menambahkan Akun!')</script>";
	}
}

?>

</body>
</html>