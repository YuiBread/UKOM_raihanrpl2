<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/90a8a97c08.js" crossorigin="anonymous"></script>
    <title>Login</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: auto;
            justify-content: center;
            overflow: hidden;
            /* background-image: linear-gradient( to right, #81689D, #5D3587); */
            background-image: linear-gradient( to right, #618264, #527853);
        }

        fieldset {
            display: flex;
            border-radius: 20px;
            border: 3px solid wheat;
            margin: 3vh 22vh;
            transform: translateY(90px);
            padding: 10vh;
            background-color: #739072;
            box-shadow: 15px 15px black;
        }
        /* fieldset sebelah kiri */
        label{
            font-weight: 500;
        }
        .inbox {
            border-radius: 10px;
            padding: 3px 8px;
        }
        .btnbox{
            margin: 5vh 0 0 0;
        }
        .tombol{
            padding: 4px 10px;
            background: #344f33;
            color: white;
            letter-spacing: 2px;
            font-weight: 600;
            cursor: pointer;
            border-radius: 5px;
            border: none;
            transition: 0.4s ease;
        }
        .tombol:hover{
            background: #7F9F80;
        }
        .box i {
            position: absolute;
            left: 34vh;
            transform: translateY(40%);
            /* transform: translateX(34vh); */
            transition: 0.2s ease;
        }

        .box i:hover {
            color: #1D2B53;
        }
        p{
            margin-top: 10px;
        }
        a{
            text-decoration: none;
            background-color: black;
            color: white;
            padding: 4px 8px;
            letter-spacing: 0.5px;
            border-radius: 5px;
            transition: all 0.3s ease-out;
        }
        a:hover{
            margin-left: 0.6vh;
            background-color: #4F6F52;
        }
        select {
            padding: 2px;
            border-radius: 5px;
            width: 75%;
        }

        /* right fieldset*/
        img{
            margin: auto;
            right: 13%;
            position: absolute;
            width: 250px;
            height: 250px;
        }
    </style>
</head>

<body>
    <form method="post" action="log_check.php">
        <fieldset>
        <div class="left">
            <h2>Login</h2>
            <label>username</label>
            <div class="box">
                <input type="text" class="inbox" name="username" required placeholder="type here">
            </div>
            <label>password</label>
            <div class="box">
                <input type="password" class="inbox" name="password" id="mypass" required placeholder="type here">
                <i class="fa-solid fa-key" onmouseover="mouseoverPass();" onmouseout="mouseoutPass();"></i>
            </div>
            <!-- <div class="box">
                    <label>level</label>
                    <br>
                    <select name="level">
                        <option value="#">- - - - - - - Pilih - - - - - - -</option>
                        <option value="admin">admin</option>
                        <option value="petugas">petugas</option>
                        <option value="peminjam">peminjam</option>
                    </select>
                </div> -->

            <div class="btnbox">
                <input type="submit" name="login" class="tombol" value="Login">
                <p>Belum mepunyai akun? <a href="register.php">Daftar</a></p>
            </div>
        </div>


        <div class="right">
            <img src="stok/Learning-amico ijo tua.png" alt="kosong">
        </div>
        </fieldset>
    </form>
</body>
</html>

<script>
    function mouseoverPass() {
        let obj = document.getElementById('mypass');
        obj.type = 'text';
    }
    function mouseoutPass() {
        let obj = document.getElementById('mypass');
        obj.type = 'password';
    }
</script>
<?php
if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
        echo "<script>alert('username dan password salah')</script>";
    }
}
?>