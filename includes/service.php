<?php
class Service extends Db_object
{
    protected static $table = "service";
    protected static $table_fields = array('sericeName', 'beneficiary', 'intrest', 'date', 'money','category','currency');
    public $id;
    public $sericeName;
    public $beneficiary;
    public $intrest;
    public $money;
    public $category;
    public $currency;
    public $date;
    
}
