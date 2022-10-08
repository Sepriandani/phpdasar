<?php 

//Array
//Cara lama
$hari = array("senin", "selasa", "rabu");

//cara baru
$bulan = ["januari", "februari", "maret"];
$arr1 = [123, "tulisan", false];

//menampilkan array
// var_dump($hari);
// echo "<br>";
// print_r($hari);
// echo "<br>";
// print_r($bulan);

//menampilkan 1 elemen mengunakan echo
// echo "<br>";
// echo $arr1[0];
// echo $bulan[1];

//menambahkan element baru pada array
$hari[] = "kamis";
$hari[] = "jumat";
$hari[] = "sabtu";
echo "<br>";
var_dump($hari);



?>