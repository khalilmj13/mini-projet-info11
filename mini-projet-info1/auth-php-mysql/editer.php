<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$cin=$_REQUEST['cin'];
$nom=$_REQUEST['nom'];
$prenom=$_REQUEST['prenom'];
$email=$_REQUEST['email'];
$adresse=$_REQUEST['adresse'];
$pwd=$_REQUEST['pwd'];
$cpwd=$_REQUEST['cpwd'];

$classe=$_REQUEST['classe'];

include("connexion.php");
         $sel=$pdo->prepare("select cin from etudiant where cin=? limit 1");
         $sel->execute(array($cin));
         $tab=$sel->fetchAll();
         if(count($tab)==0)
            $erreur="NOT OK";// Etudiant existe déja
         else{
            $req="UPDATE `etudiant` SET `cin`=$cin,`email`='$email',`password`='$pwd',`cpassword`='$cpwd',`nom`='$nom',`prenom`='$prenom',`adresse`='$adresse',`Classe`='$classe' WHERE `cin`=$cin";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="OK";
         }  
         echo $erreur;
}
?>