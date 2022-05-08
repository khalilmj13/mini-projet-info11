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
        <h2 class="display-4">affichage absences d'un etudiant dans le module Tech.web </h2>
        <p>Cliquer sur le bouton afin d'actualiser la liste!</p>
        <form class="page-header-signup mb-2 mb-md-0" id="myForm" method="POST">
          <div class="form-row justify-content-center">
            <div class="col-lg-6 col-md-8">
              <div class="form-group mr-0 mr-lg-2">
                <input id="search" name="search" class="form-control form-control-solid rounded-pill" type="text" placeholder="affiche absence par cin.." />
              </div>
            </div>
            <div class="col-lg-3 col-md-4">
              <button class="btn btn-primary btn-block btn-marketing rounded-pill" type="button" onclick="refresh()" name="search">rechercher</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="table-responsive">
          <div id="demo"></div>
        </div>

  </main>


  <footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
  <script>
    function refresh() {
      var xmlhttp = new XMLHttpRequest();
      var xml = new XMLHttpRequest();
      var key = document.getElementById('search').value;
      var url = `http://localhost/mini-projet-info1/auth-php-mysql/chercher1.php?key=${key}`;

      xmlhttp.open("GET", url, true);
    
      xmlhttp.send();



      //Traiter la reponse
      xmlhttp.onreadystatechange = function() { // alert(this.readyState+" "+this.status);
        if (this.readyState == 4 && this.status == 200) {
          myFunction(this.responseText);
          console.log(this.responseText);
          //console.log(this.responseText);
        }
      }

      //Parse la reponse JSON
      function myFunction(response) {
        var obj = JSON.parse(response);
        //alert(obj.success);

        if (obj.success == 1) {
          var arr = obj.etudiants;
          var i;
          var out = "<table  class='table table-striped table-hover' >";
          out += " <tr><th>CIN</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Classe</th><th>nb_justifee</th><th>nb_non</th></tr>";
          for (i = 0; i < arr.length; i++) {
            out += "<tr><td>" +
              arr[i].cin +
              "</td><td>" +
              arr[i].nom +
              "</td><td>" +
              arr[i].prenom +
              "</td><td>" +
              arr[i].email +
              "</td><td>" +
              arr[i].classe +
              "</td><td>" + 
              arr[i].nb_j +
              "</td><td>"+
              arr[i].nb_n +
              "</td>" + 
              "</td></tr>";
          }
          out+=""
          out += "</table>";
          document.getElementById("demo").innerHTML = out;
        } else document.getElementById("demo").innerHTML = "Aucune Resultat!";

      }

    }
  </script>
</body>

</html>