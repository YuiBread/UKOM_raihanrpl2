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
            font-family: 'Poppins',sans-serif;
			box-sizing: border-box;
        }
        body{
            width: 100vw;
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #12372A;
        }h2{
            padding-bottom: 3vh;
        }
        fieldset{
            padding: 5vh;
            width: 45vw;
			/* display: grid; */
			/* grid-template-columns: repeat(1fr,200px); */
			/* grid-template-column: 1fr; */
            border: 5px solid wheat;
            border-radius: 10px;
            background-color: #B6C4B8;
            /* display: flex; */
        }
        .box{
            margin: 10px 10px 10px 0;
			/* width: 100%; */
        }
        label{
            font-weight: 600;
        }
        .inbox{
            border-radius: 5px;
            padding: 2px 5px; 
        }
        .btn{
            padding: 5px 10px;
            border-radius: 5px;
            margin: 0 0 5vh 0;
            font-weight: 650;
            cursor: pointer;
            transition: 0.4s ease;
        }
        .btn:hover{
            color: white;
            background-color: #12372A;
        }
        .log{
            text-decoration: none;
            margin: 0 5px;
            padding: 3px 5px;
            border-radius: 5px;
            color: white;
            background-color: #303030;
            font-weight: 600;
            transition: 0.4s ease;
        }
        .log:hover{
            color: black;
            background-color: #EEF0E5;
        }
        .logo{
            position: absolute;
            right: 0;
            transform: translateX(-34vw) translateY(14vh);
        }
    </style>
</head>
<body>
<form method="POST" action="">
<fieldset>
    	<h2>Register</h2>
		<div class="left">
		<input type="hidden" name="IDuser" class="inbox">
    	<div class="box">
    		<label>Username</label>
			<br>
    		<input type="text" name="username" required class="inbox">
    	</div>
    	<div class="box">
    		<label>Password</label>
			<br>
    		<input type="text" name="password" required class="inbox">
    	</div>
    	<div class="box">
    		<label>Email</label>
			<br>
    		<input type="text" name="email" required class="inbox">
    	</div>
    	<div class="box">
    		<label>Nama Lengkap</label>
			<br>
    		<input type="text" name="namalengkap" required class="inbox">
    	</div>
    	<div class="box">
    		<label>Alamat</label>
			<br>
    		<input type="text" name="alamat" required class="inbox">
    	</div>
    	<div class="box" >
    		<label>Level</label>
			<br>
    		<select name="level" class="inbox">
				<option value=""></option>
				<option>Admin</option>
				<!-- <option>Petugas</option> -->
				<option>Peminjam</option>
			</select>
    	</div>
	</div>
		<input type="submit" class="btn" name="daftar" value="daftar">
		<p>Sudah punya akun?<a href="login.php" class="log">Login</a></p>
    </fieldset>
</form>
</body>
</html>


<?php
include ("connect.php");
if(isset($_POST["daftar"])){
    $IDuser = $_POST['IDuser'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];
    $level = $_POST['level'];
    mysqli_query($connect, "INSERT INTO user (IDuser, username, password, email, namalengkap, alamat, level) VALUES ('$IDuser','$username','$password','$email','$namalengkap','$alamat','$level')");
    // header("Location: login.php");


    echo"<script>alert('data tersimpan di database..')</script>";
    header("Location: login.php");
}
?>