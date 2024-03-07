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
            font-size: 20px;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            padding: 1.5vw 4vh;
            border-radius: 20px;
            background-color: wheat;
        }
        p{
            padding: 2vh;
        }
        .srnme span{
            padding: 10px 8px;
            background-color: #12372A; 
            /* padding: 5px 1px 5px 2px; */
            border-radius: 5px;
            color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="title"><h2>BreadBook</h2></div>
        <div class="side">
        <div class="crum"><a href="">Home</a></div>
        <div class="crum"><a href="adminpjam.php">Data peminjaman</a></div>
        <div class="crum"><a href="adminbook.php">Data buku</a></div>
        <div class="crum"><a href="adminusrdta.php">User data</a></div>
        <div class="crum"><a href="adminrport.php">Laporan</a></div>
        <div class="crum"><a href="../logout.php" class="out">Logout</a></div>
        </div> 
    </div>
    <div class="container">
        <div class="ketname">   
            <div class="srnme">
                <p>Hi, <span><?= $_SESSION['username']?></span></p>
            </div>
            <div class="srvel"><p><?= $_SESSION['level'] ?></p></div>
        </div>
    </div>  
</body>
</html>
