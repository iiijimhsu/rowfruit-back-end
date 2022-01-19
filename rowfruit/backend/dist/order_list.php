
<?php
require_once "../../fruitdb_connect.php";

 $id=$_POST["id"];
 $member_number=$_POST["member_number"];
 $name=$_POST["name"];
 $phone=$_POST["phone"];
 $email=$_POST["email"];
 $address=$_POST["address"];
 $product_item=$_POST["product_item"];
 $product_quantity=$_POST["product_quantity"];
 $create_time=$_POST["create_time"];   
 $price=$_POST["price"];
 $now=date('Y-m-d H:i:s');


$sql = "SELECT * FROM order_list WHERE valid=0";
$result = $conn->query($sql);


$mem = [];

//member_list抓id
$sqlmem = "SELECT * FROM member_list";
$resultmem = $conn->query($sqlmem);
while ($rowmem = $resultmem->fetch_assoc()) {
    $mem[$rowmem["id"]] = $rowmem["name"];
    $phone[$rowmem["id"]] = $rowmem["phone"];
    $email[$rowmem["id"]] = $rowmem["email"];
    $address[$rowmem["id"]] = $rowmem["address"];
}

// 抓main product 商品名稱
$sqlmain = "SELECT * FROM main_product";
$resultmain = $conn->query($sqlmain);
// print_r ($resultmain);
// exit();
while ($rowmain = $resultmain->fetch_assoc()) {
    $name[$rowmain["id"]] = $rowmain["product_name"];
    $price[$rowmain["id"]] = $rowmain["price"];
}

