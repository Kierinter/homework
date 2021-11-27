<?php

$conn =new mysqli('localhost','root','root','CommentBoard');

$id =$_POST['id'];
$comment =$_POST['comment'];

$stmt = $conn->prepare("UPDATE `CommentBoard` SET`comment`=? WHERE`id` =?");
$stmt ->bind_param('si',$comment,$id);
if($stmt->execute()){
    if($stmt->affected_rows==1){
        $code="0";
        $message="update success";
    }
    if($stmt->affected_rows==0){
        $code="1";
        $message="update fail";
    }
}
?>