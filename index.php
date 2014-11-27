<?php
$dir    = 'nk';
$files = scandir($dir, 1);
$n = sizeof($files)-2;
$files = array_slice($files, 0, $n);
?>

<?php
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
?>


<html>
<head>
<script>
function test(value) {
    alert(value);
    }
</script>
</head>
 
<select id="tf_select" name="tf_select"
  onchange="test(this.value)">
  <option value="">Select...</option>
  <?php
    $a = $files;
    foreach($a as $e) {
      echo "<option value='".$e."'>".$e."</option>";
    }
  ?>
</select>

</html>
