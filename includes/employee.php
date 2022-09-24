<?php
class Employee extends Db_object
{
    protected static $table = "employee";
    protected static $table_fields = array('jopId','accountId', 'name', 'password', 'address', 'phone','date','email','barachId');
    public $id;
    public $jopId;
    public $name;
    public $password;
    public $address;
    public $phone;
    public $email;
    public $accountId;
    public $date;
    public $barachId;
    public static function verify($email, $password)
    {
        global $db;
        $email = $db->escape_string($email);
        $password = $db->escape_string($password);
        $sql = "SELECT * FROM " . self::$table . " WHERE ";
        $sql .= "email = '{$email}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";
        $result_array = self::find_by_query($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }
}
