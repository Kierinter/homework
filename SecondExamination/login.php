<?php
$username =trim($_POST['username']);//trim用于去除字符串首尾初的空白字符
$password =trim($_POST['password']);

header('Content-type:text/json');
$conn =new mysqli('localhost','root','root','practise');
if($conn->connect_error)
    die("连接失败:" . $conn->connect_error .$code ="3" .$message="其他错误");
if(!empty($username) && !empty($password)) {
//    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $stmt = $conn->prepare("SELECT `practise`.`login-information`.username FROM `practise`.`login-information` where username=?");
    $stmt->bind_param('s', $username);
    if ($stmt->execute()) {
        if ($stmt->fetch()) {
            //解决账号存在与否的问题
            $stmt->close();//这个卡了我很久,StackOverflow上的回答也对不上,直到我想起了mysqli_report函数,
            //错误的原因是sql不允许同时进行两次查询,不然就会报错不同步 也就是 **Commands out of sync**
            $stmt = $conn->prepare("SELECT `practise`.`login-information`.id, email FROM `practise`.`login-information` WHERE username=? AND password=?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            if ($stmt->fetch()) {
                $stmt->bind_result($id, $email);
                $code = "1";
                $message = "成功";
                $data = array("id" => $id, "username" => $username, "password" => $password, "email" => $email);
                echo json_encode(array("code" => $code, "message" => $message, "data" => $data));
            }
            else {
                $code = "2";
                $message = "账号密码错误";
                echo json_encode(array("code" => $code, "message" => $message));
            }
        } else {
            $code = "2";
            $message = "账号密码错误";
            echo json_encode(array("code" => $code, "message" => $message));
        }
    }
    $stmt->close();
}
else {
    $code = "1";
    $message = "缺失参数";
    echo json_encode(array("code" => $code, "message" => $message));
}
$conn->close();
//换一个方式

//$stmt->close();