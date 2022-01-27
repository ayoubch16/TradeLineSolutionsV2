<?php include 'db_conn.php';
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Modifier des Clients </title>
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
   ?>
<?php include 'menu.php'?>
<div class="container border rounded border-dark p-3 mb-3">
<?php 
                $sql="SELECT * FROM `clients` where id = $id";
                $result = $cnx->query($sql);
                if ($row = $result->fetch_assoc()) {
                }
    ?>
<form action=editClient.php>
<h1 class=text-center>Information de Client</h1>
<input type=text name=id value=<?php echo $row['id'];?> style=display:none>
<div class=form-row>
<div class="col-md mb-3">
<input type=text class="form-control text-center" placeholder=Nom name=nom value=<?php echo $row['nom'];?>>
</div>
<div class="col-md mb-3">
<input type=text class="form-control text-center" placeholder=Prenom name=prenom value=<?php echo $row['prenom'];?>>
</div>
</div>
<hr>
<div class=form-row>
<div class="col-md mb-3">
<input type=text class="form-control text-center" placeholder=Tele name=tele value=<?php echo $row['tele'];?>>
</div>
<div class="col-md mb-3">
<select class="chosen text-center form-control" id=villeb name=ville>
<?php include 'db_conn.php';
                                        $sql="SELECT * FROM ville";
                                        $result = $cnx->query($sql);
                                        while ($row1 = $result->fetch_assoc()) {?>
<option value=<?php echo $row1['ville']?> <?php if ($row['ville'] ==  $row1['ville']) echo ' selected="selected"'; ?>>
<?php echo $row1['ville']?> </option>
<?php }?>
</select>
</div>
</div>
<hr>
<div class=form-row>
<div class="col-md-12 mb-3">
<textarea class="form-control text-center" name=description id=desc placeholder=description cols=20 rows=6><?php echo $row['description'];?></textarea>
</div>
</div>
<hr>
<button class=btnC type=submit name=envoyer value=envoyer onclick="return confirm('voulez vous confirmer l operation  ?')">Modifier</button>
<input class=btnC type=reset value=Annuler>
</form>
</div>
<?php include 'footer.php'?>
<script src=https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js integrity=sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj crossorigin=anonymous></script>
</body>
</html>