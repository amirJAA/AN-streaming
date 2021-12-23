<?php
$titre='A.N STREAMING ';
$titre2=' SERIES ';
$description = 'SERIES';    
$td = 'ser';  
$imgurl_1 = "http://image.tmdb.org/t/p/w300";
include_once 'include/header.inc.php';
include "include/util.inc.php"; 
include "include/functions.inc.php";
?>
<section id='search'>
        <form action="data_sserie.php" method="get" >
            <h1><label for='search'>Recherche</label></h1>
            <label>Titre :</label>
            <input placeholder='Titre, mots clefs...' type='search' name='search' id='search' required="true"/>
            <!--<input type='submit' name='search' id='search' />-->
            <input type="radio" id="salut" name="language" value="fr-FR" checked="checked" />
            <label for ="salut">Français</label>
            <input type="radio" id="hello" name="language" value="en-US" />
            <label for ="hello">Anglais</label>
            <button type="submit">Rechercher</button>
        </form>
        <p><strong>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</strong></p>
    <h2>Top 20 Séries du moments</h2>
    <?php
        $urlpop = "https://api.themoviedb.org/3/tv/popular?api_key=31062cc6637d51f70564ae9a768049cd&language=fr&page=1";
        $jsonpop = file_get_contents($urlpop);
        $obj = json_decode($jsonpop);

        echo"<p><strong>------------------------------------------------------------------------------------------------------------------------------------------------</strong></p>";
        foreach($obj->results as $p){

            echo " 
            
            <article>
                <h1> ". $p->name ." </h1>
                <p><strong>".$p->first_air_date."</strong></p>
                <a href=' data_ser.php?i=". $p->id ."'><img src='".$imgurl_1. $p->poster_path ."' alt='POSTER'/></a>
                <p> " . $p->vote_average . " /10 </p>
                <p><strong>------------------------------------------------------------------------------------------------------------------------------------------------</strong></p>
            </article>
        
            ";
        }
        
    ?>

</section>
<?php
include_once 'include/footer.inc.php';
?>
</body>
</html>