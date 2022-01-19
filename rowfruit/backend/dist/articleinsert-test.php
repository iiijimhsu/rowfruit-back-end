
<?php
    require_once "../../fruitdb_connect.php";
    // $picture=$_FILES["insertpicture"];
    $title=$_POST["inserttitle"];
    $category=$_POST["insertcategory"];
    $content=$_POST["insertcontent"];
    $author=$_POST["insertauthor"];
    $status=$_POST["insertstatus"];
    $now=date('Y-m-d H:i:s');

    $sqlarticle="INSERT INTO article(title, category, content, author, created_time, status, valid) VALUES ('$title', '$category', '$content', '$author', '$now', '$status', 0)";
    if($conn->query($sqlarticle)){
        echo "upload sucess!";
        header("location: article-test.php");
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
