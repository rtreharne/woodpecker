<?php
$dir    = 'nk';
$files = scandir($dir, 1);
$n = sizeof($files)-2;
$files = array_slice($files, 0, $n);
?>

<?php

if(isset($_POST["val"])){
    $val = $_POST['val'];
    
    
    $file="nk/".$val;
    $linecount = 0;
    $handle = fopen($file, "r");
    $data = array();
    while(!feof($handle)){
      $line = fgets($handle);
      $line = preg_split("/[\t]/",  $line);
      $line = implode(',', $line);
      if ($line[0]==",") {
        $line[0] =="";
      }
      array_push($data, $line);
      $linecount++;
    }
    fclose($handle);
    $dat = json_encode($data);
    echo $dat;
    exit();
    }
?>


<html>
<head>
  <script src="js/main.js"></script>
  <script src="js/ajax.js"></script>
  <script type="text/javascript" src="http://mbostock.github.com/d3/d3.v2.js"></script>
  <style>
.chart {

}

.main text {
    font: 10px sans-serif;	
}

.axis line, .axis path {
    shape-rendering: crispEdges;
    stroke: black;
    fill: none;
}

circle {
    fill: steelblue;
}

</style>
  
<script>
    
function load(value) {
    var val = value;
    var extra=[];
    var ajax = ajaxObj("POST", "index.php");
    ajax.onreadystatechange = function() {
        if(ajaxReturn(ajax)==true){
            var new_array = JSON.parse(ajax.responseText);
            alert(new_array.length);
            for (var i in new_array) {
              extra.push(new_array[i]);
            }
            send_data(extra);
        }  
    }
    ajax.send("val="+val);
}

function send_data(data){
  alert(data);
  //var data = [[5,Math.random()], [10,Math.random()], [15,Math.random()], [2,Math.random()], [5,Math.random()], [10,Math.random()], [15,Math.random()], [2,Math.random()]];
  _("content").innerHTML="";
  scatter(data);
  
  }
</script>
</head>
 
<select id="tf_select" name="tf_select" onchange="load(this.value)">
  <option value="">Select...</option>
  <?php
    $a = $files;
    foreach($a as $e) {
      echo "<option value='".$e."'>".$e."</option>";
    }
  ?>
</select>

<input type="submit" value="submit" onclick="send_data(); return false;">

<div id="content" class='content'>
   <!-- /the chart goes here -->
</div>
<script type="text/javascript" src="js/scatterchart.js"></script>

<div id = "data"></div>

</html>
