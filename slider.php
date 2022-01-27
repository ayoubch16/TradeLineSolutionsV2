<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>slider</title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<script src=https://kit.fontawesome.com/d0c20c79d8.js crossorigin=anonymous></script>
<link href=https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css rel=stylesheet>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<link rel=stylesheet href=css/cssfile.css>
<style>.divbas{width:300px;height:300px;background-color:#fff;position:relative;top:0;left:60px;border-radius:30% 70% 70% 30% / 30% 30% 70% 70%;opacity:.4}.divtop{width:300px;height:300px;background-color:rgba(238,113,102,0.8);position:relative;top:-320px;left:80px;border-radius:30% 70% 70% 30% / 30% 30% 70% 70%}.divtop1{display:none}.btnC1{border:2px solid #fff;background-color:#fff;border-radius:10px;padding:10px;color:#ee7166}.btnC1 a{text-decoration:none;color:#ee7166}.btnC1:hover,.btnC1 a:hover{background:linear-gradient(90deg,rgba(245,170,163,1) 0,rgba(238,113,102,1) 5%,rgba(238,113,102,1) 95%,rgba(245,170,163,1) 100%);color:#fff}@media only screen and (max-width:800px){.divbas,.divtop{display:none}.divtop1{width:170px;height:170px;background:rgba(238,113,102,0.6);position:relative;top:-140px;left:20px;border-radius:30% 70% 70% 30% / 30% 30% 70% 70%;display:-ms-flexbox;display:-webkit-flex;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-flex-wrap:nowrap;-ms-flex-wrap:nowrap;flex-wrap:nowrap;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-content:center;-ms-flex-line-pack:center;align-content:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center}.divtop1 h3,.divtop1 h6{font-size:.8rem}}</style>
</head>
<body>
<div class=slider>
<div class="myslide fadeT">
<img class=imgSlider src=image/background.png style=width:100%;height:100%>
</div>
<?php $sql="SELECT * FROM `stockbien` where offre='S' and `etatdel`='ND' order by datecreation desc LIMIT 2 "; 
              $result = $cnx->query($sql);
              while ($row = $result->fetch_assoc()) {
        ?>
<div class="myslide fadeT">
<div class=txt>
<div class=divbas></div>
<div class="divtop text-center pt-5">
<h3 class="mt-2 text-light" style=font-weight:bold><?php echo str_replace(' ','<br>', $row['typeb']);   ?></h3>
<h6 class="mt-3 text-light"><?php echo '<i class="fi fi-rr-location-alt"></i> ' . $row["adressQ"] . '<br> ' . $row["adressV"]; ?></h6>
<button class="btnC1 mr-3 mt-3 p-2">
<a href="products-detailes.php?idbien=<?php echo $row["id"]; ?>">PLUS D'INFO</a>
</button>
</div>
<a href="products-detailes.php?idbien=<?php echo $row["id"]; ?>">
<div class="divtop1 text-center p-3">
<h3 class="mt-2 text-light">Local Commercial</h3>
<h6 class="mt-3 text-light"><?php echo '<i class="fi fi-rr-location-alt"></i> ' . $row["adressQ"] . ' ' . $row["adressV"]; ?></h6>
</div>
</a>
</div>
<img class=imgSlider src=<?php echo 'data:image/jpeg;base64,' . base64_encode($row['img1']); ?> style=width:100%;height:100%>
</div>
<?php } ?>
<a class=prev onclick=plusSlides(-1)>&#10094;</a>
<a class=next onclick=plusSlides(1)>&#10095;</a>
<div class=dotsbox style=text-align:center>
<span class=dot onclick=currentSlide(1)></span>
<span class=dot onclick=currentSlide(2)></span>
<span class=dot onclick=currentSlide(3)></span>
</div>
</div>
<script src=js/jsfile.js></script>
</body>
</html>