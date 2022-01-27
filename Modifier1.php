<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Modifier Bien </title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel=stylesheet>
<link href=https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css rel=stylesheet />
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
</head>
<body>
<?php
    session_start();
    if ($_SESSION['login'] == '') {
        header("Location: Account.php");
    }
    ?>
<?php
    // echo "bien1 <br>";strcmp($modifier,"hl;")
    $modifier=$_POST['modifier'];
    if( strcmp($modifier,"modifier")==0){
        //echo "bien";
        $txtimg1=" ";$txtimg2=" ";$txtimg3=" ";$txtimg4=" ";$txtimg5=" ";$txtimg6=" ";
        $typeb = $_POST['typeb'];
        $etatb = $_POST['etatb'];
        $nature = $_POST['nature'];
        $nomp = $_POST['nomp'];
        $prenomp = $_POST['prenomp'];
        $telep = $_POST['telep'];
        $typep = $_POST['typep'];
        $nomInter = $_POST['nomInter'];
        $prenomInter = $_POST['prenomInter'];
        $teleInter = $_POST['teleInter'];
        $adresN = $_POST['adresNb'];
        $adresQ = $_POST['adresQb'];
        $adresV = $_POST['adresVb'];
        $lienMap = $_POST['lienMap'];
        $prix = $_POST['prix'];
        $typeprix=$_POST['typeprix'];
        $prixparm=$_POST['prixparm'];
        $Etat = $_POST['Etat'];
        $nbrcham = $_POST['nbrcham'];
        $nbrSalBaine = $_POST['nbrSalBaine'];
        $superficier = $_POST['superficier'];
        $natureRes = $_POST['natureRes'];
        $titreb = $_POST['titreb'];
        $autre = $_POST['autre'];
        $autre = str_replace("'", ' ', $autre);
        $offer = $_POST['offre'];
        $checkbox1 = $_POST['chkl'] ;
        $equipement="";
        
        $imgData1 = addslashes(file_get_contents($_FILES['my_image1']['tmp_name']));
        if( $imgData1 != null ){  $txtimg1=" `img1`='$imgData1' , ";}
       
        $imgData2 = addslashes(file_get_contents($_FILES['my_image2']['tmp_name']));
        if( $imgData2 != null ){  $txtimg2=" `img2`='$imgData2' , ";}

        $imgData3 = addslashes(file_get_contents($_FILES['my_image3']['tmp_name']));
        if( $imgData3 != null ){  $txtimg3=" `img3`='$imgData3' , ";}

        $imgData4 = addslashes(file_get_contents($_FILES['my_image4']['tmp_name']));
        if( $imgData4 != null ){  $txtimg4=" `img4`='$imgData4' , ";}

        $imgData5 = addslashes(file_get_contents($_FILES['my_image5']['tmp_name']));
        if( $imgData5 != null ){  $txtimg5=" `img5`='$imgData5' , ";}

        $imgData6 = addslashes(file_get_contents($_FILES['my_image6']['tmp_name']));
        if( $imgData6 != null ){  $txtimg6=" `img6`='$imgData6' , ";}

        $imgData7 = addslashes(file_get_contents($_FILES['my_image7']['tmp_name']));
        if( $imgData7 != null ){  $txtimg7=" `img7`='$imgData7' , ";}

        $imgData8 = addslashes(file_get_contents($_FILES['my_image8']['tmp_name']));
        if( $imgData8 != null ){  $txtimg8=" `img8`='$imgData8' , ";}
        $imageProperties = getimageSize($_FILES['my_image1']['tmp_name']);
        $iduser=$_SESSION["id"];
        for ($i=0; $i<count($checkbox1); $i++)
        $equipement .= "-" . $checkbox1[$i];
        $etatdel=$_POST['etatdel'];
        $sql=" UPDATE `stockbien` SET  
                      `typeb`='$typeb'  , `etatb`='$etatb' , `natureb`='$nature' , `nomp`='$nomp' , `prenomp`='$prenomp' , `telep`='$telep' , `typep`='$typep' 
                     , `nomInter`='$nomInter' , `prenomInter`='$prenomInter' , `teleInter`='$teleInter' , `adressNum`='$adresN' , `adressQ`='$adresQ' 
                     , `adressV`='$adresV' , `lienMap`='$lienMap' , `prixb`='$prix' ,`typeprix`='$typeprix' ,`prixParm`='$prixparm' , `dispo`='$Etat' , `nbrCham`='$nbrcham' 
                     , `nbrSalBain`='$nbrSalBaine' , `superficier`='$superficier' , `natureRes`='$natureRes' , `titreb`='$titreb' , 
                      ".$txtimg1."  ".$txtimg2."  ".$txtimg3."  ".$txtimg4."  ".$txtimg5."  ".$txtimg6."   `autre`='$autre' 
                     , `equipement`= '$equipement'  , `offre`='$offer' , `idU`='$iduser', `etatdel`='$etatdel'  where id = ".$_GET['idbien'];
                   // echo $sql;
        
        if ($cnx->query($sql) === TRUE) { 
            echo '<script>alert("le bien a ete modifie avec succès")</script>';
        } else {
            echo '<script>alert("Erreur : vérifier les informations")</script>';
        }
    }
    ?>
