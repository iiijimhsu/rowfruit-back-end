
<?php
    require_once "../../fruitdb_connect.php";
    $id=$_POST["id"];
    $fruit_name=$_POST["fruit_name"];
    $carbon_water=$_POST["carbon_water"];
    $dietary_fiber=$_POST["dietary_fiber"];
    $vitamin_A=$_POST["vitamin_A"];
    $vitamin_C=$_POST["vitamin_C"];
    $Potassium=$_POST["Potassium"];
    

    $sql="UPDATE customize_label SET fruit_name = '$fruit_name', carbon_water='$carbon_water', dietary_fiber='$dietary_fiber', vitamin_A='$vitamin_A', vitamin_C = '$vitamin_C', Potassium = '$Potassium' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
    	echo "更新成功";
        header("location: customize-label-table.php");
    } else {
    	echo "更新資料錯誤: " . $conn->error;
    }
?>