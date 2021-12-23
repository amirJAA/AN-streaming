<?php

function img(){ //retourne img
    $url = "https://api.nasa.gov/planetary/apod?api_key=jT2mQielQb9sgmiWG3byaNPhswqpp9NA2wIyoJzE";
    $json = file_get_contents($url);
    $obj = json_decode($json);
    return $obj->{'url'};
}
//------------------------------------------------------------------------------------------------
    
function compteur(){
    $file = fopen('include/hit_counter.txt', 'r');
    //ouverture du fichier en lecture
    $count = fread($file, filesize('include/hit_counter.txt'));
    //lecture du fichier
    $file = fopen('include/hit_counter.txt', 'w');
    //ouverture du fichier en ecriture
    $count+=1;
    //ajout d'une visite
    fwrite($file, $count);
    fclose($file);
    return $count;
}

 //------------------------------------------------------------------------------------------------

 define("language", 'french');
	function datetoday($lang="fr") {
		
		$Jours=array(1=>'Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
		$Mois=array(1=>'Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
		$Days=array(1=>'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
		$Mounths=array(1=>'January','February','March','April','May','June','July','August','September','October','November','December');
		
		$date = "\t\t<p class='positionAuteurDate'>";	
		
			if($lang=="fr") {	
				$date .= $Jours[date("N")]." ".date("d")." ".$Mois[date("n")]." ".date("Y");
			}
			else {
				$date .= $Days[date("N")].",".date("d").",".$Mounths[date("n")].",".date("Y");
			}
		$date .= "</p>";
		
		return $date;		
	}
 //------------------------------------------------------------------------------------------------

 function genre_F(){
    //ouverture des fichiers genre
    $genf = fopen("./genre_F.csv", 'r', ';');

    //création du formulaire
    $form='';
    $form.='<form method="get" action="mov.php#search">'."\n";
    $form.="\t\t\t\t".'<p>Selectionner le genre : </p>'."\n";
    $form.="\t\t\t\t".'<select name="gen">'."\n";

    $cpt = 0;

    while($extract = fgetcsv ($genf, 500, ';')){
        if($cpt==0){
            $form.="\t\t\t\t\t".'<option value="" > --- </option>'."\n";
        }
        else{
            $form.="\t\t\t\t\t".'<option value="'.$extract[0].'" >'.$extract[0].' </option>'."\n";
        }
        $cpt++;
    }
    $form.="\t\t\t\t".'</select>'."\n";
    $form.="\t\t\t\t".'<button type="submit">Rechercher</button>'."\n";
    $form.="\t\t".'</form>'."\n";
    fclose($genf);
    return $form;
}

 //------------------------------------------------------------------------------------------------

 function genre_S(){
    //ouverture des fichiers genre
    $gens = fopen("./genre_S.csv", 'r', ';');

    //création du formulaire
    $form='';
    $form.='<form method="get" action="ser.php#search">'."\n";
    $form.="\t\t\t\t".'<p>Selectionner le genre : </p>'."\n";
    $form.="\t\t\t\t".'<select name="gen">'."\n";

    $cpt = 0;

    while($extract = fgetcsv ($gens, 500, ';')){
        if($cpt==0){
            $form.="\t\t\t\t\t".'<option value="" > --- </option>'."\n";
        }
        else{
            $form.="\t\t\t\t\t".'<option value="'.$extract[0].'" >'.$extract[0].' </option>'."\n";
        }
        $cpt++;
    }
    $form.="\t\t\t\t".'</select>'."\n";
    $form.="\t\t\t\t".'<button type="submit">Rechercher</button>'."\n";
    $form.="\t\t".'</form>'."\n";
    fclose($gens);
    return $form;
}

function CSVs($film,$filename){
    //$film="";
    $trouver=false;
    $file = fopen ($filename , 'a+');
    //$film=$_GET['test'];
    $a = array();
    while (!feof($file)) {
        $fields=fgetcsv($file,999,";");
        //var_dump($fields);
        if (is_array($fields)) {
            $count = count($fields);
            if($fields[0]==$film){
                $occurance=$fields[1]+1;
                $newfields= array($film,$occurance);
                array_push($a,$newfields);
                $trouver=true;
            }else {
                $new= array($fields[0],$fields[1]);
                array_push($a,$new);
            }
        }
    }
    ftruncate($file,0);
    fclose($file);
    $file = fopen ($filename , 'a+');

    if (!$trouver) {
        $newfields= array('name' => $film,'occurance'=>1 );
        array_push($a,$newfields);
        //var_dump($a);
    }
    for ($i=0; $i < count($a); $i++) { 
        fputcsv($file, $a[$i], ";");
    }
    //fputcsv($file, $a, ";");
    fclose($file);
    }


    function readOcc($filename){
        $trouver=false;
        $file = fopen ($filename , 'a+');
        $occurance = array();
        while (!feof($file)) {
            $fields=fgetcsv($file,999,";");
            if (is_array($fields)) {
                array_push($occurance,$fields[1]);
            }
        }
        return $occurance;
    }
    function readmov($filename){
        $file = fopen ($filename , 'a+');
        $films = array();
        while (!feof($file)) {
            $fields=fgetcsv($file,999,";");
            if (is_array($fields)) {
                array_push($films,$fields[0]);
            }
        }
        return $films;
    }


 ?>