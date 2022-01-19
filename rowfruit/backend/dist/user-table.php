<?php
require_once "../../fruitdb_connect.php";
// exit();

// $stmt=$db_host->prepare("SELECT * FROM member_list WHERE valid=0 ORDER BY id DESC");
// try{
//     $stmt->execute();

// }catch(PDOException $e){
//     echo "資料庫查詢失敗<br>";
//     echo "Error: ".$e->getMessage();
//     exit;
// }
$sql = "SELECT * FROM member_list WHERE valid=0 ORDER BY id DESC";
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
    <title>會員管理</title>
    <?php require_once "require/css.php" ?>
    <style>
        .selectstatus,
        .selectcategory {
            background: #fff;
            color: #333;
            margin: 5px;
            width: 150px;
            height: 2em;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="3">
                        會員資料</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="user-table-edit.php" method="post">
                        <input type="hidden" id="id" name="id" value="">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">帳號</label>
                            <div class="col-sm-9">
                                <input type="text" id="account" readonly class="form-control-plaintext" value="" name="account">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">密碼</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">姓名</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="" id="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">性別</label>
                            <div class="col-sm-9">
                                <select name="gender" id="gender" class="selectcategory">
                                    <!-- <option value="-1" class="disabled">請選擇性別</option> -->
                                    <option value="不透露">不透露</option>
                                    <option value="男">男</option>
                                    <option value="女">女</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">電話</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" name="phone" value="" required id="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">信箱</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" value="" id="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">地址</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="address" value="" id="address" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">儲存</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLong">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="user-table-delete.php" method="post">
                        <input type="hidden" name="id" value="" id="hidden">

                        確定刪除
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">刪除</button>
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
                    <h1 class="mt-4 mb-2">消費者會員管理</h1>
                    <ol class="breadcrumb mt-4 mb-4">
                        <li class="breadcrumb-item text-primary">會員管理</li>
                        <li class="breadcrumb-item active">消費者會員</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-user-friends mr-1"></i>
                                會員資料
                            </div>
                            <div>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#insert">
                                    新增
                                </button>
                                <div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="insert" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="insert">
                                                    會員資料</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="user-table-insert.php" method="post">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>姓名</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="name" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>帳號</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="account" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>密碼</label>
                                                        <div class="col-sm-9">
                                                            <input type="password" class="form-control" name="password" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>性別</label>
                                                        <div class="col-sm-9">
                                                            <select name="gender" class="selectcategory">
                                                                <!-- <option value="-1">請選擇性別</option> -->
                                                                <option value="不透露">不透露</option>
                                                                <option value="男">男</option>
                                                                <option value="女">女</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>電話</label>
                                                        <div class="col-sm-9">
                                                            <input type="tel" class="form-control" name="phone" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>信箱</label>
                                                        <div class="col-sm-9">
                                                            <input type="email" class="form-control" name="email" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>地址</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="address" required>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">儲存</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                               
                                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <?php

                                if ($result->num_rows > 0) :

                                ?>
                                    <table class="table table-bordered " id="userTable" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>會員編號</th>
                                                <th>姓名</th>
                                                <th>帳號</th>
                                                <!-- <th>密碼</th> -->
                                                <th>性別</th>
                                                <th>電話</th>
                                                <th>信箱</th>
                                                <th>地址</th>
                                                <th>編輯</th>

                                            </tr>
                                        </thead>

                                        <tbody id="target">
                                            <?php
                                            $data = array();
                                            while ($row = $result->fetch_assoc()) {
                                                $user["id"] = $row["id"];
                                                $user["name"] = $row["name"];
                                                $user["account"] = $row["account"];
                                                $user["password"] = $row["password"];
                                                $user["gender"] = $row["gender"];
                                                $user["phone"] = $row["phone"];
                                                $user["email"] = $row["email"];
                                                $user["address"] = $row["address"];
                                                array_push($data, $user);

                                            ?>
                                                <tr>
                                                    <td><?= $row["id"] ?></td>
                                                    <td><?= $row["name"] ?></td>
                                                    <td><?= $row["account"] ?></td>
                                                    <!-- <td><?= $row["password"] ?></td> -->
                                                    <td><?= $row["gender"] ?></td>
                                                    <td><?= $row["phone"] ?></td>
                                                    <td><?= $row["email"] ?></td>
                                                    <td><?= $row["address"] ?></td>
                                                    <td>
                                                        <!-- Button trigger modal -->

                                                        <button type="button" class="btn btn-secondary btn-editor mr-2" data-toggle="modal" data-target="#exampleModal" data-editor="<?= $user["id"] ?>">
                                                            修改
                                                        </button>

                                                        <!-- Modal -->




                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#exampleModal1" data-delete="<?= $user["id"] ?>">
                                                            刪除
                                                        </button>

                                                        <!-- Modal -->







                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php
                                else :
                                ?>
                                    目前沒有資料
                                <?php endif;

                                ?>
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
        let data = <?= json_encode($data) ?>;
        // console.log(data)
        $("#target").on("click", ".btn-editor", function() {
            let targetID = $(this).data("editor");
            // console.log(targetID)
            let userData = data.find((item) => {
                return item.id == targetID;
            })
            // console.log(userData)
            $("#id").val(userData.id)
            $("#account").val(userData.account)
            $("#password").val(userData.password)
            $("#name").val(userData.name)
            $("#phone").val(userData.phone)
            $("#email").val(userData.email)
            $("#address").val(userData.address)
            $("#gender").val(userData.gender)

        })
        $("#target").on("click", ".btn-delete", function() {
            let deleteID = $(this).data("delete");
            // console .log(deleteID)
            $("#hidden").val(deleteID)


        })


        $(document).ready(function() {
            $('#userTable').DataTable({
                // "bDestroy": true,
                // "lengthChange": false,                
                // "searching": true
                language: {
                    "sProcessing": "處理中...",
                    "sLengthMenu": "顯示 _MENU_ 項結果",
                    "sZeroRecords": "沒有匹配內容",
                    "sInfo": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                    "sInfoEmpty": "顯示第 0 至 0 項結果，共 0 項",
                    "sInfoFiltered": "(由 _MAX_ 項結果過濾)",
                    "sInfoPostFix": "",
                    "sSearch": "搜尋:",
                    "sUrl": "",
                    "sEmptyTable": "表中數據為空",
                    "sLoadingRecords": "載入中...",
                    "sInfoThousands": ",",
                    "oPaginate": {
                        "sFirst": "首頁",
                        "sPrevious": "上頁",
                        "sNext": "下頁",
                        "sLast": "末頁"
                    },
                    "oAria": {
                        "sSortAscending": ": 以升序排列此列",
                        "sSortDescending": ": 以降序排列此列"
                    }


                }

            });

        });
    </script>
</body>

</html>