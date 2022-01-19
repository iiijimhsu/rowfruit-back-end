<?php require_once "require/header.php" ?>
<?php

require_once "../../fruitdb_connect.php";
$sqlsubScribe = "SELECT * FROM subscribe WHERE valid='0'";

$resultCate = $conn->query($sqlsubScribe) or die($conn->error);

$sqlmemberlist = "SELECT * FROM member_list";
$resultMemlist = $conn->query($sqlmemberlist);
while ($rowMemlist = $resultMemlist->fetch_assoc()) {
  $memberlist[$rowMemlist["id"]] = $rowMemlist["id"];
}
$sqlmain = "SELECT * FROM main_product";
$resultmain = $conn->query($sqlmain);
while ($rowmain = $resultmain->fetch_assoc()) {
  $mainName[$rowmain["id"]] = $rowmain["product_name"];
  $mainPrice[$rowmain["id"]] = $rowmain["price"];
}
// print_r($mainPrice);
// exit();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>訂閱制訂單管理</title>
  <?php require_once "require/css.php" ?>
</head>

<body class="sb-nav-fixed">
  <!-- Modal -->
  <div class="modal fade" id="modify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">修改訂閱制訂單</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="sub-edit.php" method="post">
            <input type="hidden" id="id" name="id" value="">
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">會員帳號</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="user_id" name="user_id" value="" required>
              </div>
            </div>
            <!-- <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>商品名稱</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="product_item" name="product_item" value="" required>
              </div>
            </div> -->
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">商品名稱</label>
              <div class="col-sm-9">
                <select class="form-control" name="product_id" id="product_item">
                  <option value="1">美白水果盒</option>
                  <option value="2">健身水果盒</option>
                  <option value="3">輕盈多纖水果盒</option>
                </select>
              </div>
            </div>

            <!-- <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>價格</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="price" name="price" value="">
              </div>
            </div> -->
            <!-- <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>訂閱方案</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="subscribe_way" name="subscribe_way" value="" required>
              </div>
            </div> -->
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">訂閱方案</label>
              <div class="col-sm-9">
                <select class="form-control" name="subscribe_way" id="subscribe_way">
                  <option value="1">一個月</option>
                  <option value="3">三個月</option>
                  <option value="6">六個月</option>
                </select>
              </div>
            </div>


            <!-- <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>開始時間</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="start_time" name="start_time" value=""  >
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>結束時間</label>
              <div class="col-sm-9">
                <input type="text" class="form-control"  id="end_time" name="end_time" value="" >
              </div>
            </div> -->
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">訂閱狀態</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="status" name="status" value="" required>
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
          <form action="sub-delete.php" method="post">
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
          <h1 class="mt-4">訂閱制訂單管理</h1>

          <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item text-primary">訂單管理</li>
            <li class="breadcrumb-item active">訂閱制訂單</li>
          </ol>




          <!-- Modal -->
          <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">消費者會員資料</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="sub-insert.php" method="post">
                  <div class="modal-body">

                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>會員帳號</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="user_id" required />
                      </div>
                    </div>

                    <!-- <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>商品名稱</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="product_item" required />
                          </div>
                        </div> -->
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>商品名稱</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="product_id">
                          <option value="1">美白水果盒</option>
                          <option value="2">健身水果盒</option>
                          <option value="3">輕盈多纖水果盒</option>
                        </select>
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>價格</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="price" required />
                          </div>
                        </div> -->
                    <!-- <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>訂閱方案</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="subscribe_way" required />
                          </div>
                        </div> -->
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>訂閱方案</label>
                      <div class="col-sm-9">
                        <!-- <input type="text" class="form-control" name="subscribe_way" /> -->
                        <select class="form-control" name="subscribe_way">
                          <option value="1">一個月</option>
                          <option value="3">三個月</option>
                          <option value="6">六個月</option>
                        </select>
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label"
                                  ><span class="text-danger">* </span>開始時間</label
                                >
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="start_time"  />
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label"
                                  ><span class="text-danger">* </span>結束時間</label
                                >
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="end_time" />
                                </div>
                              </div> -->
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>訂閱狀態</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="status" required />
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">儲存</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        關閉
                      </button>
                    </div>
                </form>
              </div>
            </div>
          </div>


        </div>
        <div class="card mb-4 ">
          <div class="card-header d-flex justify-content-between align-items-center">
            <div>
              <i class="far fa-bell mr-1"></i>
              訂閱制訂單
            </div>
            <button type="submit" class="btn btn-info mx-3" data-toggle="modal" data-target="#add">新增</button>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="subTable" width="100%" cellspacing="0">
                <!-- <a href="submodify.php" class="btn btn-danger">修改</a> -->
                <thead>
                  <tr>
                    <th>訂單編號</th>
                    <th>會員帳號</th>
                    <th>商品名稱</th>
                    <th>價格</th>
                    <th>訂閱方案</th>
                    <th>開始時間</th>
                    <th>結束時間</th>
                    <th>訂閱狀態</th>
                    <th>功能選項</th>
                  </tr>
                </thead>
                <tbody id="target">
                  <?php
                  $data = array();
                  while ($row = $resultCate->fetch_assoc()) {
                    $subScribe["id"] = $row["id"];
                    $subScribe["user_id"] = $memberlist[$row["user_id"]];
                    $subScribe['product_id'] = $row["product_id"];
                    $subScribe["product_item"] = $mainName[$row["product_id"]];
                    $subScribe["price"] = $mainPrice[$row["product_id"]] * $row['subscribe_way'];
                    $subScribe["subscribe_way"] = $row["subscribe_way"];
                    $subScribe["start_time"] = $row["start_time"];
                    $subScribe["end_time"] = $row["end_time"];
                    $subScribe["status"] = $row["status"];

                    array_push($data, $subScribe)
                  ?>
                    <tr>
                      <td><?= $subScribe["id"] ?></td>
                      <td><?= $subScribe["user_id"] ?></td>
                      <td><?= $mainName[$row["product_id"]] ?></td>
                      <td><?= $mainPrice[$row["product_id"]] * $row['subscribe_way'] ?></td>
                      <td><?= $subScribe["subscribe_way"] ?>個月</td>
                      <td><?= $subScribe["start_time"] ?></td>
                      <td><?= $subScribe["end_time"] ?></td>
                      <td><?= $subScribe["status"] ?></td>
                      <td>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-secondary btn-edit" data-toggle="modal" data-target="#modify" data-id="<?= $subScribe["id"] ?>">修改</button>

                        <button type="button" class="btn btn-danger btn-dl" data-toggle="modal" data-target="#delete" data-delete="<?= $subScribe["id"] ?>">刪除</button>


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
    let data = <?= json_encode($data) ?>;
    console.log(data)

    $("#target").on("click", ".btn-edit", function() {
      let targetID = $(this).data("id");
      // console.log(targetID)
      let subscribeData = data.find((item) => {
        return item.id == targetID;
      })
      // console.log(targetID)

      console.log(subscribeData)
      $("#id").val(subscribeData.id)
      $("#user_id").val(subscribeData.user_id)
      $("#product_item").val(subscribeData.product_id)
      $("#price").val(subscribeData.price)

      console.log(subscribeData.subscribe_way)

      $("#subscribe_way").val(subscribeData.subscribe_way)

      // let option= $("#catagory option").val()
      // console.log(option)
      // $("#catagory option").val
      // console.log(articleData.category)
      // $("#catagory").val(subscribeData.category)
      $("#status").val(subscribeData.status)
    })

    $("#target").on("click", ".btn-dl", function() {
      let deleteID = $(this).data("delete")
      console.log(deleteID)
      $("#hidden").val(deleteID)

    });



    $(document).ready(function() {
      $('#subTable').DataTable({
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