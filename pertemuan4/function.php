<?php 

	function salam($waktu="Datang", $nama="Admin!"){
		return "Selamat $waktu, $nama";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>latihan function</title>
</head>
<body>

	<h1><?= salam("pagi", "Seprian"); ?></h1>

</body>
</html>