<?php
$name=$_POST['stu_name'];
$number =$_POST['stu_number'];

header('Content-type:text/json');
$conn= new mysqli('localhost','root','root','test');
if($conn->connect_error)
    die("连接失败:" . $conn->connect_error);
$stmt=$conn->prepare("SELECT `test`.`student-id-card`.stu_number FROM `test`.`student-id-card` where stu_number=?");
$stmt->bind_param('i',$number);
$stmt->execute();//这个表示执行sql语句，执行为ture
if ($stmt->fetch()!=""){
    $code="1";
    $message ="重复绑定";
}
else{
    $stmt=$conn->prepare("INSERT INTO `test`.`student-id-card`(stu_name,stu_number) values(?,?)");
    $stmt->bind_param("si",$name,$number);
    if($stmt->execute()){
        $code="1";
        $message="绑定成功";
    }
    else{
        $code="2";
        $message="绑定失败";
    }
}
echo json_encode(array("code"=>$code,"message"=>$message));
$conn->close();