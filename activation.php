<?php 
include 'db_conn.php';
$id=$_GET['id'];
$num=$_GET['num'];
if($num==1){   $sql=" UPDATE `usertls1` SET  `etat`='NV' where id=$id";
}
if($num==2){  $sql=" UPDATE `usertls1` SET  `etat`='V' where id=$id";
}
if ($cnx->query($sql) === TRUE) { 
    echo '<script>alert("le compte a ete modifie avec succès")</script>';
    header("Location: gestionUsers.php");
   
} else {
    echo '<script>alert("Erreur !! ")</script>';
}
?>