<?php include 'menu.php'; 
       $sql1="SELECT * FROM stockbien where id =".$_GET['idbien'];
       $result = $cnx->query($sql1);
    if($row=$result->fetch_assoc()){
      
    }
    ?>
<div class="container p-4 text-center">
<form method=POST enctype=multipart/form-data>
<h1 class="title text-center">Informations du Bien</h1>
<div class="row py-2">
<select name=typeb class="selectch text-center col text-center border rounded m-2" required>
<option value=Appartement <?php if ($row['typeb'] == 'Appartement') echo ' selected="selected"'; ?>>Appartement</option>
<option value=Villa <?php if ($row['typeb'] == 'Villa') echo ' selected="selected"'; ?>>Villa
</option>
<option value=Terrain/Construction <?php if ($row['typeb'] == 'Terrain/Construction') echo ' selected="selected"'; ?>>
Terrain/Construction</option>
<option value="Ferme Agricole" <?php if ($row['typeb'] == 'Ferme Agricole') echo ' selected="selected"'; ?>>Ferme Agricole
</option>
<option value=Maison <?php if ($row['typeb'] == 'Maison') echo ' selected="selected"'; ?>>Maison
</option>
<option value=Chalet <?php if ($row['typeb'] == 'Chalet') echo ' selected="selected"'; ?>>Chalet
</option>
<option value=Studio <?php if ($row['typeb'] == 'Studio') echo ' selected="selected"'; ?>>Studio
</option>
<option value=Duplex <?php if ($row['typeb'] == 'Duplex') echo ' selected="selected"'; ?>>Duplex
</option>
<option value=Riad <?php if ($row['typeb'] == 'Riad') echo ' selected="selected"'; ?>>Riad
</option>
<option value="Local Commercial" <?php if ($row['typeb'] == 'Local Commercial') echo ' selected="selected"'; ?>>Locale Commercial
</option>
</select>
<select name=etatb class="selectch text-center border rounded col m-2" required>
<option value=Neuf <?php if ($row['etatb'] == 'Neuf') echo ' selected="selected"'; ?>>Neuf
</option>
<option value="2 eme main" <?php if ($row['etatb'] == '2 eme main') echo ' selected="selected"'; ?>>
2 eme main</option>
</select>
<select name=nature class="selectch text-center border rounded col m-2" required>
<option value="Location Journaliere" <?php if ($row['natureb'] == 'Location Journaliere') echo ' selected="selected"'; ?>>Location Journaliere</option>
<option value="Location Mensuelle" <?php if ($row['natureb'] == 'Location Mensuelle') echo ' selected="selected"'; ?>>Location Mensuelle</option>
<option value=Vente <?php if ($row['natureb'] == 'Vente') echo ' selected="selected"'; ?>>Vente
</option>
</select>
</div>
<div class="row py-2">
<i class="fa fa-bed mx-2" aria-hidden=true></i>
<input type=number class="text-center border rounded col m-2" name=nbrcham placeholder="Nombre des chambre" value=<?php echo $row['nbrCham']; ?> />
<i class="fa fa-bath mx-2" aria-hidden=true></i>
<input type=number class="text-center border rounded col m-2" name=nbrSalBaine placeholder="Salle de bain" value=<?php echo $row['nbrSalBain']; ?> />
<input type=number name=superficier class="text-center border rounded col m-2" required placeholder=Superficier value=<?php echo $row['superficier']; ?> />
<select name=natureRes class="selectch text-center border rounded col m-2">
<option value=Résidence <?php if ($row['natureRes'] == 'Résidence') echo ' selected="selected"'; ?>>Résidence</option>
<option value="Quartier Résidentiel" <?php if ($row['natureRes'] == 'Quartier Résidentiel') echo ' selected="selected"'; ?>>Quartier
Résidentiel</option>
</select>
</div>
<div class="row py-2">
<div class="row col">
<input type=text name=adresNb class="text-center border rounded col" placeholder=adresse value=<?php echo $row['adressNum']; ?> />
<input type=text name=adresQb required class="text-center border rounded col m-2" placeholder=Quartier value=<?php echo $row['adressQ']; ?> />
<select class=chosen name=adresVb>
<?php 
                            $sql1="SELECT * FROM ville order by ville asc";
                            $result1 = $cnx->query($sql1);
                                    while ($row1 = $result1->fetch_assoc()) {
                            ?>
<option value=<?php echo $row1['ville']?> <?php if ($row['adressV'] ==  $row1['ville']) echo ' selected="selected"'; ?>>
<?php echo $row1['ville']?> </option>
<?php }?>
</select>
<input type=text name=lienMap class="text-center border rounded col" placeholder=LienMap value=<?php echo $row['lienMap']; ?> />
</div>
</div>
<div class="row py-2">
<input type=number name=prix class="text-center border rounded col m-2" required placeholder=Prix value=<?php echo $row['prixb']; ?> />
<div class="border p-2">
Prix initial <input type=radio name=typeprix value=PI <?php if ($row['typeprix'] == 'PI') echo ' checked="checked"'; ?> required>
Prix final <input type=radio name=typeprix value=PF <?php if ($row['typeprix'] == 'PF') echo ' checked="checked"'; ?> required>
</div>
<div class="border col px-2">
Prix Totale : <input type=radio name=prixparm value=PT <?php if ($row['prixParm'] == 'PT') echo ' checked="checked"'; ?> required>
Prix Par Metre : <input type=radio name=prixparm value=PPM <?php if ($row['prixParm'] == 'PPM') echo ' checked="checked"'; ?> required>
</div>
</div>
<div class="row py-2">
<select name=Etat class="selectch text-center border rounded col m-2" required>
<option value=Disponible <?php if ($row['Etat'] == 'Disponible') echo ' selected="selected"'; ?>>
Disponible</option>
<option value=Vendu <?php if ($row['Etat'] == 'Vendu') echo ' selected="selected"'; ?>>Vendu
</option>
<option value=Réservé <?php if ($row['Etat'] == 'Réservé') echo ' selected="selected"'; ?>>Réservé
</option>
</select>
<div class="border p-2">
Titre foncier:
oui <input type=radio name=titreb value=oui <?php if ($row['titreb'] == 'oui') echo ' checked="checked"'; ?> required>
non <input type=radio name=titreb value=non <?php if ($row['titreb'] == 'non') echo ' checked="checked"'; ?> required>
</div>
<div class="border col p-2">
Visibility du bien :
Public : <input type=radio name=etatdel value=ND <?php if ($row['etatdel'] == 'ND') echo ' checked="checked"'; ?> required>
Privée : <input type=radio name=etatdel value=P <?php if ($row['etatdel'] == 'P') echo ' checked="checked"'; ?> required>
</div>
</div>
<h2 class="title text-center">Informations du propriétaire </h2>
<div class="row py-2">
<input type=text required name=nomp class="text-center border rounded col m-2" placeholder=Nom value=<?php echo $row['nomp']; ?> />
<input type=text required name=prenomp class="text-center border rounded col m-2" placeholder=Prenom value=<?php echo $row['prenomp']; ?> />
<input type=tel required name=telep class="text-center border rounded col m-2" placeholder=Tele pattern=[0-9]{10} value=<?php echo $row['telep']; ?> />
<select name=typep required class="selectch text-center border rounded col m-2">
<option value="Promotteur Immobilier" <?php if ($row['typep'] == 'Promotteur Immobilier') echo ' selected="selected"'; ?>>Promotteur
Immobilier</option>
<option value=Particulier <?php if ($row['typep'] == 'Particulier') echo ' selected="selected"'; ?>>Particulier</option>
</select>
</div>
<h4 class="title text-center">Informations de l'intermédiaire </h4>
<div class=row>
<input type=text name=nomInter class="text-center border rounded col m-2" placeholder=Nom value=<?php echo $row['nomInter']; ?> />
<input type=text name=prenomInter class="text-center border rounded col m-2" placeholder=Prenom value=<?php echo $row['prenomInter']; ?> />
<input type=tel name=teleInter class="text-center border rounded col m-2" placeholder=Tele pattern=[0-9]{10} value=<?php echo $row['teleInter']; ?> />
</div>
<div class="p-3 my-2">
<h2 class="title text-center">Images</h2>
<div class=row>
<input type=file class="selectch border rounded col mx-2" name=my_image1 />
<input type=file class="selectch border rounded col mx-2" name=my_image2 />
<input type=file class="selectch border rounded col mx-2" name=my_image3 />
<input type=file class="selectch border rounded col mx-2" name=my_image4 />
</div>
<div class=row>
<input type=file class="selectch border rounded col mx-2" name=my_image5 />
<input type=file class="selectch border rounded col mx-2" name=my_image6 />
<input type=file class="selectch border rounded col mx-2" name=my_image7 />
<input type=file class="selectch border rounded col mx-2" name=my_image8 />
</div>
</div>
<div class="p-3 my-2">
<h2 class="title text-center">Description</h2>
<textarea class=col name=autre><?php echo $row['autre']; ?></textarea>
</div>
<div class="p-3 my-2">
<h2 class="title text-center">Offre</h2>
<select name=offre class="selectch text-center border rounded col m-2">
<option value=S <?php if ($row['offre'] == 'S') echo ' selected="selected"'; ?>>spéciale</option>
<option value=NS <?php if ($row['offre'] == 'NS') echo ' selected="selected"'; ?>>non spéciale
</option>
</select>
</div>
<div class="p-3 my-2">
<h2 class="title text-center">Equipements</h2>
<div class=row>
<span>Ascenseur <input type=checkbox value=ascenseur name="chkl[ ]" <?php  if(stristr($row['equipement'], 'ascenseur')) echo ' checked="checked"';?>></span>
<span>Securite <input type=checkbox value=securite name="chkl[ ]" <?php  if(stristr($row['equipement'], 'securite')) echo ' checked="checked"';?>></span>
<span>Garage <input type=checkbox value=garage name="chkl[ ]" <?php  if(stristr($row['equipement'], 'garage')) echo ' checked="checked"';?>></span>
<span>Jardin <input type=checkbox value=jardin name="chkl[ ]" <?php  if(stristr($row['equipement'], 'jardin')) echo ' checked="checked"';?>></span>
<span>Parking <input type=checkbox value=parking name="chkl[ ]" <?php  if(stristr($row['equipement'], 'parking'))  echo ' checked="checked"';?>></span>
<span>Climatisation <input type=checkbox value=climatisation name="chkl[ ]" <?php  if(stristr($row['equipement'], 'climatisation')) echo ' checked="checked"';?>></span>
</div>
</div>
<div class="p-3 my-2">
<div class=row>
<input class="btn-outline-secondary col-2 mx-4 border border-dark" type=submit name=modifier value=modifier onclick="return confirm('voulez vous confirmer l operation ?')">
<button type=reset class="btn-outline-secondary col-2 mx-4 border border-dark">Annuler</button>
</div>
</div>
</form>
</div>
<script src=https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js integrity=sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj crossorigin=anonymous></script>
</body>
</html>