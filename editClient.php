<?php 
    include 'db_conn.php';
       $nom=$_GET['nom'];
       $prenom=$_GET['prenom'];
       $tele=$_GET['tele'];
       $ville=$_GET['ville'];
       $description=$_GET['description'];

       $sql1=" UPDATE `clients` SET   
       `nom` = '$nom' ,`prenom` = '$prenom' ,`tele` = '$tele' ,`ville` = '$ville' ,`description` = '$description' ,`date` = SYSDATE() where id = ".$_GET['id'];
           //echo $sql1;
            if ($cnx->query($sql1) === TRUE) {
                echo '<script>alert("les informations de client a ete modifie avec succès")</script>';  
                echo ' <script>window.location=history.go(-1);</script>';
            } else {
                echo 'erreur <br>';
                echo '<script>alert("Erreur : vérifier les informations de client")</script>';
            }
 ?>