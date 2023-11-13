<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';

use App\DB\Database as DB;
use App\Auth as Auth;

Auth::AdminCheck();
$conn = DB::connect();
$query = "select * from products where 1";
$result = $conn->query($query);
$conn->close();
?>
<?php $title = "All Products";
include "head.php" ?>
<div class="container-scroller">
    <?php $img = "../../assets/images/face4.jpg";
    include "../inc/Header.php" ?>
    <div class="container-fluid page-body-wrapper">
        <?php $img = "../../assets/images/face1.jpg";
        include "../inc/sidebar.php" ?>
        <!-- Main  -->
        <main class="main-panel mt-5 mx-5">
            <?php include "../../shared/message.php"; ?>
            <div class="d-flex justify-content-between my-4">
                <h3>Products Management</h3>
                <a class="btn btn-outline-primary px-3 pb-2" href="productAdd.php"> Add <i class="bi bi-plus fs-5"></i></a>
            </div>
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>ID</th>
                        <th>Products Name</th>
                        <th>Quantity</th>
                        <th>Purches Price</th>
                        <th>Sell Price</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['sprice']}</td>
                        <td>{$row['pprice']}</td>
                        <td>" . ($row['status'] == 1 ? 'In Stock' : 'Sold Out') . "</td>
                        <td>{$row['created']}</td>
                        <td>
                        <a href='productEdit.php?id={$row['id']}' title='edit'><i class='bi bi-pencil-square'></i></a> | 
                        <a onclick=\"return confirm('Are you sure?')\" href='productDelete.php?id={$row['id']}' title='delete'><i class='bi bi-trash'></i></a>
                        </td>
                        </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </div>
    <!-- page-body-wrapper ends -->
</div>
<?php include "footer.php" ?>