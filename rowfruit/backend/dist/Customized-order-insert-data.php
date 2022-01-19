<?php
    require_once "../../fruitdb_connect.php";

    // if(!isset($_POST["member_list_id"])){
    //     header("location:customize_order.php");
    //     exit;
    // }
    
    $memberid=$_POST["member_list_id"];
    $stid=$_POST["storage_id"];
    $quantity=$_POST["quantity"];
    $now=date("Y-m-d H:i:s");
    // $faid=$_POST["farmer_list_id"];

    print_r($stid);
    print_r($quantity);

    $data= array_combine($stid,$quantity);
    // exit();
    print_r($data);
    // exit();
    
    // $data=array(
    //     $stid=>$quantity
    // );
    // print_r($quantity)

    // $id=$_POST["id"];
    // $id=$
    
    // $sql="SELECT * FROM storage where id='$stid'";
    // $result=$conn->query($sql);
    // // print_r($result);
    // while($row = $result->fetch_assoc()){
    //     $price= $row['price']; 
        
    // }

    // echo $price;
    
   
    // exit();
    
    // $subtotal=$price*$quantity;
    
    // echo $subtotal;
    // exit();
   

    

    $sqlCo="INSERT INTO customize_order(member_list_id,  date) VALUES ('$memberid', '$now')";
    if($conn->query($sqlCo)){
        $last_id=$conn->insert_id;
        // echo "資料建立成功, 這筆資料的代號是";
        header("location:Customized-order.php");
    }else {
        echo "Error: " . $sqlCo . "<br>" . $conn->error;
    }



    foreach ($data as $key => $value) {
        
        $sqlCod = "INSERT INTO customized_order_detail(po_id, storage_id, quantity) VALUES ('$last_id', '$key', '$value')";
        
        if ($conn->query($sqlCod)) {
            // $last_id = $conn->insert_id;
            // echo "資料建立成功, 這筆資料的代號是";
            header("location:Customized-order.php");
        } else {
            echo "Error: " . $sqlCod . "<br>" . $conn->error;
        }
        
    }


    // foreach ($data as $key => $value) {
    //     $sqlCod = "INSERT INTO customized_order_detail(po_id, storage_id, quantity) VALUES ('$last_id', '$key', '$value')";
        

    //     if ($conn->query($sqlCod)) {
    //         // $last_id = $conn->insert_id;
    //         // echo "資料建立成功, 這筆資料的代號是";
    //         // header("location:Customized-order.php");
    //     } else {
    //         echo "Error: " . $sqlCod . "<br>" . $conn->error;
    //     }
        
    // }
    

    // if($conn->query($sqlCod)){
    //     // $last_id=$conn->insert_id;
    //     echo "資料建立成功, 這筆資料的代號是";
    //     header("location:Customized-order.php");
    // }else {
    //     echo "Error: " . $sqlCod . "<br>" . $conn->error;
    // }
    

    
    $conn->close();
?>