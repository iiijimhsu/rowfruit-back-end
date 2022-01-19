<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "12345";
    // $dbname = "my_test_db";

    // $conn = new mysqli($servername, $username, $password, $dbname);

    // if ($conn->connect_error) {
    //     die("連線失敗: " . $conn->connect_error);
    // }

    require_once "../../fruitdb_connect.php";

    // if(!isset($_POST["name"])){
    //     header("location: sub-table.php");
    //     exit;
    // }
    date_default_timezone_set("Asia/Taipei");

    // $id=$_POST["id"];
    $user_id=$_POST["user_id"];
    $product_id=$_POST["product_id"];
    
   
    $subscribe_way=$_POST["subscribe_way"];
    $now=date('Y-m-d H:i:s');
    // $d=strtotime("+3 Months");
    // $endtime=date('Y-m-d H:i:s',strtotime("+1 Months"));
    // $endtime=date('Y-m-d H:i:s',strtotime("+3 Months"));
    // $endtime=date('Y-m-d H:i:s',strtotime("+6 Months"));
  
    switch ($subscribe_way) {
        case '1':
            $endtime=date('Y-m-d H:i:s',strtotime("+1 Months"));
            break;
        case '3':
            $endtime=date('Y-m-d H:i:s',strtotime("+3 Months"));
            break;
        case '6':
            $endtime=date('Y-m-d H:i:s',strtotime("+6 Months"));
            break;
    }
    $status=$_POST["status"];


    $sql="INSERT INTO subscribe(user_id, product_id, subscribe_way, start_time, end_time, status ) VALUES ('$user_id', '$product_id', '$subscribe_way','$now','$endtime','$status')";

    if ($conn->query($sql)) {
        $last_id=$conn->insert_id;
        echo "資料建立成功, 這筆資料的代號是 $last_id";
        header("location: sub-table.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
        $conn->close();
