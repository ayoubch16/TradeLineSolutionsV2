<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Ajouter des Clients </title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<script src=https://code.jquery.com/jquery-1.12.4.min.js></script>
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
    
    $envoyer = $_GET['envoyer'];
    if ($envoyer != null) {
   
       $nom=$_GET['nom'];
       $prenom=$_GET['prenom'];
       $tele=$_GET['tele'];
       $ville=$_GET['ville'];
       $description=$_GET['description'];

         $sql1="INSERT INTO `clients`( `nom`,`prenom`,`tele`,`ville`,`description`,`date`) 
                             VALUES (UPPER('$nom'),UPPER('$prenom'),'$tele',UPPER('$ville'),'$description',SYSDATE())";
           // echo $sql1;
            if ($cnx->query($sql1) === TRUE) {
                echo '<script>alert("Votre demande a été enregistré avec succès");</script>';    
            } else {
                echo 'erreur <br>';
                echo '<script>alert("Votre demande a  n\'est pas enregistré");</script>';
            }
    }
 ?>
<div class="container border rounded border-dark p-3 mb-3">
<form>
<h1 class=text-center>Information de Client</h1>
<div class=form-row>
<div class="col-md mb-3">
<input type=text class="form-control text-center" placeholder=Nom name=nom required>
</div>
<div class="col-md mb-3">
<input type=text class="form-control text-center" placeholder=Prenom name=prenom required>
</div>
</div>
<hr>
<div class=form-row>
<div class="col-md mb-3">
<input type=text class="form-control text-center" placeholder=Tele name=tele required>
</div>
<div class="col-md mb-3">
<select class="chosen text-center form-control" id=villeb name=ville required>
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
<div class=form-row>
<div class="col-md-12 mb-3">
<textarea class="form-control text-center" name=description id=desc placeholder=description cols=20 rows=6></textarea>
</div>
</div>
<hr>
<button class=btnC type=submit name=envoyer value=envoyer onclick="return confirm('voulez vous confirmer l operation  ?')">Envoyer</button>
<input class=btnC type=reset value=Annuler>
</form>
</div>
<?php include 'footer.php'?>
<script src=https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js integrity=sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj crossorigin=anonymous></script>
</body>
</html>