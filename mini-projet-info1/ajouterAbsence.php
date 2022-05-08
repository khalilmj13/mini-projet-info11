
<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
    include("connexion.php");
    
     
   @$ch=$_POST["ch"];
   @$valider=$_POST["valider"];
   echo $valider;
   echo '<br/>';
   if (isset($valider))
   {

   
   
   foreach($ch as $b)
   { 
       
    
    echo($b);
    
   
    echo'<br/>';
    $information=explode("_",$b);//information array de la forme  ligne_colonne_CIN_date-absence_group_matière
    $req=$pdo->prepare("insert into absence values(?,?,?,?,?,?)");
    echo'<br/>';
    echo($information[4]);
    echo'<br/>';

    if(in_array($information[1],array('1','3','5','7','9','11','13','15','17','19','21','23')))
    {$justif='non';}
    else
    {$justif='oui';}

    if(in_array($information[1],array('0','1','4','5','8','9','12','13','16','17','20','21')))
    {$quand='AM';}
    else
    {$quand='PM';}

    $group=$information[4];
    $matiere=$information[5];
    $date_absence=$information[3];

    /*echo $information[0];
    echo'--';
    echo $information[1];
    echo'--';
    echo $information[2];
    echo'--';
    echo $information[3];
    echo'--';
    echo $information[4]; 
    echo'--';
    echo $information[5];
    */

    if($req->execute(array($information[2],$group,$matiere,$date_absence,$quand,$justif)));
    {header("location:saisirAbsence.php");
        echo"<script>var xmlhttp = new XMLHttpRequest(); var url='http://localhost/mini-projet-info1/saisirAbsence.php';
        //Envoie Req
        xmlhttp.open('POST',url,true);
        message=String('Ajout d'absence effectué');
        xmlhttp.send(message);</script>";
    }
    echo'<br/>';

     
       
       
    }
   }
   else 
   {
       echo 'le inbut de nom Valider a la valeur nulle '; 
   }

   }
   ?>