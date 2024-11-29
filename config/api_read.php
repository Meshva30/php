<?php
include 'config.php';

header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $result = $c1->selectDatabase();
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode(['data' => $data]);
} else {
    echo json_encode(['error' => "Only GET method is allowed."]);
}
?>
