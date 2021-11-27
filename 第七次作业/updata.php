<?php

$conn =new mysqli('localhost','root','root','CommentBoard');

$id =$_POST['id'];
$comment =$_POST['comment'];

$stmt = $conn->prepare("UPDATE `CommentBoard` SET`comment`=? WHERE`id` =?");
$stmt ->bind_param('si',$comment,$id);
if($stmt->execute()){
    $code="0";
    $message="update success";
}
else
{
    $code="1";
    $message="update fail";
    }
?>
