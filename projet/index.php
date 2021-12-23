<?php
$titre='A.N STREAMING ';
$titre2=' by Bouras.N and Jaafar.A from CYU Paris';
$description = 'ACCUEIL';    
$td = 'start';  
$imgurl = "http://image.tmdb.org/t/p/w300";
include_once 'include/header.inc.php';
include "include/util.inc.php"; 
?>
<section >
    <h1>Bienvenue sur notre plateforme de streaming.</h1>
    <p><strong>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</strong></p>
        <form action="data_s.php" method="get" >
            <h1><label for='search'>Recherche</label></h1>
            <label>Titre :</label>
            <input placeholder='Titre, mots clefs...' type='search' name='search' id='search'  required="true"/>
            <!--<input type='submit' name='search' id='search' />-->
            <label>Type :</label>
            <select name="channel">
                <option value="movie" selected="selected">Film</option>
                <option value="tv">Série</option>
            </select>
            <input type="radio" id="salut" name="language" value="fr-FR" checked="checked" />
            <label for ="salut">Français</label>
            <input type="radio" id="hello" name="language" value="en-US" />
            <label for ="hello">Anglais</label>
            <button type="submit">Rechercher</button>
        </form>
    <p><strong>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</strong></p>
    <h1>DERNIERE CONSULTATION</h1>
    <table>
        <tr>
            <th>
                <div id="der_F">
                    <p><strong>FILM</strong></p>
                    
                    <?php
                        if(isset($_COOKIE['cookmov'])){
                            $cookieM = $_COOKIE['cookmov'];
                            $cookieM = unserialize($cookieM);
                            $idM = $cookieM[1];
                            $dateM = $cookieM[0];
                            $urldatamov = "http://api.themoviedb.org/3/movie/".$idM."?api_key=31062cc6637d51f70564ae9a768049cd&language=fr-FR";
                            $jsondatamov = file_get_contents($urldatamov);
                            $objdata = json_decode($jsondatamov);
                            echo"
                            <article>
                                <p> ". $objdata->title ." </p>
                                <p> Consulté le : ". $dateM ." </p>
                                <a href=' data_mov.php?i=". $objdata->id ."'><img src='".$imgurl. $objdata->poster_path ."' alt='POSTER NON DISPONIBLE'/></a>
                                
                            </article>";
                    ?>
                    <a class="link" href= "data_mov.php?i=<?php echo $objdata->id ?>">Revoir</a>
                    <?php
                        }else{
                            echo " <p> XXX </p>";
                        }
                    ?>
                </div>
            </th>
            <th>
                <div id="der_S">
                    <p><strong>SERIE</strong></p>
                    <?php
                        if(isset($_COOKIE['cookser'])){
                            $cookieS = $_COOKIE['cookser'];
                            $cookieS = unserialize($cookieS);
                            $idS = $cookieS[1];
                            $dateS = $cookieS[0];
                            $urldataser = "http://api.themoviedb.org/3/tv/".$idS."?api_key=31062cc6637d51f70564ae9a768049cd&language=fr-FR";
                            $jsondataser = file_get_contents($urldataser);
                            $objdataser = json_decode($jsondataser);

                            echo"
                            <article>
                                <p> ". $objdataser->name ." </p>
                                <p> Consulté le : ". $dateS ." </p>
                                <a href=' data_ser.php?i=". $objdataser->id ."'><img src='".$imgurl. $objdataser->poster_path ."' alt='POSTER NON DISPONIBLE'/></a>
                            </article>";
                    ?>
                    <a class="link" href= "data_ser.php?i=<?php echo $objdataser->id ?>">Revoir</a>
                    <?php
                        }else{
                            echo " <p> XXX </p>";
                        }
                    ?>
                    
                </div>
            </th>
        </tr>
    </table>
    <p><strong>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</strong></p>
</section>

<?php
include_once 'include/footer.inc.php';
?>
</body>
</html>