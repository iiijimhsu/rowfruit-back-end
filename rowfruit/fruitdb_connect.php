<?php
    date_default_timezone_set("Asia/Taipei");
    $servername = "localhost";
    $username = "root";
    $password = "123";
    $dbname = "row_fruit_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
  	die("連線失敗: " . $conn->connect_error);
    }
        
?>