<?php
$username =$_POST['username'];
$sex =$_POST['sex'];
$phone_number =$_POST['phone_number'];
$qq = $_POST['qq'];
$college =$_POST['college'];
$profession =$_POST['profession'];
$password =$_POST['password'];
header('Content-type:text/json');
$conn = new mysqli('localhost','root','root','test');

$stmt =$conn->prepare( "SELECT `id` FROM `test`.information WHERE `test`.information.username =?");
$stmt ->bind_param('s',$username);    echo json_encode($stmt);
if($stmt ==false){
    //这里不能直接($stmt->execute),原因是$stmt始终位false,而execute才是起到判断功能的函数.
    $stmt1 =$conn ->prepare("INSERT INTO `test`.information(username, phone_number, qq, college, profession,sex,password) VALUES (?,?,?,?,?,?,?)");
    $stmt1 ->bind_param('siissss',$username,$phone_number,$qq,$college,$profession,$sex,$password);
    echo json_encode($stmt1);
    if ($stmt1->execute()){
        $code="0";
        $message='插入成功';
    }
    else {
        $code = '1';
        $message = '插入失败';
    }
}
else{
    $code='1';
    $message='用户名重复';
}
$json=json_encode(array("code"=>$code,"message"=>$message));
echo $json;
$conn->close();