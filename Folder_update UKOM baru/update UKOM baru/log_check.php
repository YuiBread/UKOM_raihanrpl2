<?php
session_start();
include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];


$data = mysqli_query($connect, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($data);
$dta = mysqli_fetch_assoc($data);

if($cek > 0){


if($dta['level'] == "admin"){
	$_SESSION['username'] = $username;
	$_SESSION['IDuser'] = $dta['IDuser'];
	$_SESSION['level'] = "admin";
header("Location: user/admindta/admin.php");
}
else if($dta['level'] == "petugas"){
	$_SESSION['username'] = $username;
	$_SESSION['IDuser'] = $dta['IDuser'];
	$_SESSION['level'] = "petugas";
header("Location: user/petugasdta/petugas.php");
}
else if($dta['level'] == "peminjam"){
	$_SESSION['username'] = $username;
	$_SESSION['IDuser'] = $dta['IDuser'];
	$_SESSION['level'] = "peminjam";
header("Location: user/peminjamdta/peminjam.php");
}

}else{
	header("Location: login.php?pesan=gagal");
}

?>