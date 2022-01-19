<?php
require_once "require/header.php";
require_once "../../fruitdb_connect.php";

$sqlfarmerlist = "SELECT * FROM farmer_member";
$resultFalist = $conn->query($sqlfarmerlist);
while ($rowFalist = $resultFalist->fetch_assoc()) {
    $farmerlist[$rowFalist["id"]] = $rowFalist["name"]; //farmer_list-name
}

$sqlmemberlist = "SELECT * FROM member_list";
$resultmemlist = $conn->query($sqlmemberlist);
while ($rowmemlist = $resultmemlist->fetch_assoc()) {
    $memberlist[$rowmemlist["id"]] = $rowmemlist["name"]; //member_list-name
}
// $sqlpo="SELECT * FROM customize_order";
// $resultpo = $conn->query($sqlpo);
// while($rowpo = $resultpo->fetch_assoc()) { 
//     $po[$rowpo["storage_list"]]=$po["farmer_list_id"]; 
// }

$sqlstorage = "SELECT * FROM storage";
$resultstorage = $conn->query($sqlstorage);
while ($rowstorage = $resultstorage->fetch_assoc()) {
    $storagefa[$rowstorage["id"]] = $rowstorage["farmer_list_id"]; //storage-farmer_list_id
    $storagefu[$rowstorage["id"]] = $rowstorage["fruitname"]; //storage-fruitname
    $storagepr[$rowstorage["id"]] = $rowstorage["price"]; //storage-price
}

$sqloddetail = "SELECT * FROM customized_order_detail";
$resultoddetail = $conn->query($sqloddetail);
while ($rowoddetail = $resultoddetail->fetch_assoc()) {
    $oddetailst[$rowoddetail["po_id"]] = $rowoddetail["storage_id"]; //customized_order_detail-storage_id
    $oddetailqu[$rowoddetail["po_id"]] = $rowoddetail["quantity"]; //customized_order_detail-quantity
}
// while($rowoddetail = $resultoddetail->fetch_array()) { 
//     $oddetailst[$rowoddetail["po_id"]]=$rowoddetail["storage_id"]; 
//     $oddetailqu[$rowoddetail["po_id"]]=$rowoddetail["quantity"]; 
// }

$sql = "SELECT * FROM customize_order where valid=0";
$result = $conn->query($sql);
$aa = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>客製化訂單管理</title>
    <?php require_once "require/css.php" ?>
</head>

