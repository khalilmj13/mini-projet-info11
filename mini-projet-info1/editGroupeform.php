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
                <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les ??tudiants</a>
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
            <a class="dropdown-item" href="etat.php">??tat des absences pour un groupe</a>
              </div>
            </li>
      
            <li class="nav-item active">
              <a class="nav-link" href="deconnexion.php">Se D??connecter <span class="sr-only">(current)</span></a>
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
        <h1 class="display-4">Editer Un Groupe</h1>
        <p>Remplir le formulaire ci-dessous afin d'ajouter un ??tudiant!</p>
      </div>
    </div>


    <div class="container">
      <form id="myForm" method="POST">
        <div class="form-group">
          <!-- <label for="nom">Cin:</label><br /> -->
          <input type="hidden" id="id" name="id" value="<?php echo $etd['id_groupe']; ?>" class="form-control" required  />
        </div>
        <!--Nom-->
        <div class="form-group">
          <label for="nom">Nom:</label><br />
          <input type="text" id="nom" name="nom" value="<?php echo $etd['groupe_name']; ?>" class="form-control" required  />
        </div>
        <!--Pr??nom-->
        <div class="form-group">
          <label for="description">description:</label><br />
          <input type="text" id="description" name="description" value="<?php echo $etd['description']; ?>" class="form-control" required />
        </div>
        <!--Email-->
        
        <!--Bouton Ajouter-->
        <button type="button" onclick="editer()" class="btn btn-primary btn-block">Editer</button>


      </form>
      <div id="demo"></div>
    </div>
  </main>


  <footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
  <script>
    function editer() {
      var xmlhttp = new XMLHttpRequest();
      var url = "http://localhost/mini-projet-info1/auth-php-mysql/editerGroupe.php";

      //Envoie Req
      xmlhttp.open("POST", url, true);

      form = document.getElementById("myForm");
      formdata = new FormData(form);
      xmlhttp.send(formdata);
      console.log(formdata);

      //Traiter Res

      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // alert(this.responseText);
          if (this.responseText == "OK") {
            document.getElementById("demo").innerHTML = "erreur";
            document.getElementById("demo").style.backgroundColor = "green";
            
          } else {
            document.getElementById("demo").innerHTML = "L'edit de groupe a ??t?? bien effectu??";
            document.getElementById("demo").style.backgroundColor = "#fba";
            window.location.href = `http://localhost/mini-projet-info1/afficherGroupes.php`;
          }
        }
      }


    }
  </script>

</body>

</html>