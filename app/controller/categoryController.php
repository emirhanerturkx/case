<?php

require_once('appController.php');
class categoryController extends appController
{
    //Tüm Kategorileri Getirir. Parametre olarak [0 veya 1 alır]
    //Parametre veri tipi INT
    public function getCategories($status = 1)
    {
        $getCategories = $this->db->prepare("SELECT * FROM `" . DB_PREFIX . "categories` WHERE status=:status");
        $getCategories->execute(array(
            'status' => $status
        ));
        $fetchArray = $getCategories->fetchAll(PDO::FETCH_ASSOC);
        return $fetchArray;
    }


    //Sadece Gönderilen ID ile eşleşen kategoriyi getirir. Parametre olarak [Kategori Id alır]
    // id veri tipi INT
    public function getSubCategory($categoryId = 0)
    {
        $getParentCategory = $this->db->prepare("SELECT * FROM `" . DB_PREFIX . "categories` WHERE id=:id");
        $getParentCategory->execute(array(
            'id' => $categoryId
        ));
        $fetchArray = $getParentCategory->fetchAll(PDO::FETCH_ASSOC);
        return $fetchArray;
    }

    //Kategori Ekler Parametre Olarak [Kategori Adı ve Alt Kategori Id alır] 
    // Kategori Adı veri tipi VARCHAR
    // id veri tipi INT
    public function addCategory($categoryName = '', $parentCategory = '')
    {

        if ($categoryName == '' || $parentCategory == '') {
            return '{"status":"nullArea"}';
        } else {

            $addCategory = $this->db->prepare("INSERT INTO `" . DB_PREFIX . "categories` SET categoryName=:categoryName,parentId=:parentId");
            $addCategory->execute(array(
                'categoryName' => $categoryName,
                'parentId' => $parentCategory
            ));
            if ($addCategory) {
                return '{"status":"success"}';
            } else {
                return '{"status":"sqlError"}';
            }
        }
    }
    //Kategori Silmek İçin Kullanılır. Parametre olarak [Kategori Id alır]
    // id veri tipi INT
    public function deleteCategoryId($id = '')
    {
        if ($id == '') {
            return '{"status":"nullArea"}';
        } else {
            $deleteCategoryId = $this->db->prepare("UPDATE `" . DB_PREFIX . "categories` SET status=:status,date_modified=:date_modified WHERE id=:id");
            $deleteCategoryId->execute(array(
                'status' => 0,
                'date_modified' => date('Y-m-d H:i:s'),
                'id' => $id,
            ));


            $deleteSubCategoryId = $this->db->prepare("UPDATE `" . DB_PREFIX . "categories` SET status=:status,date_modified=:date_modified WHERE parentId=:id");
            $deleteSubCategoryId->execute(array(
                'status' => 0,
                'date_modified' => date('Y-m-d H:i:s'),
                'id' => $id,
            ));
            if ($deleteCategoryId && $deleteSubCategoryId) {
                return '{"status":"success"}';
            } else {
                return '{"status":"sqlError"}';
            }
        }
    }
    //Kategori düzenlemek için kullanılır. Parametre olarak [Kategori Id ve Kategori Adı alır]
    // id veri tipi INT
    // Kategori adı veri tipi VARCHAR
    public function updateCategory($categoryName = '', $id = '')
    {

        if ($categoryName == '' || $id == '') {
            return '{"status":"nullArea"}';
        } else {

            $updateCategory = $this->db->prepare("UPDATE `" . DB_PREFIX . "categories` SET categoryName=:categoryName,date_modified=:date_modified WHERE id=:id");
            $updateCategory->execute(array(
                'categoryName' => $categoryName,
                'date_modified' => date('Y-m-d H:i:s'),
                'id' => $id
            ));
            if ($updateCategory) {
                return '{"status":"success"}';
            } else {
                return '{"status":"sqlError"}';
            }
        }
    }

    public function countSubMenu($status = 1, $parent)
    {
        $getMenuSQL = $this->db->prepare('SELECT * FROM ' . DB_PREFIX . 'categories WHERE status=:status AND parentId=:parentId');
        $getMenuSQL->execute(array(
            'status' => $status,
            'parentId' => $parent,
        ));
        $fetchArray = $getMenuSQL->fetchAll(PDO::FETCH_ASSOC);
        return count($fetchArray);
    }


    public function getCategoryId($categoryId = '', $status = 1)
    {
        $getCategory = $this->db->prepare("SELECT * FROM `" . DB_PREFIX . "categories` WHERE parentId=:id AND status=:status");
        $getCategory->execute(array(
            'id' => $categoryId,
            'status' => $status
        ));
        $fetchArray = $getCategory->fetchAll(PDO::FETCH_ASSOC);

        return $fetchArray;
    }
}
