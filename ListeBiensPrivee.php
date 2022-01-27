<?php include 'db_conn.php';
$n = $_GET['nature'];
$v = $_GET['ville'];
$t = $_GET['typeb'];
$page=$_GET['page'];
$limit=" LIMIT 9 ";
if($page==1){$limit=" LIMIT 9";}
if($page==2){$limit=" LIMIT 9 OFFSET 9";}
if($page==3){$limit=" LIMIT 9 OFFSET 18";}
if($page==4){$limit=" LIMIT 9 OFFSET 27";}
if($page==5){$limit=" LIMIT 1000 OFFSET 36";}
//$sql1=empty($sql1) ? "  SELECT * FROM `stockbien` where  `etatdel`='ND'  " : "  $sql1  ";
$sql1="SELECT * FROM `stockbien` 
where  `etatdel`='P' ORDER BY `datecreation` desc ".$limit;

?>
<!DOCTYPE html>
<html lang=en>
<?php 
session_start();
    $chercher = $_GET['chercher'];      
                    //  echo $sql1;
                     if ($chercher != null) {
                     $n = $_GET['nature'];
                     $v = $_GET['ville'];
                     $t = $_GET['typeb'];
                      $ville = empty($v) ? " " : " `adressV`= UPPER('$v') and ";
                      $typeb = empty($t) ? " " : "  `typeb`='$t' and ";
                      $nature = empty($n) ? " " : "  `natureb`='$n' and ";
                      $NbrCham = empty($_GET['NbrCham']) ? 100 : $_GET['NbrCham'];
                      $NbrSalB = empty($_GET['NbrSaB']) ? 100 : $_GET['NbrSaB'];
                      $MinPrix = empty($_GET['MinPrix']) ? 0 : $_GET['MinPrix'];
                      $MaxPrix = empty($_GET['MaxPrix']) ? 1000000000 : $_GET['MaxPrix'];
                      $sql1 = "SELECT * FROM `stockbien` where $typeb  $ville   $nature ( `nbrCham` between 0 and $NbrCham)  and (`nbrSalBain` between 0 and $NbrSalB )  and (`prixb` between $MinPrix  and $MaxPrix)  and `etatdel`='P' ";    
      } 
      $btnReff = $_GET['btnReff']; 
      if ($btnReff != null) {
            $Reff=$_GET['Reff'];
             $sql1="SELECT * FROM `stockbien` WHERE 
            `nomp` LIKE '%$Reff%' OR `prenomp` LIKE '%$Reff%' OR `telep` LIKE '%$Reff%' OR
            `nomInter` LIKE '%$Reff%' OR `prenomInter` LIKE '%$Reff%' OR `teleInter` LIKE '%$Reff%' OR 
            `adressQ` LIKE '%$Reff%' OR `adressV` LIKE '%$Reff%' OR `Reff` LIKE '%$Reff%' ";
           
            
      }
    ?>
