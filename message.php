<?php 
  include 'db_conn.php';

   
        $Resp=$_GET['Resp'];
        $etatdemande=$_GET['etatdemande'];
        $typeb=$_GET['typeb'];$nature=$_GET['nature'];$meuble=$_GET['meuble'];
        $duree=$_GET['duree'];$nbrcham=$_GET['nbrcham'];$superficie=$_GET['superficie'];
        $natureL=$_GET['natureL'];$villeb=$_GET['villeb'];

        $nom=$_GET['nom'];$prenom=$_GET['prenom'];$cin=$_GET['cin'];
        $tele=$_GET['tele'];$pvachat=$_GET['pvachat'];$quartie=$_GET['quartie'];$villec=$_GET['villec'];

        $nomInter=$_GET['nomInter'];$prenomInter=$_GET['prenomInter'];$teleInter=$_GET['teleInter'];

        $description = $_GET['description'];
        $description = str_replace("'", ' ', $description);

        $checkbox1 = $_GET['chkl'] ;
        $equipement=" ";
        for ($i=0; $i<count($checkbox1); $i++)
        $equipement .= " " . $checkbox1[$i];
       //echo $equipement;

        $sql1="INSERT INTO `demandes`( `Responsable`,`etatdemande` ,`typeb`, `nature`, `meuble`, `duree`, `nbrcham`, `superficie`, `natureL`,`quartie`, `villeb`,
                                      `nom`, `prenom`, `cin`, `tele`, `pvachat`,`villec`,`nomInter`, `prenomInter`, `teleInter`, `description`, `equipement`, `datecreation`) 
                             VALUES ('$Resp','$etatdemande','$typeb','$nature','$meuble','$duree','$nbrcham','$superficie','$natureL','$quartie','$villeb',
                             '$nom','$prenom','$cin','$tele','$pvachat','$villec','$nomInter', '$prenomInter', '$teleInter','$description','$equipement',DATE_FORMAT(SYSDATE(), '%Y-%c-%d %H:%i:%s'))";
           
            $subject = 'Nouveau Demande';
           
            // message
            $message = '
            <h1 style="color: #EE7166;font-size: 50px;text-align: center;">Trade Line Solutions</h1>
    
            <pre style="font-size: 15px;">
            <h1>    Nouvelle Demande :</h1>
            Nom           :     '.$nom.'
    
            prenom        :     '.$prenom.'
    
            tele          :     '.$tele.' 
    
            type de biens :     '.$typeb.'
            </pre>
            </div>
            <h4>
                <pre>
                Contactez-nous sur : 
                              Allo : <a href="tel:+212530065024">05 30 06 50 24</a> 
                          Whatsapp : <a href="https://wa.me/0660942877">06 60 94 28 77</a>
                </pre>
            </h4>
            ';
            //$message =wordwrap($message,70,"\r\n");
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            // $headers .= array(
            //     'From' => 'zineb-bechri ', 
            //     'Reply-To' => 'contact-tls@tradeline-solutions.com', 
            //     'X-Mailer' => 'PHP/' . phpversion(),
               
            // );
            $headers .= 'From: notif.immo@tradeline-solutions.com' . "\r\n" .
                       'Reply-To: notif.immo@tradeline-solutions.com' . "\r\n" .
                       'X-Mailer: PHP/' . phpversion();
            

        
        // <h3>Nom : '.$nom.' </h3>
        //                         <h3>prenom : '.$prenom.' </h3>
        //                         <h3>Tel : '.$tele.' </h3>
        //                         <h3>Type de bien : '.$typeb.' </h3>
        
          if ($cnx->query($sql1) === TRUE) {
               mail('ayoubchoukri16@gmail.com', $subject, $message, $headers);
               mail('a.benahsine@tradeline-solutions.com', $subject, $message, $headers);
               mail('Zinebechri95@gmail.com', $subject, $message, $headers);
                echo '<script>alert("Votre demande a été enregistré avec succès");</script>'; 
            } else {
                echo 'erreur <br>';
                echo '<script>alert("Votre demande a  n\'est pas enregistré");</script>';
            }

?>