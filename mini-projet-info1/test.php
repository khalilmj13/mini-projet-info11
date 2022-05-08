<?php
include('connexion.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SCO-ENICAR Saisir Absence</title>
  <!-- Bootstrap core CSS -->
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap core JS-JQUERY -->
  <script src="./assets/dist/js/jquery.min.js"></script>
  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="./assets/jumbotron.css" rel="stylesheet">

</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">SCO-Enicar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
            <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
            <a class="dropdown-item" href="ajouterGroupe.php">Ajouter Groupe</a>
            <a class="dropdown-item" href="modifierGroupe.php">Modifier Groupe</a>
            <a class="dropdown-item" href="supprimerGroupe.php">Supprimer Groupe</a>

          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="ajouterEtudiant.php">Ajouter Etudiant</a>
            <a class="dropdown-item" href="chercherEtudiant.php">Chercher Etudiant</a>
            <a class="dropdown-item" href="modifierEtudiant.php">Modifier Etudiant</a>
            <a class="dropdown-item" href="supprimerEtudiant.php">Supprimer Etudiant</a>


          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="saisirAbsence.php">Saisir Absence</a>
            <a class="dropdown-item" href="etatAbsence.php">État des absences pour un groupe</a>
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
        <h1 class="display-4">Signaler l'absence pour tout un groupe</h1>
        <p>Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</p>
      </div>
    </div>
    <div class="container">
      <form id="myForm" method="POST">
        <div id="demo"></div>
        <?php
        $date = $_GET['date'];
        $classe = $_GET['classe'];
        $module_t = $_GET['module_t'];
        var_dump ($date);
        var_dump($classe);
        var_dump($module_t); // affichage au dessus de tableau  
        ?>
        <?php
        $sql1 = "SELECT * from etudiant where Classe='$classe' ";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute();
        $nbeleve = $stmt1->rowCount();
        ?>
        <input type="hidden" name="date" value="<?php echo $_GET['date']; ?>">
        <input type="hidden" name="classe" value="<?php echo $_GET['classe']; ?>">
        <input type="hidden" name="module_t" value="<?php echo $_GET['module_t']; ?>">
        <table rules="cols" frame="box">
          <tr>
          <th><?php echo "classe : \t".$classe ?> </th>
          </tr>
          <tr>
            <th><?php echo $nbeleve ?> étudiants</th>
            
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <?php

            $week_nb = $date;
            $w =  substr("$week_nb", 6);
            $w = intval($w);

            for ($i = 1; $i <= 365; $i++) {
              $week = date("W", mktime(0, 0, 0, 1, $i, date("Y")));
              if ($week == $w) {
                for ($d = 0; $d < 6; $d++) {
                  $date = date("l d/m/Y", mktime(0, 0, 0, 1, $i + $d, date("Y")));
                  echo '<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">' . date("l d/m/Y", mktime(0, 0, 0, 1, $i + $d, date("Y"))) . "</th>" . "<br />";
                }
                break;
              }
            }
            ?>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <th>AM</th>
            <th>PM</th>
            <th>AM</th>
            <th>PM</th>
            <th>AM</th>
            <th>PM</th>
            <th>AM</th>
            <th>PM</th>
            <th>AM</th>
            <th>PM</th>
            <th>AM</th>
            <th>PM</th>
          </tr>
          <?php
          $sql = "SELECT * from etudiant where Classe='$classe' ";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          while ($etudiants = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nom = $etudiants['nom'];
            $prenom = $etudiants['prenom'];
            $classe = $etudiants['Classe'];
            $cin = $etudiants['cin'];
             $full_name = $nom . " " . $prenom;
          ?>
            <tr class="row_3">
              <td><b><?php echo $full_name ?></b></td>
              <td><input type="checkbox" name="check[]" value="AM"></td>
              <td><input type="checkbox" name="check[]" value="PM"></td>
              <td><input type="checkbox" name="check[]" value="AM"></td>
              <td><input type="checkbox" name="check[]" value="PM"></td>
              <td><input type="checkbox" name="check[]" value="AM"></td>
              <td><input type="checkbox" name="check[]" value="PM"></td>
              <td><input type="checkbox" name="check[]" value="AM"></td>
              <td><input type="checkbox" name="check[]" value="PM"></td>
              <td><input type="checkbox" name="check[]" value="AM"></td>
              <td><input type="checkbox" name="check[]" value="PM"></td>
              <td><input type="checkbox" name="check[]" value="AM"></td>
              <td><input type="checkbox" name="check[]" value="PM"></td>
              <td> <input type="button" name="val" onclick="absent()" >ok </td>

            </tr>
            <a name="cin" id="cin" value="<?php $cin = $etudiants['cin']; ?>"></a>

            <?php 
            $count=0; 
            if ( isset($_POST['val'])){
                if(!empty($_POST['check'])){
                    foreach($_POST['check'] as $value) {
                        $count+=1 ; 
                      
                    }
                }
            }
            ?>
          <?php 

          }
          ?>
        </table>
        <br>
        <!--Bouton Valider-->
        <button type="button"  class="btn btn-primary btn-block">Valider</button>
      </form>

    </div>
  </main>

  <footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
  <script>
    function absent() {
      var xmlhttp = new XMLHttpRequest();
      //var cin =  document.getElementsById('cin').value; 
      var url = "http://localhost/mini-projet-info1/auth-php-mysql/absent.php";
      var elements = document.getElementsByName('check[]');

      var data = []; 
      var nb = 0; 
      for (var i = 0; i < elements.length; i++) {
        if (elements[i].checked) {
          nb=nb+1;
          
        }
        else {
          nb=nb ; 
        }
      }
      data.push(nb);
      //Envoie Req
      let abs = data.toString();
      console.log(abs)
      xmlhttp.open("POST", url, true);

      form = document.getElementById("myForm");
      formdata = new FormData(form);
      formdata.append('abs', abs);
      //formdata.append('cin', cin);

      // console.log(formdata);
      xmlhttp.send(formdata);


      //Traiter Res

      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           alert(this.responseText);
          if (this.responseText == "OK") {
            // window.location.href="http://localhost/mini-projet-info1/saisirAbsence.php"; 
            alert("111");
            // document.getElementById("demo").innerHTML = "L'edit de l'étudiant a été bien effectué";
            // document.getElementById("demo").style.backgroundColor = "green";
          } else {
            // window.location.href="http://localhost/mini-projet-info1/saisirAbsence.php"; 
            alert("kkk");
          
            // document.getElementById("demo").innerHTML = "L'étudiant est déjà inscrit, merci de vérifier le CIN";
            // document.getElementById("demo").style.backgroundColor = "#fba";
          }
        }
      }
      // window.location.href="http://localhost/mini-projet-info1/saisirAbsence.php"; 


    }
  </script>
</body>

</html>