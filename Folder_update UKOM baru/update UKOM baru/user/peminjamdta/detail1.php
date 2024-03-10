<?php
include "../../connect.php";
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
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
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            box-sizing: border-box;
            overflow-x: hidden;
        }

        form {
            width: 100%;
            /* display: flex;
            flex-direction: column; */
            box-sizing: border-box;
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
            position: sticky;
            top: 0;
            width: 30.4%;
            height: 100vh;
            background-color: #739072;
        }

        .side p,
        .sidea {
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
            transform: translateY(49.8vh);
        }

        .container {
            height: 100%;
            padding: 5vh;
            background-color: #86A789;
            overflow-y: auto;
            flex: 1;
        }

        h2 {
            color: white;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.08vh;
        }

        fieldset {
            background-color: #F8FAE5;
            padding: 3vh;
            border: 3px solid #12372A;
            border-radius: 10px;
            width: 100%;
            box-sizing: border-box;
            /* display: flex; */
            /* flex: 1; */
        }
        .box {
            position: relative;
            margin: 5px 0;
            /* background-color: #99BC85; */
            width: 100%;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            border-radius: 2vh;
        }

        .button {
            transform: translateX(2vw) translateY(-5.2vh);
            position: absolute;
            right: 0;
            width: 10vw;
            height: 5vh;
        }
        .button a{
            cursor: pointer;
            font-weight: 600;
            border-radius: 5px;
            padding: 1vh 2vh;
            text-align: center;
            transition: 0.4s ease;
            text-decoration: none;
            color: black;
        }
        .button a:hover {
            background-color: #436850;
            color: white;
        }

                                                   /* databuku */

        .title2{
            margin: 2vh 0 0 0;
        }
        .dtabuku{
            padding: 4vh 5vh;
            background-color: #F8FAE5;
            display: flex;
            flex-wrap: wrap;
            text-align: center;
            align-items: center;
            gap: 4vh 7.89vh;
            border-radius: 10px;
        }
        .isi {
            /* position: absolute; */
            background-color: #618264;
            padding: 3vh;
            border-radius: 10px;
            /* cursor: pointer; */
            transition: 0.2s ease-out;
        }
        .isi:hover{
            transform: scale(103%);
        }

        img {
            border-radius: 10px;
            width: 120px;
            height: 150px;
            object-fit: cover;
            border: 2px solid wheat;
        }
        .idnbook{
            text-align: left;
        }
        .idnbook p{
            margin: 2vh 0;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2 class="sidehead">BreadFish</h2>
        <!-- <hr> -->
        <div class="side">
            <p><a href="peminjam.php" class="sidea">Home</a></p>
            <p><a href="inputdta.php" class="sidea">Pinjam buku</a></p>
            <p class="out"><a href="../logout.php" class="sidea">Logout</a></p>
        </div>
    </div>

    <form method="post" enctype="multipart/form-data"> <!-- enctype dibutuhin jir -->
        <div class="container">

    </form>

            <h2 class="title2">Detail buku</h2>
            <div class="button">
                <a href="peminjam.php">Back</a>
            </div>
            <div class="dtabuku">
                <?php
                $id2 = $_GET['id2'];
                $isdta = mysqli_query($connect, "SELECT * FROM buku WHERE IDbuku = $id2");
                $baris = mysqli_fetch_assoc($isdta);
                // $baris = "IDbuku";
                ?>
                <div class="isi">
                    <img src="../zfoto/<?=($baris['foto'])?>">
                    <div class="desc">
                        <h4 ><?php echo($baris['judul'])?></h4>
                    </div>
                </div>
                <div class="idnbook">
                <p>Penulis : <?= $baris['penulis']; ?></span></p>
                <p>Penerbit : <?= $baris['penerbit']; ?></span></p>
                <p>Tahun terbit : <?= $baris['tahunterbit']; ?></span></p>
                <p>Genre : <?= $baris['genre'];?></p>
                <p>Sinopsis : <?= $baris['sinopsis'];?></p>
                </div>
            </div>

        </div>
</body>

</html>