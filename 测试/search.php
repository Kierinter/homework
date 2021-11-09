<?php
$connect = mysqli_connect('localhost','root','123456');
//我先建好了一个名为test的数据库内有database这个表
$result=mysqli_query($connect,"SELECT * FROM test.`database` WHERE name LIKE '%a%e%'");
if ($result=mysqli_num_rows($result)>0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>name</th>";
}
    while ($row =mysqli_fetch_array($result)){
    echo "<tr>";
        echo "<td>" . $row['name']."</td>";
    echo "</tr>";
    }
    echo "</tabke>";
    //达到从数据库中提取符合条件的数据
