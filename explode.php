<?php
// Example 1
$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
echo $pizza;
echo $pieces[0]

?>

<?php
    $file="nk/CdTenk.txt";
    $linecount = 0;
    $handle = fopen($file, "r");
    $data = array();
    while(!feof($handle)){
      $line = fgets($handle);
      array_push($data, $line);
      $linecount++;
    }
    fclose($handle);
    $single = $data[0];
    $str = mb_convert_encoding($single, "SJIS");
    $newdat = explode("	", $str);
    echo sizeof($newdat);
    
    exit();
    
?>
