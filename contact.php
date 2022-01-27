<?php 
$name=$_POST['txtname'];
$email=$_POST['txtEmail'];
$tele=$_POST['tele'];
$msg=$_POST['txtMsg'];
$msg =wordwrap($msg,70,"\r\n");

            $to      = 'tls.contact@tradeline-solutions.com';
            $subject = 'Demande D \'Informaion ';
           
            // message
            $message = '
            <h1 style="color: #EE7166;font-size: 50px;text-align: center;">Trade Line Solutions</h1>
    
            <pre style="font-size: 15px;">
            <h1>    Demande De Simulation MORABAHA :</h1>

            Name          :     '.$name.'
    
            email         :     '.$email.'
    
            tele          :     '.$tele.' 
    
            msg           :     
                          '.$msg.'

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
           
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

     
            $headers .= 'From: notif.immo@tradeline-solutions.com' . "\r\n" .
                       'Reply-To: notif.immo@tradeline-solutions.com' . "\r\n" .
                       'X-Mailer: PHP/' . phpversion();

//            echo $message;

            mail($to, $subject, $message, $headers);

?>