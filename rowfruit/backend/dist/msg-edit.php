
<?php
require_once "../../fruitdb_connect.php";

// var_dump($_POST);

$id = $_POST["id"];
$statement = $_POST["statement"];


$sql = "UPDATE message SET statement='$statement' WHERE id=$id";


if ($conn->query($sql) === TRUE) {
    echo "更新成功";
    header("location: message.php");
} else {
    echo "更新資料錯誤: " . $conn->error;
}
