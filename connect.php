<?php
$connect = mysqli_connect("localhost","root","","perpushan");
if(mysqli_connect_errno()){
	echo "Koneksi tidak tersambung :" . mysqli_connect_error();
}
?>