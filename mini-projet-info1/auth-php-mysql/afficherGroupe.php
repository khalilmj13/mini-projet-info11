<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
include("connexion.php");
$req="SELECT * FROM groupe";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs["groupes"]=array();
while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
        $groupe = array();
        $groupe["id_groupe"] = $row["id_groupe"];
        $groupe["groupe_name"] = $row["groupe_name"];
        $groupe["description"] = $row["description"];

         array_push($outputs["groupes"], $groupe);
    }
    // success
    $outputs["success"] = 1;
     echo json_encode($outputs);
} else {
    $outputs["success"] = 0;
    $outputs["message"] = "pas de groupes";
    // echo no users JSON
    echo json_encode($outputs);
}
}
?>