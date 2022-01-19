<?php require_once "require/header.php" ?>
<?php

require_once "../../fruitdb_connect.php";

$sql = "SELECT * FROM contactus";
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
    <title>聯絡資訊</title>
    <?php require_once "require/css.php" ?>
</head>

<body class="sb-nav-fixed">
    <div class="modal fade" id="modify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">處理狀態</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> 
                <form action="contact-edit.php" method="POST">
                <div class="modal-body">
                   
                        <input type="hidden" name="id" value="" id="id">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">處理狀態</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" value="" id="status">
                                    <option value="未處理">未處理</option>
                                    <option value="處理中">處理中</option>
                                    <option value="已處理">已處理</option>
                                </select>
                            </div>
                            
                        </div>
                   
                </div> 
                <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">儲存</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
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
                    <h1 class="mt-4">聯絡資訊</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item text-primary">其他</li>
                        <li class="breadcrumb-item active">聯絡資訊</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                           <i class="far fa-envelope mr-1"></i>
                           客服處理
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel">新增留言</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <form action="contact-insert.php" method="post">
                                    <div class="modal-body">
                                        
                                            <input type="hidden" name="id">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">會員id</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="id">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">姓名</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="header">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">會員姓名name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">主要內容main</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="main">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">留言時間create_time</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" name="create_time">
                                                </div>
                                            </div>
                                            
                                       
                                    </div> 
                                    <div class="modal-footer mt-3">
                                            <button type="submit" class="btn btn-primary">確認</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="mesTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>編號</th>
                                            <th>姓名</th>
                                            <th>e-mail</th>
                                            <th>電話</th>
                                            <th>主要內容</th>
                                            <th>留言時間</th>
                                            <th>狀態</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody id="target">
                                        <?php
                                        $data = array();
                                        while ($row = $result->fetch_assoc()) {
                                            $contact["id"] = $row["id"];
                                            $contact["name"] = $row["name"];
                                            $contact["email"] = $row["email"];
                                            $contact["phone"] = $row["phone"];
                                            $contact["create_time"] = $row["create_time"];
                                            $contact["status"] = $row["status"];

                                            array_push($data, $contact);
                                        ?>
                                            <tr>
                                                <td><?= $row["id"] ?></td>
                                                <td><?= $row["name"] ?></td>
                                                <td><?= $row["email"] ?></td>
                                                <td><?= $row["phone"] ?></td>
                                                <td><?= $row["content"] ?></td>
                                                <td><?= $row["create_time"] ?></td>
                                                <td><?= $row["status"] ?></td>
                                                <td>

                                                    <button type="button" class="btn btn-info btn-editor" data-toggle="modal" data-target="#modify" data-editor="<?= $contact["id"] ?>">處理狀態</button>
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
            // console.log(targetID)
            let contactData = data.find((item) => {
                return item.id == targetID;
            })
            console.log(contactData)
            $("#id").val(contactData.id);
            $("#status").val(contactData.status)
            // $("#productItem").val(orderData.product_item)
            // $("#productQuantity").val(orderData.product_quantity)
            // $("#createTime").val(orderData.create_time)
            // $("#price").val(orderData.price)



        })
        // $("#target").on("click", ".btn-dl", function() {
        //     let deleteID = $(this).data("delete");
        //     // console.log(deleteID)
        //     $("#hidden").val(deleteID)


        // })
    </script>
</body>

</html>