<?php


header("Access-Control-Allow-Methods: PUT,PATCH");
header("Content-Type: application/json");

include("config.php");

$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD']=='PATCH') {

    $res = file_get_contents("php://input");
    parse_str($res,$data);
    $id = $data["id"];
    $product_name = $data["product_name"];
    $product_price = $data["product_price"];
    $result = $c1->updateDatabase($id,$product_name, $product_price);

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