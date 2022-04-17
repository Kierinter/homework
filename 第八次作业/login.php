<?php
$username =$_POST['username'];
$password =$_POST['password'];

$conn = new mysqli('localhost','root','root','test');
if ($conn->connect_error) {
    die("连接失败:" . $conn->connect_error);
}
    $stmt=$conn->prepare("SELECT `test`.information.username,password FROM `test`.information WHERE (username,password)=(?,?)");
    $stmt->bind_param('ss',$username,$password);
    if ($stmt->execute()){
        $code = '0';
        $message ="用户名已存在";
    }else{
        $stmt=$conn->prepare("INSERT INTO `test`.information(username,password) values (?,?)");
        $stmt->bind_param("ss",$username,$password);
        if($stmt->execute()){
            $code="1";
            $message="c";
        }
    }
    echo json_encode(array("code"=>$code,"message"=>$message));
