<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';

use App\DB\Database as DB;

//  adding a new category
function handleAddCategory()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newCategoryName'])) {
        $conn = DB::connect();
        $newCategoryName = $conn->escape_string($_POST['newCategoryName']);

        if (!empty($newCategoryName)) {
            $insertQuery = "insert into categories values(null,'{$newCategoryName}',null,null)";
            if ($conn->query($insertQuery)) {
                $_SESSION['message'] = "New Category Added Successfully";
                header("location: categories.php");
            } else {
                $_SESSION['message'] = "Error Adding New Category";
            }
        } else {
            $_SESSION['message'] = "Category Name cannot be empty";
        }

        $conn->close();
    }
}

if (isset($_POST['newCategoryName'])) {
    handleAddCategory();
}

?>
<?php $title = "Category Add";
include "head.php" ?>
<div class="container-scroller">
    <?php $img = "../../assets/images/face4.jpg";
    include "../inc/Header.php" ?>
    <div class="container-fluid page-body-wrapper">
        <?php $img = "../../assets/images/face1.jpg";
        include "../inc/sidebar.php" ?>
        <!-- Main  -->
        <main class="main-panel mt-5 mx-5">
            <form class="mx-1 mx-md-4 mt-5" action="categoryAdd.php" method="post">
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-plus-circle fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" name="newCategoryName" id="form3Example1c" class="form-control" placeholder="New Category Name" />
                    </div>
                </div>
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="fs-5 px-4 btn btn-block btn-lg btn-gradient-primary">Add New Category</button>
                </div>
            </form>
        </main>
    </div>
    <!-- page-body-wrapper ends -->
</div>
<?php include "footer.php" ?>