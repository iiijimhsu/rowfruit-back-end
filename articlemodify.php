
<?php
    require_once "../../fruitdb_connect.php";
    $id=$_POST["id"];
    $title=$_POST["title"];
    $category=$_POST["category"];
    $content=$_POST["content"];
    $author=$_POST["author"];
    
    $status=$_POST["status"];
    
    $sqlarticle="UPDATE article SET title='$title', category='$category', content='$content',author='$author' ,status='$status' WHERE id=$id";

    if($conn->query($sqlarticle)){
        echo "資料建立成功";
        header("location: article-test.php");
    }else{
        echo "Error" . $conn->error;
    }
    $conn->close();
?>