<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
include("connexion.php");
    $cin = $_GET['id'];
    $req="DELETE FROM `groupe` WHERE `id_groupe`=$cin";
    $reponse = $pdo->exec($req) or die("error");
    // $erreur ="OK";

// header("location:../afficherEtudiants.php");
}
?>