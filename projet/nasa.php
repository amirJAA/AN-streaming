<?php
$titre='A.N STREAMING ';
$titre2=' API APOD NASA';
$description =' image du jour issu de api nasa APOD ';    
$td = 'nasa';  
include_once 'include/header.inc.php';
include "include/util.inc.php"; 
?>
<section>
<?php
$nasa = img();
echo"<figure>"."\n",
"\t\t\t"."<img src='$nasa' alt='image aléatoire'/>"."\n",
"\t\t"."</figure>"."\n";
?>
</section>
<?php
include_once 'include/footer.inc.php';
?>
</body>
</html>