<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';

use App\DB\Database as DB;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn = DB::connect();
    $q = "delete from users where id='{$id}' limit 1";
    $conn->query($q);
    if ($conn->affected_rows) {
        $_SESSION['message'] = "User {$id} deleted Successfully";
        header("location: users.php");
    } else {
        echo "error deleting data";
    }
}
