<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/liver.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$liver = new Liver($db);
 $liver->patient_id = $_GET['patient_id'];
// query products
$stmt = $liver->getprofiledetail();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $livers_arr=array();
    $livers_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $liver_item=array(
            "s_bilirubin" => $s_bilirubin,
            "direct" => $direct,
            "indirect" =>$indirect,
            "sgot" => $sgot,
            "sgpt" => $sgpt,
            "albumin" => $albumin,
            "globulin" =>$globulin,
            "albumin_globulin_ratio"=>$albumin_globulin_ratio,
            "time_stamp"=>$time_stamp,
            "pt" =>$pt
        );
 
        array_push($livers_arr["records"], $liver_item);
    }
 
    echo json_encode($livers_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>