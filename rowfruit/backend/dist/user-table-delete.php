<?php
    require_once "../../fruitdb_connect.php";
    $id=$_POST['id'];
    
    // echo "$id";
    // exit();
    
    $sql ="UPDATE member_list SET valid=1 WHERE id=$id ";

    if($conn->query($sql) === TRUE){
        echo "刪除成功";
        header("location:user-table.php");
    } else {
        echo "刪除資料失敗:" . $conn->error;
    }
    

?>