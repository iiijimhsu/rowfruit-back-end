<?php
require_once "require/header.php";
require_once "../../fruitdb_connect.php";

$sqlfarmerlist="SELECT * FROM farmer_member";
$resultFalist = $conn->query($sqlfarmerlist);
while($rowFalist = $resultFalist->fetch_assoc()) { 
    $farmerlist[$rowFalist["id"]]=$rowFalist["name"]; //farmer_list-name
}

$sqlmemberlist="SELECT * FROM member_list";
$resultmemlist = $conn->query($sqlmemberlist);
while($rowmemlist = $resultmemlist->fetch_assoc()) { 
    $memberlist[$rowmemlist["id"]]=$rowmemlist["name"]; //member_list-name
}
// $sqlpo="SELECT * FROM customize_order";
// $resultpo = $conn->query($sqlpo);
// while($rowpo = $resultpo->fetch_assoc()) { 
//     $po[$rowpo["storage_list"]]=$po["farmer_list_id"]; 
// }

$sqlstorage="SELECT * FROM storage";
$resultstorage = $conn->query($sqlstorage);
while($rowstorage = $resultstorage->fetch_assoc()) { 
    $storagefa[$rowstorage["id"]]=$rowstorage["farmer_list_id"]; //storage-farmer_list_id
    $storagefu[$rowstorage["id"]]=$rowstorage["fruitname"]; //storage-fruitname
    $storagepr[$rowstorage["id"]]=$rowstorage["price"]; //storage-price
}

$sqloddetail="SELECT * FROM customized_order_detail";
$resultoddetail = $conn->query($sqloddetail);
while($rowoddetail = $resultoddetail->fetch_assoc()) { 
    $oddetailst[$rowoddetail["po_id"]]=$rowoddetail["storage_id"]; //customized_order_detail-storage_id
    $oddetailqu[$rowoddetail["po_id"]]=$rowoddetail["quantity"]; //customized_order_detail-quantity
}
// while($rowoddetail = $resultoddetail->fetch_array()) { 
//     $oddetailst[$rowoddetail["po_id"]]=$rowoddetail["storage_id"]; 
//     $oddetailqu[$rowoddetail["po_id"]]=$rowoddetail["quantity"]; 
// }

