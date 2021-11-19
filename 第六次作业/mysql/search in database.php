<?php

$conn=mysqli_connect("localhost","root","123456","test");
header("Content-type:index/html;charset=utf-8");
$chars=$_POST("chars");
$sql ="
    create table username(
    id INT auto_increment primary key ,
    name varchar(30) not null );
    load data infile 'database.txt'into table username;";
$load=mysqli_query($conn,$sql);
if ($load==true)
{
    echo "usernames have been loaded";
    $sql .= "select*from username while name like '%$chars%";
    mysqli_query($conn,$sql);
}
else echo "error";
?>





