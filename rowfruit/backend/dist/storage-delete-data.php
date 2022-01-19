<?php
    require_once "../../fruitdb_connect.php";
    $id=$_POST["id"];
    
    $sql = "UPDATE storage SET VALID=1 WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
    header("location:storage-management.php");
    } else {
    echo "刪除資料錯誤: " . $conn->error;
    }

    $conn->close();
?>