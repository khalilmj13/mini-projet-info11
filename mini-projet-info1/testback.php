<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
include("connexion.php");
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
$req="SELECT * FROM absence WHERE idEtd  LIKE '%$key%'";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs["etudiants"]=array();

while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
        $etudiant = array();
        $etudiant["cin"] = $row["cin"];
        $etudiant["nom"] = $row["nom"];
        $etudiant["prenom"] = $row["prenom"];
        $etudiant["adresse"] = $row["adresse"];
        $etudiant["email"] = $row["email"];
        $etudiant["classe"] = $row["Classe"];
        $etudiant["nb_j"] = $row["nb_j"];
        $etudiant["nb_n"] = $row["nb_n"];
         array_push($outputs["etudiants"], $etudiant);
         

    }
    // success
    $outputs["success"] = 1;
     echo json_encode($outputs);
} else {
    $outputs["success"] = 0;
    $outputs["message"] = "Pas d'étudiants";
    // echo no users JSON
    echo json_encode($outputs);
}
}
?>