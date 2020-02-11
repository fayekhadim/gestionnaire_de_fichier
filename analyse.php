 <?php 
 session_start();

                    // creation


     function creer(){
       $route = 'doc/';
       $nom = 'Nouveau_'.rand().'.txt';
       $nom_a = $route.''.$nom;
       if(fopen($nom_a, "a+")){ 
       include('connec.php');
              $ajout = $base-> prepare('INSERT INTO route(nom_c,chemin) VALUES(?,?)') ;
              $ajout-> execute(array($nom, $nom_a
          ));
        fclose(fopen($nom_a, "+a"));
        header("Location:pagea.php");
        }     
     }
     // mkdir('a');
     if(isset($_POST['soumet_c'])){
      creer();
     }

              //   Ouvrir
      

     if(isset($_POST['soumet_o'])){
      $chemin = $_POST['choix'];
      echo '<span style="color:blue;">'.$chemin.'</span><br>' ;
      $doc_a_o = fopen($chemin, "r");
      while(!feof($doc_a_o)){
        echo fgets($doc_a_o) . "<br>";
      }
     }


                //    Modifier


     if(isset($_POST['soumet_m'])){
      $chemin = $_POST['choix'];
      $_SESSION['chemin'] = $chemin;
      header("Location:modif.php");
     }

     if(isset($_POST['soumet_ma'])){
      $selec = $_POST['genre'];
      $contenu = $_POST['messag'];
      if ($selec == 'nom') {
        include('connec.php');
        $modif = $base-> prepare('UPDATE route SET nom_c = :contenu WHERE chemin = :chemin');
        $modif-> execute(array(
                                'contenu' => $contenu,
                                'chemin' => $_SESSION['chemin']
        ));
         header("Location:pagea.php");
      }
      if($selec == 'contenu'){

            $docs = fopen($_SESSION['chemin'], "r+");
            fwrite($docs, $contenu);
            fclose($docs);
            header("Location:pagea.php");
      }
     
     }


                      //    Supprimer


     if(isset($_POST['soumet_sup'])){
      $chemin = $_POST['choix'];
      include('connec.php');
      $supp = $base-> prepare('DELETE FROM route WHERE chemin = :chemin');
      $supp-> execute(array(
                              'chemin' => $chemin
      ));
      header("Location:pagea.php");
     }
     ?>