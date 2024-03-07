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
                display: hidden;
            }
        }
    </style>
</head>
<body>
    <div class="container">
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
                </tr>
                <?php
                $nomor++;
                }
                ?>
            </table>
        </div>
        <a href="adminrport.php">back</a>
        <script>window.print()</script>
    </body>
</html>