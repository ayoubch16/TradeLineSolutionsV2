<?php include 'db_conn.php'; ?>
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
<script type=text/javascript>$(document).ready(function(){$("#choix").change(function(){$(this).find("option:selected").each(function(){var a=$(this).attr("value");if(a){$(".msg").not("."+a).hide();$("."+a).show()}else{$(".msg").hide()}})}).change()});</script>
</head>
<body>
<?php
    session_start();
   ?>
<?php include 'menu.php'?>
<?php 
    
   
 ?>
<div class="container border rounded border-dark p-3 mb-3">
<form action=message.php>
<h1 class=text-center>Information de bien</h1>
<div class=form-row>
<?php if($_SESSION["id"] != null){?>
<div class="col-md mb-3">
<select name=Resp class=form-control id=typeb>
<option value disabled selected hidden>chargé de relation...</option>
<?php $sql="SELECT * FROM `usertls1`";
                            $result=$cnx->query($sql);
                            while($row=$result->fetch_assoc()){?>
<option><?php echo $row['nom'].' '.$row['prenom'] ;?></option>
<?php } ?>
</select>
</div>
<?php } ?>
<div class="col-md mb-3">
<select name=typeb class=form-control id=typeb required>
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
<option>Locale Commercial</option>
</select>
</div>
<div class="col-md-3 mb-3">
<select id=choix name=nature id=nature class=form-control>
<option value disabled selected hidden>Nature de service...</option>
<option value=location>Location</option>
<option value=achat>Achat</option>
</select>
</div>
<div class="col-md-3 location achat msg">
<select name=meuble class=form-control id=meuble>
<option selected>non meublé</option>
<option>meublé</option>
</select>
</div>
<div class="col-md-3 mb-3 location msg">
<select name=duree class=form-control id=duree required>
<option selected>Longue durée</option>
<option>Courte durée</option>
</select>
</div>
</div>
<div class=form-row>
<div class="col-md-4 mb-3">
<input type=number class="form-control text-center" id=nbrc placeholder="Nombre de chambre" name=nbrcham required>
</div>
<div class="col-md-4 mb-3">
<input type=number class="form-control text-center" id=super placeholder=Superficie name=superficie>
</div>
<div class="col-md-4 mb-3">
<select name=natureL class=form-control required>
<option value disabled selected hidden>Nature Logement...</option>
<option>Residance</option>
<option>Maison</option>
<option>Autre</option>
</select>
</div>
</div>
<div class=form-row>
<div class="col-md-4 mb-3">
<select name=etatdemande class=form-control required>
<option value disabled selected hidden>Etat Demande...</option>
<option>En cours</option>
<option>Traité</option>
<option>Annulée</option>
<option>Acquis</option>
</select>
</div>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=Quartie placeholder=Quartie name=quartie>
</div>
<div class="col-md-4 mb-3">
<select class="chosen text-center form-control" id=villeb name=villeb required>
<?php include 'db_conn.php';
                                $sql="SELECT * FROM ville";
                                $result = $cnx->query($sql);
                                while ($row = $result->fetch_assoc()) {?>
<option value=<?php echo $row['ville']?>><?php echo $row['ville']?></option>
<?php }?>
</select>
</div>
</div>
<hr>
<h1 class=text-center>Informtion Client</h1>
<div class=form-row>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=nom placeholder=nom name=nom value=<?php echo $nom ;?> required>
</div>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=prenom placeholder=prenom name=prenom value=<?php echo $prenom ;?> required>
</div>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=CIN placeholder=CIN name=cin>
</div>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=tele placeholder=tele name=tele value=<?php echo $tele ;?> required>
</div>
<div class="col-md-4 mb-3">
<input type=number class="form-control text-center" id=pvachat placeholder="Pouvoir d'Achat" name=pvachat>
</div>
<div class="col-md-4 mb-3" style=z-index:1>
<select class="chosen text-center form-control" id=villec name=villec required>
<?php include 'db_conn.php';
                                $sql="SELECT * FROM ville";
                                $result = $cnx->query($sql);
                                while ($row = $result->fetch_assoc()) {?>
<option value=<?php echo $row['ville']?>><?php echo $row['ville']?></option>
<?php }?>
</select>
<script>$(".chosen").chosen();$(".chosen").css({width:"inherit",height:"inherit"});</script>
</div>
</div>
<hr>
<?php if($_SESSION["id"] != null){?>
<h1 class=text-center>Informtion Intermediare</h1>
<div class=form-row>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=nom placeholder="nom Intermediare" name=nomInter>
</div>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=prenom placeholder="prenom Intermediare" name=prenomInter>
</div>
<div class="col-md-4 mb-3">
<input type=text class="form-control text-center" id=tele placeholder="tele Intermediare" name=teleInter>
</div>
</div>
<hr>
<?php } ?>
<h1 class=text-center>Description </h1>
<div class=form-row>
<div class="col-md-12 mb-3">
<textarea class="form-control text-center" name=description id=desc placeholder=description cols=20 rows=6></textarea>
</div>
</div>
<hr>
<h1 class=text-center>Equipement</h1>
<br>
<div class=form-row>
<div class="col-md-12 mb-3">
<div class=row>
<span>Ascenseur <input type=checkbox value=ascenseur name="chkl[ ]"></span>
<span>Résidence sécurisée <input type=checkbox value=securite name="chkl[ ]"></span>
<span>Garage <input type=checkbox value=garage name="chkl[ ]"></span>
<span>Jardin <input type=checkbox value=jardin name="chkl[ ]"></span>
<span>Parking <input type=checkbox value=parking name="chkl[ ]"></span>
<span>Climatisation <input type=checkbox value=climatisation name="chkl[ ]"></span>
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
<script>(function(){window.addEventListener("load",function(){let forms=document.getElementsByClassName("needs-validation");let validation=Array.prototype.filter.call(forms,function(a){a.addEventListener("submit",function(b){if(a.checkValidity()===false){b.preventDefault();b.stopPropagation()}a.classList.add("was-validated")},false)})},false)})();</script>
<script src=https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js integrity=sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj crossorigin=anonymous></script>
</body>
</html>