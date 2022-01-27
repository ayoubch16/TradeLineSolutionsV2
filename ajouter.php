<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Ajouter des Offres </title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<link rel=stylesheet type=text/css href=css/fontawesome-all.css>
<link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel=stylesheet>
<link href=https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css rel=stylesheet />
<link rel=stylesheet type=text/css href=https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<style>.fa{font-family:FontAwesome!important}</style>
</head>
<body>
<?php
    session_start();
    if ($_SESSION['login'] == '') {
        header("Location: Account.php");
    }
    ?>
<?php
   // echo "bien1 <br>";
    if (
        is_uploaded_file($_FILES['my_image1']['tmp_name']) || is_uploaded_file($_FILES['my_image2']['tmp_name'])
        || is_uploaded_file($_FILES['my_image3']['tmp_name'])  || is_uploaded_file($_FILES['my_image4']['tmp_name'])
    ) {
        //echo "bien2 <br>"
    //     echo '<div class="d-flex justify-content-center" style="position: absolute; top: 50%; left: 50%; z-index: 1;">
    //     <div class="spinner-border" role="status">
    //       <span class="sr-only">Loading...</span>
    //     </div>
    //   </div>'
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
        $titreb=$_POST['titreb'];
        $autre = $_POST['autre'];
        $autre = str_replace("'", ' ', $autre);
        $imgData1 = addslashes(file_get_contents($_FILES['my_image1']['tmp_name']));
        $imageProperties = getimageSize($_FILES['my_image1']['tmp_name']);
        $imgData2 = addslashes(file_get_contents($_FILES['my_image2']['tmp_name']));
        $imageProperties2 = getimageSize($_FILES['my_image2']['tmp_name']);
        $imgData3 = addslashes(file_get_contents($_FILES['my_image3']['tmp_name']));
        $imageProperties2 = getimageSize($_FILES['my_image3']['tmp_name']);
        $imgData4 = addslashes(file_get_contents($_FILES['my_image4']['tmp_name']));
        $imageProperties2 = getimageSize($_FILES['my_image4']['tmp_name']);
        $imgData5 = addslashes(file_get_contents($_FILES['my_image5']['tmp_name']));
        $imageProperties2 = getimageSize($_FILES['my_image4']['tmp_name']);
        $imgData6 = addslashes(file_get_contents($_FILES['my_image6']['tmp_name']));
        $imageProperties2 = getimageSize($_FILES['my_image4']['tmp_name']);
        $imgData7 = addslashes(file_get_contents($_FILES['my_image7']['tmp_name']));
        $imgData8 = addslashes(file_get_contents($_FILES['my_image8']['tmp_name']));
        $checkbox1 = $_POST['chkl'] ;
        $iduser=$_SESSION["id"];
        $equipement="";
        $etatdel=$_POST['etatdel'];
        
        $sqlid="SELECT `id`+1 as id FROM `stockbien` ORDER BY `id` DESC LIMIT 1";
        $resultid = $cnx->query($sqlid);
        if ($rowid = $resultid->fetch_assoc()) {
             $ReffId=substr($typeb,0,3).''.$rowid['id'];
        }
        
        for ($i=0; $i<count($checkbox1); $i++)
        $equipement .= "-" . $checkbox1[$i];
       //echo $equipement;

        $sql = "INSERT INTO `stockbien`( `typeb`, `etatb`, `natureb`, `nomp`, `prenomp`, `telep`, `typep`,`nomInter`, `prenomInter`, `teleInter`,
        `adressNum`, `adressQ`, `adressV`, `lienMap`,
         `prixb`,`typeprix`,`prixParm`,`dispo`, `nbrCham`, `nbrSalBain`, `superficier`,`natureRes`,`titreb` ,`img1`,`img2`,`img3`,`img4`,`img5`,`img6`, `img7`,`img8`, 
         `autre`,`equipement`,`datecreation`,`idU`,`etatdel`,`Reff`) 
             VALUES 
              ('$typeb','$etatb','$nature',UPPER('$nomp'),UPPER('$prenomp'),'$telep','$typep',UPPER('$nomInter'),UPPER('$prenomInter'),'$teleInter','$adresN',UPPER('$adresQ'),UPPER('$adresV'),'$lienMap',
              '$prix','$typeprix','$prixparm','$Etat','$nbrcham','$nbrSalBaine','$superficier'
              ,'$natureRes','$titreb','$imgData1','$imgData2','$imgData3','$imgData4','$imgData5','$imgData6','$imgData7','$imgData8','$autre','$equipement', SYSDATE(),'$iduser','$etatdel','$ReffId' ) ";
              // echo $sql;
               if ($cnx->query($sql) === TRUE) {
     
                   echo '<script>alert("le bien a ete ajoute avec succès")</script>';
                 //  header("Location: produits.php");
                    
                 } else {

                     echo'<script>alert("Erreur : vérifier les informations")</script>';  
                 }  
                }
                 ?>
