<?php

class ShoppingListController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['addItem'])) {
                $newItem = trim($_POST['newItem']);
                if (!empty($newItem)) {
                    $this->model->addItem($newItem);
                    header("Location: {$_SERVER['PHP_SELF']}");
                    exit();
                }
            }           
        }

        // Retrieve shopping list from the model and pass it to the view
        $shoppingList = $this->model->getShoppingList();
        include 'indexView.php'; // Include the view
    }
}

// Usage:
$model = new ShoppingListModel($conn);
$controller = new ShoppingListController($model);
$controller->handleRequest();
?>