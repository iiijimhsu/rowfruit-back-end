<?php
    require_once "../../fruitdb_connect.php";
    $id=$_POST['id'];
    $name=$_POST['name'];
    $account=$_POST['account'];
    $password=md5($_POST['password']);
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    // echo "$name,$phone,$email,$account,$password,$gender,$address";
    // exit();
    
    $sql = "UPDATE member_list SET name='$name', account='$account', password='$password', gender='$gender', phone='$phone', email='$email', address='$address' WHERE id=$id";

    if($conn->query($sql) === TRUE){
        echo "更新成功";
        header("location:user-table.php");
    } else {
        echo "更新資料錯誤:" . $conn->error;
    }
    

?>