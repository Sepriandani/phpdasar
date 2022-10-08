<?php 

	//koneksi ke database
	$conn = mysqli_connect("localhost", "root", "", "phpdasar");

	//ambil data tabel mahasiswa
	$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

	//cara cek apakah sudah terhubung ke database atau belum
	// if (!$result) {
	// 	echo mysqli_error($conn);
	// }

	//ambil data mahasiswa dari object result
	// while ( $mhs = mysqli_fetch_assoc($result)) {
	// 	var_dump($mhs["nama"]);
	// }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<h1>Data Mahasiswa</h1>

<table border="1" cellpadding="10" cellspacing="0">
	
	<tr>
		
		<th>No.</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>

	</tr>

<?php $no = 1; ?>
<?php while ($row = mysqli_fetch_assoc ($result)) : ?>
	<tr>
		
		<td><?= $no; $no++;?></td>
		<td>
			
			<a href="">Ubah</a> |
			<a href="">Hapus</a>

		</td>
		<td>
			<img src="img/<?= $row["gambar"] ?>" width="50">
		</td>
		<td><?= $row["nim"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>

	</tr>
<?php endwhile; ?>

</table>

</body>
</html>