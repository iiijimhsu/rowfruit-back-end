<?php
require_once "require/header.php";
require_once "../../fruitdb_connect.php";

$sqlfarmerlist = "SELECT * FROM farmer_member";
$resultFalist = $conn->query($sqlfarmerlist);
while ($rowFalist = $resultFalist->fetch_assoc()) {
    $farmerlist[$rowFalist["id"]] = $rowFalist["name"];
}

$sqlmemberlist = "SELECT * FROM member_list";
$resultMemlist = $conn->query($sqlmemberlist);
while ($rowMemlist = $resultMemlist->fetch_assoc()) {
    $memberlist[$rowMemlist["id"]] = $rowMemlist["name"];
}

$sql = "SELECT * FROM storage where valid=0";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <?php require_once "require/css.php" ?>
</head>

<body class="sb-nav-fixed">
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">商品明細</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>商品編號</label>
                        <div class="col-sm-9 ">
                            <input type="text" id="stId" class="form-control-plaintext" name="id" value="" READONLY>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>供應商</label>
                        <div class="col-sm-9 ">
                            <input type="text" id="farmerName" class="form-control-plaintext" name="farmername" value="" READONLY>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>商品</label>
                        <div class="col-sm-9 ">
                            <input type="text" id="fruitName" class="form-control-plaintext" name="productname" value="" READONLY>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>內容</label>
                        <div class="col-sm-9">
                            <input type="text" id="content" class="form-control-plaintext" name="content" value="" READONLY>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="modal fade" id="modify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">修改水果項目</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="storage-edit-data.php" method="post">
                        <input type="hidden" name="id" value="" id="id">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"><span class="text-danger"> </span>商品編號</label>
                            <div class="col-sm-9 ">
                                <input type="text" id="eid" class="form-control-plaintext" name="eid" value="" READONLY>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">商品名稱</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="efruitName" name="efruitname" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">種類:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="efruittype" name="efruittype" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">供應商編號:</label>
                            <div class="col-sm-9">
                                <input type="datetime" class="form-control" id="farmerId" name="farmer_list_id" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">商品數量:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="quantity" id="quantity" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">商品金額$:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="price" id="price" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">內容</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="econtent" id="econtent" rows="5" value=""></textarea>
                                <!-- <input type="text" class="form-control" name="content" value=""> -->
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
                    <form action="storage-delete-data.php" method="POST">
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
                    <h1 class="mt-4">水果庫存</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">客製化水果</a></li>
                        <li class="breadcrumb-item active">水果庫存</li3>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                            .
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header ">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <i class="fas fa-table mr-3"></i>
                                    水果庫存
                                </div>

                                <button type="submit" class="btn btn-info ml-10" data-toggle="modal" data-target="#add">新增商品</button>

                            </div>
                            <div class="mr-4 ">

                                <!-- Modal -->
                                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">新增商品</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="storage-insert-data.php" method="post">

                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>商品名稱</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="funame" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>種類</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="futype" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>供應商編號</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="farmerid" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>商品數量:</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="quantity" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>商品金額</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="price" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label">內容</label>
                                                        <div class="col-sm-9">
                                                            <textarea type="text" class="form-control" name="content" rows="5" value=""></textarea>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">新增</button>

                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>商品編號</th>
                            <th>商品名稱</th>
                            <th>供應商編號</th>
                            <th>商品數量</th>
                            <th>商品金額</th>
                            <th>商品明細</th>
                            <th>操作</th>
                        </tr>
                    </thead>


                    <tbody id="target">
                        <?php
                        $data = array();
                        while ($row = $result->fetch_assoc()) {
                            $stmg["id"] = $row["id"];
                            $stmg["fruitname"] = $row["fruitname"];
                            $stmg["farmer_list_id"] = $row["farmer_list_id"];
                            $stmg["quantity"] = $row["quantity"];
                            $stmg["price"] = $row["price"];
                            $stmg["content"] = $row["content"];
                            $stmg["farmername"] = $farmerlist[$row["farmer_list_id"]];
                            $stmg["fruittype"] = $row["fruittype"];
                            // -------------------------------------
                            $stmg["eid"] = $row["id"];
                            $stmg["efruitname"] = $row["fruitname"];
                            $stmg["efruittype"] = $row["fruittype"];
                            $stmg["econtent"] = $row["content"];

                            array_push($data, $stmg);
                        ?>
                            <tr>
                                <td><?= $stmg["id"] ?></td>
                                <td><?= $stmg["fruitname"] ?></td>
                                <td>WF<?= $stmg["farmer_list_id"] ?></td>
                                <td><?= $stmg["quantity"] ?></td>
                                <td class="text-right">$<?= $stmg["price"] ?></td>
                                <td><button type="button" class="btn btn-primary btn-view" data-toggle="modal" data-target="#view" data-view="<?= $stmg["id"] ?>">檢視</button></td>
                                <td>

                                    <button type="button" class="btn btn-secondary btn-editor" data-toggle="modal" data-target="#modify" data-editor="<?= $stmg["id"] ?>">修改</button>
                                    <!-- Modal 修改訂單 line283~329 -->

                                    <!-- <button type="button" class="btn btn-danger">刪除</button> -->
                                    <button type="button" class="btn btn-danger btn-dl" data-toggle="modal" data-target="#delete" data-delete="<?= $stmg["id"] ?>">刪除</button>

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
            $('#dataTable').DataTable();

        });


        let data = <?= json_encode($data) ?>;
        console.log(data)
        $("#target").on("click", ".btn-view", function() {
            let targetID = $(this).data("view");
            // console.log(targetID)
            let stmgData = data.find((item) => {
                return item.id == targetID;
            })
            $("#stId").val(stmgData.id)
            $("#farmerName").val(stmgData.farmername)
            $("#fruitName").val(stmgData.fruitname)
            $("#content").val(stmgData.content)
        })
        $("#target").on("click", ".btn-editor", function() {
            let targetID = $(this).data("editor");
            // console.log(targetID)
            let stmgData = data.find((item) => {
                return item.id == targetID;
            })
            // console.log(orderData)
            $("#eid").val("ST" + stmgData.id);
            $("#efruitName").val(stmgData.fruitname)
            $("#efruittype").val(stmgData.fruittype)
            $("#farmerId").val("WF" + stmgData.farmer_list_id)
            $("#quantity").val(stmgData.quantity)
            $("#price").val(stmgData.price)
            $("#econtent").val(stmgData.content)
        })
        $("#target").on("click", ".btn-dl", function() {
            let deleteID = $(this).data("delete");
            // console.log(deleteID)
            $("#hidden").val(deleteID)


        })
    </script>
</body>

</html>