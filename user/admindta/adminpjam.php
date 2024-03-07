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
            background-color: wheat;
        }
        table{
            width: 100%;
            text-align: center;
        }
        table,th,td{
            border: 2px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
        td a{
            color: red;
            font-weight: 600;
            text-decoration: none;
        }
        
        /* ketname2 */
        .ketname2{
            margin-bottom: 10px;
            padding: 3vh 2vw;
            height: 45vh;
            border-radius: 20px;
            background-color: wheat;
        }
        .inbox{
            border-radius: 10px;
            padding: 5px 3px;
            width: 100%;
        }
        .btn{
            padding: 5px;
            margin: 5px 0;
            border-radius: 5px;
            background-color: #FBFADA;
            cursor: pointer;
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
        <form action="" method="POST">
        <div class="ketname2">
            <h2>Input data Peminjaman</h2>
            
            <div class="box">
                <label>Nama</label>
                <?php
                $dtanma = mysqli_query($connect,"SELECT * FROM user LEFT JOIN peminjaman on peminjaman.IDuser = user.IDuser");
                $datanma = mysqli_fetch_assoc($dtanma);
                ?>
                <br>
                <input class="inbox" name="IDuser" value="<?= $datanma['username'] .' - ' . $datanma['IDuser'] ;?>" readonly>
            </div>
            
            
            <div class="box">
                <label>Judul</label>
                <br>
                <select class="inbox" name="IDbuku">
                    <option value=""></option>
                    <?php
                    $dtajudul = mysqli_query($connect,"SELECT judul FROM buku");
                    while($datajudul = mysqli_fetch_assoc($dtajudul)){
                    ?>
                    <option><?= $datajudul['judul'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="box">
                <label>Tanggal Pinjam</label>
                <br>
                <input name="tgl_peminjaman" class="inbox" type="date">
            </div>
            <div class="box">
                <label>Tanggal Kembali</label>
                <br>
                <input name="tgl_pengembalian" class="inbox" type="date">
            </div>
            <div class="box">
                <label>Status</label>
                <br>
                <select name="status_peminjaman" class="inbox">
                    <option value=""></option>
                    <option>Pinjam</option>
                </select>
            </div>
                <input type="submit" name="tambah" value="tambah" class="btn">
        </div>
    </form>


        <div class="ketname">   
            <h2>Data peminjaman</h2>
            <table>
                <tr>
                    <th>Nomor</th>
                    <th>ID user</th>
                    <th>ID buku</th>
                    <th>nama lengkap</th>
                    <th>Tgl peminjaman</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
    
                <?php
                $dta = mysqli_query($connect,"SELECT * FROM peminjaman LEFT JOIN user on user.IDuser = peminjaman.IDuser");
                while ($data = mysqli_fetch_assoc($dta)){
                    $nomor = + 1;
                ?>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $data['IDuser'];?></td>
                    <td><?= $data['IDbuku'];?></td>
                    <td><?= $data['username'];?></td>
                    <td><?= $data['tgl_peminjaman'];?></td>
                    <td><?= $data['tgl_pengembalian'];?></td>
                    <td><?= $data['status_peminjaman'];?></td>
                    <td><a href="delete.php?id=<?= $data['IDpeminjaman']; ?>">Delete</a></td>
                </tr>
                <?php
                $nomor++;
                }
                ?>
            </table>
        </div>
    </div>  
</body>
</html>

<?php
include ("../../connect.php");
if(isset($_POST["tambah"])){
    $IDuser = $_POST['IDuser'];
    $IDbuku = $_POST['IDbuku'];
    $tglpinjam = $_POST['tgl_peminjaman'];
    $tglkembali = $_POST['tgl_pengembalian'];
    $status = $_POST['status_peminjaman'];
    mysqli_query($connect, "INSERT INTO peminjaman (IDuser, IDbuku, tgl_peminjaman, tgl_pengembalian, status_peminjaman) VALUES ('$IDuser','$IDbuku','$tglpinjam','$tglkembali','$status')");
    // header("Location: login.php");


    echo"<script>alert('data tersimpan di database..')</script>";

}
?>