<?php include 'menu.php'; ?>
<div class="mx-3 p-4 text-center">
<form method=POST enctype=multipart/form-data>
<h1 class="title text-center">Informations du Bien</h1>
<div class="row py-2">
<select name=typeb class="selectch text-center col text-center border rounded m-2" required>
<option value disabled selected hidden>Type de bien...</option>
<option>Appartement</option>
<option>Villa</option>
<option>Terrain/Construction </option>
<option>Ferme Agricole</option>
<option>Maison</option>
<option>Chalet</option>
<option>Studio</option>
<option>Duplex</option>
<option>Riad</option>
<option>Local Commercial</option>
</select>
<select name=etatb class="selectch text-center border rounded col m-2" required>
<option value disabled selected hidden>Etat de bien...</option>
<option>Neuf</option>
<option>2 eme main</option>
</select>
<select name=nature class="selectch text-center border rounded col m-2" required>
<option value disabled selected hidden>Nature de service...</option>
<option>Location Journaliere</option>
<option>Location Mensuelle</option>
<option>Vente</option>
</select>
</div>
<div class="row py-2">
<i class="fa fa-bed mx-2" aria-hidden=true></i><input type=number class="text-center border rounded col m-2" name=nbrcham placeholder="Nombre des chambre" />
<i class="fa fa-bath mx-2" aria-hidden=true></i><input type=number class="text-center border rounded col m-2" name=nbrSalBaine placeholder="Salle de bain" />
<input type=number name=superficier class="text-center border rounded col m-2" placeholder=superficie />
<select name=natureRes class="selectch text-center border rounded col m-2" required>
<option disabled selected hidden>Nature de Résidence...</option>
<option>Résidence </option>
<option>Quartier Résidentiel</option>
</select>
</div>
<div class="row py-2">
<div class="row col">
<input type=text name=adresNb class="text-center border rounded col" placeholder=adresse />
<input type=text name=adresQb class="text-center border rounded col m-2" placeholder=Quartier required/>
<?php include 'ListeVilles.php';?>
<input type=text name=lienMap class="text-center border rounded col" placeholder=LienMap />
</div>
</div>
<div class="row py-2">
<input type=number name=prix class="text-center border rounded col m-2" placeholder=Prix required/>
<div class="border col px-2">
Prix initial: <input type=radio name=typeprix value=PI required>
Prix final : <input type=radio name=typeprix value=PF required>
</div>
<div class="border col px-2">
Prix Totale: <input type=radio name=prixparm value=PT required>
Prix Par Metre : <input type=radio name=prixparm value=PPM required>
</div>
</div>
<div class="row py-2">
<select name=Etat class="selectch text-center border rounded col m-2" required>
<option>Disponible</option>
<option>Vendu</option>
<option>Réservé</option>
</select>
<div class="border col">
Titre foncier:
oui <input type=radio name=titreb value=oui required>
non <input type=radio name=titreb value=non required>
</div>
<div class="border col">
Visibility du bien :
Public : <input type=radio name=etatdel value=ND checked required>
Privée : <input type=radio name=etatdel value=P required>
</div>
</div>
<h2 class="title text-center">Informations du propriétaire </h2>
<div class="row py-2">
<input type=text name=nomp class="text-center border rounded col m-2" placeholder=Nom required/>
<input type=text name=prenomp class="text-center border rounded col m-2" placeholder=Prenom required/>
<input type=tel name=telep class="text-center border rounded col m-2" placeholder=Tele required pattern=[0-9]{10} />
<select name=typep class="selectch text-center border rounded col m-2" required>
<option value disabled selected hidden>Categorie...</option>
<option>Promotteur Immobilier</option>
<option>Particulier</option>
</select>
</div>
<h4 class="title text-center">Informations de l'intermédiaire </h4>
<div class=row>
<input type=text name=nomInter class="text-center border rounded col m-2" placeholder=Nom />
<input type=text name=prenomInter class="text-center border rounded col m-2" placeholder=Prenom />
<input type=tel name=teleInter class="text-center border rounded col m-2" placeholder=Tele pattern=[0-9]{10} />
</div>
<div class="p-3 my-2">
<h2 class="title text-center">Images</h2>
<div class=row>
<input type=file class="selectch border rounded col mx-2" name=my_image1 required/>
<input type=file class="selectch border rounded col mx-2" name=my_image2 required/>
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
<textarea class=col name=autre></textarea>
</div>
<div class="p-3 my-2">
<h2 class="title text-center">Equipements</h2>
<div class=row>
<span>Ascenseur <input type=checkbox value=ascenseur name="chkl[ ]"></span>
<span>Résidence sécurisée <input type=checkbox value=securite name="chkl[ ]"></span>
<span>Garage <input type=checkbox value=garage name="chkl[ ]"></span>
<span>Jardin <input type=checkbox value=jardin name="chkl[ ]"></span>
<span>Parking <input type=checkbox value=parking name="chkl[ ]"></span>
<span>Climatisation <input type=checkbox value=climatisation name="chkl[ ]"></span>
</div>
</div>
<div class="p-3 my-2">
<div class=row>
<button type=submit class="btnC col-2 mx-4" name=ajouter onclick="return confirm('voulez vous confirmer l operation  ?')">Ajouter</button>
<button type=reset class="btnC col-2 mx-4">Annuler</button>
</div>
</div>
</form>
</div>
<script src=https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js integrity=sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj crossorigin=anonymous></script>
</body>
</html>