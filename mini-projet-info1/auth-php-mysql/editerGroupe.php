<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$id=$_REQUEST['id'];
$nom=$_REQUEST['nom'];
$prenom=$_REQUEST['description'];
$classe=$_REQUEST['classe'];

include("connexion.php");
         // $sel=$pdo->prepare("select cin from etudiant where cin=? limit 1");
         // $sel->execute(array($cin));
         // $tab=$sel->fetchAll();
         // if(count($tab)==0)
         //    $erreur="NOT OK";// 
         // else{
            $req="UPDATE `groupe` SET `id_groupe`=$id,`groupe_name`='$nom',`description`='$prenom' WHERE `id_groupe`=$id";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="OK";
         // }  
         echo $erreur;
}
?>