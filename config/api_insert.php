<?php
include 'config.php';

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

$c1 = new config();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $res = $c1->insertDatabase($product_name, $product_price);  // Remove the trailing comma
    if ($res) {
        $arr['status'] = "Record insertion successful!!";
        echo json_encode($arr);
    } else {
        $arr['error'] = "Record insertion failed!!";
        echo json_encode($arr);
    }
} else {
    $arr['msg'] = "Only POST method is allowed!!";
    echo json_encode($arr);
}
?>
