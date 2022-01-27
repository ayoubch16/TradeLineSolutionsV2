<?php include 'db_conn.php';
$sql1=$_GET['q'];
// /
$sql1=empty($sql1) ? "  SELECT * FROM `stockbien` where  `etatdel`='ND'  " : "  $sql1  ";
?>
<?php include 'db_conn.php';?>
<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=UTF-8>
<meta http-equiv=X-UA-Compatible content="IE=edge">
<link rel=stylesheet href=css/bootstrap.css>
<link rel=stylesheet href=css/StorageStyle.css>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<title>Listes</title>
</head>
<body>
<div class="text-right container my-2">
<select class=col-3>
<option disabled selected hidden>Trier Par...</option>
<option onclick=typeb()>Type</option>
<option onclick=dateb()>Date</option>
<option onclick=cham()>Nombre de Chambres</option>
<option onclick=prixb()>Prix </option>
<option onclick=superf()>Taille du bien</option>
<option onclick=villeb()>Ville</option>
</select>
</div>
<div class="container d-flex justify-content-center mt-50 mb-50">
<div id=prod class="row align-items-sm-start">
<div id=demo class="row testWrapper align-items-sm-start">
<?php 
         //$sql1="SELECT * FROM `stockbien`";
         $result1 = $cnx->query($sql1);
         while ($row = $result1->fetch_assoc()) {?>
<div class="divste test" data-category-group=<?php echo $row[''];?> data-type-group=<?php echo $row['typeb'];?> data-date-group=<?php echo $row['datecreation'];?> data-chambre-group=<?php echo $row['nbrCham'];?> data-prix-group=<?php echo $row['prixb'];?> data-superficier-group=<?php echo $row['superficier'];?> data-ville-group=<?php echo $row['adressV'];?>>
<div class="col-md-4 mt-2">
<div class=card>
<div class=card-body>
<?php echo $row['datecreation'];?>
<div class=card-img-actions>
<div class=dis1>
<?php  
                                     if(strcmp($row['dispo'], 'Disponible')  == 0)  {
                                           echo ' <img src="image/dispo.png" alt="Disponible" width="100" height="100" style="position: absolute; top: 0; left: 0;">';
                                     }
                                      if(strcmp($row['dispo'], 'Réservé')  == 0)  {
                                                                echo ' <img src="image/reserve.png" alt="Réservé" width="100" height="100" style="position: absolute; top: 0; left: 0;">';
                                    }
                                    if(strcmp($row['dispo'], 'Vendu')  == 0)  {
                                    echo ' <img src="image/vendu.png" alt="Vendu" width="100" height="100" style="position: absolute; top: 0; left: 0;">';
                                        }
                                ?>
</div>
<a href="products-detailes.php?idbien=<?php echo $row["id"]; ?>">
<img src=<?php echo 'data:image/jpeg;base64,' . base64_encode($row['img1']); ?> style=width:300px;height:300px alt>
</a>
</div>
</div>
<div class="card-body bg-light">
<div class=row>
<div class=col>
<h3 class="mb-2 text-left"><?php echo $row["typeb"]; ?></h3>
</div>
</div>
<div class=row>
<div class=col>
<h6 class=text-left>
<?php if($row['typeb'] !='Terrain/Construction' and $row['typeb'] !='Ferme Agricole'){ ?>
<img class=mr-2 style=width:20px;margin-bottom:4px src=image/icones/couch-solid.svg><?php echo $row["nbrCham"]; ?>
<img class=mr-2 style=width:15px;margin-bottom:4px src=image/icones/bath-solid.svg><?php echo $row["nbrSalBain"]; ?> <br>
<?php } ?>
<img class=mr-2 style=width:17px;margin-bottom:4px src=image/icones/carre.png><?php echo $row["superficier"]; ?> m²
</h6>
</div>
<div class=col>
<h6 class="mb-2 text-right"><img style=width:18px;margin-bottom:4px src=image/icones/location.png>
<?php echo $row["adressQ"]; ?><br> <?php echo $row["adressV"]; ?></h6>
</div>
</div>
<div class=row>
<div class=col>
<h4 class="mb-4 text-right prix">
<?php echo number_format($row["prixb"], 0, "", " ") . ' ' . $txt1; ?></h4>
</div>
</div>
<?php if($_SESSION["id"] != null){ ?>
<a class=btnC href="Modifier1.php?idbien=<?php echo $row["id"]; ?>">Modifier</a>
<?php if ($_SESSION['user'] == 'admin') { ?>
<a class=btnC onclick="return confirm('voulez vous confirmer l operation  ?')" href="delete.php?idbien=<?php echo $row["id"]; ?>">Supprimer</a>
<?php } ?>
<?php  } ?>
<hr>
<p class="text-left text-secondary"><img class=mr-1 style=filter:invert(75%);width:20px;margin-bottom:0 src=image/icones/clock-regular.svg>Publié : <?php echo $row['datecreation'];?></p>
<br>
</div>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
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
</body>
</html>