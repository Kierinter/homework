<?php
$username =trim($_POST['username']);
$password =trim($_POST['password']);
$email =trim($_POST['email']);
header('Content-type:text/json');
$conn= new mysqli('localhost','root','root','test');
if($conn->connect_error)
    die("连接失败:" . $conn->connect_error);
$stmt=$conn->prepare("SELECT `practise`.`login-information`.username FROM `practise`.`login-information` where username=?");
$stmt->bind_param('s',$username);
$stmt->execute();
if ($stmt->fetch()){
    $code="1";
    $message ="失败";
    echo json_encode(array("code"=>$code,"message"=>$message));
}
else {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $stmt->close();
    $stmt = $conn->prepare("INSERT INTO `practise`.`login-information`(username, password, email) values(?,?,?)");
    $stmt->bind_param("sss", $username, $password, $email);
    $stmt->execute();
    //插入时不会返回值,且$stmt恒为正,所以要用别的方法从侧面检验或者直接不理--因为插入不会出错,如果传输错误会报500的错
    $code = "0";
    $message = "成功";
    $id =$stmt->insert_id;
//    $stmt->close();
//    $stmt = $conn->prepare("SELECT `practise`.`login-information`.id FROM `practise`.`login-information` where username=?");
//    $stmt->bind_param("s", $username);
//    $stmt->execute();
//    $stmt->bind_result($id);
//    $stmt->fetch();
    echo json_encode(array("code" => $code, "message" => $message, "id" => $id));
}
$conn->close();
$stmt->close();
