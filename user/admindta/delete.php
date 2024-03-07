<?php
include ("../../connect.php");

$id = $_GET['id'];

$result = mysqli_query($connect, "DELETE FROM peminjaman WHERE IDpeminjaman=$id");
header("Location: adminpjam.php");
?>
