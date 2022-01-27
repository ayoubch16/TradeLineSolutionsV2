<?php 
     include 'db_conn.php';
   
    $envoyer = $_GET['envoyer'];
    if ($envoyer != null) {
                $numdemande=$_GET['numdemande'];
                $Resp=$_GET['Resp'];
                $typeb=$_GET['typeb'];$nature=$_GET['nature'];$meuble=$_GET['meuble'];
                $duree=$_GET['duree'];$nbrcham=$_GET['nbrcham'];$superficie=$_GET['superficie'];
                $natureL=$_GET['natureL'];$villeb=$_GET['villeb'];
                $nom=$_GET['nom'];$prenom=$_GET['prenom'];$cin=$_GET['cin'];
                $tele=$_GET['tele'];$pvachat=$_GET['pvachat'];$quartie=$_GET['quartie'];$villec=$_GET['villec'];
                $nomInter=$_GET['nomInter'];$prenomInter=$_GET['prenomInter'];$teleInter=$_GET['teleInter'];
                $description = $_GET['description'];
                $description = str_replace("'", ' ', $description);
                $etatdemande=$_GET['etatdemande'];
                $checkbox1 = $_GET['chkl'] ;
                $equipement=" ";
                for ($i=0; $i<count($checkbox1); $i++)
                $equipement .= " " . $checkbox1[$i];
                //echo $equipement;
                $sql1="UPDATE `demandes` SET `Responsable`='$Resp',`etatdemande` ='$etatdemande',
                `typeb`='$typeb', `nature`='$nature', `meuble`='$meuble', `duree`='$duree', 
                `nbrcham`='$nbrcham', `superficie`='$superficie', `natureL`='$natureL',
                `quartie`='$quartie', `villeb`='$villeb',
                `nom`='$nom', `prenom`='$prenom', `cin`='$cin', `tele`='$tele', 
                `pvachat`='$pvachat',`villec`='$villec',`nomInter`='$nomInter', 
                `prenomInter`='$prenomInter',`teleInter`='$teleInter', `description`='$description',
                 `equipement`='$equipement', `dateedit`=DATE_FORMAT(SYSDATE(), '%Y-%c-%d %H:%i:%s') 
                 where `numdemande`= ".$numdemande;
                   //echo $sql1;
            
            if ($cnx->query($sql1) === TRUE) { 
              header("Location: modifierDemande.php?id=$numdemande");
              echo '<br> test bien';
              // header("Location: index.php", TRUE, 301);
                exit();
                
            } else {
                echo '<script>alert("Erreur : vérifier les informations")</script>';
            }
            
    }
 ?>