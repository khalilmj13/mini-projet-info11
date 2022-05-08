<?php include("connexion.php");
$key = $_GET['key']; 
$req1="SELECT * FROM absence WHERE idEtd  LIKE '%$key%' and typeAb='Justifieé' ";
$rep = $pdo->prepare($req1);
$rep->execute();
$nb_j = $srep->rowCount(); // calcul les abs justifee
$req1="SELECT * FROM absence WHERE idEtd  LIKE '%$key%' and typeAb='NoNJustifieé' ";
$rep = $pdo->prepare($req1);
$rep->execute();
$nb_n = $srep->rowCount(); //calcul les abs non justifee
var_dump($nb_j); 
$req2="UPDATE etudiant SET nb_j=$nb_j, nb_n=$nb_n  WHERE cin=$key " ;
$rep2 = $pdo->prepare($req2);
$rep2->execute();
?>