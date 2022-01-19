<?php require_once "require/header.php" ?>
<?php
require_once "../../fruitdb_connect.php";
$sqlFarmer = "SELECT * FROM farmer_member WHERE valid=0";
$result = $conn->query($sqlFarmer);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>小農會員</title>
  <?php require_once "require/css.php" ?>
</head>

<body class="sb-nav-fixed">
  <div class="modal fade" id="modify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">小農會員資料</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="farmermodify.php" method="post">
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">會員編號</label>
              <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" name="modifyid" value="" id="farmernumber">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">帳號</label>
              <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" name="modifyaccount" value="" id="farmeraccount">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">姓名</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="" name="modifyname" id="farmername">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">電話</label>
              <div class="col-sm-9">
                <input type="tel" class="form-control" value="" name="modifyphonenumber" id="farmerphone">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">信箱</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" value="" name="modifyemail" id="farmeremail">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">地址</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="" name="modifyaddress" id="farmeraddress">
              </div>
            </div>
            <!-- <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">上架商品</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="" name="modifyproducts" id="farmerproducts">
              </div>
            </div> -->
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
          <form action="farmerdelete.php" method="post">
            確認刪除？
            <input type="hidden" id="hidden" class="form-control-plaintext" name="deleteid" value="">
            <div class="modal-footer">
              <button type="submit" class="btn btn-light border">確認</button>
              <button type="button" class="btn btn-primary border" data-dismiss="modal">取消</button>
          </form>
        </div>
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
          <h1 class="mt-4">小農會員管理</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">會員管理</a></li>
            <li class="breadcrumb-item active">小農會員</li>
          </ol>
        </div>
        <div class="container-fluid">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <div>
              <i class="fas fa-user-friends mr-1"></i>
              小農會員資料
              </div>
              <!-- Button trigger modal -->
          <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#add">新增</button>
          <!-- Modal -->
          <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">小農會員資料</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="farmerinsert.php" method="post">
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>姓名</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="insertname" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>帳號</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="insertaccount" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>密碼</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="insertpassword" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>電話</label>
                      <div class="col-sm-9">
                        <input type="tel" class="form-control" name="insertphonenumber" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>信箱</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="insertemail" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>地址</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="insertaddress" required>
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                      <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>上架商品</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="insertproducts">
                      </div>
                    </div> -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">儲存</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="farmerTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-light">
                      <th>小農會員編號</th>
                      <th>會員帳號</th>
                      <!-- <th>會員密碼</th> -->
                      <th>姓名</th>
                      <th>電話</th>
                      <th>信箱</th>
                      <th>地址</th>
                      <!-- <th>上架商品</th> -->
                      <th>編輯</th>
                    </tr>
                  </thead>

                  <tbody id="target">
                    <?php
                    $data = array();
                    while ($row = $result->fetch_assoc()) {
                      $farmeruser["id"] = $row["id"];
                      $farmeruser["account"] = $row["account"];
                      $farmeruser["password"] = $row["password"];
                      $farmeruser["name"] = $row["name"];
                      $farmeruser["phonenumber"] = $row["phonenumber"];
                      $farmeruser["email"] = $row["email"];
                      $farmeruser["address"] = $row["address"];

                      array_push($data, $farmeruser);
                    ?>
                      <tr>
                        <td><?= $farmeruser["id"] ?></td>
                        <td><?= $farmeruser["account"] ?></td>
                        <!-- <td>//</td> -->
                        <td><?= $farmeruser["name"] ?></td>
                        <td><?= $farmeruser["phonenumber"] ?></td>
                        <td><?= $farmeruser["email"] ?></td>
                        <td><?= $farmeruser["address"] ?></td>
                        <!-- <td></td> -->
                        <td>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-secondary btn-modify mr-2" data-toggle="modal" data-target="#modify" data-id="<?= $farmeruser["id"] ?>">修改</button>
                          <!-- Modal -->

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-delete btn-danger" data-toggle="modal" data-target="#delete" data-delete="<?= $farmeruser["id"] ?>">刪除</button>

                          <!-- Modal -->

                        </td>
                      </tr>
                    <?php
                    }
                    ?>
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
      $('#farmerTable').DataTable({
        // "bDestroy": true,
        // "lengthChange": false,                
        // "searching": true
      });

    });
    let data = <?= json_encode($data) ?>;
    0
    console.log(data)

    $("#target").on("click", ".btn-modify", function() {
      let targetID = $(this).data("id");
      let farmerData = data.find((item) => {
        return item.id == targetID;
      })
      console.log(farmerData)

      $("#farmernumber").val(farmerData.id)
      $("#farmeraccount").val(farmerData.account)
      $("#farmername").val(farmerData.name)
      $("#farmerphone").val(farmerData.phonenumber)
      $("#farmeremail").val(farmerData.email)
      $("#farmeraddress").val(farmerData.address)


    })

    $("#target").on("click", ".btn-delete", function() {
      let deleteID = $(this).data("delete")
      console.log(deleteID)
      $("#hidden").val(deleteID)
    });
  </script>
</body>

</html>