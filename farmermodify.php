<?php
    require_once "../../fruitdb_connect.php";
    $id=$_POST["modifyid"];
    $account=$_POST["modifyaccount"];
    $name=$_POST["modifyname"];
    $phonenumber=$_POST["modifyphonenumber"];
    $email=$_POST["modifyemail"];
    $address=$_POST["modifyaddress"];
    // $products=$_POST["modifyproducts"];
    
    $sqlFarmer="UPDATE farmer_member SET account='$account', name='$name', phonenumber='$phonenumber',email='$email', address='$address' WHERE id=$id";

    if($conn->query($sqlFarmer)){
        echo "資料建立成功";
        header("location: farmeruser.php");
    }else{
        echo "Error" . $conn->error;
    }
    $conn->close();
?>