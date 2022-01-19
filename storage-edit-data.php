<?php
    require_once "../../fruitdb_connect.php";
    $id=$_POST["id"];
    $funame=$_POST["funame"];
    $futype=$_POST["futype"];
    $farmerid=$_POST["farmerid"];
    $quantity=$_POST["quantity"];
    $price=$_POST["price"];
    $content=$_POST["content"];
    

    $sql="UPDATE storage SET fruitname='$funame', fruittype='$futype', farmer_list_id='$farmerid', quantity='$quantity', price='$price', content='$content' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "更新成功";
        header("location:storage-management.php");
    } else {
            echo "更新資料錯誤: " . $conn->error;
    }

?>