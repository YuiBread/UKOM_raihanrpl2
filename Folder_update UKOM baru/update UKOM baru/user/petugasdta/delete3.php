<?php
include '../../connect.php';

$id3 = $_GET['id3'];

$result3 = mysqli_query($connect, "DELETE FROM user WHERE IDuser=$id3");
header("Location: datauser.php");
?>