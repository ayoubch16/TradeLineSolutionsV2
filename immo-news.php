<?php include 'db_conn.php'; 

?>
<!DOCTYPE html>
<html lang=en>
<head>
<head>
<title>IMMO-NEWS</title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<script src=https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js></script>
<link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel=stylesheet>
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<meta name=description content="Que vous soyez particulier, professionnel ou personne morale, Nous vous proposons un accompagnement à l’achat, la vente, la gestion locative, et le conseil bancaire et technique immobilier (financement bancaire, construction, ...)">
<meta name=keywords content="immobilier,immobilier au maroc ,appartement,maroc,villa maroc">
<meta name=keywords content="maison marocaine , immobilier maroc , appartement maroc , logement">
<meta name=keywords content=temara,rabat,agdal,skhirat,sale>
<meta name=Robots content=All>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css />
<style>.fakeimg{height:auto;width:auto;background:#aaa}.fakeimg img{width:100%;height:100%}.jumbotron h1{font-size:130px;color:#000}@keyframes back{100%{background-position:2000px 0}}@media only screen and (max-width:600px){.jumbotron h1{font-size:30px}}</style>
</head>
</head>
<body>
<?php session_start(); 
include 'menu.php';  ?>
<div class="jumbotron text-center" style="margin-bottom:0;background:url('image/statiback.jpg')">
<h1 class="animate__animated animate__fadeInLeftBig">TLS-IMMO-NEWS</h1>
<h4 class="animate__animated animate__fadeInLeft">Actualités et conseils immobilier</h4>
</div>
<div class=container style=margin-top:30px>
<div class="row align-items-start">
<div class=col-sm-8>
<?php $sql1="SELECT * FROM news ";
            $result1 = $cnx->query($sql1);
            while ($row1 = $result1->fetch_assoc()) {
              
        ?>
<div id=<?php echo  $row1['numNews'];?>>
<h2><img src=image/icones/article.png width=20 alt=article> <?php echo  $row1['titreNews'];?></h2>
<div class="fakeimg mb-3"><img src=<?php echo 'data:image/jpeg;base64,' . base64_encode($row1['imgNews']); ?> alt=news></div>
<div hieght=100>
<h5>&emsp;<?php echo substr($row1["contenuNews"], 0, 200);?><a href="arcticle.php?numNews=<?php echo  $row1['numNews'];?>">...Afficher plus</a></h5>
</div>
<p><img src=image/icones/clock-regular.svg width=20></i>
&emsp;<?php echo  date_format( date_create($row1['datecreation']), "d M Y H:i:s" ) ;?></p>
<a href=<?php echo  $row1['sourceNews'];?>> Source </a>
<br>
</div>
<hr>
<?php } ?>
</div>
<div class=col-sm-4>
<h2 class=mb-3>Actualité à la une</h2>
<?php $sql2="SELECT * FROM news ";
            $result2 = $cnx->query($sql2);
            while ($row2 = $result2->fetch_assoc()) {
        ?>
<a href="arcticle.php?numNews=<?php echo  $row2['numNews'];?>">
<div class="row align-items-start">
<div class=col-4><img src=<?php echo 'data:image/jpeg;base64,' . base64_encode($row2['imgNews']); ?> width=100 height=100></div>
<div class=col><p><?php echo  $row2['titreNews'];?></p></div>
</div>
</a>
<hr>
<?php } ?>
<div class=text-left>
<h3>suivez-nous :</h3>
<ul class=ml-2>
<li><a href="https://web.facebook.com/TLS-IMMO-111322111153327/?_rdc=1&_rdr" style=text-decoration:none;color:#000><img src=image/icones/facebook.svg width=20 alt=facebook>&emsp; Facebook </a></li>
<li><a href="https://www.instagram.com/tls.immo?fbclid=IwAR14cEQjlgIz19kZ2yzs2M0x_mCvr8hs8Y5yFlZeEoDkfjgyOy9Gaq8XliQ" style=text-decoration:none;color:#000><img src=image/icones/instagram.svg width=20 alt=instagram>&emsp; Intagrame</a></li>
<li><a href style=text-decoration:none;color:#000><img src=image/icones/whatsapp.svg width=20 alt=whatsapp>&emsp; whatsapp</a></li>
<li><a href=https://www.linkedin.com/company/trade-line-solutions style=text-decoration:none;color:#000><img src=image/icones/linkedin.svg width=20 alt=LinkdeIn>&emsp; LinkdeIn</a></li>
</ul>
</div>
</div>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>