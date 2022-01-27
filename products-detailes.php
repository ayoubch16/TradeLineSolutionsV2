<?php  include 'db_conn.php';
 session_start();
 ?>
<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=UTF-8>
<meta http-equiv=X-UA-Compatible content="IE=edge">
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet href=css/bootstrap.css>
<link rel=stylesheet href=css/StorageStyle.css>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css integrity="sha512-72McA95q/YhjwmWFMGe8RI3aZIMCTJWPBbV8iQY3jy1z9+bi6+jHnERuNrDPo/WGYEzzNs4WdHNyyEr/yXJ9pA==" crossorigin=anonymous referrerpolicy=no-referrer />
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<title>Detailes</title>
<style>.fa{font-family:FontAwesome!important}.bd{background-color:#fff;width:100%;text-align:-moz-center!important}.cards{position:relative;width:80%;height:700px;background:#fff;border-radius:20px;padding:2rem;margin:auto;box-shadow:0 -9px 14px 0 rgba(0,0,0,0.26);text-align:center}.cards .cards-body{position:relative;height:90%;overflow:hidden;border-radius:10px;margin-bottom:10px}.cards .cards-footer{position:relative;border-radius:10px;height:10%;display:flex;justify-content:center;align-items:center}.cards .cards-footer .index_slider{position:relative;border:2px solid indianred;border-radius:5px;width:25px;height:5px;box-shadow:0 25px 25px rgba(0,0,0,0.15);margin:5px;padding:2px}.cards .cards-footer .index_slider.active1{background-color:indianred}@media only screen and (max-width:800px){.imgEqui{width:20px;height:20px}.cards{height:450px}.infobien{font-size:15px}.cardsDesc,.cards{width:100%;margin:0}}.slider{height:100%;position:relative}.slider img{height:100%;width:100%;position:absolute;top:0;left:0;opacity:0;transition:opacity .5s}.slider img.active{opacity:1}.slider img.active:hover{transform:scale(2)}.suivant,.precedent{color:rgba(250,212,209,0.5);font-size:4vw;position:absolute;top:50%;transform:translateY(-50%);cursor:pointer}.suivant:hover,.precedent:hover{color:#ee7166}.suivant{right:1rem}.precedent{left:1rem}.cardsDesc{position:relative;margin:2px;width:95%;height:auto;padding:2rem;margin:auto;border-radius:20px;box-shadow:0 -9px 14px 0 rgba(0,0,0,0.1)}.cardsDesc .col-6{position:relative;background:#fff}.cardsDesc .cards-body1,.cardsDesc .cards-body{position:relative;width:100%;height:auto;background-color:#fff;text-align:left;border-radius:10px;box-shadow:0 -9px 14px 0 rgba(0,0,0,0.1);margin:5px;padding:10px}@keyframes example{0%{color:#ee7166;transform:translateX(-5%)}25%{color:#000;transform:translateX(5%)}50%{color:#000;transform:translateX(-5%)}100%{color:#ee7166;transform:translateX(5%)}}.prix{transform:translateX(5%);font-weight:bold;color:#ee7166;animation-name:example;animation-duration:3s}</style>
</head>
<body>
<?php
    $etat=" `etatdel`='ND' and ";
    session_start();
    if ($_SESSION['login'] != '') {
        $etat=" ";
    }
    
    ?>
<?php
  include 'menu.php';
  $idbien = $_GET['idbien'];
  $txt5="";$txt6="";
  $sql = "SELECT * FROM `stockbien` where $etat  `id`=" . $idbien;
  $result = $cnx->query($sql);
  if ($row = $result->fetch_assoc()) {
    $txt1 = 'MAD';
        if (strcmp($row['natureb'], 'Location Mensuelle')  == 0) {
            $txt1 = 'MAD/mois';
        } 
        if(strcmp($row['natureb'], 'Location Journaliere')  == 0) {
            $txt1 = 'MAD/jour';
        } 
    if (strcmp($row['typeprix'], 'PI')  == 0) {
        $txt5 = ' À partir de ';
        } 
    if (strcmp($row['prixParm'], 'PPM')  == 0) {
        $txt6 = ' / m² ';
       }      
       $txt=$row['typeb']." A ".$row['adressQ']." , ".$row['adressV'];
         echo "<script>
                document.title= '".$txt."';
            </script>";
  }else{
   echo ' <script>
            window.location=history.go(-1);
            </script>';
  }
  ?>
<div class=bd>
<h1 style=font-size:3vw class="title text-center"><?php echo $row['typeb'].' A '.$row["adressQ"]; ?> ,
<?php echo $row["adressV"]; ?></h1>
<div class=cards>
<div class=cards-body>
<div class=slider>
<img src=<?php echo 'data:image/jpeg;base64,' . base64_encode($row['img1']); ?> class="img_slider active">
<?php for ($x = 2; $x <= 8; $x++) {
                                $q = "SELECT img$x as imgT FROM `stockbien` where   `id`=" . $idbien ;
                                $rst = $cnx->query($q);
                                if ($row1 = $rst->fetch_assoc() and $row1['imgT'] != '') {?>
<img src=<?php echo 'data:image/jpeg;base64,' . base64_encode($row1['imgT']); ?> class=img_slider>
<?php }} ?>
<div class=suivant>
<i class="fa fa-chevron-circle-right"></i>
</div>
<div class=precedent>
<i class="fa fa-chevron-circle-left"></i>
</div>
</div>
</div>
<div class="cards-footer mt-2 row">
<div class="index_slider active1"></div>
<?php for ($x = 2; $x <= 8; $x++) {
                                $q = "SELECT img$x as imgT FROM `stockbien` where   `id`=" . $idbien ;
                                $rst = $cnx->query($q);
                                if ($row1 = $rst->fetch_assoc() and $row1['imgT'] != '') {?>
<div class=index_slider></div>
<?php }} ?>
</div>
</div>
<div class=cardsDesc>
<div class=cards-footer>
</div>
<div class="cards-body row">
<div class="col-6 p-2 left text-left">
<h1 style=font-size:3vw>Appartement</h1>
<span>
<?php if($row['typeb'] !='Terrain/Construction' and $row['typeb'] !='Ferme Agricole'){ ?>
<img class=img-fluid style=width:20px;margin-bottom:0 src=image/icones/couch-solid.svg>
<?php echo ' '.$row["nbrCham"]; ?>
<img class=img-fluid style=width:15px;margin-bottom:0 src=image/icones/bath-solid.svg>
<?php echo ' '.$row["nbrSalBain"]; ?>
<?php } ?> <br>
<img class=img-fluid style=width:17px;margin-bottom:0 src=image/icones/carre.png>
<?php echo ' '.$row["superficier"].' '; ?> m²
<?php if($_SESSION["id"] != null){ ?>
<a target=blanc href=<?php echo $row['lienMap'];?>><i class="fa fa-map" aria-hidden=true></i></a>
<?php } ?>
</span>
</div>
<div class="col-6 p-2 right text-right">
<span><img style=width:20px;margin-bottom:0 src=image/icones/location.png>
<?php echo $row["adressQ"]; ?> <br> <?php echo $row["adressV"]; ?>
</span>
<h4 class="mb-2 prix" style=font-size:3vw>
<?php echo $txt5.' '.number_format($row["prixb"], 2, ".", " ") . ' ' . $txt1.' '.$txt6; ?></h4>
</div>
</div>
<div class=cards-body1>
<h3 class=mb-3 style=font-size:2vw>Equipement :</h3>
<div class=row>
<?php 
                    if(stristr($row['equipement'], 'ascenseur')) echo '<div class="col text-center"><img  class="imgEqui"  src="image/16.svg" ><p style="color: #000;font-size: 2vw;" >Ascenseur</p></div>';
                    if(stristr($row['equipement'], 'securite'))echo '<div class="col  text-center"><img  class="imgEqui"  src="image/10.svg" ><p style="color: #000;font-size: 2vw;" >sécuriser</p></div>';
                    if(stristr($row['equipement'], 'garage'))echo '<div class="col  text-center"><img  class="imgEqui"  src="image/1.svg" ><p style="color: #000;font-size: 2vw;" >Garage</p></div>';
                    if(stristr($row['equipement'], 'Jardin'))echo '<div class="col  text-center"><img  class="imgEqui"  src="image/8.svg" ><p style="color: #000;font-size: 2vw;" >Jardin</p></div>';
                    if(stristr($row['equipement'], 'parking'))echo '<div class="col  text-center"><img  class="imgEqui"  src="image/13.svg" ><p style="color: #000;font-size: 2vw;" >Parking</p></div>';
                    if(stristr($row['equipement'], 'climatisation'))echo '<div class="col  text-center"><img  class="imgEqui"  src="image/5.svg" ><p style="color: #000;font-size: 2vw;" >Climatisation</p></div>';  
                        ?>
</div>
<div class="my-3 p-3">
<h3 class=mb-3 style=font-size:2vw>Description :</h3>
<textarea class="infobien col rounded p-3" rows=18 style=margin-top:10px;resize:none readonly><?php echo $row['autre'] ;?></textarea>
<?php if($_SESSION["id"] != null){ ?>
<h6> Titre foncier : <?php echo $row['titreb'] ;?></h6>
<h6> propriétaire : <?php echo $row['nomp'] ;?> <?php echo $row['prenomp'] ;?> Tel :
<?php echo $row['telep'] ;?></h6>
<h6> intermédiaire : <?php echo $row['nomInter'] ;?> <?php echo $row['prenomInter'] ;?> Tel :
<?php echo $row['teleInter'] ;?></h6>
<?php } ?>
</div>
<div class=mb-5>
<a class=btnC href=tel:+212530065024>Appeler</a>
<a class=btnC href=information.php>Contacter</a>
<a class=btnC href=https://wa.me/0660942877 target=blank>Whatsapp</a>
<div class=collapse id=collapseExample>
<div class="card card-body">
<h1>0660942877</h1>
</div>
</div>
</div>
</div>
</div>
</div>
<script>let img__slider=document.getElementsByClassName("img_slider");let index__slider=document.getElementsByClassName("index_slider");let etape=0;let nbr__img=img__slider.length;let nbr__index=index__slider.length;let precedent=document.querySelector(".precedent");let suivant=document.querySelector(".suivant");function envlenverActiveImage(){for(let i=0;i<nbr__img;i++){img__slider[i].classList.remove("active");index__slider[i].classList.remove("active1")}}suivant.addEventListener("click",function(){etape++;if(etape>=nbr__img){etape=0}envlenverActiveImage();img__slider[etape].classList.add("active");index__slider[etape].classList.add("active1")});precedent.addEventListener("click",function(){etape--;if(etape<0){etape=nbr__img-1}envlenverActiveImage();img__slider[etape].classList.add("active");index__slider[etape].classList.add("active1")});</script>
<?php include 'footer.php'; ?>
</body>
</html>