<?php  
  include 'db_conn.php';
$num=$_GET['num'];
$etat=$_GET['etat'];

  $sql="UPDATE `demandes` SET `etatdemande`='$etat' WHERE `numdemande`=".$num;
     //echo $sql;     
      if ($cnx->query($sql) === TRUE) { 
        
        echo '<script>confirm("la demande a ete modifie avec succès")</script>';
        header("Location: ListeDemande.php");
         } else {
        echo '<script>alert("Erreur : vérifier les informations")</script>';
        header("Location: ListeDemande.php");
    }
    
?>
