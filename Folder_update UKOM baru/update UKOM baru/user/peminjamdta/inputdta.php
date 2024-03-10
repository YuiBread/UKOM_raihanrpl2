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

        .newreport2 {
            background-color: #F8FAE5;
            box-shadow: 2px 2px 5px;
            padding: 1rem 1.8rem 1rem 1.8rem;
            border-radius: 10px;
            /* box-sizing: border-box; */
            /* height: 80%; */
            /* padding: 20vh; */
        }

        label {
            margin-top: 7px;
        }

        .btmtbl {
            display: flex;
        }

        .btmtbl input {
            padding: 5px;
            border-radius: 10px;
            width: 300px;
            height: 25px;
        }

        .btmtbl button {
            cursor: pointer;
            font-weight: 500;
            border-radius: 5px;
            padding: 2px 5px;
            transition: 0.6s ease;
        }

        .btmtbl button:hover {
            color: wheat;
            background-color: #436850;
        }

        .contenttbl {
            position: absolute;
            right: 3.5vh;
            transform: translateY(5px);
        }

        .box {
            justify-content: space-between;
            position: relative;
            display: grid;
            grid-template-columns: 1fr 5fr;
        }

        .box h4 {
            font-family: 'Poppins', sans-serif;
        }

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
            <p><a href="" class="sidea">Pinjam buku</a></p>
            <p class="out"><a href="../logout.php" class="sidea">Logout</a></p>
        </div>
    </div>


    <form method="POST" action="inputdta.php">
        <div class="container">
            <!-- pack2 -->
            <div class="pack2">
                <h2 class="title">Pinjam Buku</h2>

                <div class="newreport2">
                    <div class="box">
                        <label>ID - Judul</label>
                        <select name="IDbuku" required>
                            <option value=""></option>
                            <?php
                            $judul = mysqli_query($connect, "SELECT judul, IDbuku FROM buku");
                            while ($row3 = mysqli_fetch_assoc($judul)) {
                            ?>
                                <option value="<?= $row3['IDbuku']; ?>"><?= $row3['judul'] . ' - ' . $row3['IDbuku'];  ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

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

                        <input type="date" class="inbox" name="tgl_peminjaman">
                    </div>
                    <div class="box">
                        <label>Tgl kembali</label>

                        <input type="date" class="inbox" name="tgl_pengembalian">
                    </div>
                    <div class="box">
                        <label>Status</label>
                        <select name="status_peminjaman">
                            <option value=""></option>
                            <option>Di Pinjam</option>
                        </select>
                    </div>
                    <input type="submit" class="button" name="kirim">
                </div>
            </div>
    </form>

    <!-- pack 2 -->

    <h2 class="title2">Daftar Buku</h2>
    <div class="dtabuku">
        <?php
        $isdta = mysqli_query($connect, "SELECT * FROM buku");
        ?>

        <?php
        while ($baris = mysqli_fetch_assoc($isdta)) :
        ?>

            <div class="isi">
                <img src="../zfoto/<?= $baris['foto'] ?>">
                <div class="desc">
                    <h4><?php echo ($baris['judul']) ?></h4>
                    <p><button><a href="detail2.php?id2=<?php echo $baris['IDbuku'] ?>">Detail</a></button></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    </div>
</body>

</html>

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
    document.location.href='inputdta.php';
    </script>";
}
?>