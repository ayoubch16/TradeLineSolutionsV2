<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Gestion Des Utilisateurs </title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<link rel=stylesheet type=text/css href=css/fontawesome-all.css>
<link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel=stylesheet>
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
</head>
<body>
<?php
    session_start();
    if ($_SESSION['login'] == '') {
        header("Location: Account.php");
    }
    ?>
<?php include 'menu.php';
?>
<div class=mx-5>
<table class="table border border-dark rounded">
<thead>
<tr>
<th scope=col>#</th>
<th scope=col>nom</th>
<th scope=col>prenom</th>
<th scope=col>tele</th>
<th scope=col>email</th>
<th scope=col>login</th>
<th scope=col>type</th>
<th scope=col>Etat de compte</th>
<th scope=col></th>
<th scope=col></th>
<th scope=col></th>
</tr>
</thead>
<?php $sql="SELECT * FROM `usertls1` ";
                   $result = $cnx->query($sql);
                   while ($row = $result->fetch_assoc()) {
                   ?>
<tbody>
<tr>
<th scope=row><?php echo $row['id'];?></th>
<td><?php echo $row['nom'];?></td>
<td><?php echo $row['prenom'];?></td>
<td><?php echo $row['tele'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['login'];?></td>
<td><?php echo $row['type'];?></td>
<td><?php 
                      if($row['etat']=='V'){echo "Activer";}
                      if($row['etat']=='NV'){echo "Desactiver";}
                      
                    ?> </td>
<td>
<?php if($row['etat']=='V'){?> <a onclick="return confirm('voulez vous confirmer l operation  ?')" href="activation.php?id='<?php echo $row['id']?>'&num=1">Desactiver</a> <?php }?>
<?php if($row['etat']=='NV'){?> <a onclick="return confirm('voulez vous confirmer l operation  ?')" href="activation.php?id='<?php echo $row['id']?>'&num=2">Activer</a> <?php }?>
</td>
<td><a onclick="return confirm('voulez vous confirmer l operation  ?')" href="remove.php?id=<?php echo $row['id']?>&num=1">reset password</a></td>
<td><a onclick="return confirm('voulez vous confirmer l operation  ?')" href="remove.php?id=<?php echo $row['id']?>&num=2">Supprimer User</a></td>
</tr>
<?php }?>
</tbody>
</table>
</div>
</body>
</html>