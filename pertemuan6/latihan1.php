<!DOCTYPE html>
<html>
<head>
	<title>Latihan Array</title>
	<style>
		
		.kotak{

			width: 30px;
			height: 30px;
			background-color: #BADA55;
			text-align: center;
			line-height: 30px;
			margin: 3px;
			float: left;
			transition: 0.5s;
		}

		.kotak:hover {

			transform: rotate(360deg);
			border-radius: 50%;
		}
		.clear{
			clear: both;
		}
	</style>

</head>
<body>

<?php 
	//array biasa
	// $angka = [1,2,3,4,5,6,7,8,9]
	//array multidimensi
	$bilangan = [
		[1,2,3],
		[4,5,6],
		[7,8,9]
	]
?>

<!-- mencetak semuanya -->
 <!-- <?php foreach ($angka as $a ):?>

 	<div class="kotak"><?= $a ?></div>

 <?php endforeach; ?> -->

 <!-- mencetak nilai salah satu dari array multidimensi -->
 <!-- <div class="kotak"><?= $bilangan [2][2]; ?></div> -->

<?php foreach ($bilangan as $x ) : ?>

	<?php foreach ($x as $y) : ?>
		<div class="kotak"><?= $y; ?></div>
	<?php endforeach; ?>

	<div class="clear"></div>

<?php endforeach; ?>


</body>
</html>