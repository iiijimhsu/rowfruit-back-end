<?php
    require_once "../../fruitdb_connect.php";

    // if(!isset($_POST["member_list_id"])){
    //     header("location:customize_order.php");
    //     exit;
    // }

    $funame=$_POST["funame"];
    $futype=$_POST["futype"];
    $farmerid=$_POST["farmerid"];
    $quantity=$_POST["quantity"];
    $price=$_POST["price"];
    $content=$_POST["content"];

    $sql="INSERT INTO storage(fruitname, fruittype, farmer_list_id, quantity, price, content) VALUES ('$funame', '$futype', '$farmerid', '$quantity', '$price', '$content')";
        
    if($conn->query($sql)){
        // $last_id=$conn->insert_id;
        echo "資料建立成功, 這筆資料的代號是";
        header("location:storage-management.php");
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>