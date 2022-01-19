
<?php
    require_once "../../fruitdb_connect.php";
    $picture=$_FILES["insertpicture"];
    $title=$_POST["inserttitle"];
    $category=$_POST["insertcategory"];
    $content=$_POST["insertcontent"];
    $author=$_POST["insertauthor"];
    $status=$_POST["insertstatus"];
    $now=date('Y-m-d H:i:s');

    // var_dump($picture);

    if($_FILES["insertpicture"]["name"]==""){
        $sqlarticle="INSERT INTO article(title, category, content, picture, author, created_time, status, valid) VALUES ('$title', '$category', '$content', '', '$author', '$now', '$status', 0)";
            if($conn->query($sqlarticle)){
                echo "upload sucess!";
                header("location: article.php");
            }else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

    }else{

        if($_FILES["insertpicture"]["error"]==0){
            if(move_uploaded_file($_FILES["insertpicture"]["tmp_name"], "../img/".$_FILES["insertpicture"]["name"])){
            
                
                $picturename=$_FILES["insertpicture"]["name"];
                $sqlarticle="INSERT INTO article(title, category, content, picture, author, created_time, status, valid) VALUES ('$title', '$category', '$content', '$picturename', '$author', '$now', '$status', 0)";
                if($conn->query($sqlarticle)){
                    echo "upload sucess!";
                    header("location: article.php");
                }else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            }else{
                echo "upload fail!";
                echo $_FILES['insertpicture']['error'];
            }


        }else{
            var_dump($_FILES["file"]["error"]);
        }

    }


    // $sqlarticle="INSERT INTO article(title, category, content, picture, author, created_time, status, valid) VALUES ('$title', '$category', '$content', '$picture', '$author', '$now', '$status', 0)";


    // if($conn->query($sqlarticle)){
    //     echo "資料建立成功";
    //     header("location: article.php");
    // }else{
    //     echo "Error". $conn->error;
    // }
    // $conn->close();

    // if(!isset($_POST["name"])){
    //     // header("location: article.php");
    // }
?>
