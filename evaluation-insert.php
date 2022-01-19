
<?php
    require_once "../../fruitdb_connect.php";
    $order_number=$_POST["order_number"];
    $sql="SELECT order_number FROM evaluation WHERE order_number='$order_number'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        echo "該資料已存在";
        exit;
    }
    
    
    $content=$_POST["content"];
    
    $sql="INSERT INTO evaluation( order_number, content) VALUES ( '$order_number',  '$content')";

    if($conn->query($sql)){
        $last_id=$conn->insert_id;
        echo "資料建立成功, 這筆資料的代號是 $last_id";
        header("location: evaluation.php");
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
