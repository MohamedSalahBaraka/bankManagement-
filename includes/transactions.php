<?php
class Transaction extends Db_object
{
    protected static $table = "transactions";
    protected static $table_fields = array('beneficary', 'intrest', 'fromAccountId', 'Cashhold', 'money','date','currency','cashholdNId','serviceID','reportId');
    public $id;
    public $beneficary;
    public $intrest;
    public $fromAccountId;
    public $Cashhold;
    public $money;
    public $cashholdNId;
    public $currency;
    public $date;
    public $serviceID;
    public $reportId;
    public static function find_by_account($id)
    {
        $result_array = static::find_by_query("SELECT * FROM " . static::$table . " WHERE fromAccountId = {$id}");
        return !empty($result_array) ? $result_array : false;
    }
}
