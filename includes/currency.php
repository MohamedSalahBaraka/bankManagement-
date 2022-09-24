<?php
class Currency extends Db_object
{
    protected static $table = "currency";
    protected static $table_fields = array('sell', 'name', 'preacher');
    public $id;
    public $preacher;
    public $sell;
    public $name;
    
}
