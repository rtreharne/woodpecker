<?php
//Scan directory 'nk' and get list of filenames
$dir    = 'nk';
$files = scandir($dir, 1);
$n = sizeof($files)-2;
$files = array_slice($files, 0, $n);
?>

<html>
<head>
  <script src="js/main.js"></script>
  <script src="js/ajax.js"></script>
  <script type="text/javascript" src="http://mbostock.github.com/d3/d3.v2.js"></script>
  
  <script>
    

function plot_data(filename){
  alert(filename);
  simpleScatterPlot();
  }
</script>
</head>
 
<select id="tf_select" name="tf_select" onchange="plot_data(this.value)">
  <option value="">Select...</option>
  <?php
    $a = $files;
    foreach($a as $e) {
      echo "<option value='".$e."'>".$e."</option>";
    }
  ?>
</select>

<div id = "plot" class="svg-holder svg-holder-simple"></div>
    <link rel="stylesheet" href="css/scatter-plots-example-simple.css" />
    <script type="text/javascript" src="js/scatter-plots-example-simple.js"></script>


<div id="content" class='content'>
   <!-- /the chart goes here -->
</div>


</html>
