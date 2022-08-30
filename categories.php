<!DOCTYPE html>
<html>
<?php require_once('app/partials/head.php') ?>
<?php require_once('app/controller/categoryController.php') ?>
<?php

$Categories = new categoryController;

?>

<body class="with-side-menu">
    <?php require_once('app/partials/header.php') ?>


    <?php require_once('app/partials/nav.php') ?>

    <div class="page-content">
        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h3>Kategori Görüntüle/Ekle/DÜzenle/Sil</h3>

                        </div>
                    </div>
                </div>
            </header>

            <div class="box-typical box-typical-padding">
                <h5 class="m-t-lg with-border">Kategori Ekle</h5>
                <form class="add-categories-form">
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Kategori Adı</label>
                        <div class="col-sm-10">
                            <p class="form-control-static"><input type="text" class="form-control" name="categoryName" placeholder="Örn. HTML & CSS"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleSelect2" class="col-sm-2 form-control-label">Alt Kategori</label>
                        <div class="col-sm-10">
                            <select multiple class="form-control parent-categories" name="parentCategory" id="exampleSelect2">
                                <option value="0">Ana Kategori</option>
                            </select>
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
                                <th>Kategori Adı</th>
                                <th>Eklenme Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Kategori Adı</th>
                                <th>Eklenme Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $getCategories = $Categories->getCategories(1);
                            foreach ($getCategories as $dataCategories) :
                            ?>
                                <tr>

                                    <td>
                                        <?php

                                        foreach ($Categories->getSubCategory($dataCategories['parentId']) as $dataSubCategory) :
                                            echo  $dataSubCategory['categoryName'] . " > ";
                                        endforeach;
                                        ?>
                                        <?= $dataCategories['categoryName'] ?></td>

                                    <td><?= $dataCategories['date_added'] ?></td>
                                    <td width="13%"><button class="btn btn-primary edit-category" data-id="<?= $dataCategories['id'] ?>">Düzenle</button> - <button class="btn btn-danger delete-category" data-id="<?= $dataCategories['id'] ?>">Sil</button></td>

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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kategori Düzenle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="update-categories-form" method="post">
                        <input type="hidden" class="category-id" name="categoryId">
                        <div class="form-group">
                            <label for="">Kategori Adı</label>
                            <input type="text" name="categoryNameModal" class="form-control">
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

        })
        //Kategori Veri Çekme Ajax
        $(document).on('click', '.edit-category', function() {
            $('#edit-modal').modal('show');
            var categoryData = new FormData();
            categoryData.append('id',$(this).data('id'))
            $('.category-id').val($(this).data('id'))
            $.ajax({
                type: "POST",
                url: 'app/model/sql.php?type=getCategoryId',
                processData: false,
                contentType: false,
                cache: false,
                data: categoryData,
                success: function(data) {
                    var data = jQuery.parseJSON(data);
                    $('input[name="categoryNameModal"]').val(data[0].categoryName);
                }
            });
        });
        //Kategori Ekleme Ajax
        $('.add-categories-form').submit(function(e) {
            e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                type: "POST",
                url: 'app/model/sql.php?type=addCategory',
                processData: false,
                contentType: false,
                cache: false,
                data: data,
                success: function(data) {
                    var data = jQuery.parseJSON(data);
                    if (data.status == 'success') {
                        alert('Kategori Eklendi!');
                        location.reload()
                    } else {
                        alert('Kategori Ekleme İşlemi Başarısız!');
                    }
                }
            });

        })
        //Kategori Güncelleme Ajax
        $('.update-categories-form').submit(function(e) {
            e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                type: "POST",
                url: 'app/model/sql.php?type=updateCategory',
                processData: false,
                contentType: false,
                cache: false,
                data: data,
                success: function(data) {
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
        $(document).on('click', '.delete-category', function(e) {
            e.preventDefault();
            var data = new FormData();
            data.append('id', $(this).data('id'))
            $.ajax({
                type: "POST",
                url: 'app/model/sql.php?type=deleteCategory',
                processData: false,
                contentType: false,
                cache: false,
                data: data,
                success: function(data) {
                    var data = jQuery.parseJSON(data);
                    if (data.status == 'success') {
                        alert('Kategori Silindi!');
                        location.reload()
                    } else {
                        alert('Kategori Silme İşlemi Başarısız!');
                    }
                }
            });

        })
    </script>
</body>

</html>