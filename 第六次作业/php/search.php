<?php
$chars=$_POST["chars"];
header("Content-type:index/html;charset=utf-8");
$database=file(`database.txt`);//以数组导入
$s=preg_grep(".$chars.",$database);
ehco '<pre>';
var_dump($s);
echo '</pre>';
?>
