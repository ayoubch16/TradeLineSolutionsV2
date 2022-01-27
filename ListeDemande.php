<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Liste Demandes</title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<link rel=stylesheet type=text/css href=https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css />
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<style>table,td,th{border:1px solid black;text-align:center;padding:0!important}.inter,.cin,.dispo,.bien{display:none}</style>
</head>
<body>
<?php
    session_start();
    if ($_SESSION['login'] == '') {
        header("Location: Account.php");
    }
    ?>
<?php include 'menu.php';  ?>
<div class="container bg-light rounded col p-5 row">
<b class=col-3>Afficher :</b>
<div class=col>
<input id=btncin type=checkbox> cin <br>
<input id=btndispo type=checkbox> Chargé de relation
</div>
<div class=col>
<input id=btnInter type=checkbox> Information Intermediare <br>
<input id=btnbien type=checkbox> Information Bien
</div>
</div>
<div class="mx-2 my-5">
<div id=content>
<table id=table1>
<thead>
<tr>
<th>Date </th>
<th class=dispo>chargé de relation</th>
<th class=dispo>Etat demande</th>
<th class=cin>Cin</th>
<th>Nom</th>
<th>Prenom</th>
<th>Tele</th>
<th>Pouvoir d'achat</th>
<th class=bien>Type du bien</th>
<th class=bien>Nature du service</th>
<th class=bien>Meublee</th>
<th class=bien>Duree</th>
<th class=bien>Nombre du chambre</th>
<th class=bien>Superficie</th>
<th class=bien>Nature de longement</th>
<th class=bien>Quartie</th>
<th class=bien>Ville du bien</th>
<th class=inter>Nom Intermediare</th>
<th class=inter>Prenom Intermediare</th>
<th class=inter>Tele Intermediare</th>
<th class=bien>Description</th>
<th class=bien>Equipement</th>
<th>Resultat</th>
<th></th>
</tr>
</thead>
<tbody>
<?php $sql="SELECT * FROM `demandes` WHERE etat = 'ND' order by datecreation desc";
                $result = $cnx->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
<tr>
<td><?php echo $row['datecreation'];?></td>
<td class=dispo><?php echo $row['Responsable'];?></td>
<td class=dispo><?php echo $row['etatdemande'];?></td>
<td class=cin><?php echo $row['cin'];?></td>
<td><?php echo $row['nom'];?></td>
<td><?php echo $row['prenom'];?></td>
<td><?php echo $row['tele'];?></td>
<td><?php echo $row['pvachat'];?></td>
<td class=bien><?php echo $row['typeb'];?></td>
<td class=bien><?php echo $row['nature'];?></td>
<td class=bien><?php echo $row['meuble'];?></td>
<td class=bien><?php echo $row['duree'];?></td>
<td class=bien><?php echo $row['nbrcham'];?></td>
<td class=bien><?php echo $row['superficie'];?></td>
<td class=bien><?php echo $row['natureL'];?></td>
<td class=bien><?php echo $row['quartie'];?></td>
<td class=bien><?php echo $row['villeb'];?></td>
<td class=inter><?php echo $row['nomInter'];?></td>
<td class=inter><?php echo $row['prenomInter'];?></td>
<td class=inter><?php echo $row['teleInter'];?></td>
<td class=bien><?php echo $row['description'];?></td>
<td class=bien><?php echo $row['equipement'];?></td>
<td>
<a class="btnC p-2" href="ListeOffres.php?typeb=<?php echo $row['typeb'];?>&nature=<?php echo $row['nature'];?>&chmabre=<?php echo $row['nbrcham'];?>&superficie=<?php echo $row['superficie'];?>
                            &quartie=<?php echo $row['quartie'];?>&ville=<?php echo $row['villeb'];?>&desc=<?php echo $row['description'];?>&
                            pvachat=<?php echo $row['pvachat'];?>">Afficher</a>
</td>
<td class=p-3>
<div class=row>
<a class="btnC p-2" href="modifierDemande.php?id=<?php echo $row['numdemande'];?>">Modifier</a>
<a class="btnC p-2" href="deletDem.php?numdemande=<?php echo $row['numdemande'];?>" onclick="return confirm('voulez vous confirmer l operation  ?')">Supprimer</a>
</div>
</td>
</tr>
<?php }?>
</tbody>
</table>
</div>
</div>
<script>$("#btncin").change(function(){if(this.checked){$(".cin").show()}else{$(".cin").hide()}});$("#btnInter").change(function(){if(this.checked){$(".inter").show()}else{$(".inter").hide()}});$("#btndispo").change(function(){if(this.checked){$(".dispo").show()}else{$(".dispo").hide()}});$("#btnbien").change(function(){if(this.checked){$(".bien").show()}else{$(".bien").hide()}});</script>
<script type=text/javascript src=https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js></script>
<script>$(document).ready(function(){$("#reset").click(function(a){location.reload()});$("#table1").DataTable()});</script>
</body>
</html>