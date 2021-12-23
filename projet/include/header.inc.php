<?php
declare(strict_types=1);
 echo "<!DOCTYPE html>\n";
 echo "<html lang=\"fr\">\n";
 echo "\n";
 echo "<head>\n";
 echo "    <link rel=\"stylesheet\" href=\"styles.css\" type=\"text/css\" />\n";
 echo "    <meta charset=\"utf-8\" />\n";
 echo "    <meta name=\"language\" content=\"FR\" />\n";
 echo "    <meta name=\"author\" content=\"JAAFAR Amir, BOURAS Nadia\" />\n";
 echo "    <meta name=\"keywords\" content=\"FILM, SERIE, NETFIX, PROJET DEV-WEB\" />\n";
 echo "    <meta name=\"date\" content=\"20/03/2021\" />\n";
 echo "    <title>$titre</title>\n";
 echo "\n";
 echo "</head>\n";
 echo "\n";
 echo "\t<body style=\"font-family: 'Times New Roman', Times, serif\">\n";
 echo "\t\t<section id=\"start\">\n";
 echo "\t\t\t<img src=\"images/acc.png\" alt=\"acc_logo\" width=\"250\"/>\n";
 echo "\t\t\t<h1>$titre2</h1>\n";
 echo "\t\t</section>\n";
 echo "\t\t<header style=\"border-radius: 12px\">\n";
  
echo '   
         <nav class="menu" >
            <ul>
               <li class="active"><a  href="index.php">A.N STREAMING</a></li>
               <li><a href="ser.php">SERIES</a></li>
               <li><a href="mov.php">FILMS</a></li>
               <li><a href="stat.php">STATISTIQUES</a></li>
               <li><a href="nasa.php">API APOD NASA</a></li>
               <li><a href="about_us.php">A PROPOS DE NOUS</a></li>
            </ul>
         </nav>';
      if($td=="mov"){
         echo '
            <nav class="ssmenu" >
                  <ul>
                     <li><a href="index.php#der_F">Dernière consultation</a></li>
                  </ul>
            </nav>
        </header>';
     }

      if($td=="ser"){
         echo '
            <nav class="ssmenu" >
                  <ul>
                     <li><a href="index.php#der_S">Dernière consultation</a></li>
                  </ul>
            </nav>
        </header>';
     }

      if($td=="stat"){
         echo '</header>';
      }
      if($td=="us"){
         echo '</header>';
      }
      if($td=="start"){
        echo '</header>';
     }
     if($td=="data"){
      echo '</header>';
   }
   if($td=="nasa"){
      echo '</header>';
   }
    if(isset($_GET["style"])) {
      if($_GET["style"] == "standard") {
        echo "\n\t\t".'<link rel="stylesheet" type="text/css" href="styles.css"/>'."\n";
      }
    }

    if(empty($_GET["style"])) {
      echo "\n\t\t".'<link rel="stylesheet" type="text/css" href="styles.css"/>'."\n";
    }

    if(isset($_GET["style"])) {
      if($_GET["style"] == "alternatif") {
        echo "\n\t\t".'<link rel="stylesheet" type="text/css" href="styletd8.css"/>'."\n";
      }
    }
 ?>