<?php 
	require 'functions.php';

	if ( isset($_POST["login"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

		//cek username
		if (mysqli_num_rows($result) === 1) {
			//cek password
			$row = mysqli_fetch_assoc($result);
			if (password_verify($password, $row["password"])) {
				header("Location: index.php");

				exit;
			}
		}

		$error = true;
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Halam Login</title>
</head>
<body>

<h1>Halam Login</h1>

<?php if (isset($error)):?>

	<p style="color: red; font-style: italic;">Username / Password anda salah !</p>

<?php endif; ?>

<form action="" method="post">
	
	<ul>
		<li>
			<label for="username">Username : </label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">Password : </label>
			<input type="password" name="password" id="password">
		</li>
		<br>
		<button type="submit" name="login">Login</button>
	</ul>

</form>

</body>
</html>