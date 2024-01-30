<?php
class ShoppingListModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addItem($newItem) {
        $stmt = $this->conn->prepare("INSERT INTO shopping_list (item, done) VALUES (?, 0)");
        $stmt->bind_param("s", $newItem);
        $stmt->execute();
        $stmt->close();
    }

    // Implement other methods for deleting, updating, and retrieving items from the database later
}
?>