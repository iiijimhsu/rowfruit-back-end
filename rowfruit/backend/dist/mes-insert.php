<?php
require_once "../../fruitdb_connect.php";

$id = $_POST["id"];
$header = $_POST["header"];
// $name = $_POST["name"];
$main = $_POST["main"];
$create_time = $_POST["create_time"];

$sql = "
    INSERT INTO message (
         header, main, create_time
    ) VALUES (
          '$header', '$main', '$create_time'
    )
";

if ($conn->query($sql)) {
    // $last_id=$conn->insert_id;
    echo "資料建立成功";
    header("location: message.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>