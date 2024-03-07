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
            height: 50vh;
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
            <h2>Input user data</h2>
            <input class="inbox" name="IDuser" type="hidden">
            <div class="box">
                <label>username</label>
                <br>
                <input class="inbox" name="username" type="text">
            </div>
            <div class="box">
                <label>password</label>
                <br>
                <input name="password" class="inbox" type="text">
            </div>
            <div class="box">
                <label>email</label>
                <br>
                <input name="email" class="inbox" type="text">
            </div>
            <div class="box">
                <label>nama lengkap</label>
                <br>
                <input name="namalengkap" class="inbox" type="text">
            </div>
            <div class="box">
                <label>alamat</label>
                <br>
                <input name="alamat" class="inbox" type="text">
            </div>
            <div class="box">
                <label>level</label>
                <br>
                <select name="level" class="inbox">
				<option value=""></option>
				<option>Admin</option>
				<option>Petugas</option>
				<option>Peminjam</option>
			</select>
            </div>
                <input type="submit" name="tambah" value="tambah" class="btn">
        </div>
        </form>
        <div class="ketname">   
            <h2>Data User</h2>
            <table>
                <tr>
                    <th>ID user</th>
                    <th>Email</th>
                    <th>Nama lengkap</th>
                    <th>alamat</th>
                    <th>level</th>
                    <th>Action</th>
                </tr>
    
                <?php
                $dta = mysqli_query($connect,"SELECT * FROM user");
                while ($data = mysqli_fetch_assoc($dta)){
                ?>
                <tr>
                    <td><?= $data['IDuser'];?></td>
                    <td><?= $data['email'];?></td>
                    <td><?= $data['namalengkap'];?></td>
                    <td><?= $data['alamat'];?></td>
                    <td><?= $data['level'];?></td>
                    <td><a href="delete3.php?id3=<?= $data['IDuser']; ?>">Delete</a></td>
                </tr>
                <?php
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
    $IDbuku = $_POST['IDuser'];
    $judul = $_POST['username'];
    $penulis = $_POST['password'];
    $penerbit = $_POST['email'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];
    $level = $_POST['level'];
    mysqli_query($connect, "INSERT INTO buku (IDbuku, judul, penulis, penerbit, tahunterbit) VALUES ('$IDbuku','$judul','$penulis','$penerbit','$tahunterbit')");

    echo"<script>alert('data tersimpan di database..')</script>";
}
?>