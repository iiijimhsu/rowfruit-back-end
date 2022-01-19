<?php
    require_once "../../fruitdb_connect.php";
    $id=$_POST["id"];
    
    $sql = "UPDATE customize_order SET VALID=1 WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
    header("location:Customized-order.php");
    } else {
    echo "刪除資料錯誤: " . $conn->error;
    }

    $conn->close();
?>