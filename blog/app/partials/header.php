<header class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsWow" aria-controls="navbarsWow" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <!-- Begin Logo -->
        <a class="navbar-brand" href="index.php">
            <img src="assets/images/logo.png" alt="Affiliates - Free Bootstrap Template">
        </a>
        <!-- End Logo -->
        <!-- Begin Menu -->
        <div class="collapse navbar-collapse" id="navbarsWow">
            <!-- Begin Menu -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Anasayfa</a>
                </li>
                <?php

                foreach ($Categories->getCategories(1) as $dataCategory) :
                    $countSubMenu = $Categories->countSubMenu(1, $dataCategory['id']);


                    if ($dataCategory['parentId'] == 0) { ?>
                        <?php

                        if ($countSubMenu > 0) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $dataCategory['categoryName'] ?></a>
                                <?php
                                if ($countSubMenu > 0) { ?>
                                    <div class="dropdown-menu" aria-labelledby="dropdown01">

                                        <?php

                                        foreach ($Categories->getCategoryId($dataCategory['id'], 1) as $subData) : ?>
                                            <a class="dropdown-item" href="category.php?category_id=<?= $subData['id'] ?>"><?= $subData['categoryName'] ?></a>
                                        <?php endforeach; ?>

                                    </div>

                                <?php } ?>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php?category_id=<?= $dataCategory['id'] ?>"><?= $dataCategory['categoryName'] ?></a>
                            </li>
                        <?php } ?>

                    <?php } ?>


                <?php endforeach; ?>


            </ul>
            <!-- End Menu -->
        </div>
    </div>
</header>