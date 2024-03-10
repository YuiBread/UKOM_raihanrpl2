<?php
include "../../connect.php";
session_start();
// error_reporting(0);
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
            position: sticky;
            top: 0;
            width: 30%;
            /* height: 100vh; */
            background-color: #739072;
        }

        .side p,
        a {
            font-family: 'Poppins', sans-serif;
            display: block;
            font-weight: 600;
            padding: 2vh 2vh;
            color: white;
            background-color: none;
            text-decoration: none;
            transition: all 0.2s ease-out;
        }
        p:hover {
            letter-spacing: 3.5px;
            /* border-bottom: 2px solid white; */
            background-color: #436850;
        }

        p.out {
            transform: translateY(14.8vh);
            /* bottom: 0; */
            /* width: 50%;
            position: absolute;
            bottom: 0; */
        }

        .container {
            height: 100vh;
            padding: 3vh;
            background-color: #86A789;
            overflow-y: hidden;
            /* overflow-y: auto;
            flex: 1; */
        }

        .pack1 {
            margin: auto;
        }

        .title {
            margin: 3px;
        }

        h2 {
            color: white;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.08vh;
        }

        .newreport {
            background-color: #F8FAE5;
            box-shadow: 2px 2px 5px;
            padding: 2rem 1.8rem 1rem 1.8rem;
            border-radius: 10px;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            text-align: center;
            border: 2px solid black;
            table-layout: auto;
        }

        th {
            border: 2px solid black;
            background-color: #739072;
            padding: 0.8vh;
        }

        td {
            border: 2px solid black;
        }

        .deldit {
            color: black;
            letter-spacing: 0.03vh;
            transition: 0.4s ease;
        }

        .deldit:hover {
            color: #E3651D;
        }
        .nmrow {
            margin-top: 10px;
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

        /* pack2 */
        .newreport2 {
            background-color: #F8FAE5;
            box-shadow: 2px 2px 5px;
            padding: 1rem 1.8rem 1rem 1.8rem;
            border-radius: 10px;
            box-sizing: border-box;
            height: 80%;
            /* padding: 20vh; */
        }

        .pack2 {
            padding: 5px 0;
            /* display: grid; */
        }

        label {
            margin-top: 7px;
        }
        .btmtbl{
            display: flex;
        }
        .btmtbl input {
            /* position: absolute; */
            /* right: 60vh;
            transform: translateY(2.6vh); */
            padding: 5px;
            border-radius: 10px;
            width: 300px;
            height: 25px;
        }
        .btmtbl button{
            cursor: pointer;
            font-weight: 500;
            border-radius: 5px;
            padding: 2px 5px;
            transition: 0.6s ease;
        }
        .btmtbl button:hover{
            color: wheat;
            background-color: #436850;
        }
        .contenttbl{
            position: absolute;
            right: 3.5vh;
            transform: translateY(5px);
        }
        .box {
            justify-content: space-between;
            position: relative;
            /* display: flex; */
            display: grid;
            grid-template-columns: 1fr 3fr;
            /* grid-template-columns: repeat(2, 200px); */
        }

        .box h4 {
            font-family: 'Poppins', sans-serif;
        }

        /* select::selection{
            padding: 5px 10px;
        } */
        .box select {
            color: black;
            border-radius: 5vh;
            padding: 5px;
            margin: 3px 0;
            text-decoration: hidden;
            border: 2px solid black;
        }

        .inbox {
            border: 2px solid black;
            width: 100%;
            margin: 3px 0;
            border-radius: 2vh;
            padding: 3px 10px;
        }

        .infoto {
            text-decoration: hidden;
        }

        .button {
            width: 100%;
            cursor: pointer;
            font-weight: 600;
            border-radius: 5px;
            padding: 5px;
            margin: 2vh 0 0 0;
            transition: 0.3 ease;
        }

        .button:hover {
            background-color: #9DBC98;
        }
        @media print{
            .sidebar{
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
            <p><a href="peminjam.php">Home</a></p>
            <p><a href="data.php">Data peminjaman</a></p>
            <p><a href="inputdta.php">Data buku</a></p>
            <p><a href="datauser.php">Users</a></p>
            <p><a href="laporan.php">Laporan</a></p>
            <!-- <p><a href="laporan.php">Laporan</a></p> -->
            <p class="out"><a href="../logout.php">Logout</a></p>
        </div>
    </div>

    <form method="POST" action="data.php">
        <div class="container">
            <div class="pack1">
            <div class="btmtbl">
                <h2 class="title">Data</h2>
                    <div class="contenttbl">
                        <form action="" method="post" id="searchform">
                        <input type="text" id="search" name="keyword" autocomplete="off">
                        <button type="submit" name="cari">search</button>
                        </form>
                    </div>
                </div>
                <div class="newreport">
                    <table id="tble">
                        <tr>
                            <th>NM</th>
                            <th>IDpinjam</th>
                            <!-- <th>IDbuku</th> -->
                            <th>Judul</th>
                            <th>IDuser</th>
                            <th>Nama</th>
                            <th>tgl pinjam</th>
                            <th>tgl kembali</th>
                            <th>status</th>
                            <th colspan="2" style="color: black;">action</th>
                        </tr>

                        <?php
                        include '../../connect.php';

                        // nentuin berapa konten per halamannya

                        $tampilan = 2;
                        $tampilrn = isset($_GET['page']) ? $_GET['page'] : 1;
                        $offset = ($tampilrn * $tampilan) - $tampilan;

                        $totalR = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM peminjaman"));
                        $totalP = ceil($totalR / $tampilan);

                        if(isset($_POST["cari"])) {
                            $keyword = $_POST["keyword"];
                            $dtasearch = cari($keyword);
                        } else {
                            $dtasearch = mysqli_query($connect, "SELECT * FROM peminjaman LEFT JOIN buku on buku.IDbuku = peminjaman.IDbuku
                            ORDER BY tgl_peminjaman DESC LIMIT $offset, $tampilan");

                        }

                        $nomor = $offset + 1;
                        while ($row = mysqli_fetch_assoc($dtasearch)){
                        ?>
                            <tr>
                            <td> <?= $nomor?></td>
                            <td> <?= $row['IDpeminjaman']?></td>
                            <td> <?= $row['judul']?></td>
                            <td> <?= $row['IDuser']?></td>
                            <td> <?= $row['nama']?></td>
                            <td> <?= $row['tgl_peminjaman']?> </td>
                            <td> <?= $row['tgl_pengembalian']?> </td>
                            <td> <?= $row['status_peminjaman']?> </td>
                            <td><a class='deldit' href='edit.php?id="<?= $row['IDpeminjaman']?>"'>Edit</a></td>
                            <td><a class='deldit' href='delete.php?id="<?= $row['IDpeminjaman']?>"'> Delete</a></td>
                            </tr>
                        <?php
                            $nomor++;
                            }
                        ?>
                    </table>

                    <?php
                    echo "<div class='nmrow'>";
                    for ($range = 1; $range <= $totalP; $range++) {
                        echo "<a href='?page=$range'>$range</a>";
                    }
                    echo "</div>";
                    ?>

                </div>
            </div>

            <!-- pack2 -->
            <div class="pack2">
                <h2 class="title">Input Data Peminjam</h2>

                <div class="newreport2">
                    <div class="box">
                        <label>ID - Judul</label>
                        <select name="IDbuku" required>
                            <option value=""></option>
                            <?php
                            $judul = mysqli_query($connect, "SELECT judul, IDbuku FROM buku");
                            // if ($judul) {
                            while ($row3 = mysqli_fetch_assoc($judul)) {
                                // $row3 = mysqli_fetch_row($judul);
                            ?>
                                    <option value="<?= $row3['IDbuku']; ?>"><?= $row3['judul'] . ' - ' . $row3['IDbuku']  ;  ?></option>
                            <?php
                            }
                                // mysqli_free_result($judul);
                            // }
                            ?>
                        </select>
                    </div>

                        <?php
                        // if(isset($_SESSION['IDuser'])){
                        //     $IDuser = $_SESSION['IDuser'];
                        // }
                        // $query = mysqli_query($connect, "SELECT * FROM user WHERE IDuser= '$IDuser'");
                        // $result = mysqli_fetch_assoc($query);
                        ?>

                    <div class="box">
                        <label>ID user</label>
                        <input type="text" class="inbox" name="IDuser" value="<?= $_SESSION['IDuser']; ?>" readonly style="cursor: pointer;">
                    </div>

                    <div class="box">
                        <label>Nama</label>

                        <input type="text" class="inbox" name="nama" value="<?= $_SESSION['username']; ?>" readonly style="cursor: pointer;">
                    </div>
                    <div class="box">
                        <label>Tgl pinjam</label>

                        <input type="date" class="inbox" name="tgl_peminjaman" >
                    </div>
                    <div class="box">
                        <label>Tgl kembali</label>

                        <input type="date" class="inbox" name="tgl_pengembalian" >
                    </div>
                    <div class="box">
                        <label>Status</label>
                        <select name="status_peminjaman" >
                            <option value=""></option>
                            <option>Di Pinjam</option>
                        </select>
                        <!-- <input type="text" class="inbox" name="status_peminjaman"required> -->
                    </div>
                    <input type="submit" class="button" name="kirim">
                </div>
            </div>
        </div>
    </form>
</body>
</html>



<!-- main form kirim / create dta peminjaman -->
<!-- main form read -->

<?php
include '../../connect.php';
if (isset($_POST['kirim'])) {
    $IDuser = $_POST['IDuser'];
    $IDbuku = $_POST['IDbuku'];
    $nama = $_POST['nama'];
    $tgl_pinjam = $_POST['tgl_peminjaman'];
    $tgl_kembali = $_POST['tgl_pengembalian'];
    $status = $_POST['status_peminjaman'];

    mysqli_query($connect, "INSERT INTO peminjaman (IDuser, IDbuku, nama, tgl_peminjaman, tgl_pengembalian, status_peminjaman)
    VALUES ('$IDuser', '$IDbuku', '$nama', '$tgl_pinjam', '$tgl_kembali', '$status')");

    echo
    "<script>
    alert('Data tersimpan...');
    document.location.href='data.php';
    </script>";
    header("Location: data.php");
}
?>




<!-- buat search -->

<?php
include '../../connect.php';
mysqli_query($connect, "SELECT * FROM peminjaman WHERE IDpeminjaman");
$dtasearch = mysqli_query($connect, "SELECT * FROM peminjaman");
?>

<?php
include '../../connect.php';
function cari($keyword){
    global $connect;
    $query = "SELECT * FROM peminjaman WHERE
    -- IDpinjam LIKE '%$keyword%' OR
    IDuser LIKE '%$keyword%' OR
    IDbuku LIKE '%$keyword%' OR
    nama LIKE '%$keyword%'
    ";
    return mysqli_query($connect, $query);
}
?>