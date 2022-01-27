<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=UTF-8>
<meta http-equiv=X-UA-Compatible content="IE=edge">
<meta name=viewport content="width=device-width, initial-scale=1.0">
<script src=https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js></script>
<link rel=stylesheet href=https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css>
<script src=https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin=anonymous referrerpolicy=no-referrer></script>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin=anonymous referrerpolicy=no-referrer />
<title>Liste villes</title>
</head>
<body>
<select class="chosen text-center col" name=adresVb required>
<?php include 'db_conn.php';
   $sql="SELECT * FROM ville";
   $result = $cnx->query($sql);
        while ($row = $result->fetch_assoc()) {
?>
<option value=<?php echo $row['ville']?>><?php echo $row['ville']?></option>
<?php }?>
</select>
<script>$(".chosen").chosen();</script>
</body>
</html>