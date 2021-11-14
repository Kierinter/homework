<?php
$conn = mysqli_connect("localhost","root","123456","test");
$sql = "
    create table information(
    id INT auto_increment primary key,
    name varchar(50) not null ,
    number varchar(12) not null,
    other varchar(50)
) ";
$s = mysqli_query($conn,$sql);
if ($s==true)
    echo "successfully created a table <br>";
else
    echo "error<br>";
mysqli_close($conn)
?>
<?php
$conn = mysqli_connect("localhost","root","123456","test");
$sql ="insert into test.information(id, name, number, other)
VALUES('','周广平1','21',' ');";
$sql .= "insert into test.information(id, name, number, other)
VALUES('','周广平2','21',' ');";
$sql .= "insert into test.information(id, name, number, other)
VALUES('','周广平3','21',' ');";

if ($conn->multi_query($sql)===true)
    echo "successfully insert <br>";
else
    echo "error";
$conn ->close();
?>
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//将所有MySQL错误转换为php异常
$conn = mysqli_connect("localhost","root","123456","test");
$sql = "SELECT * FROM `test`.information";
//$result =$conn->query($sql);//面向过程法，但搞不定，我也不知道为啥.二者在这没区别，都不行
//我觉得不是语法错误////实际上的确不是
$result =mysqli_query($conn,$sql);
if (!empty($result->num_rows) &&$result->num_rows >0)
//if ($result !== false &&mysqli_num_rows($result) >0)
{
//    while ($row = $result->fetch_assoc())
    while ($row =mysqli_fetch_assoc($result)){
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Number： " . $row["number"]. " - Other： ".$row["other"]. "<br>";
    }
}
else {
    echo "ERROR";
}
$conn->close();
//先查一次，然后再导出
?>
<?php
$conn = mysqli_connect("localhost","root","123456","test");
$sql = "UPDATE test.information
    SET number= '35'
    WHERE name = '周广平1' ";
mysqli_query($conn,$sql);
mysqli_close($conn);
//学号改为36
?>
<?php
$conn = mysqli_connect("localhost","root","123456","test");
$sql = "DELETE FROM test.information WHERE name='周广平2' ";
$delete = mysqli_query($conn,$sql);
if ($delete==true)
    echo "yes";
else
    echo "no";
mysqli_close($conn);
?>
