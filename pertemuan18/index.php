<?php 
	session_start();

	if ( !isset($_SESSION["login"]) ) {
		header("Location: login.php");
		exit;
	}

	require ("functions.php");

	//pagination
	//konfigurasi
	$jumlahDataPerHalaman = 3;
	$jumlahData = count(query("SELECT * FROM mahasiswa"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	//cara biasa
	// if (isset($_GET["halaman"])) {
	// 	$halamanAktif = $_GET["halaman"];
	// }else{
	// 	$halamanAktif = 1;
	// }

	//mengunakan operator turnary
	$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

	$mahasiswa = query ("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

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

<a href="registrasi.php">Daftar</a>
<a href="login.php">Login</a>
<a href="logout.php">Logout</a>

<br><br>
<a href="tambah.php">Tambah data mahasiswa</a>
<br><br>

<form action="" method="post">
	
	<input type="text" name="keyword" size="30" placeholder="Cari disini..." autocomplete="off">
	<button type="submit" name="cari">Cari !</button>

</form>

<!-- navigasi -->
<?php if ($halamanAktif > 1): ?>
	<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
<?php endif; ?>

<?php for ($i=1; $i <=$jumlahHalaman; $i++): ?>
	<?php if( $i == $halamanAktif) : ?>
		<a href="?halaman=<?= $i; ?>" style="font-weight: bold;color: red;"><?= $i; ?></a>
	<?php else : ?>
		<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>

<?php if ($halamanAktif < $jumlahHalaman): ?>
	<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
<?php endif; ?>

<br>

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

</body>
</html>