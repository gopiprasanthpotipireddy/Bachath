
<?php
$string = file_get_contents("homeshop18.com API.json");
$var=json_decode($string,true);
//print_r($var);
$count1=count($var);
echo $count1;

?>
