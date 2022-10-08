<?php 
	session_start();

	if ( !isset($_SESSION["login"]) ) {
		header("Location: login.php");
		exit;
	}
	//hubungkan dengan file fungsi
	require 'functions.php';

	//cek tombol submit sudah ditekan atau belum
	if (isset($_POST ["submit"])) {

		//cek data berhasil atau tidak data ditambahakan
		if (tambah($_POST) > 0) {
			echo "

				<script>
					alert('Data Berhasil di Tambahkan');
					document.location.href = 'index.php';
				</script>
			";
			
		}else{
			echo "

				<script>
					alert('Data Gagal di Tambahkan');
					document.location.href = 'index.php';
				</script>
			";
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah data mahasiswa</title>
</head>
<body>

	<h1>Tambah Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required="">

			</li>
			<li>
				<label for="nim">NIM : </label>
				<input type="text" name="nim" id="nim" required="">

			</li>
			<li>
				<label for="email">Email : </label>
				<input type="text" name="email" id="email" required="">

			</li>
			<li>
				<label for="jurusan">Jurusan : </label>
				<input type="text" name="jurusan" id="jurusan" required="">

			</li>
			<li>
				<label for="gambar">Gambar : </label>
				<input type="file" name="gambar" id="gambar" required="">

			</li>

		</ul>
		<button type="submit" name="submit">submit</button>

	</form>
	<br>
	<a href="index.php">Lihat data</a>

</body>
</html>