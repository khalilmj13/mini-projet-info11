<?php 
include("connexion.php");
include("etat.php") ; 
$key = $_GET['key']; 
$req1="SELECT * FROM absence WHERE idEtd  LIKE '%$key%' and typeAb='Justifieé' ";
$rep1 = $pdo->prepare($req1);
$pdo->exec($rep1) ; 
$nb_j = $srep->rowCount(); // calcul les abs justifee
$req2="SELECT * FROM absence WHERE idEtd  LIKE '%$key%' and typeAb='NoNJustifieé' ";
$rep2 = $pdo->prepare($req2);
$pdo->exec($rep2);
$nb_n = $srep->rowCount(); //calcul les abs non justifee
var_dump($nb_j); 
$req3="UPDATE etudiant SET nb_j=$nb_j, nb_n=$nb_n  WHERE cin=$key " ;
$rep3 = $pdo->prepare($req3);
$pdo->exec($rep3) ; 


?>
$req1="SELECT * FROM absence WHERE idEtd  LIKE '%$key%' and typeAb='Justifieé' ";
$rep1 = $pdo->prepare($req1);
$pdo->exec($rep1) ; 
$nb_j = $srep->rowCount(); // calcul les abs justifee
$req2="SELECT * FROM absence WHERE idEtd  LIKE '%$key%' and typeAb='NoNJustifieé' ";
$rep2 = $pdo->prepare($req2);
$pdo->exec($rep2);
$nb_n = $srep->rowCount(); //calcul les abs non justifee
var_dump($nb_j); 
$req3="UPDATE etudiant SET nb_j=$nb_j, nb_n=$nb_n  WHERE cin=$key " ;
$rep3 = $pdo->prepare($req3);
$pdo->exec($rep3) ; 