
<?php
require_once "../../fruitdb_connect.php";

// var_dump($_POST);

$id = $_POST["id"];
$status = $_POST["status"];


$sql = "UPDATE contactus SET status='$status' WHERE id=$id";


if ($conn->query($sql) === TRUE) {
    echo "更新成功";
    header("location: contact.php");
} else {
    echo "更新資料錯誤: " . $conn->error;
}
