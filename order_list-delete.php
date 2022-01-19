<?php
require_once "../../fruitdb_connect.php";

$id = $_POST["id"];
$sql="UPDATE order_list SET valid=1 WHERE id='$id'";

// 1=刪除成功

if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
    header("location:order_list.php");
    } else {
    echo "刪除資料錯誤: " . $conn->error;
    }

    $conn->close();
?>