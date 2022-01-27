<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
<title>Authentification </title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<link rel=stylesheet type=text/css href=css/fontawesome-all.css>
<link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel=stylesheet>
<link rel=stylesheet type=text/css href=https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>
<script src=https://code.jquery.com/jquery-3.5.1.min.js></script>
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
</head>
<body>
<?php
    $authentifier = $_GET['authentifier'];
    if ($authentifier != null) {
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $tele = $_GET['tele'];
        $email = $_GET['email'];
        $login = $_GET['login'];
        $passe = $_GET['passe'];
        $passe=md5($passe);
        $sql="INSERT INTO `usertls1`( `nom`, `prenom`, `tele`, `email`, `login`, `passe`)
         VALUES('$nom','$prenom','$tele','$email','$login','$passe')";
         if ($cnx->query($sql) === TRUE) {
           echo 'vous avez creer votre compte avec succes';
        } else {
            echo 'erreur';
          
        }
    }

    ?>
<?php include 'menu.php';  ?>
<div class="container border rounded border-dark p-3 mb-3">
<h1 class="text-center my-3">Authentification</h1>
<form>
<div class=form-row>
<div class="col-md-4 mb-3">
<input type=text class=form-control id=prenom placeholder=Prénom name=prenom value=<?php echo $row['prenom'];?> required>
<div class=valid-feedback>Ok !</div>
<div class=invalid-feedback>Valeur incorrecte</div>
</div>
<div class="col-md-4 mb-3">
<input type=text class=form-control id=nom placeholder=Nom name=nom value=<?php echo $row['nom'];?> required>
<div class=valid-feedback>Ok !</div>
<div class=invalid-feedback>Valeur incorrecte</div>
</div>
<div class="col-md-4 mb-3">
<input type=tel class=form-control id=pseudo placeholder=telephone name=tele value=<?php echo $row['tele'];?> required>
<div class=valid-feedback>Ok !</div>
<div class=invalid-feedback>Valeur incorrecte</div>
</div>
</div>
<div class=form-row>
<div class="col-md-6 mb-3">
<input type=text class=form-control id=ville placeholder=Email name=email value=<?php echo $row['email'];?> required>
<div class=valid-feedback>Ok !</div>
<div class=invalid-feedback>Valeur incorrecte</div>
</div>
<div class="col-md-6 mb-3">
<input type=text class=form-control id=pays placeholder=Login name=login value=<?php echo $row['login'];?> required>
<div class=valid-feedback>Ok !</div>
<div class=invalid-feedback>Valeur incorrecte</div>
</div>
</div>
<div class=form-row>
<div class="col-md-3 mb-3">
<input type=password class=form-control id=cp id=Password placeholder="Enter a  Password" name=passe required>
<div class=valid-feedback>Ok !</div>
<div class=invalid-feedback>Valeur incorrecte</div>
</div>
<div class="col-md-3 mb-3">
<input type=password class=form-control id=cp id=ConfirmPassword placeholder="Enter a Confirm Password" required>
<div class=valid-feedback>Ok !</div>
<div class=invalid-feedback>Valeur incorrecte</div>
</div>
<p style=margin-top:7px id=CheckPasswordMatch></p>
</div>
<button class="btn btn-primary" type=submit name=authentifier value=authentifier>Authentifier</button>
</form>
</div>
<script>$(document).ready(function(){$("#ConfirmPassword").on("keyup",function(){var b=$("#Password").val();var a=$("#ConfirmPassword").val();if(b!=a){$("#CheckPasswordMatch").html("Password does not match !").css("color","red")}else{$("#CheckPasswordMatch").html("Password match !").css("color","green")}})});</script>
<script>(function(){window.addEventListener("load",function(){let forms=document.getElementsByClassName("needs-validation");let validation=Array.prototype.filter.call(forms,function(a){a.addEventListener("submit",function(b){if(a.checkValidity()===false){b.preventDefault();b.stopPropagation()}a.classList.add("was-validated")},false)})},false)})();</script>
<?php
     include 'footer.php'; 
?>
</body>
</html>