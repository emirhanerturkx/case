<?php
error_reporting(E_ALL);
ini_set('display_errors', -1);

require_once('appController.php');
class articlesController extends appController
{
    public function addArticle($articleTitle = '', $articleCategory = [], $articleText = '')
    {
        if ($articleTitle == '' || $articleCategory == '' || $articleText == '') {
            return '{"status":"nullArea"}';
        } else {

            $addArticle = $this->db->prepare("INSERT INTO `" . DB_PREFIX . "articles` SET title=:title,articleText=:articleText");
            $addArticle->execute(array(
                'title' => $articleTitle,
                'articleText' => $articleText
            ));
            $lastArticleId = $this->db->lastInsertId();

            for ($i = 0; $i < count($articleCategory); $i++) {
                $addCategoryToArticle = $this->db->prepare("INSERT INTO `" . DB_PREFIX . "article_to_category` SET article_id=:article_id, category_id=:category_id");
                $addCategoryToArticle->execute(array(
                    'article_id' => $lastArticleId,
                    'category_id' => $articleCategory[$i]
                ));
            }

            if ($addArticle) {
                return '{"status":"success"}';
            } else {
                return '{"status":"sqlError"}';
            }
        }
    }

    public function getArticles($status = 1)
    {
        $getArticles = $this->db->prepare("SELECT * FROM `" . DB_PREFIX . "articles` WHERE status=:status");
        $getArticles->execute(array(
            'status' => $status
        ));
        $fetchArray = $getArticles->fetchAll(PDO::FETCH_ASSOC);
        return $fetchArray;
    }
    public function deleteArticleId($id = '')
    {
        if ($id == '') {
            return '{"status":"nullArea"}';
        } else {
            $deleteArticle = $this->db->prepare("UPDATE `" . DB_PREFIX . "articles` SET status=:status WHERE id=:id");
            $deleteArticle->execute(array(
                'status' => 0,
                'id' => $id
            ));

            $deleteArticleCategory = $this->db->prepare("UPDATE `" . DB_PREFIX . "article_to_category` SET status=:status WHERE article_id=:article_id");
            $deleteArticleCategory->execute(array(
                'status' => 0,
                'article_id' => $id
            ));

            if ($deleteArticle && $deleteArticleCategory) {
                return '{"status":"success"}';
            } else {
                return '{"status":"sqlError"}';
            }
        }
    }

    public function getArticleId($article_id = '')
    {

        if ($article_id == '') {
            return '{"status":"nullArea"}';
        } else {
            $getArticleId = $this->db->prepare("SELECT * FROM `" . DB_PREFIX . "articles` WHERE id=:id");
            $getArticleId->execute(array(
                'id' => $article_id
            ));
            $fetchArray = $getArticleId->fetchAll(PDO::FETCH_ASSOC);
            return $fetchArray;
        }
    }

    public function updateArticle($articleTitle = '', $articleText = '', $article_id = '')
    {
        if ($articleTitle == '' || $articleText == '' || $article_id == '') {
            return '{"status":"nullArea"}';
        } else {

            $updateArticle = $this->db->prepare("UPDATE `" . DB_PREFIX . "articles` SET title=:title, articleText=:articleText WHERE id=:id");
            $updateArticle->execute(array(
                'title' => $articleTitle,
                'articleText' => $articleText,
                'id' => $article_id
            ));

            if ($updateArticle) {
                return '{"status":"success"}';
            } else {
                return '{"status":"sqlError"}';
            }
        }
    }


    public function getCategoryArticle($category_id = '')
    {
        $getArticle = $this->db->prepare("SELECT * FROM `" . DB_PREFIX . "article_to_category` INNER JOIN " . DB_PREFIX . "articles ON " . DB_PREFIX . "article_to_category.article_id=" . DB_PREFIX . "articles.id WHERE ".DB_PREFIX."article_to_category.category_id=:category_id");
        $getArticle->execute(array(
            'category_id' => $category_id
        ));

        $fetchArray = $getArticle->fetchAll(PDO::FETCH_ASSOC);
        return $fetchArray;
    }
}
