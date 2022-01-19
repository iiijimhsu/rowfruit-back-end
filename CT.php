<?php
    require_once "../../fruitdb_connect.php";

    // if(!isset($_POST["member_list_id"])){
    //     header("location:customize_order.php");
    //     exit;
    // }
    
    $memberid=$_POST["member_list_id"];
    $stid=$_POST["storage_id"];
    $quantity=$_POST["quantity"];
    print_r($quantity) ;
    exit();

    $now=$_POST["date"];
    $faid=$_POST["farmer_list_id"];
    // $id=$_POST["id"];
    // $id=$
    
    $sql="SELECT * FROM storage where id='$stid'";
    $result=$conn->query($sql);
    // print_r($result);
    while($row = $result->fetch_assoc()){
        $price= $row['price']; 
        
    }
    $amount=["amount"];
    
   
    // exit();
    
    $subtotal=$price*$quantity;
    // $amount=
    // echo $subtotal;
    // exit();
   

    

    $sqlCo="INSERT INTO customize_order(member_list_id,  date, amount) VALUES ('$memberid', '$now', '$amount')";
    if($conn->query($sqlCo)){
        $last_id=$conn->insert_id;
        // echo "資料建立成功, 這筆資料的代號是";
        // header("location:Customized-order.php");
    }else {
        echo "Error: " . $sqlCo . "<br>" . $conn->error;
    }
    
    $sqlCod="INSERT INTO customized_order_detail(po_id, storage_id, quantity, subtotal) VALUES ('$last_id', '$stid', '$quantity','$subtotal')";

    if($conn->query($sqlCod)){
        // $last_id=$conn->insert_id;
        echo "資料建立成功, 這筆資料的代號是";
        header("location:Customized-order.php");
    }else {
        echo "Error: " . $sqlCod . "<br>" . $conn->error;
    }
    

    
    $conn->close();
?>