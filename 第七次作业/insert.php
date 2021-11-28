<?php
$username = $_POST ['username'];
$password = $_POST ['password'];
$comment = $_POST ['comment'];
header("Content-type:index/html;charset=utf-8");
$conn = new mysqli('localhost','root','root','test');
$sql = "SELECT `username` FROM `commentboard` WHERE `username`=$username ";
if($conn->multi_query($sql)==false)
{
    $stmt = $conn->prepare("INSERT INTO commentboard (username,password,comment) VALUES (?,?,?)");
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
else{
    $code="1";
    $message ="please try an new name";
}
var_dump($code,$message);

