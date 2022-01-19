
<?php
    require_once "../../fruitdb_connect.php";
    $id=$_POST["deleteid"];

    $sqlarticle="UPDATE article SET VALID=1 WHERE id=$id";
    if($conn->query($sqlarticle)){
        echo "資料建立成功";
        header("location: article-test.php");
    }else{
        echo "Error";
    }
    $conn->close();

?>