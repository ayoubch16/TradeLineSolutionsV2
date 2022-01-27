<?php include 'db_conn.php'; 

?>
<!DOCTYPE html>
<html lang=en>
<head>
<head>
<title>TLS-IMMO</title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel=stylesheet>
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css />
<script>!function(h,a,i,c,j,d,g){if(h.fbq){return}j=h.fbq=function(){j.callMethod?j.callMethod.apply(j,arguments):j.queue.push(arguments)};if(!h._fbq){h._fbq=j}j.push=j;j.loaded=!0;j.version="2.0";j.queue=[];d=a.createElement(i);d.async=!0;d.src=c;g=a.getElementsByTagName(i)[0];g.parentNode.insertBefore(d,g)}(window,document,"script","https://connect.facebook.net/en_US/fbevents.js");fbq("init","685505675119456");fbq("track","PageView");</script>
<noscript><img height=1 width=1 style=display:none src="https://www.facebook.com/tr?id=685505675119456&ev=PageView&noscript=1" /></noscript>
<style>.sim div{border:2px solid #fff;width:150px;height:100px;background-color:rgb(238,113,102,0.8);position:sticky;top:300px;right:-100px;bottom:8%;z-index:1}.sim div:hover{transform:scale(1.1);right:10px;transition:2s;right:0}@media only screen and (max-width:700px){.sim{display:none}}</style>
</head>
</head>
<body>
<?php
    session_start();
    
    ?>
<?php include 'menu.php'   ;?>
<?php include 'slider2.php';?>
<div class="container my-3" style=position:relative;top:-200px>
<div class="container rounded py-5 mb-5" style="background:linear-gradient(90deg,rgba(245,170,163,1) 0,rgba(238,113,102,1) 5%,rgba(238,113,102,1) 95%,rgba(245,170,163,1) 100%)">
<h3 class="text-center mb-3" style="color:#fff;font-weight:bold;font-family:' Montserrat',sans-serif"><img class=mr-2 style="filter:brightness(0) invert(1);width:30px;margin-bottom:0" src=image/icones/search-solid.svg> Votre bien immobilier en un clic ! </h3>
<form action=produits.php>
<div class=form-row>
<div class="col-md mb-3">
<select name=typeb class="form-control text-center">
<option value disabled selected hidden>Nature du bien...</option>
<option>Appartement</option>
<option>Villa</option>
<option>Terrain/Construction </option>
<option>Ferme Agricole</option>
<option>Maison</option>
<option>Chalet</option>
<option>Studio</option>
<option>Duplex</option>
<option>Riad</option>
</select>
</div>
<div class="col-md mb-3">
<select name=nature class="form-control text-center">
<option value disabled selected hidden>Type de service ..</option>
<option>Vente</option>
<option>Location</option>
</select>
</div>
<div class="col-md mb-3">
<select class="form-control text-center" name=ville>
<option value disabled selected hidden>Ville...</option>
<?php 
                                $sql="SELECT * FROM ville order by ville asc";
                                $result = $cnx->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                ?>
<option value=<?php echo $row['ville']?>><?php echo $row['ville']?></option>
<?php }?>
</select>
</div>
</div>
<div class="row align-items-center">
<input class="btnC1 p-3" type=submit name=chercher value=CHERCHER />
</div>
</form>
</div>
<div class="container rounded py-5 mb-3" style="background:linear-gradient(90deg,rgba(245,170,163,1) 0,rgba(238,113,102,1) 5%,rgba(238,113,102,1) 95%,rgba(245,170,163,1) 100%)">
<h3 class=text-center style=color:#fff;font-weight:bold> Déposez votre besoin immobilier : </h3>
<form method=POST action=demande.php>
<div class=form-row>
<div class="col-md mb-3">
<input type=text class="form-control text-center" id=prenom placeholder=Prenom name=prenom>
</div>
<div class="col-md mb-3">
<input type=text class="form-control text-center" id=nom placeholder=Nom name=nom>
</div>
<div class="col-md mb-3">
<input type=tel class="form-control text-center" id=tele placeholder=Tele name=tele>
</div>
</div>
<div class="row align-items-center">
<input class="btnC1 p-3" type=submit name=continuer value=CONTINUER />
</div>
</form>
</div>
<div class="categories mb-5">
<div class=container>
<h2 class=title>Nos offres </h2>
<div class=row>
<div class="col-6 col-sm-3 cat text-center">
<a href="produits.php?typeb=Villa"><img class=img-fluid src=image/villa.webp></a>
</div>
<div class="col-6 col-sm-3 cat text-center">
<a href="produits.php?typeb=Appartement"><img class=img-fluid src=image/appartements.webp></a>
</div>
<div class="col-6 col-sm-3 cat text-center">
<a href="produits.php?typeb=Maison"><img class=img-fluid src=image/maison.webp></a>
</div>
<div class="col-6 col-sm-3 cat text-center">
<a href="produits.php?typeb=Terrain"><img class=img-fluid src=image/terrain.webp></a>
</div>
</div>
</div>
</div>
</div>
<a class=sim href=simulation.php style=color:#fff>
<div class="rounded row text-center" style>
<h6><img class=mr-2 style="filter:brightness(0) invert(1);width:50px;margin-bottom:0" src=image/icones/calculator.png> <b>Simulateur de Credit</b> </h6>
</div>
</a>
<?php include 'footer.php'; ?>
</body>
</html>