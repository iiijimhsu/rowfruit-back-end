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
    <title>水果庫存管理</title>
    <?php require_once "require/css.php" ?>
</head>

<body class="sb-nav-fixed">
    <?php require_once "require/topnav.php" ?>
    <div id="layoutSidenav">
        <?php require_once "require/sidenav.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">水果庫存管理</h1>
                    <ol class="breadcrumb mb-4 mt-4">
                        <li class="breadcrumb-item"><a href="index.html">客製化水果</a></li>
                        <li class="breadcrumb-item active">水果庫存</li3>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mr-4">
                                <form class="form-inline py-2" action="storage-insert-data.php" method="post">
                                    <div class="form-group m-4">
                                        <label for="">商品編號:ST</label>
                                        <input type="text" class="form-control ml-1" name="id" placeholder="自動生成" READONLY>
                                    </div>
                                    <div class="form-group mr-2">
                                        <label for="">商品名稱:</label>
                                        <input type="text" class="form-control  ml-1" name="funame" required>
                                    </div>
                                    <div class="form-group mr-2">
                                        <label for="">種類:</label>
                                        <input type="text" class="form-control  ml-1" name="futype" required>
                                    </div>
                                    <div class="form-group mr-2 pr-4">
                                        <label for="">供應商編號:WF </label>
                                        <input type="text" class="form-control  ml-1" name="farmerid" required>
                                    </div>
                                    <div class="form-group mr-2 ">
                                        <label for="">商品數量:</label>
                                        <input type="number" class="form-control  ml-1" name="quantity" required>
                                    </div>
                                    <div class="form-group m-4 pr-4">
                                        <label for="">商品金額:$ </label>
                                        <input type="amount" class="form-control  ml-1" name="price" required>
                                    </div>
                                    <div class="form-group m-4 pr-4">
                                        <label for="">內容:</label>
                                        <input type="text" class="form-control  ml-1" name="content">
                                    </div>
                                    <button class="btn btn-info" type="submit">新增</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-3"></i>
                            水果庫存

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

                                    <tbody>
                                        <?php while ($row = $result->fetch_assoc()) { ?>
                                            <tr>

                                                <td><?= $row["id"] ?></td>
                                                <td><?= $row["fruitname"] ?></td>
                                                <td>WF<?= $row["farmer_list_id"] ?></td>
                                                <td><?= $row["quantity"] ?></td>
                                                <td class="text-right">$<?= $row["price"] ?></td>
                                                <td>

                                                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#add<?= $row["id"] ?>">檢視</button>
                                                    <div class="modal fade" id="add<?= $row["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"></span>商品編號</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" name="stnum" value=" ST<?= $row["id"] ?>" READONLY>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>供應商姓名</label>
                                                                        <div class="col-sm-9 ">
                                                                            <input type="text" class="form-control" name="productname" value="<?= $farmerlist[$row["farmer_list_id"]] ?>" READONLY>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>商品</label>
                                                                        <div class="col-sm-9 ">
                                                                            <input type="text" class="form-control" name="productname" value="<?= $row["fruitname"] ?>" READONLY>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>內容</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" name="productname" value="<?= $row["content"] ?>" READONLY>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modify<?= $row["id"] ?>">修改</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modify<?= $row["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">商品編號:</label>

                                                                            <div class="col-sm-9 ">
                                                                                <input type="text" class="form-control" value="ST<?= $row["id"] ?>" READONLY>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">商品名稱:</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" name="funame" value="<?= $row["fruitname"] ?>">

                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">種類:</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" name="futype" value="<?= $row["fruittype"] ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">供應商編號WF:</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" name="farmerid" value="<?= $row["farmer_list_id"] ?>">
                                                                                <input type="text" class="form-control" name="farmername" value="<?= $farmerlist[$row["farmer_list_id"]] ?>" READONLY>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">商品數量:</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="number" class="form-control" name="quantity" value="<?= $row["quantity"] ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label">商品金額$:</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="amount" class="form-control" name="price" value="<?= $row["price"] ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="" class="col-sm-3 col-form-label"><span class="text-danger"> </span>內容</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" name="content" value="<?= $row["content"] ?>">
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">修改</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                            </div>

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $row["id"] ?>">刪除</button>

                            <div class="modal fade" id="delete<?= $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">警告</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="storage-delete-data.php" method="post">
                                                <input type="hidden" name="id" value="<?= $row["id"] ?>">

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
    </script>
</body>

</html>