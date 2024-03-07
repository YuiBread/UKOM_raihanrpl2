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
        
        a{
            text-decoration: none;
            color: white;
            text-align: center;
            justify-content: center;
            padding: 10px;
            position: absolute;
            right: 0;
            transform: translateX(-50vw) translateY(2vh);
        }
        a:hover{
            background-color:#436850;
        }
        @media{
            a{
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="ketname">   
            <h2>Data User</h2>
            <table>
                <tr>
                    <th>ID buku</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th colspan="2">Action</th>
                </tr>
    
                <?php
                $dta = mysqli_query($connect,"SELECT * FROM buku");
                while ($data = mysqli_fetch_assoc($dta)){
                ?>
                <tr>
                    <td><?= $data['IDbuku'];?></td>
                    <td><?= $data['judul'];?></td>
                    <td><?= $data['penulis'];?></td>
                    <td><?= $data['penerbit'];?></td>
                    <td><?= $data['tahunterbit'];?></td>
                    <td><a href="edit2.php?id2=<?= $data['IDbuku']; ?>">Edit</a></td>
                    <td><a href="delete2.php?id2=<?= $data['IDbuku']; ?>">Delete</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <a href="adminrport.php">back</a>
        <script>window.print()</script>
    </body>
</html>