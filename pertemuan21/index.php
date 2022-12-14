<?php 
	session_start();

	if ( !isset($_SESSION["login"]) ) {
		header("Location: login.php");
		exit;
	}

	require ("functions.php");
	$mahasiswa = query ("SELECT * FROM mahasiswa");

	//tombol cari ditekan
	if (isset($_POST["cari"])) {
		$mahasiswa = cari($_POST["keyword"]);
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<h1>Data Mahasiswa</h1>

<a href="logout.php">Logout</a>

<br><br>
<a href="tambah.php">Tambah data mahasiswa</a>
<br><br>

<form action="" method="post">
	
	<input type="text" name="keyword" size="30" placeholder="Cari disini..." autocomplete="off" id="keyword">
	<button type="submit" name="cari" id="tombol-cari">Cari !</button>

</form>
<br>
<div id="container">
<table border="1" cellpadding="10" cellspacing="0">
	
	<tr>
		
		<th>No.</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>Nama</th>
		<th>NIM</th>
		<th>Email</th>
		<th>Jurusan</th>

	</tr>

<?php $no = 1; ?>
<?php foreach( $mahasiswa as $row ) : ?>
	<tr>
		
		<td><?= $no; $no++;?></td>
		<td>
			
			<a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
			<a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin ingin menghapus ?'); " >Hapus</a>

		</td>
		<td>
			<img src="img/<?= $row["gambar"] ?>" width="50">
		</td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["nim"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>

	</tr>
<?php endforeach; ?>

</table>
</div>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>