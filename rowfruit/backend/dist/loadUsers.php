<?php
// order_list 會員搜尋 
require_once "../../fruitdb_connect.php";

$mem = [];
//member_list抓id
$sql = "SELECT * FROM member_list WHERE valid=0";
$result = $conn->query($sql);

$users=array();

while($row = $result->fetch_assoc()) { 
    $data=array(
        "id"=>$row["id"],
        "name"=>$row["name"],
        "phone"=>$row["phone"]
        
    );
    array_push($users, $data);
}

echo json_encode($users);

?>