<?php
    require_once "../../fruitdb_connect.php";
    $id=$_POST["id"];
    $memberid=$_POST["memberid"];
    $now=$_POST["now"];
    $amount=$_POST["amount"];
    $farmerid=$_POST["farmerid"];
    $fuid=$_POST["fuid"];
    $quantity=$_POST["quantity"];
  
    $sqlo = "UPDATE customize_order SET member_list_id='$memberid', date='$now' WHERE id=$id";


     if ($conn->query($sqlo) === TRUE) {
        // echo "更新成功";
        // header("location:Customized-order.php");

    } else {
            echo "更新資料錯誤: " . $conn->error;
    }
    $sql = "UPDATE customized_order_detail SET storage_id='$fuid', quantity='$quantity' WHERE po_id=$id";


     if ($conn->query($sql) === TRUE) {
        // echo "更新成功";
        header("location:Customized-order.php");

    } else {
            echo "更新資料錯誤: " . $conn->error;
    }
?>