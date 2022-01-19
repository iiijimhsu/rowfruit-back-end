
<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "12345";
    // $dbname = "my_test_db";

    // $conn = new mysqli($servername, $username, $password, $dbname);

    // if ($conn->connect_error) {
    //     die("連線失敗: " . $conn->connect_error);
    // }

    require_once "../../fruitdb_connect.php";

    // if(!isset($_POST["name"])){
    //     header("location: sub-table.php");
    //     exit;
    // }
    date_default_timezone_set("Asia/Taipei");

    // $id=$_POST["id"];
    $fruit_name=$_POST["fruit_name"];
    $carbon_water=$_POST["carbon_water"];
    $dietary_fiber=$_POST["dietary_fiber"];
    $vitamin_A=$_POST["vitamin_A"];
    $vitamin_C=$_POST["vitamin_C"];
    $Potassium=$_POST["Potassium"];
  


    $sql="INSERT INTO customize_label(fruit_name, carbon_water, dietary_fiber, vitamin_A, vitamin_C,Potassium ) VALUES ('$fruit_name', '$carbon_water',  '$dietary_fiber', '$vitamin_A','$vitamin_C','$Potassium')";

    if ($conn->query($sql)) {
        $last_id=$conn->insert_id;
        echo "資料建立成功, 這筆資料的代號是 $last_id";
        header("location: customize-label-table.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
        $conn->close();
?>