if ($conn->query($sql)) {
    // $id=$conn->insert_id;
    echo "資料建立成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); //資料庫關閉
// 連結資料庫後需要關閉 (尤其帳密)

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>主打商品訂單</title>
    <?php require_once "require/css.php" ?>
</head>

<body class="sb-nav-fixed">
    <div class="modal fade" id="modify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">修改與檢視</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="order_list-edit.php" method="post">
                        <input type="hidden" name="id" value="" id="id">
                        <div class="form-group row auto">
                            <label for="" class="col-sm-3 col-form-label">會員編號</label>
                            <div class="col-sm-9">
                                <input type="text" id="memberId" class="form-control-plaintext" name="member_id" readonly>
                            </div>
                        </div>
                        <div class="form-group row auto">
                            <label for="" class="col-sm-3 col-form-label">會員姓名</label>
                            <div class="col-sm-9">
                                <input type="text" id="memberName" class="form-control" name="member_name" disabled>
                            </div>
                        </div>
                        <div class="form-group row auto">
                            <label for="" class="col-sm-3 col-form-label">會員電話</label>
                            <div class="col-sm-9">
                                <input type="text" id="memberPhone" class="form-control" name="member_phone" disabled>
                            </div>
                        </div>
                        <div class="form-group row auto">
                            <label for="" name="product_id" class="col-sm-3 col-form-label">商品名稱</label>
                            <div class="col-sm-9 ">
                                <select class="form-control col-7" name="product_id" id="product_id">
                                    <option value="1">1.美白水果盒</option>
                                    <option value="2">2.健身水果盒</option>
                                    <option value="3">3.窈窕輕盈水果盒</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">product_item</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="productItem" name="product_item" value="">
                            </div>
                        </div> -->
                        <div class="form-group row auto">
                            <label for="" class="col-sm-3 col-form-label">商品數量</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="productQuantity" name="product_quantity" value="">
                            </div>
                        </div>
                        <div class="form-group row auto">
                            <label for="" class="col-sm-3 col-form-label">訂單日期</label>
                            <div class="col-sm-9 ">
                                <input type="date" class="form-control" id="createTime" name="create_time" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">訂單金額</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="price" id="price">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">確認</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">警告</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="order_list-delete.php" method="POST">
                        <input type="hidden" name="id" value="" id="hidden">
                        確認刪除？
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary border">確認</button>
                            <button type="button" class="btn btn-light border" data-dismiss="modal">取消</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "require/topnav.php" ?>
    <div id="layoutSidenav">
        <?php require_once "require/sidenav.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="">訂單管理</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">商品管理</a></li>
                        <li class="breadcrumb-item active">主打商品訂單</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="order_list-insert-data.php" method="post">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-2 row">
                                        <label for="" name="member_id" class="col-form-label col-5">會員編號</label>
                                        <input type="text" class="form-control col-7" id="userNumber" name="member_id" placeholder="輸入會員編號" required>
                                    </div>
                                    <div class="col-lg-1">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fas fa-search"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">會員列表</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>會員編號</th>
                                                                    <th>會員姓名</th>
                                                                    <th>會員電話</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="userTarget">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">關閉</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 row">
                                        <label for="" name="product_id" class="col-form-label col-5">商品名稱</label>
                                        <select class="form-control col-7" name="product_id">
                                            <option value="1">1.美白水果盒</option>
                                            <option value="2">2.健身水果盒</option>
                                            <option value="3">3.窈窕輕盈水果盒</option>
                                        </select>
                                    </div>
                                    <!-- <input type="text" name="product_id"> -->
                                    <div class="col-lg-2 row">
                                        <label for="" name="product_quantity" class="col-form-label col-5">商品數量</label>
                                        <input type="text" class="form-control col-7" name="product_quantity" required>
                                    </div>
                                    <!-- <label for="" name="price">訂單金額</label> -->
                                    <!-- <input type="text" name="price"> -->
                                    <!-- <div class="col-lg-2 row">
                                        <label for="" name="create_time" class="col-form-label col-5">訂單日期</label>
                                        <input type="date" class="form-control col-7" name="create_time" required>
                                    </div> -->
                                    <button class="btn btn-info m-4">新增</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            主打商品訂單
                            <!-- 前台新增訂單 line182~198  -->

                            <!-- 彈跳視窗新增訂單 line197~251 -->
                            <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">新增</button> -->
                            <!-- Modal -->
                            <!-- <div class="modal fade" id="create" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">新增訂單</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="insert-data.php" method="post">
                                                <input type="hidden" name="id">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">member_id</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="member_id">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">product_item</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="product_id">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">product_quantity</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="product_quantity">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">create_time</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" name="create_time">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">price</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="price">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">確認</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>訂單編號</th>
                                            <th>會員姓名</th>
                                            <th>會員編號</th>
                                            <th>會員電話</th>
                                            <th>會員信箱</th>
                                            <th>會員地址</th>
                                            <th>商品名稱</th>
                                            <th>商品數量</th>
                                            <th>訂單日期</th>
                                            <th>訂單金額</th>
                                            <th>修改</th>
                                        </tr>
                                    </thead>
                                    <tbody id="target">
                                        <?php
                                        $data = array();
                                        while ($row = $result->fetch_assoc()) {
                                            $order["id"] = $row["id"];
                                            $order["member_name"] = $mem[$row["member_id"]];
                                            $order["member_id"] = $row["member_id"];
                                            $order["member_phone"] = $phone[$row["member_id"]];
                                            $order["member_email"] = $email[$row["member_id"]];
                                            $order["member_address"] = $address[$row["member_id"]];
                                            $order["product_id"] = $row["product_id"];
                                            $order["product_quantity"] = $row["product_quantity"];
                                            $order["create_time"] = $row["create_time"];
                                            $order["price"] = $price[$row["product_id"]] * $row["product_quantity"];
                                            // echo $price[$row["id"]]*$row["product_quantity"];
                                            // exit();
                                            array_push($data, $order);
                                        ?>
                                            <tr>
                                                <td><?= $row["id"] ?></td>
                                                <td><?= $mem[$row["member_id"]] ?></td>
                                                <td><?= $row["member_id"] ?></td>
                                                <td><?= $phone[$row["member_id"]] ?></td>
                                                <td><?= $email[$row["member_id"]] ?></td>
                                                <td><?= $address[$row["member_id"]] ?></td>
                                                <td><?= $name[$row["product_id"]] ?></td>
                                                <td><?= $row["product_quantity"] ?></td>
                                                <td><?= $row["create_time"] ?></td>
                                                <td><?= $price[$row["product_id"]] * $row["product_quantity"] ?></td>
                                                <td>

                                                    <button type="button" class="btn btn-secondary btn-editor" data-toggle="modal" data-target="#modify" data-editor="<?= $order["id"] ?>">修改</button>
                                                    <!-- Modal 修改訂單 line283~329 -->

                                                    <!-- <button type="button" class="btn btn-danger">刪除</button> -->
                                                    <button type="button" class="btn btn-danger btn-dl" data-toggle="modal" data-target="#delete" data-delete="<?= $order["id"] ?>">刪除</button>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php require_once "require/footer.php" ?>
        </div>
    </div>
    <?php require_once "require/js.php" ?>
    
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({

            });

        });
        let data = <?= json_encode($data) ?>;
        console.log(data)
        $("#target").on("click", ".btn-editor", function() {
            let targetID = $(this).data("editor");
            // console.log(targetID)
            let orderData = data.find((item) => {
                return item.id == targetID;
            })
            console.log(orderData)
            $("#id").val(orderData.id);
            $("#memberId").val(orderData.member_id)
            $("#memberName").val(orderData.member_name)
            $("#memberPhone").val(orderData.member_phone)
            $("#productItem").val(orderData.product_name)
            $("#productQuantity").val(orderData.product_quantity)
            $("#createTime").val(orderData.create_time)
            $("#price").val(orderData.price)
            $("#product_id").val(orderData.product_id)
        })

        $("#target").on("click", ".btn-dl", function() {
            let deleteID = $(this).data("delete");
            // console.log(deleteID)
            $("#hidden").val(deleteID)
        })

        $.ajax({
                method: "POST",
                url: "loadUsers.php",
                // data: { name: "", phone: "" },
                dataType: "json"
            })
            .done(function(data) {
                console.log(data)
                let content = "";
                data.forEach((user) => {
                    content += `
            <tr>
                <td></td>
                <td class="btn-select">${user.id}</td>
                <td>${user.name}</td>
                <td>${user.phone}</td>                
            </tr>
            `
                })

                $("#userTarget").on("click", ".btn-select", function() {
                    let userNumber = $(this).text();
                    console.log(userNumber)
                    $("#userNumber").val(userNumber)
                    $(this).attr("data-dismiss", "modal")


                })

                $("#userTarget").append(content)
            }).fail(function(error) {
                console.log(error)
            })
            .always(function() {});
    </script>
</body>

</html>