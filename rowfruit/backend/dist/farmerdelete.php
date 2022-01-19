
<?php
    require_once "../../fruitdb_connect.php";
    $id=$_POST["deleteid"];

    $sqlFarmer="UPDATE farmer_member SET VALID=1 WHERE id=$id";
    if($conn->query($sqlFarmer)){
        echo "資料建立成功";
        header("location: farmeruser.php");
    }else{
        echo "Error";
    }
    $conn->close();

?>