$sql="SELECT * FROM customize_order where valid=0";
$result=$conn->query($sql);
$aa=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>?????????????????????</title>
        <?php require_once "require/css.php" ?>
    </head>
    <body class="sb-nav-fixed">
       <?php require_once "require/topnav.php" ?>
        <div id="layoutSidenav">
           <?php require_once "require/sidenav.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">???????????????</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">????????????</a></li>
                            <li class="breadcrumb-item active">???????????????</li3>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                 <form action="CT.php" method="post">
    <div class="form-group row">
        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>????????????:PO</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="id" placeholder="????????????" READONLY />
        </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>????????????:RF</label>
        <div class="col-sm-9">
            <input type="memberid" class="form-control" name="member_list_id" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>????????????ST</label>
        <div class="col-sm-9">
            <select class="form-control form-control-lg" name="storage_id[]">
                <option>????????????</option>
                <?php while ($row = $aa->fetch_assoc()) { ?><option value="<?= $oddetailst[$row["id"]] ?>"><?= $oddetailst[$row["id"]] ?><?= $storagefu[$oddetailst[$row["id"]]] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>????????????</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" name="quantity[]">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>????????????ST</label>
        <div class="col-sm-9">
            <select class="form-control form-control-lg" name="storage_id[]">
                <option>????????????</option>
                <?php while ($row = $aa->fetch_assoc()) { ?><option value="<?= $oddetailst[$row["id"]] ?>"><?= $oddetailst[$row["id"]] ?><?= $storagefu[$oddetailst[$row["id"]]] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>????????????</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" name="quantity[]">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>????????????ST</label>
        <div class="col-sm-9">
            <select class="form-control form-control-lg" name="storage_id[]">
                <option>????????????</option>
                <?php while ($row = $aa->fetch_assoc()) { ?><option value="<?= $oddetailst[$row["id"]] ?>"><?= $oddetailst[$row["id"]] ?><?= $storagefu[$oddetailst[$row["id"]]] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>????????????</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" name="quantity[]">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>???????????????:WF</label>
        <div class="col-sm-9">
            <input type="farmerid" class="form-control" name="farmer_list_id" READONLY>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>????????????</label>
        <div class="col-sm-9">
            <input type="datetime-local" class="form-control" name="date" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>????????????</label>
        <div class="col-sm-9">
            <input type="amout" class="form-control" name="amount" readonly>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">??????</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            ??????
        </button>
    </div>
</form>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                ??????????????? DataTable 
                               
                            </div>
                            
                          
                        
                            <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered " id="cusTable" width="100%" cellspacing="0">
                            <div class="card-body">
                                                                <div class="table-responsive">
                                    
                                        <thead>
                                            <tr>
                                                
                                                <th>????????????</th>
                                                <th>????????????</th>
                                                <th>????????????</th>
                                                <th>????????????</th>
                                                <th>???????????????</th>
                                                <th>????????????</th>
                                                <th>??????</th>
                                            </tr>
                                        </thead>
                                        
                            <tbody>
                                    <?php while($row = $result->fetch_assoc()){?>
                                            <tr>
                                                
                                                <td>PO<?= $row["id"] ?></td>
                                                <td>RF<?= $row["member_list_id"] ?></td>
                                                <td><?= $row["date"] ?></td>
                                                <td class="text-right">$<?= $storagepr[$oddetailst[$row["id"]]]*$oddetailqu[$row["id"]] ?></td>
                                                <td>WF<?=$storagefa[$oddetailst[$row["id"]]] ?></td>

                                                <td>
                                                <div>    
                                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#add<?= $row["id"] ?>">??????</button>
                                                <div class="modal fade" id="add<?= $row["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">????????????</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="insert-data.php" method="post">
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-5 col-form-label"><span class="text-danger"></span>????????????PO</label>
                                                            <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="productname" value=" <?= $row["id"] ?>"READONLY>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>????????????</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="memberid" value="<?= $memberlist[$row["member_list_id"]] ?>"READONLY>
                                                        
                                                        </div>
                                                        </div>
                                                        <div class="form-group row">
                                                        <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>??????</label>
                                                            <div class="col-sm-9 ">
                                                            <input type="text" class="form-control" name="item" value="<?= $storagefu[$oddetailst[$row["id"]]] ?>"READONLY>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>??????</label>
                                                            <div class="col-sm-9">
                                                            <input type="number" class="form-control" name="quantity" value="<?= $oddetailqu[$row["id"]] ?>"READONLY>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-5 col-form-label"><span class="text-danger"></span>??????</label>
                                                            <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="content" value="<?= $storagepr[$oddetailst[$row["id"]]]*$oddetailqu[$row["id"]] ?>"READONLY>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-5 col-form-label"><span class="text-danger"> </span>???????????????</label>
                                                            <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="productname" value="<?=$farmerlist[$storagefa[$oddetailst[$row["id"]]]] ?>"READONLY>
                                                            
                                                            
                                                            </div>
                                                        </div>
                                                        
                                                    
                                                    </form>
                                                </div> 
                                                </div>
                                            </div></div></td>
                                            <td><!-- Button trigger modal -->
                                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modify<?= $row["id"] ?>">??????</button>
                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="modify<?= $row["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">?????????????????????</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                <form action="edit-data.php" method="post">
                                                                                <input type="hidden" name="id" value="<?=$row["id"]?>">
                                                                                        <div class="form-group row">
                                                                                        <label for="" class="col-sm-3 col-form-label">????????????:</label>
                                                                                        <div class="col-sm-9 ">
                                                                                        <input type="text" class="form-control" value="PO<?= $row["id"] ?>" READONLY>
                                                                                        </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label for="" class="col-sm-3 col-form-label">????????????RF:</label>
                                                                                            <div class="col-sm-9">
                                                                                            <input type="text" class="form-control" name="memberid"value="<?= $row["member_list_id"] ?>">
                                                                                            <input type="text" class="form-control" name="farmername"value="<?= $memberlist[$row["member_list_id"]] ?>"READONLY>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label for="" class="col-sm-3 col-form-label">??????:</label>
                                                                                            <div class="col-sm-9">
                                                                                            <input type="text" class="form-control" name="fuid"value="<?= $oddetailst[$row["id"]] ?>">
                                                                                            <input type="text" class="form-control" name="funame"value="<?= $storagefu[$oddetailst[$row["id"]]] ?>"READONLY>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                        <div class="form-group row">
                                                                                            <label for="" class="col-sm-3 col-form-label">???????????????WF:</label>
                                                                                            <div class="col-sm-9">
                                                                                            <input type="text" class="form-control" name="farmerid"value="<?=$storagefa[$oddetailst[$row["id"]]] ?>"READONLY>
                                                                                            <input type="text" class="form-control" name="farmername"value="<?=$farmerlist[$storagefa[$oddetailst[$row["id"]]]] ?>"READONLY>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label for="" class="col-sm-3 col-form-label">??????:</label>
                                                                                            <div class="col-sm-9">
                                                                                            <input type="number" class="form-control" name="quantity" value="<?= $oddetailqu[$row["id"]] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label for="" class="col-sm-3 col-form-label">????????????:</label>
                                                                                            <div class="col-sm-9">
                                                                                            <input type="datetime-local" class="form-control" name="now" value="<?=$row["date"]?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label for="" class="col-sm-3 col-form-label">????????????$:</label>
                                                                                            <div class="col-sm-9">
                                                                                            <input type="amount" class="form-control"name="price" value="<?= $storagepr[$oddetailst[$row["id"]]]*$oddetailqu[$row["id"]] ?>"READONLY>
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
                                                                            
                                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $row["id"] ?>">??????</button>

                                                                            <div class="modal fade" id="delete<?= $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">??????</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="delete-data.php"method="post">
                                                                                        <input type="hidden" name="id" value="<?=$row["id"]?>">
                                                                                
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