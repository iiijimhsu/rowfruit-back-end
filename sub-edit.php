<?php
    require_once "../../fruitdb_connect.php";
    $id=$_POST["id"];
    $user_id=$_POST["user_id"];
    $product_id=$_POST["product_id"];
   
    $subscribe_way=$_POST["subscribe_way"];

    switch ($subscribe_way) {
    case '1':
        $endtime = date('Y-m-d H:i:s', strtotime("+1 Months"));
        break;
    case '3':
        $endtime = date('Y-m-d H:i:s', strtotime("+3 Months"));
        break;
    case '6':
        $endtime = date('Y-m-d H:i:s', strtotime("+6 Months"));
        break;
}
    
    $status=$_POST["status"];
    

    $sql="UPDATE subscribe SET user_id = '$user_id', product_id='$product_id', subscribe_way='$subscribe_way', end_time='$endtime', status = $status WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
    	echo "更新成功";
        header("location: sub-table.php");
    } else {
    	echo "更新資料錯誤: " . $conn->error;
    }
?>