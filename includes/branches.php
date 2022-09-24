<?php
class Branches extends Db_object
{
    protected static $table = "branches";
    protected static $table_fields = array('name', 'address', 'phone','cash');
    public $id;
    public $address;
    public $name;
    public $phone;
    public $cash;
   
}
