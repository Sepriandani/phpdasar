<?php 

	//cek apakah tombol submit sudah ditekan atau belum
	if ( isset($_POST["submit"]) ) {
		//cek username & password
		if ( $_POST["username"] == "admin" && $_POST["password"] == "123" ) {
			//jika benar redirect ke halaman admin
			header("Location: admin.php");
			exit;
		}else{
			//jika salah, tampilkan pesan kesalahan
			$error = true;
		}
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>

<h1>Login Admin</h1>

<?php if ( isset($error) ) : ?>
	<p style="color: red; font-style: italic;">Username / password salah !
	</p>
<?php endif; ?>

<ul>
<form action="" method="post">

	<li>
		<label for="username">username : </label>
		<input type="text" name="Usernamename" id="username">
	</li>

	<li>
		<label for="password">password : </label>
		<input type="password" name="password" id="password">
	</li>

	<button type="submit" name="submit">Login</button>
</form>
</ul>

</body>
</html>