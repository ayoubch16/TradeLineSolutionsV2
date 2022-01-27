<?php 
include 'db_conn.php';
$id=$_GET['idbien'];
$sql="UPDATE `stockbien` SET `etatdel`='D' WHERE id=$id";
if ($cnx->query($sql) === TRUE) { 
    echo '<script>alert("le compte a ete modifie avec succès")</script>';
    header("Location: produits.php");
   
} else {
    echo '<script>alert("Erreur !! ")</script>';
}


?>