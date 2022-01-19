<?php require_once "require/header.php" ?>
<?php

require_once "../../fruitdb_connect.php";
$sqlcustomizeLabel = "SELECT * FROM customize_label WHERE valid='0'";

$resultCate = $conn->query($sqlcustomizeLabel) or die($conn->error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>客製化水果標籤管理</title>
  <?php require_once "require/css.php" ?>
</head>

<body class="sb-nav-fixed">
  <!-- Modal -->
  <div class="modal fade" id="modify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">修改客製化水果標籤</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="customize-label-edit.php" method="post">
            <input type="hidden" id="id" name="id" value="">
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">水果名稱</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="fruit_name" id="fruit_name" value="" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">碳水化合物</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="carbon_water" id="carbon_water" value="" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">膳食纖維</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="dietary_fiber" id="dietary_fiber" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">維生素A</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="vitamin_A" id="vitamin_A" value="" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">維生素C</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="vitamin_C" id="vitamin_C" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">鉀</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Potassium" id="Potassium" value="">
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
          <form action="customize-label-delete.php" method="post">
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
          <h1 class="mt-4">客製化水果標籤管理</h1>

          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item text-primary">客製化水果</li>
            <li class="breadcrumb-item active">標籤管理</li>
          </ol>

          <div class="card border-0">
            <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增客製化水果標籤</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="customize-label-insert.php" method="post">
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>水果名稱</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="fruit_name" required />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>碳水化合物</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="carbon_water" required />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>膳食纖維</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="dietary_fiber" required />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>維生素A</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="vitamin_A" required />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>維生素C</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="vitamin_C" required />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>鉀</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="Potassium" required />
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
          </div>


          <div class="card mb-4 ">
            <div class="card-header d-flex justify-content-between align-items-center">
              <div>
                <i class="fa fa-tag" aria-hidden="true"></i>
                客制化水果標籤
              </div>
              <button type="submit" class="btn btn-info mx-3" data-toggle="modal" data-target="#add">新增</button>
            </div>


            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="labelTable" width="100%" cellspacing="0">
                  <!-- <a href="submodify.php" class="btn btn-danger">修改</a> -->
                  <thead>
                    <tr>
                      <th>水果標籤編號</th>
                      <th>水果名稱</th>
                      <th>碳水</th>
                      <th>膳食纖維</th>
                      <th>維生素A</th>
                      <th>維生素C</th>
                      <th>鉀</th>
                      <th>編輯</th>
                    </tr>
                  </thead>
                  <tbody id="target">
                    <?php
                    $data = array();
                    while ($row = $resultCate->fetch_assoc()) {
                      $customizeLabel["id"] = $row["id"];
                      $customizeLabel["fruit_name"] = $row["fruit_name"];
                      $customizeLabel["carbon_water"] = $row["carbon_water"];
                      $customizeLabel["dietary_fiber"] = $row["dietary_fiber"];
                      $customizeLabel["vitamin_A"] = $row["vitamin_A"];
                      $customizeLabel["vitamin_C"] = $row["vitamin_C"];
                      $customizeLabel["Potassium"] = $row["Potassium"];

                      array_push($data, $customizeLabel)
                    ?>
                      <tr>
                        <td><?= $customizeLabel["id"] ?></td>
                        <td><?= $customizeLabel["fruit_name"] ?></td>
                        <td><?= $customizeLabel["carbon_water"] ?></td>
                        <td><?= $customizeLabel["dietary_fiber"] ?></td>
                        <td><?= $customizeLabel["vitamin_A"] ?></td>
                        <td><?= $customizeLabel["vitamin_C"] ?></td>
                        <td><?= $customizeLabel["Potassium"] ?></td>
                        <td>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-secondary btn-edit mr-1" data-toggle="modal" data-target="#modify" data-id="<?= $customizeLabel["id"] ?>">修改</button>


                          <button type="button" class="btn btn-danger btn-dl" data-toggle="modal" data-target="#delete" data-delete="<?= $customizeLabel["id"] ?>">刪除</button>


                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>




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
      let customizeLabelData = data.find((item) => {
        return item.id == targetID;
      })
      // //   // console.log(targetID)

      console.log(customizeLabelData)
      $("#id").val(customizeLabelData.id)
      $("#fruit_name").val(customizeLabelData.fruit_name)
      $("#carbon_water").val(customizeLabelData.carbon_water)
      $("#dietary_fiber").val(customizeLabelData.dietary_fiber)
      $("#vitamin_A").val(customizeLabelData.vitamin_A)

      // let option= $("#catagory option").val()
      // console.log(option)
      // $("#catagory option").val
      // console.log(articleData.category)
      // $("#catagory").val(subscribeData.category)
      $("#vitamin_C").val(customizeLabelData.vitamin_C)
      $("#Potassium").val(customizeLabelData.Potassium)
    })

    $("#target").on("click", ".btn-dl", function() {
      let deleteID = $(this).data("delete")
      console.log(deleteID)
      $("#hidden").val(deleteID)

    });

    $(document).ready(function() {
      $('#labelTable').DataTable({

        // "lengthChange": false,                
        // "searching": true
      });

    });
  </script>
</body>


</html>