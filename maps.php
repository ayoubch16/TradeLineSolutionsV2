<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>TLS IMMO Projets</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/StorageStyle.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="icon" href="icon.ico" type="image/ico" sizes="16x16">
        <style>
            iframe {
                width: 100%;
            }
        </style>
    
</head>
<body>
    <!-- Session -->
     <?php
    session_start();
    if ($_SESSION['login'] == '') {
        header("Location: Account.php");
    }
    ?>
    <!-- menu  -->
    <?php include 'menu.php' ;?>
    <div class="my-5 container">
    <iframe  src="https://www.google.com/maps/d/u/4/embed?mid=1IDvHX6D1l_cFmjf8KyO1OxZkmcVR9EPW"  height="600"></iframe>
    </div>



        <!-- footer  -->
    <?php include 'footer.php' ;?>
</body>
</html>