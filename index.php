<?php
$dir    = 'nk';
$files = scandir($dir, 1);
$n = sizeof($files)-2;
$files = array_slice($files, 0, $n);
?>

<?php
/*
$file="test.txt";
$linecount = 0;
$handle = fopen($file, "r");
$data = array();
while(!feof($handle)){
  $line = fgets($handle);
  array_push($data, $line);
  $linecount++;
}
fclose($handle);

echo '<pre>';
print_r($data);
echo '</pre>';
*/
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
      array_push($data, $line);
      $linecount++;
    }
    fclose($handle);
    echo $data;
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
            alert(ajax.responseText);
        }  
    }
    ajax.send("val="+val);
}
</script>
</head>
 
<select id="tf_select" name="tf_select"
  onchange="load(this.value)">
  <option value="">Select...</option>
  <?php
    $a = $files;
    foreach($a as $e) {
      echo "<option value='".$e."'>".$e."</option>";
    }
  ?>
</select>

</html>
