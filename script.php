<?php include 'db_conn.php';
$n = $_GET['nature'];
$v = $_GET['ville'];
$t = $_GET['typeb'];
$page=$_GET['page'];
$limit=" LIMIT 9 ";
if($page==1){$limit=" LIMIT 12";}
if($page==2){$limit=" LIMIT 12 OFFSET 12";}
if($page==3){$limit=" LIMIT 12 OFFSET 24";}
if($page==4){$limit=" LIMIT 12 OFFSET 36";}
if($page==5){$limit=" LIMIT 1000 OFFSET 48";}
//$sql1=empty($sql1) ? "  SELECT * FROM `stockbien` where  `etatdel`='ND'  " : "  $sql1  ";
$sql1="SELECT * FROM `stockbien` where  `etatdel`='ND' ".$limit;
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Liste Des Biens </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/StorageStyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <meta name="description" content="Que vous soyez particulier, professionnel ou personne morale, Nous vous proposons un accompagnement à l’achat, la vente, la gestion locative, et le conseil bancaire et technique immobilier (financement bancaire, construction, ...)">
     <meta name="keywords" content="immobilier,immobilier au maroc ,appartement,maroc,villa maroc">
     <meta name="keywords" content="maison marocaine , immobilier maroc , appartement maroc , logement">
     <meta name="keywords" content="temara,rabat,agdal,skhirat,sale">
     <meta name="Robots" content="All">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" href="icon.ico" type="image/ico" sizes="16x16"> 
    <title>Listes</title>
        <style>
        .btnC1 {
                border: 2px solid #fff;
                background-color: #fff;
                border-radius: 10px;
                padding: 10px;
                color: #EE7166;
            }

            .btnC1 a {
                text-decoration: none;
                color: #EE7166;
            }
            
            .btnC1:hover,
            .btnC1 a:hover {
                background: linear-gradient(90deg, rgba(245,170,163,1) 0%, rgba(238,113,102,1) 5%, rgba(238,113,102,1) 95%, rgba(245,170,163,1) 100%);
                color: #fff;
             }
        /* The animation code */
        @keyframes example {
                        0%   {color: #EE7166; transform: translateX(-5%);}
                        25%  {color: #000; transform: translateX(5%);}
                        50%  {color: #000; transform: translateX(-5%);}
                        100% {color: #EE7166; transform: translateX(5%);}
                          }
        /* The element to apply the animation to */
        .prix {
        transform: translateX(5%);
        font-weight: bold;
        color: #EE7166;
        
        animation-name: example;
        animation-duration: 3s;
        
        } 
        
         @media only screen and (max-width: 600px) {
        .col h3 ,.col h1 ,.col p {
            font-size: 15px;
        }

        }
    </style>
</head>

<body class="bg-white">
    <?php
    session_start();
    ?>
    <?php include 'menu.php'; ?>
    <?php 

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
                      $sql1 = "SELECT * FROM `stockbien` where $typeb  $ville   $nature ( `nbrCham` between 0 and $NbrCham)  and (`nbrSalBain` between 0 and $NbrSalB )  and (`prixb` between $MinPrix  and $MaxPrix)  and `etatdel`='ND' ";    
                    } 
    ?>
<h1 class="title pt-5" class="text-center mt-lg-5">Statistique</h1>
        <div class="stati">
        <div class=" row align-items-start">
                <div class="col text-center ">
                    <h3>VILLA</h3>
                    <?php $sqls = "select count(*),MAX(`datecreation`)  from stockbien where typeb='Villa' and `etatdel`='ND'";
                    $result = $cnx->query($sqls);
                    while ($row = $result->fetch_assoc()) {
                        echo '<h1>' . $row['count(*)'] . '</h1> ';
                        echo '<p>'.$row["MAX(`datecreation`)"].'</p>';
                    } ?>
                </div>

                <div class="col text-center ">
                    <h3>Appartement</h3>
                    <?php $sqls = " select count(*),MAX(`datecreation`)  from stockbien where typeb='Appartement' and `etatdel`='ND' ";
                    $result = $cnx->query($sqls);
                    while ($row = $result->fetch_assoc()) {
                        echo '<h1>' . $row['count(*)'] . '</h1> ';
                        echo '<p>'.$row["MAX(`datecreation`)"].'</p>';
                    } ?>
                </div>

                <div class="col text-center ">
                    <h3>Maison</h3>
                    <?php $sqls = " select count(*),MAX(`datecreation`)  from stockbien where typeb='Maison' and `etatdel`='ND' ";
                    $result = $cnx->query($sqls);
                    while ($row = $result->fetch_assoc()) {
                        echo '<h1>' . $row['count(*)'] . '</h1> ';
                        echo '<p>'.$row["MAX(`datecreation`)"].'</p>';
                    } ?>
                </div>

                <div class="col text-center ">
                    <h3>Terrain</h3>
                    <?php $sqls = " select count(*),MAX(`datecreation`)  from stockbien where  `etatdel`='ND'  and ( `typeb`='Terrain/Construction' or `typeb`='Ferme Agricole' ) ";
                    $result = $cnx->query($sqls);
                    while ($row = $result->fetch_assoc()) {
                        echo '<h1>' . $row['count(*)'] . '</h1> ';
                        echo '<p>'.$row["MAX(`datecreation`)"].'</p>';
                    } ?>
                </div>

                <div class="col text-center ">
                    <h3>Studio</h3>
                    <?php $sqls = " select count(*),MAX(`datecreation`)  from stockbien where typeb='Studio' and `etatdel`='ND' ";
                    $result = $cnx->query($sqls);
                    while ($row = $result->fetch_assoc()) {
                        echo '<h1>' . $row['count(*)'] . '</h1> ';
                        echo '<p>'.$row["MAX(`datecreation`)"].'</p>';
                    } ?>
                </div>

            
            </div>
            <div class="my-2" style="height: 2px; background-color: #fff;"></div>
       <h3 class="text-center my-2" style="color:#fff;font-weight: bold;font-family: ' Montserrat', sans-serif;" ><img class="mr-2" style="filter: brightness(0) invert(1); width: 30px;margin-bottom: 0;" src="image/icones/search-solid.svg" > Votre bien immobilier en un clic !  </h3>
      
            <form class="container my-2" method="GET" >
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <select name="typeb" class="form-control text-center">
                            <option value="" disabled selected hidden>Nature du bien...</option>
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
                        <select name="nature" class="form-control text-center">
                            <option value="" disabled selected hidden>Type de service ..</option>
                            <option>Vente</option>
                            <option>Location</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <select class="form-control text-center" name="ville">
                            <option value="" disabled selected hidden>Ville...</option>
                            <?php 
                                            $sql="SELECT * FROM ville order by ville asc";
                                            $result = $cnx->query($sql);
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                            <option value="<?php echo $row['ville']?>"><?php echo $row['ville']?></option>

                            <?php }?>
                        </select>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <input type="number" name="NbrCham" class="form-control text-center" id="pays"
                            placeholder="Nombre de chambre">
                    </div>

                    <div class="col-md-3 mb-3">
                        <input type="number" name="NbrSaB" class="form-control text-center" id="cp"
                            placeholder="Nombre de salle de bain">
                    </div>

                    <div class="col-md-3 mb-3">
                        <input type="number" name="MinPrix" class="form-control text-center" id="pays"
                            placeholder="Prix min">
                    </div>

                    <div class="col-md-3 mb-3">
                        <input type="number" name="MaxPrix" class="form-control text-center" id="cp" placeholder="Prix max">
                    </div>

                </div>

                <div class="row align-items-center">
                    <input class="btnC1 p-3" type="submit" name="chercher" value="CHERCHER" />
                </div>
            </form>
    </div>
   
    <!-- Classement -->
      <div class="container d-flex justify-content-center mt-50 mb-50">
           <div class="text-right   my-5" style="min-width: 600px;">
            <select class="col-3 ">
                <option disabled selected hidden>Trier Par...</option>
                <option onclick="dateb()" selected>Date</option>
                <option onclick="typeb()" >Type</option>
                <option onclick="cham()">Nombre de Chambres</option>
                <option onclick="prixb()">Prix </option>
                <option onclick="superf()">Taille du bien</option>
                <option onclick="villeb()">Ville</option>
            </select>
        </div>
      </div>
   
    
     <!-- Liste des Biens -->
    <div class="container d-flex justify-content-center mt-50 mb-50">  
        <div id="prod" class="row align-items-sm-start">
            <div id="demo" class="row testWrapper align-items-sm-start">
                <?php 
                    //$sql1="SELECT * FROM `stockbien`";
                    $result1 = $cnx->query($sql1);
                   
                    while ($row = $result1->fetch_assoc()) { 
                     $txt1 = 'MAD';
                                if (strcmp($row['natureb'], 'Location Mensuelle')  == 0) {
                                    $txt1 = 'MAD/mois';
                                } 
                                if(strcmp($row['natureb'], 'Location Journaliere')  == 0) {
                                    $txt1 = 'MAD/jour';
                                } 
                          
                          $txt5="";
                          if (strcmp($row['typeprix'], 'PI')  == 0) {
                                  $txt5 = ' À partir de  ';
                          } 
                          $txt6="";
                          if (strcmp($row['prixParm'], 'PPM')  == 0) {
                            $txt6 = ' / m² ';
                           }   
                    ?>
                <div class="divste test" data-id-group="<?php echo $row['id'];?>"
                    data-cat-group="<?php echo $row['typeb'];?>" data-type-group="<?php echo $row['typeb'];?>"
                    data-date-group="<?php echo $row['datecreation'];?>"
                    data-chambre-group="<?php echo $row['nbrCham'];?>" data-prix-group="<?php echo $row['prixb'];?>"
                    data-superficier-group="<?php echo $row['superficier'];?>"
                    data-ville-group="<?php echo $row['adressV'];?>">
                    <!--**********************************************-->
                    <div class="bien col-md-4 mt-2 " >
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="card-img-actions">
                                    <div class="dis1">
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
                                        <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row['img1']); ?>"
                                            style="width: 300px;height: 300px;" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body bg-light ">
                                <div class="row">
                                    <div class="col">
                                        <h3 class=" mb-2 text-left"><?php echo $row["typeb"]; ?></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-left">
                                            <?php if($row['typeb'] !='Terrain/Construction' and $row['typeb'] !='Ferme Agricole'){ ?>
                                            <img class="mr-2" style=" width: 20px;margin-bottom: 4px;"
                                                src="image/icones/couch-solid.svg"><?php echo $row["nbrCham"]; ?>
                                            <img class="mr-2" style=" width: 15px;margin-bottom: 4px;"
                                                src="image/icones/bath-solid.svg"><?php echo $row["nbrSalBain"]; ?> <br>
                                            <?php } ?>
                                            <img class="mr-2" style=" width: 17px;margin-bottom: 4px;"
                                                src="image/icones/carre.png"><?php echo $row["superficier"]; ?> m²
                                        </h6>
                                    </div>
                                    <div class="col">
                                        <h6 class=" mb-2 text-right"><img style=" width: 18px;margin-bottom: 4px;"
                                                src="image/icones/location.png">
                                            <?php echo $row["adressQ"]; ?><br> <?php echo $row["adressV"]; ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="mb-4 text-right  prix"><?php echo $txt5.''.number_format($row["prixb"], 0, "", " ") . ' ' . $txt1.''.$txt6; ?></h4>
                                    </div>
                                </div>
                                <?php if($_SESSION["id"] != null){ ?>
                                <a class="btnC" href="Modifier1.php?idbien=<?php echo $row["id"]; ?>">Modifier</a>
                                <?php if ($_SESSION['user'] == 'admin') { ?>
                                <a class="btnC" onclick="return confirm('voulez vous confirmer l operation  ?');"
                                    href="delete.php?idbien=<?php echo $row["id"]; ?>">Supprimer</a>
                                <?php } ?>
                                <?php  } ?>
                                <hr>
                                <p class="text-left text-secondary"><img class="mr-1"
                                        style="filter: invert(75%); width: 20px;margin-bottom: 0;"
                                        src="image/icones/clock-regular.svg">Publié : <?php echo $row['datecreation'];?>
                                </p>
                                <br>
                            </div>
                        </div>
                    </div>
                    <!--**********************************************-->
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Pagination -->
    <div class="col-6 page-btn mt-5 text-left container my-2">
        <span><a href="script.php?page=1">1</a></span>
        <span><a href="script.php?page=2">2</a></span>
        <span><a href="script.php?page=3">3</a></span>
        <span><a href="script.php?page=4">4</a></span>
        <span><a href="script.php?page=5">&#8594;</a></span>
    </div>

    <script>
                //****************************** type ************************* */
                var type = document.querySelectorAll("[data-type-group]");
                var Listetype = Array.from(type);
                // var Listetype = Listetype.slice(1,12);

                // let sortedtype=sortedtype.slice(1,12);
                let sortedtype = Listetype.sort(sortertype);


                function sortertype(a, b) {
                    if (a.dataset.typeGroup < b.dataset.typeGroup) return -1;
                    if (a.dataset.typeGroup > b.dataset.typeGroup) return 1;
                    return 0;
                }

                function typeb() {
                    sortedtype.forEach(e => document.querySelector("#demo").appendChild(e));
                    console.log(sortedtype);

                }
                // parte of array is ===> slice(1,6);

                //****************************** date ************************* */
                var date = document.querySelectorAll("[data-date-group]");
                var Listedate = Array.from(date);
                let sorteddate = Listedate.sort(sorterdate);

                function sorterdate(a, b) {

                    if (new Date(a.dataset.dateGroup) < new Date(b.dataset.dateGroup)) return 1;
                    if (new Date(a.dataset.dateGroup) > new Date(b.dataset.dateGroup)) return -1;
                    return 0;
                }

                function dateb() {
                    sorteddate.forEach(e => document.querySelector("#demo").appendChild(e));
                    console.log(sorteddate);
                }
                //****************************** chambre ************************* */
                var chambre = document.querySelectorAll("[data-chambre-group]");
                var Listechambre = Array.from(chambre);
                let sortedchambre = Listechambre.sort(sorterchambre);

                function sorterchambre(a, b) {

                    if (Number(a.dataset.chambreGroup) < Number(b.dataset.chambreGroup)) return 1;
                    if (Number(a.dataset.chambreGroup) > Number(b.dataset.chambreGroup)) return -1;
                    return 0;
                }

                function cham() {
                    sortedchambre.forEach(e => document.querySelector("#demo").appendChild(e));
                    console.log(sortedchambre);

                }
                //****************************** prix **************************/
                var prix = document.querySelectorAll("[data-prix-group]");
                var Listeprix = Array.from(prix);
                let sortedprix = Listeprix.sort(sorterprix);

                function sorterprix(a, b) {
                    if (Number(a.dataset.prixGroup) < Number(b.dataset.prixGroup)) return 1;
                    if (Number(a.dataset.prixGroup) > Number(b.dataset.prixGroup)) return -1;
                    return 0;
                }

                function prixb() {
                    sortedprix.forEach(e => document.querySelector("#demo").appendChild(e));
                    console.log(sortedprix);
                }
                //****************************** superficier ************************* */
                var superficier = document.querySelectorAll("[data-superficier-group]");
                var Listesuperficier = Array.from(superficier);
                let sortedsuperficier = Listesuperficier.sort(sortersuperficier);


                function sortersuperficier(a, b) {
                    if (Number(a.dataset.superficierGroup) < Number(b.dataset.superficierGroup)) return 1;
                    if (Number(a.dataset.superficierGroup) > Number(b.dataset.superficierGroup)) return -1;
                    return 0;
                }

                function superf() {
                    sortedsuperficier.forEach(e => document.querySelector("#demo").appendChild(e));
                    console.log(sortedsuperficier);
                }
                //****************************** ville ************************* */
                var ville = document.querySelectorAll("[data-ville-group]");
                var Listeville = Array.from(ville);
                let sortedville = Listeville.sort(sorterville);

                function sorterville(a, b) {
                    if (a.dataset.villeGroup < b.dataset.villeGroup) return -1;
                    if (a.dataset.villeGroup > b.dataset.villeGroup) return 1;
                    return 0;
                }

                function villeb() {
                    sortedville.forEach(e => document.querySelector("#demo").appendChild(e));
                    console.log(sortedville);
                }
    </script>

<!----- footer-------->
    <?php include 'footer.php'; ?>

</body>

</html>