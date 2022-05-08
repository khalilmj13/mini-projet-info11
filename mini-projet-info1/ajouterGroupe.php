<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Afficher Etudiants</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">

</head>
<body onload="refresh()">
<nav class="navbar navbar-expand-md navbar-dark fixed-top "style="background-color: #1E90FF	 ;">
<a class="navbar-brand animated bounce " id="animated-img1" href="index.php"><img id="logo" src="http://www.enicarthage.rnu.tn/assets/images/logo.png"alt="logo" width=45%/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
        
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
          <a class="dropdown-item" href="afficherGroupes.php">Lister tous les groupes </a>
                <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
                <a class="dropdown-item" href="ajouterGroupe.php">Ajouter Groupe</a>
                
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="ajouterEtudiant.php">Ajouter Etudiant</a>
                <a class="dropdown-item" href="chercherEtudiant.php">Chercher Etudiant</a>
                
      
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="saisir1.php">Saisir Absence</a>
            <a class="dropdown-item" href="etat.php">État des absences pour un groupe</a>
              </div>
            </li>
      
            <li class="nav-item active">
              <a class="nav-link" href="deconnexion.php">Se Déconnecter <span class="sr-only">(current)</span></a>
            </li>
      
          </ul>
        
      
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Saisir un groupe" aria-label="Chercher un groupe">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher Groupe</button>
          </form>
        </div>
      </nav>
  <main role="main">
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-4">Ajouter un groupe</h1>
        <p>Remplir le formulaire ci-dessous afin d'ajouter un étudiant!</p>
      </div>
    </div>


    <div class="container">
      <form id="myForm" method="POST">
        <div id="demo"></div>
        <!-- nom -->
        <div class="form-group">
          <label for="nom">groupe name:</label><br>
          <input type="text" id="nom" name="nom" class="form-control" required autofocus>
        </div>
        <!-- description -->
        <div class="form-group">
          <label for="desc">description:</label><br>
          <input type="text" id="desc" name="desc" class="form-control" required>
        </div>
        <!--Bouton Ajouter-->
        <button type="button" onclick="ajouter()" class="btn btn-primary btn-block">Ajouter</button>


      </form>
    </div>
  </main>
  <script>
    function ajouter() {

      var xmlhttp = new XMLHttpRequest();
      var url = "http://localhost/mini-projet-info1/auth-php-mysql/ajouterGroupee.php";

      //Envoie Req
      xmlhttp.open("POST", url, true);

      form = document.getElementById("myForm");
      formdata = new FormData(form);
      console.log(formdata);
      xmlhttp.send(formdata);

      //Traiter Res

      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // alert(this.responseText);
          if (this.responseText == "OK") {
            document.getElementById("demo").innerHTML = "L'ajout est pas terminer";
            document.getElementById("demo").style.backgroundColor = "green";
           } 
           else {
            document.getElementById("demo").innerHTML = "L'ajout du groupe a été bien effectué";
            document.getElementById("demo").style.backgroundColor = "#fba";
          }
        }
      }


    }
  </script>

  <footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
  
</body>

</html>