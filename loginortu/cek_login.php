<?php 
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
include 'koneksi.php'; 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from tb_login where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['akses']=="admin"){
		// buat session login dan username
		$_SESSION['akses'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:../tugas/admin/siswa/data.php");
		
		// cek jika user login sebagai pegawai
	}else if($data['akses']=="orang tua"){
		// buat session login dan username
		$_SESSION['id'] = $data['id'];
		$_SESSION['username'] = $username ;
		$_SESSION['akses'] = "orang tua";
		// alihkan ke halaman dashboard pegawai
		header("location:../tugas/ortu/pengajuan/data.php");
	}
	else{
 
		// alihkan ke halaman login kembali
		header("location:index.php");
	}
}else{
		header("location:index.php");
}

?>