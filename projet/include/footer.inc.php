<?php
  echo "    <footer>\n";
  echo "\t<div id='scroll_to_top'>\n";
  echo "        \t\t<a href=\"#start\"><img src=\"images/retour.png\" alt=\"RETOUR EN HAUT\" width=\"60\"/> </a>\n";
  echo "\t</div>";
 
  include_once "include/util.inc.php"; 
?>
			<p class='position_auteur'> Auteurs : JAAFAR Amir &amp; BOURAS Nadia</p>
			<p class='position_version'> Nombre de visites : <?php echo compteur() ?></p>
  <?php
    if(empty($_GET["language"])){
        echo datetoday("fr");
    }
    if(isset($_GET["language"])) {
        if($_GET["language"] == "en") {
          echo datetoday("en");
        }
        else {
          echo datetoday();
        }
    }
  ?>
  <div id="geo">
    <?php
      $url = "http://www.geoplugin.net/xml.gp?ip=".$_SERVER['REMOTE_ADDR'];
      $xml = simplexml_load_file($url);

      //api_key=nx7nsNiogbwYkn6dfAQZC5SnhrlFwb&

      echo    "\t\t\t".'<h3> Votre localisation : </h3>'."\n",
              "\t\t\t".'<p>'.$xml->geoplugin_city.', '.$xml->geoplugin_regionName.', '.$xml->geoplugin_region.', '.$xml->geoplugin_countryName.'</p>'."\n",
              "\t\t".'</div>';
      echo "    \n\t</footer>\n";
  ?>
