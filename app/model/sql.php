<?php

require_once('../controller/defines.php');
require_once('../controller/categoryController.php');
require_once('../controller/articlesController.php');
require_once('../controller/usersController.php');

$Categories = new categoryController;
$Articles = new articlesController;
$Users = new usersController;
if ($_GET['type']) {
    switch ($_GET['type']) {
            //Kategori Listele/Ekle/Düzenle/Sil

        case 'getCategories':
            echo json_encode($Categories->getCategories(1));
            break;

        case 'addCategory':
            $categoryName = $_POST['categoryName'];
            $parentCategory = $_POST['parentCategory'];

            $addCategory = $Categories->addCategory($categoryName, $parentCategory);
            echo $addCategory;
            break;

        case 'deleteCategory':
            echo $Categories->deleteCategoryId($_POST['id']);
            break;


        case 'getCategoryId';
            echo json_encode($Categories->getSubCategory($_POST['id']));
            break;


        case 'updateCategory':
            $categoryName = $_POST['categoryNameModal'];
            $id = $_POST['categoryId'];

            $updateCategory = $Categories->updateCategory($categoryName, $id);
            echo $updateCategory;

            break;

            //Makale Listele/Ekle/Düzenle/Sil

        case 'addArticle':
            $articleTitle = $_POST['articleTitle'];
            $parentCategory = $_POST['parentCategory'];
            $articleText = $_POST['articleText'];

            echo $Articles->addArticle($articleTitle, $parentCategory, $articleText);
            break;

        case 'deleteArticle':
            echo $Articles->deleteArticleId($_POST['id']);
            break;

        case 'getArticleId':
            echo json_encode($Articles->getArticleId($_POST['id']));
            break;

        case 'updateArticle':
            $modalArticleTitle = $_POST['modalArticleTitle'];
            $modalArticleText = $_POST['modalArticleText'];
            $id = $_POST['articleId'];

            $updateArticle = $Articles->updateArticle($modalArticleTitle, $modalArticleText, $id);
            echo $updateArticle;
            break;

            //Kullanıcı Bölümü
        case 'deleteUser':

            echo $Users->deleteUser($_POST['id']);

            break;
    }
}
