<?php
    $titre='A.N STREAMING ';
    $titre2=' ';
    $description = '';    
    $td = 'data';  
    include_once 'include/header.inc.php';
    include "include/util.inc.php"; 
    $imgurl_1 = "http://image.tmdb.org/t/p/w300";
    $search=$_GET['search'];
    if (empty($_POST['page'])) {
        $_POST['page']=1;
    }
?>
<section>
    <?php
        if(isset($_GET['search'])){
            $nameWithoutSpace = preg_replace('/\s+/', '%20', $_GET['search']);
            $urlsearch = "http://api.themoviedb.org/3/search/movie?api_key=31062cc6637d51f70564ae9a768049cd&page=".$_POST['page']."&language=".$_GET['language']."&query=".$nameWithoutSpace;
            $jsons = file_get_contents($urlsearch);
            $objs = json_decode($jsons);
            $taille =$objs->total_results;
            if (empty($_GET['page'])) {
                $npage=1;
            }
            else {
                $npage = $_GET['page'];
            }
    ?>
    <h1>Résultat de la recherche "<?php echo $search ?>" dans nos Films</h1>
    <p><?php echo $taille ?> films trouvées</p>
    <p><strong>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</strong></p>
    <?php
        
        foreach($objs->results as $results){
            echo " 
        
            <article>
                <h1> ". $results->title ." </h1>
                <p><strong>".$results->release_date."</strong></p>
                <a href=' data_mov.php?i=". $results->id ."'><img src='".$imgurl_1. $results->poster_path ."' alt='POSTER'/></a>
                <p> " . $results->vote_average . " /10 </p>
                <p> " . $results->overview . " </p>
                <p><strong>------------------------------------------------------------------------------------------------------------------------------------------------</strong></p>
            </article>
        
            ";
        }
  
    ?>
    <p>Page <?php echo $objs->page ?></p>
    <form method="post" >
        <label>Page :</label>
            <select name="page" >
                <?php
                        echo "\t".'<option value="'. $objs->page .'" > '. $objs->page .' </option>'."\n";
                        for($i=01;$i<=$objs->total_pages;$i++){
                        echo "\t\t\t\t\t".'<option value="'.$i.'" >'.$i.'</option>'."\n";
                        }
                ?>
            </select>
            <button type="submit">Rechercher</button>
    </form>
<?php
    }
?>
</section>
<?php
include_once 'include/footer.inc.php';
?>
</body>
</html>