<?php 
	session_start();

	if ( !isset($_SESSION["login"]) ) {
		header("Location: login.php");
		exit;
	}
	//hubungkan dengan file fungsi
	require 'functions.php';

	//ambil dat dari URL
	$id = $_GET["id"];

	//query data mahasiswa berdasarkan id
	$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


	//cek tombol submit sudah ditekan atau belum
	if (isset($_POST ["submit"])) {

		//cek data berhasil atau tidak data diubah
		if (ubah($_POST) > 0) {
			echo "

				<script>
					alert('Data Berhasil di Ubah');
					document.location.href = 'index.php';
				</script>
			";
			
		}else{
			echo "

				<script>
					alert('Data Gagal di Ubah');
					document.location.href = 'index.php';
				</script>
			";

			// echo mysqli_error($_POST);
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah data mahasiswa</title>
</head>
<body>

	<h1>Ubah Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			
				<input type="hidden" name="id" id="id" value="<?= $mhs["id"]; ?>" >
				<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>" >

		
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>" >

			</li>
			<li>
				<label for="nim">NIM : </label>
				<input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>">

			</li>
			<li>
				<label for="email">Email : </label>
				<input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">

			</li>
			<li>
				<label for="jurusan">Jurusan : </label>
				<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">

			</li>
			<li>
				<label for="gambar">Gambar : </label> <br>
				<img src="img/<?= $mhs["gambar"] ?>" width="60"> <br>
				<input type="file" name="gambar" id="gambar" >

			</li>

		</ul>
		<button type="submit" name="submit">submit</button>

	</form>
	<br>
	<a href="index.php">Lihat data</a>

</body>
</html>