<?php
$file=fopen("database.txt","r") ;
$regex ='#(a+)/(e+)/';
$matches =array($file);
while (!feof($file)) {
    $names = preg_grep("/[a][e]/", $matches);
    var_dump($names);
}    
fclose($file);
