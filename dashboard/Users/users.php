<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';

use App\DB\Database as DB;
use App\Auth as Auth;

Auth::AdminCheck();
$conn = DB::connect();
$query = "select * from users where 1";
$result = $conn->query($query);
// echo $result->num_rows;
$conn->close();
?>
<?php $title = "All Users";
include "Head.php" ?>
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
                <h3>User Management</h3>
                <a class="btn btn-outline-primary px-3 pb-2" href="usersAdd.php"> Add <i class="bi bi-plus fs-5"></i></a>
            </div>
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['firstname']}</td>
            <td>{$row['lastname']}</td>
            <td>{$row['email']}</td>
            <td>{$row['role']}</td>
            <td>{$row['created']}</td>
            <td>
            <a href='usersEdit.php?id={$row['id']}' title='edit'><i class='bi bi-pencil-square'></i></a> | 
            <a onclick=\"return confirm('Are you sure?')\" href='usersDelete.php?id={$row['id']}' title='delete'><i class='bi bi-trash'></i></a>
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