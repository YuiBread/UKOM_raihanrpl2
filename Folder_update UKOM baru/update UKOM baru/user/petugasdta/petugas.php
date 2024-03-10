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
        * {
            font-family: 'Valorant', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            /* box-sizing: border-box; */
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

        form {
            width: 100%;
        }

        .headtop {
            margin: 2vh 0 4vh 0;
            border: 5px solid white;
            /* display: flex; */
            /* position: absolute; */
            /* right: 5vh; */
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

        .container {
            height: 100%;
            padding: 3vh 5vh;
            background: #86A789;
        }

        /* .pack1 {
        margin: auto;
    } */

        .pack2 {
            margin: 3vh 0;
        }

        h2 {
            color: white;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.08vh;
        }

        table,
        th,
        td {
            font-family: 'Poppins', sans-serif;
        }

        table {
            /* border-collapse: collapse; */
            /* border: collapse; */
            /* border-radius: 2px; */
            width: 100%;
            text-align: center;
            border: 1px solid #12372A;
            /* transform: translateY(20px); */
        }

        th {
            /* border-radius: 5px; */
            border: 1px solid #12372A;
            background-color: #739072;
            padding: 0.8vh;
        }

        td {
            border: 1px solid #12372A;
            /* border-radius: 5px; */
            /* padding: 0.5vh; */
        }

        .nmrow {
            margin-top: 2px;
            display: flex;
        }

        .nmrow a {
            background-color: #436850;
            color: wheat;
            border: 2px solid black;
            border-radius: 3px;
            padding: 0 2vh;
            margin: 1vh 0.8vh;
            /* width: 30%; */
        }

        .newreport {
            background-color: #F8FAE5;
            box-shadow: 2px 2px 5px;
            padding: 2rem 1.8rem 1rem 1.8rem;
            border-radius: 10px;
        }

        .newreport2 {
            background-color: #F8FAE5;
            box-shadow: 2px 2px 5px;
            padding: 3rem 1.5rem;
            border-radius: 10px;
            display: flex;
        }

        .box {
            margin: 10px;
            background-color: #99BC85;
            padding: 2vh;
            width: 100%;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            border-radius: 2vh;
            text-align: center;
        }
        ul li{
            list-style:none;
        }
        .box h4, ul, li{
            font-family: 'Poppins', sans-serif;
        }
        .ulas {
            font-family: 'Poppins', sans-serif;
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

            <div class="pack1">
                <h2 class="title">Data Peminjaman</h2>
                <div class="newreport">
                    <table>
                        <tr>
                            <th>NM</th>
                            <th>Judul</th>
                            <th>Nama</th>
                            <th>tgl_peminjaman</th>
                            <th>tgl_pengembalian</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        include '../connect.php';
                        $tampilan = 4;
                        $tampilrn = isset($_GET['page']) ? $_GET['page'] : 1;
                        $offset = ($tampilrn - 1) * $tampilan;
                        $user = mysqli_query($connect, "SELECT * FROM peminjaman LEFT JOIN buku on buku.IDbuku = peminjaman.IDbuku
                        ORDER BY tgl_peminjaman DESC LIMIT $offset, $tampilan");
                        $nomor = $offset + 1;
                        foreach ($user as $row) {
                            echo
                            "<tr>
                    <td>" . $nomor . "</td>
                    <td>" . $row['judul'] . "</td>
                    <td>" . $row['nama'] . "</td>
                    <td>" . $row['tgl_peminjaman'] . "</td>
                    <td>" . $row['tgl_pengembalian'] . "</td>
                    <td>" . $row['status_peminjaman'] . "</td>
                    </tr>";
                            $nomor++;
                        }
                        ?>
                    </table>

                    <?php
                    $totalR = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM peminjaman"));
                    $totalP = ceil($totalR / $tampilan);
                    echo "<div class='nmrow'>";
                    for ($range = 1; $range <= $totalP; $range++) {
                        echo "<a href='?page=$range'>$range</a>";
                    }
                    echo "</div>";
                    ?>

                </div>
            </div>



            <?php
                include 'connect.php';
                $dtauser = mysqli_query($connect, "SELECT COUNT(*) as total FROM user");
                $data = mysqli_fetch_assoc($dtauser);
                $difdta = $data['total'];
            ?>
                <div class="pack2">
                    <h2 class="title">Data List</h2>
                    <div class="newreport2">

                        <div class="box">
                            <div class="topbox">
                                <h3>user</h3>
                            </div>
                            <ul>
                                <li><?= $data['total']?></li>
                            </ul>
                        </div>
                <?php
                    $dtabuku = mysqli_query($connect, "SELECT COUNT(*) as total2 FROM buku");
                    $data2 = mysqli_fetch_assoc($dtabuku);
                ?>
                    <div class="box">
                        <div class="topbox">
                            <h3>Buku Total</h3>
                        </div>
                        <div class="ulas"><?= $data2['total2']?></div>
                    </div>

                <?php
                    $dtaminjam = mysqli_query($connect, "SELECT COUNT(*) as total3 FROM peminjaman");
                    $data3 = mysqli_fetch_assoc($dtaminjam);
                ?>
                    <div class="box">
                        <div class="topbox">
                            <h3>Peminjaman</h3>
                            <!-- <h4>7</h4> -->
                        </div>
                        <div class="ulas"><?= $data3['total3']?></div>
                    </div>
                </div>
    </form>
    </div>
</body>

</html>



<?php
// if (isset($_POST['komen'])) {
//     include('connect.php');
//     $IDuser = $_POST['IDuser'];
//     $ulasan = $_POST['ulasan'];
// }

// $query = "SELECT * FROM ulasanbuku where IDuser = '$IDuser' ";
// $results = mysqli_query($connect, $query);
// $intro = mysqli_fetch_assoc($results);

// $query2 = "SELECT * FROM ulasanbuku where ulasan = '$ulasan' ";
// $results2 = mysqli_query($connect, $query2);
// $intro2 = mysqli_fetch_assoc($results2);
?>