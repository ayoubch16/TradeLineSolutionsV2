<?php include 'db_conn.php';
$t=$_GET['typeb'];
$n=$_GET['nature'];
$c=$_GET['chmabre'];
$p=$_GET['pvachat'];
$s=$_GET['superficie'];
$q=$_GET['quartie'];
$v=$_GET['ville'];
$desc=$_GET['desc'];

                      if($n=='Location'){
                          $nt='Location';
                          $ni='louer';
                          $ns='2';
                      }else{
                          $nt='Vente';
                           $ni='vendre';
                           $ns='1';
                      }
                      switch ($t) {
                        case 'Appartement':
                            $ts = "1";
                            $ta = "appartements";
                            break;
                        case 'Villa':
                            $ts = "35";
                            $ta = "maisons_et_villas";
                            break;
                        case 'Terrain/Construction':
                            $ts = "5";
                            $ta = "terrains_et_fermes";
                            break;
                        case 'Ferme Agricole':
                            $ts = "5";
                            $ta = "terrains_et_fermes";
                            break;
                        case 'Maison':
                            $ts = "22";
                            $ta = "maisons_et_villas";
                            break;
                        case 'Chalet':
                            $ts = "44";
                            $ta = "chalet";
                            break;
                        case 'Studio':
                            $ts = "58";
                            $ta = "studio";
                            break;
                        case 'Duplex':
                            $ts = "24";
                            $ta = "duplex";
                            break;
                        case 'Riad':
                            $ts = "48";
                            $ta = "riad";
                            break;
                    }
                     // $nbr=(double)$s;
                      
                      
                      function  Super($v){
                        $nbr=(int)$v;
                        switch($v){                     
                            case  in_array($nbr, range(0,25)): 
                               $sa=1;
                            break; 
                            case  in_array($nbr, range(26,35)): 
                              $sa=2 ;
                            break; 
                            case  in_array($nbr, range(36,50)):
                               $sa=3;
                            break; 
                            case  in_array($nbr, range(51,60)):
                               $sa=4;
                            break; 
                            case  in_array($nbr, range(61,70)):
                               $sa=5;
                            break; 
                            case  in_array($nbr, range(71,80)):
                               $sa=6;
                            break; 
                            case  in_array($nbr, range(81,90)):
                               $sa=7;
                            break; 
                            case  in_array($nbr, range(91,100)):
                               $sa=8;
                            break; 
                            case  in_array($nbr, range(101,125)):
                               $sa=9;
                            break; 
                            case  in_array($nbr, range(126,150)):
                               $sa=10;
                            break; 
                            case  in_array($nbr, range(151,175)):
                               $sa=11;
                            break; 
                            case  in_array($nbr, range(176,200)):
                               $sa=12;
                            break; 
                            case  $nbr > 200 :
                               $sa=13;
                            break; 
                            
                        }
                        return $sa;
                      }
                     
                    

                      $ville = empty($_GET['ville']) ? " " : " `adressV`= UPPER('$v') and ";

                      $typeb = empty($t) ? " " : "  `typeb`='$t' and ";

                      $nature = empty($nt) ? " " : "  `natureb`='$nt' and ";

                      $ville = empty($v) ? " " : " `adressV`= UPPER('$v') and ";

                      $quartie = empty($q) ? " " : " `adressQ`= UPPER('$q') and ";

                      $narture = empty($n) ? " " : " `natureb`= '$n' and  ";
                      
                      $MaxCham= empty($c) ? 0 : $c + 1;
                      $MinCham= empty($c) ? 0 : $c - 1;
                      
                      
                      $MinPrix = empty($p) ? 0 : $p-($p/10);
                      $MaxPrix = empty($p) ? 1000000000 : $p+($p/10);

                      $MinSuper = empty($s) ? 0 : $s-10;
                      $MaxSuper = empty($s) ? 100000 : $s+10;

                      $MinSupera = Super($MinSuper);
                      $MaxSupera = Super($MaxSuper);
                   
                    
                      $sql1 = "SELECT * FROM `stockbien` where  $nature  
                      (`nbrCham` between $MinCham  and $MaxCham) and (`superficier` between $MinSuper  and $MaxSuper) and (`prixb` between $MinPrix  and $MaxPrix) "; 

                      $immolist="https://immolist.ma/search/".$t."s-a-$ni/?price_low=$MinPrix&price_high=$MaxPrix&bedrooms=$c&region=".strtolower($v);
                     $sarouty="https://www.sarouty.ma/fr/recherche?c=$ns&t=$ts&bf=$MinCham&pf=$MinPrix&pt=$MaxPrix&af=$MinSuper&at=$MaxSuper";
                     $avito="https://www.avito.ma/fr/".strtolower($v)."/".$ta."-à_$ni?spr=$MinPrix&mpr=$MaxPrix&ros=$MinCham&roe=$MaxCham&ss=$MinSupera&se=$MaxSupera ";
            
               

?>
<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=UTF-8>
<meta http-equiv=X-UA-Compatible content="IE=edge">
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link rel=stylesheet type=text/css href=css/StorageStyle.css>
<link rel=stylesheet type=text/css href=css/bootstrap.css>
<link rel=icon href=icon.ico type=image/ico sizes=16x16>
<title>Liste des Offres</title>
<style>table,td,th{border:1px solid black;text-align:center;size:50px;padding:2px}ul li{display:inline}</style>
</head>
<body class=text-center>
<?php
    session_start();
    if ($_SESSION['login'] == '') {
        header("Location: Account.php");
    }
    ?>
<?php include 'menu.php';  ?>
<ul class=m-5>
<li class=font-weight-bold>Recherche aussi Sur : </li>
<li><a class=btnC href=<?php echo $immolist;?> target=blank>immolist</a></li>
<li><a class=btnC href=<?php echo $sarouty;?> target=blank>sarouty</a></li>
<li><a class=btnC href=<?php echo $avito;?> target=blank>Avito</a></li>
</ul>
<div class="container text-center">
<table>
<thead>
<tr>
<th>Type de bien</th>
<th>Nombre du chambre</th>
<th>Superficie</th>
<th>Prix</th>
<th>nature</th>
<th>Quartie</th>
<th>Ville</th>
<th>Description</th>
<th>Equipement</th>
<th></th>
</tr>
</thead>
<tbody>
<?php $sql=" SELECT * FROM `stockbien` ";
                  $result = $cnx->query($sql1);
                  while ($row = $result->fetch_assoc()) {

            ?>
<tr>
<td><?php echo  $row['typeb'];?></td>
<td><?php echo  $row['nbrCham'];?></td>
<td><?php echo  $row['superficier'];?></td>
<td><?php echo  $row['prixb'];?></td>
<td><?php echo  $row['natureb'];?></td>
<td><?php echo  $row['adressQ'];?></td>
<td><?php echo  $row['adressV'];?></td>
<td><?php echo  $row['autre'];?></td>
<td><?php echo  $row['equipement'];?></td>
<td class=p-2>
<a class=btnC href="products-detailes.php?idbien=<?php echo $row["id"]; ?>">Info</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</body>
</html>