<?php 
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
include 'koneksi.php'; 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from tb_siswa where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['akses']=="siswa"){
 
		// buat session login dan username
		$_SESSION['id'] = $data['id'];
		$_SESSION['username'] = $username;
		$_SESSION['akses'] = "siswa";
		// alihkan ke halaman dashboard siswa
		header("location:../tugas/siswa/pengajuan/data.php");
}
}else{
		header("location:index.php");
}

?>