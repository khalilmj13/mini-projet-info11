<?php
 
    include("connexion.php");
    $date=$_REQUEST['date'];
    $classe=$_REQUEST['classe'];
    $module=$_REQUEST['module_t'];
    // var_dump($module);
    $abs=$_REQUEST['abs'];
    
    $req="insert into absent values ('$date','$module','$abs','$classe')";
   // $req = "INSERT INTO absent(date, module_t, nb_abs, classe) VALUES ('$date', '$module', '$abs','$classe')";

    $reponse = $pdo->exec($req) ; 
   
?>