<head>
<meta charset=UTF-8>
<meta http-equiv=X-UA-Compatible content="IE=edge">
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet href=css/bootstrap.css>
<link rel=stylesheet href=css/StorageStyle.css>
<link rel=stylesheet href=css/test.css>
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<title>Liste Biens Privées</title>
<style>@keyframes example{0%{color:#ee7166;transform:translateX(-5%)}25%{color:#000;transform:translateX(5%)}50%{color:#000;transform:translateX(-5%)}100%{color:#ee7166;transform:translateX(5%)}}.prix{transform:translateX(5%);font-weight:bold;color:#ee7166;animation-name:example;animation-duration:3s}.fa{font-family:FontAwesome!important}</style>
</head>
<body>
<?php
    session_start();
    if ($_SESSION['login'] == '') {
        header("Location: Account.php");
    }
    ?>
<?php include 'menu.php';?>
<div class=stati>
<h3 class="text-center my-2" style="color:#fff;font-weight:bold;font-family:' Montserrat',sans-serif"><i class="fa fa-search" aria-hidden=true></i> Que cherchez vous ? </h3>
<form class="container my-2" method=GET>
<div class=form-row>
<div class="col-md-4 mb-3">
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
<div class="col-md-4 mb-3">
<select name=nature class="form-control text-center">
<option value disabled selected hidden>Type de service ..</option>
<option>Vente</option>
<option>Location Journaliere</option>
<option>Location Mensuelle</option>
</select>
</div>
<div class="col-md-4 mb-3">
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
<div class=form-row>
<div class="col-md-3 mb-3">
<input type=number name=NbrCham class="form-control text-center" id=pays placeholder="Nombre de chambre">
</div>
<div class="col-md-3 mb-3">
<input type=number name=NbrSaB class="form-control text-center" id=cp placeholder="Nombre de salle de bain">
</div>
<div class="col-md-3 mb-3">
<input type=number name=MinPrix class="form-control text-center" id=pays placeholder="Prix min">
</div>
<div class="col-md-3 mb-3">
<input type=number name=MaxPrix class="form-control text-center" id=cp placeholder="Prix max">
</div>
</div>
<div class="row align-items-center">
<input class="btnC1 p-3" type=submit name=chercher value=CHERCHER />
</div>
</form>
</div>
<?php if($_SESSION["id"] != null){ ?>
<div class="container col text-right px-5" style=background:#f8f8f8>
<form class="row recherch m-3" action>
<input type=text name=Reff id=Reff class=round>
<input type=submit name=btnReff value=Rechercher class=round>
</form>
</div>
<?php } ?>
<div class="container col text-right px-5" style=background:#f8f8f8>
<select class="recherch m-3">
<option disabled selected hidden>Trier Par...</option>
<option onclick=dateb() selected>Date</option>
<option onclick=typeb()>Type</option>
<option onclick=cham()>Nombre de Chambres</option>
<option onclick=prixb()>Prix </option>
<option onclick=superf()>Taille du bien</option>
<option onclick=villeb()>Ville</option>
</select>
</div>
<div class=liste>
<div id=demo class="row justify-content-center">
<?php 
                 //$sql1="SELECT * FROM `stockbien` ";
                    $result = $cnx->query($sql1);
                    while ($row = $result->fetch_assoc()) { 
                        
                        $txt1 = 'MAD';
                                if (strcmp($row['natureb'], 'Location Mensuelle')  == 0) {
                                    $txt1 = 'MAD/mois';
                                } 
                                if(strcmp($row['natureb'], 'Location Journaliere')  == 0) {
                                    $txt1 = 'MAD/jour';
                                } 
                        $txt3='';
                             if($row['typeprix']=='PI'){
                                 $txt3=' A Partire de ';
                             }
                        $txt5='';
                            if($row['prixParm']=='PPM'){
                                $txt5=' /m²';
                            }
                        $txt4="";
                                if(strcmp($row['typeb'], 'Terrain/Construction')==0 or  strcmp($row['typeb'], 'Ferme Agricole')==0){
                                        $txt4=" / m²";
                                }
                                
                                ?>
<div class=cardb data-id-group=<?php echo $row['id'];?> data-cat-group=<?php echo $row['typeb'];?> data-type-group=<?php echo $row['typeb'];?> data-date-group=<?php echo $row['datecreation'];?> data-chambre-group=<?php echo $row['nbrCham'];?> data-prix-group=<?php echo $row['prixb'];?> data-superficier-group=<?php echo $row['superficier'];?> data-ville-group=<?php echo $row['adressV'];?>>
<a href="products-detailes.php?idbien=<?php echo $row["id"]; ?>">
<div class="crd-body my-2 mx-2">
<img src=<?php echo 'data:image/jpeg;base64,' . base64_encode($row['img1']); ?> class=img-fluid alt>
</div>
</a>
<div class="crd-type my-2 mx-2 py-2">
<h3><?php echo $row['typeb'];?></h3>
</div>
<div class="crd-footer my-2 row mx-2">
<div class="crd-footer-left col mr-1 text-left">
<h6><span><?php echo $row['nbrCham'];?>
<img src=image/icones/couch-solid.svg width=15px height=15px>
<?php echo $row["nbrSalBain"]; ?> <img src=image/icones/bath-solid.svg width=15px height=15px>
<br>
<?php echo $row["superficier"]; ?> m² <img src=image/icones/carre.png width=15px height=15px>
<?php echo '<br>Ref:'.$row['Reff']?>
</span></h6>
</div>
<div class="crd-footer-right col ml-1 text-right">
<h6><span>
<img src=image/icones/location.png width=15px height=15px>
<?php echo $row["adressQ"]; ?> <br> <?php echo $row["adressV"]; ?>
</span></h6>
</div>
</div>
<div class=crd-prix>
<h3 class=prix style=font-size:1.4rem><?php echo $txt3.''.number_format($row["prixb"], 0, "", " ") . ' ' . $txt1.' '.$txt5; ?></h3>
</div>
<?php if($_SESSION["id"] != null){ ?>
<div class="crd-btn row p-2">
<a class="col btnC text-center mx-2" href="Modifier1.php?idbien=<?php echo $row["id"]; ?>">Modifier</a>
<?php if ($_SESSION['user'] == 'admin') { ?>
<a class="col btnC text-center mx-2" onclick="return confirm('voulez vous confirmer l operation  ?')" href="delete.php?idbien=<?php echo $row["id"]; ?>">Supprimer</a>
<?php } ?>
</div>
<?php } ?>
<span id=dis4 class=dispo></span>
</div>
<?php  } ?>
</div>
</div>
<div class="pagination p-5" style=background:#f8f8f8>
<nav aria-label=... class=m-3>
<ul class="pagination pagination-lg page-btn">
<li class=page-item><a id=p1 class=page-link href="ListeBiensPrivee.php?page=1">1</a></li>
<li class=page-item><a id=p2 class=page-link href="ListeBiensPrivee.php?page=2">2</a></li>
<li class=page-item><a id=p3 class=page-link href="ListeBiensPrivee.php?page=3">3</a></li>
<li class=page-item><a id=p4 class=page-link href="ListeBiensPrivee.php?page=4">4</a></li>
<li class=page-item><a id=p5 class=page-link href="ListeBiensPrivee.php?page=5">&#8594;</a></li>
</ul>
</nav>
</div>
<script></script>
<script>var type=document.querySelectorAll("[data-type-group]");var Listetype=Array.from(type);let sortedtype=Listetype.sort(sortertype);function sortertype(a,b){if(a.dataset.typeGroup<b.dataset.typeGroup)return-1;if(a.dataset.typeGroup>b.dataset.typeGroup)return 1;return 0;}
function typeb(){sortedtype.forEach(e=>document.querySelector("#demo").appendChild(e));console.log(sortedtype);}
var date=document.querySelectorAll("[data-date-group]");var Listedate=Array.from(date);let sorteddate=Listedate.sort(sorterdate);function sorterdate(a,b){if(new Date(a.dataset.dateGroup)<new Date(b.dataset.dateGroup))return 1;if(new Date(a.dataset.dateGroup)>new Date(b.dataset.dateGroup))return-1;return 0;}
function dateb(){sorteddate.forEach(e=>document.querySelector("#demo").appendChild(e));console.log(sorteddate);}
var chambre=document.querySelectorAll("[data-chambre-group]");var Listechambre=Array.from(chambre);let sortedchambre=Listechambre.sort(sorterchambre);function sorterchambre(a,b){if(Number(a.dataset.chambreGroup)<Number(b.dataset.chambreGroup))return-1;if(Number(a.dataset.chambreGroup)>Number(b.dataset.chambreGroup))return 1;return 0;}
function cham(){sortedchambre.forEach(e=>document.querySelector("#demo").appendChild(e));console.log(sortedchambre);}
var prix=document.querySelectorAll("[data-prix-group]");var Listeprix=Array.from(prix);let sortedprix=Listeprix.sort(sorterprix);function sorterprix(a,b){if(Number(a.dataset.prixGroup)<Number(b.dataset.prixGroup))return 1;if(Number(a.dataset.prixGroup)>Number(b.dataset.prixGroup))return-1;return 0;}
function prixb(){sortedprix.forEach(e=>document.querySelector("#demo").appendChild(e));console.log(sortedprix);}
var superficier=document.querySelectorAll("[data-superficier-group]");var Listesuperficier=Array.from(superficier);let sortedsuperficier=Listesuperficier.sort(sortersuperficier);function sortersuperficier(a,b){if(a.dataset.superficierGroup<b.dataset.superficierGroup)return 1;if(a.dataset.superficierGroup>b.dataset.superficierGroup)return-1;return 0;}
function superf(){sortedsuperficier.forEach(e=>document.querySelector("#demo").appendChild(e));console.log(sortedsuperficier);}
var ville=document.querySelectorAll("[data-ville-group]");var Listeville=Array.from(ville);let sortedville=Listeville.sort(sorterville);function sorterville(a,b){if(a.dataset.villeGroup<b.dataset.villeGroup)return-1;if(a.dataset.villeGroup>b.dataset.villeGroup)return 1;return 0;}
function villeb(){sortedville.forEach(e=>document.querySelector("#demo").appendChild(e));console.log(sortedville);}</script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js></script>
<script>$(document).ready(function(){$('.counter').counterUp({delay:10,time:1200});});</script>
<script>var url_string=window.location.href;var url=new URL(url_string);var c=url.searchParams.get("page");switch(c){case'1':document.getElementById('p1').style.backgroundColor="#EE7166";document.getElementById('p1').style.color="#fff";break;case'2':document.getElementById('p2').style.backgroundColor="#EE7166";break;case'3':document.getElementById('p3').style.backgroundColor="#EE7166";break;case'4':document.getElementById('p4').style.backgroundColor="#EE7166";break;case'5':document.getElementById('p5').style.backgroundColor="#EE7166";break
default:document.getElementById('p1').style.backgroundColor="#EE7166";}</script>
</body>
</html>