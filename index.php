<?php
require_once "require/header.php";
require_once "../../fruitdb_connect.php";
$sql = "SELECT * FROM order_list";
$result = $conn->query($sql);
$sqlCon = "SELECT * FROM contactus WHERE status='未處理' or status='處理中'";
$resultCon = $conn->query($sqlCon);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>rowfruit後台管理系統</title>
    <?php require_once "require/css.php" ?>
</head>

<body class="sb-nav-fixed">
    <?php require_once "require/topnav.php" ?>
    <div id="layoutSidenav">
        <?php require_once "require/sidenav.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="h2 mt-4">後台系統管理平台</h1>
                    <ol class="breadcrumb mt-3 mb-4">
                        <li class="breadcrumb-item active">系統管理 -&nbsp <a href="index.php"> 首頁選單</a></li>
                    </ol>
                    <div class="row mb-5">
                        <div class="col-xl-3 col-lg-4 col-md-6 mr-3">
                            <div class="remind card bg-warning text-white mb-4 border-0">
                                <div class="card-body d-flex">
                                    <div class="m-3 mt-5"><i class="far fa-comment-alt fa-5x"></i></div>
                                    <div class="mt-4 ml-3 text-center">
                                        <h4>訂單</h4><br>
                                        <h4><?= $result->num_rows ?>則未處理</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="remind card bg-warning text-white mb-4 border-0">
                                <div class="card-body d-flex">
                                    <div class="m-3 mt-5"><i class="far fa-comment-alt fa-5x"></i></div>
                                    <div class="mt-4 ml-3 text-center">
                                        <h4>聯絡我們</h4><br>
                                        <h4><?= $resultCon->num_rows ?>則未處理</h4>
                                    </div>
                                </div>
                                <!-- <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas f.a-angle-right"></i></div>
                                    </div> -->
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-md-6">
                                <div class="remind card bg-success text-white mb-4">
                                    <div class="card-body d-flex">
                                        <div class="m-3 mt-5"><i class="fas fa-shopping-cart fa-5x"></i></div>
                                        <div class="mt-3 m-2 text-center"><h3 class="h4 mt-2">今日銷售總量</h3><br><h2 class="h1">３５</h2></div>
                                    </div>
                                </div>
                            </div> -->
                        <div class="col-xl-3 col-md-6">
                            <!-- <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center my-4"><i class="fas fa-user-alt fa-7x"></i></i></div>
                                    <h2 class="h2 font-weight-bold text-center">會員管理</h2>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item text-center"><a class="text-muted stretched-link" href="user-table.php">消費者會員</a></li>
                                    <li class="list-group-item text-center"><a class="text-muted stretched-link" href="farmeruser.php">小農會員</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center my-4"><i class="fas fa-shopping-bag fa-7x"></i></div>
                                    <h2 class="h2 font-weight-bold text-center">商品管理</h2>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item text-center"><a class="text-muted stretched-link" href="main_product.php">主打商品</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center my-4"><i class="fas fa-search fa-7x"></i></div>
                                    <h2 class="h2 font-weight-bold text-center">訂單管理</h2>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item text-center"><a class="text-muted stretched-link" href="order_list.php">主打商品訂單</a></li>
                                    <li class="list-group-item text-center"><a class="text-muted stretched-link" href="sub-table.php">訂閱制訂單</a></li>
                                    <li class="list-group-item text-center"><a class="text-muted stretched-link" href="customized-order.php">客製化訂單</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center my-4"><i class="fas fa-apple-alt fa-7x"></i></div>
                                    <h2 class="h2 font-weight-bold text-center">客製化水果</h2>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item text-center"><a class="text-muted stretched-link" href="storage-management.php">水果項目</a></li>
                                    <li class="list-group-item text-center"><a class="text-muted stretched-link" href="customize-label-table.php">標籤管理</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center my-4"><i class="far fa-copy fa-7x"></i></div>
                                    <h2 class="h2 font-weight-bold text-center">文章管理</h2>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item text-center"><a class="text-muted stretched-link" href="article-test.php">文章列表</a></li>
                                    <li class="list-group-item text-center"><a class="text-muted stretched-link" href="message.php">留言管理</a></li>
                                    <li class="list-group-item text-center"><a class="text-muted stretched-link" href="evaluation.php">評價管理</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center my-4"><i class="far fa-comments fa-7x"></i></div>
                                    <h2 class="h2 font-weight-bold text-center">聯絡我們</h2>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item text-center"><a class="text-muted stretched-link" href="contact.php">聯絡資訊</a></li>
                                    <!-- <li class="list-group-item text-center"><a class="text-muted" href="">信箱管理</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
            <?php require_once "require/footer.php" ?>
        </div>
    </div>
    <?php require_once "require/js.php" ?>
</body>

</html>