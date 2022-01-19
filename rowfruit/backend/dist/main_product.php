<?php require_once "require/header.php" ?>
<?php
require_once "../../fruitdb_connect.php";
$sqlMainproduct = "SELECT * FROM main_product WHERE valid=1";
$result = $conn->query($sqlMainproduct);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>主打商品</title>
    <?php require_once "require/css.php" ?>
</head>

<body class="sb-nav-fixed">
    <!-- 新增Modal -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增主打商品</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="main_product-insert-data.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">商品名稱</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="productname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">商品價格</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="price" required>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">商品數量</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="quantity" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">商品圖片</label>
                            <div class="col-sm-9">
                                <input class="" type="file" name="file" onchange="openFile(event)">
                                <img id="output" width="180" style="display:none">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-5 col-form-label">內容敘述</label>
                            <div class="col-sm-12">
                                <textarea type="text" class="form-control" name="content" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ">新增</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- 修改Modal -->
    <div class="modal fade" id="modify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">修改主打商品</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="main_product-edit.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">商品名稱</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="productname" id="productname" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">商品價格</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="price" id="price" value="">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">商品數量</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="quantity" id="quantity" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">商品圖片</label>
                            <div class="col-sm-9">
                                <input class="" type="file" name="file" onchange="openFile(event)">
                                <div style="width:100px;height:100px">
                                    <img class="cover-fit " id="image" src="../img/">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-5 col-form-label">內容敘述</label>
                            <div class="col-sm-12">
                                <textarea type="text" class="form-control" name="content" rows="5" id="content" value="">></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ">儲存</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- 刪除Modal -->
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
                    <form action="main_product-delete-data.php" method="post">
                        <input type="hidden" id="hidden" name="id" value="">

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
                    <h1 class="mt-4">主打商品管理</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item text-primary">商品管理</li>
                        <li class="breadcrumb-item active">主打商品</li>
                    </ol>
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                            <i class="fas fa-cart-arrow-down mr-1"></i>
                                主打商品
                            </div>
                            <button type="button" class="btn btn-info mr-2 " data-toggle="modal" data-target="#add">新增</button>
                        </div>
                        <div class="card-body">
                            <div class="mr-4">
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered " id="mainTable" width="100%" cellspacing="0">
                                            <?php
                                            if ($result->num_rows > 0) :
                                            ?>
                                                <thead>
                                                    <tr>
                                                        <th>主打商品編號</th>
                                                        <th>商品名稱</th>
                                                        <th>價錢</th>
                                                        <th>數量</th>
                                                        <th>照片</th>
                                                        <th>內容</th>
                                                        <th>編輯</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="target">
                                                    <?php
                                                    $data = array();
                                                    while ($row = $result->fetch_assoc()) {
                                                        $mainproduct["id"] = $row["id"];
                                                        $mainproduct["product_name"] = $row["product_name"];
                                                        $mainproduct["price"] = $row["price"];
                                                        $mainproduct["quantity"] = $row["quantity"];
                                                        $mainproduct["image"] = $row["image"];
                                                        $mainproduct["content"] = $row["content"];
                                                        array_push($data, $mainproduct);
                                                    ?>
                                                        <tr>
                                                            <td><?= $mainproduct["id"] ?></td>
                                                            <td><?= $mainproduct["product_name"] ?></td>
                                                            <td>$<?= $mainproduct["price"] ?></td>
                                                            <td><?= $mainproduct["quantity"] ?></td>
                                                            <td>
                                                                <div style="width:100px;height:100px">
                                                                    <img class="cover-fit" src="../img/<?= $mainproduct["image"] ?>">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="box"><?= $mainproduct["content"] ?></div>
                                                            </td>
                                                            <td>
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-secondary btn-modify mr-2" data-toggle="modal" data-target="#modify" data-id="<?= $mainproduct["id"] ?>">修改</button>
                                                                <button type="button" class="btn btn-danger btn-dl" data-toggle="modal" data-target="#delete" data-delete="<?= $mainproduct["id"] ?>">刪除</button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                        </table>
                                    <?php
                                            else :
                                    ?>
                                        目前沒有資料
                                    <?php endif;
                                            $conn->close();
                                    ?>
                                    </div>
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
        function openFile(event) {
            var input = event.target; //取得上傳檔案
            var reader = new FileReader(); //建立FileReader物件

            reader.readAsDataURL(input.files[0]); //以.readAsDataURL將上傳檔案轉換為base64字串

            reader.onload = function() { //FileReader取得上傳檔案後執行以下內容
                var dataURL = reader.result; //設定變數dataURL為上傳圖檔的base64字串
                $('#output').attr('src', dataURL).show(); //將img的src設定為dataURL並顯示
                $('#image').attr('src', dataURL).show(); //將img的src設定為dataURL並顯示
            };
        }
        $(document).ready(function() {
            $('#mainTable').DataTable();
        });
        let data = <?= json_encode($data) ?>;
        // console.log(data)
        $("#target").on("click", ".btn-modify", function() {
            let targetID = $(this).data("id");
            // console.log(targetID)
            let mainproductData = data.find((item) => {
                return item.id == targetID;
            })
            console.log(mainproductData)
            $("#id").val(mainproductData.id)
            $("#productname").val(mainproductData.product_name)
            $("#price").val(mainproductData.price)
            $("#quantity").val(mainproductData.quantity)
            $("#content").val(mainproductData.content)
            $("#image").attr("src", "../img/" + mainproductData.image)
        })
        $("#target").on("click", ".btn-dl", function() {
            let deleteID = $(this).data("delete")
            // console.log(deleteID)
            $("#hidden").val(deleteID)
        });
    </script>
</body>

</html>