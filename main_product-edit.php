<?php
     require_once "../../fruitdb_connect.php";
     $id=$_POST["id"];
     $productname=$_POST["productname"];
     $price=$_POST["price"];
     $quantity=$_POST["quantity"];
     $content=$_POST["content"];
     
    

     

     


    

    if($_FILES["file"]["error"]==0){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], "../img/".$_FILES["file"]["name"])){
           
            $fileName=$_FILES["file"]["name"];
            $sql = "UPDATE main_product SET product_name='$productname', price='$price',quantity='$quantity',image='$fileName',content='$content' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "更新成功";
                header("location: main_product.php");
        
            } else {
                    echo "更新資料錯誤: " . $conn->error;
            }

        }else{
            echo "upload fail!";
        }


    }else{
    $sql = "UPDATE main_product SET product_name='$productname', price='$price',quantity='$quantity',content='$content' WHERE id=$id";

        
        if ($conn->query($sql) === TRUE) {
            echo "更新成功";
            header("location: main_product.php");
    
        } else {
                echo "更新資料錯誤: " . $conn->error;
        }}
?>
