<?php 
    $message=$_GET['message'];
    $tele = $_GET['tele'];
    // echo $message.' /  '.$tele;

    
    $lien2="https://api.whatsapp.com/send?phone=$tele&";
     header('Location: '.$lien2);



?>