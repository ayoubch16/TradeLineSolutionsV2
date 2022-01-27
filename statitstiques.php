<!DOCTYPE html>
<html>
<head>
<title> Statitstiques</title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet href=css/bootstrap.css>
<link rel=stylesheet href=css/StorageStyle.css>
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css>
<style>.row.content{height:550px}.sidenav{background-color:#f1f1f1;height:100%}p{color:#000}@media screen and (max-width:800px){.row.content{height:auto}}</style>
</head>
<body>
<?php
        session_start();
        if ($_SESSION['login'] == '' && $_SESSION["user"]=='user') {
            header("Location: Account.php");
        }
    ?>
<?php include 'menu.php';
?>
<div class=container-fluid>
<div class="row content">
<div class=col-sm-9>
<div class=row>
<div class=col-sm-8>
<div class=well>
<h1>TLS Immobilier</h1>
<h3>Date d'Aujourd'huit :
<?php  $date = date_create(date('d-m-Y H:i')); echo date_format( $date , 'd-M-Y');?>
</h3>
</div>
</div>
<div class=col-sm-4>
<div class="well bg-secondary text-center">
<h1 class=text-white>Offres Speciales :</h1>
<?php $sqls = "select count(*)  from stockbien where offre='S'   ";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo '<h2 class="text-white">' . $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
</div>
<div class=row>
<div class=col-sm-4>
<div class="well badge-secondary text-center">
<h2>Totale des Biens :
<?php $sqls = "select count(*)  from stockbien ";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo  $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
<div class=col-sm-4>
<div class="well badge-secondary text-center">
<h2> Biens Disponible :
<?php $sqls = "select count(*)  from stockbien where dispo <> 'Vendu' ";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo  $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
<div class=col-sm-4>
<div class="well well badge-secondary text-center">
<h2> Biens Vendu :
<?php $sqls = "select count(*)  from stockbien where dispo='Vendu'";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo  $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
</div>
<div class=row>
<div class=col-sm-3>
<div class="well badge-secondary text-center">
<h2>Demandes:
<?php $sqls = "select count(*)  from demandes ";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo  $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
<div class=col-sm-3>
<div class="well badge-secondary text-center">
<h2> En cours :
<?php $sqls = "select count(*)  from demandes where etatdemande = 'En cours' ";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo  $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
<div class=col-sm-3>
<div class="well well badge-secondary text-center">
<h2> Traité :
<?php $sqls = "select count(*)  from demandes where etatdemande='Traité'";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo  $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
<div class=col-sm-3>
<div class="well well badge-secondary text-center">
<h2> Annulée :
<?php $sqls = "select count(*)  from demandes where etatdemande='Annulée'";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo  $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
</div>
<div class=row>
<div class=col-sm-4>
<div class="well text-center">
<h1> Appartement </h1>
<?php $sqls = "select count(*)  from stockbien where typeb='Appartement'";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo '<h2>' . $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
<div class=col-sm-4>
<div class="well text-center">
<h1>Villa</h1>
<?php $sqls = "select count(*)  from stockbien where typeb='Villa'";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo '<h2>' . $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
<div class=col-sm-4>
<div class="well text-center">
<h1>Maison</h1>
<?php $sqls = "select count(*)  from stockbien where typeb='Maison'";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo '<h2>' . $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
</div>
<div class=row>
<div class=col-sm-4>
<div class="well text-center">
<h1>Chalet</h1>
<?php $sqls = "select count(*)  from stockbien where typeb='Chalet'";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo '<h2>' . $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
<div class=col-sm-4>
<div class="well text-center">
<h1>Studio</h1>
<?php $sqls = "select count(*)  from stockbien where typeb='Studio'";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo '<h2>' . $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
<div class=col-sm-4>
<div class="well text-center">
<h1>Duplex</h1>
<?php $sqls = "select count(*)  from stockbien where typeb='Duplex'";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo '<h2>' . $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
</div>
<div class=row>
<div class=col-sm-4>
<div class="well text-center">
<h1>Riad</h1>
<?php $sqls = "select count(*)  from stockbien where typeb='Riad'";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo '<h2>' . $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
<div class=col-sm-4>
<div class="well text-center">
<h1> Ferme </h1>
<?php $sqls = "select count(*)  from stockbien where typeb='Ferme Agricole'";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo '<h2>' . $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
<div class=col-sm-4>
<div class="well text-center">
<h1>Terrain </h1>
<?php $sqls = "select count(*)  from stockbien where typeb='Terrain/Construction'";
                $result = $cnx->query($sqls);
                while ($row = $result->fetch_assoc()) {
                    echo '<h2>' . $row['count(*)'] . '</h2> '; } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>