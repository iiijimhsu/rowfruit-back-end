<?php 
    session_start();
    if(isset($_SESSION["error"]["times"])){
        $errorTimes=$_SESSION["error"]["times"];
    }else{
        $errorTimes=0;
    }

    if(isset($_POST["name"]) && isset($_POST["password"])){
        require_once "../../fruitdb_connect.php";

        $name=$_POST["name"];
        $password=$_POST["password"];
        // echo "$name,$password";
        // exit();

        $sql="SELECT * FROM administrator WHERE name='$name' AND password='$password'";

        $result=$conn->query($sql);
        // echo $result->num_rows;
        //資料庫有同樣的帳號密碼顯示1,沒有顯示0

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $_SESSION["user"]["name"]=$row["name"];
                // $_SESSION["user"]["email"]=$row["email"];
                // $_SESSION["user"]["age"]=$row["age"];
            }
            unset($_SESSION["error"]);
             $data=array(
            "status"=>1
             );
            echo json_encode($data);
            // var_dump($_SESSION["user"]);

            // header("location:index.php");
        }else{
            
            $_SESSION["error"]["message"]="您輸入的帳號密碼錯誤";
            $errorTimes++;
            $_SESSION["error"]["times"]=$errorTimes;
            // header("location:login.php");
             $data=array(
            "status"=>0,
            "errorTimes"=>$errorTimes,
            "message"=>"您輸入的帳號或密碼錯誤 $errorTimes 次"
            );
            echo json_encode($data);

            
        }
    }
?>
