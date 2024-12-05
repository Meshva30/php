
<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include 'customer_config.php';


$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_mobilenumber = $_POST['customer_mobilenumber'];
    $customer_address = $_POST['customer_address'];


    $res = $c1->insertDatabase($customer_name, $customer_email, $customer_mobilenumber, $customer_address);
    if ($res) {
        echo json_encode(['status' => "Product added successfully!"]);
    } else {
        echo json_encode(['error' => "Failed to add product."]);
    }
} else {
    echo json_encode(['error' => "Only POST method is allowed."]);
}
?>
