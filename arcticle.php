<?php include 'db_conn.php';
$num = $_GET['numNews'];


  ?>
<!DOCTYPE html>
<html>
<head>
<title>Article </title>
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
<script src=https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js></script>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css />
<style>.facke img{width:auto;height:300px;float:left}</style>
</head>
<body>
<?php
    session_start();
    ?>
<?php include 'menu.php'; ?>
<div class="container my-5 p-3 animate__animated animate__fadeInUp">
<div class=col>
<?php $sql1="SELECT * FROM news WHERE numNews =".$num;
            $result1 = $cnx->query($sql1);
            if ($row1 = $result1->fetch_assoc()) {
              $cont= str_replace("immobilier", '<b>immobilier</b> ', $row1['contenuNews']);
        ?>
<div>
<h2 class=mb-3><b><?php echo  $row1['titreNews'];?></b></h2>
<div class=facke>
<h5><img class="mb-2 mr-3" src=image/newsimmo.jpg alt=news>&emsp;<?php echo $cont; ?></h5>
</div>
<p><img class=mr-2 style=width:20px;margin-bottom:4px src=image/icones/clock-regular.svg>
&emsp;<?php echo  date_format( date_create($row1['datecreation']), "d M Y H:i:s" ) ;?></p>
<a href=<?php echo  $row1['sourceNews'];?>> Source </a>
<br>
</div>
<hr>
<?php } ?>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>