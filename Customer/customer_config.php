<?php
class Config {
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect('localhost', 'root', '', 'customer');
    }

    public function getConnection() {
        return $this->conn;
    }

    public function insertDatabase($customer_name, $customer_email, $customer_mobilenumber, $customer_address) {
        $sql = "INSERT INTO customers (name, email, phonenumber, address) VALUES ('$customer_name', '$customer_email', '$customer_mobilenumber', '$customer_address')";
        return mysqli_query($this->conn, $sql);
    }

    public function selectDatabase() {
        $sql = "SELECT * FROM customers";
        return mysqli_query($this->conn, $sql);
    }

    public function updateDatabase($id, $customer_name, $customer_email,$customer_mobilenumber,$customer_address) {
        $sql = "UPDATE customers SET name='$customer_name', email='$customer_email', phonenumber='$customer_mobilenumber', address='$customer_address' WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }
    

    public function deleteDatabase($id) {
        $sql = "DELETE FROM customers WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }
}
?>
