<?php
$username =$_POST['username'];

$conn = new mysqli('localhost','root','root','test');
$stmt = $conn->prepare("SELECT `id` FROM `test`.`commentboard` WHERE `username`= ?");
$stmt ->bind_param('s',$username);
if ($stmt->execute()){
    $id =$stmt->get_result();
    $code ="0";
    var_dump($id,$code);
}
else
{
    $code ="1";
    $message ="can't find";
    var_dump($code,$message);
}
