<?php 
    include 'db_conn.php';
      session_start();
      $connect=$_POST['connect'];
      if($connect != null){
      $login=$_POST['login'];
      $passe=$_POST['passe']; 
      $passe=md5($passe);
      $query="SELECT * FROM `usertls1` WHERE `login`='$login' and `passe`='$passe' and etat='V' ";
      $result =$cnx->query($query);
      
      if($row=$result->fetch_assoc()){
          $_SESSION["id"]  =  $row['id'];
          $_SESSION["nom"] =  $row['nom'];
          $_SESSION["prenom"] = $row['prenom'];
          $_SESSION["login"] = $row['login'];
          $_SESSION["user"] = $row['type'];
          echo '
          <script>
          window.location=history.go(-2);
          </script>
          ';
      }else{
          echo 'erreur';  
      }
      }
?>
<button onclick="Rto()">Retour À La Page De Connexion</button>
<script>
        function Rto(){
            window.location=history.go(-1);
        }
</script>