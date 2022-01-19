<?php 
    require_once "../../fruitdb_connect.php";
    // exit();
    
    // $sql="INSERT INTO users(name, phone, email) VALUES ('Tom','0911111111','tom@test.com')" ;
    // if($conn->query($sql)){
    //     echo "資料建立成功";
    // }else{
    //     echo "Error" .$sql ."<br> .$conn->error";
    // }
    // $conn->close();

    if(!isset($_POST["account"])){
        header("location: user-table.php");
        exit;
    }

    
    $name=$_POST["name"];
    $account=$_POST["account"];
    $password=md5($_POST["password"]);
    $gender=$_POST["gender"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    
    // echo "$name,$phone,$email,$account,$password,$gender,$address";
    // echo "<br>";
    // exit();

    $sql="INSERT INTO member_list(name, account, password, gender, phone, email, address) VALUES ('$name','$account','$password','$gender','$phone','$email','$address')";
    if($conn->query($sql)){
        $last_id=$conn->insert_id;
        echo "資料建立成功,這筆資料的代號式 $last_id";
        header("location: user-table.php");
    }else{
        echo "Error" .$sql ."<br> .$conn->error";
    }
    $conn->close();




?>