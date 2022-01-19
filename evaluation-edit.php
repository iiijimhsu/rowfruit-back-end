
<?php
     require_once "../../fruitdb_connect.php";
     $id=$_POST["id"];
     $select=$_POST["select"];
     
     
    

     $sql = "UPDATE evaluation SET status='$select' WHERE id=$id";


     if ($conn->query($sql) === TRUE) {
        echo "更新成功";
        header("location: evaluation.php");

    } else {
            echo "更新資料錯誤: " . $conn->error;
    }
?>
