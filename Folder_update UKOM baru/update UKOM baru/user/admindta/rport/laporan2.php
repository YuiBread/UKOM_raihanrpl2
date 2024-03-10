<?php
include '../../../connect.php';

session_start();
error_reporting(0);
if (!isset($_SESSION['username']) . (!isset($_SESSION['level']))){
    header("Location: ../../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report data user</title>


    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            /* display: flex; */
            /* box-sizing: border-box; */
            background-color: #86A789;
            overflow: hidden;
        }

        form {
            width: 100%;
            height: 100%;
        }

        .container {
            margin: auto;
            position: relative;
            text-align: center;
            height: 100%;
            padding: 3vh;
            background-color: #86A789;
        }

        h2 {
            color: white;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.08vh;
        }

        table {
            text-align: center;
            margin: 20px auto;
            border-collapse: collapse;
            padding: 10px;
            background-color: #86A789;
            border: 2px solid wheat;
        }

        th {
            margin: 20px 0 0 0;
            border-collapse: collapse;
            padding: 10px;
            background-color: #739072;
            border: 2px solid wheat;
        }

        td {
            font-weight: 400;
            border: 1px solid wheat;
            padding: 5px;
        }
        .backtbl{
            text-decoration: none;
            color: white;
            letter-spacing: 1.4px;
            background-color: #12372A;
            padding: 0 5px;
            border-radius: 3px;
            transition: 0.4s ease;
        }
        .backtbl:hover{
            background-color: #436850;
        }
        @media print {
            .backtbl {
                display: none;
            }
        }
    </style>
</head>

<body>
    <form method="POST" action="data.php">
        <div class="container">
            <h2>Laporan Peminjaman</h2>
            <table>
                <tr>
                    <th>Nomor</th>
                    <th>ID Pinjam</th>
                    <th>ID user</th>
                    <th>ID buku</th>
                    <th>Nama</th>
                    <th>tgl pinjam</th>
                    <th>tgl kembali</th>
                    <!-- <th>status</th> -->
                </tr>

                <?php
                include '../../../connect.php';
                $data = mysqli_query($connect, "SELECT * FROM peminjaman");
                $nomor = 1;
                while ($dta = mysqli_fetch_assoc($data)) {
                ?>
                    <tr>
                        <td><?= $nomor?></td>
                        <td><?= $dta['IDpeminjaman']; ?></td>
                        <td><?= $dta['IDuser']; ?></td>
                        <td><?= $dta['IDbuku']; ?></td>
                        <td><?= $dta['nama']; ?></td>
                        <td><?= $dta['tgl_peminjaman']; ?></td>
                        <td><?= $dta['tgl_pengembalian']; ?></td>
                        <!-- <td><?= $dta['status_peminjaman']; ?></td> -->
                    </tr>
                <?php
                $nomor++;
                }
                ?>
            </table>
            <a href="../laporan.php" class="backtbl">Back</a>
        </div>
        <script>window.print()</script>
    </form>
</body>

</html>