<?php
class Jobs extends Db_object
{
    protected static $table = "jobs";
    protected static $table_fields = array('jobTitle', 'jobDescription', 'salary');
    public $id;
    public $salary;
    public $jobTitle;
    public $jobDescription;
    
}
