<?php
    require_once "../../fruitdb_connect.php";
    $productname=$_POST["productname"];
    $sql="SELECT product_name FROM main_product WHERE product_name='$productname'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        echo "該品項已存在";
        exit;
    }
    
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $content=$_POST["content"];
    
    if($_FILES["file"]["error"]==0){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], "../img/".$_FILES["file"]["name"])){
           
            $fileName=$_FILES["file"]["name"];
            $sql="INSERT INTO main_product(product_name, price,image, quantity, content) VALUES ('$productname', '$price','$fileName', '$quantity', '$content')";
        
            if($conn->query($sql)){
                $last_id=$conn->insert_id;
                echo "資料建立成功, 這筆資料的代號是 $last_id";
                header("location: main_product.php");
            }else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }else{
            echo "upload fail!";
        }


    }else{
        $sql="INSERT INTO main_product(product_name, price, quantity, content) VALUES ('$productname', '$price', '$quantity', '$content')";
        
        if($conn->query($sql)){
            $last_id=$conn->insert_id;
            echo "資料建立成功, 這筆資料的代號是 $last_id";
            header("location: main_product.php");
        }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>
