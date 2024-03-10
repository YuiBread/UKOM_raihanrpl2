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
            transform: translateY(14.8vh);
        }

        .container {
            height: 100%;
            padding: 5vh;
            background-color: #86A789;
            overflow-y: auto;
            flex: 1;
        }

        /* .pack {
            margin: auto;
        } */

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

        fieldset h2 {
            /* position: absolute; */
            color: black;
        }

        .newreport {
            margin: auto;
            /* display: grid; */
            /* grid-template-columns: repeat(3, 250px); */
            gap: 2vh;
            padding: 2.5vh 0;
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

        .box h4 {
            font-family: 'Poppins', sans-serif;
        }

        select {
            width: 100%;
        }

        .inbox {
            width: 100%;
            border-radius: 2vh;
            padding: 3px 10px;
        }

        .infoto {
            text-decoration: hidden;
        }

        textarea {
            width: 100%;
            resize: vertical;
            padding: 5vh 5vh;
            max-height: 20%;
            /* display: block; */
        }

        .button {
            float: right;
            /* display: absolute;
            right: 0; */
            /* transform: translateX(110%) translateY(50%); */
            cursor: pointer;
            font-weight: 600;
            border-radius: 5px;
            padding: 5px;
            width: 10vh;
            height: 5vh;
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
            <p><a href="admin.php" class="sidea">Home</a></p>
            <p><a href="data.php" class="sidea">Data peminjaman</a></p>
            <p><a href="" class="sidea">Data buku</a></p>
            <p><a href="datauser.php" class="sidea">Users</a></p>
            <p><a href="laporan.php" class="sidea">Laporan</a></p>
            <p class="out"><a href="../logout.php" class="sidea">Logout</a></p>
        </div>
    </div>


    <form method="post" enctype="multipart/form-data"> <!-- enctype dibutuhin jir -->
        <div class="container">

            <fieldset>
                <h2 class="title">Input data buku</h2>
                <div class="newreport">

                    <div class="box">
                        <label>Judul</label>
                        <br>
                        <input type="text" class="inbox" name="judul" required>
                    </div>
                    <div class="box">
                        <label>Penulis</label>
                        <br>
                        <input type="text" class="inbox" name="penulis" required>
                    </div>
                    <div class="box">
                        <label>Penerbit</label>
                        <br>
                        <input type="text" class="inbox" name="penerbit" required>
                    </div>
                    <div class="box">
                        <label>Tahun_Terbit</label>
                        <br>
                        <input type="date" class="inbox" name="tahunterbit" required>
                    </div>
                    <div class="box">
                        <label>Genre</label>
                        <select required class="inbox" name="genre">
                            <option value=""></option>
                            <?php
                            $genre = mysqli_query($connect, "SELECT genre FROM kategoribuku");
                            if ($genre) {
                                while ($genre2 = mysqli_fetch_assoc($genre)) {
                            ?>
                                    <option><?= $genre2['genre'] ?></option>
                            <?php
                                }
                                mysqli_free_result($genre);
                            }
                            ?>
                        </select>
                    </div>
                    <div class="box">
                        <label>Foto buku</label>
                        <br>
                        <input type="file" class="infoto" name="foto" required>
                    </div>
                    <div class="box">
                        <label>Sinopsis</label>
                        <br>
                        <textarea class="inbox" required name="sinopsis"></textarea>
                    </div>
                    <br>
                    <input type="submit" class="button" name="kirim"> <!-- kirim nya jir -->
                </div>
            </fieldset>
    </form>

    <h2 class="title2">Data Buku</h2>
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
                    <!-- <p class="txtdesc"><?php //echo($baris['tahunterbit'])?></p> -->
                    <p><button><a href="detail2.php?id2=<?php echo $baris['IDbuku'] ?>">Detail</a></button></p>
                    <button><a href="edit2.php?id2=<?php echo $baris['IDbuku'] ?>">Edit</a></button>
                    <button><a href="delete2.php?id2=<?php echo $baris['IDbuku']; ?>" onclick="return confirm('yakin?');">Delete</a></button>

                </div>
            </div>
        <?php endwhile; ?>
    </div>

    </div>
</body>

</html>






<!-- main form kirim / create -->
<!-- main form read -->

<?php
include 'connect.php';

if (isset($_POST['kirim'])) {

    // variabel biasa
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $penerbit = $_POST["penerbit"];
    $tahunterbit = $_POST["tahunterbit"];
    $genre = $_POST["genre"];
    $sinopsis = $_POST["sinopsis"];

    // uplod foto rek
    $direktor = "../zfoto/";
    $nm_file = $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], $direktor . $nm_file);

    // masukin dta ke dtabase
    // $masuk = "INSERT INTO buku (judul, penulis, penerbit, tahunterbit, foto)
    //         VALUES ('$judul', '$penulis', '$penerbit', '$tahunterbit', '$nm_file')";

    mysqli_query($connect, "INSERT INTO buku (judul, penulis, penerbit, tahunterbit, genre, sinopsis, foto)
    VALUES ('$judul', '$penulis', '$penerbit', '$tahunterbit','$genre', '$sinopsis' , '$nm_file')");
    // $query6 = "INSERT INTO buku VALUES ('$judul','$penulis','$penerbit','$tahunterbit','$genre','$nm_file')";
    // mysqli_query($connect, $query6);

    echo
    "<script>
    alert('data masuk ke database');
    document.location.href = 'inputdta.php';
    </script>";
    header("Location: inputdta.php");
    exit();

    // cek bener apa kga
    // header("Location: inpudta.php");
    // if(mysqli_query($connect, $masuk)) {
    //     header("Location: admin.php");
    //     exit();
    // } else {
    //     echo "Error: " . mysqli_error($connect);
    // }
}
?>