<?php
include 'config.php';

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $product_name = $data['product_name'];
    $product_price = $data['product_price'];

    $res = $c1->insertDatabase($product_name, $product_price);
    if ($res) {
        echo json_encode(['status' => "Product added successfully!"]);
    } else {
        echo json_encode(['error' => "Failed to add product."]);
    }
} else {
    echo json_encode(['error' => "Only POST method is allowed."]);
}
?>
