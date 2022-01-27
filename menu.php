<body>
<?php include 'db_conn.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>body{background-color: #fff;}.nav-item a{font-size:12px!important}.toopnav{margin:0 20px}.navbar-expand-lg .navbar-nav .dropdown-menu{position:absolute;left:-89px!important}.logo a img{width:200px}@media only screen and (max-width:700px){.toopnav{margin:0!important}.navbar-expand-lg .navbar-nav .dropdown-menu{position:initial;width:100%;left:0!important;z-index:3}.logo a img{width:150px}}</style>
<div class="toopnav">
<nav class="navbar navbar-expand-lg navbar-light bg-white shift">
<div class="logo app-logo animate__animated animate__backInLeft">
<a href="index.php"><img src="image/logo.webp" /></a>
</div>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse text-center navbar-collapse" id="navbarNavDropdown" style="background-color:#fff;z-index:1">
<ul class="navbar-nav text-dark ml-auto mb-2 mb-lg-0">
<li class="nav-item active">
<a class="nav-link" href="index.php">Accueil </a>
</li>
<li class="nav-item active">
<a class="nav-link" href="produits.php#prod">immo-offres</a>
</li>
<li class="nav-item active">
<a class="nav-link" href="services.php">immo-services</a>
</li>
<li class="nav-item active">
<a class="nav-link" href="simulation.php">immo-Simulateur <span class="badge badge-danger">New</span></a>
</li>
<li class="nav-item active">
<a class="nav-link" href="apropos.php">A propos</a>
</li>
<li class="nav-item active">
<a class="nav-link" href="immo-news.php">Immo-news</a>
</li>
<?php 
                    session_start();
                     if($_SESSION["id"] != null){ ?>
<li class="nav-item active dropdown">
<?php if ($_SESSION['login'] == '') { ?>
<a class="nav-link" href="Account.php"><img class="mr-2" style="width:20px;margin-bottom:0" src="image/icones/clock-regular.svg">
Compte</a>
<?php } else { ?>
<a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<img class="mr-2" style="width:20px;margin-bottom:0;cursor:pointer" src="image/icones/user.png">
<?php echo $_SESSION["prenom"] . ' ' . $_SESSION["nom"]; ?>
</a>
<div class="dropdown-menu text-center" aria-labelledby="navbarDropdownMenuLink">
<a class="dropdown-item" href="ajouter.php">Ajouter une Offre</a>
<a class="dropdown-item" href="demande.php">Ajouter une Demande</a>
<a class="dropdown-item" href="ajouterClient.php">Ajouter un client </a>
<a class="dropdown-item" href="add-news.php">Ajouter une actualité</a>
<a class="dropdown-item" href="maps.php"> TLS Maps </a>
<a class="dropdown-item" href="ListeDemande.php">Liste des Demandes</a>
<a class="dropdown-item" href="ListeClients.php">Liste des Clients </a>
<a class="dropdown-item" href="ListeBiensPrivee.php">Liste Biens Privee <span class="badge badge-danger">New</span></a>
<?php if($_SESSION['user']=='admin') {?>
<a class="dropdown-item" href="statitstiques.php">Statistiques</a>
<a class="dropdown-item" href="gestionUsers.php">Gestion des utilisateurs</a>
<?php }?>
<a class="dropdown-item" href="monCompte.php">Mon Compte</a>
<a class="dropdown-item" href="deconnecter.php">déconnexion</a>
</div>
<?php } ?>
</li>
<?php } ?>
</ul>
</div>
</nav>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>