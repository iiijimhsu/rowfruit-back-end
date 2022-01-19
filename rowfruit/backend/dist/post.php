<?php require_once "require/header.php" ?>
<!doctype html>
<html lang="en">
  <head>
    <title>文章發表</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
         .ck-editor__editable_inline {
            /* 設定最低高度 */
            min-height: 300px;
        }
    </style>
  </head>
  <body>
      <div class="container">
      
                            <form action="articleinsert-test.php" method="post">
                                <div class="form-group row">
                                  <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>文章標題</label>
                                  <div class="col-sm-9">
                                     <input type="text" class="form-control" name="inserttitle" required>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>文章分類</label>
                                  <div class="col-sm-9">
                                      <select name="insertcategory" class="selectcategory">
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
                                  <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>文章內容</label>
                                  <div class="col-sm-9">
                                     <textarea name="insertcontent" id="editor" class="form-control" cols="30" rows="10"></textarea>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>發佈人</label>
                                  <div class="col-sm-9">
                                     <input type="text" class="form-control" name="insertauthor"  required>
                                  </div>
                                </div>
                                
                                <div class="form-group row">
                                  <label for="" class="col-sm-3 col-form-label"><span class="text-danger">* </span>狀態</label>
                                  <div class="col-sm-9">
                                  <select class="selectstatus" name="insertstatus">
                                        <option value="on">on</option>
                                        <option value="off">off</option>
                                  </select>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">儲存</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                                </div>
                              </form>
                         
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
         ClassicEditor
                                .create( document.querySelector( '#editor' ),
                                {
                                    
                                    toolbar: ["heading", "|", "alignment:left", "alignment:center", "alignment:right", "alignment:adjust", "|", "bold", "italic", "blockQuote", "link", "|", "bulletedList", "numberedList", "imageUpload", "|", "undo", "redo"],
                                    ckfinder: {
                                        uploadUrl: 'upload.php'
                                    }

                                } )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
    </script>
  </body>
</html>