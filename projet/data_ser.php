<?php
    $titre='A.N STREAMING ';
    $titre2=' ';
    $description = '';    
    $td = 'data';  
    $id_tv = $_GET['i'];
    $cookie = array(date("y-m-d, h:i"),$id_tv);
    $cookie = serialize($cookie);
    setcookie("cookser",$cookie, time()+3600*24*7, "/projet", "", 0, 0);
    include_once 'include/header.inc.php';
    require_once "include/util.inc.php"; 
    $imgurl = "http://image.tmdb.org/t/p/w300";

?>
        <section>
            <?php 
                if(isset($_GET['i'])){ 
                    $urldatamov = "http://api.themoviedb.org/3/tv/".$id_tv."?api_key=31062cc6637d51f70564ae9a768049cd&language=fr-FR";
                    $jsondatamov = file_get_contents($urldatamov);
                    $objdata = json_decode($jsondatamov);

            ?>
            <h1><?php echo $objdata->name ;?></h1>
            <a class="link" href= "<?php echo $objdata->homepage ?>">ACCEDER A LA SERIE</a>
                <div class="resultsearch" style=" text-align: justify">
                <table>
                    <tr>
                        <th>
                            
                                <img src="<?php echo $imgurl.$objdata->poster_path ?>" alt="POSTER NON DISPONIBLE"/>  
                            
                        </th> 
                        <th>
                            <div>
                                <p><strong>Titre original : </strong><em> <?php echo $objdata->original_name ;?></em></p>
                                <p><strong>Type : </strong><em> Série </em></p>
                                <p><strong>Auteur(s) : </strong>
                                    <em> 
                                        <?php 
                                            foreach($objdata->created_by as $y){
                                                echo '<span>' . $y->name . ',</span> ';
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
                                <p><strong>Date de sortie : </strong><em> <?php echo $objdata->first_air_date ;?></em></p>
                                <p><strong>Nombre de saisons : </strong><em> <?php echo $objdata->number_of_seasons ;?> </em></p>
                                <p><strong>Nombre d' épisodes : </strong><em> <?php echo $objdata->number_of_episodes ;?> </em></p>
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
                $title = $objdata->name;
                $filename = "./ser.csv" ;
                CSVs($title,$filename);

                $title = 'SÉRIES';
                $filename = "./glob.csv" ;
                CSVs($title,$filename);
            ?>
            
            <p><strong>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</strong></p>
            <h1>Extraits et bandes annonces </h1>
            <?php 
                $urlvidmov = "http://api.themoviedb.org/3/tv/".$id_tv."/videos?api_key=31062cc6637d51f70564ae9a768049cd&language=fr-FR";
                $jsonvidmov = file_get_contents($urlvidmov);
                $objviddata = json_decode($jsonvidmov);
                foreach($objviddata ->results as $video){
                    echo '<iframe width="560" height="315" src="'."https://www.youtube.com/embed/".$video->key.'" frameborder="0" allowfullscreen="true"></iframe>';
                }
            }
            ?>
            <p><strong>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</strong></p>
            <h1> Séries similaires</h1>
            <?php 
                $urlsimmov = "http://api.themoviedb.org/3/tv/".$id_tv."/similar?api_key=31062cc6637d51f70564ae9a768049cd&language=fr-FR";
                $jsonsimmov = file_get_contents($urlsimmov);
                $objsimdata = json_decode($jsonsimmov);
                echo"<p><strong>------------------------------------------------------------------------------------------------------------------------------------------------</strong></p>";
                foreach($objsimdata->results as $u){

                    echo " 
                    
                    <article>
                        <h1> ". $u->name ." </h1>
                        <p><strong>".$u->first_air_date."</strong></p>
                        <a href=' data_ser.php?i=". $u->id ."'><img src='".$imgurl. $u->poster_path ."' alt='POSTER NON DISPONIBLE'/></a>
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