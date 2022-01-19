<?php
require_once "../../fruitdb_connect.php";
// $id=$_POST["id"];
// $sql="SELECT id FROM order_list  WHERE id ='$id'";
// $result = $conn->query($sql);
// if($result->num_rows>0){
//     echo "該訂單已存在";
//     exit;
// }


$member_id = $_POST["member_id"];
$product_item = $_POST["product_id"];
$product_quantity = $_POST["product_quantity"];
// $create_time = $_POST["create_time"];
$now=date('Y-m-d H:i:s');
// $price = $_POST["price"];


$sql = "
    INSERT INTO order_list  (
         member_id,product_id,product_quantity, create_time
    ) VALUES (
        '$member_id','$product_item' ,'$product_quantity','$now'
    )";

if ($conn->query($sql)) {
    // $last_id=$conn->insert_id;
    echo "資料建立成功";
    header("location: order_list.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
