<?php 
include 'db_conn.php';
$numdemande=$_GET['numdemande'];
$sql="UPDATE `demandes` SET `etat`='D',`datedelete`=SYSDATE() WHERE  `numdemande`= ".$numdemande;;
if ($cnx->query($sql) === TRUE) { 
    echo '
    <script>
    window.location=history.go(-1);
    </script>
    ';
   
} else {
    echo '<script>alert("Erreur !! ")</script>';
}
?>