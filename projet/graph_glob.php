<?php // content="text/plain; charset=utf-8"
require_once ('src/jpgraph.php');
require_once ('src/jpgraph_bar.php');

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


$datay=readOcc("glob.csv");


// Create the graph. These two calls are always required
$graph = new Graph(350,220,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
$graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(readmov("glob.csv"));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("white");
$b1plot->SetFillGradient("red","white",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(45);


// Display the graph
$graph->Stroke();
?>



