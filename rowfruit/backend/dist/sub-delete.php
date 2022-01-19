<?php

require_once "../../fruitdb_connect.php";
    $id=$_POST["id"];
 

$sql = "UPDATE subscribe SET valid=1 WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    	echo "刪除成功";
        header("location: sub-table.php");

} else {
    	echo "刪除資料錯誤: " . $conn->error;
}

?>