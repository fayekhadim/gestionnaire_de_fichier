
        

          <?php

                  $racine='./pagea.php';

             
              $yoon="";
                  echo "<a href='$racine'><img src='img/accueil.jpg' width='40' height='40'></a>";

              if(sizeof($_GET) != 0)
                {
                  $yoon =
                  $_GET["path"];
              }

              if(strlen($yoon)==0) $yoon=".";
              else if ($yoon !=".")
              {
                  $parent_dir = substr($yoon,0,strrpos($yoon,"/")); 


                      echo "<a href='./pagea.php?path=$parent_dir'><img src='img/retour.jpg' width='40' height='40'></a>";

                  ?>

              <?php
              }
              
              $dir = opendir($yoon);
              $directories=array();
              $files=array();
              while($file = readdir($dir))
              {
                  if($file != "." && $file != "..")
                  {
                      
                      if(is_dir("$yoon/$file"))
                      {
                          $directories[]="$file";
                      }
                      else $files[]="$file";
                  }
              }
              
                  if(isset($directories))
                      {
                          sort($directories);
                          foreach($directories as $d) 
                          {
                                           
                              echo "<tr><th scope='row'><a href='./pagea.php?path=$yoon/$d'><img src='img/dossier.jpg'width='40' height='40' ><br>$d</a></th> <td>&nbsp;&nbsp;&nbsp;&nbsp;<br></td> <td></td></tr>";
                               
                          ?>

                          <?php
                          }
                      }


            
                  if(isset($files))
                  {
                      sort($files);
                  if($files!= 'pagea.php')
                  {
                      foreach($files as $files2)

                      {
                           $extension = pathinfo($files2, PATHINFO_EXTENSION);

                           if ($extension=="pdf")
                            {
                                echo "<tr><th scope='row'><a href=\"$yoon/$files2\" > <img src='img/pdf.png' width='25' height='25'></th></tr>";
                           }

                           elseif ($extension == "png"  || $extension =="jpg"|| $extension =="JPG" || $extension =="jpeg" || $extension =="ico" )
                            {


                                echo "<tr><th scope='row'><a href=\"$yoon/$files2\" > <img src='img/img.png' width='25' height='25'></a></th></tr>";

                           }
                            
                            elseif ($extension == "doc" || $extension == "docx" )
                            {


                                echo "<tr><th scope='row'><a href=\"$yoon/$files2\" > <img src='img/doc.png' width='25' height='25'></a></th></tr>";

                           }


                           else if ( $extension!="pdf" && "png" && "jpg"&& "JPG" && "jpeg" && "mp3" && "ico" && "doc" && "docx")
                               {
                          echo "<tr><th scope='row'><a href=\"$yoon/$files2\" > <img src='img/fich.png' width='25' height='25'></a></th></tr>";}           

                      }
                  }
                  }
                 
              closedir($dir);
           ?>
      