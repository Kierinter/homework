<?php
$dp =$_POST[`dp`];
$state =$_POST[`state`];

header('Content-type:text/json');
$conn = new mysqli('localhost','root','root','practise');
if($conn->connect_error)
    die("连接失败".$conn->connect_error);
switch($state){
    case ''
}
$stmt =$conn->prepare("SELECT");


