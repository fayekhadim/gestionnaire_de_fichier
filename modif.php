<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Table 1</title>
</head>
<body>
    <!--  -->
    <div class="main">
     <div class="header">
        <h2>Exploration de fichier</h2>
        <h4>Modification de fichiers</h4>
     </div>
     <div class="formcontent">
    <h2>Merci de sélectionnner le de modification que vous voulez appliquer</h2>
    <p>
    <form action="analyse.php" method="post">
     
     </p>
      <?php 
        include('connec.php');
        $doc = $base-> prepare('SELECT * FROM route WHERE chemin = :chemn');
        $doc-> execute(array(
              'chemn' => $_SESSION['chemin']
        ));
        while ($donnee = $doc-> fetch()) {
          echo '<input type="radio" name="choix" value="'.$donnee['chemin'].'"> '.$donnee['id_c'].' '.$donnee['nom_c'].'<br>';
        }
        $doc = null;
       ?>
       <table>
       <tr>
        <td><label>Le genre de modification</label> :</td>
        <td><select name="genre">
      <option>choix</option>
           <option value="nom">nom du document</option>
           <option value="contenu">contenu du document</option>
            </select></td>
      </tr>
      <tr>
        <td><label for="mess">text</label> :</td>
        <td><textarea name="messag" id="mess" required></textarea></td>
      </tr>
      </table>
     <div class="btns">
      
         <ul>
             <li><button type="submit" name="soumet_ma" value="soumet_ma">Modifier</button></li>
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