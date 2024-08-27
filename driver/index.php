<?php
session_start();
require '../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Driver</title>
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
					<li><a href="../login.php">Login</a></li>

				<?php endif ?>
					<li><a href="../checkout.php">Checkout</a></li>
			</ul>
		</div>
	</nav>


	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="pane-title">Login Driver</h3>
					</div>
					<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password_driver">
						</div>
						<button class="btn btn-primary" name="submit">Login</button>
						<a href="../driver/register.php" class="btn btn-primary" name="register">Register</a>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php
if(isset($_POST["submit"]))
{
	$email = $_POST["email"];
	$password_driver = $_POST["password_driver"];
	$ambil = $koneksi->query("SELECT * FROM driver WHERE email='$email' AND password_driver='$password_driver'");
	$akunyangcocok = $ambil->num_rows;

	if ($akunyangcocok==1) 
	{
		$akun = $ambil->fetch_assoc();
		$_SESSION["driver"] = $akun;
		echo "<script>alert('anda sukses login');</script>";
		echo "<script>location='home.php';</script>";
	}
	else
	{
		echo "<script>alert('anda gagal login,periksa akun anda');</script>";
		echo "<script>location='index.php';</script>";
	}

}
?>

</body>
</html>