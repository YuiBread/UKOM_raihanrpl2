<?php
include '../../connect.php';
session_start();
// error_reporting(0);
if(!isset($_SESSION['username']) . (!isset($_SESSION['IDuser'])) . (!isset($_SESSION['level'])) ){
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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body{
            display: flex;
            background-color: #78A083;
            overflow: hidden;
        }
        .title{
            justify-content: center;
            background-color: #12372A;
            color: white;
            text-align: center;
            padding: 5vh;
        }
        .sidebar{
            width: 30%;
            height: 100vh;
            background-color: #436850;
        }
        .side{
            /* padding: 5vh 0; */
        }
        .crum a{
            /* width: 100%; */
            cursor: pointer;
            display: block;
            /* margin: 2vh 0; */
            padding: 4vh 2vw;
            font-weight: 600;
            color: white;
            transition: 0.2s ease;
        }
        .crum a:hover{
            color: black;
            background-color: #FBFADA;
        }
        a{
            text-decoration: none;
        }
        .crum .out{
            transform: translateY(25vh);
            /* position: absolute;
            bottom: 0; */
        }

        /* container */
        .container{
            padding: 5vh;
            width: 100%;
        }
        .ketname{
            /* font-weight: 600; */
            padding: 2vw 5vh;
            border-radius: 20px;
            font-weight: 600;
            background-color: wheat;
        }
        .ketname p{
            margin: 3vh 0;
        }
        span a{
            float: right;
            color: black;
            padding: 5px;
            border-radius: 5px;
        }
        span a:hover{
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="title"><h2>BreadBook</h2></div>
        <div class="side">
        <div class="crum"><a href="admin_dash.php">Home</a></div>
        <div class="crum"><a href="adminpjam.php">Data peminjaman</a></div>
        <div class="crum"><a href="adminbook.php">Data buku</a></div>
        <div class="crum"><a href="adminusrdta.php">User data</a></div>
        <div class="crum"><a href="adminrport.php">Laporan</a></div>
        <div class="crum"><a href="../logout.php" class="out">Logout</a></div>
        </div> 
    </div>
    <div class="container">
        <div class="ketname">
            <div class="box">
            <span><p>Laporan Peminjaman <a href="laporan1.php"> Print </a></p></span>
            </div>
            <div class="box">
            <span><p>Laporan Data buku<a href="laporan2.php"> Print </a></p></span>
            </div>
            <div class="box">
            <span><p>Laporan User data<a href="laporan3.php"> Print </a></p></span>
            </div>
        </div>
    </div>
</body>
</html>