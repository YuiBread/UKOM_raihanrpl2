<!-- hapus data buku -->
<?php
include('../../connect.php');

$id2 = $_GET['id2'];

$result2 = mysqli_query($connect, "DELETE FROM buku WHERE IDbuku=$id2");
header("Location: inputdta.php");
?>


<!-- main form delete -->