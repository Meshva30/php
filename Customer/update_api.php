<?php


header("Access-Control-Allow-Methods: PUT,PATCH");
header("Content-Type: application/json");

include("customer_config.php");

$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD']=='PATCH') {

    $res = file_get_contents("php://input");
    parse_str($res,$data);
    $id = $data["id"];
    $customer_name = $data["customer_name"];
    $customer_email = $data["customer_email"];
    $customer_mobilenumber = $data["customer_mobilenumber"];
    $customer_address = $data["customer_address"];
    $result = $c1->updateDatabase($id,$customer_name, $customer_email,$customer_mobilenumber,$customer_address);

    if($result)
    {
        $arr['status']='Product Updated Successfully !';
    }
    else{
        $arr['error']= 'Product Updatation Failed !';
    }
} else {
    $arr['err'] = "Only PUT & PATCH method is allowed !!";
}



echo json_encode($arr);
?>