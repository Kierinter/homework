<?php
$keys =$_POST"chars";//index哪就没改了
$keys = 'aed';
$databaseNames = file('database.txt');//there same people's name in it,
$pattern = str_split($keys);

array_walk($pattern, function (&$v, $k) {
    $v = "(?=.*" . $v . ")";
});

$result = preg_grep("/" . implode($pattern) . "/i", $databaseNames);

var_export($result);
?>
