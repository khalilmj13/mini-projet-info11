
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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Walid SAAD">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SCO-ENICAR</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body onLoad="document.fo.login.focus()">
    
  <nav class="navbar navbar-expand-md navbar-dark fixed-top "style="background-color: #1E90FF	 ;">
<a class="navbar-brand animated bounce " id="animated-img1" href="index.php"><img id="logo" src="http://www.enicarthage.rnu.tn/assets/images/logo.png"alt="logo" width=45%/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link .animated .bounce " href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
          <a class="dropdown-item" href="afficherGroupes.php">Lister tous les groupes </a>
          <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
          <a class="dropdown-item" href="ajouterGroupe.php">Ajouter Groupe</a>
         

        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="http://localhost/mini-projet-info1/AjouterEtudiant.php">Ajouter Etudiant</a>
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

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3"><?php echo $bienvenue?></h1>
      <p></p>
      <i class="fas fa-car-side fa-3x" data-mdb-toggle="animation" >  
      <p><a class="btn btn-primary btn-lg" data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-right"  href="http://localhost/mini-projet-info1/afficherGroupes.php" role="button">Mes Groupes &raquo;</a></p>
    </i>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
      <i class="fas fa-car-side fa-3x" data-mdb-toggle="animation" >  
      <h2>INFO1</h2>
        <p>   espace etudiant de groupe 1er annnée cycle ingénieur informatique à l'enicarthage  <br/> bienvenu ! </p>
        <p><a class="btn btn-primary " href="#" data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-right"  role="button">Voir les Groupes &raquo;</a></p>
        </i>
      </div>
      <div class="col-md-4">
      <i class="fas fa-car-side fa-3x" data-mdb-toggle="animation" >  
        <h2>INFO2</h2>
        <p>   espace etudiant de groupe 2éme annnée cycle ingénieur informatique à l'enicarthage  <br/> bienvenu ! </p>
        <p><a class="btn btn-primary " Color="blue" href="#" role="button">Voir les Groupes &raquo;</a></p>
    </i>
      </div>
      <div class="col-md-4">
      <i class="fas fa-car-side fa-3x" data-mdb-toggle="animation" >  
        <h2>INFO3</h2>
        <p>   espace etudiant de groupe 3ème annne cycle ingénieur informatique à l'enicarthage  <br/> bienvenu ! </p>
        <i class="fas fa-car-side fa-3x" data-mdb-toggle="animation" >  
        <p><a class="btn btn-primary " href="#" role="button">Voir les Groupes &raquo;</a></p>
    </i>
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>


<footer class="container">
  <p>&copy; ENICAR 2021-2022</p>
</footer>


   
      
  </body>
</html>
