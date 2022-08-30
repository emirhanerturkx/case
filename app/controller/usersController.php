<?php
require_once('appController.php');
class usersController extends appController
{
    public function getUsers($status = 1)
    {
        $getUsers = $this->db->prepare("SELECT * FROM `" . DB_PREFIX . "users` WHERE status=:status");
        $getUsers->execute(array(
            'status' => $status
        ));
        $fetchArray = $getUsers->fetchAll(PDO::FETCH_ASSOC);
        return $fetchArray;
    }

    public function deleteUser($user_id = '')
    {
        if ($user_id == '') {
            return '{"status":"nullArea"}';
        } else {

            $deleteUserId = $this->db->prepare("UPDATE `" . DB_PREFIX . "users` SET status=:status WHERE id=:id");
            $deleteUserId->execute(array(
                'status' => 0,
                'id' => $user_id
            ));

            if ($deleteUserId) {
                return '{"status":"success"}';
            } else {
                return '{"status":"error"}';
            }
        }
    }
}
