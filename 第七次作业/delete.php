<?php

$id =$_POST['id'];

$conn = new mysqli('localhost','root','','test');
$sql = "DELETE FROM `test`.commentboard WHERE `id` =? ";
$stmt =$conn->prepare($sql);
$stmt->bind_param('i',$id);
if($stmt->execute())
{
    $code ="1";
    $message ="delete success";
}
else
{
        $code ="0";
    $message ="delete fail";
}
var_dump($code,$message);
$conn->close();
