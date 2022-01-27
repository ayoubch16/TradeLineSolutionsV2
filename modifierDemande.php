<?php include 'db_conn.php';
      $id=$_GET['id'];
      ?>
<!DOCTYPE html>
<html>
<head>
<title>Ajouter des Demandes </title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<script src=https://code.jquery.com/jquery-1.12.4.min.js></script>
<style>input{color:#000}</style>
</head>
<body class=bg-white>
<?php
    session_start();
    if ($_SESSION['login'] == '') {
        header("Location: Account.php");
    }
   ?>
<?php include 'menu.php'?>
<?php  
                    $sql1="SELECT * FROM demandes where numdemande = ".$id;
                    $result = $cnx->query($sql1);
                        if($row=$result->fetch_assoc()){
                        
                        } ?>
<div class="container border rounded border-dark p-3 mb-3">
<form action=editeDem.php method=GET>
<h1 class=text-center>Information de bien</h1>
<div class=form-row>
<div class="col-md-4 mb-3" style=display:none>
<input type=number class="form-control text-center" id=super placeholder=Superficie name=numdemande value=<?php echo $row['numdemande'];?>>
</div>
<div class="col-md mb-3">
<select name=Resp class=form-control id=typeb>
<?php $sql="SELECT * FROM `usertls1`";
                                $result=$cnx->query($sql);
                                while($row1=$result->fetch_assoc()){?>
<option value=<?php echo $row1['nom'].' '.$row1['prenom'] ;?> <?php if ($row1['nom'].' '.$row1['prenom'] ==  $row['nom'].' '.$row['prenom']) echo ' selected="selected"'; ?>>
<?php echo $row1['nom']?> <?php echo $row1['prenom']?> </option>
<?php } ?>
</select>
</div>
<div class="col-md mb-3">
<select name=typeb class=form-control id=typeb required>
<option value=Appartement <?php if ($row['typeb'] == 'Appartement') echo ' selected="selected"'; ?>>Appartement
</option>
<option value=Villa <?php if ($row['typeb'] == 'Villa') echo ' selected="selected"'; ?>>Villa
</option>
<option value=Terrain/Construction <?php if ($row['typeb'] == 'Terrain/Construction') echo ' selected="selected"'; ?>>
Terrain/Construction</option>
<option value="Ferme Agricole" <?php if ($row['typeb'] == 'Ferme Agricole') echo ' selected="selected"'; ?>>Ferme Agricole
</option>
<option value=Maison <?php if ($row['typeb'] == 'Maison') echo ' selected="selected"'; ?>>
Maison
</option>
<option value=Chalet <?php if ($row['typeb'] == 'Chalet') echo ' selected="selected"'; ?>>
Chalet
</option>
<option value=Studio <?php if ($row['typeb'] == 'Studio') echo ' selected="selected"'; ?>>
Studio
</option>
<option value=Duplex <?php if ($row['typeb'] == 'Duplex') echo ' selected="selected"'; ?>>
Duplex
</option>
<option value=Riad <?php if ($row['typeb'] == 'Riad') echo ' selected="selected"'; ?>>Riad
</option>
</select>
</div>
<div class="col-md-3 mb-3">
<select id=choix name=nature id=nature class=form-control>
<option value=Location <?php if ($row['nature'] == 'Location') echo ' selected="selected"'; ?>>
Location</option>
<option value=achat <?php if ($row['nature'] == 'achat') echo ' selected="selected"'; ?>>Achat
</option>
</select>
</div>
<div class="col-md-3 location achat msg">
<select name=meuble class=form-control id=meuble>
<option value="non meublé" <?php if ($row['meuble'] == 'non meublé') echo ' selected="selected"'; ?>>
non meublé</option>
<option value=meublé <?php if ($row['meuble'] == 'meublé') echo ' selected="selected"'; ?>>
meublé
</option>
</select>
</div>
<div class="col-md-3 mb-3 location msg">
<select name=duree class=form-control id=duree required>
<option value="Longue durée" <?php if ($row['duree'] == 'Longue durée') echo ' selected="selected"'; ?>>
Longue durée</option>
<option value="Courte durée" <?php if ($row['duree'] == 'Courte durée') echo ' selected="selected"'; ?>>
Courte durée</option>
</select>
</div>
</div>
<div class=form-row>
<div class="col-md-4 mb-3">
<input type=number class="form-control text-center" id=nbrc placeholder="Nombre de chambre" name=nbrcham value=<?php echo $row['nbrcham'];?> required>
</div>
<div class="col-md-4 mb-3">
<input type=number class="form-control text-center" id=super placeholder=Superficie name=superficie value=<?php echo $row['superficie'];?>>
</div>
<div class="col-md-4 mb-3">
<select name=natureL class=form-control required>
<option value=Residance <?php if ($row['natureL'] == 'Residance') echo ' selected="selected"'; ?>>
Residance</option>
<option value=Maison <?php if ($row['natureL'] == 'Maison') echo ' selected="selected"'; ?>>
Maison</option>
</select>
</div>
</div>
<div class=form-row>
<div class="col-md-4 mb-3">
<select name=etatdemande class=form-control required>
<option value="En cours" <?php if($row['etatdemande'] == 'En cours') echo ' selected="selected"';?>>En cours</option>
<option value=Traité <?php if($row['etatdemande'] == 'Traité') echo ' selected="selected"';?>>Traité</option>
<option value=Annulée <?php if($row['etatdemande'] == 'Annulée') echo ' selected="selected"';?>>Annulée</option>
<option value=Acquis <?php if($row['etatdemande'] == 'Acquis') echo ' selected="selected"';?>>Acquis</option>
</select>
</div>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=Quartie placeholder=Quartie name=quartie value=<?php echo $row['quartie'];?>>
</div>
<div class="col-md-4 mb-3">
<select class="chosen text-center form-control" id=villeb name=villeb required>
<?php 
                                $sql="SELECT * FROM ville order by ville asc";
                                $result = $cnx->query($sql);
                                        while ($row1 = $result->fetch_assoc()) {
                                ?>
<option value=<?php echo $row1['ville']?> <?php if ($row['villeb'] ==  $row1['ville']) echo ' selected="selected"'; ?>>
<?php echo $row1['ville']?> </option>
<?php }?>
</select>
</div>
</div>
<hr>
<h1 class=text-center>Information Client</h1>
<div class=form-row>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=nom placeholder=nom name=nom value=<?php echo $row['nom'] ;?> required>
</div>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=prenom placeholder=prenom name=prenom value=<?php echo $row['prenom'] ; ;?> required>
</div>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=CIN placeholder=CIN name=cin value=<?php echo $row['cin'] ;?>>
</div>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=tele placeholder=tele name=tele value=<?php echo $row['tele'] ;?> required>
</div>
<div class="col-md-4 mb-3">
<input type=number class="form-control text-center" id=pvachat placeholder="Pouvoir d'Achat" value=<?php echo $row['pvachat'] ;?> name=pvachat>
</div>
<div class="col-md-4 mb-3" style=z-index:1>
<select class="chosen text-center form-control" id=villec name=villec required>
<?php 
                                $sql="SELECT * FROM ville order by ville asc";
                                $result = $cnx->query($sql);
                                        while ($row1 = $result->fetch_assoc()) {
                                ?>
<option value=<?php echo $row1['ville']?> <?php if ($row['villec'] ==  $row1['ville']) echo ' selected="selected"'; ?>>
<?php echo $row1['ville']?> </option>
<?php }?>
</select>
</div>
</div>
<hr>
<h1 class=text-center>Information Intermediare</h1>
<div class=form-row>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=nom placeholder="nom Intermediare" value=<?php echo $row['nomInter'];?> name=nomInter>
</div>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=prenom placeholder="prenom Intermediare" value=<?php echo $row['prenomInter'];?> name=prenomInter>
</div>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=tele placeholder="tele Intermediare" value=<?php echo $row['teleInter'];?> name=teleInter>
</div>
</div>
<hr>
<h1 class=text-center>Description </h1>
<div class=form-row>
<div class="col-md-12 mb-3">
<textarea class="form-control text-center" name=description id=desc placeholder=description cols=20 rows=6><?php echo $row['description'];?></textarea>
</div>
</div>
<hr>
<h1 class=text-center>Equipement</h1>
<br>
<div class=form-row>
<div class="col-md-12 mb-3">
<div class=row>
<span>Ascenseur <input type=checkbox value=ascenseur name="chkl[ ]" <?php  if(stristr($row['equipement'], 'ascenseur')) echo ' checked="checked"';?>></span>
<span>Securite <input type=checkbox value=securite name="chkl[ ]" <?php  if(stristr($row['equipement'], 'securite')) echo ' checked="checked"';?>></span>
<span>Garage <input type=checkbox value=garage name="chkl[ ]" <?php  if(stristr($row['equipement'], 'garage')) echo ' checked="checked"';?>></span>
<span>Jardin <input type=checkbox value=jardin name="chkl[ ]" <?php  if(stristr($row['equipement'], 'jardin')) echo ' checked="checked"';?>></span>
<span>Parking <input type=checkbox value=parking name="chkl[ ]" <?php  if(stristr($row['equipement'], 'parking'))  echo ' checked="checked"';?>></span>
<span>Climatisation <input type=checkbox value=climatisation name="chkl[ ]" <?php  if(stristr($row['equipement'], 'climatisation')) echo ' checked="checked"';?>></span>
</div>
</div>
</div>
<br>
<br>
<button class=btnC type=submit name=envoyer value=envoyer onclick="return confirm('voulez vous confirmer l operation  ?')">Envoyer</button>
<input class=btnC type=reset value=Annuler>
</form>
</div>
<?php include 'footer.php'?>
<script src=https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js integrity=sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj crossorigin=anonymous></script>
</body>
</html>