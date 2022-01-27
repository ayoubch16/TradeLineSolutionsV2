<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Liste des Clients </title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<style>table{margin:auto;margin-bottom:50px}table,td,th{border:1px solid black;text-align:center;padding:0!important}.btnW{border:2px solid #25d366;background-color:#25d366;border-radius:10px;padding:10px;color:#fff}.btnW a{text-decoration:none;color:#fff}.btnW:hover,.btnW a:hover{background-color:#fff;color:#25d366}</style>
</head>
<body class=bg-white>
<?php
    session_start();
   ?>
<?php include 'menu.php'?>
<div class="container text-center">
<div class="text-right m-3"><input type=text id=search></div>
<table>
<thead>
<tr>
<th>Date</th>
<th>Nom</th>
<th>Prenom</th>
<th>Ville</th>
<th>Tel</th>
<th>Commentaire</th>
<th></th>
<th>Whatsapp</th>
</tr>
</thead>
<tbody id=client_table>
<?php 
                $sql="SELECT * FROM `clients`";
                $result = $cnx->query($sql);
                while ($row = $result->fetch_assoc()) {
          ?>
<tr>
<td><?php echo $row['date'] ;?></td>
<td><?php echo $row['nom'] ;?></td>
<td><?php echo $row['prenom'] ;?></td>
<td><?php echo $row['ville'] ;?></td>
<td><?php echo $row['tele'] ;?></td>
<td><?php echo $row['description'] ;?></td>
<td class=p-3>
<a class="btnC m-1" href="modifierclient.php?id=<?php echo $row['id'];?>">Modifier</a>
</td>
<td>
<a class="btnW m-2" target=blank href="whatsapp.php?tele=<?php echo $row['tele'];?>">Whatsapp</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<script>$(document).ready(function(){$("#search").on("keyup",function(){var a=$(this).val().toLowerCase();$("#client_table tr").filter(function(){$(this).toggle($(this).text().toLocaleLowerCase().indexOf(a)>-1)})})});</script>
<?php include 'footer.php'?>
<script src=https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js integrity=sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj crossorigin=anonymous></script>
</body>
</html>