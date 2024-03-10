<?php
include "../../connect.php";
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
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
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            /* box-sizing: border-box; */
            /* overflow: hidden; */
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

        form {
            width: 100%;
        }

        .container {
            height: 100%;
            padding: 5vh;
            background-color: #86A789;
            overflow-y: auto;
            flex: 1;
        }

        .headtop {
            /* transform : translateY(25vh); */
            justify-content: center;
            align-items: center;
            margin: 2vh 0 4vh 0;
            /* height: 50vh; */
            border: 5px solid white;
        }

        .headtext {
            padding: 2vh;
            color: white;
            letter-spacing: 0.2vh;
        }

        h3,
        span {
            font-family: 'Poppins', sans-serif;
        }

        .usernm {
            background-color: #294B29;
            padding: 5px 10px;
            border-radius: 2vh;
        }

        .lesec {
            float: right;
        }


        h2 {
            color: white;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.08vh;
        }

        /* databuku */

        .title2 {
            margin: 2vh 0 0 0;
        }

        .dtabuku {
            padding: 4vh 5vh;
            background-color: #F8FAE5;
            display: flex;
            flex-wrap: wrap;
            text-align: center;
            /* justify-content: center; */
            gap: 4vh 7.89vh;
            /* column-gap: 7.89vh;
            row-gap: 3vh; */
            border-radius: 10px;
        }

        .isi {
            background-color: #618264;
            padding: 3vh;
            border-radius: 10px;
            /* cursor: pointer; */
            transition: 0.2s ease-out;
        }

        .isi:hover {
            transform: scale(103%);
        }

        img {
            border-radius: 10px;
            width: 120px;
            height: 150px;
            object-fit: cover;
            border: 2px solid wheat;
        }

        button {
            padding: 0 1vh;
            background-color: #BFD8AF;
            border: none;
            cursor: pointer;
            border-radius: 2.5px;
            transition: 0.2s ease-in;
        }

        button:hover {
            background-color: #99BC85;
        }

        a {
            text-decoration: none;
            color: black;
            font-weight: 550;
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
    <form method="post">
        <div class="container">
            <div class="headtop">
                <div class="headtext">
                    <h3>
                        <span> Hello, </span>
                        <span class="usernm"><?php echo $_SESSION['username']; ?></span>
                        <span class="lesec"><?php echo $_SESSION['level'] ?></span>
                    </h3>
                </div>
            </div>
            <h2 class="title2">Daftar Buku</h2>
            <div class="dtabuku">
                <?php
                $isdta = mysqli_query($connect, "SELECT * FROM buku");
                // $baris = "IDbuku";
                ?>

                <?php
                while ($baris = mysqli_fetch_assoc($isdta)) :
                ?>

                    <div class="isi">
                        <img src="../zfoto/<?= $baris['foto'] ?>">
                        <div class="desc">
                            <h4><?php echo ($baris['judul']) ?></h4>
                            <p><button><a href="detail1.php?id2=<?php echo $baris['IDbuku'] ?>">Detail</a></button></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </form>
</body>

</html>