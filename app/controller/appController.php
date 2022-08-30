<?php

require_once('defines.php');

class appController {
    public function database()
    {
        $conn = new PDO("mysql: host=localhost; dbname=" . DBNAME . "; charset=UTF8", USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
    public function __construct()
    {
        $this->db = $this->database();
    }
}
