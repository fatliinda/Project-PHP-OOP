<?php


class Db_object{

   
        

    public static function find_all(){

        return static::find_this_query("SELECT * FROM " . static::$db_table);

    }

    public static function find_by_id($user_id){
        global $database;
       

        $the_result_array = static::find_this_query("SELECT * FROM " . static::$db_table . " WHERE id = $user_id LIMIT 1");

         return !empty($the_result_array) ? array_shift($the_result_array): false;
    }

    public static function find_this_query($sql){

        global $database;
        $result_set=$database->query($sql);
        $the_object_array=array();
        while($row= mysqli_fetch_array($result_set)){
                $the_object_array[]= static::instantiation($row);


        }
       
        return $the_object_array;
    }


    public static function instantiation($the_record){

        $calling_class= get_called_class();
        $the_object = new $calling_class;
    
        foreach($the_record as $the_attribute => $value) {
            if($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }
    
        return $the_object;
    }

    private function has_the_attribute($the_attribute){

        $object_properties=get_object_vars($this);

     return   array_key_exists($the_attribute,$object_properties);


}

protected function properties()
{
    $properties = array();

    foreach (static::$db_table_fields as $field) {
        if (property_exists($this, $field)) {
            $properties[$field] = $this->$field;
        }
    }

    return $properties;
}

private function clean_properties()
{
    global $database;

    $clean_properties = array();

    foreach ($this->properties() as $key => $value) {
        if (property_exists($this, $key)) {
            $clean_properties[$key] = $database->escape_string($value);
        }
    }

    return $clean_properties;
}


public function save(){

    return isset($this->id)? $this->update() : $this->create();


}
public function create()
{
global $database;

$properties = $this->clean_properties();

$columns = implode(",", array_keys($properties));
$values = "'" . implode("','", array_values($properties)) . "'";

$sql = "INSERT INTO " . static::$db_table . " ($columns) VALUES ($values)";

if ($database->query($sql)) {
$this->id = $database->insert_id();
return true;
} else {
return false;
}
}






public function update()
{
global $database;


$properties=$this->clean_properties();

$prop_pairs=array();

foreach($properties as $key => $value){

    $prop_pairs[]="{$key}='{$value}'";

}



$sql = "UPDATE " .static::$db_table . " SET ";
$sql.=implode(",",$prop_pairs);
$sql.= " WHERE id= " .$database->escape_string($this->id);     
$database->query($sql);

return mysqli_affected_rows($database->connection) === 1;
}


public function delete()
{
global $database;
$id = $database->escape_string($this->id);

$sql = "DELETE FROM " .static::$db_table . " WHERE id = '$id'";

$database->query($sql);

return mysqli_affected_rows($database->connection) === 1 ;
}

}


?>