<?php require_once "require/header.php" ?>
<?php

require_once "../../fruitdb_connect.php";

$sql = "SELECT * FROM Message";
$result = $conn->query($sql);

//定義空陣列給$mem 
$mem = [];

//member_list抓id
$sqlmem = "SELECT * FROM member_list";
$resultmem = $conn->query($sqlmem);
while ($rowmem = $resultmem->fetch_assoc()) {
    $mem[$rowmem["id"]] = $rowmem["name"];
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
    <title>留言管理</title>
    <?php require_once "require/css.php" ?>
</head>

<body class="sb-nav-fixed">
    <div class="modal fade" id="modify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">留言狀態</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="msg-edit.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="" id="id">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">statement</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="statement" value="" id="statement">
                                    <option value="通過">通過</option>
                                    <option value="未通過">未通過</option>
                                    <option value="待審核">待審核</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer mt-3">
                            <button type="submit" class="btn btn-primary">儲存</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require_once "require/topnav.php" ?>
    <div id="layoutSidenav">
        <?php require_once "require/sidenav.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">留言管理</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item text-primary">文章管理</li>
                        <li class="breadcrumb-item active">留言管理</li>
                    </ol>
                    <!-- <div class="card mb-4">
                        <div class="card-body">
                            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                            .
                        </div>
                    </div> -->
                    <div class="card mb-4">
                        <div class="card-header">
                        <i class="far fa-edit mr-1"></i>
                            留言管理
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="mesTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>留言編號</th>
                                            <th>標題</th>
                                            <th>姓名</th>
                                            <th>內容</th>
                                            <th>留言時間</th>
                                            <th>狀態</th>
                                            <th>編輯</th>
                                        </tr>
                                    </thead>
                                    <tbody id="target">
                                        <?php
                                        $data = array();
                                        while ($row = $result->fetch_assoc()) {
                                            $msg['id'] = $row["id"];
                                            $msg['statement'] = $row["statement"];
                                            array_push($data, $msg);
                                        ?>
                                            <tr>
                                                <td><?= $row["id"] ?></td>
                                                <td><?= $row["header"] ?></td>
                                                <td><?= $mem[$row["member_list_id"]] ?></td>
                                                <td><?= $row["main"] ?></td>
                                                <td><?= $row["create_time"] ?></td>
                                                <td><?= $row["statement"] ?></td>
                                                <td>

                                                    <button type="button" class="btn btn-info btn-editor" data-toggle="modal" data-target="#modify" data-editor="<?= $msg["id"] ?>">留言狀態</button>
                                                    <!-- Modal 修改留言狀態 line 251~282 -->

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
            $('#mesTable').DataTable({

            });

        });
        let data = <?= json_encode($data) ?>;
        console.log(data)
        $("#target").on("click", ".btn-editor", function() {
            let targetID = $(this).data("editor");
            console.log(targetID)
            let msgData = data.find((item) => {
                return item.id == targetID;
            })
            console.log(msgData)
            $("#id").val(msgData.id)
            $("#statement").val(msgData.statement)


        })
    </script>
</body>

</html>