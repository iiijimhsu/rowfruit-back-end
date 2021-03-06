<?php require_once "require/header.php" ?>
<pre><?php
require_once "../../fruitdb_connect.php";
$sqlevaluation = "SELECT * FROM evaluation WHERE valid=1 ";
$result = $conn->query($sqlevaluation);
$evdata=array();


$sqlstorage = "SELECT * FROM storage";
$resultstorage = $conn->query($sqlstorage);
while ($rowstorage = $resultstorage->fetch_assoc()) {
    $storagefruitname[$rowstorage["id"]] = $rowstorage["fruitname"]; //storage-fruitname
    
}

$sqlorderdetail = "SELECT * FROM customized_order_detail";
$resultdetail = $conn->query($sqlorderdetail);
while ($rowdetail = $resultdetail->fetch_assoc()) {
    
    $ordernumber[$rowdetail["po_id"]] = $rowdetail["storage_id"]; //customized_order_detail-storage_id
    
    // $evdata["id"]=$rowdetail["po_id"];
    // echo $evdata["id"];
    // echo "<br>";
    // echo $rowdetail["storage_id"];
    // echo "<br>";



    // echo"<br>";
    // $evdata["product"]=$storagefruitname[$rowdetail["po_id"]];
    // echo"$rowdetail[storage_id]";
    
}
// print_r($ordernumber);
// exit;
$sqlordermemberlist = "SELECT * FROM customize_order";
$resultmemberlist = $conn->query($sqlordermemberlist);
while ($rowmamberlist = $resultmemberlist->fetch_assoc()) {
    $memberlist[$rowmamberlist["id"]] = $rowmamberlist["member_list_id"]; //customized_order member list id
}
$sqlordermembername = "SELECT * FROM member_list";
$resultmembername = $conn->query($sqlordermembername);
while ($rowmambername = $resultmembername->fetch_assoc()) {
    $membername[$rowmambername["id"]] = $rowmambername["name"]; //customized_order member list id
}


?></pre>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>UI</title>
    <?php require_once "require/css.php" ?>
    <style>
        .box {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 300px;
        }
    </style>
</head>
<!-- ??????modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">??????????????????</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="evaluation-insert.php" method="post">
                    <div class="form-group row">
                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger">* </span>????????????</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="order_number" name="order_number">
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger">* </span>????????????</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="order_member" disabled="disabled" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger">* </span>????????????</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="product_name" disabled="disabled">
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger">* </span>??????</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" name="content" rows="5" id="content" value="??????"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">??????</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">??????</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ??????modal -->

<body class="sb-nav-fixed">
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">??????</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="evaluation-delete.php" method="post">
                        <input type="hidden" id="hidden" name="id" value="">

                        ???????????????

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary border">??????</button>
                            <button type="button" class="btn btn-light border" data-dismiss="modal">??????</button>
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
                    <h1 class="mt-4">????????????</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">????????????</a></li>
                        <li class="breadcrumb-item active">????????????</li>
                    </ol>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <i class="far fa-file-alt mr-1 fa-lg"></i>
                                ????????????
                            </div>
                            <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#add">??????</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="evaluTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>????????????</th>
                                            <th>????????????</th>
                                            <th>????????????</th>
                                            <th>????????????</th>
                                            <th>??????</th>
                                            <th>????????????</th>
                                            <th>??????</th>
                                            <th>??????</th>
                                        </tr>
                                    </thead>

                                    <tbody id="target">
                                        <?php
                                        $data = array();
                                        while ($row = $result->fetch_assoc()) {
                                            $evaluation["id"] = $row["id"];
                                            $evaluation["order_number"] = $row["order_number"];
                                            $evaluation["order_member"] = $membername[$memberlist[$row["order_number"]]];
                                            $evaluation["fruit_name"] = $storagefruitname[$ordernumber[$row["order_number"]]];
                                            array_push($data, $evaluation);
                                        ?>
                                            <tr>
                                                <td><?= $row["id"] ?></td>
                                                <td><?= $membername[$memberlist[$row["order_number"]]] ?></td>
                                                <td><?= $row["order_number"] ?></td>
                                                <td><?= $storagefruitname[$ordernumber[$row["order_number"]]] ?></td>
                                                <td>
                                                    <div class="box"><?= $row["content"] ?></div>
                                                </td>
                                                <td><?= $row["created_time"] ?></td>
                                                <td><?= $row["status"] ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <form action="evaluation-edit.php" method="post">
                                                            <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                            <button class="btn btn-secondary dropdown-toggle mb-3" type="button" id="dropdownMenuButton<?= $row["id"] ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="submit">
                                                                ??????
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <button class="dropdown-item" value="?????????" name="select">?????????</button>
                                                                <button class="dropdown-item" value="??????" name="select">??????</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <button type="button" class="btn btn-danger btn-dl" data-toggle="modal" data-target="#delete" data-delete="<?= $evaluation["id"] ?>">??????</button>

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
</body>
<script>
    $(document).ready(function() {
        $('#evaluTable').DataTable({
            "bDestroy": true,
            // "lengthChange": false,                
            // "searching": true
        });

    });
    let data = <?= json_encode($data) ?>;
    console.log(data);
    $("#target").on("click", ".btn-dl", function() {
        let deleteID = $(this).data("delete")
        console.log(deleteID)
        $("#hidden").val(deleteID)

    });
    // let order_number=$("#order_number");
    // let order_member=$("#order_member");
    // order_number.on("keyup",function(){
    //     if(order_number.val()=="123"){
    //         $("#order_member").val(123)
    //     }else{
    //         $("#order_member").val("????????????")

    //     }
    // })
</script>

</html>