<?php
	
	$koneksi = mysqli_connect("localhost","root","","sistem_antrian");
	
	if (!$koneksi){
	echo "Koneksi database gagal : " . mysqli_connect_error();
	}
	?>