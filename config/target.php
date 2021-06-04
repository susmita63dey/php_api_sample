<?php
class Target{
 
    // database connection and table name
    private $conn;
    private $table_name = "target";
 
    // object properties
    public $tarnsaction_id;
    public $targeted_fasting;
    public $targeted_pp;
    public $target_hba1c;
    public $targeted_random;
    public $doctor_id;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function readAll(){
        //select all data
        $query = "SELECT
                   *
                FROM
                    " . $this->table_name . ";
                ";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

// used by select drop-down list
public function read(){ 
 
    //select all data
    $query = "SELECT
            *
            FROM
                " . $this->table_name . "
           where doctor_id= '".$this->doctor_id."';";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}
 

}
?>