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
      $line = implode(',', explode('	',$line));
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
<script>
    
function load(value) {
    var val = value;
    var ajax = ajaxObj("POST", "index.php");
    ajax.onreadystatechange = function() {
        if(ajaxReturn(ajax)==true){
            var new_array = JSON.parse(ajax.responseText);
            _("data").innerHTML = new_array[0];
        }  
    }
    ajax.send("val="+val);
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

<div id = "data"></div>

</html>
