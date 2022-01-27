<?php include 'db_conn.php'; 
?>
<!DOCTYPE html>
<html lang=en>
<head>
<head>
<title>Add News</title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel=stylesheet>
<link href=https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css rel=stylesheet />
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css />
</head>
</head>
<body>
<?php
    session_start();
    $add=$_POST['add'];
    if($add != null){
        
        $titre=$_POST['titre'];
        $imgNews = addslashes(file_get_contents($_FILES['imgNews']['tmp_name']));
        $imageProperties = getimageSize($_FILES['my_image1']['tmp_name']);
        
        $contenu=$_POST['contenu'];
        $source=$_POST['source'];
       // echo '<br>'.$titre.'<br>'.$img.'<br>'.$contenu.'<br>'.$source;
        $sql="INSERT INTO `news`( `titreNews`, `imgNews`, `contenuNews`, `sourceNews`, `datecreation`) 
        VALUES ('$titre','$imgNews','$contenu','$source',SYSDATE())";
        //echo '<br>'.$sql;
        if ($cnx->query($sql) === TRUE) {  
            echo '<script>alert("l \'actualite a ete ajoute avec succès")</script>';            
          } else {
             echo'<script>alert("Erreur : vérifier les informations")</script>';  
          }  
         }
?>
<?php include 'menu.php';  ?>
<div class="container p-5 mt-lg-5">
<form method=post enctype=multipart/form-data>
<div class=row>
<div class=col-md>
<div class=form-group>
<input type=text name=titre class=form-control placeholder="Titre *" />
</div>
<div class=form-group>
<input class="form-control-file m-3" type=file name=imgNews>
</div>
<div class=form-group>
<textarea name=contenu class=form-control placeholder="Contenu *" style=width:100%;height:150px></textarea>
</div>
<div class=form-group>
<input type=text name=source class=form-control placeholder="Source *" />
</div>
<div class=form-group>
<input type=submit name=add class=btnC value="Ajouter News" />
</div>
</div>
</div>
</form>
</div>
<?php include 'footer.php'; ?>
</body>
</html>