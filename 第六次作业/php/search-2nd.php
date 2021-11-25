<?php
$keys =$_POST"chars";//index哪就没改了
$database = file('database.txt');
$k = str_split($keys);
var_dump($k);
$length =count($k);
$name=array();
$j=$k[0];
$out =preg_grep("[".$j."]",$database);
array_push($name,$out);
for($x=1;$x<$length;$x++)
{
    $j = $k[$x];
    $out = preg_grep("[" . $j . "]", $name);
    $name = array_intersect($out, $name);
}
echo '<pre>';
var_dump($name);
echo '</pre>';
?>
