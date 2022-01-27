<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Trade Line Solutions</title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<link rel=stylesheet type=text/css href=css/fontawesome-all.css>
<link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel=stylesheet>
<link href=https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css rel=stylesheet />
<link rel=stylesheet type=text/css href=https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css />
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container border rounded border-dark p-3 mb-3">
<h1>Formulaires</h1>
<form class=needs-validation novalidate>
<div class=form-row>
<div class="col-md-4 mb-3">
<input type=text class=form-control id=prenom placeholder=Prénom required>
<div class=valid-feedback>Ok !</div>
<div class=invalid-feedback>Valeur incorrecte</div>
</div>
<div class="col-md-4 mb-3">
<input type=text class=form-control id=nom placeholder=Nom required>
<div class=valid-feedback>Ok !</div>
<div class=invalid-feedback>Valeur incorrecte</div>
</div>
<div class="col-md-4 mb-3">
<input type=tel class=form-control id=pseudo placeholder=telephone required>
<div class=valid-feedback>Ok !</div>
<div class=invalid-feedback>Valeur incorrecte</div>
</div>
</div>
<div class=form-row>
<div class="col-md-6 mb-3">
<input type=text class=form-control id=ville placeholder=Ville required>
<div class=valid-feedback>Ok !</div>
<div class=invalid-feedback>Valeur incorrecte</div>
</div>
<div class="col-md-3 mb-3">
<input type=text class=form-control id=pays placeholder=Pays required>
<div class=valid-feedback>Ok !</div>
<div class=invalid-feedback>Valeur incorrecte</div>
</div>
<div class="col-md-3 mb-3">
<input type=number class=form-control id=cp placeholder="Code postal" required>
<div class=valid-feedback>Ok !</div>
<div class=invalid-feedback>Valeur incorrecte</div>
</div>
</div>
<div class=form-group>
<div class=form-check>
<input class=form-check-input type=checkbox value id=cgu required>
<label class=form-check-label for=cgu>J'accepte les conditions générales d'utilisation et de vente</label>
<div class=invalid-feedback>Vous devez accepter les CGU pour continuer</div>
</div>
</div>
<button class="btn btn-primary" type=submit>Envoyer</button>
</form>
</div>
<script>(function(){window.addEventListener("load",function(){let forms=document.getElementsByClassName("needs-validation");let validation=Array.prototype.filter.call(forms,function(a){a.addEventListener("submit",function(b){if(a.checkValidity()===false){b.preventDefault();b.stopPropagation()}a.classList.add("was-validated")},false)})},false)})();</script>
<?php include 'footer.php'; ?>
</body>
</html>