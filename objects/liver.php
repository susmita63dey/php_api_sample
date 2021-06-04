<?php
class Liver{
 
    // database connection and table name
    private $conn;
    private $table_name = "liver_profile";

    // object properties
    public $s_bilirubin;
    public $direct;
    public $indirect;
    public $sgot;
    public $sgpt;
    public $albumin;
    public $globulin;
    //public $ablumin;
    public $albumin_globulin_ratio;
    public $pt;

    public $patient_id;
  

 
    public function __construct($db){
        $this->conn = $db;
    }
 

    public function create(){

        $query = "insert into liver_profile(s_bilirubin,direct,indirect,sgot,sgpt,albumin,globulin,albumin_globulin_ratio,pt,patient_id) values ('".$this->s_bilirubin."','".$this->direct."','".$this->indirect."','".$this->sgot."','".$this->sgpt."','".
        $this->albumin."','".$this->globulin."','".$this->albumin_globulin_ratio."','".$this->pt."','".$this->patient_id."');";
       
       // echo $query;
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
           
        
    }
    // used by select drop-down list
    public function getprofiledetail(){
        //select all data
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name . "
                where patient_id='".
                   $this->patient_id."';";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

// used by select drop-down list
public function read(){
 
    //select all data
    $query = "SELECT
                id, name, description
            FROM
                " . $this->table_name . "
            ORDER BY
                name";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}
 
public function getaccountdetail(){
 
    //select all data
    $query = "SELECT
              *
            FROM
                " . $this->table_account . "
            ORDER BY
                id";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}







//end all func
}
?>