<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';

use App\DB\Database as DB;
//post method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = DB::connect();
    $idtoedit = $_POST['id'];
    $fname = $conn->escape_string($_POST['first_name']);
    $lname = $conn->escape_string($_POST['last_name']);
    $email = $_POST['email'];
    $role = $_POST['role'];
    $error = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Email Not Valid!!!";
        $error = true;
    }
    if ($role == "-1") {
        $message = "Please select User Role!!!";
        $error = true;
    }
    if (!$error) {

        $editquery = "update users set firstname='{$fname}', lastname='{$lname}', email='{$email}', role='{$role}' where id='{$idtoedit}' limit 1";
        $conn->query($editquery);
        if ($conn->affected_rows) {
            $_SESSION['message'] = "User Updated Successfully";
            header("location: users.php");
        } else {
            $message = "ERROR!!";
        }
        $conn->close();
    }
}

//get method
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    $conn = DB::connect();
    $query = "select * from users where id={$id}";
    $result = $conn->query($query);
    if (!$result->num_rows) {
        echo "No user Data Found!!!";
        exit;
    }
    $row = $result->fetch_assoc();
    // var_dump($row);
    // echo $result->num_rows;
    $conn->close();
}
?>

<?php $title = "User Update";
include "Head.php" ?>
<div class="container-scroller">
    <?php $img = "../../assets/images/face4.jpg";
    include "../inc/Header.php" ?>
    <div class="container-fluid page-body-wrapper">
        <?php $img = "../../assets/images/face1.jpg";
        include "../inc/sidebar.php" ?>
        <!-- Main  -->
        <main class="main-panel mt-5 mx-5">
            <form class="mx-1 mx-md-4" action="usersEdit.php?id=<?= $id; ?>" method="post">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" name="first_name" id="form3Example1c" class="form-control" value="<?= $row['firstname'] ?>" />
                        <label class="form-label" for="form3Example1c">First Name</label>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" name="last_name" id="form3Example1c" class="form-control" value="<?= $row['lastname'] ?>" />
                        <label class="form-label" for="form3Example1c">Last Name</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input type="email" name="email" id="form3Example3c" class="form-control" value="<?= $row['email'] ?>" />
                        <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <select name="role" id="role" class="form-select">
                            <option value="-1" disabled>Select</option>
                            <option value="1" <?= $row['role'] == "1" ? "selected" : "" ?>>User</option>
                            <option value="2" <?= $row['role'] == "2" ? "selected" : "" ?>>Admin</option>
                        </select>
                        <label class="form-label" for="role">User Role</label>
                    </div>
                </div>
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="fs-5 px-4 btn btn-block btn-lg btn-gradient-primary">Update</button>
                </div>

            </form>
        </main>
    </div>
    <!-- page-body-wrapper ends -->
</div>
<?php include "footer.php" ?>