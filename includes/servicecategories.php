<?php
class Servicecategory extends Db_object
{
    protected static $table = "servicecategories";
    protected static $table_fields = array('name');
    public $id;
    public $name;
}
