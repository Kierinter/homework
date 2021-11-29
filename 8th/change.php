<?php
$id=$_POST['id'];
$username =$_POST['username'];
header('Content-type:text/json');
$conn = new mysqli('localhost','root','root','test');
if ($conn->connect_error) {
    die("连接失败:" . $conn->connect_error);
}
$stmt = $conn->prepare("UPDATE `test`.information SET `username`=? WHERE id=?");
$stmt->bind_param('si',$username,$id);
if($stmt->execute()){
    $code='0';
    $message="成功";
}
else
{
    $code= "1";
    $message= "失败";
}
$json=json_encode(array('code'=>$code,'message'=>$message));
echo $json;
