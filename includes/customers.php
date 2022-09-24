<?php
class Customer extends Db_object
{
    protected static $table = "customers";
    protected static $table_fields = array('currency', 'customerFirstName', 'customerSecondName', 'customerThirdName', 'customerForthName','customerDateOfBearth','customerAddress','date','customerPhoneNumber','customerEmail','customerAccountId','customerBalance','customerBranchId','password','nationalId');
    public $id;
    public $currency;
    public $customerFirstName;
    public $customerSecondName;
    public $customerThirdName;
    public $customerForthName;
    public $customerDateOfBearth;
    public $date;
    public $customerAddress;
    public $customerPhoneNumber;
    public $customerEmail;
    public $customerAccountId;
    public $customerBranchId;
    public $customerBalance;
    public $nationalId;
    public $password;
    public static function verify($customerAccountId, $password)
    {
        global $db;
        $customerAccountId = $db->escape_string($customerAccountId);
        $password = $db->escape_string($password);
        $sql = "SELECT * FROM " . self::$table . " WHERE ";
        $sql .= "customerAccountId = {$customerAccountId} ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";
        $result_array = self::find_by_query($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }
    public function create()
    {
        global $db;
        $properties = $this->clean_properties();
        $sql = "INSERT INTO " . static::$table . " (" . implode(",", array_keys($properties)) . ") ";
        $sql .= " VALUES('" . implode("','", array_values($properties)) . "')";
        if ($db->query($sql)) {
            $this->id = $db->inserted_id();
            list($day,$month,$year) = explode("/",date('d/m/y'));
            $this->customerAccountId = $day.$month.$year;
            $this->customerAccountId .=$db->inserted_id();
            while(strlen($this->customerAccountId)<10){
                $this->customerAccountId .='0';
            }
            $this->update();
            return true;
        } else {
            return false;
        }
    }
    public static function find_by_account($id)
    {
        $result_array = static::find_by_query("SELECT * FROM " . static::$table . " WHERE customerAccountId = {$id}");
        return !empty($result_array) ? array_shift($result_array) : false;
    }
}
