<?php 

	//$_GET
	// $_GET ["nama"] = "Seprian Dani";
	// $_GET ["nim"] = "13117023";

	//var_dump($_GET);
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

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>latihan GET</title>
 </head>
 <body>

 	<h1>Daftar Mahasiswa</h1>
 	<ul>
 		<?php foreach ($mahasiswa as $mhs) :?>
 			
 			<li>

 				<a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nim=<?= $mhs["nim"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>&email=<?= $mhs["email"]; ?>&gambar=<?= $mhs["gambar"]; ?>"><?= $mhs["nama"]; ?></a>
 					
 			</li>

 		<?php endforeach; ?>

 	</ul>
 
 </body>
 </html>