<?php 

	$mahasiswa = [
		["Serian Dani", "13117023", "Teknik Elektro", "seprian.13117023@student.itera.ac.id"],
		["Thariq ahsanul", "12117120", "Teknik Geofisika", "Thariq.12117120@student.itera.ac.id"],
		["Alhai", "12117122", "Teknik Pertambangan", "alhadi.12117120@student.itera.ac.id"]
	];

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Data mahasiswa</title>
 </head>
 <body>

 	<h1>Data Mahasiswa</h1>

 	<ul>
 		
 		<!-- cara pertama -->
 		<!-- <?php foreach ($mahasiswa as $mhs) : ?>

 			<li><?= $mhs; ?></li>

 		<?php endforeach; ?> -->

 	<?php foreach ($mahasiswa as $mhs ) :?>

 		<li>Nama : <?= $mhs [0]; ?></li>
 		<li>NIM :<?= $mhs [1]; ?></li>
 		<li>Jurusan : <?= $mhs [2]; ?></li>
 		<li>Email : <?= $mhs [3]; ?></li>

 		<?= "<br>" ?>

 	<?php endforeach; ?>

 	</ul>
 
 </body>
 </html>