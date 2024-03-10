<?php
include "../../connect.php";
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php");
}
if (!isset($_SESSION['level'])) {
    header("Location : ../../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            /* box-sizing: border-box; */
            overflow: hidden;
        }

        form {
            width: 100%;
        }

        .sidehead {
            text-align: center;
            background-color: #4F6F52;
            border-bottom: 6px solid white;
            border-right: 6px solid white;
            border-radius: 0 0 15px 0;
            padding: 5vh;
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            width: 30%;
            height: 100vh;
            background-color: #739072;
        }

        .side p, .side a {
            font-family: 'Poppins', sans-serif;
            display: block;
            font-weight: 600;
            padding: 2vh 2vh;
            color: white;
            background-color: none;
            text-decoration: none;
            transition: all 0.2s ease-out;
        }

        .side p:hover {
            letter-spacing: 3.5px;
            background-color: #436850;
        }

        p.out {
            transform: translateY(14.8vh);
        }

        .container {
            height: 100%;
            padding: 3vh;
            background-color: #86A789;
        }

        .pack1 {
            /* margin: auto; */
            /* padding: 30vh 0; */
            border-radius: 5px;
            background-color: #739072;
            padding: 1vh 2vh;
            margin: 2vh 0;
            /* transform: translateY(130%); */
        }
        h2 {
            color: white;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.08vh;
        }
        .report{
            display: flex;
            padding: 3vh 0;
            /* background-color: #739072; */
            justify-content: space-between;
        }
        .report p{
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        .report a{
            text-decoration: none;
            color: white;
            font-weight: 500;
            background-color: #4F6F52;
            padding: 0 2vh;
            margin: 0 0 0 10px;
            border-radius: 2px;
            transition: 0.6s ease;
        }
        .report a:hover{
            background: black;
        }
        @media print {
            .sidebar {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2 class="sidehead">BreadFish</h2>
        <!-- <hr> -->
        <div class="side">
            <p><a href="petugas.php">Home</a></p>
            <p><a href="data.php">Data peminjaman</a></p>
            <p><a href="inputdta.php">Data buku</a></p>
            <p><a href="datauser.php">Users</a></p>
            <p><a href="laporan.php">Laporan</a></p>
            <p class="out"><a href="../logout.php">Logout</a></p>
        </div>
    </div>

    <form method="POST" action="data.php">
        <div class="container">
            <h2>Laporan</h2>
            <div class="pack1">
                <div class="report">
                    <p>Laporan Data Buku : </p>
                    <a href="rport/laporan1.php">Cetak</a>
                </div>
                <div class="report">
                    <p>Laporan Peminjaman : </p>
                    <a href="rport/laporan2.php">Cetak</a>
                </div>
                <div class="report">
                    <p>Laporan User data : </p>
                    <a href="rport/laporan3.php">Cetak</a>
                </div>
            </div>
        </div>
    </form>
</body>

</html>