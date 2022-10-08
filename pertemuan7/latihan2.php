<?php 
	//cek apakah yidak ada daata di $_GET
	if ( !isset($_GET["nama"]) || 
		!isset($_GET["nim"]) ||
		!isset($_GET["jurusan"]) ||
		!isset($_GET["email"]) ||
		!isset($_GET["gambar"])

	) {
		//redirect
		header("Location: latihan1.php");
		exit;
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail mahasiswa</title>
</head> 
<body>

	<ul>
		<img src="img/<?= $_GET["gambar"]; ?>">
		<li><?= $_GET["nama"]; ?></li>
		<li><?= $_GET["nim"]; ?></li>
		<li><?= $_GET["jurusan"]; ?></li>
		<li><?= $_GET["email"]; ?></li>

	</ul>
	<a href="latihan1.php">Kembali kedata mahasiswa</a>

</body>
</html>