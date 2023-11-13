<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';

use App\DB\Database as DB;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageId = $_POST['iid'];
    $conn = DB::connect();
    $sq = "select name from images where id = {$imageId} limit 1";
    $sqr = $conn->query($sq);
    $row = $sqr->fetch_assoc();
    $q = "delete from images where id='{$imageId}' limit 1";
    $conn->query($q);
    if($conn->affected_rows){
        if(unlink('../../assets/products/'.$row['name'])){
            $message = ['errror' =>false, 'message' =>'image deleted successfully'];
        }
        else{
            $message = ['errror' =>true,'message' =>'image deleted from record but not deleted from file location'];
        }
        
    }
    else{
        $message = ['errror' =>true,'message' =>'image not deleted'];
    }  
    echo json_encode($message); 
}