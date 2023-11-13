<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';

use App\DB\Database as DB;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn = DB::connect();

    $q_delete_products = "DELETE FROM products WHERE category_id='{$id}'";
    $conn->query($q_delete_products);

    // Then, delete the category
    $q_delete_category = "DELETE FROM categories WHERE id='{$id}' LIMIT 1";
    $conn->query($q_delete_category);

    if ($conn->affected_rows) {
        $_SESSION['message'] = "Category {$id} deleted successfully";
        header("location: categories.php");
    } else {
        echo "Error deleting data";
    }
}
