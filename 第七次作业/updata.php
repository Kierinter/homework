<?php

$conn =new mysqli('localhost','root','root','test');

$id =$_POST['id'];
$comment =$_POST['comment'];

$stmt = $conn->prepare("UPDATE `test`.commentboard SET `comment`=? WHERE id=?");
$stmt ->bind_param('si',$comment,$id);

if($stmt->execute()){//执行更新操作成功返回true，失败则返回false
    $code="0";
    $message="update success";
    var_dump($code,$message);
}
else{
    $code="1";
    $message="update fail";
    var_dump($code,$message);
}