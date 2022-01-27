<? include 'db_conn.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Connexion </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/StorageStyle.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="icon" href="icon.ico" type="image/ico" sizes="16x16">
<style>@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');.container{display:flex;align-items:center;justify-content:center}.screen{background:linear-gradient(90deg,#2e0805,#eb5547);position:relative;height:600px;width:360px;box-shadow:0 0 24px #450d08;z-index:1;margin:20px}.screen__content{z-index:1;position:relative;height:100%}.screen__background{position:absolute;top:0;left:0;right:0;bottom:0;z-index:0;-webkit-clip-path:inset(0 0 0 0);clip-path:inset(0 0 0 0)}.screen__background__shape{transform:rotate(45deg);position:absolute}.screen__background__shape1{height:520px;width:520px;background:#FFF;top:-50px;right:120px;border-radius:0 72px 0 0}.screen__background__shape2{height:220px;width:220px;background:#fff;top:-172px;right:0;border-radius:32px}.screen__background__shape4{height:400px;width:200px;background:#fff;top:420px;right:50px;border-radius:60px}.login{width:320px;padding:30px;padding-top:156px}.login__field{padding:20px 0;position:relative}.login__icon{position:absolute;top:30px;color:#ee7166}.login__input{border:0;border-bottom:2px solid #f7bfba;background:0;padding:10px;padding-left:24px;font-weight:700;width:75%;transition:.2s}.login__input:active,.login__input:focus,.login__input:hover{outline:0;border-bottom-color:#ee7166}.login__submit{background:#fff;text-align:center;font-size:14px;margin-top:30px;padding:16px 20px;border-radius:26px;border:1px solid #f7bfba;text-transform:uppercase;font-weight:700;display:flex;align-items:center;width:100%;color:#ee7166;box-shadow:0 2px 2px #73150d;cursor:pointer;transition:.2s}.login__submit:active,.login__submit:focus,.login__submit:hover{border-color:#ee7166;outline:0;color:#fff;background:linear-gradient(90deg,#2e0805,#eb5547)}.button__icon{font-size:24px;margin-left:auto;color:#ee7166}</style>
</head>
<body>
<?php
    session_start();
    include 'menu.php';?>
<div class="container">
<div class="screen">
<div class="screen__content">
<form class="login" action="connecter.php" method="POST">
<div class="login__field">
<input type="text" class="login__input" name="login" placeholder="Username">
</div>
<div class="login__field">
<input type="password" class="login__input" name="passe" placeholder="Password">
</div>
<button name="connect" class="button login__submit" value="connect">
Connecter
</button>
</form>
</div>
<div class="screen__background">
<span class="screen__background__shape screen__background__shape4"></span>
<span class="screen__background__shape screen__background__shape3"></span>
<span class="screen__background__shape screen__background__shape2"></span>
<span class="screen__background__shape screen__background__shape1"></span>
</div>
</div>
</div>
<?php 
include 'footer.php'; 
 ?>
</body>
</html>