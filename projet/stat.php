<?php
$titre='A.N STREAMING ';
$titre2=' STATISTIQUES ';
$description =' STATISTIQUES ';    
$td = 'stat';  
include_once 'include/header.inc.php';
include "include/util.inc.php"; 
?>
<section>
    <p>Un peu de statistiques. Vous trouverez dans cette rubrique les préférences de nos internautes.</p>
</section>

<section>
    <p>Histogramme Générale des consultations </p>
    <?php
        echo "<img src='./graph_glob.php'/>";
    ?>
</section>

<section>
    <p>Histogramme Top séries</p>
    <?php
        echo "<img src='./graph_s.php'/>";
    ?>
</section>

<section>
    <p>Histogramme Top films</p>
    <?php
        echo "<img src='./graph_m.php'/>";
    ?>
</section>


<?php
include_once 'include/footer.inc.php';
?>
</body>
</html>