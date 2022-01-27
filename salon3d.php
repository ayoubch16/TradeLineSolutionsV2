<?php include 'db_conn.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/StorageStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aframe/0.7.1/aframe.min.js" integrity="sha512-rUufjf5ek0Gg7oC312jH4suycbLNokbiLwszY5/Bp2Oj6lfkFLXFDB5xeg7w6sitBTtITuCkqJU9DoBELr+jUA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Salon 3d</title>
    <style>
        .salon {
            width: 100%;
            height: 550 px;
        }
    </style>
</head>

<body>
    <!-- menu  -->
    <?php include 'menu.php'; ?>
   
   <!-- <a-scene>
       <img id="panorama" src="image/02-TUTO-PHOTO-360-VENISE.jpg" />
       <a-sky src="#panorama" rotation="0 -90 0 -90"></a-sky>
   </a-scene> -->

   <div class="img-box container">
        <iframe width="1000px" height="600px" frameborder="0" 
        src="https://momento360.com/e/u/882cc0e918b24106a86014c357e244e4?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=75&size=medium" ></iframe>
   </div>
   

 

</body>

</html>