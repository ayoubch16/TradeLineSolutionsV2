<!DOCTYPE html>
<html lang=en>
<?php include 'db_conn.php'; ?>
<head>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css />
<style>input::-webkit-outer-spin-button,input::-webkit-inner-spin-button{-webkit-appearance:none;margin:0}input[type=number]{-moz-appearance:textfield}.btn-check,#desc,#morabaha{display:none}#l1,#l2{background-color:#ee7166;cursor:pointer}#l1{opacity:1}#l2{opacity:.5}</style>
<title>Simulateur Crédit</title>
</head>
<body>
<?php
    session_start();
    ?>
<?php include 'menu.php';  ?>
<div class=container style=margin-top:30px>
<div class="row align-items-start">
<div class="col-sm-8 text-center animate__animated animate__fadeInLeftBig">
<div class=row>
<input type=radio onclick=typebtn() value=type1 class=btn-check id=btn-check-1-outlined name=types autocomplete=off>
<input type=radio onclick=typebtn() value=type2 class=btn-check id=btn-check-2-outlined name=types autocomplete=off>
</div>
<script>function typebtn(){if(document.getElementById("btn-check-1-outlined").checked){document.getElementById("simple").style.display="block";document.getElementById("morabaha").style.display="none";document.getElementById("l1").style.opacity="1";document.getElementById("l2").style.opacity="0.5"}if(document.getElementById("btn-check-2-outlined").checked){document.getElementById("simple").style.display="none";document.getElementById("morabaha").style.display="block";document.getElementById("l1").style.opacity="0.5";document.getElementById("l2").style.opacity="1"}}</script>
<div class="text-center m-5">
<h1 class=my-2><b> SIMULATEUR CREDIT </b> </h1>
<div class="col text-center border rounded bg-light">
<div class=row>
<label id=l1 class="col rounded text-white p-3" for=btn-check-1-outlined><h6><b>CREDIT CONVONTIONNEL</b></h6></label>
<label id=l2 class="col rounded text-white p-3" for=btn-check-2-outlined><h6><b>FINANCEMENT MOURABHA </b></h6></label>
</div>
<form class="mt-5 text-center" id=simple>
<div class="form-row p-3">
<input class="form-control text-center" type=number id=montant placeholder="Montant (DH)" required>
</div>
<div class="form-row p-3">
<input class="form-control text-center" type=number id=duree placeholder="Durée (mois)" required>
</div>
<div class="form-row p-3">
<input class="form-control text-center" type=number id=taux placeholder="Taux %" required>
</div>
<div class="text-center form-row my-5">
<a href=#desc><input class=btnC type=button onclick=calculer() value=Simuler></a>
</div>
</form>
<form method=post action=morabaha.php class=mt-5 id=morabaha>
<div class="form-row p-2">
<input class="form-control text-center" type=text name=nom placeholder="Nom & Prenom" required>
</div>
<div class="form-row p-2">
<input class="form-control text-center" type=number name=montant placeholder="Montant (DH)" required>
</div>
<div class="form-row p-2">
<input class="form-control text-center" type=number name=duree placeholder="Durée (mois)" required>
</div>
<div class="form-row p-2">
<input class="form-control text-center" type=text name=pro placeholder=Profession required>
</div>
<div class="form-row p-2">
<input class="form-control text-center" type=number name=age placeholder=Age required>
</div>
<div class="form-row p-2">
<input class="form-control text-center" type=email name=email placeholder=Email required>
</div>
<div class="form-row p-2">
<input class="form-control text-center" type=tel name=tele placeholder="Tele / Whatsapp" required>
</div>
<div class="text-center form-row my-5">
<a href=#desc><input class=btnC type=submit onclick=calculer() value="Demande de Simulation"></a>
</div>
</form>
<div class="p-3 st" id=desc>
<div class="row border rounded p-2 align-items-center">
<h6 class="text-left col">Mensualité : </h6>
<h6 class="text-right col" id=mensualite></h6>
</div>
<div class="row border rounded p-2 align-items-center">
<h6 class="text-left col">Taux : </h6>
<h6 class="text-right col" id=txttaux></h6>
</div>
<div class="row border rounded p-2 align-items-center">
<h6 class="text-left col">Totale d'intérêt : </h6>
<h6 class="text-right col" id=totaleInt></h6>
</div>
<div class="row border rounded p-2 align-items-center">
<h6 class="text-left col">montant totale rembourse :</h6>
<h6 class="text-right col" id=MontRemb></h6>
</div>
</div>
</div>
</div>
<script>function calculer(){var b;var d=document.getElementById("montant").value;var c=document.getElementById("taux").value/100;var e=document.getElementById("duree").value;if(c==0){b=d/e}else{var a=Math.pow((1+c),(1/12))-1;b=d*(a/(1-Math.pow((1+a),(-e))))}document.getElementById("desc").style.display="block";document.getElementById("mensualite").innerHTML=new Intl.NumberFormat().format(b.toFixed(3))+" DH";document.getElementById("txttaux").innerHTML=c*100+" %";document.getElementById("totaleInt").innerHTML=new Intl.NumberFormat().format(((b*e)-d).toFixed(3))+" DH";document.getElementById("MontRemb").innerHTML=new Intl.NumberFormat().format((b*e).toFixed(3))+" DH"};</script>
</div>
<div class="col-sm-4 p-3 animate__animated animate__fadeInRightBig">
<div>
<h2 class="mb-3 text-center">Offres à la une</h2>
<?php $sql2="SELECT * FROM `stockbien` where  `etatdel`='ND'  ORDER BY  `datecreation` desc LIMIT 3 ";
                                    $result2 = $cnx->query($sql2);
                                    while ($row2 = $result2->fetch_assoc()) {
                                      if (strcmp($row['natureb'], 'Location')  == 0) {
                                        $txt1 = 'MAD/mois';
                                    } else {
                                        $txt1 = 'MAD';
                                    } 
                                   
                                    ?>
<a href="products-detailes.php?idbien=<?php echo $row2["id"]; ?>">
<div class="row align-items-start">
<div><img src=<?php echo 'data:image/jpeg;base64,' . base64_encode($row2['img1']); ?> style=width:60px;height:60px></div>
<div class="col text-left"><p><?php echo  $row2['typeb'];?> <span class="badge badge-danger">New</span></p>
<h3 style=color:#EE7166><?php echo number_format($row2["prixb"], 0, "", " ") . ' ' . $txt1; ?></h3></div>
</div>
</a>
<hr>
<?php } ?>
</div>
<div class=text-left>
<h3>suivez-nous :</h3>
<ul class=ml-2>
<li><a href="https://web.facebook.com/TLS-IMMO-111322111153327/?_rdc=1&_rdr" style=text-decoration:none;color:#000><img src=image/icones/facebook.png width=20 alt=facebook>&emsp; Facebook </a></li>
<li><a href="https://www.instagram.com/tls.immo?fbclid=IwAR14cEQjlgIz19kZ2yzs2M0x_mCvr8hs8Y5yFlZeEoDkfjgyOy9Gaq8XliQ" style=text-decoration:none;color:#000><img src=image/icones/instagram.png width=20 alt=instagram>&emsp; Intagrame</a></li>
<li><a href=https://wa.me/+212649868026 style=text-decoration:none;color:#000><img src=image/icones/whatsapp.svg width=20 alt=whatsapp>&emsp; whatsapp</a></li>
<li><a href=https://www.linkedin.com/company/trade-line-solutions style=text-decoration:none;color:#000><img src=image/icones/linkedin.png width=20 alt=LinkdeIn>&emsp; LinkdeIn</a></li>
</ul>
</div>
</div>
</div>
</div>
</body>
</html>