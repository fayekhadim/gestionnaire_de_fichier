<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <script src="jquery.min.js"></script> -->
    <link rel="stylesheet" href="main.css">
    <title>fichier</title>
</head>
<body>
    
    <div class="main">
     <div class="header">
        <h2>Exploration de fichier</h2>
        <h4>Affichage des fichiers</h4>
     </div>
     <section id="ajax">
        <div>
            <?php include("test.php") ?>
        </div>
    </section>
     <div class="formcontent">
    <h2>Sélectionnner le fichier que vous voulez consulter</h2>
    
    <p>
    <form action="analyse.php" method="post">
     
     </p>
      <?php 
        include('connec.php');
        $doc = $base-> query('SELECT * FROM route');
        while ($donnees = $doc-> fetch()) {
          echo '<input type="radio" name="choix" value="'.$donnees['chemin'].'"> <img img/src="fichier.png" width="25"> '.$donnees['nom_c'].'<br>';
        }
        $doc = null;
       ?>
     <div class="btns">
         <ul>
             <li><button type="submit" name="soumet_o" value="soumet_o"><img src="img/ouvrir.png" width="40"></button></li>
             <li><button type="submit" name="soumet_m" value="soumet_m"><img src="img/modif.png" width="40"></button></li>
             <li><button type="submit" name="soumet_c" value="soumet_c"><img src="img/creer.png" width="40"></button></li>
             <li><button type="submit" name="soumet_sup" value="soumet_sup"><img src="img/supprimer.jpg" width="40"></button></li>
         </ul>
     </div>
     <div class="resultat"></div>
    </form>
     </div>
     <div class="sortie">
	 </div>



    </div>
</body>
</html>