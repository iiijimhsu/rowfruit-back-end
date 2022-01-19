<?php require_once "require/header.php" ?>
<?php
require_once "../../fruitdb_connect.php";
$sqlarticle = "SELECT * FROM article WHERE valid=0";
$result = $conn->query($sqlarticle);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>文章管理</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <?php require_once "require/css.php" ?>
    <style>
        .selectstatus,
        .selectcategory {
            background: #fff;
            color: #333;
            margin: 5px;
            width: 100px;
            height: 2em;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .tdsize {
            width: 80px;
            height: 80px;
        }

        .box {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 150px;
            /* height: 100px; */
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <div class="modal fade" id="modify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">文章列表</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="articlemodify.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">文章編號</label>
                            <div class="col-sm-9">
                                <input type="text" id="number" readonly class="form-control-plaintext" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">文章標題</label>
                            <div class="col-sm-9">
                                <input type="text" id="title" class="form-control-plaintext" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">文章分類</label>
                            <div class="col-sm-9">
                                <select id="catagory" class="selectcategory" disabled>
                                    <option value="生活">生活</option>
                                    <option value="水果">水果</option>
                                    <option value="營養知識">營養知識</option>
                                    <option value="故事">故事</option>
                                    <option value="歷史">歷史</option>
                                    <option value="其它">其它</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">文章內容</label>
                            <div class="col-sm-9">
                                <div class="overflow-auto" id="content"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">作者</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="author"></input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">狀態</label>
                            <div class="col-sm-9">
                                <select class="selectstatus" id="status" disabled>
                                    <option value="on">on</option>
                                    <option value="off">off</option>

                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="submit" class="btn btn-primary">儲存</button> -->
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
                    <form action="articledelete.php" method="post">
                        確認刪除？
                        <input type="hidden" id="hidden" class="form-control-plaintext" name="deleteid" value="">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-light border">確認</button>
                            <button type="button" class="btn btn-secondary border" data-dismiss="modal">取消</button>
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
                    <h1 class="mt-4">文章列表管理</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item text-primary">文章管理</li>
                        <li class="breadcrumb-item active">文章列表</li>
                    </ol>


                    <!-- Button trigger modal -->




                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div> <i class="fas fa-book mr-1"></i>
                            文章管理</div>
                           
                            <a type="submit" class="btn btn-info" href="article-post.php">新增</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="articleTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="bg-light">
                                            <th>文章編號</th>
                                            <th>文章標題</th>
                                            <th>文章分類</th>
                                            <th>文章內容</th>

                                            <th>發佈人</th>
                                            <th>發佈時間</th>
                                            <th>狀態</th>
                                            <th>編輯</th>
                                        </tr>
                                    </thead>
                                    <tbody id="target">
                                        <?php
                                        $data = array();
                                        while ($row = $result->fetch_assoc()) {
                                            $article["id"] = $row["id"];
                                            $article["title"] = $row["title"];
                                            $article["category"] = $row["category"];
                                            $article["content"] = $row["content"];
                                            $article["author"] = $row["author"];
                                            $article["created_time"] = $row["created_time"];
                                            $article["status"] = $row["status"];
                                            array_push($data, $article);
                                        ?>
                                            <tr>
                                                <td><?= $article["id"] ?></td>
                                                <td>
                                                    <div class="box">
                                                        <?= $article["title"] ?>
                                                    </div>
                                                </td>
                                                <td><?= $article["category"] ?></td>
                                                <td>
                                                    <div class="box"><?= strip_tags($article["content"]) ?></div>
                                                </td>

                                                <td><?= $article["author"] ?></td>
                                                <td><?= $article["created_time"] ?></td>
                                                <td><?= $article["status"] ?></td>
                                                <td>

                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-secondary btn-view mr-1" data-toggle="modal" data-target="#modify" data-id="<?= $article["id"] ?>" ?>檢視</button>
                                                    <!-- Modal -->


                                                    <a href="article-edit.php?id=<?= $row["id"] ?>" class="btn btn-info mr-1">編輯</a>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger btn-dl" data-toggle="modal" data-target="#delete" data-delete="<?= $article["id"] ?>">刪除</button>

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
            </main>
            <?php require_once "require/footer.php" ?>
        </div>
    </div>
    <?php require_once "require/js.php" ?>
    <script>
        let data = <?= json_encode($data) ?>;
        console.log(data)
        // console.log(data[0][title])
        // let title=""



        $("#target").on("click", ".btn-view", function() {
            let targetID = $(this).data("id");
            // console.log(targetID)
            let articleData = data.find((item) => {
                return item.id == targetID;
            })
            console.log(articleData)

            $("#number").val(articleData.id)
            $("#title").val(articleData.title)
            $("#content").html(articleData.content)
            $("#author").val(articleData.author)

            // let option= $("#catagory option").val()
            // console.log(option)
            // $("#catagory option").val
            // console.log(articleData.category)
            $("#catagory").val(articleData.category)
            $("#status").val(articleData.status)
        })

        $("#target").on("click", ".btn-dl", function() {
            let deleteID = $(this).data("delete")
            //   console.log(deleteID)
            $("#hidden").val(deleteID)

        });

        $(document).ready(function() {
            $('#articleTable').DataTable({

            });

        });




        // let editor=document.querySelectorAll( '.editor' );
        // // console.log(editor)
        // for(let i=0;i<editor.length;i++){
        //     ClassicEditor
        //             .create( editor[i],
        //                         {
        //                             minHeight: '800px',
        //                             toolbar: ["heading", "|", "alignment:left", "alignment:center", "alignment:right", "alignment:adjust", "|", "bold", "italic", "blockQuote", "link", "|", "bulletedList", "numberedList", "imageUpload", "|", "undo", "redo"],

        //                             ckfinder: {
        //                                 uploadUrl: 'upload.php'
        //                             },


        //                         } )
        //                         .then( editor => {
        //                                 console.log( editor );
        //                         } )
        //                         .catch( error => {
        //                                 console.error( error );
        //          } );
        // }
    </script>
</body>

</html>