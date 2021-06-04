<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../objects/liver.php';
 
$database = new Database();
$db = $database->getConnection();
$liver = new Liver($db);

// get posted data
//$data = json_decode(file_get_contents("php://input"));
 //print_r($_GET);
// set product property values
if(isset($_GET['bilirubin'])){
$liver->s_bilirubin = $_GET['bilirubin'];
}

if($_GET['bilirubin']=='direct'){
    $liver->direct = $_GET['sb_val'];

}
if($_GET['bilirubin']=='indirect'){
    $liver->indirect = $_GET['sb_val']; 

}
if(isset($_GET['direct'])){
$liver->direct = $_GET['direct'];
}
if(isset($_GET['indirect'])){
$liver->indirect = $_GET['indirect'];
}
if(isset($_GET['sgot'])){
$liver->sgot = $_GET['sgot'];
}
if(isset($_GET['sgpt'])){
$liver->sgpt = $_GET['sgpt'];
}
if(isset($_GET['albumin'])){
$liver->albumin = $_GET['albumin'];
}
if(isset($_GET['globulin'])){
$liver->globulin = $_GET['globulin'];
}
if(isset($_GET['albuminglobulinratio'])){
$liver->albumin_globulin_ratio = $_GET['albuminglobulinratio'];
}
if(isset($_GET['pt'])){
$liver->pt = $_GET['pt'];
}
if(isset($_GET['patient_id'])){
$liver->patient_id = $_GET['patient_id'];
}
// create the product
if($liver->create()){
    echo '{';
        echo '"message": "Product was created."';
    echo '}';
}
 
// if unable to create the product, tell the user
else{
    echo '{';
        echo '"message": "Unable to create product."';
    echo '}';
}
?>