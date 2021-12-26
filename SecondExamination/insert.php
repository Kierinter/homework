<?php
$username =$_POST[`username`];
$sex =$_POST[`sex`];
$number =$_POST[`number`];
$qq =$_POST[`qq`];
$xy =$_POST[`xy`];
$mj =$_POST[`mj`];
$zy1 =$_POST[`zy1`];
$zy2 =$_POST[`zy2`];
$zy3 =$_POST[`zy3`];

header('Content-type:text/json');
$conn= new mysqli('localhost','root','root','test');
if($conn->connect_error)
    die("连接失败:" . $conn->connect_error);
$stmt=$conn->prepare("SELECT `practise`.`information`.number FROM `practise`.`information` where number=?");
$stmt->bind_param('i',$number);
$stmt->execute();
if ($stmt->fetch()) {
    echo json_encode(array("code" =>"1", "message" =>"失败"));
    $conn->close();
}
else{
    $stmt = $conn->prepare("INSERT INTO `practise`.`information`(username, sex, number, qq, xy,mj, zy1,zy2,zy3) values(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssiisssss", $username, $sex, $number, $qq, $xy, $mj, $zy1, $zy2, $zy3);
    $stmt->execute();
    $id=$stmt->insert_id;
    if ($id!=null) {
        $code = "0";
        $message = "成功";
//        $stmt =$conn ->prepare("SELECT `practise`.`login-information`.id FROM `practise`.`login-information` where username=$username");
//        $stmt->bind_param("s",$username);
//        $stmt ->execute();
//        $stmt->bind_result($id);
//        $stmt->fetch();
        echo json_encode(array("code" => $code, "message" => $message, "id" => $id));
    }
    else {
        $code = "1";
        $message = "失败";
        echo json_encode(array("code" => $code, "message" => $message));
    }
    $conn->close();
}
