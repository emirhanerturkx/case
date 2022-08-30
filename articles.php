<!DOCTYPE html>
<html>
<?php require_once('app/partials/head.php') ?>
<?php require_once('app/controller/articlesController.php') ?>
<?php
$Articles = new articlesController;

?>
<style>
    .articleText p {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 400px;
    }
</style>

<body class="with-side-menu">
    <?php require_once('app/partials/header.php') ?>


    <?php require_once('app/partials/nav.php') ?>

    <div class="page-content">
        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h3>Makale Görüntüle/Ekle/DÜzenle/Sil</h3>

                        </div>
                    </div>
                </div>
            </header>

            <div class="box-typical box-typical-padding">
                <h5 class="m-t-lg with-border">Makale Ekle</h5>
                <form class="add-article-form" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Makale Adı</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="articleTitle" placeholder="Örn. HTML & CSS"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleSelect2" class="col-sm-2 form-control-label">Kategori</label>
                        <div class="col-sm-10">
                            <select multiple class="form-control parent-categories" name="parentCategory[]" id="exampleSelect2">
                                <option value="0">Ana Kategori</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Makale Yazısı</label>

                        <div class="col-md-10">
                            <div class="summernote-theme-3">
                                <textarea class="summernote" name="articleText"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary">Ekle</button>
                        </div>
                    </div>
                </form>
            </div>
            <section class="card">
                <div class="card-block">
                    <table id="categoryTable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Makale Adı</th>
                                <th>Makale Yazısı</th>
                                <th>Eklenme Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Makale Adı</th>
                                <th>Makale Yazısı</th>
                                <th>Eklenme Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $getCategories = $Articles->getArticles(1);
                            foreach ($getCategories as $dataArticle) :
                            ?>
                                <tr>

                                    <td><?= $dataArticle['title'] ?></td>
                                    <td><span class="text-truncate articleText"><?= $dataArticle['articleText'] ?></span></td>
                                    <td><?= $dataArticle['date_added'] ?></td>
                                    <td width="13%"><button class="btn btn-primary edit-article" data-id="<?= $dataArticle['id'] ?>">Düzenle</button> - <button class="btn btn-danger delete-article" data-id="<?= $dataArticle['id'] ?>">Sil</button></td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </section>
            <!--.box-typical-->
        </div>
        <!--.container-fluid-->
    </div>
    <!--.page-content-->

    <!-- Modal -->
    <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kategori Düzenle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="update-article-form" method="post">
                        <input type="hidden" name="articleId" class="article-id">
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Makale Adı</label>
                            <div class="col-sm-10">
                                <p class="form-control-static"><input type="text" class="form-control" name="modalArticleTitle" placeholder="Örn. HTML & CSS"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Makale Yazısı</label>

                            <div class="col-md-10">
                                <div class="summernote-theme-3">
                                    <textarea class="summernote" name="modalArticleText"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/lib/jquery/jquery-3.2.1.min.js"></script>
    <script src="js/lib/popper/popper.min.js"></script>
    <script src="js/lib/tether/tether.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/lib/salvattore/salvattore.min.js"></script>
    <script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script src="js/lib/datatables-net/datatables.min.js"></script>
    <script src="js/lib/summernote/summernote.min.js"></script>

    <script src="js/app.js"></script>

    <script>
        function getCategory() {
            $('.parent-categories').empty();

            var categoryData = new FormData();
            $.ajax({
                type: "POST",
                url: 'app/model/sql.php?type=getCategories',
                processData: false,
                contentType: false,
                cache: false,
                data: categoryData,
                success: function(data) {
                    var data = jQuery.parseJSON(data);
                    $('.parent-categories').prepend('<option value="0">Ana Kategori</option>')

                    if (data != '') {

                        for (i = 0; i <= data.length; i++) {
                            if (data[i].parentId == 0) {
                                var customText = 'Ana Kategori > ';
                            } else {
                                var customText = '';

                            }
                            $('.parent-categories').append('<option value="' + data[i].id + '">' + customText + data[i].categoryName + '</option>')
                        }
                    } else {
                        alert("Kategori yok")
                    }
                }
            });
        }
        $(() => {
            getCategory()
            $('.summernote').summernote();

        })
        //Kategori Veri Çekme Ajax
        $(document).on('click', '.edit-article', function() {
            $('#edit-modal').modal('show');
            var categoryData = new FormData();
            categoryData.append('id', $(this).data('id'))
            $('.article-id').val($(this).data('id'))
            $.ajax({
                type: "POST",
                url: 'app/model/sql.php?type=getArticleId',
                processData: false,
                contentType: false,
                cache: false,
                data: categoryData,
                success: function(data) {
                    var data = jQuery.parseJSON(data);
                    $('input[name="modalArticleTitle"]').val(data[0].title);
                    $('textarea[name="modalArticleText"]').summernote("code", data[0].articleText);
                }
            });
        });
        //Makale Ekleme Ajax
        $('.add-article-form').submit(function(e) {
            e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                type: "POST",
                url: 'app/model/sql.php?type=addArticle',
                processData: false,
                contentType: false,
                cache: false,
                data: data,
                success: function(data) {
                    console.log(data);
                    var data = jQuery.parseJSON(data);
                    if (data.status == 'success') {
                        alert('Makale Eklendi!');
                        location.reload()
                    } else {
                        alert('Makale Ekleme İşlemi Başarısız!');
                    }
                }
            });

        })
        //Kategori Güncelleme Ajax
        $('.update-article-form').submit(function(e) {
            e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                type: "POST",
                url: 'app/model/sql.php?type=updateArticle',
                processData: false,
                contentType: false,
                cache: false,
                data: data,
                success: function(data) {
                    console.log(data);
                    var data = jQuery.parseJSON(data);
                    if (data.status == 'success') {
                        alert('Kategori Güncellendi!');
                        location.reload()
                    } else {
                        alert('Kategori Güncelleme İşlemi Başarısız!');
                    }
                }
            });

        })
        //Kategori Silme Ajax
        $(document).on('click', '.delete-article', function(e) {
            e.preventDefault();
            var data = new FormData();
            data.append('id', $(this).data('id'))
            $.ajax({
                type: "POST",
                url: 'app/model/sql.php?type=deleteArticle',
                processData: false,
                contentType: false,
                cache: false,
                data: data,
                success: function(data) {
                    console.log(data);
                    var data = jQuery.parseJSON(data);
                    if (data.status == 'success') {
                        alert('Makale Silindi!');
                        location.reload()
                    } else {
                        alert('Makale Silme İşlemi Başarısız!');
                    }
                }
            });

        })
    </script>
</body>

</html>