<?php
session_start();

if($_SESSION["autoriser"]!="oui"){
   header("location:login.php");
   exit();
}
else {
include("connexion.php");
$option2 = isset($_GET['but2']) ? $_GET['but2'] : false;
$str=$_SESSION['login'];
$req="select distinct module FROM triplet where login= '$str'and Classe='$option2'";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs["module"]=array();

  while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) 
  {
     array_push($outputs["module"], $row["module"]);
  }
// success
$outputs["success"] = 1;
echo json_encode($outputs);
} else {
$outputs["success"] = 0;
$outputs["message"] = "table triplet vide ";
// echo no users JSON
echo json_encode($outputs);
}
}
  ?>