<body class="sb-nav-fixed">
    <?php require_once "require/topnav.php" ?>
    <div id="layoutSidenav">
        <?php require_once "require/sidenav.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">客製化訂單</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">訂單管理</a></li>
                        <li class="breadcrumb-item active">客製化訂單</li3>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form class="p-2" action="customized-order-insert-data.php" method="post">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="">訂單編號:PO</label>
                                        <input type="text" class="form-control" name="id" placeholder="自動生成" READONLY>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">會員編號:RF</label>
                                        <input type="memberid" class="form-control" name="member_list_id" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">商品編號ST:</label>
                                        <select class="form-control form-control-lg" name="storage_id">
                                            <option>Large select</option>
                                            <?php while ($row = $aa->fetch_assoc()) { ?><option value="<?= $oddetailst[$row["id"]] ?>"><?= $oddetailst[$row["id"]] ?><?= $storagefu[$oddetailst[$row["id"]]] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 ">
                                        <label for="">供應商編號:WF</label>
                                        <input type="farmerid" class="form-control" name="farmer_list_id" READONLY>
                                    </div>
                                    <div class="col-lg-3 ">
                                        <label for="">商品數量:</label>
                                        <input type="number" class="form-control" name="quantity">
                                    </div>
                                    <div class="col-lg-3 ">
                                        <label for="">訂單日期:</label>
                                        <input type="datetime-local" class="form-control" name="date" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">訂單金額:$</label>
                                        <input type="amout" class="form-control" name="amount" readonly>
                                    </div>

                                    <div class="col-lg-1 d-flex">
                                        <button class="btn btn-primary align-self-end" type="submit">新增</button>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="">訂單編號:PO</label>
                                        <input type="text" class="form-control" name="id" placeholder="自動生成" READONLY>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">會員編號:RF</label>
                                        <input type="memberid" class="form-control" name="member_list_id" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">商品編號ST:</label>
                                        <select class="form-control form-control-lg" name="storage_id">
                                            <option>Large select</option>
                                            <?php while ($row = $aa->fetch_assoc()) { ?><option value="<?= $oddetailst[$row["id"]] ?>"><?= $oddetailst[$row["id"]] ?><?= $storagefu[$oddetailst[$row["id"]]] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 ">
                                        <label for="">供應商編號:WF</label>
                                        <input type="farmerid" class="form-control" name="farmer_list_id" READONLY>
                                    </div>
                                    <div class="col-lg-3 ">
                                        <label for="">商品數量:</label>
                                        <input type="number" class="form-control" name="quantity">
                                    </div>
                                    <div class="col-lg-3 ">
                                        <label for="">訂單日期:</label>
                                        <input type="datetime-local" class="form-control" name="date" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">訂單金額:$</label>
                                        <input type="amout" class="form-control" name="amount" readonly>
                                    </div>

                                    <div class="col-lg-1 d-flex">
                                        <button class="btn btn-primary align-self-end" type="submit">新增</button>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="">訂單編號:PO</label>
                                        <input type="text" class="form-control" name="id" placeholder="自動生成" READONLY>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">會員編號:RF</label>
                                        <input type="memberid" class="form-control" name="member_list_id" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">商品編號ST:</label>
                                        <select class="form-control form-control-lg" name="storage_id">
                                            <option>Large select</option>
                                            <?php while ($row = $aa->fetch_assoc()) { ?><option value="<?= $oddetailst[$row["id"]] ?>"><?= $oddetailst[$row["id"]] ?><?= $storagefu[$oddetailst[$row["id"]]] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 ">
                                        <label for="">供應商編號:WF</label>
                                        <input type="farmerid" class="form-control" name="farmer_list_id" READONLY>
                                    </div>
                                    <div class="col-lg-3 ">
                                        <label for="">商品數量:</label>
                                        <input type="number" class="form-control" name="quantity">
                                    </div>
                                    <div class="col-lg-3 ">
                                        <label for="">訂單日期:</label>
                                        <input type="datetime-local" class="form-control" name="date" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">訂單金額:$</label>
                                        <input type="amout" class="form-control" name="amount" readonly>
                                    </div>

                                    <div class="col-lg-1 d-flex">
                                        <button class="btn btn-primary align-self-end" type="submit">新增</button>

                                    </div>

                                </div>



                            </form>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            客製化訂單 DataTable

                        </div>



                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " id="cusTable" width="100%" cellspacing="0">
                                    <div class="card-body">
                                        <div class="table-responsive">

                                            <thead>
                                                <tr>

                                                    <th>訂單編號</th>
                                                    <th>會員編號</th>
                                                    <th>訂單日期</th>
                                                    <th>訂單金額</th>
                                                    <th>供應商編號</th>
                                                    <th>商品明細</th>
                                                    <th>操作</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php while ($row = $result->fetch_assoc()) { ?>
                                                    <tr>

                                                        <td>PO<?= $row["id"] ?></td>
                                                        <td>RF<?= $row["member_list_id"] ?></td>
                                                        <td><?= $row["date"] ?></td>
                                                        <td class="text-right">$<?= $storagepr[$oddetailst[$row["id"]]] * $oddetailqu[$row["id"]] ?></td>
                                                        <td>WF<?= $storagefa[$oddetailst[$row["id"]]] ?></td>

                                                        <td>
                                                            <div>
                                                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#add<?= $row["id"] ?>">檢視</button>
                                                                <div class="modal fade" id="add<?= $row["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">訂單明細</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="insert-data.php" method="post">
                                                                                    <div class="form-group row">
                                                                                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"></span>訂單編號PO</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text" class="form-control" name="productname" value=" <?= $row["id"] ?>" READONLY>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>會員姓名</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text" class="form-control" name="memberid" value="<?= $memberlist[$row["member_list_id"]] ?>" READONLY>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>商品</label>
                                                                                        <div class="col-sm-9 ">
                                                                                            <input type="text" class="form-control" name="item" value="<?= $storagefu[$oddetailst[$row["id"]]] ?>" READONLY>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>數量</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="number" class="form-control" name="quantity" value="<?= $oddetailqu[$row["id"]] ?>" READONLY>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"></span>金額</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text" class="form-control" name="content" value="<?= $storagepr[$oddetailst[$row["id"]]] * $oddetailqu[$row["id"]] ?>" READONLY>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>供應商姓名</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text" class="form-control" name="productname" value="<?= $farmerlist[$storagefa[$oddetailst[$row["id"]]]] ?>" READONLY>


                                                                                        </div>
                                                                                    </div>


                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </td>
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modify<?= $row["id"] ?>">修改</button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="modify<?= $row["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">修改客製化訂單</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="Customized-order-edit-data.php" method="post">
                                                                                <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">訂單編號:</label>
                                                                                    <div class="col-sm-9 ">
                                                                                        <input type="text" class="form-control" value="PO<?= $row["id"] ?>" READONLY>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">會員編號RF:</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" name="memberid" value="<?= $row["member_list_id"] ?>">
                                                                                        <input type="text" class="form-control" name="farmername" value="<?= $memberlist[$row["member_list_id"]] ?>" READONLY>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">商品:</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" name="fuid" value="<?= $oddetailst[$row["id"]] ?>">
                                                                                        <input type="text" class="form-control" name="funame" value="<?= $storagefu[$oddetailst[$row["id"]]] ?>" READONLY>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">供應商編號WF:</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" name="farmerid" value="<?= $storagefa[$oddetailst[$row["id"]]] ?>" READONLY>
                                                                                        <input type="text" class="form-control" name="farmername" value="<?= $farmerlist[$storagefa[$oddetailst[$row["id"]]]] ?>" READONLY>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">數量:</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="number" class="form-control" name="quantity" value="<?= $oddetailqu[$row["id"]] ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">訂單日期:</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="datetime-local" class="form-control" name="now" value="<?= $row["date"] ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="" class="col-sm-3 col-form-label">明細金額$:</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="amount" class="form-control" name="price" value="<?= $storagepr[$oddetailst[$row["id"]]] * $oddetailqu[$row["id"]] ?>" READONLY>
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
                                                                            <form action="Customized-order-delete-data.php" method="post">
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

                                        </div>
                                    </div>
                                </table>
                            </div>
                        </div>
            </main>
            <?php require_once "require/footer.php" ?>
        </div>
    </div>
    <?php require_once "require/js.php" ?>
    <script>
        $(document).ready(function() {
            $('#cusTable').DataTable({

            });

        });
    </script>
</body>

</html>