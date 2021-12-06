<?php
header('Content-type:text/json');

$stu_number=$_POST['stu-number'];//

$conn =new mysqli('localhost','root','root','test');
if ($conn->connect_error)
    die("连接失败". $conn->connect_error);
else{
    $stmt = $conn->prepare("SELECT `test`.lostcard.name,number  FROM `test`.lostcard where stu_number=?");
    $stmt->bind_param("i",$stu_number);
    $stmt->execute();
    if ($stmt->fetch()){
        $code="0";
        $message ="查询成功";
        $stmt->store_result();// 取回全部查询结果
        $n=$stmt->num_rows;// 取出查询的记录个数
        $data=array();
        for($m=$n;$m>0;$n--) {
            $stmt->bind_result($name, $number);
            $data[$m]=array($name,$number);
        }
        echo json_encode(array("code" =>$code,"message"=>$message,"date"=>$data));
    }
    else {
        $code = "1";
        $message = "查询失败";
        echo json_encode(array("code" => $code, "message" => $message));
    }
}
$stmt->close();
$conn->close();