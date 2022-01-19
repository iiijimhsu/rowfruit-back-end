<?php
    require_once "../../fruitdb_connect.php";
    $account=$_POST["insertaccount"];
    $password=md5($_POST["insertpassword"]);
    $name=$_POST["insertname"];
    $phonenumber=$_POST["insertphonenumber"];
    $email=$_POST["insertemail"];
    $address=$_POST["insertaddress"];
    // $products=$_POST["insertproducts"];

    $sqlFarmer="INSERT INTO farmer_member(account, password, name, phonenumber, email, address, valid) VALUES ('$account', '$password', '$name', '$phonenumber', '$email', '$address',  0)";


    if($conn->query($sqlFarmer)){
        echo "資料建立成功";
        header("location: farmeruser.php");
    }else{
        echo "Error". $conn->error;
    }
    $conn->close();

    if(!isset($_POST["name"])){
        // header("location: farmeruser.php");
    }
?>
