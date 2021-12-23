<?php
    require_once ('src/jpgraph.php');
    require_once ('src/jpgraph_bar.php');
    //require_once "../includeprojet/function.inc.php";
//------------------------------------------------
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
function readCsvNbStat($filename){
    $file = fopen ($filename , 'a+');
    $nbfilms = 0;
    while (!feof($file)) {
        $fields=fgetcsv($file,999,";");
        if (is_array($fields)) {
            $nbfilms++;
        }
    }
    return $nbfilms;
}

$hight = readCsvNbStat('mov.csv');
if ($hight<40) {
    $hight = 700; 
}else {
    $hight *=30 ;
}



//------------------------------------------------
      
$datay=readOcc("mov.csv");
//$datay=array(17,22,33,48,24,20);

// Create the graph. These two calls are always required

$graph = new Graph(600,$hight,'auto');
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

 
// Setup titles and X-axis labels

$graph->Set90AndMargin(250,40,40,40);
$graph->img->SetAngle(90); 

// set major and minor tick positions manually
$graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->Show(false);
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(readmov("mov.csv"));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// For background to be gradient, setfill is needed first.
$graph->SetBackgroundGradient('black', '#FFFFFF', GRAD_HOR, BGRAD_PLOT);
$graph->SetMarginColor('white');
$graph->SetFrame(true,'red',4);
// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);

$b1plot->SetWeight(0);
$b1plot->SetFillGradient("red","#FFFFFF",GRAD_HOR);
$b1plot->SetWidth(17);

// Display the graph
$graph->Stroke();

?>