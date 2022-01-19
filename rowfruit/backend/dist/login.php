<!-- <?php
    // require_once "/xampp/htdocs/fruittest/fruitdb_connect.php"
?> -->

<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("location: index.php");
    }
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>rowfruit後台登入</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            body{
                background: center / cover no-repeat url("img/background.jpg");
            }
            main{
                height: 100vh;
            }
        </style>
    </head>
    <body class="bgd">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content" class="h-100">
                <main class="d-flex justify-content-center align-items-center">
                    <div class="container ">
                         <div class="col-5 mx-auto h-100">
                                <div class="card shadow-lg border-0 rounded-lg">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">登入</h3></div>
                                    <div class="card-body">
                                        <?php if(isset($_SESSION["error"]["times"]) && $_SESSION["error"]["times"]>5): ?>
                                            您登入的次數太多，請稍後再回來使用正確帳號密碼登入
                                         <?php else:?>
                                        <div >
                                            <div class="form-group">
                                                <label class="small mb-1" >帳號</label>
                                                <input class="form-control py-4" type="text" placeholder="請輸入帳號" id="account" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">密碼</label>
                                                <input class="form-control py-4"  type="password" placeholder="請輸入密碼" id="password" />
                                            </div>
                                            <div class="form-group">
                                                <!-- <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div> -->
                                            </div>
                                            <div class="text-danger mt-2" id="errMsg"></div>
                                            <div class="form-group mt-5 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <button class="btn btn-primary btn-info btn-lg btn-block" id="login">登入</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0 text-center ">
                                        <div class="small my-2"><a href="register.html" class="text-muted">關於我們 | &copy; rowfruit Corporation</a></div>
                                    </div>
                                </div>
                                 <?php endif; ?>
                            </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-transparent mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; rowfruit 2021</div>
                            <div>
                                <!-- <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a> -->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script>
         $("#login").click(function(){
            let account=$("#account").val();
            let password=$("#password").val();
            $.ajax({
                    method: "POST",
                    url: "doLogin.php",
                    data: { 
                        name: account,
                        password: password
                    },
                    dataType: "json"
                    })
                    .done(function( data ) {
                        console.log(data)
                        if(data.status===0){
                            // alert(data.message)                            
                            if(data.errorTimes>5){
                                location.href="";
                            }else{
                                $("#errMsg").text(data.message)
                            }
                        }else{
                            location.href="";
                        }
                    }).fail(function(error) {
                        console.log(error)
                    })
                    .always(function() {
                        
                    });
        })
        </script>
        
    </body>
</html>
