<?php
//
////$username = $_POST['username'];
////$password = $_POST['password'];
////$comment = $_POST['comment'];
$username ='kierin';
$password ='123';
$comment ='test';
$conn = new mysqli('localhost','root','root','CommentBoard');
if($username=''||$password=''||$comment='')
    echo "error:请补足信息";
    $conn->close();
    //我觉得这个必填与否应该是前端搞的，因为可以减少数据传输的次数。

$stmt = $conn->prepare("INSERT INTO CommentBoard (username, password, comment) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password,$comment);
$code ="0";
$message ="insert success";