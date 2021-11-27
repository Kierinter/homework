<?php

$id =$_POST['id'];

$conn = new mysqli('localhost','root','root');

if ($id="")
    $conn->close();
//删除需要啥预处理吗？

$sql = "DELETE FROM CommentBoard WHERE id= '$id' ";
$delete = mysqli_query($conn,$sql);
if($delete==false)
{
    $code ="0";
    $message ="delete fail";
}
else
{
    $code ="1";
    $message ="delete success";
}
$conn->close();
