<?php 

	// echo date("l, d-M-Y");

	//echo time();

	// echo date("l, d M Y", time()+60*60*24*101);

	//mktime : detik yg dibuat sendiri
	//mktime (0,0,0,0,0,0)
	//jam, menit, detik, bulan, tangal, tahun

	//echo date ("l", mktime(0,0,0,9,22,1999));

	//strtotime
	echo date ("l", strtotime("22 sep 1999"));

 ?>