<?php
class Config {
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect('localhost', 'root', '', 'database');
        if (!$this->conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function insertDatabase($product_name, $product_price) {
        $sql = "INSERT INTO products (name, price) VALUES ('$product_name', '$product_price')";
        return mysqli_query($this->conn, $sql);
    }

    public function selectDatabase() {
        $sql = "SELECT * FROM products";
        return mysqli_query($this->conn, $sql);
    }

    public function updateDatabase($id, $product_name, $product_price) {
        $sql = "UPDATE products SET name='$product_name', price='$product_price' WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }
    

    public function deleteDatabase($id) {
        $sql = "DELETE FROM products WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }
}
?>
