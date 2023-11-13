<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';

use App\DB\Database as DB;
//for authorization start
use App\Auth as Auth;

Auth::AdminCheck();
$conn = DB::connect();
$query = "select * from categories where 1";
$result = $conn->query($query);
// echo $result->num_rows;
$conn->close();
?>
<?php $title = "All Categories";
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
                <h3>Category Management</h3>
                <a class="btn btn-outline-primary px-4 mb-2" href="categoryAdd.php"> Add <i class="bi bi-plus fs-5"></i></a>
            </div>
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
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
            <td>{$row['created']}</td>
            <td>{$row['updated']}</td>
            <td>
            <a href='categoryEdit.php?id={$row['id']}' title='edit'><i class='bi bi-pencil-square'></i></a> | 
            <a onclick=\"return confirm('Are you sure?')\" href='categoryDelete.php?id={$row['id']}' title='delete'><i class='bi bi-trash'></i></a>
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