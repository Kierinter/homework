<?php
$username =$_POST['username'];
$password =$_POST['password'];
header('Content-type:text/json');
$conn = new mysqli('localhost','root','root','test');
if ($conn->connect_error) {
    die("连接失败:" . $conn->connect_error);
}
$stmt =$conn->prepare("SELECT `test`.username FROM `test`.information WHERE username=?");
$stmt->bind_param("s",$username);

if ($stmt->execute()){
   $stmt=$conn->prepare("INSERT INTO 'test'.information(username,password) values (?,?)");
   $stmt->bind_param('ss',$username,$password);
   if($stmt->execute()) {
       $code = "0";
       $message="成功";
   }
   else{
       $code="1";
       $message="失败";
   }
}
else{
    $code="1";
    $message="已存在账户信息";
}
$json =json_encode(array("code"=>$code,"message"=>$message));
echo $json;
