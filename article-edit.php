<?php
require_once "../../fruitdb_connect.php";
$id = $_GET['id'];
$sqlarticle = "SELECT * FROM article WHERE id='$id'";
$result = $conn->query($sqlarticle);
// var_dump($result);
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
    <title>編輯文章</title>
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
            width: 100%;
            height: 100%;
        }

        .ck-editor__editable_inline {
            /* 設定最低高度 */
            min-height: 250px;
        }
    </style>

</head>

<body class="sb-nav-fixed">
    <?php require_once "require/topnav.php" ?>
    <div id="layoutSidenav">
        <?php require_once "require/sidenav.php" ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid ml-4 mt-4 mx-auto">
                    <?php
                    if ($result->num_rows > 0) :

                    ?>
                        <form action="articlemodify.php" method="post">
                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                <div class="form-group">
                                    <label for="" class="col col-form-label"><span class="text-danger">* </span>文章標題</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="title" required value="<?= $row['title'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label for="" class="col-3 col-form-label"><span class="text-danger">* </span>文章分類:</label>
                                    <div class="col-9">
                                        <select name="category" class="selectcategory">
                                            <option value="<?= $row['category'] ?>"><?= $row['category'] ?></option>
                                            <option value="生活">生活</option>
                                            <option value="水果">水果</option>
                                            <option value="營養知識">營養知識</option>
                                            <option value="故事">故事</option>
                                            <option value="歷史">歷史</option>
                                            <option value="其它">其它</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="" class="col col-form-label"><span class="text-danger">* </span>文章內容</label>
                                    <div class="col-8">
                                        <textarea name="content" id="editor" class="form-control" cols="30" rows="10"><?= $row["content"] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col col-form-label"><span class="text-danger">* </span>發佈人</label>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="author" required value="<?= $row["author"] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col col-form-label"><span class="text-danger">* </span>狀態</label>
                                    <div class="col">
                                        <select class="selectstatus" name="status">
                                            <option value="<?= $row['status'] ?>"><?= $row['status'] ?></option>
                                            <option value="on">on</option>
                                            <option value="off">off</option>
                                        </select>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">儲存</button>
                                    <a href="article-test.php" class="btn btn-secondary" data-dismiss="modal">關閉</a>
                                </div>
                        </form>
                    <?php else : ?>
                        沒有這筆資料
                    <?php endif; ?>

                </div>
            </main>
            <?php require_once "require/footer.php" ?>
        </div>
    </div>
    <?php require_once "require/js.php" ?>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {

                toolbar: ["heading", "|", "alignment:left", "alignment:center", "alignment:right", "alignment:adjust", "|", "bold", "italic", "blockQuote", "link", "|", "bulletedList", "numberedList", "imageUpload", "|", "undo", "redo"],
                ckfinder: {
                    uploadUrl: 'upload.php'
                }

            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>