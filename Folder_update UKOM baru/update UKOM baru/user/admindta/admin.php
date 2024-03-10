<?php
include "../../connect.php";
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])){
    header("Location: ../../login.php");
}
if (!isset($_SESSION['IDuser'])) {
    header("Location: ../../login.php");
}
if (!isset($_SESSION['level'])) {
    header("Location: ../../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        *{
            font-family: 'Valorant', sans-serif;
            margin: 0;
            padding: 0;
        }
        body{
            /* display: flex; */
            box-sizing: border-box;
            overflow: hidden;
        }
        .sidebar{
            display: flex;
            flex-direction: column;
            width: 30%;
            height: 100vh;
            background-color: #739072;
        }
        .sidehead{
            text-align: center;
            background-color: #4F6F52;
            border-bottom: 6px solid white;
            border-right: 6px solid white;
            border-radius: 0 0 15px 0;
            padding: 5vh;
        }
        .side p, a{
            font-family: 'Poppins', sans-serif;
            display: block;
            font-weight: 600;
            padding: 2vh 2vh;
            color: white;
            text-decoration: none;
            transition: all 0.2s ease-out;
        }
        p:hover{
            letter-spacing: 3px;
            background-color: #436850;
        }
        p.out{
            transform: translateY(14.8vh);
        }
    </style>

</head>
<body>
    <div class="sidebar">
        <h2 class="sidehead">BreadFish</h2>
        <!-- <hr> -->
        <div class="side">
        <p><a href="">Home</a></p>
        <p><a href="data.php">Data peminjaman</a></p>
        <p><a href="inputdta.php">Data buku</a></p>
        <p><a href="datauser.php">Users</a></p>
        <p><a href="laporan.php">Laporan</a></p>
        <p class="out"><a href="../logout.php">Logout</a></p>
        </div>
    </div>
    <?php
    include "home.php";
    ?>
</body>
</html>

<script>
        function showTab(tabName) {
            // Redirect to the current page with the selected tab parameter
            window.location.href = '?tab=' + tabName;
        }
</script>