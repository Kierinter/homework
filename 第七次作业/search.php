<?php
$username =$_POST['username'];

$conn = new mysqli('localhost','root','root','CommentBoard');

$stmt = $conn->prepare("SELECT `id` FROM `CommentBoard` WHERE `username`=?");
$stmt ->bind_param('s',$username);
if ($stmt->execute()){
    $id =$stmt->get_result();
    $code ="0";
}
else
{
    $code ="1";
    $message ="can't find";
}
?>