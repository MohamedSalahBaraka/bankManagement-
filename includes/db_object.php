<?php
class Db_object
{
    protected static $table;
    protected static $table_fields;
    public static function find_all()
    {
        return static::find_by_query("SELECT * FROM " . static::$table);
    }
    public static function find_by_id($id)
    {
        $result_array = static::find_by_query("SELECT * FROM " . static::$table . " WHERE id = {$id}");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_query($sql)
    {
        global $db;
        $result_set = $db->query($sql);
        $object_array = array();
        while ($row = mysqli_fetch_array($result_set)) {
            $object_array[] = static::instanction($row);
        }
        return $object_array;
    }
    private static function instanction($found)
    {
        $calling_class = get_called_class();
        $object = new $calling_class;
        foreach ($found as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }
    public static function post()
    {
        $calling_class = get_called_class();
        $object = new $calling_class;
        foreach ($_POST as $attribute => $value) {
            if ($object->has_attribute($attribute)){
                $object->$attribute = $_POST[$attribute];}
            }
        return $object;
    }
    private function has_attribute($attribute)
    {
        $object_proprties = get_object_vars($this);
        return array_key_exists($attribute, $object_proprties);
    }
    protected function properties()
    {
        // return get_object_vars($this);
        $properties = array();
        foreach (static::$table_fields as $field) {
            if (property_exists($this, $field)) {
                $properties[$field] = $this->$field;
            }
        }
        return $properties;
    }
    protected function clean_properties()
    {
        global $db;
        $clean_properties = array();
        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $db->escape_string($value);
        }
        return $clean_properties;
    }
    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }
    public function create()
    {
        global $db;
        $properties = $this->clean_properties();
        $sql = "INSERT INTO " . static::$table . " (" . implode(",", array_keys($properties)) . ") ";
        $sql .= " VALUES('" . implode("','", array_values($properties)) . "')";
        if ($db->query($sql)) {
            $this->id = $db->inserted_id();
            return true;
        } else {
            return false;
        }
    }
    public function update()
    {
        global $db;
        $properties = $this->clean_properties();
        $properties_pairs = array();
        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }
        $sql = "UPDATE " . static::$table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id = " . $db->escape_string($this->id);
        $db->query($sql);
        return (mysqli_affected_rows($db->conn) == 1) ? true : false;
    }
    public function delete()
    {
        global $db;
        $sql = "DELETE FROM " . static::$table . " WHERE id = " . $db->escape_string($this->id);
        if ($db->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    public static function count_all()
    {
        global $db;
        $sql = "SELECT COUNT(*) FROM " . static::$table;
        $result_set = $db->query($sql);
        $row = mysqli_fetch_array($result_set);
        return array_shift($row);
    }
}
