<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$nom= $_REQUEST['nom'];
$desc= $_REQUEST['desc'];
var_dump($nom);
include("connexion.php");
$req = "INSERT INTO groupe(groupe_name, description) VALUES ('$nom', '$desc')";
$reponse = $pdo->exec($req) or die("error");
$erreur ="OK";
echo $erreur;
       
}
?>