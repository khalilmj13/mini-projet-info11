<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
include("connexion.php");

$cin = $_GET['id'];
$sel=$pdo->prepare("select cin from etudiant where cin=? limit 1");
$sel->execute(array($cin)); 
$tab=$sel->fetchAll();

if(count($tab)==0)
$erreur="NOT OK";// Etudiant existe déja
else{
    $req="DELETE FROM `etudiant` WHERE `cin`=$cin";
    $reponse = $pdo->exec($req) or die("error");
    $erreur ="OK";
}  
// header("location:../afficherEtudiants.php");
}
?>