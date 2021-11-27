<?php

$username = $_POST['username'];
$password = $_POST['password'];
$comment = $_POST['comment'];
$conn = new mysqli('localhost','root','root','CommentBoard');
$sql = "SELECT `username` FROM `commentboard` WHERE `username`=$username ";
if($conn->multi_query($sql)==true)
{
    $stmt = $conn->prepare("INSERT INTO CommentBoard (username, password, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password,$comment);
    if($stmt->execute()) {
        $code = "0";
        $message = "insert success";
    }
    else{
        $code ="1";
        $message ="insert fail";
    }
}
else
    $code="1";
    $message ="please try an new name";
