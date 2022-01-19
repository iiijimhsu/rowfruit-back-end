<?php
require_once "../../fruitdb_connect.php";

$id = $_POST["id"];
$member_id = $_POST["member_id"];

$product_item = $_POST["product_id"];
$product_quantity = $_POST["product_quantity"];
$create_time = $_POST["create_time"];
// $price = $_POST["price"];

$sql = "UPDATE order_list SET member_id='$member_id', product_id='$product_item' ,product_quantity='$product_quantity' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
    header("location: order_list.php");
} else {
    echo "更新資料錯誤: " . $conn->error;
}
?>