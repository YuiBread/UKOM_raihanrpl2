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
            border: 5px solid wheat;
            border-radius: 10px;
            background-color: #B6C4B8;
            display: flex;
        }
        .box{
            margin: 10px 10px 10px 0;
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
<form method="POST" action="logcheck.php">
    <fieldset>
        <div class="left">
    	<h2>Login</h2>
    	<div class="box">
    		<label>Username</label>
			<br>
    		<input type="text" name="username" required class="inbox">
    	</div>
    	<div class="box">
    		<label>Password</label>
			<br>
    		<input type="password" name="password" required class="inbox">
    	</div>
        <!-- <button class="btn" type="submit">Login</button> -->
		<input type="submit" class="btn" value="Login">
		<p>Sudah punya akun?<a href="register.php" class="log">Register</a></p>
    </div>
    <div class="right">
        <!-- <img src="zfoto/"> -->
        <h2 class="logo">Ini logo</h2>
    </div>
    </fieldset>
</form>
</body>
</html>





<?php
if(isset($_GET['pesan'])){
    if($_GET['pesan'] = "gagal"){
        echo "<script>alert('Username atau Password salah')</script>";
    }
}
?>

