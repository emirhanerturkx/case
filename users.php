<!DOCTYPE html>
<html>
<?php require_once('app/partials/head.php') ?>
<?php require_once('app/controller/usersController.php') ?>
<?php
$Users = new usersController;

?>

<link rel="stylesheet" href="css/separate/pages/user.min.css">

<body class="with-side-menu">
    <?php require_once('app/partials/header.php') ?>


    <?php require_once('app/partials/nav.php') ?>

    <div class="page-content">
        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h3>Kullanıcılar</h3>

                        </div>
                    </div>
                </div>
            </header>

            <div class="box-typical box-typical-padding">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <label for="">Kullanıcı Ara</label>
                        <input type="text" class="form-control search-user" placeholder="Örn. Emirhan Ertürk">

                    </div>
                </div>
                <div class="row user-area">



                    <?php foreach ($Users->getUsers(1) as $dataUser) : ?>
                        <div class="col-sm-6 col-md-4 col-xl-3 user-column">
                            <article class="card-user box-typical">
                                <div class="card-user-action float-right">
                                    <div class="dropdown dropdown-user-menu">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="glyphicon glyphicon-option-vertical"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button type="button" data-id="<?= $dataUser['id'] ?>" class="dropdown-item delete-user"><span class="font-icon font-icon-minus"></span>Sil</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-user-photo">
                                    <img src="img/avatar-2-64.png" alt="">
                                </div>
                                <div class="card-user-name"><?= $dataUser['name_surname'] ?></div>
                                <div class="card-user-status"><?= $dataUser['phone'] ?></div>

                            </article>
                        </div>

                    <?php endforeach; ?>
                </div>


            </div>

            <!--.box-typical-->
        </div>
        <!--.container-fluid-->
    </div>
    <!--.page-content-->

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
        //Kullanıcı Silme Ajax
        $(document).on('click', '.delete-user', function(e) {
            e.preventDefault();
            var data = new FormData();
            data.append('id', $(this).data('id'))
            $.ajax({
                type: "POST",
                url: 'app/model/sql.php?type=deleteUser',
                processData: false,
                contentType: false,
                cache: false,
                data: data,
                success: function(data) {
                    var data = jQuery.parseJSON(data);
                    if (data.status == 'success') {
                        alert('Kullanıcı Silindi!');
                        location.reload()
                    } else {
                        alert('Kullanıcı Silme İşlemi Başarısız!');
                    }
                }
            });

        })

        $(".search-user").keyup(function() {
            var filter = $(this).val();
            $(".user-area .user-column").each(function() {
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).fadeOut();
                } else {
                    $(this).show();
                }
            });
        });
    </script>
</body>

</html>