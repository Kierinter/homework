<?php
$number=$_POST['number'];
$name =$_POST['name'];
$qq =$_POST['qq'];
$phone_number=$_POST['phone_number'];
$picture =$_POST['picture'];
$remarks =$_POST['remarks'];
$stu_number =$_POST['stu_number'];
header('Content-type:text/json');
$conn=new mysqli('localhost','root','root','test');
if($conn->connect_error)
    die("连接失败:" . $conn->connect_error);
$stmt =$conn->prepare("INSERT INTO `test`.`lostcard`(number, name, qq, phone_number, remarks, picture,stu_number) values (?,?,?,?,?,?,?)");
$stmt->bind_param("isiissi",$number,$name,$qq,$phone_number,$remarks,$picture,$stu_number);
if($stmt->execute()){
    $code ="0";
    $message ="填入成功";
}
else{
    $code ="1";
    $message ="填入失败";
}
echo json_encode(array("code"=>$code,"message"=>$message));
$stmt->close();
$conn->close();