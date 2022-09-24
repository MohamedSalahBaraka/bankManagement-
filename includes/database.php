<?php
require_once("config.php");
class Database
{
    var $conn;
    function __construct()
    {
        $this->open_db_connection();
    }
    public function open_db_connection()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_errno) {
            die("Error connecting to database " . mysqli_error($this->conn));
        }
    }
    public function fetch($result)
    {
        return
            mysqli_fetch_assoc($result);
    }
    public function query($sql)
    {
        $result = $this->conn->query($sql);
        $this->confirm($result);
        return $result;
    }
    private function confirm($result)
    {
        if (!$result) {
            die("Error executing query " . $this->conn->error);
        }
    }
    public function escape_string($string)
    {
        return mysqli_real_escape_string($this->conn, $string);
    }
    public function inserted_id()
    {
        return mysqli_insert_id($this->conn);
    }
}
$db = new Database();
