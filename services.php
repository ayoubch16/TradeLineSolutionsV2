<?php include 'db_conn.php'; 

?>
<!DOCTYPE html>
<html lang=en>
<head>
<head>
<title>Nos Service</title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<script src=https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js></script>
<link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel=stylesheet>
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css />
<style>.col-4 .imgServ{width:100%}.img1,.img2{display:none}.carte{padding:10px}.carte .col h6{font-size:1vw;text-align:justify;text-justify:inter-word}.carte:hover{transition:2s;transform:scale(1.05);box-shadow:-10px 25px 50px rgba(0,0,0,0.3)}.jumbotron h1{font-size:130px;color:#000;font-weight:700px}h1{font-size:30px}.btn2{display:none}@keyframes back{100%{background-position:2000px 0}}@media only screen and (max-width:600px){h1{font-size:30px!important}.col,.col-4{display:block}.div1{display:none}.img1{display:block;float:right}.img2{display:block;float:left}.imgServ{width:200px;height:200px}}</style>
</head>
</head>
<body class=bg-white>
<?php
    session_start();
   
    ?>
<?php include 'menu.php';  ?>
<div class="jumbotron text-center" style="margin-bottom:0;background:url('./image/statiback.jpg')">
<h1 class="animate__animated animate__fadeInLeftBig">IMMO SERVICE</h1>
</div>
<div class=container style=margin-top:30px>
<div class="carte my-5">
<h1 class="mx-2 text-center animate__animated animate__fadeIn">1-Turbo-Immo :</h1>
<div class="row my-5 d-flex align-items-center">
<div class="pl-4 col animate__animated animate__fadeInLeftBig">
<img class="m-3 imgServ img1" src="image/turboimmo.jpeg"/>
&emsp;Turbo-Immo, est le service que nous proposons aux professionnels du secteurs immobilier,
dont le but est l'accélération des ventes en leurs assurant les prestations suivantes :<br>
&emsp;&emsp;- La promotion des ventes/ création du trafic.<br>
&emsp;&emsp;- La création & la gestion des plateformes digitaux (FB /Instagram / LinkedIn, Site-web
...).<br>
&emsp;&emsp;- La réalisation des affiches, vidéos promotionnelles.<br>
&emsp;&emsp;- La réalisation des visites 360 / visites guidées.<br>
&emsp;&emsp;- Le recrutement et la formation des équipes commerciales.<br>
&emsp;&emsp;- L'installation & l'équipement des bureaux de vente.<br>
&emsp;&emsp;- La conception et réalisation des maquettes 3D et maquettes intelligentes .<br>
</div>
<div class="col-4 m-3 animate__animated animate__fadeInRightBig div1">
<img class=imgServ src=image/turboimmo.jpeg>
</div>
</div>
<div class="row col-6">
<a class="btnC m-2" target=blank href=https://wa.me/212649868026>Whatsapp</a>
<a class="btnC m-2" target=blank href=https://web.facebook.com/messages/t/111322111153327>Messenger</a>
<a class="btnC m-2" target=blank href=tel:+212530065024>Appeler</a>
</div>
</div>
<script>function afficherbtn(){document.getElementsByClassName("btn2").style.display="inline"}function hiddenbtn(){document.getElementsByClassName("btn2").style.display="none"};</script>
<div class="carte my-5">
<h1 class="mx-2 text-center">2-Assistance à l’achat :</h1>
<div class="row my-5 d-flex align-items-center">
<div class="col-4 m-3 animate__animated animate__fadeInLeftBig div1">
<img class=imgServ src=image/assistanceachat.jpeg>
</div>
<div class="col animate__animated animate__fadeInRightBig">
<img class="m-3 imgServ img2" src=image/assistanceachat.jpeg>
&emsp;Grace à son réseau de promoteurs immobiliers, et sa base de données, TLS vous accompagne pour
trouver le
bien qui correspond le mieux
à vos souhaits, sans avoir besoin de faire des tournées inutiles. <br>
&emsp;Appartements, villa, maisons, bureaux, locaux commerciaux, ou encore des terrain, il suffit de
nous
préciser votre besoin,
et nous nous occupons du reste. On garantit un servir dans les plus brefs délais, avec les
meilleurs
coûts, et avec un maximum de qualité.
</div>
</div>
<div class="row col-6 my-2">
<a class="btnC m-2" target=blank href=https://wa.me/212649868026>Whatsapp</a>
<a class="btnC m-2" target=blank href=https://web.facebook.com/messages/t/111322111153327>Messenger</a>
<a class="btnC m-2" target=blank href=tel:+212530065024>Appeler</a>
</div>
</div>
<div class="carte my-5">
<h1 class="mx-2 text-center">3-Assistance à la vente :</h1>
<div class="row my-5 d-flex align-items-center">
<div class="pl-4 col animate__animated animate__fadeInLeftBig">
<img class="m-3 imgServ img1" src=image/assistancevente.jpeg>
&emsp;Besoin de vendre un bien immobilier dans les plus brefs délais?
TLS vous propose son service assistance à la vente, par lequel nous multiplions les chances et nous
attirons un maximum de prospects, pour réaliser la vente, dans des temps restreints, avec les
meilleurs
conditions de négociation, et dans le respect total des mesures de sécurités administratives et
financières. <br>
&emsp;Ceci sera réalisé grâce notre plateforme digital, et notre réseau domestique.
</div>
<div class="col-4 m-3 animate__animated animate__fadeInRightBig div1">
<img class=imgServ src=image/assistancevente.jpeg>
</div>
</div>
<div class="row col-6 my-2">
<a class="btnC m-2" target=blank href=https://wa.me/212649868026>Whatsapp</a>
<a class="btnC m-2" target=blank href=https://web.facebook.com/messages/t/111322111153327>Messenger</a>
<a class="btnC m-2" target=blank href=tel:+212530065024>Appeler</a>
</div>
</div>
<div class="carte my-5">
<h1 class="mx-2 text-center">4-La gestion locative :</h1>
<div class="row my-5 d-flex align-items-center">
<div class="col-4 m-3 animate__animated animate__fadeInLeftBig div1">
<img class=imgServ src=image/gestionlocative.jpeg>
</div>
<div class="col animate__animated animate__fadeInRightBig">
<img class="m-3 imgServ img2" src=image/gestionlocative.jpeg>
&emsp;TLS vous propose son service de gestion des propriétés : location, règlement, nettoyage –
gardiennage,
service de syndic, etc.., afin de vous soulager de vos responsabilités envers votre bien immobilier,
et
respecter les normes administratives et légales des contrats. <br>
&emsp; La gestion locative correspond à une prise en charge totale qui vous garantit le maximum de
tranquillité.
</div>
</div>
<div class="row col-6 my-2">
<a class="btnC m-2" target=blank href=https://wa.me/212649868026>Whatsapp</a>
<a class="btnC m-2" target=blank href=https://web.facebook.com/messages/t/111322111153327>Messenger</a>
<a class="btnC m-2" target=blank href=tel:+212530065024>Appeler</a>
</div>
</div>
<div class="carte my-5">
<h1 class="mx-2 text-center">5-Conseil bancaire immobilier :</h1>
<div class="row my-5 d-flex align-items-center">
<div class="pl-4 col animate__animated animate__fadeInLeftBig">
<img class="m-3 imgServ img1" src=image/conseilbancaire.jpeg>
&emsp;Besoin de s'informer sur les meilleurs conditions bancaires sur le marché ?<br>
&emsp;Vous voulez effectuer une comparaison de prix des crédits IMMO?<br>
&emsp;Vous voulez connaitre les étapes de constitution d'un dossier immobilier conventionnel ou
participatif
(MOURABAHA)?<br>
&emsp;TLS-Immo met à votre disposition des cadres expérimentés dans le domaine bancaire, pour
répondre à
toutes vos questions, et vous assiste à faire les meilleurs choix.
</div>
<div class="col-4 m-3 animate__animated animate__fadeInRightBig div1">
<img class=imgServ src=image/conseilbancaire.jpeg>
</div>
</div>
<div class="row col-6 my-2">
<a class="btnC m-2" target=blank href=https://wa.me/212649868026>Whatsapp</a>
<a class="btnC m-2" target=blank href=https://web.facebook.com/messages/t/111322111153327>Messenger</a>
<a class="btnC m-2" target=blank href=tel:+212530065024>Appeler</a>
</div>
</div>
<div class="carte my-5">
<h1 class="mx-2 text-center">6-Conseil technique immobilier : </h1>
<div class="row my-5 d-flex align-items-center">
<div class="col-4 m-3 animate__animated animate__fadeInLeftBig div1">
<img class=imgServ src=image/conseiltechnique.jpeg>
</div>
<div class="col animate__animated animate__fadeInRightBig">
<img class="m-3 imgServ img2" src=image/conseiltechnique.jpeg>
&emsp; Pour vos projets de réaménagement, construction, ou acquisition pour investissement, TLS met
à votre
écoute une équipe expérimentée, et vous accompagne et vous conseille au niveau: <br>
&emsp;&emsp;- Administratif et procédural<br>
&emsp;&emsp;- Technique : Proposition de plans, astuces, etc ..,<br>
&emsp;&emsp;- Financier: Étude budgétaire estimative<br>
&emsp;&emsp;- Commercial : Le meilleur prix, le meilleur emplacement, et la meilleure décision.<br>
</div>
</div>
<div class="row col-6 my-2">
<a class="btnC m-2" target=blank href=https://wa.me/212649868026>Whatsapp</a>
<a class="btnC m-2" target=blank href=https://web.facebook.com/messages/t/111322111153327>Messenger</a>
<a class="btnC m-2" target=blank href=tel:+212530065024>Appeler</a>
</div>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>