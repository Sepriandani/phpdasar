<?php 
	//Array Numerik
	// $mahasiswa = [
	// 	["Seprian Dani", "13117023", "Teknik Elektro", "seprian.13117023@student.itera.ac.id"],
	// 	["Alhadi", "13117023", "Teknik Elektro", "alhadi.13117023@student.itera.ac.id"]
	// ];

	//Array Associstive
	$mahasiswa = [
		["nama" => "Seprian Dani", 
		"nim" =>"13117023", 
		"jurusan" =>"Teknik Elektro", 
		"email" =>"seprian.13117023@student.itera.ac.id",
		"nilai"=> [90,70,80],
		"gambar"=> "dani.jpg"
		],

		["nama" => "alhadi", 
		"nim" =>"13117090", 
		"jurusan" =>"Teknik Elektro", 
		"email" =>"alhadi.13117023@student.itera.ac.id",
		"nilai"=> [90,70,80],
		"gambar"=> "alhadi.jpg"
		]
		
	];
	
	//echo $mahasiswa [1]["nilai"][2];

 ?>
<!-- Array Numerik -->
 <!-- <!DOCTYPE html>
 <html>
 <head>
 	<title>Data Mahasiswa</title>
 </head>
 <body>

 	<h1>Data Mahasiswa</h1>
 		<ul> -->
 			<!-- <li><?= $mahasiswa[0]; ?></li>
 			<li><?= $mahasiswa[1]; ?></li>
 			<li><?= $mahasiswa[2]; ?></li>
 			<li><?= $mahasiswa[3]; ?></li> -->
 			<!-- <?php foreach ($mahasiswa as $mhs): ?>
 				<?php foreach ($mhs as $x ): ?>
 					<li><?= $x ?></li>
 			
 				<?php endforeach; ?>

 				<?php echo "<br>" ?>

 			<?php endforeach; ?>
 		</ul>
 	
 
 </body>
 </html> -->


<!-- Array Associative -->
<!-- Array Numerik -->
<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
</head>
<body>

	<h1>Data Mahasiswa</h1>

	<ul>
		
		<?php foreach ($mahasiswa as $mhs ) :?>
			
			<img src="img/<?= $mhs ["gambar"] ?>">
			<li>Nama : <?= $mhs ["nama"]; ?></li>
			<li>NIM : <?= $mhs ["nim"]; ?></li>
			<li>Jurusan : <?= $mhs ["jurusan"]; ?></li>
			<li>Email : <?= $mhs ["email"]; ?></li>
			<li>Nilai : <?= $mhs ["nilai"][2]; ?></li>
			<?= "<br>"; ?>
		<?php endforeach; ?>

	</ul>

</body>
</html>



