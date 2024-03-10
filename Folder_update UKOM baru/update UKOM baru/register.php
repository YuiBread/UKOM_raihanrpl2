<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/90a8a97c08.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100vw;
			height: 90vh;
			display: flex;
			align-items: center;
            justify-content: center;
            background-image: linear-gradient( to right, #618264, #527853);
            overflow: hidden;
        }

        fieldset {
            /* display: flex; */
			background-color: #739072;
			border: 3px solid wheat;
			width: 72vw;
			padding: 10vh;
			border-radius: 20px;
			box-shadow: 10px 10px black;
			/* margin: 3vh 22vh; */
			padding: 10vh;
        }

        /*  fieldset bagian kiri */
        .left {
            display: grid;
            grid-template-columns: 18vw 40vh;
            /* grid-template-columns: 5fr 4fr; */
        }
        label {
            font-weight: 500;
        }

        .inbox {
            border-radius: 10px;
            padding: 3px 8px;
        }

        .btnbox {
            margin: 5vh 0 0 0;
        }

        .tombol {
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

        .tombol:hover {
            background: #7F9F80;
        }

        .box i {
            transform: translateX(-200%) translateY(15%);
            transition: 0.2s ease;
        }

        .box i:hover {
            color: #1D2B53;
        }

        p {
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

        a:hover {
            margin-left: 0.6vh;
            background-color: #4F6F52;
        }

        select {
            padding: 2px;
            border-radius: 5px;
            width: 85%;
        }
        /* fieldset bgian knan*/
        img {
            margin: auto;
            top: 25%;
            right: 19%;
            position: absolute;
            width: 260px;
            height: 260px;
            /* filter: drop-shadow(0 2px 0.5px grey); */
        }
    </style>
</head>

<body>
    <form method="post">
        <fieldset>
            <div class="left">
                <h2>Register</h2>
                <br>
                <!-- <div class="box">
                    <label>IDuser</label>
                    <br> -->
                    <input type="hidden" class="inbox" name="IDuser" placeholder="type here">
                <!-- </div> -->
                <div class="box">
                    <label>username</label>
                    <br>
                    <input type="text" class="inbox" name="username" required placeholder="type here">
                </div>

                <div class="box">
                    <label>password</label>
                    <br>
                    <input type="password" class="inbox" name="password" id="mypass" required placeholder="type here">
                    <!---3-->
                    <i class="fa-solid fa-key" onmouseover="mouseoverPass();" onmouseout="mouseoutPass();"></i>
                </div>

                <div class="box">
                    <label>email</label>
                    <br>
                    <input type="email" class="inbox" name="email" required placeholder="type here">
                </div>

                <div class="box">
                    <label>nis</label>
                    <br>
                    <input type="text" class="inbox" name="nis" required placeholder="type here">
                </div>

                <div class="box">
                    <label>nama lengkap</label>
                    <br>
                    <input type="text" class="inbox" name="namalengkap" required placeholder="type here">
                </div>

                <div class="box">
                    <label>alamat</label>
                    <br>
                    <input type="text" class="inbox" name="alamat" required placeholder="type here">
                </div>

                <div class="box">
                    <label>level</label>
                    <br>
                    <select name="level" class="inbox">
                        <option value="#">Pilih</option>
                        <option value="admin">admin</option>
                        <!-- <option value="petugas">petugas</option> -->
                        <option value="peminjam">peminjam</option>
                    </select>
                </div>

            </div>
            <div class="btnbox">
                <input type="submit" name="daftar" class="tombol" value="Register">
                <p>Sudah punya akun? <a href="login.php">Login</a></p>
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
include ("connect.php");
if(isset($_POST["daftar"])){
    $IDuser = $_POST['IDuser'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $nis = $_POST['nis'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];
    $level = $_POST['level'];

    $result = mysqli_query($connect, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('username sudah ada')</script>";
        return false;
    }

    mysqli_query($connect, "INSERT INTO user (IDuser, username, password, email, nis, namalengkap, alamat, level) VALUES ('$IDuser','$username','$password','$email','$nis','$namalengkap','$alamat','$level')");


    echo"<script>
    alert('data tersimpan di database..')
    document.location.href='login.php'
    </script>";
    header("Location: login.php");
}
?>