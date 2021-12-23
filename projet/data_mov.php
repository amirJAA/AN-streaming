<?php
    $titre='A.N STREAMING ';
    $titre2=' ';
    $description = '';    
    $td = 'data';  
    $id_movie = $_GET['i']; 
    $cookie = array(date("y-m-d, h:i"),$id_movie);
    $cookie = serialize($cookie);
    setcookie("cookmov",$cookie, time()+3600*24*7, "/projet", "", 0, 0);
    include_once 'include/header.inc.php';
    require_once "include/util.inc.php"; 
    $imgurl = "http://image.tmdb.org/t/p/w300";

?>
        <section>
            <?php 
                if(isset($_GET['i'])){
                    $urldatamov = "http://api.themoviedb.org/3/movie/".$id_movie."?api_key=31062cc6637d51f70564ae9a768049cd&language=fr-FR";
                    $jsondatamov = file_get_contents($urldatamov);
                    $objdata = json_decode($jsondatamov);
                  
            ?>
            <h1><?php echo $objdata->title ;?></h1>
            <a class="link" href= "<?php echo $objdata->homepage ?>">ACCEDER AU FILM</a>
            <div class="resultsearch" style=" text-align: justify">
                <table>
                    <tr>
                        <th>
                            
                                <img src="<?php echo $imgurl.$objdata->poster_path ?>" alt="POSTER NON DISPONIBLE"/>
                            
                        </th> 
                        <th>
                            <div>
                                <p><strong>Titre original : </strong><em> <?php echo $objdata->original_title ;?></em></p>
                                <p><strong>Type : </strong><em> Film </em></p>
                                <p><strong>Genre(s) : </strong>
                                    <em> 
                                        <?php 
                                            foreach($objdata->genres as $g){
                                                echo '<span>' . $g->name . ',</span> ';
                                            }
                                        ?>
                                    </em>
                                </p>
                                <p><strong>Pays de production : </strong>
                                    <em> 
                                        <?php 
                                            foreach($objdata->production_countries as $ptc){
                                                echo $ptc->name." ";
                                            }
                                        ?>
                                    </em>
                                </p>
                                <p><strong>Date de sortie : </strong><em> <?php echo $objdata->release_date ;?></em></p>
                                <p><strong>Durée : </strong><em> <?php echo $objdata->runtime ;?> min</em></p>
                                <p><strong>Producteur(s) : </strong>
                                    <em> 
                                        <?php 
                                            foreach($objdata->production_companies as $pbc){
                                                echo $pbc->name.", ";
                                            }
                                        ?>
                                    </em>
                                </p>
                                <p><strong>Note : </strong><em> <?php echo $objdata->vote_average ;?> /10</em></p> 
                            </div>
                            <div>
                                <h3>Synopsis :</h3>
                                <p><?php echo $objdata->overview ;?></p>
                            </div>
                        </th>
                    </tr> 
                </table>
            </div>
            <?php
                $title = $objdata->title;
                $filename = "./mov.csv" ;
                CSVs($title,$filename);

                $title = 'FILMS';
                $filename = "./glob.csv" ;
                CSVs($title,$filename);
            ?>
           
            <p><strong>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</strong></p>
            <h1>Extraits et bandes annonces </h1>
                <?php 
                    $urlvidmov = "http://api.themoviedb.org/3/movie/".$id_movie."/videos?api_key=31062cc6637d51f70564ae9a768049cd&language=fr-FR";
                    $jsonvidmov = file_get_contents($urlvidmov);
                    $objviddata = json_decode($jsonvidmov);
                    foreach($objviddata ->results as $video){
                        echo '<iframe width="560" height="315" src="'."https://www.youtube.com/embed/".$video->key.'" frameborder="0" allowfullscreen="true"></iframe>';
                    }
                }
                ?>
             <p><strong>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</strong></p>
            <h1> Films similaires</h1>
            <?php 
                $urlsimmov = "http://api.themoviedb.org/3/movie/".$id_movie."/similar?api_key=31062cc6637d51f70564ae9a768049cd&language=fr-FR";
                $jsonsimmov = file_get_contents($urlsimmov);
                $objsimdata = json_decode($jsonsimmov);
                echo"<p><strong>------------------------------------------------------------------------------------------------------------------------------------------------</strong></p>";
                foreach($objsimdata->results as $u){

                    echo " 
                    
                    <article>
                        <h1> ". $u->title ." </h1>
                        <p><strong>".$u->release_date."</strong></p>
                        <a href=' data_mov.php?i=". $u->id ."'><img src='".$imgurl. $u->poster_path ."' alt='POSTER NON DISPONIBLE'/></a>
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