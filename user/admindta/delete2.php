<?php
include ("../../connect.php");

$id2 = $_GET['id2'];

$result = mysqli_query($connect, "DELETE FROM buku WHERE IDbuku=$id2");
header("Location: adminbook.php");
?>
