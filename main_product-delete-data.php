<?php
    require_once "../../fruitdb_connect.php";
    $id=$_POST["id"];
    
    // $sql = "DELETE FROM main_product WHERE id=$id";
    $sql = "UPDATE main_product SET valid='0' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
    header("location: main_product.php");
    } else {
    echo "刪除資料錯誤: " . $conn->error;
    }

    $conn->close();
?>
