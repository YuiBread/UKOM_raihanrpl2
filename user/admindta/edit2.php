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
            height: 40vh;
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



    <?php
    $id2 = $_GET['id2'];
    $dta = mysqli_query($connect, "SELECT * FROM buku WHERE IDbuku=$id2 ");
    $data = mysqli_fetch_assoc($dta);
    ?>

        <form action="" method="POST">
        <div class="ketname2">
            <h2>Input data Buku</h2>
            <input class="inbox" name="IDbuku" type="hidden">
            <div class="box">
                <label>Judul</label>
                <br>
                <input class="inbox" name="judul" type="text"  value="<?= $data['judul'];?>">
            </div>
            <div class="box">
                <label>Penulis</label>
                <br>
                <input name="penulis" class="inbox" type="text" value="<?= $data['penulis'];?>">
            </div>
            <div class="box">
                <label>Penerbit</label>
                <br>
                <input name="penerbit" class="inbox" type="text" value="<?= $data['penerbit'];?>">
            </div>
            <div class="box">
                <label>Tahun Terbit</label>
                <br>
                <input name="tahunterbit" class="inbox" type="text"  value="<?= $data['tahunterbit'];?>">
            </div>
                <input type="submit" name="update" value="Update" class="btn">
        </div>
        </form>
    </div>  
</body>
</html>

<?php
include '../../connect.php';

if (isset($_POST['update'])) {

    $IDbuku = $_POST["IDbuku"];
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $penerbit = $_POST["penerbit"];
    $tahunterbit = $_POST["tahunterbit"];
    // $genre = $_POST["genre"];

    mysqli_query($connect, "UPDATE buku SET $IDbuku = '$IDbuku', judul = '$judul', penulis = '$penulis', penerbit = '$penerbit', tahunterbit = '$tahunterbit' WHERE IDbuku = '$IDbuku';");
    
    echo
    "<script>
    	alert('data terupdate ke database');
    	document.location.href = 'adminbook.php';
    </script>";
    header("Location: adminbook.php");
    exit();
}
?>